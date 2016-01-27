@extends('layouts.main')
@section('promo')
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>iFix <span class="em-text">Center</span></h1>

                    <p>We Care - We Serve</p>
                    <hr>
                    {{--<a href="#" class="default-btn">Shop Now</a>--}}
                    <a class="btn btn-success" href="/" role="button">Shop Now</a>
                </div>

                <div class="col-md-5 col-md-offset-1">
                    {{ HTML::image('img/promo.png', 'Promotional Ad', array('class'=>'showcase-img'))}}
                </div>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="container">
        <div id="product-image">
            {{ HTML::image($product->image, $product->title) }}
        </div>
        <!-- end product-image -->
        <div id="product-details">
            <h1>{{ $product->title }}</h1>

            <p>{{ $product->description }}</p>

            <hr/>

            {{ Form::open(array('url'=>'store/addtocart')) }}
            {{--{{ Form::label('quantity', 'Quantity') }}--}}
            {{--{{ Form::text('quantity', 1, array('maxlength'=> '2')) }}--}}
            {{Form::hidden('quantity', 1)}}
            {{ Form::hidden('id', $product->id) }}

            <button type="submit" class="secondary-cart-btn">
                {{ HTML::image('img/white-cart.gif', 'Add to Cart')}}
                ADD TO CART
            </button>
            {{ Form::close() }}
        </div>
        <!-- end product-details -->
        <div id="product-info">
            <div>
            <p class="price">${{ $product->price }} </p> <br><br/><br><br/>
            </div>
            <div>
            <p>
                Availability:
        	<span class="{{ Availability::displayClass($product->availability) }}">
        		{{ Availability::display($product->availability) }}
        	</span>

            </p>
            </div>
            <p>Product Code: <span>{{ $product->id }}</span></p>
        </div>
        <!-- end product-info -->
    </div>
@stop