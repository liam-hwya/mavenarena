<?php

namespace App\Http\Controllers;

use App\File;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct(){
      
        $this->middleware('auth');
    }
    

    public function index(){

        $users = User::all();

        return view('profile.index',[

            'users' => $users

        ]);
      
    }

    public function show(User $user){

        return view('profile.show',[

            'user' => $user

        ]);

    }

    public function add(User $user){
      
        return view('profile.add',[

            'user' => $user

        ]);
    }

    public function store(User $user,Profile $profile){

        $this->validatedAttributes();

        if(request()->hasFile('avatar')){

            if(request()->file('avatar')->isValid()){

                request()->validate([

                    'avatar' => 'mimes:jpeg,png|max:1014',

                ]);

                $extension = request('avatar')->extension();

                request('avatar')->storeAs('/public/files/avatars',uniqid().'.'.$extension);

                $url = Storage::url($user->id.'.'.$extension);

                File::create([
                    'user_id' => $user->id,
                    'avatar' => $url
                ]);

            }else{

                abort(500,'Could not upload image');

            }

        }

        $profile->user_id = $user->id;
        $profile->phone = request('phone');
        $profile->address = request('address');
        $profile->save();
        
        return redirect('/profile')->with('message','Added Successfully');
      
    }
    
    

    public function update(Profile $profile){


        $profile->update($this->validatedAttributes());

        return redirect('/profile')->with('message','Updated Successfully');
      
    }

    public function validatedAttributes(){

        return request()->validate([

            'phone' => 'required',
            'address' => 'required'

        ]);
      
    }
    
    
    


    
    
}
