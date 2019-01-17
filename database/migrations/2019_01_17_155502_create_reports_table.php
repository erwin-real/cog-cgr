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
            $table->unsignedInteger('leader_id');
            $table->timestamp('date_cg');
            $table->string('cluster_area');
            $table->string('consolidation_report');
            $table->boolean('is_deleted');
            $table->string('c2s_leader');
            $table->string('topic');
            $table->unsignedInteger('offering');
            $table->string('present');
            $table->string('absent');
            $table->string('type');
            $table->string('comment');
            $table->timestamp('date_submitted');
            $table->boolean('is_verified');
            $table->timestamp('date_verified');
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
        Schema::dropIfExists('reports');
    }
}
