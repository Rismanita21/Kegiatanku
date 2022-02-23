<nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ route('/') }}">
            KEGIATAN KU
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                {{-- <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link">Welcome Page</a>
                </li> --}}
                @auth
                <li class="nav-item hover">
                    <a href="{{route('dashboard.index')}}" class="nav-link text-white">DASHBOARD</a>
                 @endauth
                </li>
                @role('admin')
                <li class="nav-item hover">
                    <a href="{{route('data.siswa')}}" class="nav-link text-white">DATA SISWA</a>
                </li>
                <li class="nav-item hover">
                    <a href="{{route('manage-kegiatan')}}" class="nav-link text-white">MANAGE KEGIATAN</a>
                </li>
                @endrole
                @role('bendahara')
                <li class="nav-item hover">
                    <a href="{{route('verifikasi-pendaftaran')}}" class="nav-link text-white">VERIFIKASI PENDAFTARAN</a>
                </li>
                @endrole
                @role('student')
                <li class="nav-item hover">
                    <a href="{{route('/')}}" class="nav-link text-white">{{ __('CEK KEGIATAN') }}</a>
                </li>
                <li class="nav-item hover">
                    <a href="{{route('activity')}}" class="nav-link text-white">{{ __('KEGIATANKU') }}</a>
                </li>
                @endrole
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>