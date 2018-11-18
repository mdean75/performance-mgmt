<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEvaluationsAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('evaluation_answers', function (Blueprint $table) {
            $table->unsignedInteger('evaluation_id');
            $table->unsignedInteger('question_id');
            $table->text('answer_text');
            $table->float('answer_score');

            // create composite primary key
            $table->primary(['evaluation_id', 'question_id']);

            // foreign keys

            // If evaluation is deleted (can only be deleted if the employee is removed) no need for the answers so allow delete
            $table->foreign('evaluation_id')
                ->references('performance_evaluation_id')
                ->on('performance_evaluations')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Restrict on delete - do not allow delete if this question is present for any evaluations
            $table->foreign('question_id')
                ->references('question_id')
                ->on('evaluation_questions')
                ->onDelete('restrict')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('evaluation_answer');
    }
}
