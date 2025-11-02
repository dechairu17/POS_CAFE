<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\PesananPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{
    /**
     * Start a new shift
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function startShift(Request $request)
    {
        $validated = $request->validate([
            'uang_awal' => 'required|numeric|min:0',
        ]);

        // Check if user already has an active shift
        $activeShift = Shift::where('id_pengguna', Auth::id())
            ->whereNull('waktu_selesai')
            ->first();

        if ($activeShift) {
            return response()->json([
                'message' => 'Anda sudah memiliki shift yang aktif',
                'shift' => $activeShift
            ], 400);
        }

        $shift = Shift::create([
            'id_pengguna' => Auth::id(),
            'uang_awal' => $validated['uang_awal'],
            'waktu_mulai' => now(),
        ]);

        return response()->json([
            'message' => 'Shift berhasil dimulai',
            'data' => $shift
        ], 201);
    }

    /**
     * End the current shift
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function endShift(Request $request)
    {
        $validated = $request->validate([
            'uang_akhir' => 'required|numeric|min:0',
        ]);

        // Get the active shift
        $shift = Shift::where('id_pengguna', Auth::id())
            ->whereNull('waktu_selesai')
            ->first();

        if (!$shift) {
            return response()->json([
                'message' => 'Tidak ada shift aktif yang ditemukan'
            ], 404);
        }

        // Calculate total sales during the shift
        $totalPenjualan = PesananPenjualan::where('id_pengguna', Auth::id())
            ->whereBetween('created_at', [$shift->waktu_mulai, now()])
            ->sum('total_harga');

        // Calculate the difference
        $selisih = $validated['uang_akhir'] - $shift->uang_awal - $totalPenjualan;

        // Update the shift
        $shift->update([
            'uang_akhir' => $validated['uang_akhir'],
            'total_penjualan_sistem' => $totalPenjualan,
            'waktu_selesai' => now(),
            'selisih' => $selisih
        ]);

        return response()->json([
            'message' => 'Shift berhasil diakhiri',
            'data' => $shift
        ]);
    }

    /**
     * Get current active shift
     *
     * @return \Illuminate\Http\Response
     */
    public function getActiveShift()
    {
        $shift = Shift::with('pengguna')
            ->where('id_pengguna', Auth::id())
            ->whereNull('waktu_selesai')
            ->first();

        if (!$shift) {
            return response()->json([
                'message' => 'Tidak ada shift aktif',
                'has_active_shift' => false
            ]);
        }

        return response()->json([
            'message' => 'Shift aktif ditemukan',
            'has_active_shift' => true,
            'data' => $shift
        ]);
    }
}
