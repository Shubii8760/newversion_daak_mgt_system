@extends('layout_public.app')

<!DOCTYPE html>
<html lang="en">

<head>
    {{-- @include('Layouts.include.header') --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

@include('Layouts.include.sidebar')

<body>

 <div class="container mt-3">
        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"> Edit Profile </p>
        <form action="" method="post">
            @csrf

          
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}"
                    placeholder="E-mail Address">
                @error('siteemail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone"
                    class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number"
                    value="{{ auth()->user()->phone }}" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Password</label>
                <input type="text" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


    </div>
    <div class="col-12">
        <div class="form-group button">
            <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Update Profile</button>
            {{--  <a role="button" href="admin/index.html" class="bizwheel-btn theme-2">Login</a>  --}}
        </div>
    </div>
    </div>
    </form>
    </div>

    </div>
    </div>
    </div>
    </div>
    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    </div>
    </form>
    </div>
    {{-- @include('Layouts.include.footer') --}}

</body>

</html>
