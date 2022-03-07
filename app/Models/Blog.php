<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body','intro','slug','category_id','user_id'];
    // protected $guarded = ['id'];

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search']??false, function($query,$search){
            $query->where (function ($query) use($search){                                        //***  search by group ***
                $query->where('title','like','%'.$search.'%')
                ->orWhere('body','like','%'.$search.'%')
                ->orWhere('intro','like','%'.$search.'%');
            });
        });
        $query->when($filter['category']??false, function($query,$name){
            $query->whereHas('category', function($query) use($name){
                $query->where('name',$name);
            });
        });
        $query->when($filter['username']??false, function($query,$username){
            $query->whereHas('author', function($query) use($username){
                $query->where('username',$username);
            });
        });

    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    
    public static function find($slug){
        $path = resource_path("views/blogs/$slug.html");
        if (!file_exists($path)) {
            abort(404);
        }
        return cache()->remember("posts.$slug", 60, function () use ($path) {
            return file_get_contents($path);
        });
    }

    public function subscribers(){
        return $this->belongsToMany(User::class,'blog_user');                          
    }

    public function unSubscribe(){
        return $this->subscribers()->detach(auth()->id());                               //blog -> user -> user_id is removed from pivot table
    }

    public function subscribe(){
        return $this->subscribers()->attach(auth()->id());
    }
}
