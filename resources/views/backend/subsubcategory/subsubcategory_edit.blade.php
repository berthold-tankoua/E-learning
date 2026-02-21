@extends('admin.admin_master')

@section('admin')

@section('title')
E-learning | Sub-Subcategory
@endsection

    <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">

                        <div class="box-header">						
                            <h4 class="box-title">Edit Sub-Subcategory </h4>
                        </div>

                        <div class="box-body">

                            <form action="{{ route('subsubcategory.update') }}" method="POST">

                                <input type="hidden" name="id" value="{{$subsubcategory->id}}">

                                @csrf

                                
                                
                                <div class="form-group">
                                    <h5>Select Category <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select id="select" name="category_id" required class="form-control">
                                            <option value="" selected="" >Select Category</option>
                                            @foreach($categories as $item)
                                                <option value="{{$item->id}}" {{$item->id == $subsubcategory->category_id ? 'selected' : ''}}>{{$item->category_name_fr}} </option>
                                            @endforeach
                                        </select>
                                    </div> 
                                </div>	

                                <div class="form-group">
                                    <h5>Select SubCategory <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select id="select" name="subcategory_id" class="form-control">
                                            <option value="" selected disabled>Select SubCategory</option>
                                            @foreach($subcategories as $item)
                                                <option value="{{$item->id}}" {{$item->id == $subsubcategory->subcategory_id ? 'selected' : ''}}> {{$item->subcategory_name_fr}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>	

                                <div class="form-group">
                                    <h5>Sub-SubCategory Name FR <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subsubcategory_name_fr" class="form-control" value="{{$subsubcategory->subsubcategory_name_fr}}">
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update"> 
                                </div>

                            </form>
                            <!-- /.form -->

                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
		    <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>

  <!-- /.content-wrapper -->

@endsection