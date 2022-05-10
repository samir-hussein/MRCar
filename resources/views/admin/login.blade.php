<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>adminLogin</title>
    <link rel="icon" href="{{ asset('images/L.png') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlogin.css') }}">

    <style>
        .success{
            background: #28a745;
            color: white;
            padding: 2%;
        }
        
        .error{
            background: #dc3545;
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
    <div class="login-page">
        <div class="form">
            <form class="login-form" method="post" action="{{ route('admin.submit.login') }}">
                
                @if (session('success'))
                    <p class="success">{{ session('success') }}</p>
                @endif
                @if (session('error'))
                    <p class="error">{{ session('error') }}</p>
                @endif
                
                @csrf
                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"/>
                @error('email')
                <p class="error-msg">* {{ $message }}</p>
                @enderror

                <input type="password" placeholder="password" name="password"/>
                @error('password')
                <p class="error-msg">* {{ $message }}</p>
                @enderror

                <button type="submit">login</button>
            </form>
        </div>
    </div>
</body>

</html>
