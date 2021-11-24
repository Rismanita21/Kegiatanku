@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"> Data Siswa</li>
               </ol>
             </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{route('tambah-data.siswa')}}" class="btn btn-primary">Tambah Siswa</a>
                        </div>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit">Cari Data</button>
                                </div>
                            </div>
                        </form>
                        <div class="mt-3">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($students as $student)
                                    <tr>
                                        <td>{{$student->users->first()->students->first()->nisn ?? 'Belum tersedia'}}</td>
                                        <td>{{$student->users->first()->name}}</td>
                                        <td>{{$student->users->first()->students->first()->class ?? 'Belum tersedia'}}</td>
                                        <td>{{$student->users->first()->students->first()->major ?? 'Belum tersedia'}}</td>
                                        <td>{{$student->users->first()->students->first()->status ?? 'Belum tersedia'}}</td>
                                        <td>
                                            <a href="{{route('edit-data.siswa')}}" class="btn btn-secondary btn-sm">Edit</a>
                                            <button type="submit" class="btn btn-secondary btn-sm">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection