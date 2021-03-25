<?php

namespace App\Http\Controllers\API;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class JadwalController extends Controller
{
    //
    public function alljadwal(Request $request)
    {
        $id = $request->input('id');
        $jadwal = $request->input('jadwals');

        if ($id) {
            $jadwal = Jadwal::find($id);

            if ($jadwal)
                return ResponseFormatter::success(
                    $jadwal,
                    'Data jadwal berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Tidak ada jadwal',
                    404
                );
        }

        $jadwal = jadwal::query();

        $jadwal = jadwal::get();



        return ResponseFormatter::success(
            $jadwal,
            'Data list Jadwal berhasil diambil'
        );
    }
}
