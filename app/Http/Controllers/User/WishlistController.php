<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function AddToWishlist(Request $request, $product_id){

        if(Auth::check()){
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if(!$exists){
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now()
                ]);
                return response()->json(['success'=> 'Ajouté avec succès à votre liste de souhaits']);
           }else{
            return response()->json(['error'=> 'Ce produit existe déjà dans vos favoris']);
           }
        }else{
            return response()->json(['error'=> 'Veuillez vous connecter ou creer un compte']);
        }

    }

    public function wishlistView(){
        return view('frontend.pages.wishlist.view_wishlist');
    }

    public function GetWishlistProduct(){
        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return response()->json($wishlist);
    }

    public function GetWishlistcount(){

        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        
        if(empty($wishlist)){
            $wish_count = '0';
        }else{
            $wish_count = count($wishlist);
        }
        return response()->json($wish_count);
    }

    public function DeleteWishlistProduct($rowId){

        Wishlist::findOrFail($rowId)->delete();
        
        return response()->json(['success' => 'Produit supprimé des favoris']);
    }
}
