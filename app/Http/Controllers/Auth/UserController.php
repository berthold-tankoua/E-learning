<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Mail\RegisterMail;
use App\Models\UserSuivi;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function create(Request $request){
        $request->validate([
            'firstname'=>'required',
            'phone'=>'required',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|min:5|max:15'
        ],[
            'firstname.required'=>'Saisir votre Nom',
            'email.required'=>'Saisir votre Email',
            'phone.required'=>'Saisir votre Contact',
            'password.required'=>'Saisir votre Mot Passe',
         ]);

        $data = array();
        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->firstname;
        $data['sex'] = "Empty";
        $data['phone'] = $request->phone;
        $data['email'] = $request->remail;
        $data['password'] = Hash::make($request->rpassword);
        $data['created_at'] = Carbon::now();
        DB::table('users')->insert($data);

        // $regisInfo=[
        //     'title' => 'Bienvenue',
        //     'name' => $request->firstname,
        // ];
        // Mail::to("$request->email")->send(new RegisterMail($regisInfo));
    
       return redirect()->route('user.login')->with('success','Votre compte a ete crée avec succes');
    
    }

    function check(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:15'
        ],[

            'email.required'=>'Email requis',
            'password.required'=>'Mot de passe requis',
         ]);

        $creds = $request->only('email','password');
        if(Auth::guard('web')->attempt($creds, $request->remember_me)){
            return redirect('/');
        }else{
            return redirect()->route('user.login')->with('fail','Error');
        }
    
    }

    function UserProfile(){
        
        if(Auth::check()){

        $courses = UserSuivi::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('frontend.pages.account.account',compact('courses'));

        }else{
           return response()->json(['error'=> 'veuillez vous connecter ']);
        }
    }

    function AjaxUserLogin(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:15'
        ],[

            'email.required'=>'Email requis',
            'password.required'=>'Mot de passe requis',
         ]);

        $creds = $request->only('email','password');

        if(Auth::guard('web')->attempt($creds, $request->remember_me)){
            return response()->json(['success'=> 'Connexion reussi']);
        }else{
            return response()->json(['error'=> 'Erreur survenue lors de la connexion']);
        }
    
    }
    
    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
