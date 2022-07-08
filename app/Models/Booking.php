<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Room;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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

    public function room(){
        return $this->hasOne(Room::class, 'id', 'room_id');
    }

    public function checkTimeStatus(){
        $nowDate = Carbon::now();
        if($nowDate->lt($this->time_in)){
            return true;
        }
        return false;
    }

    public function checkMeetingTime(){
        $nowDate = Carbon::now();
        if($nowDate->gt($this->time_in) && $nowDate->lt($this->time_out)){
            return true;
        }
        return false;
    }
}
