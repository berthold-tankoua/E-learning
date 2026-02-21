@extends('admin.admin_master')

@section('admin')

@section('title')
Marketplace | Add-Product
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">

            <div class="box-header with-border">
                <h4 class="box-title">Ajouter un Utilisateur </h4>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('add.users.store') }}" method="POST" enctype="multipart/form-data">
                            
                            @csrf

                            <div class="row">

                                <div class="col-12">	

                                    <div class="row"> <!-- start 1st row  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Nom <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="firstname" class="form-control" placeholder="Entrer le nom">
                                                    @error('firstname') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                    
                                        </div> <!-- end col md 6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Prenom <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="lastname" class="form-control" placeholder="Entrer le prenom">
                                                    @error('lastname') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                    
                                        </div> <!-- end col md 6 -->
                                    
                                    </div> <!-- end 2nd row  -->

                                    <div class="row"> <!-- start 3RD row  -->
                        

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Email <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control" value="email@gmail.com" >
                                                    @error('email') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Telephone <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="phone" class="form-control" value="+237" >
                                                    @error('phone') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Mot de passe <span class="text-danger">(optionnel)</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="password" class="form-control" placeholder="********" >
                                                    @error('password') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                    </div> <!-- end 5th row  -->

                                    <div class="row"> <!-- start 6th row  -->
                            
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Photo profil <span class="text-danger">(optionnel)</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="profil_pic" class="form-control" onChange="mainThamUrl(this)" >
                                                    @error('profil_pic') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <img src="" id="mainThmb">
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Genre <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="sex" class="form-control"  >
                                                        <option value="" selected disabled="">choisir une valeur</option>
                                                        <option value="M">homme</option>
                                                	    <option value="F">femme</option>
                                                    </select>
                                                    @error('sex') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror 
                                                </div>
                                            </div>                                              
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Role <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="user_role" class="form-control" placeholder="Ex: professeur, parent, gardien">
                                                    @error('user_role') 
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                    </div> <!-- end 6th row  -->
                        
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