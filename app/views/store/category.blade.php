@extends('layouts.main')

@section('promo')

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

@section('content')
<div class="container">
    <h2>{{ $category->name }}</h2>
    <hr>

    <aside id="categories-menu">
        <h3>CATEGORIES</h3>
        <ul>
            @foreach($catnav as $cat)
                <li>{{ HTML::link('/store/category/'.$cat->id, $cat->name) }}</li>
            @endforeach
        </ul>
    </aside><!-- end categories-menu -->

    <div id="listings">
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
@section('pagination')
    <section id="pagination">
        {{$products->links()}}
    </section>
@stop