<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('register.submit') }}" method="POST">
        @csrf
        <!--csrf is used to protect the form from cross-site request forgery attacks-->
        <input type="text" name="name" required placeholder="Name"><br>
        @error('name')
            {{ $message }}
        @enderror
    
        <input type="email" name="email" required placeholder="Email"><br>
        @error('email')
            {{ $message }}
        @enderror
        <input type="password" name="password" required placeholder="Password"><br>
        @error('password')
        {{ $message }}
        @enderror
        <input type="password" name="password_confirmation" required placeholder="Confirm Password"><br>
        @error('password_confirmation')
        {{ $message }}
        @enderror
        <button type="submit">Register</button>
    </form>
</body>
</html>