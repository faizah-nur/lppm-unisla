<!DOCTYPE html>
<html>

<head>
    <title>Sertifikat Event</title>
</head>

<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>Halo, {{ $registration->full_name }}</h2>
    <p>Terima kasih telah mengikuti event <strong>{{ $registration->event->title }}</strong>.</p>
    <p>Bersama email ini, kami lampirkan sertifikat keikutsertaan Anda.</p>
    <br>
    <p>Hormat kami,<br><strong>litbangpemas UNISLA</strong></p>
</body>

</html>
