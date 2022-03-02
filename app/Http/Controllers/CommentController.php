<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog){
        $formData = request()->validate([
            'body' => 'required|min:5'
        ]);
        $blog->comments()->create([
            'body' => $formData['body'],
            'user_id' => auth()->id()
        ]);
        return back();
    }
}
