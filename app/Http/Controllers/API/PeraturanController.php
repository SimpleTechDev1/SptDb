<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Peraturan;

class PeraturanController extends Controller
{
    //
    public function allperaturan(Request $request)
    {
        $id = $request->input('id');
        $peraturan = $request->input('peraturan');

        if ($id) {
            $peraturan = Peraturan::find($id);

            if ($peraturan)
                return ResponseFormatter::success(
                    $peraturan,
                    'Data peraturan berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Tidak ada peraturan',
                    404
                );
        }

        $peraturan = Peraturan::query();

        $peraturan = Peraturan::get();



        return ResponseFormatter::success(
            $peraturan,
            'Data list peraturan berhasil diambil'
        );
    }
}
