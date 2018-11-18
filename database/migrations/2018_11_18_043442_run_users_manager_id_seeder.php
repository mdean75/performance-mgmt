<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RunUsersManagerIdSeeder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Before we can add the manager_id foreign key constraint we must create a "dummy" user record. This record
        // will be used to assign the initial user a manager.  If we don't do this before adding the constraint there
        // will be no way to add a user because the manager_id is required.

        // first seed the dependent tables
        Artisan::call('db:seed');
        //Artisan::call('db:seed', ['--class' => UsersManagerIdSeeder::class]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

