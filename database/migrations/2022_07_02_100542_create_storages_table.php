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
            $table->integer('storages_id');
            $table->integer('type_id');
            $table->string('model_number');
            $table->string('tank_number');
            $table->integer('mile');
            $table->decimal('price',9,2);
            $table->decimal('down',9,2);
            $table->decimal('finance',9,2);
            $table->float('interest');
            $table->decimal('discount',9,2);
            $table->string('status');
            $table->integer('accessories_id');
            $table->date('expire_date');
            $table->string('book');
            $table->string('img');
            $table->string('transcript');
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
