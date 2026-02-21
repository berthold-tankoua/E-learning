<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    //
    public function ctrAllStudentClass(){

        $datas = StudentClass::all();
        return view('backend.student_class.class_view', compact('datas'));

    }

    public function ctrAddStudentClass(){
        return view('backend.student_class.class_add');
    }

    public function ctrStoreStudentClass(Request $request){

        $request->validate([
            'name'=>'required',
        ],[
            'name.required'=>'Saisir un Nom',
         ]);

            StudentClass::insert([      
                'name'=>$request->name,
                'status'=>1,
                'created_at'=>Carbon::now(),
            ]);

            $notification = array(
                'message' =>'Salle de classe enregistrée avec Succes',
                'alert-type'=>'success'
            );


        return redirect()->back()->with($notification);
        
    } //End Method

    /*===========================================
    DELETE Student-Class
    ===========================================*/

    public function ctrStudentClassDelete($id){

        $user = StudentClass::findOrFail($id);

        $notification = array(
            'message' =>'salle de classe supprimée avec succes',
            'alert-type'=>'success'
        );
        return redirect()->route('view.all.std_class')->with($notification);

    } //End Method

    /*===========================================
    EDIT  Student-Class
    ===========================================*/

    public function ctrEditStudentClass($id){
        $item = StudentClass::findOrFail($id);
        return view('backend.student_class.class_edit',compact('item'));
    } //End Method

    public function ctrUpdateUsers(Request $request){

        $id = $request->id;

        StudentClass::findOrFail($id)->update([
            'name'=>$request->name,
            'status'=>1,
            'updated_at'=>Carbon::now(),
        ]);
    
        $notification = array(
            'message' =>' Salle de classe mise a jour avec succes',
            'alert-type'=>'info'
        );


        return redirect()->route('view.all.std_class')->with($notification);

    } //End Method
}
