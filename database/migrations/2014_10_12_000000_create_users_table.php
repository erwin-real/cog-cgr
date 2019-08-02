<?php

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
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('username');
            $table->string('password')->nullable();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedInteger('leader_id');
            $table->string('type')->default('member');
            $table->boolean('is_leader')->default(0);
            $table->boolean('is_active')->default(1);
            $table->text('address');
            $table->string('cluster_area');
            $table->string('head_cluster_area')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->string('contact')->nullable();
            $table->char('gender', 1);
            $table->char('group_age', 5);
            $table->char('journey', 20)->default('pre-believer');
            $table->tinyInteger('cldp')->nullable();
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
