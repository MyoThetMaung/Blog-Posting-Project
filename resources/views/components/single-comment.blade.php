@props(['comment'])
    
<div class="card d-flex p-3 my-3 shadow-sm">
    <div class="d-flex">
        <div>
            <img src="{{$comment->author->avatar}}" width="50" height="50" class="rounded-circle" alt="">
        </div>
        <div class="ms-3">
            <h6>{{$comment->author->username}}</h6>
            <p class="text-secondary">{{$comment->created_at->format('F d, Y, g:i A')}}</p>
        </div>
    </div>
    <p class="mt-1">
        {{$comment->body}}
    </p>
</div>