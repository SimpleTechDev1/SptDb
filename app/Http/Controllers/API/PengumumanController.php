<?php

namespace App\Http\Controllers\API;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class PengumumanController extends Controller
{
    //
    public function allpengumuman(Request $request)
    {
        $id = $request->input('id');
        $pengumumen = $request->input('pengumumen');

        if ($id) {
            $pengumumen = Pengumuman::find($id);

            if ($pengumumen)
                return ResponseFormatter::success(
                    $pengumumen,
                    'Data pengumuman berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Tidak ada pengumuman',
                    404
                );
        }

        $pengumuman = Pengumuman::query();

        $pengumuman = Pengumuman::get();



        return ResponseFormatter::success(
            $pengumuman,
            'Data list pengumuman berhasil diambil'
        );
    }
}
