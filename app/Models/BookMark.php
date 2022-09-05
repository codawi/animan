<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'work_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function work() {
        return $this->belongsTo(Work::class);
    }
}