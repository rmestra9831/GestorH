<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nameSchedule');
            $table->string('lu1');
            $table->string('lu2');
            $table->string('lu3');
            $table->string('lu4');
            $table->string('lu5');
            $table->string('lu6');
            $table->string('ma1');
            $table->string('ma2');
            $table->string('ma3');
            $table->string('ma4');
            $table->string('ma5');
            $table->string('ma6');
            $table->string('mi1');
            $table->string('mi2');
            $table->string('mi3');
            $table->string('mi4');
            $table->string('mi5');
            $table->string('mi6');
            $table->string('ju1');
            $table->string('ju2');
            $table->string('ju3');
            $table->string('ju4');
            $table->string('ju5');
            $table->string('ju6');
            $table->string('vi1');
            $table->string('vi2');
            $table->string('vi3');
            $table->string('vi4');
            $table->string('vi5');
            $table->string('vi6');
            $table->timestamps();
            // llaves foraneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
