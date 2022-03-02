{{-- 
    <x-layout>
        
        <x-slot name="title">
            <title> Blogs</title>
        </x-slot>

        @foreach($blogs as $blog)
            <h1><a href="blogs/{{$blog->slug}}"> {{$blog->title}}</a></h1> 
            <h3><a href="categories/{{$blog->category->name}}">{{$blog->category->name}}</a></h3> 
            <p>Author: <a href="users/{{$blog->author->username}}">{{$blog->author->username}}</a></p>
            <p><b>Intro : </b>{{$blog->intro}}</p>
            <p><b>Body :</b> {{$blog->body}}</p>
            <p><b>Published at : </b>{{$blog->created_at->diffForHumans()}}</p>
        @endforeach
    </x-layout>
--}} 

<x-layout>
    @if(session('success'))
        <div class="alert alert-success text-center">{{session('success')}}</div>
    @endif
    <!-- hero section -->
    <x-hero />

    <!-- blogs section -->
    <x-blog-section :blogs="$blogs" />          

    <!-- subscribe new blogs -->
    <x-subscribe />

    
    
</x-layout>