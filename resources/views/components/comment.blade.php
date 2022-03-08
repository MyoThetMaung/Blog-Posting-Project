@props(['comments'])
<section class="container">
    <div class="col-md-8 mx-auto">         
        @foreach ($comments as $comment) 
            <!-- Single comment -->
            <x-single-comment :comment="$comment"/>
        @endforeach
        {{$comments->links()}}
    </div>
</section>