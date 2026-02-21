<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use  App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Store;

use Carbon\Carbon;
use Image;

class CourseController extends Controller
{
       /*===========================================
    ADD PRODUCT VIEW PAGE
    ===========================================*/

    public function ctrAddCourseView() {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
		$brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands', 'subcategories'));

    } //End Method

    /*===========================================
    VIEW ALL PRODUCTS VIEW PAGE
    ===========================================*/

    public function ctrViewAllCourses() {

        $products = Product::all();

        return view('backend.product.view_all_products', compact('products'));

    } //End Method

    /*===========================================
    STORE PRODUCTS TO THE DATABASE
    ===========================================*/

    public function ctrStoreCourse(Request $request) {

        $image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(1280,720)->save('upload/courses/thambnail/'.$name_gen);
    	$save_url = 'upload/courses/thambnail/'.$name_gen;

        $product_code = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 8);

        Product::insert([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_fr' => $request->product_name_fr,
            'video_link' => $request->video_link,
            'product_slug_fr' => Str::slug($request->product_name_fr),
            'product_code' => $product_code,
            'product_tags_fr' => $request->product_tags_fr,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_fr' => $request->short_descp_fr,
            'long_descp_fr' => $request->long_descp_fr,
            'langue' => $request->langue,
            'top_20' => $request->top_20,
            'avis' => $request->avis,
            'type' => $request->type,
            'special' => $request->special,
            'top_sales' => $request->top_sales,
            'top_views' => $request->top_views,
            'product_thambnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),   	 
  
        ]);


        $notification = array(
			'message' => 'Product Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);


    } //End Method


    /*===========================================
    EDIT PRODUCT VIEW PAGE
    ===========================================*/
    public function ctrEditCourse($id){

		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		$subcategory = SubCategory::latest()->get();
		$subsubcategory = SubSubCategory::latest()->get();
		$product = Product::findOrFail($id);
		return view('backend.product.product_edit',compact('categories','brands','subcategory','subsubcategory','product'));

	}

    /*===========================================
    UPDATE PRODUCT VIEW PAGE
    ===========================================*/
    public function ctrUpdateCourse(Request $request){

        $product_id = $request->id;
        $old_img = $request->old_img; 
        $image = $request->file('product_thambnail');

        if($image){
            @unlink($old_img);
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1280,720)->save('upload/courses/thambnail/'.$name_gen);
            $save_url = 'upload/courses/thambnail/'.$name_gen;
            Product::findOrFail($product_id)->update([
                'product_name_fr' => $request->product_name_fr,
                'video_link' => $request->video_link,
                'product_slug_fr' => Str::slug($request->product_name_fr),
                'product_tags_fr' => $request->product_tags_fr,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'short_descp_fr' => $request->short_descp_fr,
                'long_descp_fr' => $request->long_descp_fr, 
                'top_20' => $request->top_20,
                'special' => $request->special,
                'top_sales' => $request->top_sales,
                'top_views' => $request->top_views,
                'product_thambnail' => $save_url,
                'status' => 1,
                'type' => $request->type,
            ]);
        }else{
            Product::findOrFail($product_id)->update([
                'product_name_fr' => $request->product_name_fr,
                'product_slug_fr' => Str::slug($request->product_name_fr),
                'product_tags_fr' => $request->product_tags_fr,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'short_descp_fr' => $request->short_descp_fr,
                'long_descp_fr' => $request->long_descp_fr, 
                'top_20' => $request->top_20,
                'special' => $request->special,
                'top_sales' => $request->top_sales,
                'top_views' => $request->top_views,
                'status' => 1,
                'type' => $request->type,
            ]);
        }

        $notification = array(
            'message' =>'Produit mis a jour avec succes',
            'alert-type'=>'info'
        );
        
        return redirect()->route('view.all.courses')->with($notification);
	}

    /*===========================================
    DELETE PRODUCTS FROM DATABASE
    ===========================================*/

    public function ctrCourseDelete($product_id){
        $product = Product::findOrFail($product_id);
        unlink($product->product_thambnail);

        $notification = array(
           'message' => 'Produit Supprimé avec succes',
           'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }// end method 

    /*===========================================
    ACTIVE Product  PRINCIPAL
    ===========================================*/

    public function ctrCourseActive($item_id) {

        Product::findOrFail($item_id)->update(['status' => 1]);

        $notification = array(
            'message' =>'Product Active Successfully',
            'alert-type'=>'success'
        );
        
        return redirect()->back()->with($notification);


    } //End Method


    /*===========================================
    INACTIVE Product  PRINCIPAL
    ===========================================*/

    public function ctrCourseInactive($item_id) {

        Product::findOrFail($item_id)->update(['status' => 0]);

        $notification = array(
            'message' =>'Product Inactive Successfully',
            'alert-type'=>'error'
        );
        
        return redirect()->back()->with($notification);

    } //End Method
}
