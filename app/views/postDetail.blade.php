@extends ('layout.main')

@section('content')

    <div class="container">
        @if ($user->id == $post->user_id)
            <span STYLE="font-weight:bold; font-size: 26pt">{{$post->title}}</span> <a href="/editpost/?postid={{$post->id}}">Edit</a>
            <br>
            <span STYLE="color: grey; font-size: 9pt">Edited: {{$post->updated_at}}</span>
            <span STYLE="float:right"><a href="/deletepost/?postid={{$post->id}}">Delete</a></span>
            <hr>
            <div class="container">
                <span STYLE="font-size: 14pt">{{nl2br(e($post->content))}}</span>
            </div>
        @else
            <span>can't find your post...</span>
        @endif

    </div>

@stop