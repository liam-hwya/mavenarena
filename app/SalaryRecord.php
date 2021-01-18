<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryRecord extends Model
{

    public function user(){

        return $this->belongsTo(User::class);
      
    }

    public function paidSalary(){

        $this->paid = true;
      
    }

    
    
    
}
