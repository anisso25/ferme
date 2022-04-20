<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home(){

        $sliders = Slider::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        return view('client.home',['sliders'=>$sliders, 'products'=>$products]);
    }

    public function shop(){

        $sliders = Slider::where('status', 1)->get();
        $products = Product::get();
        $categories = Category::get();
        return view('client.shop', ['sliders'=>$sliders, 'categories'=>$categories, 'products'=>$products]);
    }

    public function select_par_cat($name){

        $sliders = Slider::where('status', 1)->get();
        $categories = Category::get();
        $products = Product::where('product_category', $name)->where('status', 1)->get();

        return view('client.shop',['sliders'=>$sliders, 'categories'=>$categories, 'products'=> $products]);
    }

    public function ajouter_au_panier($id){

        $products = Product::get();

        print($products);
    }

    public function panier(){
        return view('client.cart');
    }

    public function client_login(){
        return view('client.client_login');
    }

    public function signup(){
        return view('client.signup');
    }
    public function paiment(){
        return view('client.checkout');
    }

}
