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
        $students = User::whereHas('roles', function ($q){
            $q->where('roles.name', '=', 'student');
        })->paginate(6);

        return view('data.siswa.index', compact('students'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('data.siswa.create', compact('roles'));
    }

    public function edit($id)
    {
        $array = [
            'user' => User::findOrFail($id), 
            'role'=> Role::pluck('name','id'),
        ];
    
        return view('data.siswa.edit', $array);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'           =>  'required',
            'email'          =>  'required',
            'password'       =>  'required',s
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
                edit
            ]);
        };
            flash()->success('Anggota Baru Berhasil Ditambahkan');
        } else {
            flash()->error('Tidak Dapat Menambahkan Pengguna Baru');
        }
       
        
        return redirect()->back();
    }

    public function updated(Request $request,$id)
    {
        $student = Student::where('user_id', '=', $id)->firstOrFail();

        $student->update($request->all());

        return redirect()->back();
    }


    public function destroy(Request $request,$id)
    {
        $student =  Student::where('user_id', '=', $id)->firstOrFail();

        if($student->delete()){
            $user = User::findOrFail($id);


            $user->delete();
        }

        return redirect()->back();
    }
}



   