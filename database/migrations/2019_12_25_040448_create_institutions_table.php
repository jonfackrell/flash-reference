<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->uuid('consumer_key');
            $table->uuid('secret');
            $table->boolean('enabled')->default(1);
            $table->date('enabled_from')->nullable();
            $table->date('enabled_to')->nullable();
            $table->timestamps();
        });

        Schema::create('admin_institution', function (Blueprint $table) {
            $table->unsignedBigInteger('institution_id')->unsigned();
            $table->unsignedBigInteger('admin_id')->unsigned();

            $table->foreign('institution_id')
                ->references('id')
                ->on('institutions');
            $table->foreign('admin_id')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');
            $table->primary(['institution_id', 'admin_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institutions');
    }
}
