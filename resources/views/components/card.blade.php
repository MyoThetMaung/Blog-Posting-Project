@props(['blog'])
<div class="card">
    <img
      src={{$blog->thumbnail ? "/storage/$blog->thumbnail" : "https://www.thumpermassager.de/wp-content/themes/digi-theme/img/blog_default.png"}}
      class="card-img-top" height="300px"
      alt="..."
    />
    <div class="card-body">
      <h3 class="card-title">{{$blog->title}}</h3>
      <p class="fs-6 text-secondary">
        <a href="/?username={{$blog->author->username}}">{{$blog->author->username}}</a>
        <span> {{$blog->created_at->diffForHumans()}} </span>
      </p>
      <div class="tags my-3">
        <a href="/?category={{$blog->category->name}}"><span class="badge bg-success">{{$blog->category->name}}</span></a>
      </div>
      <p class="card-text">
        {{$blog->intro}}
      </p>
      <a href="/blogs/{{$blog->slug}}" class="btn btn-primary">Read More</a>
    </div>
  </div>