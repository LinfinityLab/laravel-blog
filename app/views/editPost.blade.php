@extends ('layout.main')

@section('editPost')

    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            {{ Form::open(array('url'=>'/editpost','method'=>'post')) }}
            <div class="form-group">
                {{ Form::label('Title','Title') }}
                {{ Form::text('Title',null,array('class'=>'form-control')) }}

            </div>

            {{ Form::submit('Update', array('class'=>'btn btn-primary')) }}
        </div>
        {{Form::close()}}
    </div>

@stop