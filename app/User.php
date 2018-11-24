<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
        [
            'user_id',
            'first_name',
            'last_name',
            'username',
            'email',
            'password',
            'phone',
            'team_id',
            'manager_id',
            'job_title_id',
            'department_id',
            'pay_grade_id',
            'is_manager',
            'manager_check'
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $primaryKey = 'user_id';

    public function department() {

        return $this->belongsTo('App\Department', 'department_id', 'department_id');
    }

    public function team() {
        return $this->belongsTo('App\Team', 'team_id', 'team_id');
    }

    public function job_title() {
        return $this->belongsTo('App\JobTitle', 'job_title_id', 'job_title_id');
    }

    public function pay_grade() {
        return $this->belongsTo('App\PayGrade', 'pay_grade_id', 'pay_grade_id');
    }

    public function manager() {
        return $this->belongsTo('App\User', 'manager_id', 'user_id');
    }


}
