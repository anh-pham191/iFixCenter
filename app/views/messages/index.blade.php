@extends('layouts.main')

@section('content')
    <div id="admin">

        <h1>Anonymous Feedback Admin Panel</h1>
        <hr>

        <p>Here you can view and delete anonymous feedbacks.</p>

        <h2>Feedback</h2>
        <hr>

        <ul>
            @foreach($messages as $message)
                <li>
                    {{--<li>{{ HTML::link('/store/category/'.$cat->id, $cat->name) }}</li>--}}
                    <a href="/messages/view/{{ $message->id }}">{{ $message->title }}</a>
                    {{--{{ $feedback->title }}--}}
                    {{ Form::open(array('url'=>'messages/destroy', 'class'=>'form-inline')) }}
                    {{ Form::hidden('id', $message->id) }}
                    {{ Form::submit('delete') }}
                    {{ Form::close() }}
                </li>
            @endforeach
        </ul>
    </div><!-- end admin -->


@stop