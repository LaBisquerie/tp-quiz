<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'label',
        'question_id',
    ];

    public function questions()
    {
        return $this->belongsTo(Question::class);
    }
}
