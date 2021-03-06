<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stationery extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'quantity', 'stock', 'remark', 'image'];

    public function AdditionStock()
    {
        return $this->hasMany('App\Models\AdditionStock');
    }
}
