<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mango Music</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --orange: #f97316;
            --orange-soft: rgba(249,115,22,0.12);
            --bg: #111214;
            --surface: #1c1d20;
            --surface2: #24252a;
            --border: #2e2f35;
            --text: #f0f0f0;
            --muted: #71717a;
            --muted2: #52525b;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            min-height: 100vh;
        }

        .topbar {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 0 24px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            font-size: 1rem;
            color: var(--text);
            text-decoration: none;
        }

        .brand-dot {
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, var(--orange), #fb923c);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        .topbar-right {
            font-size: 0.75rem;
            color: var(--muted);
        }

        .page-wrapper {
            max-width: 1140px;
            margin: 0 auto;
            padding: 28px 20px 60px;
        }

        .page-header {
            margin-bottom: 22px;
        }

        .page-title {
            font-size: 1.05rem;
            font-weight: 600;
            color: var(--text);
        }

        .page-sub {
            font-size: 0.78rem;
            color: var(--muted);
            margin-top: 3px;
        }

        /* TABS */
        .tab-nav {
            display: flex;
            gap: 4px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 4px;
            margin-bottom: 22px;
            width: fit-content;
        }

        .tab-btn {
            background: transparent;
            border: none;
            color: var(--muted);
            padding: 7px 18px;
            border-radius: 7px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.15s;
            font-family: 'Inter', sans-serif;
        }

        .tab-btn:hover { color: var(--text); }
        .tab-btn.active { background: var(--orange); color: #fff; }

        /* CARD */
        .card-m {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 20px;
        }

        .card-header-m {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border);
        }

        .card-icon {
            width: 32px;
            height: 32px;
            background: var(--orange-soft);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--orange);
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        .card-title-m { font-weight: 600; font-size: 0.92rem; }
        .card-title-sub { font-size: 0.73rem; color: var(--muted); margin-top: 1px; }

        .form-label {
            font-size: 0.75rem;
            font-weight: 500;
            color: #a1a1aa;
            margin-bottom: 5px;
            display: block;
        }

        .form-control, .form-select {
            background: var(--surface2);
            border: 1px solid var(--border);
            color: var(--text);
            border-radius: 8px;
            padding: 9px 12px;
            font-size: 0.875rem;
            width: 100%;
            transition: border-color 0.15s, box-shadow 0.15s;
            font-family: 'Inter', sans-serif;
        }

        .form-control:focus, .form-select:focus {
            background: var(--surface2);
            border-color: var(--orange);
            color: var(--text);
            box-shadow: 0 0 0 3px rgba(249,115,22,0.15);
            outline: none;
        }

        .form-control::placeholder { color: var(--muted2); }
        textarea.form-control { resize: vertical; min-height: 80px; }
        .form-select option { background: #1c1d20; }

        .btn-primary-m {
            background: var(--orange);
            border: none;
            color: #fff;
            padding: 9px 18px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.15s;
            font-family: 'Inter', sans-serif;
        }

        .btn-primary-m:hover { background: #ea6c10; transform: translateY(-1px); box-shadow: 0 3px 10px rgba(249,115,22,0.3); }

        .btn-ghost-m {
            background: var(--surface2);
            border: 1px solid var(--border);
            color: var(--muted);
            padding: 9px 14px;
            border-radius: 8px;
            font-size: 0.85rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.15s;
            font-family: 'Inter', sans-serif;
        }

        .btn-ghost-m:hover { color: var(--text); border-color: #444; }

        .search-bar {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 14px 16px;
            margin-bottom: 14px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: flex-end;
        }

        .search-bar .field { flex: 1; min-width: 150px; }

        .table-wrap { border-radius: 10px; overflow: hidden; border: 1px solid var(--border); }

        table { width: 100%; border-collapse: collapse; }

        thead th {
            background: var(--surface2);
            color: var(--muted);
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            padding: 10px 14px;
            border-bottom: 1px solid var(--border);
        }

        tbody td {
            padding: 11px 14px;
            border-bottom: 1px solid var(--border);
            color: var(--text);
            font-size: 0.875rem;
            background: var(--surface);
            vertical-align: middle;
        }

        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover td { background: #202125; }

        .badge-m {
            background: var(--orange-soft);
            color: var(--orange);
            border: 1px solid rgba(249,115,22,0.25);
            font-size: 0.7rem;
            padding: 3px 8px;
            border-radius: 20px;
            font-weight: 500;
        }

        .act-btn {
            width: 30px; height: 30px;
            border-radius: 6px; border: none;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 0.8rem; cursor: pointer; transition: all 0.15s;
        }

        .act-edit { background: rgba(250,204,21,0.1); color: #fbbf24; }
        .act-edit:hover { background: #fbbf24; color: #000; }
        .act-del  { background: rgba(239,68,68,0.1); color: #ef4444; }
        .act-del:hover  { background: #ef4444; color: #fff; }

        .empty { text-align: center; padding: 48px 20px; color: var(--muted); }
        .empty i { font-size: 2rem; opacity: 0.25; display: block; margin-bottom: 10px; }
        .empty p { font-size: 0.83rem; }

        .notif-wrap {
            position: fixed; top: 66px; right: 18px;
            z-index: 9999; width: 295px; pointer-events: none;
        }

        .notif {
            border-radius: 10px; padding: 11px 14px; margin-bottom: 8px;
            display: flex; align-items: center; gap: 9px; font-size: 0.83rem;
            animation: slideIn 0.22s ease;
            box-shadow: 0 4px 16px rgba(0,0,0,0.5);
            pointer-events: all;
        }

        .notif-success { background: #14271e; border: 1px solid #166534; color: #86efac; }
        .notif-danger  { background: #2d1414; border: 1px solid #991b1b; color: #fca5a5; }
        .notif-warning { background: #2a1f0a; border: 1px solid #92400e; color: #fcd34d; }

        @keyframes slideIn {
            from { transform: translateX(110%); opacity: 0; }
            to   { transform: translateX(0); opacity: 1; }
        }

        .footer-m {
            text-align: center; padding: 16px;
            color: var(--muted2); font-size: 0.75rem;
            border-top: 1px solid var(--border); margin-top: 40px;
        }

        @media (max-width: 768px) {
            .page-wrapper { padding: 16px 12px 40px; }
            .search-bar { flex-direction: column; }
            .tab-nav { width: 100%; }
            .tab-btn { flex: 1; justify-content: center; }
        }
    </style>
</head>
<body>


<header class="topbar">
    <a href="#" class="brand">
        Mango Music
    </a>
    <span class="topbar-right">Programación IV · 2026</span>
</header>

<div id="app">

    <div class="notif-wrap">
        <div v-for="(n, i) in notificaciones" :key="i" :class="`notif notif-${n.tipo}`">
            <i :class="n.icono"></i>
            <span>@{{ n.mensaje }}</span>
        </div>
    </div>

    <div class="page-wrapper">

        <div class="page-header">
            <div class="page-title">Panel de gestión</div>
            <div class="page-sub">Administra artistas y canciones de la plataforma</div>
        </div>

        <!-- TABS -->
        <div class="tab-nav">
            <button class="tab-btn" :class="{active: tabActivo === 'artistas'}" @click="tabActivo = 'artistas'">
                <i class="bi bi-person-badge"></i> Artistas
            </button>
            <button class="tab-btn" :class="{active: tabActivo === 'canciones'}" @click="tabActivo = 'canciones'">
                <i class="bi bi-music-note-beamed"></i> Canciones
            </button>
        </div>

        <!-- ===== ARTISTAS ===== -->
        <div v-show="tabActivo === 'artistas'">
            <div class="row g-3">

                <div class="col-lg-4">
                    <div class="card-m">
                        <div class="card-header-m">
                            <div class="card-icon"><i class="bi bi-person-plus"></i></div>
                            <div>
                                <div class="card-title-m">@{{ editandoArtista ? 'Editar artista' : 'Nuevo artista' }}</div>
                                <div class="card-title-sub">Campos con * son obligatorios</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre *</label>
                            <input type="text" class="form-control" v-model="formArtista.nombre" placeholder="Ej. Bad Bunny">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Género *</label>
                            <select class="form-select" v-model="formArtista.genero">
                                <option value="">Seleccionar género</option>
                                <option>Reggaeton</option><option>Pop</option><option>Rock</option>
                                <option>Hip-Hop</option><option>Salsa</option><option>Cumbia</option>
                                <option>Electrónica</option><option>Balada</option><option>Otro</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Biografía</label>
                            <textarea class="form-control" v-model="formArtista.biografia" placeholder="Descripción del artista..."></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">URL Foto</label>
                            <input type="text" class="form-control" v-model="formArtista.foto" placeholder="https://...">
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn-primary-m flex-fill" @click="guardarArtista">
                                <i class="bi bi-check-lg"></i> @{{ editandoArtista ? 'Actualizar' : 'Registrar' }}
                            </button>
                            <button v-if="editandoArtista" class="btn-ghost-m" @click="cancelarArtista">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="search-bar">
                        <div class="field">
                            <label class="form-label">Buscar por nombre</label>
                            <input type="text" class="form-control" v-model="busArtista.nombre" placeholder="Buscar..." @input="cargarArtistas">
                        </div>
                        <div class="field">
                            <label class="form-label">Filtrar por género</label>
                            <select class="form-select" v-model="busArtista.genero" @change="cargarArtistas">
                                <option value="">Todos</option>
                                <option>Reggaeton</option><option>Pop</option><option>Rock</option>
                                <option>Hip-Hop</option><option>Salsa</option><option>Cumbia</option>
                                <option>Electrónica</option><option>Balada</option><option>Otro</option>
                            </select>
                        </div>
                        <button class="btn-ghost-m" @click="limpiarBusArtista" style="height:38px">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </button>
                    </div>

                    <div class="table-wrap" v-if="artistas.length > 0">
                        <table>
                            <thead>
                                <tr><th>#</th><th>Nombre</th><th>Género</th><th>Biografía</th><th>Acciones</th></tr>
                            </thead>
                            <tbody>
                                <tr v-for="(a, i) in artistas" :key="a.id">
                                    <td style="color:var(--muted);width:40px">@{{ i+1 }}</td>
                                    <td><span style="font-weight:500">@{{ a.nombre }}</span></td>
                                    <td><span class="badge-m">@{{ a.genero }}</span></td>
                                    <td style="color:var(--muted);max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">@{{ a.biografia || '—' }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <button class="act-btn act-edit" @click="editarArtista(a)"><i class="bi bi-pencil"></i></button>
                                            <button class="act-btn act-del"  @click="eliminarArtista(a.id)"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="empty" v-else>
                        <i class="bi bi-person-x"></i>
                        <p>No hay artistas registrados aún</p>
                    </div>
                </div>

            </div>
        </div>

        <div v-show="tabActivo === 'canciones'">
            <div class="row g-3">

                <div class="col-lg-4">
                    <div class="card-m">
                        <div class="card-header-m">
                            <div class="card-icon"><i class="bi bi-music-note-plus"></i></div>
                            <div>
                                <div class="card-title-m">@{{ editandoCancion ? 'Editar canción' : 'Nueva canción' }}</div>
                                <div class="card-title-sub">Campos con * son obligatorios</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Título *</label>
                            <input type="text" class="form-control" v-model="formCancion.titulo" placeholder="Título de la canción">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Artista *</label>
                            <select class="form-select" v-model="formCancion.artista_id">
                                <option value="">Seleccionar artista</option>
                                <option v-for="a in artistas" :key="a.id" :value="a.id">@{{ a.nombre }}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Género</label>
                            <select class="form-select" v-model="formCancion.genero">
                                <option value="">Seleccionar género</option>
                                <option>Reggaeton</option><option>Pop</option><option>Rock</option>
                                <option>Hip-Hop</option><option>Salsa</option><option>Cumbia</option>
                                <option>Electrónica</option><option>Balada</option><option>Otro</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL Archivo Audio</label>
                            <input type="text" class="form-control" v-model="formCancion.archivo_audio" placeholder="https://...">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">URL Portada</label>
                            <input type="text" class="form-control" v-model="formCancion.portada" placeholder="https://...">
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn-primary-m flex-fill" @click="guardarCancion">
                                <i class="bi bi-check-lg"></i> @{{ editandoCancion ? 'Actualizar' : 'Registrar' }}
                            </button>
                            <button v-if="editandoCancion" class="btn-ghost-m" @click="cancelarCancion">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="search-bar">
                        <div class="field">
                            <label class="form-label">Buscar por título</label>
                            <input type="text" class="form-control" v-model="busCancion.titulo" placeholder="Buscar..." @input="cargarCanciones">
                        </div>
                        <div class="field">
                            <label class="form-label">Filtrar por género</label>
                            <select class="form-select" v-model="busCancion.genero" @change="cargarCanciones">
                                <option value="">Todos</option>
                                <option>Reggaeton</option><option>Pop</option><option>Rock</option>
                                <option>Hip-Hop</option><option>Salsa</option><option>Cumbia</option>
                                <option>Electrónica</option><option>Balada</option><option>Otro</option>
                            </select>
                        </div>
                        <button class="btn-ghost-m" @click="limpiarBusCancion" style="height:38px">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </button>
                    </div>

                    <div class="table-wrap" v-if="canciones.length > 0">
                        <table>
                            <thead>
                                <tr><th>#</th><th>Título</th><th>Artista</th><th>Género</th><th>Acciones</th></tr>
                            </thead>
                            <tbody>
                                <tr v-for="(c, i) in canciones" :key="c.id">
                                    <td style="color:var(--muted);width:40px">@{{ i+1 }}</td>
                                    <td><span style="font-weight:500">@{{ c.titulo }}</span></td>
                                    <td style="color:var(--muted)">@{{ c.artista ? c.artista.nombre : '—' }}</td>
                                    <td>
                                        <span class="badge-m" v-if="c.genero">@{{ c.genero }}</span>
                                        <span style="color:var(--muted)" v-else>—</span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <button class="act-btn act-edit" @click="editarCancion(c)"><i class="bi bi-pencil"></i></button>
                                            <button class="act-btn act-del"  @click="eliminarCancion(c.id)"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="empty" v-else>
                        <i class="bi bi-music-note"></i>
                        <p>No hay canciones registradas aún</p>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="footer-m"> Mango Music &nbsp;·&nbsp; Plataforma para Artistas &nbsp;·&nbsp; Programación IV 2026</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
const { createApp } = Vue;

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
const token = document.querySelector('meta[name="csrf-token"]');
if (token) axios.defaults.headers.common['X-CSRF-TOKEN'] = token.getAttribute('content');

createApp({
    data() {
        return {
            tabActivo: 'artistas',
            artistas:  [],
            canciones: [],
            formArtista:  { nombre: '', genero: '', biografia: '', foto: '' },
            formCancion:  { titulo: '', artista_id: '', genero: '', archivo_audio: '', portada: '' },
            editandoArtista: null,
            editandoCancion: null,
            busArtista: { nombre: '', genero: '' },
            busCancion: { titulo: '', genero: '' },
            notificaciones: [],
        }
    },

    methods: {
        notificar(mensaje, tipo = 'success') {
            const iconos = { success: 'bi bi-check-circle-fill', danger: 'bi bi-x-circle-fill', warning: 'bi bi-exclamation-triangle-fill' };
            this.notificaciones.push({ mensaje, tipo, icono: iconos[tipo] });
            setTimeout(() => this.notificaciones.shift(), 3200);
        },

        async cargarArtistas() {
            try { const r = await axios.get('/api/artistas', { params: this.busArtista }); this.artistas = r.data; }
            catch { this.notificar('Error al cargar artistas', 'danger'); }
        },
        async guardarArtista() {
            if (!this.formArtista.nombre) return this.notificar('El nombre es obligatorio', 'danger');
            if (!this.formArtista.genero) return this.notificar('El género es obligatorio', 'danger');
            try {
                if (this.editandoArtista) { await axios.put(`/api/artistas/${this.editandoArtista}`, this.formArtista); this.notificar('Artista actualizado ✓'); }
                else { await axios.post('/api/artistas', this.formArtista); this.notificar('Artista registrado ✓'); }
                this.cancelarArtista(); this.cargarArtistas();
            } catch(e) { this.notificar(e.response?.data?.message || 'Error al guardar', 'danger'); }
        },
        editarArtista(a)  { this.formArtista = { ...a }; this.editandoArtista = a.id; },
        cancelarArtista() { this.formArtista = { nombre:'', genero:'', biografia:'', foto:'' }; this.editandoArtista = null; },
        async eliminarArtista(id) {
            if (!confirm('¿Eliminar este artista?')) return;
            try { await axios.delete(`/api/artistas/${id}`); this.notificar('Artista eliminado', 'warning'); this.cargarArtistas(); }
            catch { this.notificar('Error al eliminar', 'danger'); }
        },
        limpiarBusArtista() { this.busArtista = { nombre:'', genero:'' }; this.cargarArtistas(); },

        async cargarCanciones() {
            try { const r = await axios.get('/api/canciones', { params: this.busCancion }); this.canciones = r.data; }
            catch { this.notificar('Error al cargar canciones', 'danger'); }
        },
        async guardarCancion() {
            if (!this.formCancion.titulo)     return this.notificar('El título es obligatorio', 'danger');
            if (!this.formCancion.artista_id) return this.notificar('Selecciona un artista', 'danger');
            try {
                if (this.editandoCancion) { await axios.put(`/api/canciones/${this.editandoCancion}`, this.formCancion); this.notificar('Canción actualizada ✓'); }
                else { await axios.post('/api/canciones', this.formCancion); this.notificar('Canción registrada ✓'); }
                this.cancelarCancion(); this.cargarCanciones();
            } catch(e) { this.notificar(e.response?.data?.message || 'Error al guardar', 'danger'); }
        },
        editarCancion(c)  { this.formCancion = { ...c }; this.editandoCancion = c.id; },
        cancelarCancion() { this.formCancion = { titulo:'', artista_id:'', genero:'', archivo_audio:'', portada:'' }; this.editandoCancion = null; },
        async eliminarCancion(id) {
            if (!confirm('¿Eliminar esta canción?')) return;
            try { await axios.delete(`/api/canciones/${id}`); this.notificar('Canción eliminada', 'warning'); this.cargarCanciones(); }
            catch { this.notificar('Error al eliminar', 'danger'); }
        },
        limpiarBusCancion() { this.busCancion = { titulo:'', genero:'' }; this.cargarCanciones(); },
    },

    mounted() {
        this.cargarArtistas();
        this.cargarCanciones();
    }
}).mount('#app');
</script>

</body>
</html>