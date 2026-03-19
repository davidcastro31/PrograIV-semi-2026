// db-worker.js
importScripts('/Antigravity%20Program%20lV/Programacion_lV/jswasm/sqlite3.js');
let db;

self.onmessage = async ({ data }) => {
    const { type, payload, id } = data;

    if (type === 'init') {
        try {
            const sqlite3 = await sqlite3InitModule({
                print: console.log,
                printErr: console.error,
            });
            if ('opfs' in sqlite3) {
                db = new sqlite3.oo1.OpfsDb('/db_academica.sqlite3', 'c');
                console.log('OPFS SQLite DB initialized');
            } else {
                db = new sqlite3.oo1.DB('/db_academica.sqlite3', 'ct');
                console.warn('OPFS not available, using temporary storage (ct)');
            }
            // Initialize schema
            db.exec(`
                CREATE TABLE IF NOT EXISTS alumnos (idAlumno TEXT PRIMARY KEY, codigo TEXT, nombre TEXT, direccion TEXT, email TEXT, telefono TEXT);
                CREATE TABLE IF NOT EXISTS materias (idMateria TEXT PRIMARY KEY, codigo TEXT, nombre TEXT, uv INTEGER);
                CREATE TABLE IF NOT EXISTS docentes (idDocente TEXT PRIMARY KEY, codigo TEXT, nombre TEXT, direccion TEXT, email TEXT, telefono TEXT, escalafon TEXT);
                CREATE TABLE IF NOT EXISTS inscripciones (idInscripcion TEXT PRIMARY KEY, codigo_alumno TEXT, materia TEXT, fecha_inscripcion TEXT, ciclo_periodo TEXT, observaciones TEXT);
                CREATE TABLE IF NOT EXISTS matriculas (idMatricula TEXT PRIMARY KEY, codigo_alumno TEXT, fecha_matricula TEXT, pago REAL, ciclo TEXT, comprobante TEXT);
            `);
            self.postMessage({ type: 'init-ready', id });
        } catch (err) {
            console.error(err);
            self.postMessage({ type: 'error', error: err.message, id });
        }
    } else if (type === 'query') {
        try {
            const { sql, params, method } = payload;
            let result;
            if (method === 'exec') {
                db.exec(sql, { bind: params });
                result = true;
            } else if (method === 'all') {
                result = db.exec(sql, { returnValue: 'resultRows', rowMode: 'object', bind: params });
            } else if (method === 'get') {
                const rows = db.exec(sql, { returnValue: 'resultRows', rowMode: 'object', bind: params });
                result = rows[0] || null;
            }
            self.postMessage({ type: 'query-result', result, id });
        } catch (err) {
            console.error(err);
            self.postMessage({ type: 'error', error: err.message, id });
        }
    }
};
