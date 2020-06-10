<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];
    public function userrole(){
        $this->hasMany('App/UserRole','role_id','id');
    }
}
