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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade')->onUpdate('cascade');
            $table->string('parent_first');
            $table->enum('type1', ['father','mother','g_father','g_mother','sister','brother', 'uncle','aunt','friend']);
            $table->string('phone_first', 20);
            $table->string('parent_second')->nullable();
            $table->enum('type2', ['father','mother','g_father','g_mother','sister','brother', 'uncle','aunt','friend'])->nullable();
            $table->string('phone_second', 20)->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
