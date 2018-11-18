<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $primaryKey = 'team_id';

    protected $fillable = ['name'];

}
