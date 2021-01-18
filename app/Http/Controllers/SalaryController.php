<?php

namespace App\Http\Controllers;

use App\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{

    public function __construct(){
      
        $this->middleware('auth');
    }

    public function index(){

        $salaries = Salary::all();

        return view('salary.index',[

            'salaries' => $salaries

        ]);
      
    }

    public function show(Salary $salary){

        // return $salary;

        return view('salary.show',[

            'salary' => $salary

        ]);
      
    }

    public function update(Salary $salary){

        $salary->update($this->validatedAttributes());

        return redirect('/salary')->with('message','Updated Successfully');
      
    }
    
    public function validatedAttributes(){

        return request()->validate([

            'position' => 'required',
            'amount' => 'required',
            'remark' => 'max:255'

        ]);
      
    }
    
    
}
