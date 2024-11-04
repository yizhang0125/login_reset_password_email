<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Set New Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
        .toggle-password {
            cursor: pointer;
            position: absolute;
            top: 70%; /* Center vertically */
            right: 10px; /* Right offset */
            transform: translateY(-50%); /* Adjust position to center */
            color: #495057; /* Grey color for icon */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Set New Password</h2>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ request()->route('token') }}">
            
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" required autofocus>
            </div>
            
            <div class="mb-3 position-relative">
                <label for="password" class="form-label">New Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <span class="toggle-password" id="togglePassword">
                    <i class="fas fa-eye" id="eyeIcon"></i>
                </span>
            </div>

            <div class="mb-3 position-relative">
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required>
                <span class="toggle-password" id="toggleConfirmPassword">
                    <i class="fas fa-eye" id="eyeConfirmIcon"></i>
                </span>
            </div>

            <button type="submit" class="btn btn-primary w-100">Reset</button>
        </form>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');
        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
        const confirmPasswordInput = document.querySelector('#password-confirm');
        
        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('#eyeIcon').classList.toggle('fa-eye');
            this.querySelector('#eyeIcon').classList.toggle('fa-eye-slash');
        });

        toggleConfirmPassword.addEventListener('click', function () {
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
            this.querySelector('#eyeConfirmIcon').classList.toggle('fa-eye');
            this.querySelector('#eyeConfirmIcon').classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
