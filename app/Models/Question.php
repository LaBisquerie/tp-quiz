<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'label',
        'answer',
        'earnings',
        'quiz_id',
    ];

    public function choices() {
        return $this->hasMany(Choice::class);
    }

    public function quizzes() {
        return $this->belongsTo(Quizzes::class);
    }
}