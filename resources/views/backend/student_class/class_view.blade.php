@extends('admin.admin_master')

@section('admin')

@section('title')
Garderie | Student-class
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
				  <h3 class="box-title">Classe(s) <span class="badge badge-danger badge-pill">{{ count($datas) }}</span> </h3>
                  <a class="btn btn-rounded btn-info" href="{{route('add.std_class.view')}}" style="float: right;">Ajouter une classe</a>
				  <h6 class="box-subtitle">Exporter les données en : CSV, Excel, PDF & Imprimer</h6>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                            <thead>
                                <tr>
                                <th>SL</th>
                                <th>Nom </th>
                                <th>Status </th>
                                <th width="11%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $key => $item)
                                    <tr>
                                        <td>{{$key+1}}</td>

                                        <td>{{ $item->name }}</td>

                                        <td class="text-center">
                                        @if($item->status == "1")
                                         <span class="badge badge-pill badge-success"> Active </span>
                                        @else
                                         <span class="badge badge-pill badge-danger"> InActive </span>
                                        @endif
                                        </td>
                                        <td  style="text-align: center !important;display:flex;">
                                         <a href="{{ route('std_class.edit',$item->id) }}" class="btn btn-info btn-sm" style="margin-right:7px"><i class="fa fa-pencil" title="Edit class"></i> </a>
                                         <a href="{{ route('std_class.delete',$item->id) }}" class="btn btn-danger btn-sm" id="delete" style="margin-right:7px"><i class="fa fa-trash" title="Delete class"></i></a>
                                         @if($item->status == 1)
                                            <a href="{{ route('std_class.inactive',$item->id) }}" class="btn btn-danger btn-sm" title="Inactive Now" style="margin-right:7px"><i class="fa fa-arrow-down"></i> </a>
                                         @else
                                         <a href="{{ route('std_class.active',$item->id) }}" class="btn btn-success btn-sm" title="Active Now" style="margin-right:7px"><i class="fa fa-arrow-up"></i> </a>
                                         @endif
                                         </td>
                                    </tr>
                                @endforeach
                            </tbody>
					    </table>
					</div>              
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