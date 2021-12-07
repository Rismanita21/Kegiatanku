<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Student;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    public function index()
    {
        $students = Role::with('users')->where('name', 'student')->latest()->paginate(6);

        return view('data.siswa.index', compact('students'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('data.siswa.create', compact('roles'));
    }

    public function edit()
    {
        return view('data.siswa.edit');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'           =>  'required',
            'email'          =>  'required',
            'password'       =>  'required',
        ]);

        $request->merge(['password' => bcrypt($request->get('password'))]);

        if ($user = User::create($request->except('roles'))) {
            $user->syncRoles($request->get('roles'));
        if ($user->save()){
            $siswa = Student::create([
                'user_id'         => $user->id,
                'nisn'            => $request->nisn,
                'gender'          => $request->gender,
                'religion'        => $request->religion,
                'major'           => $request->major,
                'class'           => $request->class,
                'phone'           => $request->phone,
                'status'          => $request->status,
                
            ]);
        };
            flash()->success('Anggota Baru Berhasil Ditambahkan');
        } else {
            flash()->error('Tidak Dapat Menambahkan Pengguna Baru');
        }
       
        
        return redirect()->back();
    }
}
