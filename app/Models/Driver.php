<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    public function getStatus(){
        if($this->status == 1){
            return 'Available';
        }elseif($this->status == 2){
            return 'Unavailable';
        }elseif($this->status == 3){
            return 'Resigned';
        }
        return '';
    }

    public function car()
    {
        return $this->hasOne('App\Models\Car');
    }
}
