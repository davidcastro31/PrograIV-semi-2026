// db-sqlite.js
class TableWrapper {
    constructor(tableName, db) {
        this.tableName = tableName;
        this.db = db;
    }

    async add(item) {
        return this.put(item);
    }

    async put(item) {
        const keys = Object.keys(item);
        const values = Object.values(item);
        const placeholders = keys.map(() => '?').join(',');
        const sql = `INSERT OR REPLACE INTO ${this.tableName} (${keys.join(',')}) VALUES (${placeholders})`;
        return this.db.query(sql, values, 'exec');
    }

    async bulkPut(items) {
        for (const item of items) {
            await this.put(item);
        }
        return true;
    }

    async delete(id) {
        const pk = this.getPKName();
        const sql = `DELETE FROM ${this.tableName} WHERE ${pk} = ?`;
        return this.db.query(sql, [id], 'exec');
    }

    async count() {
        const sql = `SELECT COUNT(*) as count FROM ${this.tableName}`;
        const res = await this.db.query(sql, [], 'get');
        return res ? res.count : 0;
    }

    async toArray() {
        const sql = `SELECT * FROM ${this.tableName}`;
        return this.db.query(sql, [], 'all');
    }

    filter(fn) {
        return {
            toArray: async () => {
                const items = await this.toArray();
                return items.filter(fn);
            }
        };
    }

    where(column) {
        return {
            equals: (value) => ({
                first: async () => {
                    const sql = `SELECT * FROM ${this.tableName} WHERE ${column} = ? LIMIT 1`;
                    return this.db.query(sql, [value], 'get');
                },
                toArray: async () => {
                    const sql = `SELECT * FROM ${this.tableName} WHERE ${column} = ?`;
                    return this.db.query(sql, [value], 'all');
                }
            })
        };
    }

    getPKName() {
        if (this.tableName === 'alumnos') return 'idAlumno';
        if (this.tableName === 'materias') return 'idMateria';
        if (this.tableName === 'docentes') return 'idDocente';
        if (this.tableName === 'inscripciones') return 'idInscripcion';
        if (this.tableName === 'matriculas') return 'idMatricula';
        return 'id';
    }
}

class SQLiteDB {
    constructor() {
        this.worker = new Worker('db-worker.js');
        this.pending = new Map();
        this.messageId = 0;
        this.initialized = false;

        this.worker.onmessage = ({ data }) => {
            const { type, result, error, id } = data;
            const promise = this.pending.get(id);
            if (promise) {
                if (type === 'error') {
                    promise.reject(error);
                } else {
                    promise.resolve(result);
                }
                this.pending.delete(id);
            }
        };

        this.ready = new Promise((resolve, reject) => {
            const id = this.getNextId();
            this.pending.set(id, { resolve, reject });
            this.worker.postMessage({ type: 'init', id });
        }).then(() => {
            this.initialized = true;
        });

        this.alumnos = new TableWrapper('alumnos', this);
        this.materias = new TableWrapper('materias', this);
        this.docentes = new TableWrapper('docentes', this);
        this.inscripciones = new TableWrapper('inscripciones', this);
        this.matriculas = new TableWrapper('matriculas', this);
    }

    getNextId() {
        return this.messageId++;
    }

    async query(sql, params = [], method = 'all') {
        await this.ready;
        return new Promise((resolve, reject) => {
            const id = this.getNextId();
            this.pending.set(id, { resolve, reject });
            this.worker.postMessage({ type: 'query', payload: { sql, params, method }, id });
        });
    }
}

window.db = new SQLiteDB();
