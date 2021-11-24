@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Verifikasi Pendaftaran</li> 
               </ol>
             </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{route('verifikasi-pendaftaran.ulang')}}" class="btn btn-primary">Daftar Ulang</a>
                            <a href="{{route('verifikasi-pendaftaran.peserta')}}" class="btn btn-primary">Peserta</a>
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
                               
                            </div>
                        </form>

                        <div class="mt-3">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode Kegiatan</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>TGL Daftar</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($verifikasiPembayarans as $pembayaran)
                                    <tr>
                                        <td>{{$pembayaran->activity->kode_activity}}</td>
                                        <td>Nisn belum ada</td>
                                        <td>{{$pembayaran->user->name}}</td>
                                        <td>{{$pembayaran->created_at->diffForHumans()}}</td>
                                        <td>
                                        <span class="badge bg-secondary">
                                             {{$pembayaran->status}}
                                        </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$verifikasiPembayarans->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection