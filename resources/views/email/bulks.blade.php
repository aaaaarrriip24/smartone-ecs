<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Center</title>
</head>

<body>
    <h1>Hi, {{ $nama_perusahaan }}</h1>
    <p>{{ $body_email }}</p>

    {{ $dataPT['attachment'] }}
    {{ $message->embed($dataPT['attachment']) }}

</body>
</html>