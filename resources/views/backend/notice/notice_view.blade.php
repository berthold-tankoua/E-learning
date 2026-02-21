@extends('admin.admin_master')

@section('admin')

@section('title')
E-learning | Notice
@endsection

  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
            <div class="row">

                <div class="col-8">
                    <div class="box">
                        <div class="box-header">						
                            <h4 class="box-title">Notice List</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Notice Links</th>
                                            <th>Status</th>
                                            <th style="text-align: center !important;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($notices as $item)
                                        <tr>
                                        <td><img src="{{ asset($item->notice_image) }}" style="width: 200px;height: 100px;"></td>
                                            <td>{{$item->notice_link}}</td>
                                            <td>
                                             @if($item->status == 1)
                                                <span class="badge badge-pill badge-success"> Active </span>
                                             @else
                                                <span class="badge badge-pill badge-danger"> InActive </span>
                                             @endif
                                            </td>
                                            <td width="10%" style="text-align: center !important;">
                                            <a href="{{route('notice.edit',$item->id)}}" class="btn btn-info" style="margin-bottom:5px"><i class="fa fa-pencil"></i></a>
                                            <a href="{{route('notice.delete',$item->id)}}" id="delete" class="btn btn-danger" style="margin-bottom:5px"><i class="fa fa-trash"></i></a>
                                            @if($item->status == 1)
                                                <a href="{{ route('notice.inactive',$item->id) }}" class="btn btn-danger btn-sm" title="Inactive Now" style="margin-bottom:5px"><i class="fa fa-arrow-down"></i> </a>
                                             @else
                                                <a href="{{ route('notice.active',$item->id) }}" class="btn btn-success btn-sm" title="Active Now" style="margin-bottom:5px"><i class="fa fa-arrow-up"></i> </a>
                                            @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!--========================================
                ADD BRAND SECTION 
                =========================================-->
                <div class="col-4">
                    <div class="box">
                        <div class="box-header">						
                            <h4 class="box-title">Add Notice </h4>
                        </div>
                        <div class="box-body">
                            <form action="{{route('notice.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf	

                                <div class="form-group">
                                    <h5>Select Product <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select id="select" name="product_id"  class="form-control">
                                            <option value="" selected disabled>Select Product</option>

                                        </select>
                                        @error('product_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>				
                                <div class="form-group">
                                    <h5>Notice link <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="notice_link" class="form-control" value="">
                                        @error('ytb_link')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                <h5>notice Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" id="image" name="notice_image" class="form-control">

                                    <img src="" alt="" id="showImg">

                                    @error('notice_image')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add"> 
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
      <!--===============================
    JS SCRIPT  
    ================================-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {

        $('#image').change(function(e) {

            var reader = new FileReader();
            
            reader.onload = function(e) {
                $("#showImg").attr("src", e.target.result).width(80).height(80);
            }

            reader.readAsDataURL(e.target.files[0]);

        });

        });

    </script>

@endsection