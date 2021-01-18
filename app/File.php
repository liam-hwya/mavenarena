<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['user_id','avatar'];

    public function user(){

        $this->belongsTo(User::class);
      
    }
    
}
