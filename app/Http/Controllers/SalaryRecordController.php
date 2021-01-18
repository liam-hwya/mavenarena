<?php

namespace App\Http\Controllers;

use App\SalaryRecord;
use App\User;
use Illuminate\Http\Request;

class SalaryRecordController extends Controller
{

    public function __construct(){
      
        $this->middleware('auth');
    }

    public function index(){

        $salaryCurrentMonthRecords = SalaryRecord::
                            where('month','=',date('F'))
                            ->orderBy('user_id','asc')
                            ->get();

        $salaryPrevMonthRecords = SalaryRecord::
                            where('month','=',date('F',strtotime('last month')))
                            ->orderBy('user_id','asc')
                            ->get();

        $users = User::all();

        return view('salaryrecord.index',[

            'salaryCurrentMonthRecords' => $salaryCurrentMonthRecords,

            'salaryPrevMonthRecords' => $salaryPrevMonthRecords,

            'users' => $users

        ]);
      
    }

    public function store(){

        $this->validatedAttributes();

        $salaryRecordCheck = SalaryRecord::where([
            ['user_id','=',request('user_id')],
            ['month','=',request('month')]
        ])->get();

        if($salaryRecordCheck->count()!=0){

            return redirect('/salaryRecord')->with('error','Record is already added');

        }

        $salaryRecord = new SalaryRecord();

        $salaryRecord->user_id = request('user_id');
        $salaryRecord->month = request('month');

        if(request('remark')){

            $salaryRecord->remark = request('remark');

        }

        $salaryRecord->paidSalary();
        $salaryRecord->save();

        return redirect('/salaryRecord')->with('message','Record is added successfully');
      
    }

    public function validatedAttributes(){

        return request()->validate([

            'user_id' => 'required',
            'month' => 'required',
            

        ]);
      
    }
    
    
}
