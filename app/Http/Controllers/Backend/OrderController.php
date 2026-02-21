<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;


class OrderController extends Controller
{
            // Pending Orders 
	public function PendingOrdersView(){

		$orders = Order::where('status','pending')->orderBy('id','DESC')->get();
		return view('backend.orders.pendings_orders',compact('orders'));

	} // end mehtod 

    // Pending Order Details 
	public function PendingOrdersDetails($order_id){

		$order = Order::with('user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('backend.orders.pending_orders_details',compact('order','orderItem'));

	} // end method 

    public function FinishOrdersView(){

		$orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
		return view('backend.orders.finish_orders',compact('orders'));

	} // end mehtod 

    public function PendingToConfirm($order_id){

        Order::findOrFail($order_id)->update(['status' => 'confirm']);
  
        $notification = array(
              'message' => 'Order Confirm Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->back()->with($notification);
  
    } // end method
}
