const { createApp } = Vue;

const db = new Dexie('db_USSS019124');
db.version(1).stores({
    autores: '++idAutor, codigo, nombre, pais, telefono',
    libros:  '++idLibro, idAutor, isbn, titulo, editorial, edicion',
});

const CompAutores = {
    data() {
        return {
            accion: 'nuevo',
            idAutor: null,
            codigo: '', nombre: '', pais: '', telefono: '',
            buscar: '', buscarTipo: 'nombre',
            autores: [],
            vista: 'form',
        };
    },
    methods: {
        async listarAutores() {
            const t = this.buscarTipo, b = this.buscar.toLowerCase();
            this.autores = await db.autores.filter(a => (a[t]??'').toString().toLowerCase().includes(b)).toArray();
        },
        async guardar() {
            if (!this.codigo || !this.nombre || !this.pais) { alertify.error('Código, nombre y país son obligatorios'); return; }
            const r = { codigo: this.codigo, nombre: this.nombre, pais: this.pais, telefono: this.telefono };
            if (this.accion === 'modificar') r.idAutor = this.idAutor;
            await db.autores.put(r);
            alertify.success('Autor guardado');
            this.nuevo();
        },
        editar(a) {
            Object.assign(this, { accion:'modificar', idAutor:a.idAutor, codigo:a.codigo, nombre:a.nombre, pais:a.pais, telefono:a.telefono, vista:'form' });
        },
        eliminar(a) {
            alertify.confirm('Eliminar', `¿Eliminar a ${a.nombre}?`, async () => { await db.autores.delete(a.idAutor); this.listarAutores(); alertify.success('Eliminado'); }, ()=>{});
        },
        nuevo() {
            Object.assign(this, { accion:'nuevo', idAutor:null, codigo:'', nombre:'', pais:'', telefono:'' });
        },
        verLista() { this.vista = 'lista'; this.listarAutores(); },
    },
    template: `
    <div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0 fw-bold">Autores</h6>
            <div class="btn-group btn-group-sm">
                <button class="btn" :class="vista==='form'?'btn-dark':'btn-outline-dark'" @click="vista='form'">Formulario</button>
                <button class="btn" :class="vista==='lista'?'btn-dark':'btn-outline-dark'" @click="verLista()">Listado</button>
            </div>
        </div>

        <div v-show="vista==='form'" class="row">
            <div class="col-md-5">
                <div class="mb-2">
                    <label class="form-label">Código</label>
                    <input v-model="codigo" type="text" class="form-control form-control-sm">
                </div>
                <div class="mb-2">
                    <label class="form-label">Nombre</label>
                    <input v-model="nombre" type="text" class="form-control form-control-sm">
                </div>
                <div class="mb-2">
                    <label class="form-label">País</label>
                    <input v-model="pais" type="text" class="form-control form-control-sm">
                </div>
                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input v-model="telefono" type="text" class="form-control form-control-sm">
                </div>
                <button @click="guardar" class="btn btn-primary btn-sm me-1">{{ accion==='modificar'?'Actualizar':'Guardar' }}</button>
                <button @click="nuevo" class="btn btn-secondary btn-sm">Nuevo</button>
            </div>
        </div>

        <div v-show="vista==='lista'">
            <div class="row mb-2">
                <div class="col-4">
                    <select v-model="buscarTipo" @change="listarAutores" class="form-select form-select-sm">
                        <option value="codigo">Código</option>
                        <option value="nombre">Nombre</option>
                        <option value="pais">País</option>
                        <option value="telefono">Teléfono</option>
                    </select>
                </div>
                <div class="col-8">
                    <input type="text" v-model="buscar" @keyup="listarAutores" class="form-control form-control-sm" placeholder="Buscar...">
                </div>
            </div>
            <table class="table table-sm table-bordered table-hover">
                <thead class="table-dark">
                    <tr><th>Código</th><th>Nombre</th><th>País</th><th>Teléfono</th><th></th></tr>
                </thead>
                <tbody>
                    <tr v-if="!autores.length"><td colspan="5" class="text-center text-muted">Sin resultados</td></tr>
                    <tr v-for="a in autores" :key="a.idAutor">
                        <td>{{a.codigo}}</td><td>{{a.nombre}}</td><td>{{a.pais}}</td><td>{{a.telefono||'—'}}</td>
                        <td>
                            <button class="btn btn-warning btn-sm me-1" @click="editar(a)">Editar</button>
                            <button class="btn btn-danger btn-sm" @click="eliminar(a)">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    `,
};

