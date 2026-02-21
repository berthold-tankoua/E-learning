<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Image;

class UsersController extends Controller
{
    public function ctrAllUsers(){
        $users = User::all();
        return view('backend.user.user_view',compact('users'));
    }

    public function ctrAddUsers(){
        return view('backend.user.user_add');
    }

    public function ctrStoreUsers(Request $request){

        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>'required',
            'user_role'=>'required',
            'sex'=>'required',
            'email'=>'required',
        ],[
            'firstname.required'=>'Saisir un Nom',
            'lastname.required'=>'Saisir un Prenom',
            'email.required'=>'Saisir un Email',
            'user_role.required'=>'Definir un role',
            'sex.required'=>'Definir un genre',
            'phone.required'=>'Saisir un numero telephone',
         ]);

        if($request->file('profil_pic')){

            $image = $request->file('profil_pic');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300 )->save('upload/users/'.$name_gen);
            $save_url = 'upload/users/'.$name_gen;

            User::insert([             
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'password'=>Hash::make(12345),
                'sex'=>$request->sex,
                'status'=>1,
                'user_role'=>$request->user_role,
                'profil_pic'=>$save_url,
                'created_at'=>Carbon::now(),
            ]);

            $notification = array(
                'message' =>'Utilisateur enregistré avec Success',
                'alert-type'=>'success'
            );

        }else{

            User::insert([      
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'password'=>Hash::make(12345),
                'sex'=>$request->sex,
                'status'=>1,
                'user_role'=>$request->user_role,
                'created_at'=>Carbon::now(),
            ]);

            $notification = array(
                'message' =>'Utilisateur enregistré avec Succes',
                'alert-type'=>'success'
            );

        }

        return redirect()->back()->with($notification);
        
    } //End Method

    /*===========================================
    DELETE User
    ===========================================*/

    public function ctrUsersDelete($id){

        $user = User::findOrFail($id);
        $image = $user->profil_pic;
        @unlink('upload/users/'.$image);
        User::findOrFail($id)->delete();

        $notification = array(
            'message' =>'Utilisateur supprimé avec succes',
            'alert-type'=>'success'
        );
        return redirect()->route('view.all.users')->with($notification);

    } //End Method

    /*===========================================
    EDIT User
    ===========================================*/

    public function ctrEditUsers($id){
        $item = User::findOrFail($id);
        return view('backend.user.user_edit',compact('item'));
    } //End Method

    public function ctrUpdateUsers(Request $request){

        $id = $request->id;

        $old_img = $request->old_image;
        @unlink('upload/users/'.$old_img);

        if($request->file('profil_pic')){

            $image = $request->file('profil_pic');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300 )->save('upload/users/'.$name_gen);
            $save_url = 'upload/users/'.$name_gen;

            User::findOrFail($id)->update([
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'password'=>Hash::make(12345),
                'sex'=>$request->sex,
                'status'=>1,
                'user_role'=>$request->user_role,
                'profil_pic'=>$save_url,
                'updated_at'=>Carbon::now(),
            ]);
    
            $notification = array(
                'message' =>'Utilisateur mis a jour',
                'alert-type'=>'info'
            );

        }else{

            User::findOrFail($id)->update([
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'password'=>Hash::make(12345),
                'sex'=>$request->sex,
                'status'=>1,
                'user_role'=>$request->user_role,
                'updated_at'=>Carbon::now(),
            ]);
    
            $notification = array(
                'message' =>'Utilisateur mis a jour',
                'alert-type'=>'info'
            );

        }

        return redirect()->route('view.all.users')->with($notification);

    } //End Method

}
