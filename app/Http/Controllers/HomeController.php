<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;


class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::with('merks')->get();

        return view('home', compact('cars'));
    }
}
