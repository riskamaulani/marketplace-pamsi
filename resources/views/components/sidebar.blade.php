<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav " id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('profil') }}">
                <i class="bi bi-person"></i>
                <span>{{ Auth::user()->status->isAdmin() ? 'Profil' : 'Profil Toko' }}</span>
            </a>
        </li>

        @can('viewAny', 'App\Models\Produk')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('produk') }}">
                    <i class="bi bi-bag"></i>
                    <span>Data Produk</span>
                </a>
            </li>
        @endcan

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('transaksi') }}">
                <i class="bi bi-cash"></i>
                <span>Data Transaksi</span>
            </a>
        </li>

        @can('viewAny', 'App\Models\User')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('user', ['r' => 'penjual']) }}">
                    <i class="bi bi-shop"></i>
                    <span>Data Penjual</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('user', ['r' => 'pembeli']) }}">
                    <i class="bi bi-people"></i>
                    <span>Data Pengguna</span>
                </a>
            </li>
        @endcan
    </ul>
</aside>
