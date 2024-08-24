<nav class="navbar navbar-expand-lg shadow shadow-sm p-3 navbar-admin">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-light" href="#">
            <i class="fas fa-cogs me-2"></i>Admin Panel
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link active text-light" aria-current="page" href="#">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link text-light fw-normal" href="#">
                        <i class="fas fa-file-alt me-2"></i>Data Postingan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.pesan')}}" class="nav-link text-light fw-normal" href="#">
                        <i class="fas fa-envelope me-2"></i>Pesan Masuk
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.user')}}" class="nav-link text-light fw-normal" href="#">
                        <i class="fa fa-user me-2"></i>User Login
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link text-light fw-normal" href="#">
                        <i class="fas fa-globe me-2"></i>Lihat Website
                    </a>
                </li>
            </ul>
            <a class="nav-link btn-login ms-auto" href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </a>
        </div>
    </div>
</nav>
