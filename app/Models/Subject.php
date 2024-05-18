<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    protected $table = 'subjects';
    
    protected $fillable = [
        'nom_matiere',
        'classe',
    ];
    
    // Relation avec Student (Many-to-Many)
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