const CompLibros = {
    data() {
        return {
            accion: 'nuevo',
            idLibro: null, idAutor: '',
            isbn: '', titulo: '', editorial: '', edicion: '',
            buscar: '', buscarTipo: 'titulo',
            libros: [], autores: [],
            vista: 'form',
        };
    },
    methods: {
        async cargarAutores() { this.autores = await db.autores.toArray(); },
        async listarLibros() {
            const t = this.buscarTipo, b = this.buscar.toLowerCase();
            this.libros = await db.libros.filter(l => (l[t]??'').toString().toLowerCase().includes(b)).toArray();
        },
        nombreAutor(id) { return (this.autores.find(a => a.idAutor === id)||{}).nombre || '—'; },
        async guardar() {
            if (!this.isbn||!this.titulo||!this.editorial||!this.edicion||!this.idAutor) { alertify.error('Todos los campos son obligatorios'); return; }
            const r = { idAutor:this.idAutor, isbn:this.isbn, titulo:this.titulo, editorial:this.editorial, edicion:this.edicion };
            if (this.accion==='modificar') r.idLibro = this.idLibro;
            await db.libros.put(r);
            alertify.success('Libro guardado');
            this.nuevo();
        },
        editar(l) {
            Object.assign(this, { accion:'modificar', idLibro:l.idLibro, idAutor:l.idAutor, isbn:l.isbn, titulo:l.titulo, editorial:l.editorial, edicion:l.edicion, vista:'form' });
        },
        eliminar(l) {
            alertify.confirm('Eliminar', `¿Eliminar "${l.titulo}"?`, async () => { await db.libros.delete(l.idLibro); this.listarLibros(); alertify.success('Eliminado'); }, ()=>{});
        },
        nuevo() {
            Object.assign(this, { accion:'nuevo', idLibro:null, idAutor:'', isbn:'', titulo:'', editorial:'', edicion:'' });
        },
        verLista() { this.vista = 'lista'; this.listarLibros(); },
    },
    async created() { await this.cargarAutores(); },
    template: `
    <div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0 fw-bold">Libros</h6>
            <div class="btn-group btn-group-sm">
                <button class="btn" :class="vista==='form'?'btn-dark':'btn-outline-dark'" @click="vista='form'">Formulario</button>
                <button class="btn" :class="vista==='lista'?'btn-dark':'btn-outline-dark'" @click="verLista()">Listado</button>
            </div>
        </div>

        <div v-show="vista==='form'" class="row">
            <div class="col-md-5">
                <div class="mb-2">
                    <label class="form-label">ISBN</label>
                    <input v-model="isbn" type="text" class="form-control form-control-sm">
                </div>
                <div class="mb-2">
                    <label class="form-label">Título</label>
                    <input v-model="titulo" type="text" class="form-control form-control-sm">
                </div>
                <div class="mb-2">
                    <label class="form-label">Editorial</label>
                    <input v-model="editorial" type="text" class="form-control form-control-sm">
                </div>
                <div class="mb-2">
                    <label class="form-label">Edición</label>
                    <input v-model="edicion" type="text" class="form-control form-control-sm">
                </div>
                <div class="mb-3">
                    <label class="form-label">Autor</label>
                    <select v-model="idAutor" class="form-select form-select-sm">
                        <option value="" disabled>Seleccionar...</option>
                        <option v-for="a in autores" :key="a.idAutor" :value="a.idAutor">{{a.nombre}}</option>
                    </select>
                    <small v-if="!autores.length" class="text-danger">Registra un autor primero</small>
                </div>
                <button @click="guardar" class="btn btn-primary btn-sm me-1">{{ accion==='modificar'?'Actualizar':'Guardar' }}</button>
                <button @click="nuevo" class="btn btn-secondary btn-sm">Nuevo</button>
            </div>
        </div>

        <div v-show="vista==='lista'">
            <div class="row mb-2">
                <div class="col-4">
                    <select v-model="buscarTipo" @change="listarLibros" class="form-select form-select-sm">
                        <option value="isbn">ISBN</option>
                        <option value="titulo">Título</option>
                        <option value="editorial">Editorial</option>
                        <option value="edicion">Edición</option>
                    </select>
                </div>
                <div class="col-8">
                    <input type="text" v-model="buscar" @keyup="listarLibros" class="form-control form-control-sm" placeholder="Buscar...">
                </div>
            </div>
            <table class="table table-sm table-bordered table-hover">
                <thead class="table-dark">
                    <tr><th>ISBN</th><th>Título</th><th>Autor</th><th>Editorial</th><th>Edición</th><th></th></tr>
                </thead>
                <tbody>
                    <tr v-if="!libros.length"><td colspan="6" class="text-center text-muted">Sin resultados</td></tr>
                    <tr v-for="l in libros" :key="l.idLibro">
                        <td>{{l.isbn}}</td><td>{{l.titulo}}</td><td>{{nombreAutor(l.idAutor)}}</td><td>{{l.editorial}}</td><td>{{l.edicion}}</td>
                        <td>
                            <button class="btn btn-warning btn-sm me-1" @click="editar(l)">Editar</button>
                            <button class="btn btn-danger btn-sm" @click="eliminar(l)">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    `,
};

const app = createApp({
    components: { 'comp-autores': CompAutores, 'comp-libros': CompLibros },
    data() { return { tab: 'autores' }; },
});
app.mount('#app');