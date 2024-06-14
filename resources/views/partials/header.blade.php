 <header class="sticky-top d-flex gradient p-2 shadow-lg navbar-light bg-primary jsb">
        <h2 class="pr-2">
            <a href="{{ route('welcome') }}">
                TrackApp
            </a>
        </h2>
        <div class="d-flex gap-5 aic">
            <a href="{{ route('admin.modules.index') }}" target="_blank">
                <i class="fas fa-gear"></i>
            </a>
            <div class="dropdown">
                <div class="position-relative dropdown-toggle d-none" id="notification-icon" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-danger position-absolute bottom-0">0</span>
                </div>
                <ul class="dropdown-menu" id="notification-list">
                </ul>
            </div>
            <button id="theme-toggle" class="btn btn-outline-light">
                <i class="fas fa-moon"></i>
            </button>
        </div>
    </header>
