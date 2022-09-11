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
        Schema::create('user', function (Blueprint $table) {
          
        $table->increments('id');
        $table->string('staff_id');
        $table->string('username');
        $table->string('password');
        $table->string('account_type');
        });

        DB::table('user')->insert(
            array(
                'staff_id' => "1",
                'username' => "admin",
                'password' => "ran123",
                'account_type' => "admin"
            )
         );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
