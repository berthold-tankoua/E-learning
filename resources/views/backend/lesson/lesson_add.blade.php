@extends('admin.admin_master')

@section('admin')

@section('title')
E-learning | Add-Lesson
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">

            <div class="box-header with-border">
                <h4 class="box-title">Add Lesson </h4>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <div class="row">
                    <div class="col">
                    <form action="{{route('lesson.store')}}" method="POST" enctype="multipart/form-data">
                            
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Select Course <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select id="select" name="course_id"  class="form-control">
                                            <option value="" selected disabled>Select course</option>
                                            @php
                                            $get_id=0;
                                            @endphp
                                            @foreach($courses as $item)
                                                @php
                                                    $lessons = App\Models\Lesson::where('course_id',$item->id)->orderBy('id','ASC')->get();
                                                @endphp
                                                @if(count($lessons)<1)
                                                 <option value="{{$item->id}}">{{$item->product_name_fr}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('course_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                            </div>	
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Playlist ID <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="playlist_id" class="form-control" >
                                        @error('ytb_link')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                            </div>
                                </div>
                            </div>		
                            <br>	
                            <div class="row">

                                <div class="col-12">	

                                    <div class="row"> <!-- 9th row  -->
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <h5>Video Title <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="spec_title[]" class="form-control">
                                                </div>
                                            </div>  
                                        </div>  <!-- col-md-5//  -->

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <h5>Video ID <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="spec_id[]" class="form-control">
                                                </div>
                                            </div>  
                                        </div>  <!-- col-md-5//  -->

                                        <div class="col-md-2" style="margin-top: 27px !important;">
                                            <span class="btn btn-success btn-md addeventmore" >
                                                <i class="fa fa-plus-circle"></i>
                                            </span>
                                        </div>  <!-- col-md-2//  -->

                                    </div> <!-- end 9th row  -->

                                    <div class="add_item">

                                    </div> <!-- /.add_item -->
                        
                                    <hr>

                                </div> <!-- end col 12  -->
                            
                            <div> <!-- end row  -->

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Add Lesson">
                            </div>

                        </form> <!-- end form -->

                    <div> <!-- end col  -->
                <div> <!-- end row  -->

            <div> <!-- end box-body  -->

        <div> <!-- end box  -->
        
    </section> <!-- end section  -->


    <div style="visibility: hidden;">

        <div class="extra_item_to_add" id="extra_item_to_add">

            <div class="delete_extra_item_to_add" id="delete_extra_item_to_add">

                <div class="row"> <!-- 10th row  -->

                    <div class="col-md-5">
                        <div class="form-group">
                            <h5>Video Title <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="text" name="spec_title[]" class="form-control">
                            </div>
                        </div>  
                    </div>  <!-- col-md-5//  -->

                    <div class="col-md-5">
                        <div class="form-group">
                            <h5>Video ID <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="text" name="spec_id[]" class="form-control">
                            </div>
                        </div>  
                    </div>  <!-- col-md-5//  -->

                    <div class="col-md-2" style="margin-top: 27px !important;">
                        <span class="btn btn-success btn-md addeventmore" >
                            <i class="fa fa-plus-circle"></i>
                        </span>
                        <span class="btn btn-danger btn-md removeeventmore">
                            <i class="fa fa-minus-circle"></i>
                        </span>
                    </div>  <!-- col-md-2//  -->

                </div> <!-- end 10th row  -->

            </div>

        </div>

    </div>

<div><!-- end section  -->



    <!--===============================
    AJAX JS SCRIPT FOR ADD MULTIPLE SPECIFICATIONS 
    ================================-->

    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 0;
            $(document).on('click', '.addeventmore', function() {
                var extra_item_to_add = $("#extra_item_to_add").html();
                $('.add_item').append(extra_item_to_add);
                counter++;    
            }); //End to add item 
            $(document).on('click', '.removeeventmore', function() {
                $(this).closest(".delete_extra_item_to_add").remove();
                counter--
            }); //End remove item 
        }); //End Initialize Jquery Script
    </script>


@endsection

@push('scripts')

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
</script>

<script>
    CKEDITOR.replace('my-editor', options);
    CKEDITOR.replace('my-editor2', options);
</script>

@endpush