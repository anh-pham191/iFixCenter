@extends('layouts.main')

@section('content')
    <div class="container">
        <div id="shopping-cart">
            <h1>Shopping Cart & Checkout</h1>

            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <table border="1">
                    <tr>
                        <th>Order List</th>
                        <th>Product Name</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                    <?php $i = 1;?>
                    @foreach($products as $product)
                        <tr>

                            <td>{{ $i }}</td>
                            <td>
                                {{--{{ HTML::image($product->image, $product->name, array('width'=>'65', 'height'=>'37'))}}--}}
                                {{ $product->name }}
                            </td>
                            <td>${{ $product->price }}</td>
                            <td>
                                {{--{{ $product->quantity }}--}}
                                1
                            </td>
                            <td>
                                ${{ $product->price }}
                                {{--<a href="/store/removeitem/{{ $i }}">--}}
                                    {{--{{ HTML::image('img/remove.gif', 'Remove product') }}--}}
                                {{--</a>--}}
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach

                    <tr class="total">
                        <td colspan="5">
                            Subtotal: ${{ Cart::total() }}<br/>
                            <span>TOTAL: ${{ Cart::total() }}</span><br/>

                            <input type="hidden" name="cmd" value="_xclick">
                            {{--<input type="hidden" name="business" value="office@shop.com">--}}
                            <input type="hidden" name="business" value="ifixCenter@gmail.com">
                            <input type="hidden" name="item_name" value="iFix Center Purchase">
                            <input type="hidden" name="amount" value="{{ Cart::total() }}">
                            <input type="hidden" name="first_name" value="{{ Auth::user()->firstname }}">
                            <input type="hidden" name="last_name" value="{{ Auth::user()->lastname }}">
                            <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                            {{--{{ HTML::link('/', 'Continue Shopping', array('class'=>'tertiary-btn')) }}--}}
                            {{ HTML::link('/store/removeitem', 'Delete All Order', array('class'=>'btn btn-danger  ')) }}
                            {{ HTML::link('/', 'Continue Shopping', array('class'=>'btn btn-info')) }}
                            <input type="submit" value="Check out with Paypal" class="btn btn-success">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <!-- end shopping-cart -->
    </div>
@stop