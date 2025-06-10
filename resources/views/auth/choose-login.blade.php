<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pilih Login Sebagai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #7a6ad8;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.05);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        h2 {
            margin-bottom: 30px;
            font-size: 28px;
        }

        .button-group {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        a.button {
            text-decoration: none;
            background-color: #ffffff33;
            color: white;
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        a.button:hover {
            background-color: #ffffff66;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Sebagai</h2>
        <div class="button-group">
            <a href="{{ route('login') }}" class="button">Siswa</a>
            <a href="{{ route('login.tutor') }}" class="button">Tutor</a>
            <a href="{{ route('login.admin') }}" class="button">Admin</a>
        </div>
    </div>
</body>
</html>