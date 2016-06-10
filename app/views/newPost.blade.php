@extends ('layout.main')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            {{ Form::open(array('url'=>'/newpost','method'=>'post')) }}
            <div class="form-group">
                {{ Form::label('title','Title') }}
                {{ Form::text('title',null,array('class'=>'form-control')) }}
                @if ($errors->has('title'))
                    {{ $errors->first('title') }}
                @endif

            </div>
        </div>
        <br>
        <div class="col-md-8 col-md-offset-1">
            <div class="form-group">
                {{ Form::label('content','Content') }}
                {{ Form::textarea('content',null,array('class'=>'form-control', 'rows'=>"25")) }}
                @if ($errors->has('content'))
                    {{ $errors->first('content') }}
                @endif
            </div>

            {{ Form::submit('Post', array('class'=>'btn btn-primary')) }}
            <div class="form-group pull-right">
                <a class="btn btn-default btn-close" href="{{ route('home') }}">Cancel</a>
            </div>
        </div>
        {{Form::close()}}
    </div>
@stop