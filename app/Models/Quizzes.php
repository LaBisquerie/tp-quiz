<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizzes extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'label',
        'published',
    ];

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function scores() {
        return $this->hasMany(Score::class);
    }
}
