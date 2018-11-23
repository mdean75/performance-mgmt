<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        //
        $random = random_bytes(10);
        echo $random;
        User::updateOrCreate([
            'first_name'    => 'John',
            'last_name'     => 'Doe',
            'username'      => 'jdoe',
            'email'         => 'jdoe@testing.com',
            'password'      =>  Hash::make($random),
            'team_id'       => 1,
            'manager_id'    => 1,
            'job_title_id'  => 1,
            'department_id' => 1,
            'pay_grade_id'  => 1,
            'is_manager'    => 1
            ]);

    }
}
