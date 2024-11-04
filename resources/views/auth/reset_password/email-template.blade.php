<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <style>
        body {
            background-color: #f4f6f8; /* Slightly lighter background */
            font-family: 'Arial', 'Helvetica', sans-serif;
            padding: 20px;
            margin: 0;
        }
        .email-container {
            background-color: #ffffff; /* White background for email body */
            padding: 40px; /* More padding for better spacing */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
            max-width: 600px; /* Maximum width */
            margin: auto; /* Centered container */
        }
        h2 {
            color: #333; /* Dark grey for the heading */
            margin-bottom: 20px; /* Increased margin below heading */
            text-align: center; /* Centered heading */
            font-size: 1.75rem; /* Larger font size for the heading */
            font-weight: bold; /* Bold heading */
        }
        p {
            font-size: 1.1rem; /* Slightly larger font size for paragraphs */
            margin-bottom: 20px; /* Spacing below paragraph */
            color: #555; /* Darker grey for text */
            text-align: center; /* Center text */
            line-height: 1.5; /* Increased line height for readability */
        }
        .reset-button {
            display: inline-block; /* Inline block for button */
            padding: 12px 25px; /* Increased padding for better touch area */
            color: #ffffff; /* White text color */
            background-color: #007bff; /* Bootstrap primary color */
            border-radius: 5px; /* Rounded corners */
            text-decoration: none; /* Remove underline */
            transition: background-color 0.3s; /* Smooth transition */
            text-align: center; /* Center the text in the button */
            font-weight: bold; /* Bold button text */
            font-size: 1.1rem; /* Standard font size for button */
            margin: 20px auto; /* Center the button with space above/below */
            max-width: 220px; /* Maximum width for the button */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Soft shadow for button */
            border: none; /* No border */
        }
        .reset-button:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
        .footer {
            margin-top: 30px; /* Space above footer */
            text-align: center; /* Center footer text */
            font-size: 0.9rem; /* Smaller font for footer */
            color: #777; /* Light grey for footer text */
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>Reset Your Password</h2>
        <p>We received a request to reset your password. Click the button below to set a new password.</p>
        <a class="reset-button" href="{{ $link }}">Reset Password</a>
        <div class="footer">
            <p>If you didn't request a password reset, please ignore this email.</p>
        </div>
    </div>
</body>
</html>
