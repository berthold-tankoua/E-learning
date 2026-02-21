<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Lesson;
use App\Models\Product;
use Carbon\Carbon;


class LessonController extends Controller
{
    /*===========================================
    VIEW ALL PRODUCTS VIEW PAGE
    ===========================================*/

    public function ctrViewAllLessons() {

        $courses = Product::where('type',0)->orderBy('product_name_fr','ASC')->get();

        $verif_lesson = Lesson::latest()->get();

        return view('backend.lesson.lesson_view', compact('courses','verif_lesson'));

    } //End Method

    public function ctrAddLessonView() {

        $courses = Product::where('type',0)->orderBy('product_name_fr','ASC')->get();

        $verif_lesson = Lesson::latest()->get();
        return view('backend.lesson.lesson_add', compact('courses','verif_lesson'));

    } //End Method

    /*===========================================
    STORE LESSONS TO THE DATABASE
    ===========================================*/

    public function ctrStoreLesson(Request $request) {


        if(!empty($playlist_id)){

            $api_key = "AIzaSyAVYi6xMS67lPfBnP0KZTX6A3yybfuFZqM";
            // $playlist_id = "PLrSOXFDHBtfE5tpw0bjMevWxMWXotiSdO";
            $playlist_id = $request->playlist_id;
            $max_result = "100";
            $base_url = "https://youtube.googleapis.com/youtube/v3/playlistItems";
            $url = "$base_url?part=snippet&order=date&playlistId=".$playlist_id."&maxResults=".$max_result."&key=".$api_key."";
            $url = file_get_contents($url);
            // print_r($url);
            $videos = json_decode($url);

            foreach($videos->items as $video ){

                Lesson::insert([
                    'course_id' => $request->course_id,
                    'channel_id' => $video->snippet->channelId,
                    'channel_title' => $video->snippet->channelTitle,
                    'video_id' => $video->snippet->resourceId->videoId,
                    'video_title' => $video->snippet->title,
                    'thumburl' => $video->snippet->thumbnails->high->url,
                    'created_at' => Carbon::now(),   	 
                ]);
            }

        }else{

             ////////// Add Multiples Lessons Start ///////////

        $count_spec_title = count($request->spec_title);

        if($count_spec_title != NULL){

            for($i = 0; $i < $count_spec_title; $i++) {

                Lesson::insert([
                    'course_id' => $request->course_id,
                    'video_id' => $request->spec_id[$i],
                    'video_title' => $request->spec_title[$i],
                    'created_at' => Carbon::now(),   	 
                ]);

            }
        }

        }
    


        $notification = array(
			'message' => 'Lesson Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);


    } //End Method

}
