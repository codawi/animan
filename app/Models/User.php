<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //論理削除した場合に一緒に削除したいデータ
    protected $softCascade = ['reviews', 'bookmarks'];

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'google_id'
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function bookmark_works()
    {
        return $this->belongsToMany(Work::class, 'bookmarks', 'user_id', 'work_id')->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    //ブックマークしているかチェック
    public function is_bookmark($id)
    {
        return $this->bookmarks()->where('work_id', $id)->exists();
    }
}
