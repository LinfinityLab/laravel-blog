@extends ('layout.main')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <h5>You're updating your post...</h5><hr>
            {{ Form::open(array('url'=>'/updatepost','method'=>'post')) }}
            {{ Form::hidden('postid', $postid) }}
            <div class="form-group">
                {{ Form::label('title','Title') }}
                {{ Form::text('title',$title,array('class'=>'form-control')) }}
                @if ($errors->has('title'))
                    {{ $errors->first('title') }}
                @endif

            </div>
        </div>
        <br>
        <div class="col-md-8 col-md-offset-1">
            <div class="form-group">
                {{ Form::label('content','Content') }}
                {{ Form::textarea('content',$content,array('class'=>'form-control', 'rows'=>"25")) }}
                @if ($errors->has('content'))
                    {{ $errors->first('content') }}
                @endif
            </div>

            {{ Form::submit('Update', array('class'=>'btn btn-primary')) }}
            <div class="form-group pull-right">
                <a class="btn btn-default btn-close" href="{{ route('home') }}">Cancel</a>
            </div>
        </div>
        {{Form::close()}}
    </div>
@stop