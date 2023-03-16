<div class="px-5 bg-primary">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="{{route('dashboard')}}">Room/Machine Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('user-management')}}" >User Management</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user-add-form')}}">Add Users</a>
                    </li>
                    <li class="nav-item">
                        <form method="post" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-primary">Logout</button>
                        </form>
                    </li>
            </ul>
        </div>
    </nav>
</div>