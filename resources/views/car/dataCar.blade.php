@extends('main')

@section('konten')
<h3 class="text-center">Tampil Data Cars</h3><br>
<a class="btn btn-success" href="{{route('tambahcar')}}"><i class="fa fa-plus"></i> Tambah Car</a><br><br>
<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>Nama Mobil</th>
        <th>Merk</th>
        <th>Plat Nomor</th>
        <th>Warna</th>
        <th>Harga Sewa /hari</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    @foreach($cars as $index => $car)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{$car->name}}</td>
        <td>{{$car->merks->name}}</td>
        <td>{{$car->license_number}}</td>
        <td>{{$car->color}}</td>
        <td>Rp. {{ number_format($car->price, 0, ',', '.') }}</td>
        <td>
            @if ($car->status == 1)
            Tersedia
            @else
            Tidak Tersedia
            @endif
        </td>
        <td>
            <a href="{{ route('ubahcar', ['id' => $car->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
            <a href="{{ route('hapuscar', ['id' => $car->id]) }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
    @endforeach
</table>
@endsection