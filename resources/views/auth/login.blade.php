<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - POS Cafe</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --bg-main: #FFFFFF;
            --bg-container: #F5EFE6;
            --text-dark-brown: #4B3832;
            --button-brown: #BCAB9C;
            --button-hover: #a79483;
            --icon-gray: #8A8A8A;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-main);
            display: grid;
            place-items: center;
            min-height: 100vh;
            margin: 0;
            color: var(--text-dark-brown);
        }

        .login-container {
            text-align: center;
            max-width: 480px; 
            width: 100%;
            padding: 20px;
        }

        /* --- Logo --- */
        .logo {
            margin-bottom: 0rem; 
        }
        .logo img {
            width: 150px; 
            height: auto;
        }

        /* --- Judul (Sesuai Gambar 1) --- */
        h1 {
            font-size: 3.25rem; 
            font-weight: 700; /* Bold */
            margin: 0;
            margin-bottom: 0.9rem; 
        }

        /* --- Sub-Judul (Sesuai Gambar 1) --- */
        .subheading {
            font-size: 1rem; 
            font-weight: 600; /* Made text bold */
            color: var(--color-black); 
            margin-bottom: 2.5rem; 
        }

        /* --- Kotak Form (Sesuai Gambar 3) --- */
        .form-box {
            background-color: var(--bg-container);
            /* Padding diperkecil agar lebih pas */
            padding: 2.5rem; 
            border-radius: 16px;
        }

        form {
            width: 100%;
        }

        /* --- Grup Input (Sesuai Gambar 3) --- */
        .input-group {
            position: relative;
            /* Jarak antar input field */
            margin-bottom: 0.7rem; 
        }

        /* --- CSS BARU: Ikon (Kiri & Kanan) --- */
        .input-group i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: var(--icon-gray);
            font-size: 1.1rem;
        }
        .input-group .icon-left {
            left: 15px;
        }
        .input-group .icon-right {
            right: 15px;
            cursor: pointer; /* Ikon mata bisa diklik */
        }
        /* ------------------------------- */

        .input-group input {
            width: 100%;
            padding: 14px 14px 14px 50px;
            border: 1px solid #E0D8CC;
            border-radius: 8px;
            font-size: 0.95rem;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }
        /* CSS BARU: Padding khusus untuk input password (agar ada ruang untuk ikon mata) */
        .input-group input[name="kata_sandi"] {
            padding-right: 50px; 
        }

        .input-group input::placeholder {
            color: var(--icon-gray);
        }

        /* --- Tombol Sign In (Sesuai Gambar 3) --- */
        .btn-login {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background-color: var(--button-brown);
            color: white; 
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease;
            /* Jarak dari password ke tombol */
            margin-top: 0.1rem; 
        }

        .btn-login:hover {
            background-color: var(--button-hover);
        }

        /* --- Link Lupa Password (Sesuai Gambar 3) --- */
        .forgot-password {
            display: block;
            /* Jarak dari tombol ke link */
            margin-top: 0.5rem; 
            color: #777;
            text-decoration: none;
            font-size: 0.9rem;
        }
        
        .error-message {
            color: #D9534F;
            font-size: 0.9rem;
            text-align: left;
            margin-top: -10px;
            margin-bottom: 15px;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .login-container {
                max-width: 100%;
                padding: 15px;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .form-box {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        
        <div class="logo">
            <img src="{{ asset('assets/cup_login.png') }}" alt="Coffee Cup Logo">
        </div>

        <h1><strong>Welcome Back!</strong></h1>
        <p class="subheading"><strong>Enjoy your coffee journey with us.</strong></p>

        <div class="form-box">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group">
                    <i class="bi bi-person icon-left"></i>
                    <input id="username" type="text" 
                           name="username" 
                           placeholder="Username" 
                           value="{{ old('username') }}" required autofocus>
                </div>
                
                @error('username')
                    <div class="error-message">{{ $message }}</div>
                @enderror

                <div class="input-group">
                    <i class="bi bi-lock icon-left"></i>
                    <input id="kata_sandi" type="password" 
                           name="kata_sandi" 
                           placeholder="Password" required>
                    <i class="bi bi-eye-slash icon-right" id="togglePassword"></i>
                </div>

                <button type="submit" class="btn-login">
                    Sign In
                </button>

                <a href="#" class="forgot-password">
                    Forgot Password?
                </a>
            </form>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#kata_sandi');

        togglePassword.addEventListener('click', function (e) {
            // Ganti tipe input dari 'password' ke 'text' atau sebaliknya
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Ganti ikon mata (terbuka/tertutup)
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    </script>

</body>
</html>