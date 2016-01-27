@extends('layouts.main')

@section('content')

    <div id="admin">

        <h1>Create Warranty Request</h1><hr>

        <p>Here you can send new Request.</p>

        <h2>List of Warranty</h2><hr>

        <ul>
            @foreach($warranties as $warranty)
                <li>
                    {{ $warranty->title }} -
                    {{ Form::open(array('url'=>'warranty/destroy', 'class'=>'form-inline')) }}
                    {{ Form::hidden('id', $warranty->id) }}
                    {{ Form::submit('delete') }}
                    {{ Form::close() }} -
                </li>
            @endforeach
        </ul>

        <h2>Create New Warranty Request</h2><hr>

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

        {{ Form::open(array('url'=>'warranty/create','files'=>true)) }}
        {{--<p>--}}
            {{--{{ Form::label('category_id','Category') }}--}}
            {{--{{ Form::select('category_id', $categories) }}--}}
        {{--</p>--}}
        <p>
            {{Form::label('title')}}
            {{Form::text('title')}}
        </p>
        <p>
            {{Form::label('extra')}}
            {{Form::textarea('extra')}}
        </p>

        {{ Form::submit('Send Warranty', array('class'=>'secondary-cart-btn')) }}
        {{ Form::close() }}
    </div><!-- end admin -->

@stop