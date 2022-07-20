<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionStock extends Model
{
    use HasFactory;

    protected $fillable = ['addition', 'stationery_id'];

    protected $table = "additions_stock";
}
