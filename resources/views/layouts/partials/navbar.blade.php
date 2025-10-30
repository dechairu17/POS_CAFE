<header class="bg-white shadow-md p-4 flex justify-between items-center">
    
    <div class="text-text-primary">
        Selamat datang, 
        <span class="font-bold">
            @auth
                {{ auth()->user()->name ?? 'Pengguna' }}
            @else
                Tamu
            @endauth
        </span>
    </div>

    <div class="flex items-center space-x-4">
        <button class="text-icon-gray hover:text-text-primary relative" title="Notifikasi">
            <i class="bi bi-bell-fill text-xl"></i>
            {{-- Contoh badge notifikasi --}}
            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">
              3
            </span>
        </button>

        {{-- Tombol Logout harus menggunakan form POST untuk keamanan --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                    title="Logout"
                    class="flex items-center space-x-2 text-icon-gray hover:text-red-600 transition duration-200">
                <i class="bi bi-box-arrow-right text-xl"></i>
            </button>
        </form>
    </div>
</header>