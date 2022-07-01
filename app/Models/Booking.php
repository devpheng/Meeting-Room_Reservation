<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Booking extends Model
{
    use HasFactory;

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
