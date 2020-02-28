@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tambah Data wali
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="">wali Mahasiswa</label>
                    <input type="text" name="nama" value="{{$wali->nama}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama mahasiswa</label>
                    <input type="text" name="id_mahasiswa" value="{{$wali->mahasiswa->nama}}" class="form-control" readonly>
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
