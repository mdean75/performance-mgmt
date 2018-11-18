<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayGrade extends Model
{
    //
    protected $table = 'pay_grades';

    protected $primaryKey = 'pay_grade_id';

    protected $fillable = ['pay_grade_name', 'pay_grade_range'];
}
