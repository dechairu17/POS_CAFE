<aside class="w-64 bg-text-primary text-white/80 shrink-0 p-4 overflow-y-auto">
    
    <div class="text-center mb-8">
        <a href="{{ route('dashboard') }}" class="flex items-center justify-center space-x-2">
            {{-- Ikon menggunakan 'text-button-brown' (#BDA593) sebagai aksen --}}
            <i class="bi bi-cup-hot-fill text-3xl text-button-brown"></i>
            <span class="text-2xl font-bold text-white">POS Cafe</span>
        </a>
    </div>

    <nav class="space-y-2">
        
        {{-- Link Dashboard --}}
        <a href="{{ route('dashboard') }}" 
           class="flex items-center space-x-3 p-3 rounded-lg transition duration-200 hover:bg-button-brown hover:text-white 
                  {{-- Logika untuk menandai link aktif --}}
                  {{ request()->routeIs('dashboard') ? 'bg-button-brown text-white' : '' }}">
            <i class="bi bi-grid-1x2-fill w-5 text-lg"></i>
            <span>Dashboard</span>
        </a>

        {{-- Logika Role-Based Menu --}}
        @auth
            {{-- Cek jika role user adalah 'admin' --}}
            @if(auth()->user()->role == 'admin')
                <h3 class="text-sm font-semibold text-white/50 uppercase pt-4 pb-1 px-3">
                    Admin
                </h3>
                
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg transition duration-200 hover:bg-button-brown hover:text-white">
                    <i class="bi bi-people-fill w-5 text-lg"></i>
                    <span>Manajemen Pengguna</span>
                </a>
                
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg transition duration-200 hover:bg-button-brown hover:text-white">
                    <i class="bi bi-journal-text w-5 text-lg"></i>
                    <span>Laporan Penjualan</span>
                </a>
                
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg transition duration-200 hover:bg-button-brown hover:text-white">
                    <i class="bi bi-boxes w-5 text-lg"></i>
                    <span>Manajemen Produk</span>
                </a>
            
            {{-- Cek jika role user adalah 'kasir' --}}
            @elseif(auth()->user()->role == 'kasir')
                <h3 class="text-sm font-semibold text-white/50 uppercase pt-4 pb-1 px-3">
                    Kasir
                </h3>
                
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg transition duration-200 hover:bg-button-brown hover:text-white">
                    <i class="bi bi-cart-plus-fill w-5 text-lg"></i>
                    <span>Point of Sale (POS)</span>
                </a>
                
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg transition duration-200 hover:bg-button-brown hover:text-white">
                    <i class="bi bi-receipt w-5 text-lg"></i>
                    <span>Riwayat Transaksi</span>
                </a>
            @endif
        @endauth
    </nav>
</aside>