<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login PDAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.5)), url({{ asset('image/a.jpeg') }}) no-repeat center center/cover;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            width: 100%;
            max-width: 450px;
            text-align: center;
        }

        .login-box h2 {
            color: #fff;
            margin-bottom: 30px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-label {
            color: #ffffff;
            position: absolute;
            left: 15px;
            top: 15px;
            font-weight: 500;
            transition: all 0.3s ease;
            pointer-events: none;
            padding: 0 5px;
            border-radius: 5px;
            opacity: 0.8;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            padding: 15px 15px 15px 45px;
            transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out;
            outline: none;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.3);
            border-color: #007BFF;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
            cursor: pointer;
        }

        .form-control:focus+.form-label,
        .form-control:not(:placeholder-shown)+.form-label {
            top: -10px;
            left: 15px;
            font-size: 12px;
            background: rgba(0, 0, 0, 0.5);
            opacity: 1;
        }

        .form-control::placeholder {
            color: transparent;
        }

        .btn-primary {
            background-color: #007BFF;
            border: none;
            padding: 12px 20px;
            font-size: 18px;
            border-radius: 10px;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0 6px 12px rgba(0, 123, 255, 0.2);
        }

        .footer-text {
            color: #fff;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <h2>Login PDAM</h2>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <i class="bi bi-person input-icon"></i>
                    <input type="text" id="login" name="login" class="form-control" placeholder=" " required>
                    <label for="login" class="form-label">Email atau Username</label>
                </div>
                <div class="form-group">
                    <i class="bi bi-lock input-icon" id="togglePassword"></i>
                    <input type="password" id="password" name="password" class="form-control" placeholder=" " required>
                    <label for="password" class="form-label">Password</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Kirim</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('bi-unlock');
            this.classList.toggle('bi-lock');
        });
    </script>
</body>

</html>
