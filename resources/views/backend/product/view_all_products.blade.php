@extends('admin.admin_master')

@section('admin')

@section('title')
E-learning | All-Courses
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
    <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
        
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Product List <span class="badge badge-danger badge-pill">{{ count($products) }}</span> </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image </th>
                                            <th>Brand </th>
                                            <th>Category </th>
                                            <th>Course Name </th>
                                            <th>Selling Price </th>
                                            <th>Langue </th>
                                            <th>Status </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $item)
                                            <tr>
                                                <td> <img src="{{ asset($item->product_thambnail) }}" style="width: 100px; height: 60px;">  </td>
                                                <td>{{ $item->brand->brand_name_fr }}</td>
                                                <td>{{ $item->category->category_name_fr }}</td>
                                                <td>{{ $item->product_name_fr }}</td>
                                                @if($item->selling_price)
                                                <td>{{ $item->selling_price }} FCFA</td>
                                                @else
                                                <td class="text-center"><span class="badge badge-pill badge-success"> FREE </span></td>
                                                @endif
                                                <td>{{ $item->langue }}</td>
                                                <td>
                                                    @if($item->status == 1)
                                                        <span class="badge badge-pill badge-success"> Active </span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger"> InActive </span>
                                                    @endif
                                                </td>
                                                <td width="10%" style="text-align: center !important;">
                                                    <a href="{{ route('course.edit',$item->id) }}" class="btn btn-info btn-sm" style="margin-bottom:5px"><i class="fa fa-pencil" title="Edit Product"></i> </a>
                                                    <a href="{{ route('course.delete',$item->id) }}" class="btn btn-danger btn-sm" id="delete" style="margin-bottom:5px"><i class="fa fa-trash" title="Delete Product"></i></a>
                                                    @if($item->status == 1)
                                                        <a href="{{ route('course.inactive',$item->id) }}" class="btn btn-danger btn-sm" title="Inactive Now" style="margin-bottom:5px"><i class="fa fa-arrow-down"></i> </a>
                                                    @else
                                                        <a href="{{ route('course.active',$item->id) }}" class="btn btn-success btn-sm" title="Active Now" style="margin-bottom:5px"><i class="fa fa-arrow-up"></i> </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                             <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>


@endsection