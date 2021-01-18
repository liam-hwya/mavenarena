<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct(){
      
        $this->middleware('auth');
    }

    public function index(){

        $staffs = User::all();

        return view('staff.index',[

            'staffs' => $staffs

        ]);
      
    }

    public function store(){

        User::create($this->validatedAttributes());

        return redirect('/staffs')->with('message','Added Successfully');
      
    }

    protected function validatedAttributes()
    {
        return request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    
    
}
