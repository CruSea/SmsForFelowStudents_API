<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberDepartment extends Model
{
    public function member()
    {
        return $this->hasMany('App\MemberDepartment','member_id');    
    }
}
