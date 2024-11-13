<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'due_date',
        'priority',
        'is_completed',
        'follow_up_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
