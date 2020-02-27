@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tambah Data Hobi
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Hobi</label>
                    <input type="text" name="hobi" value="{{$hobi->hobi}}" class="form-control" required>
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
