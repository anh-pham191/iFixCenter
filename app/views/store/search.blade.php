@extends('layouts.main')
@section('promo')

    {{--<section id="promo">--}}
    {{--<div id="promo-details">--}}
    {{--<h1>Today's Deals</h1>--}}
    {{--<p>Checkout this section of<br />--}}
    {{--products at a discounted price.</p>--}}
    {{--<a href="#" class="default-btn">Shop Now</a>--}}
    {{--</div><!-- end promo-details -->--}}
    {{--{{ HTML::image('img/promo.png', 'Promotional Ad')}}--}}
    {{--</section><!-- promo -->--}}

    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>iFix <span class="em-text">Center</span></h1>

                    <p>We Care - We Serve</p><hr>
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

@section('search-keyword')
<div class="container">
     <section id="search-keyword">
         <h1>Search Results for <span>{{ $keyword }}</span></h1>
     </section>
</div>
@stop

@section('content')
<div class ="container">
    <div id ="search-results">

        @foreach($products as $product)
            <div class="product">
                <a href="/store/view/{{ $product->id }}">
                    {{ HTML::image($product->image, $product->title, array('class'=>'feature', 'width'=>'240', 'height'=>'127')) }}
                </a>

                <h3><a href="/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>

                <p>{{ $product->description }}</p>

                <h5>
                    Availability:
            	<span class="{{ Availability::displayClass($product->availability) }}">
            		{{ Availability::display($product->availability) }}
            	</span>
                </h5>

                <p>
                    {{ Form::open(array('url'=>'store/addtocart')) }}
                    {{ Form::hidden('quantity', 1) }}
                    {{ Form::hidden('id', $product->id) }}
                    <button type="submit" class="cart-btn">
                        <span class="price">{{ $product->price }}</span>
                        {{ HTML::image('img/white-cart.gif', 'Add to Cart') }}
                        ADD TO CART
                    </button>
                    {{ Form::close() }}
                </p>
            </div>
        @endforeach

    </div>
</div>
@stop