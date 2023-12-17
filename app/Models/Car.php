<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Merk;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'id_merk', 'license_number', 'color', 'price', 'image', 'status'];

    public function merks()
    {
        return $this->belongsTo(Merk::class, 'id_merk');
    }
}
