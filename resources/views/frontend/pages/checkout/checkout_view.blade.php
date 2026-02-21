@extends('frontend.main_master')

@section('content')

@section('title')
E-Learning | Checkout
@endsection

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
               <li><a href="{{url('/')}}">Acceuil</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

    <!--=====================================
    Checkout
    ======================================--> 
    <div class="ps-checkout ps-section--shopping">

        <div class="container">

            <div class="ps-section__content">

                <form action="{{route('checkout.store')}}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-xl-6 col-lg-7 col-sm-12">

                            <div class="ps-form__billing-info">

                                <h3 class="ps-form__heading">Facturation Details</h3>
                                
                                @auth
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label>Nom & Prenom <sup>*</sup></label>

                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="name" value="{{Auth::user()->firstname}}">
                                            @error('name') 
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                        <label>Email Adresse<sup>*</sup></label>

                                        <div class="form-group__content">
                                            <input class="form-control" type="email" name="email" value="{{Auth::user()->email}}">
                                            @error('email') 
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telephone<sup>*</sup></label>

                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="phone" value="{{Auth::user()->phone}}">
                                            @error('phone') 
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label>Nom & Prenom <sup>*</sup></label>

                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="name" placeholder="Saisir votre nom & prenom">
                                            @error('name') 
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                        <label>Email Adresse <sup>*</sup></label>

                                        <div class="form-group__content">
                                            <input class="form-control" type="email" name="email" placeholder="Saisir votre email">
                                            @error('email') 
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telephone <sup>*</sup></label>

                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="phone" placeholder="Saisir votre numero telephone">
                                            @error('shipping_phone') 
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        </div>
                                    </div>
                                </div>
                                @endauth
                                <div class="row">
                                   <div class="col-md-3">
                                        <div class="form-group">

                                        <label>code_postal <sup>*</sup></label>

                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="post_code" value="237">
                                            @error('post_code') 
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">

                                        <label>Pays <sup>*</sup></label>

                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="country" value="Cameroon">
                                            @error('country') 
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Ville <sup>*</sup></label>

                                    <div class="form-group__content">
                                        <input class="form-control" type="text" name="town">
                                        @error('town') 
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>

                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Quartier <sup>*</sup></label>

                                    <div class="form-group__content">
                                        <input class="form-control" type="text" name="quarter">
                                        @error('quarter') 
                                                <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    </div>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <label>Commentaire</label>

                                    <div class="form-group__content">

                                        <textarea class="form-control" rows="7" name="notes" placeholder="Laissez votre avis."></textarea>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-xl-6 col-lg-5 col-sm-12">

                            <div class="ps-form__total">

                                <h3 class="ps-form__heading">Mes Achats</h3>

                                <div class="content">

                                    <div class="ps-block--checkout-total">


                                        <div class="ps-block__content checkout_scroll">

                                            <table class="table ps-block__products">

                                                <tbody class="">
                                                    @foreach($carts as $cart)
                                                    <tr>
                                                        <td>
                                                            <img src="{{$cart->options->image}}" width="120px" height="80px" alt="">
                                                        </td>

                                                        <td>
                                                            <a href="#"> {{$cart->name}}</a>
                                                            <p>Qté : <strong>{{$cart->qty}}</strong></p>
                
                                                        </td>

                                                        <td class="text-right">{{$cart->price}} FCFA</td>

                                                    </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            
                                        </div><br>
                                        <h3 class="text-right">Total: <span>{{$cartTotal}}</span> FCFA</h3>
                                    </div>

                                    <hr class="py-3">


                                    <button class="btn btn-primary text-center" style="margin-left:45%;">Proceder au paiement</button>

                                </div>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection