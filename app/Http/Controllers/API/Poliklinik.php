<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Poliklinik extends Controller
{
    public function index()
    {
        try{
            $poliklinik = DB::table('poliklinik')
                            ->where('status', '1')
                            ->select('kd_poli', 'nm_poli')
                            ->get();
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'OK'
                ],
                'data' => $poliklinik
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'message' => $e->getMessage() ?? 'Terjadi kesalahan pada server'
                ],
                'data' => null,
            ], 500);
        }
    }
}
