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
        Schema::create('accessories', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->nullable();
            $table->string('pipe')->nullable();
            $table->string('hand')->nullable();
            $table->string('glass')->nullable();
            $table->string('acc_keys')->nullable();
            $table->string('rear')->nullable();
            $table->string('shield')->nullable();
            $table->string('seat')->nullable();
            $table->text('other')->nullable()->default('other_Accessories');
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
        Schema::dropIfExists('accessories');
    }
};
