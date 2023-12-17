<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Merk;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function tampilcar()
    {
        $cars = Car::with('merks')->get();

        return view('car/dataCar', compact('cars'));
    }

    public function tambahcar()
    {
        $merks = Merk::all();
        return view('car/createCar', compact('merks'));
    }

    public function simpancar(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_merk' => 'required',
            'license_number' => 'required',
            'color' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $originalFilename = $file->getClientOriginalName();
            $filename = md5($originalFilename) . '.' . $file->getClientOriginalExtension();


            $file->move(public_path('images/cars'), $filename);

            Car::create([
                'name' => $request->name,
                'id_merk' => $request->id_merk,
                'license_number' => $request->license_number,
                'color' => $request->color,
                'price' => $request->price,
                'image' => $filename,
            ]);

            return redirect()->route('tampilcar')->with('success', 'Car has been created successfully.');
        } else {
            return redirect()->back()->withInput()->withErrors(['image' => 'Invalid or missing image file.']);
        }
    }

    public function ubahcar($id)
    {
        $car = Car::find($id);
        $merks = Merk::all();

        return view('car/editCar', compact('car', 'merks'));
    }

    public function updatecar(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'id_merk' => 'required',
            'license_number' => 'required',
            'color' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $car = Car::find($id);        
        $car->update($request->all());

        return redirect()->route('tampilcar')->with('success', 'Car Has Been updated successfully');
    }

    public function hapuscar($id)
    {
        $car = Car::find($id);
        if (!$car) {
            return redirect()->route('tampilcar')->with('error', 'Car not found');
        }

        $gambarPath = 'images/cars/' . $car->image;
        if (Storage::exists($gambarPath)) {
            Storage::delete($gambarPath);
        }

        $car->delete();
        return redirect()->route('tampilcar')->with('success', 'Car has been deleted successfully');
    }
}
