<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $data = [
            'kegiatans' => Activity::get(),
            'activitys' => Activity::latest()->get(),
        ];

        return view('index', $data);
    }
}