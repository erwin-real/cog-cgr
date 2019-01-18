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
            $table->string('username')->unique();
            $table->string('password');

            $table->string('name');
            $table->string('type')->default('unverified');
            $table->boolean('is_leader');
            $table->boolean('is_active');
            $table->string('address');
            $table->string('cluster_area');
            $table->string('head_cluster_area');
            $table->unsignedInteger('leader_id');
            $table->timestamp('birthday')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('contact_number');
            $table->string('gender');
            $table->string('group_age');
            $table->string('journey');
            $table->string('cldp');

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
