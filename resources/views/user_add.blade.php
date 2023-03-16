<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Adding the head component --}}
    <x-head />
</head>

<body class="bg-white">
    {{-- Adding the header component --}}
    <x-super_admin_header />
    <div>
        <div class="d-flex align-items-center justify-content-center bg-white" style="height:90vh">
            <div class="mx-auto col-10 col-md-8 col-lg-6">
                <div class="bg-success w-50 text-center w-100 text-white border-green border-primary">
                    <p class="m-3">
                        @if (session('status'))
                            {{session('status')}}
                        @endif
                    </p>
                  </div>
                <form action="{{ route('user-add-store') }}" method="post" class="bg-white p-5 ">
                    @csrf
                    <h1 class="text-primary pb-3">Add Users</h1>

                    <div class="form-group pb-3">
                        <label hidden for="username">Username</label>
                        <input type="text" class="form-control @error('username')border border-danger @enderror"
                            id="username" name="username" placeholder="Username" value="{{old("username")}}">
                        {{-- Printing the error in case of invalid entry --}}
                        <div class="text-danger">
                            @error('username')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group pb-3">
                        <label hidden for="fullname">Full name</label>
                        <input type="text" class="form-control @error('fullname')border border-danger @enderror"
                            id="fullname" name="fullname" placeholder="Full name" value="{{old('fullname')}}">

                        {{-- Printing the error in case of invalid entry --}}
                        <div class="text-danger">
                            @error('fullname')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group pb-3">
                        <label hidden for="email">Email address</label>
                        <input type="email" class="form-control @error('email')border border-danger @enderror"
                            id="email" name="email" placeholder="Email adress" value="{{old('email')}}">

                        {{-- Printing the error in case of invalid entry --}}
                        <div class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group pb-3">
                        <label hidden for="password">Password</label>
                        <input type="password" class="form-control @error('password')border border-danger @enderror"
                            id="password" name="password" placeholder="Password">
                        {{-- Printing the error in case of invalid entry --}}
                        <div class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group pb-3">
                        <label hidden for="password">Confirm Password</label>
                        <input type="password"
                            class="form-control @error('password_confirmation')border border-danger @enderror"
                            id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation">

                        {{-- Printing the error in case of invalid entry --}}
                        <div class="text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
