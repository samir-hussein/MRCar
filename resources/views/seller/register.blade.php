<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>register</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('images/L.png') }}">

    <style>
        .success{
            background: #28a745;
            color: white;
            padding: 2%;
        }

      .error-msg{
          color: #8f0622;
          padding: 0;
          margin: 2% 0;
          text-align: left
      }
    </style>
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="login-page">
        <div class="form">
            <form class="login-form" method="post" action="{{ route('seller.submit.register') }}">
                @if (session('success'))
                    <p class="success">{{ session('success') }}</p>
                @endif
                
                @csrf
                <input type="text" placeholder="name" name="name" value="{{ old('name') }}"/>
                @error('name')
                <p class="error-msg">* {{ $message }}</p>
                @enderror

                <input type="text" placeholder="phone" name="phone" value="{{ old('phone') }}"/>
                @error('phone')
                <p class="error-msg">* {{ $message }}</p>
                @enderror

                <input type="email" placeholder="email address" name="email" value="{{ old('email') }}"/>
                @error('email')
                <p class="error-msg">* {{ $message }}</p>
                @enderror

                <input type="password" placeholder="password" name="password" />
                @error('password')
                <p class="error-msg">* {{ $message }}</p>
                @enderror

                <input type="password" placeholder="confirm password" name="confirm_password" />
                <button type="submit">create</button>
                <p class="message">Not registered? <a href="{{ route('seller.login') }}">Login</a></p>
            </form>
        </div>
    </div>
    <!-- partial -->
</body>

</html>
