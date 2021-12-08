<?php

namespace App\Http\Controllers\Pendaftaran;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Register;

class VerifiedController extends Controller
{
    public function index()
    {
        $verifieds = Register::where('status', 'terverifikasi')->paginate(6);
        return view('verifikasi.verified.index', compact('verifieds'));
    }
}
