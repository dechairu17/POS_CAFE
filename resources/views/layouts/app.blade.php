<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Cafe - @yield('title', 'Dashboard')</title>

    {{-- 1. Impor Font Inter (sesuai config Tailwind) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    
    {{-- 2. Impor Bootstrap Icons (untuk ikon menu) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- 3. Menghubungkan ke CSS yang dikompilasi oleh Vite (Tailwind) --}}
    @vite('resources/css/app.css')
</head>
{{-- 4. Terapkan font-sans (Inter) dan warna teks-primary (#351F15) --}}
<body class="font-sans antialiased text-text-primary">

    <div class="flex h-screen bg-gray-100">
        
        @include('layouts.partials.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            
            @include('layouts.partials.navbar')

            {{-- 5. Background menggunakan 'bg-bg-container' (#F4EDE4) --}}
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-bg-container p-6 md:p-8">
                
                {{-- Ini adalah "lubang" tempat konten (dashboard.blade.php) akan disuntikkan --}}
                @yield('content')

            </main>
        </div>
    </div>

    {{-- Jika Anda butuh JS global (misal untuk toggle menu mobile) --}}
    @vite('resources/js/app.js')
</body>
</html>