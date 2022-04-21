<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt"></i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-dark"> Categories</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark">Category Details</a>
                <a href="/product" class="list-group-item list-group-item-action bg-dark">Products</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark">Product Images</a>
                <a href="/discount" class="list-group-item list-group-item-action bg-dark">Discount</a>
            </div>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>