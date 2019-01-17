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
            $table->increments('id');
            $table->unsignedInteger('leaderID');
            $table->boolean('is_verified');
            $table->timestamp('date_verified');
            $table->string('cluster_area');







            $table->timestamps();




            $table->boolean('isActive');
            $table->string('address');
            $table->string('clusterArea');
            $table->string('headClusterArea');
            $table->unsignedInteger('leaderID');
            $table->timestamp('birthday');
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
