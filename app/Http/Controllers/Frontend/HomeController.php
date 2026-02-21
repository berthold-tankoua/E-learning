<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Product;

class HomeController extends Controller
{
    /*===========================================
    HOME PAGE VIEW PAGE
    ===========================================*/
    public function index(){

        $notices = Notice::latest()->get();
        $brands = Brand::latest()->get();
        return view('frontend.pages.home.index',compact('notices','brands')); 
        
    } //End Method
    
    /*===========================================
    CATEGORIES DETAILS VIEW PAGE
    ===========================================*/
    public function CourseCategories($id,$slug){

        $products = Product::where('category_id',$id)->where('status',1)->get();
        if(count($products) >0 ){
            return view('frontend.pages.products.product_categories',compact('products'));
        }else{
            return view('errors.405');
        }

    }
    
    /*===========================================
     SUBCATEGORIES DETAILS VIEW PAGE
    ===========================================*/
    public function CourseSubCategories($id,$slug){

            $products = Product::where('subcategory_id',$id)->where('status',1)->get();

            if(count($products) == NULL){
                return view('errors.405');
            }else{
                return view('frontend.pages.products.product_subcategories',compact('products'));
            }
        

    }

    /*===========================================
     SUBSUBCATEGORIES DETAILS VIEW PAGE
    ===========================================*/
    public function CourseSubSubCategories($id,$slug){

        $products = Product::where('subsubcategory_id',$id)->where('status',1)->get();

        if(count($products) == NULL){
            return view('errors.405');
        }else{
            return view('frontend.pages.products.product_subsubcategories',compact('products'));
        }

    }

    /*===========================================
    PRODUCT DETAILS VIEW PAGE
    ===========================================*/
    public function CourseDetails($id,$slug){

        $product = Product::findOrfail($id);

        return view('frontend.pages.products.product_details',compact('product'));

    }

    /*===========================================
    PRODUCT TYPE VIEW PAGE
    ===========================================*/
    public function CourseSell(){

        $value="En Vente";
        $products = Product::where('type',1)->get();

        return view('frontend.pages.others.product_sell',compact('products','value'));

    }
    public function CourseTop(){

        $value="Meilleures Formations";
        $products = Product::where('top_20',1)->get();

        return view('frontend.pages.others.product_top',compact('products','value'));

    }
    public function CourseNew(){

        $value="Nouveautés";
        $products = Product::where('status',1)->orderBy('id','DESC')->get();

        return view('frontend.pages.others.product_new',compact('products','value'));

    }

    public function SearchViewResult(Request $request){

        $value = $request->searchval;
        $products = Product::where('product_name_fr','LIKE',"%$value%")->orwhere('product_tags_fr','LIKE',"%$value%")->where('status',1)->get();

        if(count($products) == NULL){
            return view('errors.405');
        }else{
            return view('frontend.pages.search.search',compact('products','value'));
        }


    }

}
