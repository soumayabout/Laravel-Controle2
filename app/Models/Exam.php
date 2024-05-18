<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    
    protected $table = 'exams';
    
    protected $fillable = [
        'nom',
        'classe',
        'matiere',
        'heure_debut',
        'heure_fin',
        'date',
    ];
   
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
