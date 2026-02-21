<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CommentController extends Controller
{
    public function StoreCourseComment(Request $request){

        if(Auth::check()){

            Comment::insert([
                'course_id' => $request->id,
                'user_id' => Auth::id(),
                'name' => Auth::user()->firstname,
                'email' => Auth::user()->email,
                'status' => 1,
                'comment' => $request->rcomment,
                'created_at' => Carbon::now()
            ]);

            return response()->json(['success'=> 'Votre commentaire à bien été enregistré ']);

        }else{

            Comment::insert([
                'course_id' => $request->id,
                'name' => $request->rname,
                'email' => $request->remail,
                'status' => 1,
                'comment' => $request->rcomment,
                'created_at' => Carbon::now()
            ]);
            return response()->json(['success'=> 'Votre commentaire à bien été enregistré ']);

        }

   }

    public function CountCourseComment($id){

        $reviews = Comment::where('course_id',$id)->get();
        $review_count = count($reviews);
        return response()->json($review_count);

    } // end mehtod 
}
