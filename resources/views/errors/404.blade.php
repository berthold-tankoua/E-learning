@extends('frontend.main_master')

@section('content')

@section('title')
MarketPlace | 404
@endsection


<div class="body-content outer-top-bd">
	<div class="container">
		<div class="x-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12 x-text text-center">
					<h1>404</h1>
					<p>Desolé votre requete est invalide. </p>
					<form action="{{ route('search.result') }}" method="get" role="form" class="outer-top-vs outer-bottom-xs">
                        <input placeholder="Rechercher un cours" type="text" name="searchval" autocomplete="off">
                        <button class="  btn-default le-button">Go</button>
                    </form>
					<a href="/"><i class="fa fa-home"></i> Page d'acceuil</a>
				</div>
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection