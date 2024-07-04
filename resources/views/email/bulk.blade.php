<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Center</title>
</head>

<body>
    <h1>Hi, {{ $dataPT->nama_perusahaan }}</h1>
    <p>{{ $dataPT->body_email }}</p>

    <p>Thank you</p>
    @foreach($dataPT->attachment as $d)
        {{ $message->embed($d) }}
    @endforeach
</body>
</html>