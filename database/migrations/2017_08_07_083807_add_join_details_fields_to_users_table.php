<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJoinDetailsFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table) {
          $table->integer('branch_id')->unsigned()->nullable();;
          $table->integer('course_id')->unsigned()->nullable();;
          $table->integer('campus_id')->unsigned()->nullable();;
          $table->integer('joining_year');
          $table->integer('graduation_year');
      });

      Schema::table('users', function (Blueprint $table) {
        $table->engine = 'InnoDB';

        $table->foreign('branch_id')->references('id')->on('branches');
        $table->foreign('course_id')->references('id')->on('courses');
        $table->foreign('campus_id')->references('id')->on('campuses');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {
          $table->dropForeign(['branch_id', 'course_id', 'campus_id']);
          $table->dropColumn('branch_id');
          $table->dropColumn('course_id');
          $table->dropColumn('campus_id');
          $table->dropColumn('joining_year');
          $table->dropColumn('graduation_year');
      });
    }
}
