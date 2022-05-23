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
              <li class="nav-item">
                 <a class="nav-link" href="/contact">Contact</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="/cart"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
              </li>
         @auth
            <div class="dropdown">
               <button type="button" class="btn btn-danger dropdown-toggle mt-1" data-toggle="dropdown">
               Welcome back, {{ auth()->user()->name }}
               </button>
               <div class="dropdown-menu">
               <a class="dropdown-item" href="/profile">My Profile</a>
               <div class="dropdown-divider"></div>
               <form action="/sign-out" method="post">
                  @csrf
               <button type="submit" class="dropdown-item active">Logout</a>
               </form>
               </div>
            </div>
         @else
            <li class="nav-item">
               <a class="nav-link" href="/user/login">
               <i class="bi bi-box-arrow-in-right"></i>Login</a>
            </li>
         @endauth
           </ul>
        </div>
  </nav>
  </div>
</div>
