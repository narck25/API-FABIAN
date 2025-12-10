<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('onepieces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('fruit');
            $table->string('haki');
            $table->integer('age');
            $table->integer('bounty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onepieces');
    }
};
