<?php

namespace App\Http\Controllers\Pendaftaran;

use PDF;
use App\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Register;

class VerifiedController extends Controller
{
    public function index()
    {
        $verifieds = Register::where('status', 'terverifikasi')->paginate(6);

        return view('daftar.student.verfied.index', compact('verifieds'));
    }
    public function sertifikat($id)
    {
        $sertifikat = Register::findOrFail($id);

        $pdf = PDF::loadView('cetak.sertifikat', compact('sertifikat'))->setPaper('a4', 'landscape');

        return $pdf->stream('sertifikat.pdf');
    }
}
