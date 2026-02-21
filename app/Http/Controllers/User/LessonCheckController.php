<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\UserSuivi;
use App\Models\VisitCount;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LessonCheckController extends Controller
{
    public function AddToLessonSuivi(Request $request, $lesson_id){

        if(Auth::check()){
            $exists = UserSuivi::where('user_id',Auth::id())->where('lesson_id',$lesson_id)->first();
            if(!$exists){
                UserSuivi::insert([
                    'user_id' => Auth::id(),
                    'lesson_id' => $lesson_id,
                    'created_at' => Carbon::now()
                ]);
                return response()->json(['success'=> 'Progression Sauvegardée']);
           }else{
            
            UserSuivi::where('user_id',Auth::id())->where('lesson_id',$lesson_id)->update([
                'lesson_id' => $lesson_id,
            ]);

           }
        }

    }

    public function CourseViewCount($course_id){

            $exists = VisitCount::where('product_id',$course_id)->first();
            if(!$exists){

                VisitCount::insert([
                    'product_id' => $course_id,
                    'count' => 5,
                    'created_at' => Carbon::now()
                ]);

           }else{
    
                $val = $exists->count+1;
            
            VisitCount::where('product_id',$course_id)->update([
                'count' => $val,
            ]);

            Product::where('id',$course_id)->update([
                'avis' => $val,
            ]);

           }

    }
}
