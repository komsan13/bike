<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storages', function (Blueprint $table) {
            $table->id();
            $table->integer('storages_id')->nullable();
            $table->string('invoice')->nullable();
            $table->integer('type_id')->nullable();
            $table->string('model_number')->nullable();
            $table->string('tank_number')->nullable();
            $table->integer('mile')->nullable();
            $table->decimal('price',9,2)->nullable();
            $table->decimal('down',9,2)->nullable();
            $table->decimal('finance',9,2)->nullable();
            $table->float('interest')->nullable();
            $table->decimal('discount',9,2)->nullable();
            $table->string('status')->nullable();
            $table->integer('accessories_id')->nullable();
            $table->date('expire_date')->nullable();
            $table->string('book')->nullable();
            $table->string('img')->nullable();
            $table->string('transcript')->nullable();
            $table->string('date');
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
        Schema::dropIfExists('storages');
    }
};
