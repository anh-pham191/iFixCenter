<!DOCTYPE HTML>
<html>
<head>
    <title>iFixCenter</title>
    {{--<link href="{{ URL::asset ('css/style.css')}}" rel='stylesheet' type='text/css'/>--}}
    {{HTML::style('css/style.css')}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!----webfonts---->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!----//webfonts---->
    <!----start-alert-scroller---->

    <!----start-alert-scroller---->
    <!-- start menu -->
    {{ HTML::style('css/normalize.css') }}
    {{ HTML::style('css/main.css') }}
    {{HTML::style('css/megamenu.css')}}
    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/app.css')}}
    {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}
    {{--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
    {{ HTML::script('js/jquery.min.js') }}

    {{--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}
    {{ HTML::script('js/bootstrap.min.js') }}

    {{--<script src="js/scripts-f0e4e0c2.js" type="text/javascript"></script>--}}

    {{--<link href="{{ URL::asset ('css/megamenu.css')}}" rel="stylesheet" type="text/css" media="all"/>--}}
    {{--<link href="{{ asset('/css/app.css') }}" rel="stylesheet">--}}

    <!-- //End menu -->
    <!---move-top-top---->

    <!---//move-top-top---->
</head>
<body>
<!---start-wrap---->
<!---start-header---->
<div id="wrapper"></div>
<div class="header">
    <div class="top-header">
        <div class="wrap">
            <div class="top-header-left">
                <ul>
                    <li><a class="cart" href="#"><span id="clickme"> </span></a></li>
                    <div id="cart">Your Cart is Empty <span>(0)</span></div>
                    <li><a class="info" href="#"><span> </span></a></li>
                </ul>
            </div>
            <div class="top-header-center">
                <div class="top-header-center-alert-right">
                    <div class="vticker">
                        <ul>
                            <li>Applies to orders of $50 or more. <label>Returns are always free.</label></li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <!----start-mid-head---->
    <div class="mid-header">
        {{--<div class="wrap">--}}
        {{--<div class="mid-grid-left">--}}
        {{--<div class="dropdown">--}}
        {{--<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Shop--}}
        {{--By Category--}}
        {{--<span class="caret"></span></button>--}}
        {{--<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">--}}
        {{--@foreach($catnav as $cat)--}}
        {{--<li>{{ HTML::link('/store/category/'.$cat->id, $cat->name) }}</li>--}}
        {{--@endforeach--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--<div id="search-form">--}}
        {{--{{ Form::open(array('url'=>'store/search', 'method'=>'get')) }}--}}
        {{--{{ Form::text('keyword', null, array('placeholder'=>'Search by keyword', 'class'=>'search')) }}--}}
        {{--{{ Form::submit('Search', array('class'=>'search submit')) }}--}}
        {{--{{ Form::close() }}--}}
        {{--</div>--}}
        {{--<!-- end search-form -->--}}

        {{--</div>--}}
        {{--<div class="mid-grid-right">--}}

        {{--<a class="logo" href="/"><span>{{HTML::image('images/logo.jpg')}} </span></a>--}}

        {{--<hr>--}}

        {{--</div>--}}
        {{--<div class="clear"></div>--}}
        {{--</div>--}}
        <div class="wrap">
            <div class="row">
                <div class="col-md 2 mid-grid-left">
                    <a class="logo" href="/"><span>{{HTML::image('images/logo.jpg')}} </span></a>
                </div>

                <div class="col-md-4 mid-grid-right">
                    <div id="search-form">
                        {{ Form::open(array('url'=>'store/search', 'method'=>'get')) }}
                        {{ Form::text('keyword', null, array('placeholder'=>'What are you looking for?', 'class'=>'search')) }}
                        {{ Form::submit('Search', array('class'=>'btn btn-primary')) }}
                        {{ Form::close() }}
                    </div>
                    <!-- end search-form -->
                </div>

                <div class="col-md-2">
                    <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                            Shop
                            By Category
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            @foreach($catnav as $cat)
                                <li>{{ HTML::link('/store/category/'.$cat->id, $cat->name) }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <div class="col-md-1 viewcart">
                    <a class="btn btn-success" href="../../store/cart" role="button">View Cart</a>
                </div>
                <div class="col-md-1 mid-header-right">
                    @if(Auth::check())
                        <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                                Hello, {{ Auth::user()->firstname }}
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                @if(Auth::user()->admin == 1)
                                    <li>{{ HTML::link('admin/categories', 'Manage Categories') }}</li>
                                    <li>{{ HTML::link('users/profile', 'Manage Profile') }}</li>
                                    <li>{{ HTML::link('admin/products', 'Manage Products') }}</li>
                                    <li>{{ HTML::link('feedbacks', 'Manage Feedback') }}</li>
                                    <li>{{ HTML::link('messages', 'Manage Message') }}</li>
                                    <li>{{ HTML::link('users', 'Manage Account') }}</li>
                                    <li>{{ HTML::link('admin/warranties', 'Manage Warranty') }}</li>
                                @elseif(Auth::user()->admin == 0)
                                    <li>{{ HTML::link('feedbacks/formcreate', 'Feedback') }}</li>
                                    <li>{{ HTML::link('users/profile', 'Manage Profile') }}</li>
                                    <li>{{ HTML::link('warranty', 'Request Warranty') }}</li>
                                @endif
                                <li>{{ HTML::link('users/signout', 'Sign Out') }}</li>
                            </ul>
                        </div>
                    @else
                        <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                               Join Us
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li>{{ HTML::link('users/signin', 'Sign In') }}</li>
                                <li>{{ HTML::link('users/newaccount', 'Sign Up') }}</li>
                                <li>{{ HTML::link('messages/formcreate', 'Anonymous Feedback') }}</li>
                            </ul>
                        </div>
                    @endif
                </div>

            </div>
            <hr>
        </div>
        <div class="clear"></div>

    </div>


    <!----//End-mid-head---->
    <!----start-bottom-header---->

</div>
</div>
<!----//End-bottom-header---->
<!---//End-header---->
@if(Auth::check())
    @if(Auth::user()->admin == 2)
        <div class = "container">
            <h1> You have been banned</h1>
        </div>
        @elseif(Auth::user()->admin==1 || Auth::user()->admin==0)
                <!--- start-content---->
        <div class="container">
            @yield('promo')
        </div>
        @yield('search-keyword')
        <div class="container">
            <hr/>


            <section id="main-content" class="clearfix">
                @if (Session::has('message'))
                    <p class="alert">{{ Session::get('message') }}</p>
                @endif

                @yield('content')
            </section>
        </div>
        <!-- end main-content -->

        <hr/>

        @yield('pagination')
        @endif
                @else
                <!--- start-content---->
        <div class="container">
            @yield('promo')
        </div>
        @yield('search-keyword')
        <div class="container">
            <hr/>


            <section id="main-content" class="clearfix">
                @if (Session::has('message'))
                    <p class="alert">{{ Session::get('message') }}</p>
                @endif

                @yield('content')
            </section>
        </div>
        <!-- end main-content -->

        <hr/>

        @yield('pagination')
        @endif

                <!---- start-bottom-grids---->
        <div class="bottom-grids">
            <div class="bottom-top-grids">
                <div class="wrap">
                    <div class="bottom-top-grid">
                        <h4>GET HELP</h4>
                        <ul>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">Shopping</a></li>
                        </ul>
                    </div>
                    <div class="bottom-top-grid">
                        <h4>ORDERS</h4>
                        <ul>
                            <li><a href="#">Payment options</a></li>
                            <li><a href="#">Shipping and delivery</a></li>
                            <li><a href="#">Returns</a></li>
                        </ul>
                    </div>
                    <div class="bottom-top-grid last-bottom-top-grid">
                        <h4>REGISTER</h4>
                        <p>Create one account to manage everything you do with iFix, from your shopping preferences to
                            your
                            iFix+ activity.</p>
                        <a class="learn-more" href="#">Learn more</a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="bottom-bottom-grids">
                <div class="wrap">
                    <div class="bottom-bottom-grid">
                        <h6>EMAIL SIGN UP</h6>

                        <p>Be the first to know about new products and special offers.</p>
                        <a class="learn-more" href="#">Sign up now</a>
                    </div>
                    <div class="bottom-bottom-grid">
                        <h6>GIFT CARDS</h6>

                        <p>Give the gift that always fits.</p>
                        <a class="learn-more" href="#">View cards</a>
                    </div>
                    <div class="bottom-bottom-grid last-bottom-bottom-grid">
                        <h6>STORES NEAR YOU</h6>

                        <p>Locate a iFix store near you.</p>
                        <a class="learn-more" href="#">Search</a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <!---- //End-bottom-grids---->
        <!--- //End-content---->
        <!---start-footer---->
        <div class="footer">
            <div class="wrap">
                <div class="footer-left">
                    {{--<ul>--}}
                        {{--<li><a href="#">United Kingdom</a> <span> </span></li>--}}
                        {{--<li><a href="#">Terms of Use</a> <span> </span></li>--}}
                        {{--<li><a href="#">Nike Inc.</a> <span> </span></li>--}}
                        {{--<li><a href="#">Launch Calendar</a> <span> </span></li>--}}
                        {{--<li><a href="#">Privacy & Cookie Policy</a> <span> </span></li>--}}
                        {{--<li><a href="#">Cookie Settings</a></li>--}}
                        {{--<div class="clear"></div>--}}
                    {{--</ul>--}}
                    <p> Copyright  &copy; Pham Tuan Anh, 2015, All Rights Reserved</p>
                </div>
                <div class="footer-right">

                    <a href="#" id="toTop" style="display: block;"><span id="toTopHover"
                                                                         style="opacity: 1;"> </span></a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!---//End-footer---->
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write("{{ HTML::script('js/vendor/jquery-1.9.1.min.js') }}</script>
        {{ HTML::script('js/plugins.js') }}
        {{ HTML::script('js/main.js') }}

                {{--<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->--}}
        <script>
            var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
            (function (d, t) {
                var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
                g.src = '//www.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g, s)
            }(document, 'script'));
        </script>
        <!---//End-wrap---->
</body>
</html>