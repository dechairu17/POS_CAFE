<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - POS Cafe</title>
    
    {{-- Impor Font Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    {{-- Impor Bootstrap Icons (untuk ikon) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Menghubungkan ke CSS yang dikompilasi oleh Vite (Tailwind) --}}
    @vite('resources/css/app.css') 

</head>
<body class="font-[Poppins] bg-white grid place-items-center min-h-screen m-0 text-gray-900">

    <div class="login-container text-center w-full px-6"> 
        
        {{-- Logo dengan ukuran diperbesar --}}
        <div class="logo mb-0.5 mt-2 "> 
            <img src="{{ asset('assets/cup_login.png') }}" alt="Coffee Cup Logo" class="w-32 h-auto mx-auto"> 
        </div>

        {{-- Judul dengan warna hitam --}}
        <h1 class="text-5xl font-bold m-0 mb-3 text-[#351F15]">
            Welcome Back!
        </h1>
        
        {{-- Subtitle dengan font medium dan warna hitam --}}
        <p class="text-base font-medium text-gray-800 mb-10">
            Enjoy your coffee journey with us.
        </p>

        {{-- Form dengan background box --}}
        <div class="form-box bg-[#F4EDE4] p-8 rounded-3xl w-full max-w-[470px] mx-auto mb-12">
            <form method="POST" action="{{ route('login') }}" class="w-full space-y-5">
                @csrf

                {{-- Input Username dengan border hitam dan rounded penuh --}}
                <div class="input-group relative"> 
                    <i class="bi bi-person absolute left-4 top-1/2 -translate-y-1/2 text-gray-700 text-base "></i>
                    <input id="username" type="text" 
                           name="username" 
                           placeholder="Username" 
                           value="{{ old('username') }}" required autofocus
                           class="w-full pl-12 pr-4 py-3 border-2 border-gray-800 rounded-full text-sm font-medium box-border placeholder-gray-500 focus:outline-none focus:border-gray-800 focus:ring-0 bg-white transition-colors">
                </div>
                
                @error('username')
                    <div class="error-message text-red-600 text-sm text-left -mt-2">{{ $message }}</div>
                @enderror

                {{-- Input Password dengan border hitam dan rounded penuh --}}
                <div class="input-group relative"> 
                    <i class="bi bi-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-700 text-base"></i>
                    <input id="kata_sandi" type="password" 
                           name="kata_sandi" 
                           placeholder="Password" required
                           class="w-full pl-12 pr-12 py-3 border-2 border-gray-800 rounded-full text-sm font-medium box-border placeholder-gray-500 focus:outline-none focus:border-gray-800 focus:ring-0 bg-white transition-colors">
                    <i class="bi bi-eye-slash absolute right-4 top-1/2 -translate-y-1/2 text-gray-700 text-base cursor-pointer hover:text-gray-900 transition-colors" id="togglePassword"></i>
                </div>

                @error('kata_sandi')
                    <div class="error-message text-red-600 text-sm text-left -mt-2">{{ $message }}</div>
                @enderror

                {{-- Tombol Sign In dengan styling yang lebih baik sesuai Figma --}}
                <button type="submit" 
                        class="btn-login w-full py-3 border-none rounded-full text-white text-base font-bold font-[Poppins] cursor-pointer transition-all duration-300 hover:opacity-90 active:scale-95 mt-6" 
                        style="background-color: #BDA593;">
                    Sign In
                </button>

                {{-- Link Forgot Password dengan styling yang lebih baik --}}
                <a href="#" class="forgot-password block text-gray-800 no-underline text-sm font-medium hover:text-gray-600 transition-colors mt-4">
                    Forgot Password?
                </a>
            </form>
        </div>
    </div>

    {{-- JavaScript untuk toggle password --}}
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#kata_sandi');

        togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    </script>

</body>
</html>
