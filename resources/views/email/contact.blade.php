<!DOCTYPE html>
<html>
<head>
    <title>{{ $header_email }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
        }
        p {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pesan Baru dari: {{ $name }}</h1>
        <p><strong>Email Pengirim:</strong> {{ $email }}</p>
        <p><strong>Subject:</strong> {{ $header_email }}</p>
        <p><strong>Pesan:</strong></p>
        <p>{{ $body_email }}</p>
    </div>
</body>
</html>
