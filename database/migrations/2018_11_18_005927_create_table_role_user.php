<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRoleUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('roles_role_id')->unsigned();
            $table->integer('user_id')->unsigned();

            // composite primary key
            $table->primary(['roles_role_id', 'user_id']);

            // foreign keys

            // We do not want to delete a role that is being used by any current user
            $table->foreign('roles_role_id')
                ->references('role_id')
                ->on('roles')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            // If a user record is deleted it is not necessary or desired to keep user roles related to that user
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('role_user');
    }
}
