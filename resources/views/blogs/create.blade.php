<x-layout>
    <div class="container-">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card p-2 m-3 shadow-lg">
                    <h3 class="text-center my-3 text-success">Blog Create Form</h3>
                    <div class="col-md-10 mx-auto">
                        <form action="/admin/blogs/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}" required>
                                @error('title')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{old('slug')}}" required>
                                @error('slug')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Intro</label>
                                <input type="text" class="form-control" name="intro" value="{{old('intro')}}" required>
                                @error('intro')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Title</label>
                                <textarea class="form-control" cols="30" rows="10" name="body" >{{old('body')}}</textarea>
                                @error('body')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Upload Photo</label>
                                <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                                @error('thumbnail')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category_id" id="category" class="form-control">
                                    @foreach ($categories as $category)
                                         <option {{$category->id == old('category_id') ? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</option>  
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
