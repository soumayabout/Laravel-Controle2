<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'nom_student', 
        'prenom_student',
        'classe', 
        'date_de_naissance', 
        'genre', 
        'religion', 
        'date_entree', 
        'numero_telephone',
        'numero_admission', 
        'section',
        'image', 
        'email',
        'nom_pere', 
        'profession_pere', 
        'telephone_pere', 
        'email_pere', 
        'nom_mere', 
        'profession_mere', 
        'telephone_mere', 
        'email_mere', 
        'adresse_actuelle', 
        'adresse_permanente', 
        'user_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class);
    }

    public function feeCollections()
    {
        return $this->hasMany(FeesCollection::class, 'student_id', 'id');
    }

    public function salary()
    {
        return $this->hasOne(Salary::class, 'student_id', 'id');
    }


    public function getCreatedFormatAttribute()
    {  
        return $this->created_at->format('d-m-Y');
    }
    protected $appends = ['created_format'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
