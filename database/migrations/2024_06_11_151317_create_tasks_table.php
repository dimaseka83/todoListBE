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
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id'); // Change to bigIncrements('id') if you want to use big integer
            $table->string('title');
            $table->text('description');
            $table->date('due_date');
            $table->boolean('completed')->default(false);
            $table->foreignId('user_id')->constrained();
            $table->boolean('is_priority')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
