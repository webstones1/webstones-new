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
        // Schema::create('sliders', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('firstTitle');
            $table->string('secondTitle');
            $table->string('image_path');
            $table->enum('is_enabled', ['y', 'n'])->default('y');
            $table->enum('is_deleted', ['y', 'n'])->default('n');
            $table->timestamps();
            $table->softDeletes(); // Adds 'deleted_at' column for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
};
