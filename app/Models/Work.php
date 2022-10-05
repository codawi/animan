<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
  use HasFactory;

  protected $fillable = ['category', 'title', 'image', 'copyright', 'url', 'media'];


  //カウント数リレーション
  public function count() {
    return $this->hasOne(TweetCount::class);
  }

  public function bookmarks() {
    return $this->hasMany(Bookmark::class);
}

}