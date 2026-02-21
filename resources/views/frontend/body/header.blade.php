<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1"> 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            <li><a href="{{ route('user.profile') }}"><i class="icon fa fa-user"></i>Mon Compte</a></li>
            <li><a href="{{route('user.wishlist')}}"><i class="icon fa fa-heart"></i>Favoris</a></li>
            <li><a href="{{ route('checkout') }}"><i class="icon fa fa-shopping-cart"></i>Panier d'achat</a></li>
            @auth
            <li><a href="{{ route('user.logout') }}"><i class="icon fa fa-lock"></i>Deconnexion</a></li>
            @else
            <li><a href="{{ route('user.login') }}"><i class="icon fa fa-lock"></i>Connexion</a></li>
            @endauth
          </ul>
        </div>
        <!-- /.cnt-account -->
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset('frontend/images/logo.png') }}" style="width: 70% !important;margin-top:-10px;" alt="logo"> </a> </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area">
            <form action="{{ route('search.result') }}" method="get">
              <div class="control-group">
                <ul class="categories-filter animate-dropdown">
                  <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="#">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" >
                      @php
                        $categories = App\Models\Category::orderBy('category_name_fr','ASC')->get();
                      @endphp
                      @foreach($categories as $category)
                       <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('course/categories/'.$category->id.'/'.$category->category_slug_fr) }}">* {{$category->category_name_fr}}</a></li>
                      @endforeach
                    </ul>
                  </li>
                </ul>
                <input class="search-field" type="text" name="searchval" placeholder="Recherche ..." />
                <button class="search-button"  ></button> </div>
            </form>
          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count" id="CartQty">0</span></div>
              <div class="total-price-basket"> <span class="lbl">Panier </span>  </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
                <div class="cart-item product-summary" id="minicart">

                </div>
                <!-- /.cart-item -->

                <div class="clearfix"></div>
                <hr>
                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text"> Total :</span><span id="CartSubTotal">0</span> FCFA</div>
                  <div class="clearfix"></div>
                  <a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">Paiement</a> </div>
                <!-- /.cart-total--> 
                
              </li>
            </ul>
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}" >Page d'acceuil</a> </li>
                @php
                  $categories = App\Models\Category::orderBy('id','DESC')->get();
                @endphp
                @foreach($categories as $category)
                <li class="dropdown yamm mega-menu"> <a href="{{ url('course/categories/'.$category->id.'/'.$category->category_slug_fr) }}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{$category->category_name_fr}} </a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content ">
                        <div class="row">
                        @php
                           $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('id','ASC')->get();
                        @endphp
                         @foreach($subcategories as $subcategory)
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            <h2 class="title">{{$subcategory->subcategory_name_fr}}</h2>
                            <ul class="links">
                              @php
                                $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_fr','ASC')->get();
                              @endphp
                              @foreach($subsubcategories as $subsubcategory)
                              <li><a href="{{ url('course/subsubcategories/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_fr) }}">{{$subsubcategory->subsubcategory_name_fr}}</a></li>
                              @endforeach
                            </ul>
                          </div>
                          @endforeach
                          <!-- /.col -->
                                                                              
                          <!-- <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="assets/images/banners/top-menu-banner.jpg" alt=""> </div> -->
                          <!-- /.yamm-content --> 
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                @endforeach
                <li class="dropdown hidden-sm"> <a href="#">EN VENTE<span class="menu-label hot-menu hidden-xs">Hot</span> </a> </li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Pages</a>
                  <ul class="dropdown-menu pages">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <div class="col-xs-12 col-menu">
                            <ul class="links">
                              <li><a href="{{ url('/') }}">Page d'acceuil</a></li>
                              <li><a href="{{ url('selling/course') }}">En vente</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="dropdown  navbar-right special-menu"> <a target="_blank" rel="noopener noreferrer" href="https://wa.me/694011998/?text= Je souhaite en savoir plus">Contact</a> </li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>