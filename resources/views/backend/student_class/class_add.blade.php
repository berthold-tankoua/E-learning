@extends('admin.admin_master')

@section('admin')

@section('title')
Garderie | Add-class
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">

            <div class="box-header with-border">
                <h4 class="box-title">Ajouter une Salle de classe </h4>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('add.std_class.store') }}" method="POST" >
                            
                            @csrf

                            <div class="row">

                                <div class="col-12">	

                                    <div class="row"> <!-- start 1st row  -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Nom de la classe <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" placeholder="Entrer le nom de la classe">
                                                    @error('name') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                    
                                        </div> <!-- end col md 6 -->
                                    
                                    </div> <!-- end 2nd row  -->

                                    <hr>

                                </div> <!-- end col 12  -->
                            
                            <div> <!-- end row  -->

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Ajouter">
                            </div>

                        </form> <!-- end form -->

                    <div> <!-- end col  -->
                <div> <!-- end row  -->

            <div> <!-- end box-body  -->

        <div> <!-- end box  -->
        
    </section> <!-- end section  -->

<div><!-- end section  -->

@endsection
