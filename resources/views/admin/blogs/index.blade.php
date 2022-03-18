<x-admin-layout>
    <div class="container">
        <div class="row">
            <div class="card p-2 m-3 shadow-lg">
                <h1 class="text-center mt-2 btn btn-success">Blogs</h1>  
                <table class="table" >
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Intro</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <td>{{$blog->title}}</td>
                            <td>{{$blog->intro}}</td>
                            <td>
                                <a href="/admin/blogs/{{$blog->slug}}/edit" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="/admin/blogs/{{$blog->slug}}/delete" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{$blogs->links()}}
        </div>
    </div>
</x-admin-layout>
