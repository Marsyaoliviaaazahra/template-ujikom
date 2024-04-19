<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="dashboard-ecommerce.html">Stisla Admin</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="dashboard-ecommerce.html">SA</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a class="nav-link" href=""><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li class="{{ Request::is('product*') ? 'active' : '' }}"><a class="nav-link" href=""><i class="fa-solid fa-phone"></i> <span>Product</span></a></li>
            <li class="{{ Request::is('sale*') ? 'active' : '' }}"><a class="nav-link" href=""><i class="fa-solid fa-shop"></i> <span>Sale</span></a></li>

            <li class="{{ Request::is('user*') ? 'active' : '' }}"><a class="nav-link" href=""><i class="fas fa-user"></i> <span>Account</span></a></li>
        </ul>
    </aside>
</div>
