<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RM01 extends Controller
{
    public function save(Request $request)
    {
        $data = $request->all();
        try{
            DB::beginTransaction();
            DB::table('temp_pasien')->insert([
                'nik' => $data['nik'],
                'nama' => $data['nama'],
                'alamat' => $data['alamat'],
                'no_telp' => $data['no_telp'],
                'tmp_lahir' => $data['tmp_lahir'],
                'tgl_lahir' => $data['tgl_lahir'],
                'jk' => $data['jk'],
                'gol_darah' => $data['gol_darah'],
                'agama' => $data['agama'],
                'stts_pernikahan' => $data['stts_nikah'],
                'nilai_pribadi' => $data['nilai_pribadi'],
                'pekerjaan' => $data['pekerjaan'],
                'pendidikan' => $data['pendidikan'],
                'hambatan' => $data['hambatan'],
                'nrp' => $data['nrp'],
                'bahasa' => $data['bahasa'],
                'ras' => $data['ras'],
                'ayah_nama' => $data['ayah_nama'],
                'ayah_umur' => $data['ayah_umur'],
                'ayah_pekerjaan' => $data['ayah_pekerjaan'],
                'ibu_nama' => $data['ibu_nama'],
                'ibu_umur' => $data['ibu_umur'],
                'ibu_pekerjaan' => $data['ibu_pekerjaan'],
                'suami_istri_nama' => $data['suami_istri_nama'],
                'suami_istri_umur' => $data['suami_istri_umur'],
                'suami_istri_pekerjaan' => $data['suami_istri_pekerjaan'],
                'pj_nama' => $data['pj_nama'],
                'pj_hubungan' => $data['pj_hubungan'],
                'pj_alamat' => $data['pj_alamat'],
                'pj_telp' => $data['pj_telp'],
                'kd_poli' => $data['kd_poli'],
                'kd_pj' => $data['kd_pj'],
                'ttd' => $data['ttd'],
                'created_at' => date('Y-m-d' . ' ' . 'H:i:s'),
                'updated_at' => date('Y-m-d' . ' ' . 'H:i:s'),
            ]);
            DB::commit();
            return response()->json([
                'error' => false,
                'meta' => [
                    'code' => 200,
                    'message' => 'Data Pendaftaran Berhasi disimpan'
                ],
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'error' => true,
                'meta' => [
                    'code' => 500,
                    'message' => $e->getMessage() ?? 'Terjadi kesalahan pada server'
                ],
            ], 500);
        }
    }
}
