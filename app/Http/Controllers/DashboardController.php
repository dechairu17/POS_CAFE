<?php

namespace App\Http\Controllers;

use App\Models\PesananPenjualan;
use App\Models\Produk;
use App\Models\Gudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Get statistics for admin dashboard
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function adminStats()
    {
        // Get total revenue (omset)
        $totalOmset = PesananPenjualan::where('status', 'selesai')
            ->sum('total_harga');

        // Get total completed orders
        $totalPesanan = PesananPenjualan::where('status', 'selesai')->count();

        // Get best selling products
        $produkTerlaris = Produk::select('produk.nama', DB::raw('COALESCE(SUM(detail_pesanan_penjualan.jumlah), 0) as total_terjual'))
            ->leftJoin('detail_pesanan_penjualan', 'produk.id', '=', 'detail_pesanan_penjualan.id_produk')
            ->leftJoin('pesanan_penjualan', 'detail_pesanan_penjualan.id_pesanan_penjualan', '=', 'pesanan_penjualan.id')
            ->where('pesanan_penjualan.status', 'selesai')
            ->groupBy('produk.id', 'produk.nama')
            ->orderByDesc('total_terjual')
            ->take(5)
            ->get();

        // Get warehouse statistics
        $gudangStats = Gudang::select(
                'gudang.nama',
                DB::raw('COUNT(DISTINCT pesanan_penjualan.id) as total_pesanan'),
                DB::raw('COALESCE(SUM(pesanan_penjualan.total_harga), 0) as total_omset')
            )
            ->leftJoin('pengguna', 'gudang.id', '=', 'pengguna.id_gudang')
            ->leftJoin('pesanan_penjualan', 'pengguna.id', '=', 'pesanan_penjualan.id_pengguna')
            ->where('pesanan_penjualan.status', 'selesai')
            ->orWhereNull('pesanan_penjualan.status')
            ->groupBy('gudang.id', 'gudang.nama')
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'total_omset' => $totalOmset,
                'total_pesanan' => $totalPesanan,
                'produk_terlaris' => $produkTerlaris,
                'statistik_gudang' => $gudangStats
            ]
        ]);
    }

    /**
     * Get statistics for manager dashboard
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manajerStats(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthenticated.'
            ], 401);
        }

        $user = Auth::user();
        
        if (!isset($user->id_gudang)) {
            return response()->json([
                'success' => false,
                'message' => 'Gudang tidak ditemukan untuk pengguna ini.'
            ], 400);
        }
        
        $idGudang = $user->id_gudang;

        // Get total revenue for the manager's warehouse
        $totalOmset = PesananPenjualan::where('id_pengguna', $user->id)
            ->where('status', 'selesai')
            ->sum('total_harga');

        // Get total completed orders for the manager's warehouse
        $totalPesanan = PesananPenjualan::where('id_pengguna', $user->id)
            ->where('status', 'selesai')
            ->count();

        // Get best selling products for the manager's warehouse
        $produkTerlaris = Produk::select('produk.nama', DB::raw('COALESCE(SUM(detail_pesanan_penjualan.jumlah), 0) as total_terjual'))
            ->join('detail_pesanan_penjualan', 'produk.id', '=', 'detail_pesanan_penjualan.id_produk')
            ->join('pesanan_penjualan', 'detail_pesanan_penjualan.id_pesanan_penjualan', '=', 'pesanan_penjualan.id')
            ->join('pengguna', 'pesanan_penjualan.id_pengguna', '=', 'pengguna.id')
            ->where('pengguna.id_gudang', $idGudang)
            ->where('pesanan_penjualan.status', 'selesai')
            ->groupBy('produk.id', 'produk.nama')
            ->orderByDesc('total_terjual')
            ->take(5)
            ->get();

        // Get current warehouse info
        $gudang = Gudang::findOrFail($idGudang);

        return response()->json([
            'success' => true,
            'data' => [
                'gudang' => [
                    'nama' => $gudang->nama,
                    'alamat' => $gudang->alamat,
                    'telepon' => $gudang->telepon
                ],
                'total_omset' => $totalOmset,
                'total_pesanan' => $totalPesanan,
                'produk_terlaris' => $produkTerlaris
            ]
        ]);
    }
}
