<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Car;
use App\Models\User;

class TransactionController extends Controller
{
    public function tampilhistori()
    {
        $transactions = Transaction::with('users', 'cars')->get();

        return view('transaction/showHistory', compact('transactions'));
    }

    public function tambahsewa($id)
    {
        $car = Car::find($id);
        $idUser = Auth::user()->id;
        $user = User::find($idUser);

        $latestTransaction = Transaction::latest()->first();
        $latestInvoiceNumber = $latestTransaction ? $latestTransaction->invoice : null;

        if ($latestInvoiceNumber) {
            $invoiceNumber = 'trans' . str_pad((intval(substr($latestInvoiceNumber, 4)) + 1), 4, '0', STR_PAD_LEFT);
        } else {
            $invoiceNumber = 'trans0001';
        }

        return view('transaction/formTransaction', compact('car', 'user', 'invoiceNumber'));
    }

    public function simpansewa(Request $request)
    {
        $request->validate([
            'invoice' => 'required',
            'id_user' => 'required',
            'sim' => 'required',
            'id_car' => 'required',
            'rent_date' => 'required|date',
            'rent_back' => 'required|date',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        Transaction::create([
            'invoice' => $request->invoice,
            'id_user' => $request->id_user,
            'sim' => $request->sim,
            'id_car' => $request->id_car,
            'rent_date' => $request->rent_date,
            'rent_back' => $request->rent_back,
            'price' => $request->price,
            'amount' => $request->amount,
        ]);

        return redirect()->route('tampilhistori')->with('success', 'Transaction has been created successfully.');
    }
}
