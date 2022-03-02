@props(['blogs'])                                                   <!-- declare here -->

<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="">
        <x-dropdown-section/>
    </div>
    {{-- search --}}
    <form action="/" method="GET" class="my-3">
      <div class="input-group mb-3">
        @if(request('category'))
            <input type="hidden" name="category" value="{{request('category')}}">
        @endif
        @if(request('username'))
            <input type="hidden" name="username" value="{{request('username')}}">
        @endif
        <input type="text" autocomplete="false" 
            class="form-control" placeholder="Search Blogs..." 
            name ="search" value="{{request('search')}}"/>
        <button class="input-group-text bg-primary text-light" id="basic-addon2" type="submit">
          Search
        </button>
      </div>
    </form>

    <div class="row">
        @forelse ($blogs as $blog)
            <div class="col-md-4 mb-4">
                <x-card :blog="$blog"/>
            </div>
        @empty
            <div class="col-md-12">
                <h3 class="text-center text-danger">! No Blogs Found !</h3>
            </div>
        @endforelse
        {{$blogs->links()}}
    </div>
  </section>
