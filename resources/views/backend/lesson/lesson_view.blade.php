@extends('admin.admin_master')

@section('admin')

@section('title')
E-learning | Lesson
@endsection

  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
            <div class="row">

                <div class="col-12">
                    <div class="box">
                        <div class="box-header">						
                            <h4 class="box-title">Lesson List</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Course</th>
                                            <th>Videos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($courses as $item)
                                        <tr>
                                            <td>{{$item->product_name_fr}}</td>
                                            
                                            @php
                                                $lessons = App\Models\Lesson::where('course_id',$item->id)->orderBy('id','ASC')->get();
                                            @endphp
                                            @if(count($lessons)>=1)
                                            <td style="display: flex;flex-direction:column;height:200px;overflow-y:scroll;">
                                             @foreach($lessons as $i)
                                              <div style="display: flex;margin-bottom:7px;">
                                              <iframe style="height: 100px !important;width:125px !important;"
                                                src="https://www.youtube.com/embed/{{$i->video_id}}?autoplay=0">
                                              </iframe>
                                                <p style="margin-left: 15px;width:100px;">{{$i->video_title}}</p>
                                              </div>
                                            @endforeach
                                            </td>
                                            @else
                                                <td>None Lesson</td>
                                            @endif
                                           

                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
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