<x-layout>
    <div class="container-">
        <div class="row-">
            <div class="col-md-4 mx-auto">
                <div class="card p-4 m-5 shadow-lg">
                    <h3 class="text-center text-success mb-5">Login Form</h3>
                    <form method="POST" action="">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="text" name="email"  value="{{old('email')}}"  class="form-control" id="exampleInputPassword1">
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password"  value="{{old('password')}}"  class="form-control" id="exampleInputPassword1">
                            @error('password')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layout>