<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\CategoryController;

class CategoryController extends Controller
{
    //
    public function ajoutercategorie(){
        return view('admin.ajoutercategorie');
    } 

    public function sauvercategorie(Request $Request){

        $this->validate($Request, ['category_name' => 'required|unique:categories']);
        $categories = new Category();

        $categories->category_name = $Request->input('category_name');

        $categories->save();

        return redirect('/ajoutercategorie')->with('status', 'La catégories '. $categories->category_name .' a été ajoutée avec succée');

    }

    public function categories(){

        $categories = Category::get();

        return view('admin.categories')->with('categories', $categories);
    }

    public function edit_categorie($id){
        $categorie = Category::find($id);
        return view('admin.editcategorie')->with('categorie', $categorie);
    }

    public function modifiercategorie(Request $request){
         
        $categories = Category::find($request->input('id'));

        $categories->category_name = $request->input('category_name');

        $categories->update();

        return redirect('/categories')->with('status', 'La catégories '. $categories->category_name .' a été modifiée avec succée');
    }

    public function supprimercategorie($id){
        
        $categories = Category::find($id);

        $categories->delete();
        
        return redirect('/categories')->with('status', 'La catégories '. $categories->category_name .' a été supprimée avec succée');
    }
}
