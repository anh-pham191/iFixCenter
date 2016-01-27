@extends('layouts.main')

@section('content')

    <div class="container">
        <h1>{{ $warranty->title }}</h1>

        <p>{{ $warranty->extra }}</p>

    </div>

@stop