 <!-- header section start -->
 <div class="header_section">
  <nav class="navbar navbar-expand-md navbar-fixed-top navbar-light bg-light">
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
                 <a class="nav-link" href="/history">Transaksiku</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="/cart"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
              </li>
              @auth
              <div id="navbar-menu">
                  <ul class="nav navbar-nav navbar-right mr-3">
                      <li class="dropdown">
                      <a href="#" class="nav-link dropdown-toggle icon-menu" data-toggle="dropdown" style="text-decoration: none">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                          </svg>
                          @php $user_unRead = App\Models\user_notification::where('notifiable_id', Auth::user()->id)->where('read_at', NULL)->orderBy('created_at','desc')->count(); @endphp
                          <span class="badge bg-danger">@php echo $user_unRead @endphp</span>
                      </a>
  
                      <ul class="dropdown-menu notifications">
                          @php $user_notifikasi = App\Models\user_notification::where('notifiable_id', Auth::user()->id)->where('read_at', NULL)->orderBy('created_at','desc')->paginate(5); @endphp
                          @forelse ($user_notifikasi as $notifikasi)
                            @php $notif = json_decode($notifikasi->data); @endphp
                            <li>
                              <a href="#" class="dropdown-item btnunNotif" data-num=""><small> <img src="{{url('image/profile.jpg')}}" style="height:15px; width:15px; border-radius: 50%;" class="mr-1">[{{ $notif->nama }}] {{ $notif->message }}</small></a>
                            </li>
                          @empty
                              <li>
                                <a href="#" class="dropdown-item btnunNotif" data-num="" >
                                  &nbsp;<small>Tidak ada notifikasi</small>
                                </a>
                              </li>
                          @endforelse
                          @if($user_unRead >= 5)
                              <a href="{{ route('user.notification-all') }}" class="dropdown-item btnunNotif" data-num=""><small><span class="badge badge-primary">Lihat Semua Notifikasis</span></small></a>
                          @endif
                      </ul>
                  </ul>
              </div>
            <div class="dropdown">
               <button type="button" class="btn btn-danger dropdown-toggle mt-1" data-toggle="dropdown">
                  Welcome back, {{ auth()->user()->name }}
               </button>
               <div class="dropdown-menu">
               <a class="dropdown-item" href="/profile">My Profile</a>
               <div class="dropdown-divider"></div>
               <form action="/logout" method="post">
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
