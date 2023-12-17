@extends('main')

@section('konten')
<h3 class="text-center">Form Create Sewa Cars</h3><br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2"></div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
        </div>
    </div>
</div>
<form action="{{ route('simpansewa') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Invoice</strong>
                <input type="text" name="invoice" class="form-control" readonly value="{{ $invoiceNumber }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" hidden>
            <div class="form-group">
                <strong>Id User</strong>
                <input type="text" name="id_user" class="form-control" value="{{ $user->id }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>SIM</strong>
                <input type="text" name="sim" class="form-control" value="{{ $user->sim }}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" hidden>
            <div class="form-group">
                <strong>Id Car</strong>
                <input type="text" name="id_car" class="form-control" value="{{ $car->id }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Sewa</strong>
                <input type="date" name="rent_date" class="form-control" id="rent_date">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Berakhir</strong>
                <input type="date" name="rent_back" class="form-control" id="rent_back">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Sewa /Hari</strong>
                <input type="number" name="price" class="form-control" value="{{ $car->price }}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total</strong>
                <input type="number" name="amount" class="form-control" id="total_amount" readonly>
            </div>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Submit</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var rentDateInput = document.getElementById('rent_date');
        var rentBackInput = document.getElementById('rent_back');
        var priceInput = document.getElementsByName('price')[0];
        var totalAmountInput = document.getElementById('total_amount');

        rentDateInput.addEventListener('change', calculateTotal);
        rentBackInput.addEventListener('change', calculateTotal);

        function calculateTotal() {
            var rentDate = new Date(rentDateInput.value);
            var rentBack = new Date(rentBackInput.value);

            var oneDay = 24 * 60 * 60 * 1000; // Satu hari dalam milidetik
            var diffDays = Math.round(Math.abs((rentBack - rentDate) / oneDay));

            var price = parseFloat(priceInput.value);

            var totalAmount = diffDays * price;

            totalAmountInput.value = totalAmount;
        }

        calculateTotal();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var currentDate = new Date().toISOString().split('T')[0];
        document.getElementById('rent_date').value = currentDate;
    });
</script>

@endsection