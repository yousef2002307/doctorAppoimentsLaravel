<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Doctor;
use App\Models\Speciality;
use DateTime;



use Redirect;
class Viewscon extends Controller
{
    public function home(){
        $rows = DB::select('select * from `medical_specialty`');
        
        return view("home2",compact('rows'));
    }
    ////////////////////////////////////////
    public function requestapp(Request $request){
        $today = new \DateTime($request->date);  
        $todaycarbon = new Carbon($today);
        $now = new Carbon('now');
        $wholedateandtime = $request->date." ".$request->time;
        $test = new Carbon($wholedateandtime);
       $finaltime =  $test->format('Y-m-d H:i:s');
      
        if($todaycarbon->lt($now->format('d F Y'))){
            return \Redirect::back()->withErrors(['msg' => 'the date you enter is invalid']);
        }
        $isdaythesame = false;
        $selctedday= '';
        $timeto = Carbon::now();
        $timefrom = Carbon::now();
        $dataofschedule = DB::select('SELECT * FROM `doctors_schedule` where doctor_id = ?', [$request->hidden]);
        foreach ($dataofschedule as $key => $value) {
            
            if(str_contains($value->day,$today->format('D'))) {
                $timeto = new Carbon($value->time_to);
                 $timefrom = new Carbon($value->time_from);
                $selctedday = $value->day;
                $isdaythesame = true;
                break;
            }
               
        }
       
        if(!$isdaythesame){
            return \Redirect::back()->withErrors(['msg' => 'the date you choose is not fit the doctor schedule']);
        }else{
          $time = new \DateTime($request->time);
          $hours = (int) $time->format("H");
          $mins = (int) $time->format("i");
          $car= new Carbon($time);
          echo $timefrom . "<br/>" . $timeto . "<br/>";
          echo $car;
         echo $selctedday. "---".  $hours ."   ". $mins; 
         //here will make comparison using carbon methods and finish this
            if($car->gte($timefrom) && $car->lte($timeto)){
                DB::insert('INSERT INTO `appointment_list` ( `doctor_id`, `patient_id`, `schedule`) values (?, ?,?)', [$request->hidden, Auth::user()->id,$finaltime]);
                return \Redirect::back()->withErrors(['msg' => 'reqest has been shubmitted succseful']);
            }else{
                return \Redirect::back()->withErrors(['msg' => 'the date you choose is not fit the doctor schedule']);
            }
        }
        
        /*
  $chosen_date = new Carbon($request->name);

         $whitelist_date = Carbon::now('Europe/London');
         $whitelist_date->addMinutes(10);
     
         echo "Chosen date must be after this date: ".$whitelist_date ."</br>";
         echo "Chosen Date: ".$chosen_date ."</br>";
     
         if ($chosen_date->gt($whitelist_date)) {
     
             echo "proceed"; 
         } else {
             echo "dont proceed";
         }
        */
       /*
        if(str_contains($string,lcfirst($today->format('D')))){
        echo $today->format('D');
        }else{
            echo "no";
        }
        */
      //  return $request->all();
    }
   
    /////////////////////////
    public function doctors(){
        $rows = DB::select('SELECT * FROM `doctors_list`');
        $sval = Doctor::find(2)->scedules;
        $arr = array();
        foreach($rows as $item){
        $strreplaced = str_replace(array('[',']'),'',$item->specialty_ids);
        $arrayofspecialities = explode(",",$strreplaced);
        $finalstr = '';
        for($i = 0; $i < count($arrayofspecialities); $i++){
           
            $spec = DB::select('SELECT * FROM `medical_specialty` WHERE id= ?', [$arrayofspecialities[$i]]);
    
            $finalstr .= $spec[0]->name . " ";
            
        }
       
        $arr[$item->id] = $finalstr;
        }
   
   return view("doctors",compact('rows','sval','arr'));
    }
    public function ajaxdoctors(Request $request){
        $sval = Doctor::find($request->id)->scedules;
         return view('pops.pop1',compact('sval'));
    }
    public function spec($id){
       
        $val = "%" . $id . "%";
        $ele = Speciality::find($id);
        $name4 = $ele->name;
        
        $rows = DB::select("SELECT * FROM `doctors_list` WHERE specialty_ids LIKE ?",[$val]);
        
        $sval = Doctor::find(2)->scedules;
        $arr = array();
        foreach($rows as $item){
        $strreplaced = str_replace(array('[',']'),'',$item->specialty_ids);
        $arrayofspecialities = explode(",",$strreplaced);
        $finalstr = '';
        for($i = 0; $i < count($arrayofspecialities); $i++){
           
            $spec = DB::select('SELECT * FROM `medical_specialty` WHERE id= ?', [$arrayofspecialities[$i]]);
    
            $finalstr .= $spec[0]->name . " ";
            
        }
       
        $arr[$item->id] = $finalstr;
        }
   
   return view("doctorsspec",compact('name4','rows','sval','arr'));
    }
}
