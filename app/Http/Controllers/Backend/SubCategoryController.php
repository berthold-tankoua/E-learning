<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;
use Carbon\Carbon;
use Image;

class SubCategoryController extends Controller
{
        /*===========================================
    SUBCATEGORY PAGE VIEW PAGE
    ===========================================*/

    public function ctrSubCategoryView(){
        $categories = Category::orderBy('category_name_fr','ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.subcategory.subcategory_view',compact('subcategories','categories'));
    } //End Method

    /*===========================================
    ADD SUBCATEGORY 
    ===========================================*/

    public function ctrSubCategoryStore(Request $request){

        $request->validate([
         'category_id'=>'required',
         'subcategory_name_fr'=>'required',
         'subcategory_image'=>'required',
        ],[
           'category_id.required'=>'select category',
           'subcategory_name_fr.required'=>'input subcategory french Name',
           'subcategory_image'=>'input subcategory image',
        ]);

        $subcategory_image = $request->file('subcategory_image');
        $name_gen = hexdec(uniqid()).'.'.$subcategory_image->getClientOriginalExtension();
        Image::make($subcategory_image)->resize(300,300)->save('upload/subcategories/'.$name_gen);
        $save_url = 'upload/subcategories/'.$name_gen;

        SubCategory::insert([
           'category_id'=>$request->category_id,
           'subcategory_name_fr'=>$request->subcategory_name_fr,
           'subcategory_slug_fr' => strtolower(str_replace(' ','-',$request->subcategory_name_fr)),
           'subcategory_image'=> $save_url,
        ]);

        $notification = array(
         'message' =>'subcategory Inserted Successfully',
         'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);

    } //End Method

    /*===========================================
    EDIT SUBCATEGORY
    ===========================================*/

    public function ctrSubCategoryEdit($id){
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::orderBy('category_name_fr','ASC')->get();
        return view('backend.subcategory.subcategory_edit',compact('subcategory', 'categories'));
    } //End Method

    /*===========================================
    UPDATE SUBCATEGORY
    ===========================================*/

    public function ctrSubCategoryUpdate(Request $request){

        $old_img = $request->old_img; 
        $subcategory_id = $request->id;

        if($request->file('subcategory_image')){

            @unlink($old_img);
            $subcategory_image = $request->file('subcategory_image');
            $name_gen = hexdec(uniqid()).'.'.$subcategory_image->getClientOriginalExtension();
            Image::make($subcategory_image)->resize(300,300)->save('upload/subcategories/'.$name_gen);
            $save_url = 'upload/subcategories/'.$name_gen;
            $subcat_image = $save_url;
        }

        SubCategory::findOrFail($subcategory_id)->update([
            'category_id'=>$request->category_id,
            'subcategory_name_fr'=> $request->subcategory_name_fr,
            'subcategory_slug_fr'=> Str::slug($request->subcategory_name_fr),
            'subcategory_image'=> $old_img,
        ]);
 
        $notification = array(
            'message' =>'subcategory Updated',
            'alert-type'=>'success'
        );

        return redirect()->route('all.subcategory')->with($notification);
    } //End Method

    /*===========================================
    DELETE SUBCATEGORY
    ===========================================*/

    public function ctrSubCategoryDelete($id){

        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' =>'Subcategory Deleted Successfully',
            'alert-type'=>'info'
        );

        return redirect()->route('all.subcategory')->with($notification);
    } //End Method

    /*===========================================
    SUB-SUBCATEGORY PAGE VIEW PAGE
    ===========================================*/

    public function ctrSubSubCategoryView(){
        $categories = Category::orderBy('category_name_fr','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_fr','ASC')->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('backend.subsubcategory.subsubcategory_view',compact('subsubcategories', 'categories', 'subcategories'));
    } //End Method

    /*===========================================
    AJAX GET SUBCATEGORY FOR DEPENDENT DROPDOWN 
    ===========================================*/

    public function ctrGetSubCategoryView($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->latest()->get();
        return json_encode($subcat);
    } //End Method

    /*===========================================
    AJAX GET SUBSUBCATEGORY FOR DEPENDENT DROPDOWN 
    ===========================================*/

    public function ctrGetSubSubCategory($subcategory_id){
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_fr', 'ASC')->get();
        return json_encode($subsubcat);
    } //End Method

    /*===========================================
    SUB-SUBCATEGORY STORE DATA
    ===========================================*/

    public function ctrSubSubCategoryStore(Request $request){

        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_fr' => 'required',
           ],[
            'category_id.required' => 'Select category',
            'subcategory_id.required' => 'Select subcategory',
            'subsubcategory_name_fr.required' => 'Input subsubcategory french name',
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_fr' => $request->subsubcategory_name_fr,
            'subsubcategory_slug_fr' => Str::slug($request->subsubcategory_name_fr),
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' =>'SubSubCategory Inserted Successfully',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);

    }//End Method

    /*===========================================
    SUB-SUBCATEGORY EDIT DATA
    ===========================================*/

    public function ctrSubSubCategoryEdit(Request $request, $subsubcat_id){

        $categories = Category::orderBy('category_name_fr','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_fr','ASC')->get();
        $subsubcategory = SubSubCategory::findorFail($subsubcat_id);

        return view('backend.subsubcategory.subsubcategory_edit', compact('categories', 'subcategories', 'subsubcategory'));

    }//End Method


    
    /*===========================================
    SUB-SUBCATEGORY UPDATE DATA
    ===========================================*/

    public function ctrSubSubCategoryUpdate(Request $request){

        $subsubcat_id = $request->id;

        $update_subsubcat = SubSubCategory::findOrFail($subsubcat_id);
        $update_subsubcat->category_id = $request->category_id;
        $update_subsubcat->subcategory_id = $request->subcategory_id;
        $update_subsubcat->subsubcategory_name_fr = $request->subsubcategory_name_fr;
        $update_subsubcat->subsubcategory_slug_fr = Str::slug($request->subsubcategory_name_fr);
        $update_subsubcat->save();
 
        $notification = array(
            'message' =>'SubSubCategory Updated Successfully',
            'alert-type'=>'info'
        );

        return redirect()->route('all.subsubcategory')->with($notification);

    } //End Method

    /*===========================================
    SUB-SUBCATEGORY DELETE DATA
    ===========================================*/
    
    public function ctrSubSubCategoryDelete($subsubcat_id){

        $subsubcategory = SubSubCategory::findOrFail($subsubcat_id);

        $subsubcategory->delete();

        $notification = array(
            'message' =>'SubSubCategory Deleted Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('all.subsubcategory')->with($notification);

    } //End Method
}
