<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mango Music</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --mango-orange: #FF6B00;
            --mango-yellow: #FFB800;
            --mango-dark: #0D0D0D;
            --mango-card: #161616;
            --mango-border: #2a2a2a;
            --mango-text: #e8e8e8;
            --mango-muted: #888;
        }

        * { box-sizing: border-box; }

        body {
            background-color: var(--mango-dark);
            color: var(--mango-text);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar-mango {
            background: linear-gradient(135deg, #0D0D0D 60%, #1a0f00);
            border-bottom: 2px solid var(--mango-orange);
            padding: 12px 24px;
        }

        .brand-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2rem;
            letter-spacing: 3px;
            background: linear-gradient(90deg, var(--mango-orange), var(--mango-yellow));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .brand-emoji { font-size: 1.8rem; }

        /* HERO */
        .hero-section {
            background: linear-gradient(135deg, #1a0a00 0%, #0D0D0D 50%, #0a0a1a 100%);
            padding: 48px 24px 32px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: 50%;
            transform: translateX(-50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255,107,0,0.08) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            letter-spacing: 5px;
            background: linear-gradient(90deg, var(--mango-orange), var(--mango-yellow), var(--mango-orange));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
        }

        .hero-sub {
            color: var(--mango-muted);
            font-size: 1rem;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* STATS BAR */
        .stats-bar {
            display: flex;
            justify-content: center;
            gap: 32px;
            margin-top: 24px;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2rem;
            color: var(--mango-orange);
            line-height: 1;
        }

        .stat-label {
            font-size: 0.7rem;
            color: var(--mango-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* TABS */
        .tabs-wrapper {
            padding: 24px 16px 0;
            max-width: 1100px;
            margin: 0 auto;
        }

        .nav-tabs {
            border-bottom: 2px solid var(--mango-border);
            gap: 4px;
        }

        .nav-tabs .nav-link {
            color: var(--mango-muted);
            border: none;
            border-bottom: 3px solid transparent;
            background: transparent;
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.1rem;
            letter-spacing: 2px;
            padding: 10px 24px;
            transition: all 0.2s;
        }

        .nav-tabs .nav-link:hover {
            color: var(--mango-yellow);
            border-bottom-color: var(--mango-yellow);
        }

        .nav-tabs .nav-link.active {
            color: var(--mango-orange);
            border-bottom: 3px solid var(--mango-orange);
            background: transparent;
        }

        /* CARDS */
        .card-mango {
            background: var(--mango-card);
            border: 1px solid var(--mango-border);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 20px;
        }

        .card-mango-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.4rem;
            letter-spacing: 2px;
            color: var(--mango-orange);
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* FORM */
        .form-control, .form-select {
            background: #1f1f1f;
            border: 1px solid var(--mango-border);
            color: var(--mango-text);
            border-radius: 8px;
            padding: 10px 14px;
            transition: border-color 0.2s;
        }

        .form-control:focus, .form-select:focus {
            background: #1f1f1f;
            border-color: var(--mango-orange);
            color: var(--mango-text);
            box-shadow: 0 0 0 3px rgba(255,107,0,0.15);
        }

        .form-control::placeholder { color: #555; }

        .form-label {
            color: #ccc;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 6px;
        }

        /* BUTTONS */
        .btn-mango {
            background: linear-gradient(135deg, var(--mango-orange), #e55a00);
            border: none;
            color: white;
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 2px;
            font-size: 1rem;
            padding: 10px 24px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .btn-mango:hover {
            background: linear-gradient(135deg, var(--mango-yellow), var(--mango-orange));
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(255,107,0,0.3);
        }

        .btn-mango-outline {
            background: transparent;
            border: 1px solid var(--mango-orange);
            color: var(--mango-orange);
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 2px;
            font-size: 1rem;
            padding: 10px 24px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .btn-mango-outline:hover {
            background: var(--mango-orange);
            color: white;
        }

        /* TABLE */
        .table-mango {
            color: var(--mango-text);
        }

        .table-mango thead th {
            background: #1a1a1a;
            color: var(--mango-orange);
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 2px;
            font-size: 0.9rem;
            border-color: var(--mango-border);
            padding: 12px 16px;
        }

        .table-mango tbody td {
            background: var(--mango-card);
            border-color: var(--mango-border);
            padding: 12px 16px;
            vertical-align: middle;
            font-size: 0.92rem;
        }

        .table-mango tbody tr:hover td {
            background: #1e1e1e;
        }

        /* SEARCH BAR */
        .search-wrapper {
            background: #111;
            border: 1px solid var(--mango-border);
            border-radius: 10px;
            padding: 16px;
            margin-bottom: 20px;
        }

        /* BADGE */
        .badge-genero {
            background: rgba(255,107,0,0.15);
            color: var(--mango-orange);
            border: 1px solid rgba(255,107,0,0.3);
            font-size: 0.75rem;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 500;
        }

        /* ALERT */
        .alert-mango {
            border-radius: 8px;
            font-size: 0.9rem;
            padding: 12px 16px;
            border: none;
        }

        /* ACTIONS */
        .btn-action {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            transition: all 0.2s;
            cursor: pointer;
        }

        .btn-edit {
            background: rgba(255,184,0,0.15);
            color: var(--mango-yellow);
        }

        .btn-edit:hover { background: var(--mango-yellow); color: #000; }

        .btn-delete {
            background: rgba(220,53,69,0.15);
            color: #dc3545;
        }

        .btn-delete:hover { background: #dc3545; color: white; }

        /* TAB CONTENT */
        .tab-content { padding: 24px 0; }

        /* DIVIDER */
        .section-divider {
            border: none;
            border-top: 1px solid var(--mango-border);
            margin: 24px 0;
        }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 40px;
            color: var(--mango-muted);
        }

        .empty-state i { font-size: 2.5rem; margin-bottom: 12px; opacity: 0.4; }

        /* NOTIFICATION */
        .notif-container {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 9999;
            width: 320px;
        }

        .notif-item {
            border-radius: 10px;
            padding: 14px 18px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            animation: slideIn 0.3s ease;
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
        }

        .notif-success { background: #0f2d1a; border-left: 4px solid #28a745; color: #5cdb95; }
        .notif-danger  { background: #2d0f0f; border-left: 4px solid #dc3545; color: #ff6b6b; }
        .notif-warning { background: #2d1f00; border-left: 4px solid var(--mango-yellow); color: var(--mango-yellow); }
        .notif-info    { background: #0f1a2d; border-left: 4px solid #0d6efd; color: #6ea8fe; }

        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to   { transform: translateX(0);    opacity: 1; }
        }

        /* FOOTER */
        .footer-mango {
            text-align: center;
            padding: 20px;
            color: var(--mango-muted);
            font-size: 0.8rem;
            border-top: 1px solid var(--mango-border);
            margin-top: 40px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .stats-bar { gap: 16px; }
            .brand-title { font-size: 1.5rem; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-mango navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center gap-2" href="#">
            <span class="brand-title">Mango Music</span>
        </a>
        <span style="color: var(--mango-muted); font-size:0.8rem; letter-spacing:1px;">
            ARTIST PLATFORM
        </span>
    </div>
</nav>

<!-- HERO -->
<div class="hero-section">
    <div class="hero-title">DASHBOARD</div>
    <div class="hero-sub">Gestión de Artistas & Canciones</div>
</div>

<!-- MAIN APP -->
<div id="app" class="tabs-wrapper">

    <!-- NOTIFICACIONES -->
    <div class="notif-container">
        <div v-for="(n, i) in notificaciones" :key="i" :class="`notif-item notif-${n.tipo}`">
            <i :class="n.icono"></i>
            <span>@{{ n.mensaje }}</span>
        </div>
    </div>

    <!-- TABS -->
    <ul class="nav nav-tabs" id="mainTabs">
        <li class="nav-item">
            <button class="nav-link" :class="{active: tabActivo === 'artistas'}" @click="tabActivo = 'artistas'">
                <i class="bi bi-person-badge me-1"></i> Artistas
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link" :class="{active: tabActivo === 'canciones'}" @click="tabActivo = 'canciones'">
                <i class="bi bi-music-note-beamed me-1"></i> Canciones
            </button>
        </li>
    </ul>

    <div class="tab-content">

        <!-- ===== TAB ARTISTAS ===== -->
        <div v-show="tabActivo === 'artistas'">

            <div class="row g-4">

                <!-- FORMULARIO ARTISTA -->
                <div class="col-lg-4">
                    <div class="card-mango">
                        <div class="card-mango-title">
                            <i class="bi bi-person-plus"></i>
                            @{{ editandoArtista ? 'Editar Artista' : 'Nuevo Artista' }}
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nombre *</label>
                            <input type="text" class="form-control" v-model="formArtista.nombre" placeholder="Nombre del artista">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Género *</label>
                            <select class="form-select" v-model="formArtista.genero">
                                <option value="">Seleccionar género</option>
                                <option>Reggaeton</option>
                                <option>Pop</option>
                                <option>Rock</option>
                                <option>Hip-Hop</option>
                                <option>Salsa</option>
                                <option>Cumbia</option>
                                <option>Electrónica</option>
                                <option>Balada</option>
                                <option>Otro</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Biografía</label>
                            <textarea class="form-control" v-model="formArtista.biografia" rows="3" placeholder="Descripción del artista..."></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">URL Foto</label>
                            <input type="text" class="form-control" v-model="formArtista.foto" placeholder="https://...">
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-mango flex-fill" @click="guardarArtista">
                                <i class="bi bi-check-lg me-1"></i>
                                @{{ editandoArtista ? 'Actualizar' : 'Registrar' }}
                            </button>
                            <button v-if="editandoArtista" class="btn btn-mango-outline" @click="cancelarArtista">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- LISTA ARTISTAS -->
                <div class="col-lg-8">

                    <!-- BÚSQUEDA -->
                    <div class="search-wrapper">
                        <div class="row g-2 align-items-end">
                            <div class="col-md-5">
                                <label class="form-label">Buscar por nombre</label>
                                <input type="text" class="form-control" v-model="busArtista.nombre" placeholder="Buscar artista..." @input="cargarArtistas">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Filtrar por género</label>
                                <select class="form-select" v-model="busArtista.genero" @change="cargarArtistas">
                                    <option value="">Todos</option>
                                    <option>Reggaeton</option>
                                    <option>Pop</option>
                                    <option>Rock</option>
                                    <option>Hip-Hop</option>
                                    <option>Salsa</option>
                                    <option>Cumbia</option>
                                    <option>Electrónica</option>
                                    <option>Balada</option>
                                    <option>Otro</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-mango-outline w-100" @click="limpiarBusArtista">
                                    <i class="bi bi-arrow-counterclockwise me-1"></i> Limpiar
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- TABLA -->
                    <div class="card-mango p-0" style="overflow:hidden">
                        <table class="table table-mango mb-0" v-if="artistas.length > 0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Género</th>
                                    <th>Biografía</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(a, i) in artistas" :key="a.id">
                                    <td style="color:var(--mango-muted)">@{{ i + 1 }}</td>
                                    <td><strong>@{{ a.nombre }}</strong></td>
                                    <td><span class="badge-genero">@{{ a.genero }}</span></td>
                                    <td style="color:var(--mango-muted); font-size:0.85rem; max-width:180px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                                        @{{ a.biografia || '—' }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <button class="btn-action btn-edit" @click="editarArtista(a)" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn-action btn-delete" @click="eliminarArtista(a.id)" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="empty-state" v-else>
                            <div><i class="bi bi-person-x d-block"></i></div>
                            <div>No hay artistas registrados</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- ===== TAB CANCIONES ===== -->
        <div v-show="tabActivo === 'canciones'">

            <div class="row g-4">

                <!-- FORMULARIO CANCION -->
                <div class="col-lg-4">
                    <div class="card-mango">
                        <div class="card-mango-title">
                            <i class="bi bi-music-note-plus"></i>
                            @{{ editandoCancion ? 'Editar Canción' : 'Nueva Canción' }}
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
                                <option>Reggaeton</option>
                                <option>Pop</option>
                                <option>Rock</option>
                                <option>Hip-Hop</option>
                                <option>Salsa</option>
                                <option>Cumbia</option>
                                <option>Electrónica</option>
                                <option>Balada</option>
                                <option>Otro</option>
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
                            <button class="btn btn-mango flex-fill" @click="guardarCancion">
                                <i class="bi bi-check-lg me-1"></i>
                                @{{ editandoCancion ? 'Actualizar' : 'Registrar' }}
                            </button>
                            <button v-if="editandoCancion" class="btn btn-mango-outline" @click="cancelarCancion">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- LISTA CANCIONES -->
                <div class="col-lg-8">

                    <!-- BÚSQUEDA -->
                    <div class="search-wrapper">
                        <div class="row g-2 align-items-end">
                            <div class="col-md-5">
                                <label class="form-label">Buscar por título</label>
                                <input type="text" class="form-control" v-model="busCancion.titulo" placeholder="Buscar canción..." @input="cargarCanciones">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Filtrar por género</label>
                                <select class="form-select" v-model="busCancion.genero" @change="cargarCanciones">
                                    <option value="">Todos</option>
                                    <option>Reggaeton</option>
                                    <option>Pop</option>
                                    <option>Rock</option>
                                    <option>Hip-Hop</option>
                                    <option>Salsa</option>
                                    <option>Cumbia</option>
                                    <option>Electrónica</option>
                                    <option>Balada</option>
                                    <option>Otro</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-mango-outline w-100" @click="limpiarBusCancion">
                                    <i class="bi bi-arrow-counterclockwise me-1"></i> Limpiar
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- TABLA -->
                    <div class="card-mango p-0" style="overflow:hidden">
                        <table class="table table-mango mb-0" v-if="canciones.length > 0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Título</th>
                                    <th>Artista</th>
                                    <th>Género</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(c, i) in canciones" :key="c.id">
                                    <td style="color:var(--mango-muted)">@{{ i + 1 }}</td>
                                    <td><strong>@{{ c.titulo }}</strong></td>
                                    <td style="color:var(--mango-muted)">@{{ c.artista ? c.artista.nombre : '—' }}</td>
                                    <td><span class="badge-genero" v-if="c.genero">@{{ c.genero }}</span><span v-else style="color:var(--mango-muted)">—</span></td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <button class="btn-action btn-edit" @click="editarCancion(c)" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn-action btn-delete" @click="eliminarCancion(c.id)" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="empty-state" v-else>
                            <div><i class="bi bi-music-note d-block"></i></div>
                            <div>No hay canciones registradas</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div><!-- end tab-content -->
</div><!-- end #app -->

<div class="footer-mango">
    Mango Music — Plataforma para Artistas &nbsp;·&nbsp; Programación IV 2026
</div>

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
const { createApp } = Vue;

// CSRF para Laravel
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
const token = document.querySelector('meta[name="csrf-token"]');
if (token) axios.defaults.headers.common['X-CSRF-TOKEN'] = token.getAttribute('content');

createApp({
    data() {
        return {
            tabActivo: 'artistas',

            // Artistas
            artistas: [],
            formArtista: { nombre: '', genero: '', biografia: '', foto: '' },
            editandoArtista: null,
            busArtista: { nombre: '', genero: '' },

            // Canciones
            canciones: [],
            formCancion: { titulo: '', artista_id: '', genero: '', archivo_audio: '', portada: '' },
            editandoCancion: null,
            busCancion: { titulo: '', genero: '' },

            // Notificaciones
            notificaciones: [],
        }
    },

    computed: {
        totalArtistas() { return this.artistas.length; },
        totalCanciones() { return this.canciones.length; }
    },

    methods: {

        // ---- NOTIFICACIONES ----
        notificar(mensaje, tipo = 'success') {
            const iconos = {
                success: 'bi bi-check-circle-fill',
                danger:  'bi bi-x-circle-fill',
                warning: 'bi bi-exclamation-triangle-fill',
                info:    'bi bi-info-circle-fill'
            };
            this.notificaciones.push({ mensaje, tipo, icono: iconos[tipo] || iconos.info });
            setTimeout(() => this.notificaciones.shift(), 3500);
        },

        // ---- ARTISTAS ----
        async cargarArtistas() {
            try {
                const res = await axios.get('/api/artistas', { params: this.busArtista });
                this.artistas = res.data;
            } catch (e) {
                this.notificar('Error al cargar artistas', 'danger');
            }
        },

        async guardarArtista() {
            if (!this.formArtista.nombre) return this.notificar('El nombre es obligatorio', 'danger');
            if (!this.formArtista.genero) return this.notificar('El género es obligatorio', 'danger');
            try {
                if (this.editandoArtista) {
                    await axios.put(`/api/artistas/${this.editandoArtista}`, this.formArtista);
                    this.notificar('Artista actualizado correctamente ✓', 'success');
                } else {
                    await axios.post('/api/artistas', this.formArtista);
                    this.notificar('Artista registrado correctamente ✓', 'success');
                }
                this.cancelarArtista();
                this.cargarArtistas();
            } catch (e) {
                const msg = e.response?.data?.message || 'Error al guardar artista';
                this.notificar(msg, 'danger');
            }
        },

        editarArtista(a) {
            this.formArtista = { ...a };
            this.editandoArtista = a.id;
        },

        cancelarArtista() {
            this.formArtista = { nombre: '', genero: '', biografia: '', foto: '' };
            this.editandoArtista = null;
        },

        async eliminarArtista(id) {
            if (!confirm('¿Estás seguro de eliminar este artista?')) return;
            try {
                await axios.delete(`/api/artistas/${id}`);
                this.notificar('Artista eliminado', 'warning');
                this.cargarArtistas();
            } catch (e) {
                this.notificar('Error al eliminar artista', 'danger');
            }
        },

        limpiarBusArtista() {
            this.busArtista = { nombre: '', genero: '' };
            this.cargarArtistas();
        },

        // ---- CANCIONES ----
        async cargarCanciones() {
            try {
                const res = await axios.get('/api/canciones', { params: this.busCancion });
                this.canciones = res.data;
            } catch (e) {
                this.notificar('Error al cargar canciones', 'danger');
            }
        },

        async guardarCancion() {
            if (!this.formCancion.titulo)     return this.notificar('El título es obligatorio', 'danger');
            if (!this.formCancion.artista_id) return this.notificar('Selecciona un artista', 'danger');
            try {
                if (this.editandoCancion) {
                    await axios.put(`/api/canciones/${this.editandoCancion}`, this.formCancion);
                    this.notificar('Canción actualizada correctamente ✓', 'success');
                } else {
                    await axios.post('/api/canciones', this.formCancion);
                    this.notificar('Canción registrada correctamente ✓', 'success');
                }
                this.cancelarCancion();
                this.cargarCanciones();
            } catch (e) {
                const msg = e.response?.data?.message || 'Error al guardar canción';
                this.notificar(msg, 'danger');
            }
        },

        editarCancion(c) {
            this.formCancion = { ...c };
            this.editandoCancion = c.id;
        },

        cancelarCancion() {
            this.formCancion = { titulo: '', artista_id: '', genero: '', archivo_audio: '', portada: '' };
            this.editandoCancion = null;
        },

        async eliminarCancion(id) {
            if (!confirm('¿Estás seguro de eliminar esta canción?')) return;
            try {
                await axios.delete(`/api/canciones/${id}`);
                this.notificar('Canción eliminada', 'warning');
                this.cargarCanciones();
            } catch (e) {
                this.notificar('Error al eliminar canción', 'danger');
            }
        },

        limpiarBusCancion() {
            this.busCancion = { titulo: '', genero: '' };
            this.cargarCanciones();
        },
    },

    mounted() {
        this.cargarArtistas();
        this.cargarCanciones();
    }

}).mount('#app');
</script>

</body>
</html>