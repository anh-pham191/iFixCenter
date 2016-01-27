@extends('layouts.main')

@section('content')

    <div class="container">
        <h1>{{ $message->title }}</h1>

        <p>{{ $message->body }}</p>

    </div>

@stop