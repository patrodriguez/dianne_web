<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('soon_to_wed_id');
            $table->foreign('soon_to_wed_id')->references('id')->on('soon_to_weds');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->decimal('value', 5, 1)->nullable();
            $table->decimal('promptness', 5, 1)->nullable();
            $table->decimal('quality', 5, 1)->nullable();
            $table->decimal('professionalism', 5, 1)->nullable();
            $table->decimal('overall', 5, 1)->nullable();
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
        Schema::dropIfExists('feedbacks');
    }
}
