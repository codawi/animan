<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'work_id',
        'rating_value',
        'review'
    ];

    public function user() {
        return $this->belongTo(User::class);
    }

    public function work() {
        return $this->belongTo(Work::class);
    }
}
