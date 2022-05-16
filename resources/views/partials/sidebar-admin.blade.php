        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Farel Shop</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ ($active == 'dashboard') ? 'active ': '' }}">
                <a class="nav-link" href="{{ route('admin.home') }}">
                    <i class='fa fa-desktop'></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ ($active == 'product') ? 'active ': '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fa-solid fa-boxes"></i>
                    <span>Produk</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu:</h6>
                        <a class="collapse-item" href="{{ route('admin.product.main') }}">Daftar</a>
                        <a class="collapse-item" href="{{ route('admin.product.create') }}">Tambah</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ ($active == 'order') ? 'active ': '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-file-invoice"></i>
                    <span>Pesanan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu:</h6>
                        <a class="collapse-item" href="{{ route('admin.order.pending') }}">Tertunda</a>
                        <a class="collapse-item" href="{{ route('admin.order.completed') }}">Selesai</a>
                    </div>
                </div>
            </li>

        </ul>
        <!-- End of Sidebar -->
