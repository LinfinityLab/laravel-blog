@extends ('layout.main')

@section('posts')

    <div class="container">
        <h1>Hi {{ $username }}</h1>
        <hr>
        <div class="container">
            <h3>My Posts</h3>
            <ul class="list-group">
                @foreach ($posts as $post)
                    <li class="list-group-item"> <a href="/{{$post->id}}"> {{ $post->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

@stop