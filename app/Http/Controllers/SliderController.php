<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Slider;

class SliderController extends Controller
{
    //
    public function ajouterslider(){

        return view('admin.ajouterslider');
    }

    public function sauverslider(Request $Request){

                $this->validate($Request,['description1'=>'required',
                                          'description2'=>'required',
                                          'slider_image'=>'image']);

        if ($Request->hasfile('slider_image')) {
        // 1 : get file name with ext.
        $fileNameWithExt = $Request->file('slider_image')->getClientOriginalName();
        // 2 : get just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // 3 : get just file extension
        $ext = $Request->file('slider_image')->getClientOriginalExtension();
        // 4 : file name to store
        $fileNameToStore = $fileName.'_'.time().'.'.$ext;
        // 5 : uploader l'image

        $path = $Request->file('slider_image')->storeAs('public/slider_image', $fileNameToStore);

        }else{
        $fileNameToStore = 'noimage.jpg';
        }

        $slider = new slider();
        $slider->description1 = $Request->input('description1');
        $slider->description2 = $Request->input('description2');
        $slider->slider_image = $fileNameToStore;
        $slider->status = 1;

        $slider->save();

        return redirect('/ajouteslider')->with('status', 'le slider '. $slider->description1.' a été inséré avec succée !');
    }

    public function sliders(){

        $sliders = Slider::get();
        
        return view('admin.sliders')->with('sliders', $sliders);
    }

    public function edit_slider($id){

        $slider = slider::find($id);

        return view('admin.editslider')->with('slider', $slider);
    }

    public function modifierslider(Request $Request){

        $this->validate($Request,['description1'=>'required',
                                  'description2'=>'required',
                                  'slider_image'=>'image']);

                            $slider = Slider::find($Request->input('id'));
                            $slider->description1 = $Request->input('description1');
                            $slider->description2 = $Request->input('description2');

        if ($Request->hasfile('slider_image')) {
            // 1 : get file name with ext.
            $fileNameWithExt = $Request->file('slider_image')->getClientOriginalName();
            // 2 : get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // 3 : get just file extension
            $ext = $Request->file('slider_image')->getClientOriginalExtension();
            // 4 : file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$ext;
            // 5 : uploader l'image

            $path = $Request->file('slider_image')->storeAs('public/slider_image/', $fileNameToStore);

            if($slider->slider_image != 'noimage.jpg'){
                storage::delete('public/slider_image/'.$slider->slider_image);
            }

            $slider->slider_image = $fileNameToStore;
        }

        $slider->update();

        return redirect()->route('edit_slider', ['id' => $slider->id])->with('status', 'le slider a été modifié avec succée !');
    }

    public function supprimerslider($id){

        $slider = Slider::find($id);

        if($slider->slider_image != 'noimage.jpg'){
                storage::delete('public/slider_image/'.$slider->slider_image);
            }

        $slider->delete();

        return redirect('/sliders')->with('status', 'Le slider a été suprimé avec succée');
    }

    public function activer_slider($id){

        $slider = Slider::find($id);

        $slider->status = 1;

        $slider->update();

        return redirect('/sliders')->with('status', 'Le slider a été activer avec succée');
    }

    public function desactiver_slider($id){

        $slider = Slider::find($id);

        $slider->status = 0;

        $slider->update();

        return redirect('/sliders')->with('status', 'Le slider a été desactiver avec succée');
    }

}
