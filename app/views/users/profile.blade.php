@extends('layouts.main')

@section('content')
    <div class="container">
        <div id="new-account">

            <h1> Edit your Account</h1>

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

            {{Form::open(array('url'=>'users/edit'))}}
            <p>
                {{Form::label('firstname')}}
                {{ Form::text('firstname', Input::old('firstname'),  array('placeholder'=> $users->firstname)) }}
            </p>
            <p>
                {{Form::label('lastname')}}
                {{ Form::text('lastname', Input::old('lastname'),  array('placeholder'=> $users->lastname)) }}
            </p>
            <p>
                {{Form::label('email')}}
                {{ Form::text('email', Input::old('email'),  array('placeholder'=> $users->email)) }}
            </p>
            <p>
                {{Form::label('password')}}
                {{ Form::password('email', Input::old('password'),  array('placeholder'=> $users->password)) }}
            </p>
            <p>
                {{Form::label('password_confirmation')}}
                {{ Form::password('password_confirmation', Input::old('password_confirmation'),  array('placeholder'=> $users->password )) }}
            </p>
            <p>
                {{Form::label('telephone')}}
                {{ Form::text('telephone', Input::old('telephone'),  array('placeholder'=> $users->telephone)) }}
            </p>
            {{ Form::submit('UPDATE YOUR ACCOUNT', array('class'=>'secondary-cart-btn')) }}
            {{Form::close()}}
        </div>
    </div>
@stop