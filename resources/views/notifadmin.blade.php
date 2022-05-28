@extends('layouts.admin')
@section('content')
    <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-left mr-3">
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
                                <a href="{{ route('user.notification', $notifikasi->id) }}" class="dropdown-item btnunNotif" data-num=""><small> <img src="{{url('image/profile.jpg')}}" style="height:15px; width:15px; border-radius: 50%;" class="mr-1">[{{ $notif->nama }}] {{ $notif->message }}</small></a>
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
@endsection