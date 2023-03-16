{{-- <svg xmlns="http://www.w3.org/2000/svg" class="position-absolute" viewBox="0 0 1440 320">
    <path fill="#0099ff" fill-opacity="1"
        d="M0,320L60,272C120,224,240,128,360,101.3C480,75,600,117,720,133.3C840,149,960,139,1080,128C1200,117,1320,107,1380,101.3L1440,96L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
    </path>
</svg> --}}

<div class="px-5 bg-primary">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="{{route('dashboard')}}">Room/Machine Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('room') }}">Room Manager</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('machine') }}">Machine Manager</a>
                    </li>
                    <li class="nav-item">
                        <form method="post" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-primary">Logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>

                @endguest
            </ul>
        </div>
    </nav>
</div>
