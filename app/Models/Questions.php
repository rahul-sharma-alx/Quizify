<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_text',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
        'difficulty_level',
        'category',
        'status',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'correct_answer' => 'string',
    ];
    // Relationship with creator (admin)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relationship with updater (admin)
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // Scope to get only current admin's questions
    public function scopeForAdmin($query, $adminId)
    {
        return $query->where('created_by', $adminId);
    }

    // Scope to filter by category
    public function scopeForCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Scope to filter by difficulty
    public function scopeForDifficulty($query, $difficulty)
    {
        return $query->where('difficulty_level', $difficulty);
    }
}
