<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class members extends Model
{
    public function Fellowship()
    {
        return $this->belongsTo('App\Fellowship','fellowship_id');
    }
   

}
