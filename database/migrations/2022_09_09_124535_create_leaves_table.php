<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            
        $table->increments('id');
        $table->string('staff_id');
        $table->string('reason');
        $table->string('description',1000);
        $table->date('date_of_leave');
        $table->date('date_of_leaveTo');
        $table->datetime('date_of_request');
        $table->string('apprestate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
};
