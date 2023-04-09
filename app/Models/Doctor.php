<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scedule;
use App\Models\Speciality;
class Doctor extends Model
{
    use HasFactory;
    protected $table = "doctors_list";
    public function scedules(){
        
            return $this->hasMany(Scedule::class, 'doctor_id', 'id');
        
    }
   
}
                                                