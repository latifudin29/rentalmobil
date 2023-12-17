<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $fillable = ['invoice', 'id_user', 'sim', 'id_car', 'rent_date', 'rent_back', 'price', 'amount', 'status'];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function cars()
    {
        return $this->belongsTo(Car::class, 'id_car');
    }
}
