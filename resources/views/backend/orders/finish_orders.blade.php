@extends('admin.admin_master')

@section('admin')

@section('title')
Marketplace | Finish-Orders
@endsection

    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
    <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
        
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Finish List <span class="badge badge-danger badge-pill">{{ count($orders) }}</span> </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th>Num</th>
                                        <th>Date </th>
                                        <th>Invoice </th>
                                        <th>Amount </th>
                                        <th>Payment </th>
                                        <th>Status </th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td> {{ $item->order_date }}  </td>
                                                <td> {{ $item->invoice_no }}  </td>
                                                <td> {{ $item->amount }} FCFA </td>
                                                <td> {{ $item->payment_method }} </td>
                                                <td> <span class="" style="background-color: teal;border-radius:5px;color:white;padding:5px;">{{ $item->status }} </span>  </td>
                                                <td width="10%" style="text-align: center !important;">
                                                    <a href="{{ route('pending.order.details', $item->id) }}" class="btn btn-info btn-sm" style="margin-bottom:5px"><i class="fa fa-eye" title="Order details"></i> </a>
                                                    <a href="" class="btn btn-danger btn-sm" id="delete" style="margin-bottom:5px"><i class="fa fa-trash" title="Delete Order"></i></a>
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