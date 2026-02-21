@extends('admin.admin_master')

@section('admin')

@section('title')
Garderie | Users
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
				  <h3 class="box-title">Utilisateur(s) <span class="badge badge-danger badge-pill">{{ count($users) }}</span> </h3>
                  <a class="btn btn-rounded btn-info" href="{{route('add.users.view')}}" style="float: right;">Ajouter un Utilisateur</a>
				  <h6 class="box-subtitle">Exporter les données en : CSV, Excel, PDF & Imprimer</h6>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                            <thead>
                                <tr>
                                <th>SL</th>
                                <th>Photo</th>
                                <th>Nom </th>
                                <th>Prenom </th>
                                <th>Email </th>
                                <th>Phone </th>
                                <th>Role </th>
                                <th>Status </th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $item)
                                    <tr>
                                        <td width="2%">{{$key+1}}</td>
                                        @if($item->profil_pic == NULL)
                                        <td> <img src="{{ asset('no_image.jpg') }}" style="width: 60px; height: 50px;">  </td>
                                        @else
                                        <td> <img src="{{ asset($item->profil_pic) }}" style="width: 60px; height: 50px;">  </td>
                                        @endif
                                        <td>{{ $item->firstname }}</td>
                                        <td>{{ $item->lastname }}</td>
                                        <td>{{ $item->email }}</td>
                                            
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->user_role }}</td>
                                        <td>
                                        @if($item->status == "1")
                                         <span class="badge badge-pill badge-success"> Active </span>
                                        @else
                                         <span class="badge badge-pill badge-danger"> InActive </span>
                                        @endif
                                        </td>
                                        <td width="55%" style="text-align: center !important;display:flex;flex-direction:column;justify-content:center;">
                                         <a href="{{ route('users.edit',$item->id) }}" class="btn btn-info btn-sm" style="margin-bottom:5px"><i class="fa fa-pencil" title="Edit user"></i> </a>
                                         <a href="{{ route('users.delete',$item->id) }}" class="btn btn-danger btn-sm" id="delete" style="margin-bottom:5px"><i class="fa fa-trash" title="Delete user"></i></a>
                                         @if($item->status == 1)
                                            <a href="{{ route('users.inactive',$item->id) }}" class="btn btn-danger btn-sm" title="Inactive Now" style="margin-bottom:5px"><i class="fa fa-arrow-down"></i> </a>
                                         @else
                                         <a href="{{ route('users.active',$item->id) }}" class="btn btn-success btn-sm" title="Active Now" style="margin-bottom:5px"><i class="fa fa-arrow-up"></i> </a>
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