<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\Comment;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function getUserNameAttribute($name)
    {
        return ucwords($name);                                  //this is a custom attribute | coding must be formatted correctly | getter
    }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);      //this is a custom attribute | coding must be formatted correctly | setter
    }

    public function subscribedBlogs(){
        return $this->belongsToMany(Blog::class,'blog_user');
    }

    public function isSubscribed($blog){
        return auth()->user()->subscribedBlogs && auth()->user()->subscribedBlogs->contains('id',$blog->id);
    }
}
