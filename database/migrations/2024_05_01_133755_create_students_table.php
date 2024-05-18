<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nom_student'); 
            $table->string('prenom_student'); 
            $table->string('classe'); 
            $table->date('date_de_naissance'); 
            $table->string('genre'); 
            $table->string('religion')->nullable();  
            $table->date('date_entree')->nullable();  
            $table->string('numero_telephone')->nullable();  
            $table->string('numero_admission')->nullable();  
            $table->string('section')->nullable(); 
            $table->string('image')->nullable();  
            $table->string('email')->unique();            
            $table->string('nom_pere')->nullable();  
            $table->string('profession_pere')->nullable(); 
            $table->string('telephone_pere')->nullable();  
            $table->string('email_pere')->nullable(); 
            $table->string('nom_mere')->nullable();  
            $table->string('profession_mere')->nullable();  
            $table->string('telephone_mere')->nullable();  
            $table->string('email_mere')->nullable(); 
            $table->text('adresse_actuelle')->nullable(); 
            $table->text('adresse_permanente')->nullable();  
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Annule les migrations.
     */
    public function down()
    {
        Schema::dropIfExists('students', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
        
    }
};
