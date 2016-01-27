@extends('layouts.main')

@section('content')
    <div id="admin">

        <h1>Feedback Admin Panel</h1>
        <hr>

        <p>Here you can view and delete feedbacks.</p>

        <h2>Feedback</h2>
        <hr>

        <ul>
            @foreach($feedbacks as $feedback)
                <li>
                    {{--<li>{{ HTML::link('/store/category/'.$cat->id, $cat->name) }}</li>--}}
                    <a href="/feedbacks/view/{{ $feedback->id }}">{{ $feedback->title }}</a>
                    {{--{{ $feedback->title }}--}}
                    By {{ $users[$feedback->user_id] }}
                    {{ Form::open(array('url'=>'feedbacks/destroy', 'class'=>'form-inline')) }}
                    {{ Form::hidden('id', $feedback->id) }}
                    {{ Form::submit('delete') }}
                    {{ Form::close() }}
                </li>
            @endforeach
        </ul>
    </div><!-- end admin -->


@stop