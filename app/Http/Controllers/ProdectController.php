<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;

class ProdectController extends Controller
{
    //
    public function ajouterproduit(){
        $categories = Category::get()->pluck('category_name','category_name');
        return view('admin.ajouterproduit')->with('categories', $categories);
    }

    public function sauverproduit(Request $Request) {

        $this->validate($Request,['product_name'=>'required|unique:products',
                                  'product_price'=>'required',
                                  'product_category'=>'required',
                                  'product_image'=>'image']);

        if ($Request->hasfile('product_image')) {
            // 1 : get file name with ext.
            $fileNameWithExt = $Request->file('product_image')->getClientOriginalName();
            // 2 : get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // 3 : get just file extension
            $ext = $Request->file('product_image')->getClientOriginalExtension();
            // 4 : file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$ext;
            // 5 : uploader l'image
            
            $path = $Request->file('product_image')->storeAs('public/product_image', $fileNameToStore);
            
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $product = new Product();
        $product->product_name = $Request->input('product_name');
        $product->product_price = $Request->input('product_price');
        $product->product_category = $Request->input('product_category');
        $product->product_image = $fileNameToStore;
        $product->status = 1;

        $product->save();

        return redirect('/ajouterproduit')->with('status', 'le produit '. $product->product_name.' a été inséré avec succée !');

    }

    public function produits(){

        $produits = Product::get();
        return view('admin.produits')->with('produits', $produits);
    }

    public function edit_produit($id){

        $product = Product::find($id);
        $categories = Category::get()->pluck('category_name','category_name');
        return view('admin.editproduit')->with('product', $product)->with('categories', $categories);
    }

    public function modifierproduit(Request $Request){

        $this->validate($Request,['product_name'=>'required',
                                  'product_price'=>'required',
                                  'product_category'=>'required',
                                  'product_image'=>'image']);

                            $product = Product::find($Request->input('id'));
                            $product->product_name = $Request->input('product_name');
                            $product->product_price = $Request->input('product_price');
                            $product->product_category = $Request->input('product_category');

        if ($Request->hasfile('product_image')) 
            {
                // 1 : get file name with ext.
                $fileNameWithExt = $Request->file('product_image')->getClientOriginalName();
                // 2 : get just file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // 3 : get just file extension
                $ext = $Request->file('product_image')->getClientOriginalExtension();
                // 4 : file name to store
                $fileNameToStore = $fileName.'_'.time().'.'.$ext;
                // 5 : uploader l'image
                
                $path = $Request->file('product_image')->storeAs('public/product_image/', $fileNameToStore);

                if($product->product_image != 'noimage.jpg')
                    {
                        storage::delete('public/product_image/'.$product->product_image);

                    }else{

                $product->product_image = $fileNameToStore;
            }   

            $product->update();

        return redirect()->route('edit_product', ['id' => $product->id])->with('status', 'le produit '. $product->product_name.' a été modifié avec succée !');

    }
}

    public function supprimerproduit($id){

        $product = Product::find($id);

        if($product->product_image != 'noimage.jpg'){
                storage::delete('public/product_image/'.$product->product_image);
            }

        $product->delete();
        
        return redirect('/produits')->with('status', 'Le produit '. $product->product_name .' a été supprimée avec succée');
    }

    public function activer_produit($id){

        $product = Product::find($id);

        $product->status = 1;
        
        $product->update();

        return redirect('/produits')->with('status', 'Le produit '. $product->product_name .' a été activé avec succée');
    }

    public function desactiver_produit($id){

        $product = Product::find($id);

        $product->status = 0;
        
        $product->update();

        return redirect('/produits')->with('status', 'Le produit '. $product->product_name .' a été désactivé avec succée');
    }
}