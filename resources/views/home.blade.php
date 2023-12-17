@extends('main')

@section('konten')
@if (Auth::user()->role === 'admin')
<h4>Selamat Datang <b>{{Auth::user()->name}}</b>, Anda Login sebagai <b>{{Auth::user()->role}}</b>.</h4>
@elseif (Auth::user()->role === 'user')
<h4>Selamat Datang <b>{{Auth::user()->name}}</b>, Anda Login sebagai <b>{{Auth::user()->role}}</b>.</h4>
<div class="row"><br>
    @foreach($cars as $car)
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="{{ asset('images/cars/' . $car->image) }}" alt="...">
            <div class="caption">
                <h3 class="text-center">{{ $car->name }}</h3>
                <div class="row">
                    <p class="text-center">Rp. {{ number_format($car->price, 0, ',', '.') }} /hari</p>
                    @if ($car->status == 1)
                    <p id="status" class="text-center" style="background-color: green; color: white; padding: 5px;">
                        Tersedia
                    </p>
                    @else
                    <p id="status" class="text-center" style="background-color: red; color: white; padding: 5px;">
                        Tidak Tersedia
                    </p>
                    @endif
                </div>
                @if ($car->status == 1)
                <p class="text-center"><a href="{{ route('tambahsewa', ['id' => $car->id]) }}" class="btn btn-primary" role="button">Sewa</a>
                    @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection