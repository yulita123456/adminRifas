<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <p>Hi {{ $nama }},</p>

    <p>Anda menerima email ini karena kami menerima permintaan reset kata sandi untuk akun Anda. Untuk melanjutkan, klik tautan berikut:</p>

    <p><a href="{{ route('reset.password', $token) }}">Reset Password</a></p>

    <p>Jika Anda tidak merasa melakukan permintaan ini, abaikan email ini.</p>

    <p>Terima kasih,</p>
    <p>Tim Dukungan Kami</p>
</body>
</html>
