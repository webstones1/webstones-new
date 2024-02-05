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
        Schema::create('excellenceandexpertise', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('tabTopTitle');
            $table->string('tabRightTitle');
            $table->string('tabBottomTitle');
            $table->string('tabLeftTitle');
            $table->string('image')->nullable(); // Added image column
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
        Schema::dropIfExists('excellenceandexpertise');
    }
};
