<form action="{{ route('logout') }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-danger btn-sm nav-link text-white px-3 align-middle">
        <i class="fas fa-sign-out-alt me-1"></i> Keluar Aplikasi
    </button>
</form>