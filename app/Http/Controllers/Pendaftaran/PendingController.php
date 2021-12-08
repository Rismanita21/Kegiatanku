<?php

namespace App\Http\Controllers\Pendaftaran;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Register;

class PendingController extends Controller
{
    public function index()
    {
        $pendings = Register::where('status', 'pending')->paginate(6);
        return view('verifikasi.pending.index', compact('pendings'));
    }
}
