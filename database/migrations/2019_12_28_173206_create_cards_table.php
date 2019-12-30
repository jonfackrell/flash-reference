<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('set_id');
            $table->longText('front_text')->nullable();
            $table->string('front_image_url')->nullable();
            $table->string('hint')->nullable();
            $table->longText('back_text')->nullable();
            $table->string('back_image_url')->nullable();
            $table->integer('order')->unsigned();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('set_id')
                ->references('id')
                ->on('sets')
                ->onDelete('cascade');
        });

        DB::statement("ALTER TABLE cards AUTO_INCREMENT = 1000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
