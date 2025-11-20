<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('{{ asset('img/bg1.jpg') }}') no-repeat center center/cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
        }

        .login-card {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(5px);
            border-radius: 15px;
            padding: 2.5rem 2rem;
            color: #fff;
            width: 100%;
            max-width: 360px;
        }

        .logo {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            padding: 20px;
            margin: 0 auto 15px;
            border: 2px solid rgba(255, 255, 255, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100px;
            height: 100px;
            color: #ffffff;
            font-size: 50px;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.8);
        }
    </style>
</head>

<body>

    <div class="login-card text-center shadow-lg">
        <i class="logo fa-solid fa-user"></i>

        <h4 class="fw-semibold mb-3">Login Admin</h4>

        @if (Session('Error'))
            <div class="alert bg-opacity-25 bg-danger py-2">{{ Session('Error') }}</div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email"
                    class="form-control form-control-sm bg-light bg-opacity-25 text-white border-0"
                    placeholder="Masukkan email">
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password"
                    class="form-control form-control-sm bg-light bg-opacity-25 text-white border-0"
                    placeholder="Masukkan password">
            </div>
            <button type="submit" class="btn btn-primary w-100 fw-semibold">Masuk</button>
        </form>

        <p class="mt-3 mb-0 small text-light">
            &copy; 2025 <a href="#" class="text-info text-decoration-none">Perpustakaan Mini</a>
        </p>
    </div>

</body>

</html>
