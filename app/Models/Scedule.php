<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
class Scedule extends Model
{
    use HasFactory;
    protected $table = "doctors_schedule";
    public function getTimeToAttribute($value)
    {
        $bool = true;
        $val = intval(substr($value, 0, strpos($value, ":")));
        if($val > 12){
            $val = $val - 12;
            $bool = false;
        }
        $tob = $bool ? "AM" : "PM" ;
      return strval($val) . ":00" . $tob  ;
    }
    public function getTimeFromAttribute($value)
    {
        $val = intval(substr($value, 0, strpos($value, ":")));
        $bool = true;
        if($val > 12){
            $bool = false;
            $val = $val - 12;
        }
        $tob = $bool ? "AM" : "PM" ;
        return strval($val) . ":00" .$tob   ;
    }
}
