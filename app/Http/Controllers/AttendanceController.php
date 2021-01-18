<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    public function __construct(){
      
        $this->middleware('auth');
    }

    public function index(){

        $users = User::all();

        return view('attendance.index',[

            'users' => $users

        ]);
      
    }

    public function store(){

        $attendanceCheck = Attendance::where([
            ['user_id','=',request('user_id')],
            ['attend_date','=',date('Y-m-d')]
        ])->get();

        if ($attendanceCheck->count() != 0) {
            return redirect('/attendance')->with('error', 'Attendance is already added');
        }


        $attendance = new Attendance($this->validatedAttributes());
        $attendance->attend_date = date('Y-m-d');
        $attendance->save();

        return redirect('attendance')->with('message','Attendance is recorded successfully');
      
    }

    public function validatedAttributes(){


        return request()->validate([

            'user_id' => 'required',
            'attend_date' => 'required',
            'in_time' => 'required|date_format:H:i',
            'out_time' => 'required|date_format:H:i|after:in_time',
            'remark' => 'max:255'

        ]);
      
    }
    
    
}
