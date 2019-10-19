<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionPhoneUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_phone_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("phone_id");
            $table->integer('user_id');
            $table->smallInteger('status_action_phones_id');
            $table->text('note')->default(null);
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
        Schema::dropIfExists('action_phone_users');
    }
}
