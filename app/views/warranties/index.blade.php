@extends('layouts.main')

@section('content')

    <div id="admin">

        <h1>Admin Manage Warranty Panel</h1>
        <hr>

        <p>Here you can see a warranty request from customer </p>

        <h2>List of User's Sent Request</h2>
        <hr>

        <ul>
            @foreach($warranties as $warranty)
                    <li>
                        <a href="/admin/warranties/view/{{ $warranty->id }}">{{ $warranty->title }}</a>
                        {{--By {{ ($warranty->user_id)   }}--}}
                        By {{ $users[$warranty->user_id] }}
                        {{--{{ $warranty->title }} ---}}
                        {{ Form::open(array('url'=>'admin/warranties/destroy', 'class'=>'form-inline')) }}
                        {{ Form::hidden('id', $warranty->id) }}
                        {{ Form::submit('delete') }}
                        {{ Form::close() }} -
                    </li>
            @endforeach
        </ul>
        <hr>

    </div><!-- end admin -->

@stop