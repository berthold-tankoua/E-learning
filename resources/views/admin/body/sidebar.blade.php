@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
      <div class="user-profile">
        <div class="ulogo">
          <a href="{{ route('admin.dashboard.home') }}">
            <!-- logo for regular state and mobile devices -->
                    <!-- {{ asset('') }} -->
            <div class="d-flex align-items-center justify-content-center">					 	
                <!-- <img src="{{ asset('512.png') }}" alt="logo" width="45px" height="45px"> -->
               <h3><b>E-LEARNING </b></h3> 
            </div>
          </a>
        </div>
      </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		    <li class="{{ ($prefix == '/admin') ? 'active' : '' }}">
          <a href="{{ route('admin.dashboard.home') }}">
            <i data-feather="pie-chart"></i>
			      <span>Dashboard</span>
          </a>
        </li>  
        <li class="treeview {{ ($prefix == '/brand') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="git-commit"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route == 'all.brand' ? 'active' : '' }}">
              <a href="{{route('all.brand')}}"><i class="ti-more"></i>All Brands</a>
            </li>
          </ul>
        </li> 
        <li class="{{ ($prefix == '/notice') ? 'active' : '' }}">
          <a href="{{route('all.notice')}}">
            <i data-feather="bell"></i>
			      <span>Notice</span>
          </a>
        </li>  
        <li class="treeview {{ ($prefix == '/category') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="git-pull-request"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route == 'all.category' ? 'active' : '' }}">
              <a href="{{route('all.category')}}"><i class="ti-more"></i>All Categories</a>
            </li>
            <li class="{{ $route == 'all.subcategory' ? 'active' : '' }}">
              <a href="{{route('all.subcategory')}}"><i class="ti-more"></i>All SubCategories</a>
            </li>
            <li class="{{ $route == 'all.subsubcategory' ? 'active' : '' }}">
              <a href="{{route('all.subsubcategory')}}"><i class="ti-more"></i>All Sub-SubCategories</a>
            </li>
          </ul>
        </li>
        <li class="treeview {{ ($prefix == '/courses') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="shopping-cart"></i>
            <span>Courses</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route == 'add.course.view' ? 'active' : '' }}">
              <a href="{{route('add.course.view')}}"><i class="ti-more"></i>Add Course</a>
            </li>
            <li class="{{ $route == 'view.all.courses' ? 'active' : '' }}">
              <a href="{{route('view.all.courses')}}"><i class="ti-more"></i>All Courses</a>
            </li>
          </ul>
        </li> 
        <li class="treeview {{ ($prefix == '/lessons') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="book"></i>
            <span>Lessons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route == 'add.lesson.view' ? 'active' : '' }}">
              <a href="{{route('add.lesson.view')}}"><i class="ti-more"></i>Add lesson</a>
            </li>
            <li class="{{ $route == 'view.all.lessons' ? 'active' : '' }}">
              <a href="{{route('view.all.lessons')}}"><i class="ti-more"></i>All lessons</a>
            </li>
          </ul>
        </li> 
        <li class="treeview {{ ($prefix == '/orders') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="shopping-cart"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route == 'all.finish.order' ? 'active' : '' }}">
              <a href="{{route('all.finish.order')}}"><i class="ti-more"></i>Finish</a>
            </li>
            <li class="{{ $route == 'all.pending.order' ? 'active' : '' }}">
              <a href="{{route('all.pending.order')}}"><i class="ti-more"></i>Pending</a>
            </li>
          </ul>
        </li> 	  
      </ul>
    </section>
	

  </aside>