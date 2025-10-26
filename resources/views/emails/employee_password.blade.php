<!DOCTYPE html>
<html>

<head>
    <title>Akun Karyawan Baru</title>
</head>

<body>
    <p>Halo {{ $employee->nama_lengkap }},</p>

    <p>Akunmu telah dibuat.</p>
    <p>Email: {{ $employee->email }}</p>
    <p>Password: <strong>{{ $password }}</strong></p>

    <p>Silakan login dan ubah password-mu setelah berhasil masuk.</p>

    <p>Terima kasih,<br>HR Department</p>
</body>

</html>