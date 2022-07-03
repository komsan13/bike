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
            $table->boolean('pipe')->nullable()->default(false);
            $table->boolean('hand')->nullable()->default(false);
            $table->boolean('glass')->nullable()->default(false);
            $table->boolean('key')->nullable()->default(false);
            $table->boolean('rear')->nullable()->default(false);
            $table->boolean('shield')->nullable()->default(false);
            $table->boolean('seat')->nullable()->default(false);
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
