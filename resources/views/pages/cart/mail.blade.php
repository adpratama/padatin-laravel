<!DOCTYPE html>
<html>

<head>
    <title>Link Download Dokumen</title>
</head>

<body>
    <h2>Terima kasih atas pembelian Anda!</h2>
    <p>Silakan unduh dokumen Anda dengan mengklik link di bawah ini:</p>
    <p><a href="{{ $link }}">{{ $link }}</a></p>
    <p><strong>Catatan:</strong> Link ini akan kadaluarsa pada {{ $expirationTime }}.</p>
</body>

</html>
