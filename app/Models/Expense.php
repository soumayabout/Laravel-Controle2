<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'expense_id',
        'item_name',
        'quantity',
        'amount',
        'purchase_source',
        'purchase_date',
        'purchaser',
    ];

    public function purchaser()
    {
        return $this->belongsTo(User::class, 'purchaser', 'id');
    }
}
