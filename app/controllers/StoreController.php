<?php

class StoreController extends BaseController{

    public function __construct(){
        parent::__construct();
        $this->beforeFilter('csrf', array('on'=>'post'));
        $this->beforeFilter('auth',array('only'=>array('postAddtocart', 'getCart', 'getRemoveitem')));
    }

    public function getIndex(){
        $products = Product::orderBy('created_at', 'DESC')->paginate(4);
        return View::make('store.index')
//            ->with('products', Product::take(4)->orderBy('created_at', 'DESC')->get());
            ->with('products', $products);

    }

    public function getView($id){
        return View::make('store.view')
            ->with('product', Product::find($id));
    }

    public function getCategory($cat_id) {
        return View::make('store.category')
            ->with('products', Product::where('category_id', '=', $cat_id)->paginate(6))
            ->with('category', Category::find($cat_id));
    }
    public function getSearch() {
        $keyword = Input::get('keyword');
        return View::make('store.search')
            ->with('products', Product::where('title', 'LIKE', '%'.$keyword.'%')->get())
            ->with('keyword', $keyword);
    }

    public function postAddtocart(){
        $product= Product::find(Input::get('id'));
        $quantity= Input::get('quantity');

        Cart::add(array(
            'id'=> $product->id,
            'name'=>$product->title,
            'price'=>$product->price,
            'qty'=>$quantity,
            'image'=>$product->image
        ));
        return Redirect::to('store/cart');
    }

    public function getCart(){
        return View::make('store.cart')->with('products', Cart::content());
    }

    public function getRemoveitem(){
        Cart::destroy();
        return Redirect::to('store/cart');
    }
//    public function getRemoveitem($identifier) {
//        $item = Cart::get($identifier);
//        $item->remove();
//        return Redirect::to('store/cart');
//    }
}