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
                                        <th>Nama Siswa sekolah</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($students as $student)
                                    <tr>
                                        <td>{{$student->students->first()->nisn ?? 'belum Tersedia'}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->students->first()->class ?? 'belum Tersedia'}}</td>
                                        <td>{{$student->students->first()->major ?? 'belum Tersedia'}}</td>
                                        <td>{{$student->students->first()->status ?? 'belum Tersedia'}}</td>
                                        <td>
                                        <form action="{{route('destroy.data.siswa', $student->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('edit-data.siswa', $student->id)}}" class="btn btn-secondary btn-sm">Edit</a>
                                                <button type="submit" class=" btn btn-secondary btn-sm">Hapus</button>
                                            </form>
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