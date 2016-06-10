@extends ('layout.main')

@section('posts')

    <div class="container">
        <h1>Hi {{ $username }}!</h1>
        <hr>
        <div class="container">
            <span STYLE="font-size: 18pt">My Posts</span> <span STYLE="float:right"><a href="/newpost">New</a></span><br><br>
            @if (count($posts)>0)
                <ul class="list-group">
                    @foreach ($posts as $post)
                        <li class="list-group-item"> <a href="/post/?postid={{$post->id}}"> {{ $post->title }}</a> <span STYLE="float:right">{{$post->updated_at}}</span></li>
                    @endforeach
                </ul>
            @else
                <p>You have no post.</p>
            @endif

        </div>
    </div>

@stop