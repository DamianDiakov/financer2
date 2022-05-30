<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = ['amount', 'description', 'user_id', 'group_id', "date"];
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
