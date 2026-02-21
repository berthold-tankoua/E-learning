<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title> @yield('title') </title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-select.min.css') }}">

<!-- Toast Notification -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
<style>
	.toast {
	background-color: #030303 !important;
	font-size: 15px !important;
	}
	.toast-info {
	background-color: #3276b1 !important;
	}
	.toast-info2 {
	background-color: #2f96b4 !important;
	}
	.toast-error {
	background-color: #bd362f !important;
	}
	.toast-success {
	background-color: #51a351 !important;
	}
	.toast-warning {
	background-color: #f89406 !important;
	}
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.css') }}">
<link rel="icon" href="{{ asset('frontend/images/512x512.png') }}">
<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">

	<!--=====================================
	Header 
	======================================-->

    @include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <!--=====================================
    Home 
    ======================================-->  

	@yield('content')


</div>
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<script src="{{ asset('frontend/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('frontend/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('frontend/js/echo.min.js') }}"></script> 
<script src="{{ asset('frontend/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('frontend/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('frontend/js/jquery.rateit.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('frontend/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('frontend/js/wow.min.js') }}"></script> 
<script src="{{ asset('frontend/js/scripts.js') }}"></script>

{{-- JS SCRIPTS  --}}
	<!-- TOAST MSG  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- end service -->

	<!-- USER REVIEW  -->
<script type="text/javascript">

    $.ajaxSetup({
		  headers:{
			  'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
		  }
	})

	function GetCourseId(c_id){
		var get_course_id = c_id;
		console.log(c_id);

		$.ajax({
				type:'POST',
				url: "{{ url('/course-view-count') }}/"+get_course_id,
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


    function StoreCourseReview(){
        var rname = $('#rname').val();
        var id = $('#course_id').val();
        var remail = $('#remail').val();
        var rcomment = $('#rcomment').val();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data:{
                rname:rname,remail:remail,rcomment:rcomment,id:id
            },
            url:"{{ url('/review/course/store') }}",
            success:function(data){

                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000
                })

                if($.isEmptyObject(data.error)){
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }

            }
        });
        countCourseReview(id)
    }

    function countCourseReview(id){
    $.ajax({
        type:'GET',
        url: "{{ url('/review/course/count') }}/"+id,
        dataType:'json',
            success:function(response){        
            console.log(response)
            $('#reviewcount').text(response);
            }
            })
    }
    countCourseReview(course_id);

	function AjaxLogin(){
		var email = $('#memail').val();
		var password = $('#mpassword').val();
		var remember_me = $('#mremember_me').val();
			$.ajax({
				type: 'POST',
				dataType: 'json',
				data:{
					email:email,password:password,remember_me:remember_me
				},
				url: "{{ url('/user-check') }}",
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
					location.reload(true);

				}
			})
			
	}

</script>

<!-- COURSE WISHLIST -->
<script type="text/javascript">

        function addToWishlist(product_id){
			$.ajax({
				type:'POST',
				url: "{{ url('/add-to-wishlist') }}/"+product_id,
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
			})
			wishlist();
		}

		function wishlist(){
			$.ajax({
				type:'GET',
				url: "{{ url('/user/get-wishlist-product') }}",
				dataType:'json',
				success:function(response){

					// console.log(response)
					countwishlist()

					var rows = ""
					$.each(response, function(key,value){
						rows += `
                        <tr>
                                    <td class="col-md-2"><img src="{{ url('/${value.product.product_thambnail}')}}" alt="imga"></td>
                                    <td class="col-md-7">
                                        <div class="product-name"><a href="#">${value.product.product_name_fr}</a></div>
                                        <div class="rating">
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star non-rate"></i>
                                            <span class="review">( ${value.product.avis} Avis )</span>
                                        </div>
                                        <div class="product-price" style="margin-top: 10px;display:flex;">
                                            <div style="display: flex;">
                                            <div class=""><i class="fa fa-globe"></i></div>
                                            <p style="margin-left: 5px;">${value.product.langue}</p>
                                            </div>
                                            <div style="display: flex;margin-left:10%;">
                                            <div class=""><i class="fa fa-money"></i></div>
                                            <p style="margin-left: 5px;">
                                            ${value.product.type == 0 ? `Gratuite`: `Gratuite`}
                                            </p>
                                            </div>
                                        </div> 
                                    </td>
                                    <td class="col-md-2 text-center">
                                       <a target="_blank" rel="noopener noreferrer" href="https://wa.me/694011998/?text= Je souhaite commander la formation : ${value.product.product_name_fr}" class="btn btn-success"><i class="fa fa-phone inner-right-vs"></i> Commander</a>
                                        <a  class="btn-upper btn btn-primary m-t-15" id="${value.product.id}" onclick="productView(this.id)">Ajouter au panier</a>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                        <a id="${value.id}" onclick="wishlistRemove(this.id)" ><i class="fa fa-times"></i></a>
                                    </td>
                            </tr>
                                <hr>
						`
					});
					$('#wishlist').html(rows);
				}
			})
		}
        wishlist();

		// START wishlist REMOVE
		function wishlistRemove(rowId){
         $.ajax({
            type:'GET',
            url: "{{ url('/user/remove-wishlist-product') }}/"+rowId,
            dataType:'json',
            success:function(data){

                wishlist();
				countwishlist()

                // start
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000
                })

                if($.isEmptyObject(data.error)){
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }

            }
         })
		}
		// End remove to wishlist

		// Count wishlist
		function countwishlist(){
			$.ajax({
				type:'GET',
				url: "{{ url('/get-wishlist-count') }}",
				dataType:'json',
				success:function(response){   
				console.log(response)
				$('#Wishlistcount').text(response);
				$('#mblWishlistcount').text(response);

				}
			})
		}
		countwishlist()
