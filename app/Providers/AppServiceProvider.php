<?php

namespace App\Providers;



use Illuminate\Support\ServiceProvider;
use App\ProductDetail;
use App\Cart;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('header',function($view){
            $loai_sp = ProductDetail::all();
           
            $view->with('loai_sp',$loai_sp);
        });

        view()->composer('header',function($view){
            if(Session('cart'))
            {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'productCart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });

        view()->composer('pages.dathang',function($view){
            $loai_sp = ProductDetail::all();
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $view->with(['cart'=>Session::get('cart'),'productCart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
        });

        
    }
}
