<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    public function index()
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::latest()->paginate(3)
        ]);
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

    public function destroy(Blog $blog){
        $blog->delete();
        return back();
    }




}
