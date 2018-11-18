<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersManagerIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $random = random_bytes(10);

        DB::table('users')->insert(
            [
                'first_name'    => 'initial',
                'last_name'     => 'user',
                'username'      => 'iuser',
                'email'         => 'no@email.com',
                'password'      =>  Hash::make($random),
                'team_id'       => 1,
                'manager_id'    => 1,
                'job_title_id'  => 1,
                'department_id' => 1,
                'pay_grade_id'  => 1
            ]
        );

    }
}
