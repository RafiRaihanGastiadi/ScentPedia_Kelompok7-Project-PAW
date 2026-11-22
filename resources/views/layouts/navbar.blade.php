<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4 text-warning" href="/">ScentPedia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Katalog Parfum</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Brand</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Wishlist</a></li>
            </ul>
            <form class="d-flex me-3" action="#" method="GET">
                <input class="form-control me-2 bg-secondary text-white border-0" type="search" placeholder="Cari parfum/brand..." aria-label="Search">
            </form>
            <div class="d-flex align-items-center gap-2">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-warning btn-sm">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-warning btn-sm fw-semibold">Register</a>
                @endguest

                @auth
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.perfumes.index') }}" class="btn btn-outline-warning btn-sm me-1">
                            <i class="fas fa-cog me-1"></i> Kelola Parfum
                        </a>
                    @endif

                    <a href="{{ route('profile.edit') }}" class="btn btn-dark border-secondary btn-sm d-flex align-items-center gap-2 text-white">
                        @if(Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="rounded-circle object-fit-cover" width="22" height="22">
                        @else
                            <span class="badge rounded-circle bg-warning text-dark fw-bold d-flex align-items-center justify-content-center" style="width: 22px; height: 22px;">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                        @endif
                        <span>{{ Auth::user()->name }}</span>
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="d-inline m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>