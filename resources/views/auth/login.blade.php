<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistem Performa Akademik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 420px;
            margin: 0 auto;
        }

        .card {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: .5rem;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: .75rem;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: .75rem;
            background-color: #8e8eef;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background-color: #6c6cf0;
        }

        .error {
            color: red;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .subtitle {
        margin-bottom: 1rem;
        color: #555;
        font-weight: 500;
        font-size: 1rem;
    }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <!-- Logo dari storage -->
            <div style="text-align: center;">
            <img src="{{ asset('storage/img/tut_wuri_handayani.png') }}" alt="Logo" style="width: 100%; max-width: 80px; margin-bottom: 20px;">
            </div>

        <h2>Pengelompokan Performa Akademik</h2>
        <h2>Login</h2>
        

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</div>

</body>
</html>
