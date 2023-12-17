@extends('main')

@section('konten')
<h3 class="text-center">Tampil History Sewa</h3><br>
<table class="table table-bordered table-hover">
    <tr>
        <th>Invoice</th>
        <th>Nama Mobil</th>
        <th>Plat Nomor</th>
        <th>Warna</th>
        <th>Tanggal Sewa</th>
        <th>Tanggal Berakhir</th>
        <th>Harga Sewa /hari</th>
        <th>Total</th>
        <th>Status</th>
    </tr>
    @foreach($transactions as $index => $t)
    <tr>
        <td>{{$t->invoice}}</td>
        <td>{{$t->cars->name}}</td>
        <td>{{$t->cars->license_number}}</td>
        <td>{{$t->cars->color}}</td>
        <td>{{$t->rent_date}}</td>
        <td>{{$t->rent_back}}</td>
        <td>Rp. {{ number_format($t->price, 0, ',', '.') }}</td>
        <td>Rp. {{ number_format($t->amount, 0, ',', '.') }}</td>
        <td>
            @if ($t->status == 1)
            Selesai
            @else
            Belum Selesai
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection