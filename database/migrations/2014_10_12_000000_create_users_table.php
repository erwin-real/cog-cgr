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
            $table->string('email')->nullable()->unique();
            $table->char('gender', 1);
            $table->date('birthday')->nullable();
            $table->char('group_age', 5);
            $table->text('address');
            $table->string('cluster_area');
            $table->string('head_cluster_area')->nullable()->unique();
            $table->string('head_department')->nullable()->unique();
            $table->string('contact')->nullable();
            $table->char('journey', 20)->default('pre-believer');
            $table->tinyInteger('cldp')->nullable();
            $table->string('username')->nullable()->unique();
            $table->string('password')->nullable();

            $table->string('type')->default('member');
            $table->unsignedInteger('leader_id');
            $table->unsignedInteger('cg_id')->nullable();
            $table->boolean('is_leader')->default(0);
            $table->boolean('is_active')->default(1);
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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
