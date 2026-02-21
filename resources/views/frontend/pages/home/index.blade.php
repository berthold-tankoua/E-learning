@extends('frontend.main_master')

@section('content')

@section('title')
E-learning | Acceuil
@endsection
<div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        
        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
              @php
                $categories = App\Models\Category::orderBy('category_name_fr','ASC')->get();
              @endphp
              @foreach($categories as $category)
                <!-- /.menu-item -->           
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{$category->category_icon}}" aria-hidden="true"></i>{{$category->category_name_fr}}</a> 
                <!-- ================================== MEGAMENU VERTICAL ================================== -->
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                      @php
                        $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('id','ASC')->get();
                      @endphp
                      @foreach($subcategories as $subcategory)
                      <div class="col-xs-12 col-sm-12 col-lg-4">
                        <ul>
                          <li><a href="{{ url('course/subcategories/'.$subcategory->id.'/'.$subcategory->subcategory_slug_fr) }}">{{$subcategory->subcategory_name_fr}}</a></li>
                        </ul>
                      </div>
                      @endforeach
                      <!-- <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="{{ asset('frontend/images/banners/banner-side.png') }}" /></a> </div> -->
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> 
                <!-- ================================== MEGAMENU VERTICAL ================================== -->
              </li>
              @endforeach
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
         
        <!-- ============================================== PRODUCT TAGS ============================================== -->
        <div class="sidebar-widget product-tag wow fadeInUp">
          <h3 class="section-title">Tags</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="tag-list">
            @php
              $categories = App\Models\Category::orderBy('category_name_fr','ASC')->limit(8)->get();
            @endphp
                @foreach($categories as $category)
            <a class="item @if($category->id==1) active @endif" title="{{$category->category_name_fr}}" href="{{ url('course/categories/'.$category->id.'/'.$category->category_slug_fr) }}">{{$category->category_name_fr}} </a>
            @endforeach
          </div>
            <!-- /.tag-list --> 
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== PRODUCT TAGS : END ============================================== --> 
        <!-- ============================================== SPECIAL DEALS ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Les plus visitées</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
            @php
                $progs = App\Models\Category::get();
            @endphp
            @foreach($progs as $item)
              <div class="item">
                <div class="products special-product">
                @php
                            $new_products = App\Models\Product::where('status', 1)->where('top_views', 1)->where('category_id', $item->id)->orderBy('id','DESC')->limit(2)->get();
                            @endphp
                            @foreach($new_products as $product)
                  <div class="product" onclick="GetCourseId(this.id)" id="{{$product->id}}">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}"> <img src="{{ asset($product->product_thambnail) }}" class="top_training-img" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}">{{ $product->product_name_fr }}</a></h3>
                            <div class="rating rateit-small"></div>
                            @if($product->type !=0 )
                            <div class="product-price"> <span class="price"> {{ $product->selling_price }} FCFA</span> </div>
                            @else
                            <div class="product-price"> <span class="price"> Gratuite </span> </div>
                            @endif
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                @endforeach
                </div>
              </div>
            @endforeach
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small sidebar-mbl">
          <h3 class="section-title">Se tenir Informer</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>Connectez vous pour etre informer des annonces !</p>
            <form>
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">addresse Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Saisir votre Email">
              </div>
              <button class="btn btn-primary">Souscrire</button>
            </form>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== NEWSLETTER: END ============================================== --> 
        
        <!-- ============================================== Testimonials============================================== -->
        <div class="sidebar-widget  wow fadeInUp outer-top-vs mbltestimo ">
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
                        
          </div>
          <!-- /.owl-carousel --> 
        </div>
        <!-- ============================================== Testimonials: END ============================================== -->
        
      </div>
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
          @foreach($notices as $notice)
            <div class="item" style="background-image: url({{$notice->notice_image}});">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left"><br>
                  <!-- <div class="slider-header fadeInDown-1">FORMATIONS</div> -->
                  <!-- <div class="big-text fadeInDown-1"> New Collections </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span> </div> -->
                  <div class="button-holder fadeInDown-3"> <a href="{{$notice->notice_link}}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Consulter</a> </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item --> 
            @endforeach           
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        
        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">FORMATION DE QUALITE</h4>
                    </div>
                  </div>
                  <h6 class="text">Formation gratuite & payante </h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">LIVRAISON GRATUITE </h4>
                    </div>
                  </div>
                  <h6 class="text">En fonction des zones de résidence</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">SUIVI & AIDE</h4>
                    </div>
                  </div>
                  <h6 class="text">Des experts sont à votre disposition </h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">Nouveautés</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">Toutes</a></li>
              <li><a data-transition-type="backSlide" href="#programmation" data-toggle="tab">Programmation</a></li>
              <li><a data-transition-type="backSlide" href="#infographie" data-toggle="tab">Infographie</a></li>
              <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Marketing</a></li>
              <li><a data-transition-type="backSlide" href="#crypto" data-toggle="tab">Crypto</a></li>
            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
                <div class="product-slider productslider-display">
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    <!-- /.item --> 
                    @php
                      $new_products = App\Models\Product::where('status', 1)->where('type', 0)->orderBy('id','DESC')->get();
                    @endphp
                    @foreach($new_products as $product)
                    <div class="item item-carousel ">
                        <div class="products">
                        <div class="product" onclick="GetCourseId(this.id)" id="{{$product->id}}" >
                            
                            <div class="product-image">
                            <div class="image"> <a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}"><img  src="{{ asset($product->product_thambnail) }}" class="pimage" ></a> </div>
                            <!-- /.image -->
                            <!-- <div class="tag new"><span>new</span></div> -->
                            </div>
                            <!-- /.product-image -->
                            <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}">{{ $product->product_name_fr }}</a></h3>
                            <div style="display:flex;align-items:center;">
                            <div class="rating rateit-small"></div>
                            <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                            </div> 
                            <div class="description"></div>
                            <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation </span> </div>
                            <!-- /.product-price --> 
                            <div class="product-price" style="margin-top: 10px;display:flex;">
                              <div style="display: flex;">
                                <div class=""><i class="fa fa-globe"></i></div>
                                <p style="margin-left: 5px;">{{ $product->langue }}</p>
                              </div>
                              <div style="display: flex;margin-left:10%;">
                                <div class=""><i class="fa fa-money"></i></div>
                                <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                              </div>
                            </div>
                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
                    </div>
                    <!-- /.home-owl-carousel --> 
                </div>
                <div class="mblproduct">
                  <div class="product-slider">
                      <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                      <!-- /.item --> 
                      <div class="item item-carousel ">
                          <div class="products" style="display: flex;">
                          @php
                          $new_products = App\Models\Product::where('status', 1)->where('type', 0)->where('category_id', 4)->orderBy('id','DESC')->limit(2)->get();
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
                              <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                              </div> 
                              <div class="description"></div>
                              <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation </span> </div>
                              <!-- /.product-price --> 
                              <div class="product-price" style="margin-top: 10px;display:flex;">
                                <div style="display: flex;">
                                  <div class=""><i class="fa fa-globe"></i></div>
                                  <p style="margin-left: 5px;">{{ $product->langue }}</p>
                                </div>
                                <div style="display: flex;margin-left:10%;">
                                  <div class=""><i class="fa fa-money"></i></div>
                                  <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                                </div>
                              </div>
                              </div>
                              <!-- /.product-info -->
                              <div class="cart clearfix animate-effect">
                              <div class="action">
                                  <ul class="list-unstyled">
                                  <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
                      <div class="item item-carousel ">
                          <div class="products" style="display: flex;">
                          @php
                          $new_products = App\Models\Product::where('status', 1)->where('type', 0)->where('category_id', 2)->orderBy('id','DESC')->limit(2)->get();
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
                              <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                              </div> 
                              <div class="description"></div>
                              <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation </span> </div>
                              <!-- /.product-price --> 
                              <div class="product-price" style="margin-top: 10px;display:flex;">
                                <div style="display: flex;">
                                  <div class=""><i class="fa fa-globe"></i></div>
                                  <p style="margin-left: 5px;">{{ $product->langue }}</p>
                                </div>
                                <div style="display: flex;margin-left:10%;">
                                  <div class=""><i class="fa fa-money"></i></div>
                                  <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                                </div>
                              </div>
                              </div>
                              <!-- /.product-info -->
                              <div class="cart clearfix animate-effect">
                              <div class="action">
                                  <ul class="list-unstyled">
                                  <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
                      <div class="item item-carousel ">
                          <div class="products" style="display: flex;">
                          @php
                          $new_products = App\Models\Product::where('status', 1)->where('type', 0)->where('category_id', 1)->orderBy('id','DESC')->limit(2)->get();
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
                              <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                              </div> 
                              <div class="description"></div>
                              <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation </span> </div>
                              <div class="product-price" style="margin-top: 10px;display:flex;">
                                <div style="display: flex;">
                                  <div class=""><i class="fa fa-globe"></i></div>
                                  <p style="margin-left: 5px;">{{ $product->langue }}</p>
                                </div>
                                <div style="display: flex;margin-left:10%;">
                                  <div class=""><i class="fa fa-money"></i></div>
                                  <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                                </div>
                              </div>
                              </div>
                              <!-- /.product-info -->
                              <div class="cart clearfix animate-effect">
                              <div class="action">
                                  <ul class="list-unstyled">
                                  <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
                      <div class="item item-carousel ">
                          <div class="products" style="display: flex;">
                          @php
                          $new_products = App\Models\Product::where('status', 1)->where('type', 0)->where('category_id', 3)->orderBy('id','DESC')->limit(2)->get();
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
                              <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                              </div> 
                              <div class="description"></div>
                              <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation </span> </div>
                              <div class="product-price" style="margin-top: 10px;display:flex;">
                                <div style="display: flex;">
                                  <div class=""><i class="fa fa-globe"></i></div>
                                  <p style="margin-left: 5px;">{{ $product->langue }}</p>
                                </div>
                                <div style="display: flex;margin-left:10%;">
                                  <div class=""><i class="fa fa-money"></i></div>
                                  <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                                </div>
                              </div>
                              </div>
                              <!-- /.product-info -->
                              <div class="cart clearfix animate-effect">
                              <div class="action">
                                  <ul class="list-unstyled">
                                  <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
                      </div>
                      <!-- /.home-owl-carousel --> 
                  </div>
                </div>
            </div>
            <!-- /.tab-pane -->
            
            <div class="tab-pane" id="programmation">
              <div class="product-slider productslider-display">
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    <!-- /.item --> 
                    @php
                      $new_products = App\Models\Product::where('category_id', 4)->where('type', 0)->orderBy('id','DESC')->get();
                    @endphp
                    @foreach($new_products as $product)
                    <div class="item item-carousel ">
                        <div class="products">
                        <div class="product" onclick="GetCourseId(this.id)" id="{{$product->id}}">
                            <div class="product-image">
                            <div class="image"> <a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}"><img  src="{{ asset($product->product_thambnail) }}" class="pimage" ></a> </div>
                            <!-- /.image -->
                            <!-- <div class="tag new"><span>new</span></div> -->
                            </div>
                            <!-- /.product-image -->
                            <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}">{{ $product->product_name_fr }}</a></h3>
                            <div style="display:flex;align-items:center;">
                            <div class="rating rateit-small"></div>
                            <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                            </div> 
                            <div class="description"></div>
                            <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation </span> </div>
                            <div class="product-price" style="margin-top: 10px;display:flex;">
                              <div style="display: flex;">
                                <div class=""><i class="fa fa-globe"></i></div>
                                <p style="margin-left: 5px;">{{ $product->langue }}</p>
                              </div>
                              <div style="display: flex;margin-left:10%;">
                                <div class=""><i class="fa fa-money"></i></div>
                                <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                              </div>
                            </div>
                            
                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
                  </div>
                    <!-- /.home-owl-carousel --> 
              </div>
              <div class="mblproduct">
                  <div class="product-slider">
                      <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                      <!-- /.item --> 
                        @php
                          $progs = App\Models\SubCategory::where('category_id', 4)->orderBy('id','ASC')->get();
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
                              <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                              </div> 
                              <div class="description"></div>
                              <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation </span> </div>
                              <div class="product-price" style="margin-top: 10px;display:flex;">
                                <div style="display: flex;">
                                  <div class=""><i class="fa fa-globe"></i></div>
                                  <p style="margin-left: 5px;">{{ $product->langue }}</p>
                                </div>
                                <div style="display: flex;margin-left:10%;">
                                  <div class=""><i class="fa fa-money"></i></div>
                                  <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                                </div>
                              </div>
                              </div>
                              <!-- /.product-info -->
                              <div class="cart clearfix animate-effect">
                              <div class="action">
                                  <ul class="list-unstyled">
                                  <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
                  </div>
              </div>
            </div>
            <!-- /.tab-pane -->
            
            <div class="tab-pane" id="infographie">
              <div class="product-slider productslider-display">
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    <!-- /.item --> 
                    @php
                      $new_products = App\Models\Product::where('category_id', 1)->where('type', 0)->orderBy('id','DESC')->get();
                    @endphp
                    @foreach($new_products as $product)
                    <div class="item item-carousel ">
                        <div class="products">
                        <div class="product" onclick="GetCourseId(this.id)" id="{{$product->id}}">
                            <div class="product-image">
                            <div class="image"> <a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}"><img  src="{{ asset($product->product_thambnail) }}" class="pimage" ></a> </div>
                            <!-- /.image -->
                            <!-- <div class="tag new"><span>new</span></div> -->
                            </div>
                            <!-- /.product-image -->
                            <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}">{{ $product->product_name_fr }}</a></h3>
                            <div style="display:flex;align-items:center;">
                            <div class="rating rateit-small"></div>
                            <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                            </div> 
                            <div class="description"></div>
                            <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation </span> </div>
                                                        <!-- /.product-price --> 
                            <div class="product-price" style="margin-top: 10px;display:flex;">
                              <div style="display: flex;">
                                <div class=""><i class="fa fa-globe"></i></div>
                                <p style="margin-left: 5px;">{{ $product->langue }}</p>
                              </div>
                              <div style="display: flex;margin-left:10%;">
                                <div class=""><i class="fa fa-money"></i></div>
                                <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                              </div>
                            </div>
                            
                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
                    </div>
                    <!-- /.home-owl-carousel --> 
              </div>
              <div class="mblproduct">
                  <div class="product-slider">
                      <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                      <!-- /.item --> 
                        @php
                          $progs = App\Models\SubCategory::where('category_id', 1)->orderBy('id','ASC')->get();
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
                              <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                              </div> 
                              <div class="description"></div>
                              <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation </span> </div>
                                                          <!-- /.product-price --> 
                              <div class="product-price" style="margin-top: 10px;display:flex;">
                                <div style="display: flex;">
                                  <div class=""><i class="fa fa-globe"></i></div>
                                  <p style="margin-left: 5px;">{{ $product->langue }}</p>
                                </div>
                                <div style="display: flex;margin-left:10%;">
                                  <div class=""><i class="fa fa-money"></i></div>
                                  <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                                </div>
                              </div>
                              </div>
                              <!-- /.product-info -->
                              <div class="cart clearfix animate-effect">
                              <div class="action">
                                  <ul class="list-unstyled">
                                  <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
                  </div>
              </div>
            </div>
            <!-- /.tab-pane -->
            
            <div class="tab-pane" id="apple">
              <div class="product-slider productslider-display">
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    <!-- /.item --> 
                    @php
                      $new_products = App\Models\Product::where('category_id', 3)->where('type', 0)->orderBy('id','DESC')->get();
                    @endphp
                    @foreach($new_products as $product)
                    <div class="item item-carousel ">
                        <div class="products">
                        <div class="product" onclick="GetCourseId(this.id)" id="{{$product->id}}">
                            <div class="product-image">
                            <div class="image"> <a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}"><img  src="{{ asset($product->product_thambnail) }}" class="pimage" ></a> </div>
                            <!-- /.image -->
                            <!-- <div class="tag new"><span>new</span></div> -->
                            </div>
                            <!-- /.product-image -->
                            <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}">{{ $product->product_name_fr }}</a></h3>
                            <div style="display:flex;align-items:center;">
                            <div class="rating rateit-small"></div>
                            <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                            </div> 
                            <div class="description"></div>
                            <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation </span> </div>
                                                        <!-- /.product-price --> 
                            <div class="product-price" style="margin-top: 10px;display:flex;">
                              <div style="display: flex;">
                                <div class=""><i class="fa fa-globe"></i></div>
                                <p style="margin-left: 5px;">{{ $product->langue }}</p>
                              </div>
                              <div style="display: flex;margin-left:10%;">
                                <div class=""><i class="fa fa-money"></i></div>
                                <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                              </div>
                            </div>
                            
                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
                    </div>
                    <!-- /.home-owl-carousel --> 
              </div>
              <div class="mblproduct">
                  <div class="product-slider">
                      <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                      <!-- /.item --> 
                        @php
                          $progs = App\Models\SubCategory::where('category_id', 3)->orderBy('id','ASC')->get();
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
                              <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                              </div> 
                              <div class="description"></div>
                              <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation </span> </div>
                                                          <!-- /.product-price --> 
                              <div class="product-price" style="margin-top: 10px;display:flex;">
                                <div style="display: flex;">
                                  <div class=""><i class="fa fa-globe"></i></div>
                                  <p style="margin-left: 5px;">{{ $product->langue }}</p>
                                </div>
                                <div style="display: flex;margin-left:10%;">
                                  <div class=""><i class="fa fa-money"></i></div>
                                  <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                                </div>
                              </div>
                              </div>
                              <!-- /.product-info -->
                              <div class="cart clearfix animate-effect">
                              <div class="action">
                                  <ul class="list-unstyled">
                                  <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
                  </div>
              </div>
            </div>
            <!-- /.tab-pane --> 

            <div class="tab-pane" id="crypto">
              <div class="product-slider productslider-display">
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    <!-- /.item --> 
                    @php
                      $new_products = App\Models\Product::where('category_id', 2)->where('type', 0)->orderBy('id','DESC')->get();
                    @endphp
                    @foreach($new_products as $product)
                    <div class="item item-carousel ">
                        <div class="products">
                        <div class="product" onclick="GetCourseId(this.id)" id="{{$product->id}}">
                            <div class="product-image">
                            <div class="image"> <a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}"><img  src="{{ asset($product->product_thambnail) }}" class="pimage" ></a> </div>
                            <!-- /.image -->
                            <!-- <div class="tag new"><span>new</span></div> -->
                            </div>
                            <!-- /.product-image -->
                            <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}">{{ $product->product_name_fr }}</a></h3>
                            <div style="display:flex;align-items:center;">
                            <div class="rating rateit-small"></div>
                            <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                            </div> 
                            <div class="description"></div>
                            <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation </span> </div>
                                                        <!-- /.product-price --> 
                            <div class="product-price" style="margin-top: 10px;display:flex;">
                              <div style="display: flex;">
                                <div class=""><i class="fa fa-globe"></i></div>
                                <p style="margin-left: 5px;">{{ $product->langue }}</p>
                              </div>
                              <div style="display: flex;margin-left:10%;">
                                <div class=""><i class="fa fa-money"></i></div>
                                <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                              </div>
                            </div>
                            
                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
                    </div>
                    <!-- /.home-owl-carousel --> 
              </div>
              <div class="mblproduct">
                  <div class="product-slider">
                      <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                      <!-- /.item --> 
                        @php
                          $progs = App\Models\SubCategory::where('category_id', 2)->orderBy('id','ASC')->get();
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
                              <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                              </div> 
                              <div class="description"></div>
                              <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation </span> </div>
                                                          <!-- /.product-price --> 
                              <div class="product-price" style="margin-top: 10px;display:flex;">
                                <div style="display: flex;">
                                  <div class=""><i class="fa fa-globe"></i></div>
                                  <p style="margin-left: 5px;">{{ $product->langue }}</p>
                                </div>
                                <div style="display: flex;margin-left:10%;">
                                  <div class=""><i class="fa fa-money"></i></div>
                                  <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                                </div>
                              </div> 
                              </div>
                              <!-- /.product-info -->
                              <div class="cart clearfix animate-effect">
                              <div class="action">
                                  <ul class="list-unstyled">
                                  <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
                  </div>
              </div>
            </div>
            <!-- /.tab-pane --> 
            
          </div>
          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="wide-banner cnt-strip">
                <div class="image"><a href="https://wa.me/694011998/?text=Bonjour puis je en savoir plus.?"><img class="img-responsive" src="{{ asset('frontend/images/banners/home-banner1.png') }}" alt=""></a> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col -->
            <div class="col-md-6 col-sm-6">
              <div class="wide-banner cnt-strip">
                <div class="image"> <a href="https://wa.me/694011998/?text=Bonjour puis je en savoir plus.?"><img class="img-responsive" src="{{ asset('frontend/images/banners/home-banner2.png') }}" alt=""></a> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">Formations Payantes</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs productslider-display" >
                    @php
                      $new_products = App\Models\Product::where('status', 1)->where('type', 1)->orderBy('id','DESC')->get();
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
                            <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                            </div> 
                            <div class="description"></div>
                            <div class="product-price"> <span class="price"> {{ $product->selling_price }} FCFA</span> </div>
                            <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation</span> </div>
                                                        <!-- /.product-price --> 
                            <div class="product-price" style="margin-top: 10px;display:flex;">
                              <div style="display: flex;">
                                <div class=""><i class="fa fa-globe"></i></div>
                                <p style="margin-left: 5px;">{{ $product->langue }}</p>
                              </div>
                              <div style="display: flex;margin-left:10%;">
                                <div class=""><i class="fa fa-money"></i></div>
                                <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                              </div>
                            </div>
                            
                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
                $progs = App\Models\Category::get();
            @endphp
            @foreach($progs as $item)
           <div class="item item-carousel ">
                <div class="products" style="display: flex;">
                  @php
                    $sell_products = App\Models\Product::where('status', 1)->where('type', 1)->where('category_id', $item->id)->orderBy('id','DESC')->limit(2)->get();
                  @endphp
                  @foreach($sell_products as $product)
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
                              <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                              </div> 
                              <div class="description"></div>
                              <div class="product-price"> <span class="price">{{ $product->selling_price }} FCFA </span> </div>
                                                          <!-- /.product-price --> 
                              <div class="product-price" style="margin-top: 10px;display:flex;">
                                <div style="display: flex;">
                                  <div class=""><i class="fa fa-globe"></i></div>
                                  <p style="margin-left: 5px;">{{ $product->langue }}</p>
                                </div>
                                <div style="display: flex;margin-left:10%;">
                                  <div class=""><i class="fa fa-money"></i></div>
                                  <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                                </div>
                              </div> 
                              
                              </div>
                              <!-- /.product-info -->
                              <div class="cart clearfix animate-effect">
                              <div class="action">
                                  <ul class="list-unstyled">
                                  <!-- <li class="add-cart-button btn-group">
                                      <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Panier d'achat"> <i class="fa fa-shopping-cart"></i> </button>
                                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                  </li> -->
                                  <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
           @endforeach       
            <!-- /.item -->
          </div>
          <div style="width: 100%;display:flex;justify-content:center;padding-bottom:20px !important;">
          <a href="{{ url('selling/course') }}" class="btn btn-primary" style="font-size: 18px;">Voir Plus</a>
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs long-banner">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/images/banners/home-banner.png') }}" alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right" style="color:white !important;">Laravel 8 de A à Z : E-commerce project<br>
                      <span class="shopping-needs" style="color:black !important;">30% de reduction</span></h2>
                      <!-- <a href="#" class="lnk btn btn-primary" style="margin-left: 65%;margin-top:10px;">Acheter</a>  -->
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label --> 
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
            
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        <!-- ============================================== BEST SELLER ============================================== -->
        
        <div class="best-deal wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">Meillleures Formations</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
            @php
                $progs = App\Models\Category::get();
            @endphp
            @foreach($progs as $item)
              <div class="item">
                <div class="products best-product">
                @php
                    $top_products = App\Models\Product::where('top_20', 1)->where('type', 0)->where('category_id', $item->id)->orderBy('id','DESC')->limit(2)->get();
                  @endphp
                  @foreach($top_products as $product)
                  <div class="product" onclick="GetCourseId(this.id)" id="{{$product->id}}">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image "> <a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}"> <img src="{{ asset($product->product_thambnail) }}" class="top_training-img"> </a> </div>
                            <!-- /.image -->                           
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}">{{ $product->product_name_fr }}</a></h3>
                            <div class="rating rateit-small"></div>
                            @if($product->type!=0) 
                             <div class="product-price"><span class="price-before-discounts">{{ $product->selling_price }} FCFA </span> </div>
                            @endif
                            <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation </span> </div>
                            <div class="product-price" style="margin-top: 10px;display:flex;">
                              <div style="display: flex;">
                                <div class=""><i class="fa fa-globe"></i></div>
                                <p style="margin-left: 5px;">{{ $product->langue }}</p>
                              </div>
                              <div style="display: flex;margin-left:10%;">
                                <div class=""><i class="fa fa-money"></i></div>
                                <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  @endforeach
                </div>
              </div>
              @endforeach

            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
          <div style="width: 100%;display:flex;justify-content:center;padding-bottom:20px !important;">
          <a href="{{ url('top/course') }}" class="btn btn-primary" style="font-size: 18px;">Voir Plus</a>
          </div>
          
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== BEST SELLER : END ============================================== --> 
        
        <!-- ============================================== BLOG SLIDER ============================================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">Blogs</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{{ asset('frontend/images/blog-post/post1.jpg') }}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">What's Laravel 8 new Features.?</a></h3>
                    <span class="info">By Brecht Tankoua &nbsp;|&nbsp; 21 December 2022 </span>
                    <p class="text">Click to "read more" to view more about Laravel 8 new features.</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->
              
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{{ asset('frontend/images/blog-post/post2.jpg') }}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Laravel 8 tout ce qu'il faut savoir</a></h3>
                    <span class="info">Brecht Tankoua &nbsp;|&nbsp; 21 December 2022 </span>
                    <p class="text">Tous decouvrir sur le meilleur framework PHP.</p>
                    <a href="#" class="lnk btn btn-primary">En savoir plus</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item --> 
              
              <!-- /.item -->
              
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{{ asset('frontend/images/blog-post/post1.jpg') }}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->
              
            </div>
            <!-- /.owl-carousel --> 
          </div>
          <!-- /.blog-slider-container --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== BLOG SLIDER : END ============================================== --> 
        
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">Nouvelles Sorties</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs productslider-display" >
                    @php
                      $new_products = App\Models\Product::where('status', 1)->orderBy('id','DESC')->get();
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
                            <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                            </div> 
                            <div class="description"></div>
                            @if($product->type !=0)
                            <div class="product-price"> <span class="price"> {{ $product->selling_price }} FCFA</span> </div>
                            @else
                            <div class="product-price"> <span class="price">Prix : Gratuite </span> </div>
                            @endif
                            <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation</span> </div>
                                                        <!-- /.product-price --> 
                            <div class="product-price" style="margin-top: 10px;display:flex;">
                              <div style="display: flex;">
                                <div class=""><i class="fa fa-globe"></i></div>
                                <p style="margin-left: 5px;">{{ $product->langue }}</p>
                              </div>
                              <div style="display: flex;margin-left:10%;">
                                <div class=""><i class="fa fa-money"></i></div>
                                <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                              </div>
                            </div>
                            
                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
                $progs = App\Models\Category::get();
            @endphp
            @foreach($progs as $item)
           <div class="item item-carousel ">
                <div class="products" style="display: flex;">
                  @php
                    $sell_products = App\Models\Product::where('status', 1)->where('category_id', $item->id)->orderBy('product_name_fr','Asc')->limit(2)->get();
                  @endphp
                  @foreach($sell_products as $product)
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
                              <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                              </div> 
                              <div class="description"></div>
                              @if($product->type !=0)
                            <div class="product-price"> <span class="price"> {{ $product->selling_price }} FCFA</span> </div>
                            @else
                            <div class="product-price"> <span class="price"> Gratuite </span> </div>
                            @endif
                              <!-- /.product-price --> 
                              
                              </div>
                              <!-- /.product-info -->
                              <div class="cart clearfix animate-effect">
                              <div class="action">
                                  <ul class="list-unstyled">
                                  <!-- <li class="add-cart-button btn-group">
                                      <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Panier d'achat"> <i class="fa fa-shopping-cart"></i> </button>
                                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                  </li> -->
                                  <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)"  title="Favoris"> <i class="icon fa fa-heart"></i> </a> </li>
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
           @endforeach       
            <!-- /.item -->
          </div>
          <!-- /.home-owl-carousel --> 
          <div style="width: 100%;display:flex;justify-content:center;padding-bottom:20px !important;">
          <a href="{{ url('new/course') }}" class="btn btn-primary" style="font-size: 18px;">Voir Plus</a>
          </div>
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          
        @foreach($brands as $brand)
          <div class="item"> <a href="#" class="image"> <img data-echo="{{url('upload/brands/'.$brand->brand_image)}}" src="{{ asset('frontend/images/blank.gif') }}" width="200px" height="200px"> </a> </div>
          <!--/.item-->
        @endforeach
          

        </div>
        <!-- /.owl-carousel #logo-slider --> 
      </div>
      <!-- /.logo-slider-inner --> 
      
    </div>
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 

@endsection