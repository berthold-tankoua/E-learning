@extends('frontend.main_master')

@section('content')

@section('title')
E-learning| compte
@endsection

<!-- ===== ======== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Acceuil</a></li>
				<li class='active'>Compte</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
		<div class='col-md-10'>
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#review">Informations</a></li>
								<li><a data-toggle="tab" href="#description">Mes Formations</a></li>
                                <li><a data-toggle="tab" href="#comment">Parametre</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
                                        <div class="row align-items-center">
                                            <div class="col-md-3 m-l-20">
                                                <img style="clip-path: circle();border:2px solid black;" src="{{ asset('frontend/images/testimonials/no_image.jpg') }}" width="100px" height="100px">
                                            </div>
                                            <div class="col-md-7">
                                                <p>Nom : <strong>{{Auth::user()->firstname}}</strong></p><br>
                                                <p>email : <strong>{{Auth::user()->email}}</strong></p><br>
                                                <p>phone : <strong>{{Auth::user()->phone}}</strong></p>
                                            </div>
                                        </div><br>
                                        <h1 class="text-center">PROGRESSION(S) SAUVEGARDEE(S) </h1><br>
                                        <div>
                                        <div class="col-md-12 my-wishlist">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            
                                                            <th>Lesson</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($courses as $i)
                                                        <tr>
                                                            <td>{{$i->created_at }}</td>
                                                            <td>{{$i->lesson->video_title}}</td>
                                                            @php
                                                            $product = App\Models\Product::where('id',$i->lesson->course_id)->get();
                                                            foreach($product as $item){
                                                                $slug=$item->product_slug_fr;
                                                            }
                                                            @endphp
                                                            <td><button><a href="{{ url('course/details/'.$i->lesson->course_id.'/'.$slug) }}">Consulter</a></button></td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>	
                                        </div>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
                                   <div class="product-tab">
                                   </div>	
								</div><!-- /.tab-pane -->

                                <div id="comment" class="tab-pane">
                                    <div class="product-tab">

                                    </div>	
								</div><!-- /.tab-pane -->
							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Formations gratuites </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs productslider-display" >
                    @php
                      $new_products = App\Models\Product::where('type', 0)->orderBy('id','DESC')->get();
                    @endphp
                    @foreach($new_products as $product)
                    <div class="item item-carousel ">
                        <div class="products">
                        <div class="product" onclick="GetCourseId(this.id)" id="{{$product->id}}">
                            <div class="product-image">
                            <div class="image"> <a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}"><img  src="{{ asset($product->product_thambnail) }}" class="pimage" ></a> </div>
                            <!-- /.image -->
                            <!-- <div class="tag hot"><span>-30%</span></div> -->
                            </div>
                            <!-- /.product-image -->
                            <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}">{{ $product->product_name_fr }}</a></h3>
                            <div style="display:flex;align-items:center;">
                            <div class="rating rateit-small"></div>
                            <p style="margin-left: 10px;">Avis (<span>{{ $product->avis }}</span>)</p>
                            </div> 
                            <div class="description"></div>
                            <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation</span> </div>
                            <!-- /.product-price --> 
                            
                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)" title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}" title="Voir plus"> <i class="fa fa-eye" aria-hidden="true"></i> </a> </li>
                                </ul>
                            </div>
                            <!-- /.action --> 
                            </div>
                            <!-- /.cart --> 
                        </div>
                        <!-- /.product --> 
                        </div>
                        <!-- /.products --> 
                    </div>
                    <!-- /.item --> 
                    @endforeach 
            <!-- /.item -->
          </div>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs mblproduct">
            @php
                $progs = App\Models\Category::orderBy('id', 'DESC')->get();
            @endphp
            @foreach($progs as $item)
                <div class="item item-carousel ">
                    <div class="products" style="display: flex;">
                            @php
                            $new_products = App\Models\Product::where('status', 1)->where('type', 0)->orderBy('id','DESC')->limit(2)->get();
                            @endphp
                            @foreach($new_products as $product)
                            <div class="product product-modif" onclick="GetCourseId(this.id)" id="{{$product->id}}">
                                <div class="product-image">
                                <div class="image"> <a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}"><img  src="{{ asset($product->product_thambnail) }}" class="pimage"></a> </div>
                                <!-- /.image -->
                                <!-- <div class="tag new"><span>new</span></div> -->
                                </div>
                                <!-- /.product-image -->
                                <div class="product-info text-left">
                                <h3 class="name"><a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}">{{ $product->product_name_fr }}</a></h3>
                                <div style="display:flex;align-items:center;">
                                <div class="rating rateit-small"></div>
                                <p style="margin-left: 10px;">Avis (<span>{{ $product->avis }}</span>)</p>
                                </div> 
                                <div class="description"></div>
                                <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation </span> </div>
                                <!-- /.product-price --> 
                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                    <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
                                    <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}" title="Voir plus"> <i class="fa fa-eye" aria-hidden="true"></i> </a> </li>
                                    </ul>
                                </div>
                                <!-- /.action --> 
                                </div>
                                <!-- /.cart --> 
                            </div>
                            <!-- /.product --> 
                            @endforeach

                </div>
                            <!-- /.products --> 
                </div>          
                <!-- /.item -->
            @endforeach
          </div>
          <!-- /.home-owl-carousel --> 
                </section><!-- /.section -->
                <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
                            
		</div><!-- /.col -->
	<div class="clearfix"></div>
</div><!-- /.row -->

<!-- == = BRANDS CAROUSEL : END = -->	</div><!-- /.container -->
</div><!-- /.body-content -->



@endsection