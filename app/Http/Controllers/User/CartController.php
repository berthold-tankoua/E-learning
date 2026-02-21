<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Cart;

class CartController extends Controller
{
    public function CartView(){
        return view('frontend.pages.cart.view_cart');
      }
    
      public function AddToCart(Request $request,$id){
    
           $product = Product::findOrFail($id);

        if($product->type != 0){

           Cart::add(['id' => $product->id,
           'name' => $product->product_name_fr,
           'qty' => 1,
           'price' => $product->selling_price,
           'weight' => 1,
           'options' => [
               'image' => $product->product_thambnail,
               'color' => "none",
               'size' => "none",
               'store' => "none",
            ]
            ]);

            return response()->json(['success'=> 'Cours ajouté avec succes au panier d achat']);

        }else{
            return response()->json(['error'=> 'Les cours gratuits ne peuvent etre ajouter au panier d achat']);

        }

    
      }
    
      public function MiniCart(){
    
          $carts = Cart::content();
          $cartQty = Cart::count();
          $cartTotal = Cart::total();
          return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
          ));
    
      }
    
      public function GetCartProduct(){
    
          $carts = Cart::content();
          $cartQty = Cart::count();
          $cartTotal = Cart::total();
          return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
          ));
    
      }
    
      public function RemoveMiniCart($rowId){
           Cart::remove($rowId);
           return response()->json(['success' => 'Cours supprimé du panier d achat']);
      }
}
