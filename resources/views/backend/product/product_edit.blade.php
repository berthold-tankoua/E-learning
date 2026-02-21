@extends('admin.admin_master')

@section('admin')

@section('title')
Marketplace | Products
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


	<div class="container-full">
	<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">

		    <!-- Basic Forms -->
		    <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Edit course </h4>
                </div>
			    <!-- /.box-header -->

                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('course.update') }}" enctype="multipart/form-data" >
                                
                                @csrf

                                <div class="row">

                                    <div class="col-12">	
                                      <input type="hidden" name="id" value="{{$product->id}}">

                                        <div class="row"> <!-- start 1st row  -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" class="form-control"  >
                                                            <option value="" selected="" disabled="">Select Brand</option>
                                                            @foreach($brands as $brand)
                                                                <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected': '' }} >{{ $brand->brand_name_fr }}</option>	
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
                                                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected': '' }} >{{ $category->category_name_fr }}</option>	
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
                                                            @foreach($subcategory as $sub)
                                                                <option value="{{ $sub->id }}" {{ $sub->id == $product->subcategory_id ? 'selected': '' }} >{{ $sub->subcategory_name_fr }}</option>	
                                                            @endforeach
                                                        </select>
                                                        @error('subcategory_id') 
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror 
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 1st row  -->

                                        <div class="row"> <!-- start 2nd row  -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subsubcategory_id" class="form-control"  >
                                                            <option value="" selected="" disabled="">Select SubSubCategory</option>
                                                            @foreach($subsubcategory as $subsub)
                                                                <option value="{{ $subsub->id }}" {{ $subsub->id == $product->subsubcategory_id ? 'selected': '' }} >{{ $subsub->subsubcategory_name_fr }}</option>	
                                                            @endforeach
                                                        </select>
                                                        @error('subsubcategory_id') 
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror 
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 4 -->
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <h5>Product Name Fr <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_fr" class="form-control" value="{{$product->product_name_fr}}">
                                                        @error('product_name_fr') 
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 2nd row  -->

                                        <div class="row"> <!-- start 4th row  -->
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags Fr <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_fr" class="form-control" value="{{$product->product_tags_fr}}" data-role="tagsinput" >
                                                        @error('product_tags_hin') 
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 4th row  -->

                                        <div class="row"> <!-- start 5th row  -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_price" class="form-control" value="{{$product->selling_price}}">
                                                        @error('selling_price') 
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 4 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount_price" class="form-control"  value="{{$product->discount_price}}">
                                                        @error('discount_price') 
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 5th row  -->

                                        <div class="row"> <!-- start 6th row  -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Main Thambnail <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="hidden" name="old_image" class="form-control" value="{{$product->product_thambnail}}">
                                                        <input type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)"  >
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
                                                        {!!$product->long_descp_fr!!}
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
                                                        <textarea id="editor2" name="long_descp_fr" rows="10" cols="80">
                                                        {!!$product->long_descp_fr!!}
                                                        </textarea>       
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 6 --> 

                                        </div> <!-- end 7th row  -->

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

                                    </div> <!-- end col-12  -->

                                </div>
                                <!-- end row -->

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
                                </div>

                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

		</section>
	    <!-- /.content -->
	</div>


    <!--===============================
    AJAX JS SCRIPT DEPENDANT DROPDOWN  
    ================================-->

    <script type="text/javascript">

        // DEPENDENT DROPDOWN FOR SUBCATEGORY
        
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('select[name="subsubcategory_id"]').html('');
                        var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_fr + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
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
                        var d =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_fr + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
    
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




@endsection