{{-- 1. Beri tahu Laravel untuk menggunakan kerangka di layouts/app.blade.php --}}
@extends('layouts.app')

{{-- 2. Ganti judul halaman (opsional) --}}
@section('title', 'Dashboard Utama')

{{-- 3. Mulai isi konten --}}
@section('content')

    <h1 class="text-3xl font-bold text-text-primary mb-6">
        Dashboard
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        {{-- Card Contoh 1 --}}
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-text-primary mb-2">Penjualan Hari Ini</h2>
            <p class="text-3xl font-bold text-button-brown">Rp 1.250.000</p>
        </div>
        
        {{-- Card Contoh 2 --}}
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-text-primary mb-2">Transaksi</h2>
            <p class="text-3xl font-bold text-button-brown">42</p>
        </div>
        
        {{-- Card Contoh 3 --}}
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-text-primary mb-2">Produk Terlaris</h2>
            <p class="text-3xl font-bold text-button-brown">Kopi Susu Gula Aren</p>
        </div>

    </div>

{{-- 4. Akhiri isi konten --}}
@endsection