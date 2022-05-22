
<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt"></i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="/product_category" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    Categories
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="/product_category_detail" class="nav-link">
                  <i class="nav-icon fas fa-folder-open"></i>
                    Category Details
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/product" class="nav-link">
                      <i class="nav-icon fas fa-shopping-cart"></i>
                      Products
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/product_image" class="nav-link">
                      <i class="nav-icon fas fa-thin fa-images"></i>
                      Product Images
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/courier" class="nav-link">
                      <i class="nav-icon fas fa-thin fa-images"></i>
                      Courier
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="/discount" class="nav-link">
                  <i class="nav-icon fas fa-thin fa-tags"></i>        
                    Discount
                </a>
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
@endsection