<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TweetCount extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_id',
        'daily_tweet',
        'weekly_tweet',
        'monthly_tweet'
    ];
}
