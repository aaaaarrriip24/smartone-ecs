<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Center</title>
</head>

<body>
    <h1>Hi, {{ $data['name'] }}</h1>
    <p>Email anda {{ $data['email'] }}</p>

    <p>Berikut adalah kata sandi Anda untuk mengakses exportcenter.id</p>
    <p>{{ $password }}</p>

    <p>Terima Kasih</p>
</body>
</html>