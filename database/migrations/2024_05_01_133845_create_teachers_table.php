<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécuter les migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('nom_teacher'); 
            $table->string('genre'); 
            $table->date('date_de_naissance'); 
            $table->string('mobile'); 
            $table->date('date_d_entree'); 
            $table->string('qualification'); 
            $table->string('experience'); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('email')->unique(); 
            $table->string('mot_de_passe'); 
            $table->string('adresse'); 
            $table->string('ville'); 
            $table->string('etat'); 
            $table->string('code_postal'); 
            $table->string('pays'); 
            $table->timestamps();
        });
    }

    /**
     * Annuler les migrations.
     */
    public function down(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
