<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function stationery()
    {
        return $this->belongsTo('App\Models\Stationery');
    }
}
