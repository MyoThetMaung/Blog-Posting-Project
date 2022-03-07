<nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Honey Bunny</a>
      <div class="d-flex">
        <a href="/" class="nav-link">Home</a>

        @auth                                                                                   <!-- checking if user is logged in -->
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8TeQ5iojLROQXom0AApSQbIamNDJRFDYgjw&usqp=CAU"
            width="50" height="50" class="rounded-circle">
            <a href="" class="nav-link">Welcome {{auth()->user()->username}}</a>
            <form action="/logout" method="POST">
                @csrf
                <button class="nav-link btn btn-link">Logout</button>                          
            </form>
        @else
            <a href="/register" class="nav-link">Register</a>
            <a href="/login" class="nav-link">Login</a>
        @endauth
            
        <a href="/#blogs" class="nav-link">Blogs</a>
        <a href="#subscribe" class="nav-link">Subscribe</a>
      </div>
    </div>
  </nav>