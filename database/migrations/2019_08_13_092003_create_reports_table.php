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
            $table->unsignedInteger('cg_id');
            $table->string('type');
            $table->string('day_cg');
            $table->time('time_cg');
            $table->string('venue')->nullable();
            $table->string('cluster_area');
            $table->string('topic');
            $table->double('offering', 15, 2)->nullable();
            $table->string('present');
            $table->string('absent')->nullable();
            $table->text('consolidation_report')->nullable();
            $table->timestamp('date_submitted')->nullable();

            $table->text('comment_ch')->nullable();
            $table->timestamp('date_verified_ch')->nullable();

            $table->text('comment_dh')->nullable();
            $table->timestamp('date_verified_dh')->nullable();

            $table->softDeletes();
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
