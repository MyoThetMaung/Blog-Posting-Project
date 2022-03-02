<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::with('category','author')->filter(request(['search','category','username']))->paginate(6)->withQueryString();
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



}
