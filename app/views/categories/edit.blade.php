@extends('layouts.main')

@section('content')

    <div id="admin">

        <h1> Update your Category</h1>

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

        {{Form::open(array('url'=>'admin/categories/update/'.$category->id))}}
        <p>
            {{Form::label('name')}}
            {{ Form::text('name', Input::old('name'),  array('placeholder'=> $category->name)) }}
        </p>
        {{ Form::submit('UPDATE YOUR CATEGORY', array('class'=>'secondary-cart-btn')) }}
        {{Form::close()}}
    </div>
    </div>
@stop