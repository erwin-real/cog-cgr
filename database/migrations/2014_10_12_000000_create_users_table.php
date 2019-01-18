<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();

            $table->string('name');
            $table->string('type')->default('member');
            $table->boolean('is_leader')->default(0);
            $table->boolean('is_active')->default(0);
            $table->string('address')->nullable();
            $table->string('cluster_area')->nullable();
            $table->string('head_cluster_area')->nullable();
            $table->timestamp('birthday')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('contact_number')->nullable();
            $table->string('gender')->nullable();
            $table->string('group_age')->nullable();
            $table->string('journey')->nullable();
            $table->string('cldp')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
