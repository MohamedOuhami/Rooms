<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Adding the head component --}}
    <x-head />
    <title>Login</title>
</head>

<body class="bg-white">
    {{-- Adding the header component --}}
    <x-header />

    <div>
        <div class="d-flex align-items-center justify-content-center bg-white" style="height:70vh">
          <div class="mx-auto col-10 col-md-8 col-lg-6">
              <div class="bg-danger w-50 text-center w-100 text-white border-red border-primary">
                <p class="m-3">
                    @if (session('status'))
                        {{session('status')}}
                    @endif
                </p>
              </div>
            <form action="{{route('login')}}" method="post">
                @csrf


                <h1 class="text-primary pb-3">Login</h1>

                <div class="form-group pb-3">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                    {{-- Printing the error in case of invalid entry --}}
                    <div class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                

                <div class="form-group pb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name ="password" id="password" placeholder="Password">
                    {{-- Printing the error in case of invalid entry --}}
                    <div class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-check pb-3">
                    <input type="checkbox" class="form-check-input" id="remember_me">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div>

                <button type="submit" class="btn btn-primary">Login</button>

            </form>
          </div>
        </div>
      </div>

</body>

</html>
