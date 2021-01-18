<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){

        return $this->hasOne(Profile::class);
    }

    public function salary(){
      
        return $this->hasOne(Salary::class);
    }

    public function attendances(){

        return $this->hasMany(Attendance::class,'user_id');

    }

    public function salaryRecords(){
      
        return $this->hasMany(SalaryRecord::class,'user_id');

    }

    public function reports(){
        
        return $this->hasMany(Report::class,'user_id');
    }

    public function file(){

        return $this->hasMany(File::class,'user_id');
      
    }
    
    
    public function isPaid(){

        return $this->salaryRecords->first(function($user){

            if($user->month == date('F',strtotime('last month'))){

                return $user->paid == true;

            }

        });
      
    }

    public function lastWeekAttendance(){

        // $today = Carbon::today()->subDays(7);

        $user_id = $this->id;

        return Attendance::with('user')->whereHas('user',function($query) use ($user_id){

            $query->where([
                ['attend_date','>=',Carbon::today()->subDays(7)],
                ['user_id','=',$user_id]
            ]);

        })->get();
      
    }

    // public function salaryCurrentMonthRecord(){

    //     // $salaryCurrentMonthRecords = SalaryRecord::
    //     // where('month','=',date('F'))
    //     // ->orderBy('user_id','asc')
    //     // ->get();

    //     $user_id = $this->id;

    //     return SalaryRecord::with('user')->whereHas('user',function($query) use ($user_id){

    //         $query->where('month','=',date('F'))
    //                 ->orderBy('user_id','asc')
    //                 ->get();

    //     });
      
    // }
    
    
    
    
}

