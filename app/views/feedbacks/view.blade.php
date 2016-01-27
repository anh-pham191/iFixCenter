@extends('layouts.main')

@section('content')

    <div class="container">
        <h1>{{ $feedback->title }}</h1>

        <p>{{ $feedback->body }}</p>

    </div>

@stop