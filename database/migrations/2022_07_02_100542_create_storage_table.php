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
        Schema::create('storage', function (Blueprint $table) {
            $table->id();
            $table->integer('storage_id');
            $table->integer('type_id');
            $table->string('model_number');
            $table->string('tank_number');
            $table->decimal('price',9,2);
            $table->decimal('down',9,2);
            $table->decimal('finance',9,2);
            $table->float('interest');
            $table->decimal('discount',9,2);
            $table->string('status');
            $table->string('accessories01');
            $table->string('accessories02');
            $table->string('accessories03');
            $table->string('accessories04');
            $table->string('accessories05');
            $table->string('accessories06');
            $table->string('accessories07');
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
        Schema::dropIfExists('storage');
    }
};
