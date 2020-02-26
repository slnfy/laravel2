@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tambah Data Dosen
                </div>
                <div class="card-body">
                   @csrf
                   <div class="form-group">
                       <label for="">Nama Dosen</label>
                   <input type="text" name="nama" value="{{$dosen->nama}}" class="form-control" required>
                   </div>
                   <div class="form-group">
                        <label for="">Nomor Induk Pegawai Dosen</label>
                       <input type="text" name="nipd" value="{{$dosen->nipd}}" class="form-control" required>
                   </div>
                   <div class="form-group">
                   <a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
