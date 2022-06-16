<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurrence extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'user_id',
        'active_to',
        'last_updated',
        'expense_amount',
        'expense_description',
        'period',
        'period_value'
    ];
}
