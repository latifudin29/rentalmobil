@extends('main')

@section('konten')

<h3 class="text-center">Form Create Data Cars</h3><br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2"></div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('tampilcar') }}"> Back</a>
        </div>
    </div>
</div>
<form action="{{ route('simpancar') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Nama">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Merk</strong>
                <select name="id_merk" class="form-control">
                    <option value="" disabled selected>Select Merk</option>
                    @foreach ($merks as $merk)
                    <option value="{{ $merk->id }}">{{ $merk->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Plat Nomor</strong>
                <input type="text" name="license_number" class="form-control" placeholder="Enter Plat Nomor">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Warna</strong>
                <input type="text" name="color" class="form-control" placeholder="Enter Warna">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Sewa /Hari</strong>
                <input type="number" name="price" class="form-control" placeholder="Enter Harga Sewa">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto Mobil</strong>
                <input type="file" name="image" class="form-control-file">
            </div>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection