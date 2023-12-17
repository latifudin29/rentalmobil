@extends('main')

@section('konten')

<h3 class="text-center">Form Edit Data Cars</h3><br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2"></div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('tampilcar') }}"> Back</a>
        </div>
    </div>
</div>
<form action="{{ route('updatecar',  ['id' => $car->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Nama" value="{{ old('name', $car->name) }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Merk</strong>
                <select name="id_merk" class="form-control">
                    <option value="" disabled selected>Select Merk</option>
                    @foreach ($merks as $merk)
                    <option value="{{ $merk->id }}" {{ $car->id_merk == $merk->id ? 'selected' : '' }}>{{ $merk->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class=" col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Plat Nomor</strong>
                <input type="text" name="license_number" class="form-control" placeholder="Enter Plat Nomor" value="{{ $car->license_number }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Warna</strong>
                <input type="text" name="color" class="form-control" placeholder="Enter Warna" value="{{ $car->color }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Sewa /Hari</strong>
                <input type="number" name="price" class="form-control" placeholder="Enter Harga Sewa" value="{{ $car->price }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto Mobil</strong>
                <input type="file" name="image" class="form-control-file">
                @if ($car->image)
                <br>
                <img src="{{ asset('images/cars/' . $car->image) }}" alt="{{ $car->image }}" width="200" style="border: 1px solid #ccc;">
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status</strong>
                <select name="status" class="form-control">
                    <option value="" disabled selected>Select Status</option>
                    <option value="1" {{ $car->status == 1 ? 'selected' : '' }}>Tersedia</option>
                    <option value="2" {{ $car->status == 2 ? 'selected' : '' }}>Tidak Tersedia</option>
                </select>
            </div>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection