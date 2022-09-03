<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookMark extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'work_id',
    ];

    public function user() {
        return $this->belongsToMany(User::class);
    }

    public function work() {
        return $this->belongsToMany(Work::class);
    }
}