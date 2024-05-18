<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'student_name',
        'gender',
        'fee_type',
        'fee_amount',
        'payment_date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
