<header class="py-3 bg-light">
    <div class="container-fluid d-flex flex-wrap justify-content-center">
        <a href="" class="d-flex align-items-center mb-lg-0 text-black text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor" class="bi bi-vinyl-fill me-2" viewBox="0 0 16 16">
                <path d="M8 6a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0 3a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4 8a4 4 0 1 0 8 0 4 4 0 0 0-8 0z"/>
            </svg>
            <span class="fs-4">Disco Movida</span>
        </a>
    </div>
</header>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">

        <!-- Boton del menú -->

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Elementos del menú colapsable -->

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('inicio') }}">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Funciones
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class='dropdown-item' href='#'>Insertar disco</a></li>
                        <li><a class='dropdown-item' href='{{ route('inventario') }}'>Inventario</a></li>
                    </ul>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='{{ route('contacto') }}'>Contacto</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='{{ route('trabaja') }}'>Trabaja con nosotros</a>
                </li>
            </ul>

            <!-- Boton de inicio de sesion/cerrar sesion -->

            <div class="d-flex">
                <a class='d-md-inline-block btn btn-outline-warning m-auto' tabindex='-1' role='button' href=''>Iniciar Sesión</a>
            </div>

        </div>
    </div>
</nav>
