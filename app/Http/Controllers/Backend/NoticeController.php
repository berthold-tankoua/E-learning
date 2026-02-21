<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Product;
use Carbon\Carbon;
use Image;

class NoticeController extends Controller
{
    public function NoticeView(){
        
        $notices = Notice::latest()->get();
        return view('backend.notice.notice_view',compact('notices'));

    } //End Method

    /*===========================================
    ADD BRAND 
    ===========================================*/

    public function NoticeStore(Request $request){

        $notice_image = $request->file('notice_image');
        $name_gen = hexdec(uniqid()).'.'.$notice_image->getClientOriginalExtension();
        Image::make($notice_image)->save('upload/notices/'.$name_gen);
        $save_url = 'upload/notices/'.$name_gen;

            Notice::insert([
                'product_id'=>$request->product_id,
                'notice_link'=>$request->notice_link,
                'notice_image'=> $save_url,
            ]);

            $notification = array(
                'message' =>'Notice Inserted Successfully',
                'alert-type'=>'success'
            );



        return redirect()->back()->with($notification);
        
    } //End Method

    /*===========================================
    EDIT BRAND
    ===========================================*/

    public function NoticeEdit($id){
        $notice = Notice::findOrFail($id);
        return view('backend.notice.notice_edit',compact('notice'));
    } //End Method

    public function NoticeUpdate(Request $request){
        $notice_id = $request->id;


        Notice::findOrFail($notice_id)->update([    
            'product_id'=>$request->product_id,
            'notice_link'=>$request->ytb_link,
        ]);

        $notification = array(
            'message' =>'Notice Updated',
            'alert-type'=>'info'
        );

        return redirect()->route('all.notice')->with($notification);

    } //End Method

    /*===========================================
    DELETE BRAND
    ===========================================*/

    public function NoticeDelete($id){

        $notice = Notice::findOrFail($id);
 
        Notice::findOrFail($id)->delete();

        $notification = array(
            'message' =>'Notice DELETED',
            'alert-type'=>'success'
        );
        return redirect()->route('all.notice')->with($notification);

    } //End Method

        /*===========================================
    ACTIVE Notice PRINCIPAL
    ===========================================*/

    public function NoticeActive($slider_id) {

        Notice::findOrFail($slider_id)->update(['status' => 1]);

        $notification = array(
            'message' =>'Notice Active Successfully',
            'alert-type'=>'success'
        );
        
        return redirect()->back()->with($notification);


    } //End Method


    /*===========================================
    INACTIVE Notice PRINCIPAL
    ===========================================*/

    public function NoticeInactive($slider_id) {

        Notice::findOrFail($slider_id)->update(['status' => 0]);

        $notification = array(
            'message' =>'Notice InActive Successfully',
            'alert-type'=>'error'
        );
        
        return redirect()->back()->with($notification);

    } //End Method

}
