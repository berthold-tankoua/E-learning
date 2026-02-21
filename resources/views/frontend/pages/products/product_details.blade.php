@extends('frontend.main_master')

@section('content')

@section('title')
E-learning| {{ $product->product_name_fr }}
@endsection

<!-- ===== ======== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Acceuil</a></li>
				<li><a href="{{ url('course/categories/'.$product->category->id.'/'.$product->category->category_slug_fr) }}">{{ $product->category->category_name_fr }}</a></li>
				<li class='active'>{{ $product->product_name_fr }}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
		<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp"> 
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <div id="owl-single-product">
                                    <div class="single-product-gallery-item" id="slide1">
                                        <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($product->product_thambnail) }}">
                                            <img class="img-responsive" alt="" src="{{ asset($product->product_thambnail) }}" data-echo="{{ asset($product->product_thambnail) }}" />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->

                                </div><!-- /.single-product-slider -->

                            </div><!-- /.single-product-gallery -->
                            <br>
                            @if($product->type ===0)
                            <div class="product-item-holder size-big single-product-gallery small-gallery ytb-linkmbl">
                                <div id="owl-single-product">
                                    <div class="single-product-gallery-item" id="slide1">
                                    <iframe style="height: 200px !important;width:100% !important;"
                                              src="https://www.youtube.com/embed/{{$product->video_link}}?autoplay=0">
                                              </iframe>
                                    </div><!-- /.single-product-gallery-item -->

                                </div><!-- /.single-product-slider -->
                            </div><!-- /.single-product-gallery -->
                            @endif
                        </div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name" style="font-size: 25px !important;" id="pname">{{ $product->product_name_fr }}</h1>
							<input type="hidden" id="course_id" value="{{$product->id}}">
							<div class="rating-reviews m-t-15">
								<div class="details_header" style="display: flex;">
										<div class="rating rateit-small"></div>
										<div class="reviews">
											<a href="#" class="lnk">Avis ({{ $product->avis }})</a>
										</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->
                            <div class="rating-reviews m-t-10">
								<div class="details_header" style="display: flex;">
										<div class=""><i class="fa fa-globe"></i></div>
										<div class="reviews">
											<a href="#" class="lnk">{{ $product->langue }}</a>
										</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->
                            <div class="rating-reviews m-t-10">
								<div class="details_header" style="display: flex;">
										<div class=""><i class="fa fa-book"></i></div>
										<div class="reviews">
											<a href="#" class="lnk">{{ $product->brand->brand_name_fr }} | Formation</a>
										</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->


							<div class="description-container m-t-20">
                            {!! $product->short_descp_fr !!}
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									@if($product->type!=0)
									<div class="col-sm-6">
										<div class="price-box">
											<span class="price">{{ $product->selling_price }} FCFA</span>
											<!-- <span class="price-strike">$900.00</span> -->
										</div>
									</div>
                                    @endif
									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" id="{{$product->id}}" onclick="addToWishlist(this.id)" data-toggle="tooltip" data-placement="right" title="Favoris" >
											    <i class="fa fa-heart"></i>
											</a>
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->

                            @if($product->type!=0)
							<div class="quantity-container info-container">
								<div class="row" style="display: flex !important;">

                                  <div class="col-sm-6">
										<a target="_blank" rel="noopener noreferrer" href="https://wa.me/+237694011998/?text= Je souhaite commander la formation : {{$product->product_name_fr}}" class="btn btn-success"><i class="fa fa-phone inner-right-vs"></i> Commander</a>
									</div>
									<div class="col-sm-6">
										<a onclick="addToCarts()" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> Ajouter au Panier</a>
									</div>

									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->
                            @endif
							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
            </div>
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#review">PROGRAMMES</a></li>
								<li><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                <li><a data-toggle="tab" href="#comment">COMMENTAIRES</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane">
									<div class="product-tab">
										<p class="text">
                                        {!! $product->long_descp_fr !!}
                                        </p>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane in active">
									<div class="product-tab">
                                       @auth
                                       @if($product->type == 0)
                                        <div class="m-t-20 text-center" style="font-size: 15px;">
                                         <p>Cher <strong class="link" >{{ Auth::user()->firstname }}</strong> votre progression sera sauvegardé</p>
                                        </div>
                                        @else
                                        <div class="m-t-20 text-center" style="font-size: 15px;">
                                         <p>Cher <strong class="link" >{{ Auth::user()->firstname }}</strong> Bienvenue</p>
                                        </div>
                                        @endif
                                       @else
                                        @if($product->type == 0)
                                        <div class="m-t-20 text-center" style="font-size: 15px;">
                                         <p>Veuillez vous connecter pour sauvegarder votre progression </p>
                                         <a class="link" style="font-weight: bold;cursor:pointer;" type="button" data-toggle="modal" data-target="#exampleModalCenter3"  data-placement="top">se connecter</a>
                                        </div>
                                        @else
                                        <div class="m-t-20 text-center" style="font-size: 15px;">
                                         <p>Veuillez vous connecter pour afficher la séssion </p>
                                         <a class="link" style="font-weight: bold;cursor:pointer;" type="button" data-toggle="modal" data-target="#exampleModalCenter3"  data-placement="top">se connecter</a>
                                        </div>
                                        @endif
                                        @endauth
                                        @php
                                         $lessons = App\Models\Lesson::where('course_id', $product->id)->orderBy('id','ASC')->get();
                                        @endphp
                                        @if($product->type !=1)
                                            @foreach($lessons as $key => $item)
                                            <div class=" m-t-20" >
                                                <div id="{{$item->id}}" class="details_lecon" style="display: flex;align-items:center ! important;justify-content:flex-end;">
                                                        <!-- <div style="margin-left:10px;width:30px;">{{ $key+1 }}</div> -->
                                                        <div style="display:flex;flex-direction:column;cursor:progress;align-items:center" title="Cliquer sur Play pour lire la vidéo">
                                                            <p class="ytblesson-name">{{$key+1}} - {{$item->video_title}} </p>
                                                            @php
                                                            $get_last_check = App\Models\UserSuivi::where('lesson_id', $item->id)->where('user_id', Auth::id())->get();
                                                            @endphp
                                                            @if(count($get_last_check)>=1)
                                                            <span class="badge badge-pill badge-success" style="background-color: green;width:25%"> Vous etes ici </span>
                                                            @endif
                                                        </div>
                                                        <div  style="font-size: 25px;margin-right:20px;cursor:pointer;" title="voir vidéo">
                                                            <a type="button" onclick="GetvideoLink(this.id)" id="{{$item->video_id}}"  data-toggle="modal" data-target="#exampleModalCenter2"  data-placement="top" title="Voir Video" >
                                                            <i  class="fa fa-play-circle"></i>
                                                            <input type="hidden" class="get_lesson_id" value="{{$item->id}}">
                                                            </a>
                                                        </div>
                                                </div><!-- /.row -->		
                                            </div><!-- /.rating-reviews -->
                                            @endforeach
                                        @else
                                           @php
                                               $order_check = App\Models\Order::where('user_id', Auth::id())->get();
                                               foreach($order_check as $val){
                                                $orderItem_check = App\Models\OrderItem::where('order_id', $val->id)->where('product_id', $product->id)->get();
                                               }
                                            @endphp
                                            @if(count($order_check)>=1 && count($orderItem_check)>=1)
                                            <div style="display: flex;justify-content:center;flex-direction:column;text-align:center;">
                                                <div class="m-t-20">
                                                <i  class="fa fa-play" style="font-size: 50px;"></i>
                                                </div>
                                                <p class="m-t-20">Cliquer sur le lien ci dessous pour avoir acces à la formation</p>
                                                <div class="col-md-12  m-t-20">
                                                <a class="btn-upper btn btn-primary checkout-page-button" target="_blank" rel="noopener noreferrer" href="{{$product->video_link}}">Acceder au cours</a>
                                                </div>
                                            </div>
                                            @else
                                            <div style="display: flex;justify-content:center;flex-direction:column;text-align:center;">
                                                <div class="m-t-20">
                                                <i  class="fa fa-lock" style="font-size: 50px;"></i>
                                                </div>
                                                <p class="m-t-20">Veuillez Acheter la formation pour avoir acces au Cours ou vous faire livrer la formation à domicile</p>
                                                <div class="col-md-12  m-t-20">
                                                <a class="btn-upper btn btn-primary checkout-page-button" target="_blank" rel="noopener noreferrer" href="https://wa.me/+237694011998/?text= Je souhaite commander la formation : {{$product->product_name_fr}}">Commander</a>
                                                </div>
                                            </div>
                                            @endif
                                        @endif

							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

                                <div id="comment" class="tab-pane">
									<div class="product-tab">
                                        <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Laisser un Commentaire</h4>
                                                   
                                                </div>
                                                @if(Auth::check())
                                                @else
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
                                                        <input type="text" id="rname" class="form-control unicase-form-control text-input"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                                        <input type="email" id="remail" class="form-control unicase-form-control text-input"  placeholder="">
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                        <label class="info-title" for="exampleInputComments">Votre Commentaire <span>*</span></label>
                                                        <textarea class="form-control unicase-form-control" id="rcomment"  ></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12  m-t-20">
                                                    <button type="submit" onclick="StoreCourseReview()" class="btn-upper btn btn-primary checkout-page-button">Commenter</button>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="blog-review wow fadeInUp">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="title-review-comments" ><span id="reviewcount"></span> Commentaire(s)</h3>
                                                </div><br>
                                                <div class="col-md-10 col-sm-10 blog-comments outer-bottom-xs">
                                                    @php
                                                    $lessons = App\Models\Comment::where('course_id', $product->id)->orderBy('id','DESC')->get();
                                                    @endphp
                                                    @foreach($lessons as $item)
                                                    <div class="blog-comments inner-bottom-xs">
                                                        <h4>{{$item->name}}</h4>
                                                        <p style="border:2px black solid;border-radius:5px;padding:15px;">{{$item->comment}}</p>
                                                        <span class="review-action pull-right">
                                                        {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                        </span>
                                                    </div>
                                                    @endforeach
                                                    
                                                </div>
                    
                                                <!-- <div class="post-load-more col-md-12"><a class="btn btn-upper btn-primary" href="#">Load more</a></div> -->
                                            </div>
                                        </div>
									</div>	
								</div><!-- /.tab-pane -->
							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Formations gratuites similaires</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs productslider-display" >
                    @php
                      $new_products = App\Models\Product::where('category_id', $product->category_id)->where('type', 0)->orderBy('id','DESC')->get();
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
                            $progs = App\Models\SubCategory::where('category_id', $product->category_id)->get();
                        @endphp
                        @foreach($progs as $item)
                            <div class="item item-carousel ">
                                <div class="products" style="display: flex;">
                                        @php
                                        $new_products = App\Models\Product::where('status', 1)->where('type', 0)->where('subcategory_id', $item->id)->orderBy('id','DESC')->limit(2)->get();
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
        <div class='col-md-3 sidebar'>
			<div class="sidebar-module-container">  
                    <!-- ============================================== HOT DEALS ============================================== -->
            <div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
                <h3 class="section-title">Ce cours Comprend</h3>
                <div class="rating-reviews m-t-10">
					<div class="details_header" style="display: flex;">
						<div style="font-size: 20px;"><i class="fa fa-tablet"></i></div>
						<div class="reviews">
							Disponible sur mobile & ordinateur
						</div>
					</div><!-- /.row -->		
				</div><!-- /.rating-reviews -->
                <div class="rating-reviews m-t-10">
					<div class="details_header" style="display: flex;align-items:center;">
						<div style="font-size: 20px;"><i class="fa fa-file-pdf-o"></i></div>
						<div class="reviews">
							Support de cours pdf
						</div>
					</div><!-- /.row -->		
				</div><!-- /.rating-reviews -->
                @if($product->type = 0)
                <div class="rating-reviews m-t-10">
					<div class="details_header" style="display: flex;align-items:center;">
						<div style="font-size: 20px;"><i class="fa fa-youtube-play"></i></div>
						<div class="reviews">
							Formation Youtube
						</div>
					</div><!-- /.row -->		
				</div><!-- /.rating-reviews -->
                <div class="rating-reviews m-t-10">
					<div class="details_header" style="display: flex;align-items:center;">
						<div style="font-size: 20px;"><i class="fa fa-graduation-cap"></i></div>
						<div class="reviews">
							Pas de certificat de fin formation
						</div>
					</div><!-- /.row -->		
				</div><!-- /.rating-reviews -->
                @else
                <div class="rating-reviews m-t-10">
					<div class="details_header" style="display: flex;align-items:center;">
						<div style="font-size: 20px;"><i class="fa fa-youtube-play"></i></div>
						<div class="reviews">
							Formation de Qualité
						</div>
					</div><!-- /.row -->		
				</div><!-- /.rating-reviews -->
                <div class="rating-reviews m-t-10">
					<div class="details_header" style="display: flex;align-items:center;">
						<div style="font-size: 20px;"><i class="fa fa-graduation-cap"></i></div>
						<div class="reviews">
							Certificat de fin formation
						</div>
					</div><!-- /.row -->		
				</div><!-- /.rating-reviews -->
                @endif

            </div>
            <!-- ============================================== HOT DEALS: END ============================================== -->					

            <!-- ============================================== Testimonials============================================== -->
            <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                <div id="advertisement" class="advertisement">
                        <div class="item">
                    <div class="avatar"><img src="{{ asset('frontend/images/testimonials/no_image.jpg') }}" alt="Image"></div>
                    <div class="testimonials"><em>"</em> Superbe Formation en Photoshop structurée et gratuite .<em>"</em></div>
                    <div class="clients_author">Naomi Joyce <span>Etudiante</span> </div>
                    <!-- /.container-fluid --> 
                    </div>
                    <!-- /.item -->
                    
                    <div class="item">
                    <div class="avatar"><img src="{{ asset('frontend/images/testimonials/no_image.jpg') }}" alt="Image"></div>
                    <div class="testimonials"><em>"</em>J'ai acheté une formation en programmation et maintenant je developpe des sites web sans avoir eu besoin de stage<em>"</em></div>
                    <div class="clients_author">William <span>Etudiant</span> </div>
                    </div>
                    <!-- /.item -->
                </div><!-- /.owl-carousel -->
            </div>
			</div>
		</div><!-- /.sidebar -->
	<div class="clearfix"></div>
</div><!-- /.row -->

<!-- == = BRANDS CAROUSEL : END = -->	</div><!-- /.container -->
</div><!-- /.body-content -->

@include('frontend.modals.youtube_modal')
@include('frontend.modals.login_modal')

<script type="text/javascript">

    function GetvideoLink(ytblink){

        var link=ytblink;
        $("#video")[0].src = "https://www.youtube.com/embed/" + link;

        var get_lesson_id=0;
        var youtube_video = document.getElementById(link);
        get_lesson_id = youtube_video.querySelector(".get_lesson_id").value;

        console.log(get_lesson_id);

        $.ajax({
				type:'POST',
				url: "{{ url('/lesson-suivi') }}/"+get_lesson_id,
				dataType:'json',
				success:function(data){
	
					// start
					const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
					})

					if($.isEmptyObject(data.error)){
						Toast.fire({
							type: 'success',
							icon: 'success',
							title: data.success
						})
					}else{
						Toast.fire({
							type: 'error',
							icon: 'error',
							title: data.error
						})
					}

				}
		});
        
	}
</script>
<script>
        var course_id = document.getElementById('course_id').value;
    </script>

@endsection