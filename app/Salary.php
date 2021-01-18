<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{

    protected $fillable = ['position','amount'];

    public function User(){
      
        return $this->belongsTo(User::class);

    }

    
    
    
    
}
