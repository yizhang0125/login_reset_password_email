<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e9ecef; /* Light grey background */
            font-family: 'Arial', sans-serif;
        }
        .container {
            background-color: #ffffff; /* White background for the form */
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            max-width: 400px;
            width: 100%;
        }
        h2 {
            font-weight: 600;
            color: #333; /* Dark grey for the heading */
            margin-bottom: 1.5rem;
            text-align: center; /* Centered heading */
        }
        .form-label {
            font-weight: 500; /* Bold labels */
        }
        .form-control {
            border-radius: 8px; /* Rounded corners for input fields */
            border: 1px solid #ced4da;
            transition: border-color 0.2s; /* Smooth transition for border */
        }
        .form-control:focus {
            border-color: #80bdff; /* Change border color on focus */
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .btn-primary {
            background-color: #007bff; /* Primary button color */
            border: none;
            border-radius: 8px; /* Rounded corners for button */
            padding: 10px;
            transition: background-color 0.2s; /* Smooth transition for button */
            font-weight: 600; /* Bold button text */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
        .text-center {
            margin-top: 1.5rem; /* Spacing above links */
        }
        .text-center a {
            color: #007bff; /* Link color */
            text-decoration: none; /* No underline */
            transition: color 0.2s; /* Smooth transition for color */
        }
        .text-center a:hover {
            color: #0056b3; /* Darker shade on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>

        <!-- Success message -->
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required autofocus>
            </div>
            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
        </form>
        <div class="text-center">
            <p>Remember your password? <a href="/login">Login</a></p>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
