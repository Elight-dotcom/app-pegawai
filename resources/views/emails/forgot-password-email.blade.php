<!DOCTYPE html>
<html>

<head>
    <title>Lupa Password</title>
</head>

<body>
    <p>Halo ini adalah email lupa password,</p>

    <p>Silahkan klik link dibawah ini untuk mereset password.</p>

    <a href="{{ route('password.reset', ['token' => $token, 'email' => $email]) }}">
        Reset Password
    </a>


    <p>Terima kasih,<br>HR Department</p>
</body>

</html>