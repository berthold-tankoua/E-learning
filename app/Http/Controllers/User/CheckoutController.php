<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;


class CheckoutController extends Controller
{
        // CHECKOUT 

        public function checkoutView(){
      
          if(Auth::check()){
            
            if(Cart::total() > 0){
                  $carts = Cart::content();
                  $cartQty = Cart::count();
                  $cartTotal = Cart::total();
                  return view('frontend.pages.checkout.checkout_view',compact('carts','cartQty','cartTotal'));
                }else{
                  $notification = array(
                    'message' =>'Veuillez ajouter un produit au panier d achat',
                    'alert-type'=>'error'
                  );
                  return redirect('/')->with($notification);
            }

          }else{
              return response()->json(['error'=> 'Veuillez vous connecter ou creer un compte']);
          }
        
        }

        public function checkoutStore(Request $request){

            $request->validate([
              'name'=>'required',
              'phone'=>'required',
              'email'=>'required',
              'country'=>'required',
              'town'=>'required',
              'quarter'=>'required',
            ],[
              'name.required'=>'Saisir votre Nom & prenom',
              'email.required'=>'Saisir votre Email',
              'phone.required'=>'Saisir votre Contact',
              'country.required'=>'Saisir votre Pays',
              'town.required'=>'Saisir votre Ville',
              'quarter.required'=>'Saisir votre Quartier',
            ]);
              
        $total_amount = round(Cart::total());
  
        $order_id = Order::insertGetId([
           'user_id' => Auth::id(),
           'coutry' => $request->country,
           'town' => $request->town,
           'quarter' => $request->quarter,
           'name' => $request->name,
           'email' => $request->email,
           'phone' => $request->phone,
           'post_code' => 237,
           'notes' => $request->notes,
            'payment_type' => 'Paiement à la Livraison',
            'payment_method' => 'Paiement à la Livraison',
            'currency' =>  'fcfa',
            'amount' => $total_amount,
            'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'created_at' => Carbon::now(),	 
   
        ]);
   
           // Send Mail to User
           $invoice = Order::findOrFail($order_id);
           $OrderInfo=[
               'invoice_no' => $invoice->invoice_no,
               'payment_method' => $invoice->payment_method,
               'amount' => $total_amount,
               'name' => $invoice->name,
               'email' => $invoice->email,
           ];
           Mail::to("$invoice->email")->send(new OrderMail($OrderInfo));
   
            
        // End Send Email 
   
   
        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id, 
                'product_id' => $cart->id,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }
   
        Cart::destroy();
   
        $notification = array(
               'message' => 'Votre Ordre d achat a ete placé avec Succes',
               'alert-type' => 'success'
           );
   
           return redirect('/')->with($notification);
  
        }
}
