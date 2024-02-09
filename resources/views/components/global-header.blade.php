<header class="navbar-user py-2 mb-4">
    <div class="container">
        <div class="row">
            <div class="col my-auto">
                <a href="{{ route('home') }}"><img src="../assets/img/logo-pamsi-marketplace-green.png" alt="" style="height:2rem;width:auto;"></a>
            </div>

            <div class="col">
                <div class="search-bar">
                    <form class="search-form d-flex align-items-center" method="POST" action="#">
                        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>

            <div class="col ms-auto">
                <nav class="header-nav ">
                    <ul class="d-flex flex-row-reverse">
                        <li class="nav-item dropdown pe-3">
                            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('profil') }}">
                                        <i class="bi bi-person"></i>
                                        <span>Profil</span>
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('transaksi') }}">
                                        <i class="bi bi-bag"></i>
                                        <span>Pesanan Saya</span>
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Keluar Akun</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item pe-3">
                            <a class="nav-link nav-icon" href="{{ route('keranjang') }}">
                                <i class="bi bi-cart2"></i>
                            </a>
                        </li>

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link nav-icon align-items-right" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-bell"></i>
                                <span class="badge bg-primary badge-number">4</span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                                <li class="dropdown-header">
                                    You have 4 new notifications
                                    <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View
                                            all</span></a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li class="notification-item">
                                    <i class="bi bi-exclamation-circle text-warning"></i>
                                    <div>
                                        <h4>Lorem Ipsum</h4>
                                        <p>Quae dolorem earum veritatis oditseno</p>
                                        <p>30 min. ago</p>
                                    </div>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li class="notification-item">
                                    <i class="bi bi-x-circle text-danger"></i>
                                    <div>
                                        <h4>Atque rerum nesciunt</h4>
                                        <p>Quae dolorem earum veritatis oditseno</p>
                                        <p>1 hr. ago</p>
                                    </div>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li class="notification-item">
                                    <i class="bi bi-check-circle text-success"></i>
                                    <div>
                                        <h4>Sit rerum fuga</h4>
                                        <p>Quae dolorem earum veritatis oditseno</p>
                                        <p>2 hrs. ago</p>
                                    </div>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li class="notification-item">
                                    <i class="bi bi-info-circle text-primary"></i>
                                    <div>
                                        <h4>Dicta reprehenderit</h4>
                                        <p>Quae dolorem earum veritatis oditseno</p>
                                        <p>4 hrs. ago</p>
                                    </div>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li class="dropdown-footer">
                                    <a href="#">Show all notifications</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>