
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | Portfolio</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background:
                radial-gradient(circle at 15% 15%, #29205e 0, transparent 35%),
                radial-gradient(circle at 90% 85%, #312060 0, transparent 32%),
                #090d20;
            color: #f8fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;
        }

        .login-layout {
            width: 100%;
            max-width: 950px;
            min-height: 540px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
            border: 1px solid #34315c;
            border-radius: 26px;
            background: rgba(17, 24, 48, 0.94);
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.4);
        }

        .welcome {
            padding: 55px 42px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: linear-gradient(145deg, #29205e, #171936 75%);
            position: relative;
            overflow: hidden;
        }

        .welcome::before {
            content: "";
            position: absolute;
            width: 240px;
            height: 240px;
            border: 1px solid rgba(196, 181, 253, 0.2);
            border-radius: 50%;
            right: -85px;
            top: 100px;
            box-shadow:
                0 0 0 30px rgba(167, 139, 250, 0.04),
                0 0 0 60px rgba(167, 139, 250, 0.03);
        }

        .brand {
            position: relative;
            z-index: 1;
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .brand span {
            color: #c4b5fd;
            font-size: 25px;
            margin-right: 8px;
        }

        .welcome-content {
            position: relative;
            z-index: 1;
            margin: 50px 0;
        }

        .tag {
            display: inline-block;
            padding: 8px 12px;
            border: 1px solid #6256a5;
            border-radius: 30px;
            color: #ddd6fe;
            background: rgba(124, 58, 237, 0.12);
            font-size: 12px;
            letter-spacing: 1px;
        }

        .welcome h1 {
            font-size: clamp(32px, 4vw, 45px);
            line-height: 1.2;
            margin: 22px 0 16px;
        }

        .welcome h1 span {
            color: #a78bfa;
        }

        .welcome p {
            max-width: 340px;
            color: #c4c8e0;
            line-height: 1.8;
            font-size: 14px;
        }

        .welcome-footer {
            position: relative;
            z-index: 1;
            color: #9299bd;
            font-size: 12px;
        }

        .form-panel {
            padding: 55px 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-icon {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 17px;
            background: linear-gradient(135deg, #7c3aed, #a78bfa);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.25);
            font-size: 25px;
            margin-bottom: 26px;
        }

        .form-panel h2 {
            margin: 0 0 10px;
            font-size: 28px;
        }

        .form-description {
            color: #9da6c7;
            font-size: 14px;
            line-height: 1.7;
            margin: 0 0 30px;
        }

        .field-label {
            display: block;
            color: #e2e8f0;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .password-box {
            display: flex;
            align-items: center;
            border: 1px solid #343d60;
            border-radius: 12px;
            background: #0d132a;
            overflow: hidden;
            transition: border-color 0.2s;
        }

        .password-box:focus-within {
            border-color: #a78bfa;
        }

        .password-box input {
            flex: 1;
            min-width: 0;
            padding: 16px;
            background: transparent;
            border: none;
            outline: none;
            color: white;
            font-size: 14px;
        }

        .password-box input::placeholder {
            color: #68718f;
        }

        .show-password {
            padding: 12px;
            border: none;
            background: transparent;
            color: #a78bfa;
            cursor: pointer;
            font-size: 12px;
        }

        .show-password:hover {
            color: white;
        }

        .login-button {
            width: 100%;
            margin-top: 22px;
            padding: 16px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(100deg, #7c3aed, #9b6bfa);
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 8px 22px rgba(124, 58, 237, 0.2);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(124, 58, 237, 0.35);
        }

        .error {
            margin-top: 12px;
            color: #fda4af;
            font-size: 13px;
            line-height: 1.6;
        }

        .back-link {
            display: inline-block;
            align-self: flex-start;
            margin-top: 25px;
            color: #b8a7ff;
            text-decoration: none;
            font-size: 13px;
        }

        .back-link:hover {
            color: white;
        }

        .secure-note {
            margin-top: 35px;
            color: #737d9f;
            font-size: 11px;
            line-height: 1.6;
        }

        @media (max-width: 700px) {
            body {
                padding: 14px;
            }

            .login-layout {
                grid-template-columns: 1fr;
                max-width: 430px;
                min-height: auto;
            }

            .welcome {
                padding: 25px;
            }

            .welcome-content {
                margin: 35px 0 20px;
            }

            .welcome h1 {
                font-size: 30px;
            }

            .welcome-footer {
                display: none;
            }

            .form-panel {
                padding: 32px 25px;
            }

            .form-icon {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login-layout">

        <section class="welcome">
            <div class="brand">
                <span>✦</span> PORTFOLIO
            </div>

            <div class="welcome-content">
                <span class="tag">ADMINISTRATOR AREA</span>

                <h1>
                    Welcome<br>
                    <span>Back.</span>
                </h1>

                <p>
                    Manage your portfolio, review contact messages,
                    and stay connected with the people who reach out.
                </p>
            </div>

            <div class="welcome-footer">
                © {{ date('Y') }} Portfolio Admin · Private Access
            </div>
        </section>

        <section class="form-panel">
            <div class="form-icon">♙</div>

            <h2>Admin Login</h2>

            <p class="form-description">
                Enter your admin password to access your dashboard.
            </p>

            <form method="POST" action="{{ route('admin.authenticate') }}">
                @csrf

                <label class="field-label" for="password">
                    Admin Password
                </label>

                <div class="password-box">
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >

                    <button
                        class="show-password"
                        type="button"
                        onclick="togglePassword()"
                        id="toggle-button"
                    >
                        
                    </button>
                </div>

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

                <button class="login-button" type="submit">
                    Log In &nbsp; →
                </button>
            </form>

            <a href="{{ url('/') }}" class="back-link">
                ← Back to Portfolio Home
            </a>

           
        </section>

    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const button = document.getElementById('toggle-button');

            if (password.type === 'password') {
                password.type = 'text';
                button.textContent = 'Hide';
            } else {
                password.type = 'password';
                button.textContent = 'Show';
            }
        }
    </script>
</body>
</html>
