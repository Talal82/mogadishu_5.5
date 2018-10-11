<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id') -> unsigned();
            $table->string('serial_number') -> unique();
            $table->string('full_name');
            $table->integer('user_id') -> unsigned() -> index();
            $table->string('gender');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('marital_status');
            $table->string('address');
            $table->string('phone');
            $table->date('issue_date');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('occupation');
            $table->string('main_image');
            $table->string('thumb_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
