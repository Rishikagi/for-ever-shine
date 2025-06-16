<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel Login | Admin</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/admin_login.css') }}">
</head>

<body>
    <div class="workSpace">
        <div class="avatar" >
            <div id="infinity">
               <!-- <img src="http://127.0.0.1:8000/images/favicon.png" alt=""> -->
            </div>
        </div>
        <div class="left">
            <img src="{{asset('images/Logo.png')}}" alt="footer-logo" style="max-width: 39%;">
            <h1 class="logo">Welcome to Admin</h1>
            <p>Online eCommerce Portal
            </p>
        </div>
        <div class="right">
            <form action="{{ route('admin.login') }}" id="" method="post">
                @csrf
                <h1>SignIn</h1>
                @error('error')
                  <p class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </p>
               @enderror
                @error('email')
                <p class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </p>
                @enderror
                @error('password')
                <p class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </p>
                @enderror
                <input class="input" type="email" placeholder="Enter your email" name="email" value="{{ old('email') }}"
                    required autocomplete="off">
                <input class="input" name="password" type="password" placeholder="Enter your password" required
                    autocomplete="off">
                <div class="login-btn-box">
                    <button class="submit">Log In</button>
                </div>
            </form>
        </div>
    </div>
</body>
</body>

</html>