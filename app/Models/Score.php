<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'quiz_id',
        'score',
    ];

    public function quizzes() {
        return $this->belongsTo(Quizzes::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }
}
