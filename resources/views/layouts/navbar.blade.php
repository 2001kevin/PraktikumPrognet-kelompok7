 <!-- header section start -->
 <div class="header_section">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="container">
        <a class="logo" href="index.html"><img src="/images/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                 <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="/about">About</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="/shop">Shop</a>
              </li>
              {{--<li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Categories
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                     @foreach ($product_category as $cat)
                        <li><a class="dropdown-item" href="/viewcategory/{{ $cat->id }}">{{ $cat->category_name }}</a></li> 
                     @endforeach
                  </ul>
              </li>--}}
              <li class="nav-item">
                 <a class="nav-link" href="/contact">Contact</a>
              </li>
         @auth
            <div class="dropdown">
               <button type="button" class="btn btn-danger dropdown-toggle mt-3 mb-3" data-toggle="dropdown">
               Welcome back, {{ auth()->user()->name }}
               </button>
               <div class="dropdown-menu">
               <a class="dropdown-item" href="/profile">My Profile</a>
               <div class="dropdown-divider"></div>
               <form action="{{route('client.logout')}}" method="post">
                  @csrf
               <button type="submit" class="dropdown-item active">Logout</a>
               </form>
               </div>
            </div>
            @else
            <li class="nav-item">
               <a class="nav-link" href="{{ route('client.login') }}"
                <i class="bi bi-box-arrow-in-right"></i>Login</a>
            </li>
            @endauth
           </ul>
        </div>
  </nav>
  </div>
</div>
