<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $fillable=['user_id','in_time','out_time','remark'];

    public function User(){

        return $this->belongsTo(User::class);
      
    }
    
}
