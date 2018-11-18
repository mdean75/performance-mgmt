<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    //
    protected $primaryKey = 'job_title_id';

    protected $table = 'job_titles';

    protected $fillable = ['job_title_name'];
}
