<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $primaryKey = 'team_id';

    protected $fillable = ['name'];

    public function users() {
        return $this->hasMany('App\User', 'team_id', 'team_id');
    }

}
