@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Create new Feedback</h2>
        <hr/>
        @if($errors->has())
            <div id="form-errors">
                <p>The following errors have occurred:</p>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><!-- end form-errors -->
        @endif

        {{ Form::open(array('url'=>'messages/create')) }}
        <p>
            {{ Form::label('title') }}
            <br>
            {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
        </p>

        <p>
            {{ Form::label('body') }}
            <br>
            {{ Form::textarea('body', Input::old('body'), array('class' => 'form-control') )}}
        </p>

        <div class="form-group">
            {{ Form::label('published_at','Puhlish On: ') }}
            <br>{{ Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) }}

        </div>

        {{ Form::submit('Send Anonymous Feedback', array('class'=>'secondary-cart-btn')) }}
        {{ Form::close() }}
    </div>
@stop