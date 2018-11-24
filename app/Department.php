<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $fillable = ['department_name'];

    protected $primaryKey = 'department_id';

    public function users() {
        return $this->hasMany('App\User', 'department_id', 'department_id');
    }
}
