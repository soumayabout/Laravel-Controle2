<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable = [
        'nom_du_departement',
        'chef_du_departement',
        'date_debut_departement',
        'nombre_d_etudiants',
    ];
}
