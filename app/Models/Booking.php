<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'time_in',
        'time_out',
        'created_at',
        'updated_at'
    ];

    public function department(){
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
}
