@extends('admin.admin_master')

@section('admin')

@section('title')
E-learning | Add-Course
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">

            <div class="box-header with-border">
                <h4 class="box-title">Add Product </h4>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('add.course.store') }}" method="POST" enctype="multipart/form-data">
                            
                            @csrf

                            <div class="row">

                                <div class="col-12">	

                                    <div class="row"> <!-- start 1st row  -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Brand Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="brand_id" class="form-control"  >
                                                        <option value="" selected="" disabled="">Select Brand</option>
                                                        @foreach($brands as $brand)
                                                                <option value="{{ $brand->id }}">{{ $brand->brand_name_fr }}</option>	
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror 
                                                </div>
                                            </div>                                              
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Category Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control"  >
                                                        <option value="" selected="" disabled="">Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->category_name_fr }}</option>	
                                                        @endforeach
                                                    </select>
                                                    @error('category_id') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror 
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                                            
                                        <div class="col-md-4">
                                            
                                            <div class="form-group">
                                                <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subcategory_id" class="form-control"  >
                                                        <option value="" selected="" disabled="">Select SubCategory</option>
                                                    </select>
                                                    @error('subcategory_id') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror 
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 --> 
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subsubcategory_id" class="form-control"  >
                                                        <option value="" selected="" disabled="">Select SubSubCategory</option>
                                                    </select>
                                                    @error('subsubcategory_id') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror 
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Langue <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="langue" class="form-control"  >
                                                        <option value="" selected="" disabled="">Select langage</option>
                                                        <option value="francais" selected="">Francais</option>
                                                        <option value="anglais" selected="">Anglais</option>
                                                    </select>
                                                    @error('subsubcategory_id') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror 
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->                                    
                                    </div> <!-- end 2nd row  -->
                                    <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Course Name Fr <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_fr" class="form-control">
                                                    @error('product_name_fr') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                    
                                        </div> <!-- end col md 4 -->
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Youtube video Link <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="video_link" class="form-control" placeholder="enter Youtube video link">
                                                    @error('video_link') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 6 -->
                                    </div>
                                    <div class="row"> <!-- start 3RD row  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Course Tags Fr <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_tags_fr" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput">
                                                    @error('product_tags_fr') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="selling_price" class="form-control">
                                                    @error('selling_price') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Avis <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="avis" class="form-control">
                                                    @error('avis') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                            
                                    </div> <!-- end 5th row  -->

                                    <div class="row"> <!-- start 6th row  -->
                                       <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="discount_price" class="form-control" >
                                                    @error('discount_price') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Main Thambnail <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)" >
                                                    @error('product_thambnail') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <img src="" id="mainThmb">
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                            
                                    </div> <!-- end 6th row  -->
                                    <div class="row"> <!-- start 7th row  -->	
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Short Description French <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor2" name="short_descp_fr" rows="10" cols="80">
                                                        Short
                                                        </textarea>       
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 6 --> 
                                        </div> <!-- end 7th row  -->
                                    <div class="row"> <!-- start 7th row  -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Long Description French <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor4" name="long_descp_fr" id="textarea" class="form-control" required >
                                                        Long Description French
                                                    </textarea>     
                                                </div>
                                            </div>
                                        </div> <!-- end col md 6 -->		 
                            
                                    </div> <!-- end 7th row  -->

                                    <div class="row"> <!-- 9th row  -->
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <h5>Specification Title <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="spec_title[]" class="form-control">
                                                </div>
                                            </div>  
                                        </div>  <!-- col-md-5//  -->

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <h5>Specification Description <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="spec_desc[]" class="form-control">
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

                                    <div class="row"> <!-- 10th row  -->

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_1" name="top_20" value="1">
                                                        <label for="checkbox_1">Top 20</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_2" name="special" value="1">
                                                        <label for="checkbox_2">Special</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_3" name="top_views" value="1">
                                                        <label for="checkbox_3">top views</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_4" name="type" value="0">
                                                        <label for="checkbox_4">Free</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_5" name="type" value="1">
                                                        <label for="checkbox_5">Paying</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_6" name="top_sales" value="1">
                                                        <label for="checkbox_6">top sales</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                    </div> <!-- end 10th row  -->

                                </div> <!-- end col 12  -->
                            
                            <div> <!-- end row  -->

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Add Course">
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
                            <h5>Specification Title <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="text" name="spec_title[]" class="form-control">
                            </div>
                        </div>  
                    </div>  <!-- col-md-5//  -->

                    <div class="col-md-5">
                        <div class="form-group">
                            <h5>Specification Description <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="text" name="spec_desc[]" class="form-control">
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
    AJAX JS SCRIPT DEPENDANT DROPDOWN  
    ================================-->

    <script type="text/javascript">

        // DEPENDENT DROPDOWN FOR SUBCATEGORY  

        $('select[name="category_id"]').on('change', function(e) {
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{ url('/category/subcategories/ajax') }}/"+category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">'+ value.subcategory_name_fr +'</option>');
                        });
                    }, //End Of Retrieve Data
                }); //End Of Ajax Script
            } else {
                alert('danger');
            } //End Of Condition
        }); 

        // DEPENDENT DROPDOWN  FOR SUBSUBCATEGORY

        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="subsubcategory_id"]').html('');
                        var d =$('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_fr + '</option>');
                        });
                    }, //End Of Retrieve Data
                }); //End Of Ajax Script
            } else {
                alert('danger');
            } //End Of Condition
        });

    </script>

    <!--===============================
    JS SCRIPT TO PREVIEW THAMBNAIL IMAGE  
    ================================-->

    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }	
    </script>

    <!--===============================
    JS SCRIPT TO PREVIEW MULTI-IMAGE  
    ================================-->

    <script>
    
        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data
                    
                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                            .height(80); //create image element 
                                $('#preview_img').append(img); //append image to output element
                            };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });
                    
                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
        
    </script>

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