@extends('frontend.main_master')

@section('content')

@section('title')
E-Learning | Compte
@endsection

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
            <li><a href="{{url('/')}}">Acceuil</a></li>
				<li class='active'>Connexion</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
				<div class="col-md-6 col-sm-6 sign-in">
					<h4 class="">Se Connecter</h4>
					<p class="">Bienvenue veuillez-vous Connecter.</p>
					<!-- <div class="social-sign-in outer-top-xs">
						<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
						<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
					</div> -->
					<form class="register-form outer-top-xs" action="{{ route('user.check') }}" method="POST">
						@csrf
						<div class="form-group">
							<label class="info-title" for="exampleInputEmail1">Addresse Email <span>*</span></label>
							<input type="email" class="form-control unicase-form-control text-input" name="email" placeholder="Entrer votre Email" >
							@error('email')
								<span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group">
						<label class="info-title" for="exampleInputPassword1">Mot de passe <span>*</span></label>
							<div style="display: flex;align-items:center;">
							<input style="width: 85%;" type="password" class="form-control unicase-form-control text-input" name="password" id="password" placeholder="Saisir votre mot de passe" >
							<a style="color: black;font-size:17px;margin-left:15px;"> <i class="fa fa-eye" onclick="showpassword()"></i></a>
							</div>
							@error('password')
								<span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
							@enderror
						</div>
						<div class="radio outer-xs">
							<label>
								<input type="radio" id="remember_me" name="remember_me" value="remember_me">Se souvenir de moi !
							</label>
							<a href="#" class="forgot-password pull-right">Mot de passe Oublié ?</a>
						</div>
						<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Se connecter</button>
					</form>					
				</div>
				<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">Creer un Compte</h4>
	<p class="text title-tag-line">Ouvrez un compte enfin d'etre tenu informé des nouveautes & promotions.</p>

    <form class="register-form outer-top-xs" action="{{ route('user.create') }}" method="POST">
        @csrf

        <div class="form-group">
        <label class="info-title" for="name">Nom & Prenom <span>*</span></label>
            <input class="form-control unicase-form-control text-input" type="text" name="firstname" placeholder="Entrer votre Nom">
            
            @error('firstname')
                <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
            @enderror

        </div>

        <div class="form-group">
        <label class="info-title" for="email">Adresse Email <span>*</span></label>
            <input class="form-control unicase-form-control text-input" type="email" name="remail" placeholder="Saisir votre Email">

            @error('remail')
                <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
            @enderror

        </div>

        <div class="form-group">
        <label class="info-title" for="phone">Contact <span>*</span></label>
            <input class="form-control unicase-form-control text-input" type="text" name="phone" placeholder="Numero de telephone">

        </div>

        <div class="form-group">
        <label class="info-title" for="password">Mot de passe <span>*</span></label>
            <input class="form-control unicase-form-control text-input" type="password" name="rpassword" placeholder="Saisir un mot depasse">

            @error('rpassword')
                <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
            @enderror

        </div>
         <!-- <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
		    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div> -->
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">S'inscrire</button>
	</form>
	
	
</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<script>
	function showpassword() {
		
	var x = document.getElementById("password");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
	}
</script>

@endsection

