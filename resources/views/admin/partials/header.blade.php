<header class="navbar navbar-dark sticky-top bg-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="/admin/dashboard">
            <i class="bi bi-speedometer2 me-2"></i>
            Pet Shop Admin
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Выход</button>
        </form>
    </div>
</header>