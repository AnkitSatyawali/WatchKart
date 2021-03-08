<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .resetHeading{
            text-align: center;
        }
    </style>
</head>
<body>
    <div>
        <div class="resetHeading">
            Reset your password
        </div>
        <div>
            Click on the button below to reset your password.<br>
            This link will expire in 24 hours.
        </div>
        <a href="http://127.0.0.1:8000/resetPasswordUrl/{{$token}}&{{$email}}">
            <button>Reset Password</button>
        </a>
    </div>
</body>
</html>