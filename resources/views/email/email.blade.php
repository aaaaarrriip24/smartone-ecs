<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Center</title>
</head>

<body>
    <h1>Hi, {{ $dataPT['nama_perusahaan'] }}</h1>
    <p>{{ $dataPT['email'] }}</p>

    <p>Thank you</p>

    {{ $message->embed($dataPT['attachment']) }}

</body>
</html>