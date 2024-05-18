<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    protected $fillable = [
        'nom_teacher', 
        'genre', 
        'date_de_naissance', 
        'mobile', 
        'date_d_entree', 
        'qualification', 
        'experience',
        'user_id',
        'email', 
        'mot_de_passe', 
        'adresse', 
        'ville', 
        'etat', 
        'code_postal', 
        'pays',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
