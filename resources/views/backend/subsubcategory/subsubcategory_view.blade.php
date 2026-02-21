@extends('admin.admin_master')

@section('admin')

@section('title')
E-learning | Sub-Subcategory
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <!-- Content Wrapper. Contains page content -->

        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">
                        <div class="box">
                            <div class="box-header">						
                                <h4 class="box-title">Sub-SubCategory List <span class="badge badge-danger badge-pill">{{ count($subsubcategories) }}</span></h4>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Category </th>
                                                <th>SubCategory</th>
                                                <th>Sub-SubCategory En</th>
                                                <th>Sub-SubCategory Fr</th>
                                                <th style="text-align: center !important;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($subsubcategories as $item)
                                            <tr>
                                            <td>{{$item['category']['category_name_fr']}}</td>
                                                <td>{{$item['subcategory']['subcategory_name_fr']}}</td>
                                                <td>{{$item->subsubcategory_name_fr}}</td>
                                                <td>{{$item->subsubcategory_name_fr}}</td>
                                                <td style="text-align: center !important;">
                                                <a href="{{route('subsubcategory.edit',$item->id)}}" class="btn btn-info" style="margin-bottom: 5px;" ><i class="fa fa-pencil" title="Edit SubSubCategory"></i></a>
                                                <a href="{{route('subsubcategory.delete',$item->id)}}" id="delete" class="btn btn-danger" ><i class="fa fa-trash" title="Delete SubSubCategory"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--===========================================
                    Add Sub-SubCategory Section
                    ============================================--}}
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header">						
                                <h4 class="box-title">Add Sub-SubCategory </h4>
                            </div>
                            <div class="box-body">
                                <form action="{{route('subsubcategory.store')}}" method="POST">
                                    @csrf
                                        <div class="form-group">
                                            <h5>Select Category <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select id="select" name="category_id" class="form-control">
                                                    <option value="" selected disabled>Select Category</option>
                                                    @foreach($categories as $item)
                                                        <option value="{{$item->id}}">{{$item->category_name_fr}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <h5>Select SubCategory <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select id="select" name="subcategory_id" class="form-control">
                                                    <option value="" selected disabled>Select SubCategory</option>
                                                    @error('subcategory_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </select>
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                            <h5>Sub-SubCategory Name FR <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subsubcategory_name_fr" class="form-control" value="">
                                                @error('subsubcategory_name_fr')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add"> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /.row -->
            </section>
            <!-- /.content -->
        
        </div>

    <!-- /.content-wrapper -->

    <!--===============================
    JS SCRIPT  
    ================================-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">

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

    </script>
@endsection