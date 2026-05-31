<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Task extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'category_id', 
        'due_date', 
        'is_completed'
    ];

    protected $casts = [
        'due_date' => 'date',
        'is_completed' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getStatusAttribute(): string
    {
        return $this->is_completed ? 'Completed' : 'Pending';
    }

    public function isOverdue(): bool
    {
        return !$this->is_completed && Carbon::now()->gt($this->due_date);
    }
}