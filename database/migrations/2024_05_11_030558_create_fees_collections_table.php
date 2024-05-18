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
        Schema::create('fees_collections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('student_name');
            $table->string('gender');
            $table->string('fee_type');
            $table->decimal('fee_amount', 10, 2);
            $table->date('payment_date');
            $table->timestamps();
        
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees_collections');
    }
};
