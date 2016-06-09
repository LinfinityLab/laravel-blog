@extends ('layout.main')

@section('books')
    <div class="container">
        <ul class="list-group">
            @foreach ($posts as $post)
                <li class="list-group-item">{{ $post->title }}</li>
            @endforeach
        </ul>
    </div>

@stop