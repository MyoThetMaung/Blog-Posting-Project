<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::with('category','author')->filter(request(['search','category','username']))->latest()->paginate(6)->withQueryString();
        return view('blogs.index', [
            'blogs' => $blogs                                                                           //eager loading or lazy loading | fetching all blogs with their categories before looping through them
        ]);
    }

    public function show(Blog $blog) {                                                                  // Blog::findOrFail($id) in Background | search by slug column
        return view('blogs.show', [
            'blog' => $blog,
            'randomBlogs' => Blog::inRandomOrder()->take(3)->get()                                      //***  fetching random 3 blogs ***
        ]);
    }

    public function subscriptionHandler(Blog $blog) {
        if(User::find(auth()->id())->isSubscribed($blog)){
            $blog->unSubscribe();
        }else{
            $blog->Subscribe();
        }
        return redirect()->back();
    }

    public function create() {
        return view('blogs.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(){

        $formData = request()->validate([
            "title" => "required | min:3",
            "slug" => "required | unique:blogs",
            "intro" => "required",
            "body" => "required",
            "category_id" => "required | exists:categories,id"
        ]);

        $formData['user_id'] = auth()->id();
        $formData['thumbnail'] = request()->file('thumbnail')->store('thumbnails');      //***  storing thumbnail in storage/app/public/thumbnails | But we change to 'public' in .env file  | php artisan storage:link  ***

        Blog::create($formData);

        return redirect('/');
    }

}
