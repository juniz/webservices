<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Penjab extends Controller
{
    public function index()
    {
        try{
            $penjab = DB::table('penjab')
                            ->where('status', '1')
                            ->select('kd_pj', 'png_jawab')
                            ->get();
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'OK'
                ],
                'data' => $penjab
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
