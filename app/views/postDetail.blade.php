@extends ('layout.main')

@section('postDetail')

    <div class="container">
        @if ($user->id == $post->user_id)
            <span STYLE="font-weight:bold; font-size: 26pt">{{$post->title}}</span> <a>Edit</a>
            <br>
            <span STYLE="color: grey; font-size: 9pt">Edited: {{$post->updated_at}}</span>
            <hr>
            <div class="container">
                <span STYLE="font-size: 14pt">{{$post->content}}</span>
            </div>
        @else
            <span>can't find your post...</span>
        @endif

    </div>

@stop