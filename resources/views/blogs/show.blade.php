

<x-layout>
     <!-- singloe blog section -->
     <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center">
            <img
              src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
              class="card-img-top"
              alt="..."
            />
            <h3 class="my-3">{{$blog->title}}</h3>
            <div class="m-3">
                <div>Author - <a href="/users/{{$blog->author->username}}">{{$blog->author->username}}</a></div>
                <div><a href="/categories/{{$blog->category->name}}"><span class="badge bg-success">{{$blog->category->name}}</span></a></div>
                <div>{{$blog->created_at->diffForHumans()}}</div>
            </div>
            <p class="lh-md">
                {{$blog->body}}
            </p>
          </div>
        </div>
      </div>

    <!-- comment section -->
    @auth
    <section class="container">
        <div class="col-md-8 mx-auto">
            <div class="card d-flex p-3 my-3 shadow-sm">
                <form method="post" action="/blogs/{{$blog->slug}}/comments">
                    @csrf
                    <div class="form-group mb-3">
                        <textarea name="body" id="" cols="100" rows="5" placeholder="say something" class="form-control border border-0"></textarea>
                        @error('body')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class=" d-flex justify-content-end ">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
            </div>
        </div>
    </section>
    @else
      <p class="text-center text-black-50">Please <a href="/login">login</a> to participate in the conversation ...</p>
    @endauth
    <!-- comment section -->
    <x-comment :comments="$blog->comments" />

    <!-- subscribe new blogs -->
    <x-subscribe/>

    <!-- Blogs You may like -->
    <x-blog-you-may-like :randomBlogs="$randomBlogs"/>

    <!-- subscribe new blogs -->
    <x-subscribe />
</x-layout>



