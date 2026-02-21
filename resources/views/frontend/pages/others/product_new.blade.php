@extends('frontend.main_master')

@section('content')


@section('title')
E-learning | {{$value}}
@endsection

<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="{{url('/')}}">Acceuil</a></li>
        <li class='active'>{{$value}}</li>
      </ul>
    </div>
    <!-- /.breadcrumb-inner --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-md-3 sidebar'> 
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
      <!-- /.sidebar -->
      <div class='col-md-9'> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
     
        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <div class="col col-sm-6 col-md-2">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grille</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>Liste</a></li>
                </ul>
              </div>
              <!-- /.filter-tabs --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                @foreach($products as $product)
                  <div class="col-sm-5 col-md-3 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
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
                          @if($product->type!=0) 
                          <div class="product-price"><span class="price-before-discounts">Formation | {{ $product->selling_price }} FCFA </span> </div>
                          @else
                          <div class="product-price"><span class="price-before-discounts">{{ $product->brand->brand_name_fr }} | Formation </span> </div>
                          @endif
                            <div class="product-price" style="margin-top: 10px;display:flex;">
                              <div style="display: flex;">
                                <div><i class="fa fa-globe"></i></div>
                                <p style="margin-left: 5px;">{{ $product->langue }}</p>
                              </div>
                              <div style="display: flex;margin-left:10%;">
                                <div><i class="fa fa-money"></i></div>
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
                <!-- /.row --> 
              </div>
              <!-- /.category-product --> 
              
            </div>
            <!-- /.tab-pane -->
            
            <div class="tab-pane "  id="list-container">
              <div class="category-product">
              @foreach($products as $product)
                <div class="category-product-inner wow fadeInUp">
                  <div class="products">
                    <div class="product-list product">
                      <div class="row product-list-row">
                        <div class="col col-sm-4 col-lg-4">
                          <div class="product-image">
                            <div class="image"> <img src="{{ asset($product->product_thambnail) }}" alt=""> </div>
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-8 col-lg-8">
                          <div class="product-info">
                            <h3 class="name"><a href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}">{{ $product->product_name_fr }}</a></h3>
                            <div style="display:flex;align-items:center;">
                            <div class="rating rateit-small"></div>
                            <p style="margin-left: 10px;margin-top:3px;">Avis (<span>{{ $product->avis }}</span>)</p>
                          </div> 
                          @if($product->type!=0) 
                          <div class="product-price"><span class="price-before-discounts">{{ $product->selling_price }} FCFA </span> </div>
                          @endif
                          <div class="product-price" style="margin-top: 10px;display:flex;">
                              <div style="display: flex;">
                                <div style="margin-top: 3px;"><i class="fa fa-globe"></i></div>
                                <p style="margin-left: 5px;">{{ $product->langue }}</p>
                              </div>
                              <div style="display: flex;margin-left:10%;">
                                <div style="margin-top: 3px;"><i class="fa fa-money"></i></div>
                                <p style="margin-left: 5px;">@if($product->type==0) Gratuite @else Payante @endif</p>
                              </div>
                            </div>
                            <!-- /.product-price -->
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="lnk wishlist"> <a class="add-to-cart" href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                  <li class="lnk"> <a class="add-to-cart" href="{{ url('course/details/'.$product->id.'/'.$product->product_slug_fr) }}" title="Compare"> <i class="fa fa-eye"></i> </a> </li>
                                </ul>
                              </div>
                              <!-- /.action --> 
                            </div>
                            <!-- /.cart --> 
                            
                          </div>
                          <!-- /.product-info --> 
                        </div>
                        <!-- /.col --> 
                      </div>
                    </div>
                    <!-- /.product-list --> 
                  </div>
                  <!-- /.products --> 
                </div>
                <!-- /.category-product-inner -->
                @endforeach
              </div>
              <!-- /.category-product --> 
            </div>
            <!-- /.tab-pane #list-container --> 
          </div>
          <!-- /.tab-content -->
          <div class="clearfix filters-container">
            <!-- <div class="text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                  <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
              </div>
           </div> -->
          </div>
          <!-- /.filters-container --> 
          
        </div>
        <!-- /.search-result-container --> 
        
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 

    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
  <!-- /.container --> 
  
</div>
<!-- /.body-content --> 

@endsection