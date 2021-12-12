<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfrensiyachilarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kof_chilar', function (Blueprint $table) {
            $table->bigIncrements('id');
   
            $table->string('title');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('gender');
            $table->string('email');
            $table->string('country');
            $table->string('city');
            $table->string('organization');
            $table->string('position');
            $table->string('academic_degree');
            $table->string('work_phone');
            $table->string('desired_status');
            $table->string('need_visa');
            $table->string('accompanying_person');
            $table->string('comments');
            $table->string('tolov')->default(0);
            $table->string('tolov_info');
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
        Schema::table('kof_chilar', function (Blueprint $table) {
            //
        });
    }
}
