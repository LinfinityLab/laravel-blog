@extends ('layout.main')

@section('postDetail')

    <div class="container">
        @if ($user->id == $post->user_id)
            <h2>{{$post->title}}</h2>
            <span STYLE="color: grey; font-size: 9pt">Edited: {{$post->updated_at}}</span>
            <div class="container">
                <span STYLE="font-size: 14pt">{{$post->content}}</span>
            </div>
        @else
            <span>can't find your post...</span>
        @endif

    </div>

@stop