</script>

<!-- COURSE ADD TO CART -->
<script type="text/javascript">
	// START ADD TO CART
    function addToCarts(){
			var product_name = $('#pname').text();
			var id = $('#course_id').val();
			$.ajax({
				type: 'POST',
				dataType: 'json',
				data:{
					product_name:product_name
				},
				url: "{{ url('/cart/data/store') }}/"+id,
				success:function(data){

					minicart();

					const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					icon: 'success',
					showConfirmButton: false,
					timer: 3000
					})

					if($.isEmptyObject(data.error)){
						Toast.fire({
							type: 'success',
							title: data.success
						})
					}else{
						Toast.fire({
							type: 'error',
							title: data.error
						})
					}

				}
			})
			minicart();
		} 
	// end add to cart

	// START MINI CART SHOW
		function minicart(){
			$.ajax({
				type:'GET',
				url: "{{ url('/product/mini/cart') }}",
				dataType:'json',
				success:function(response){
					console.log(response)

					$('#CartSubTotal').text(response.cartTotal);
					$('#CartQty').text(response.cartQty);

					$('#mbl-CartSubTotal').text(response.cartTotal);
					$('#mbl-CartQty').text(response.cartQty);

					var minicart = ""
					$.each(response.carts, function(key,value){
						minicart += `
                        <div class="row">
                            <div class="col-xs-4">
                            <div class="image"> <a href=""><img src="{{ url('/${value.options.image}')}}" alt=""></a> </div>
                            </div>
                            <div class="col-xs-7">
                            <h3 class="name"><a href="">${value.name}</a></h3>
                            <div class="price">${value.price} FCFA</div>
                            </div>
                            <div class="col-xs-1 action"> <a id="${value.rowId}" onclick="minicartRemove(this.id)"><i class="fa fa-trash"></i></a> </div>
                        </div><br>
                        `
					});
					$('#minicart').html(minicart);
					$('#mbl-minicart').html(minicart);
				}
			})
		}
        minicart();
	// End Minicart show

	function cartview(){
		$.ajax({
				type:'GET',
				url: "{{ url('/user/get-cart-product') }}",
				dataType:'json',
				success:function(response){

					console.log(response)
					$('#CartviewTotal').text(response.cartTotal);

					var rows = ""
					$.each(response.carts, function(key,value){
						rows += `<tr>
						<td>
							<div class="ps-product--cart">

							<div class="ps-product__thumbnail">

								<a href="#"><img src="{{ url('/${value.options.image}')}}" alt=""></a>

							</div>

							<div class="ps-product__content">

								<a href="#">${value.name}</a>

								<p>Boutique : <strong>${value.options.store} </strong></p>

							</div>

							</div>
						</td>

						<td class="price">
						 ${value.price} FCFA 
						</td>

						<td><span class="ps-tag ps-tag--in-stock">En stock</span></td>

						<td>
						<div class="form-group--number">

							<button class="up">+</button>

							<button class="down">-</button>

							<input class="form-control" type="text" placeholder="1" value="${value.qty}">

						</div>
						</td>

						<td>${value.subtotal} FCFA </td>  

						<td><a id="${value.rowId}" onclick="minicartRemove(this.id)"><i class="fa fa-trash"></i></a></td>

						</tr><hr>
						`
					});
					$('#cartview').html(rows);
				}
		})
	}
    cartview();

	// START MINICART REMOVE
		function minicartRemove(rowId){
			var product_name = $('#pname').text();
			var id = $('#product_id').val();
			var color = $('#pcolor option:selected').text();
			var size = $('#psize option:selected').text();
			var quantity = $('#qty').val();
			$.ajax({
				type:'GET',
				url: "{{ url('/minicart/product-remove/') }}/"+rowId,
				dataType:'json',
				success:function(data){
					minicart();

					// start
					const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					icon: 'success',
					showConfirmButton: false,
					timer: 3000
					})

					if($.isEmptyObject(data.error)){
						Toast.fire({
							type: 'success',
							title: data.success
						})
					}else{
						Toast.fire({
							type: 'error',
							title: data.error
						})
					}

				}
			})
		}
	// End remove to minicart
</script>

<script>
    @if(Session::has('message'))
      
      var type = "{{ Session::get('alert-type', 'info') }}";
      switch (type) {
        case 'info':
          toastr.info(" {{ Session::get('message') }} ")
          break;
      
        case 'success':
          toastr.success(" {{ Session::get('message') }} ")
          break;

        case 'warning':
          toastr.warning(" {{ Session::get('message') }} ")
          break;

        case 'error':
          toastr.error(" {{ Session::get('message') }} ")
          break;
      }
    @endif
</script> 
@stack('scripts')

<!-- END -->
</body>
</html>