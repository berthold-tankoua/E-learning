@extends('frontend.main_master')

@section('content')

@section('title')
MarketPlace | Compte
@endsection


<!--=====================================
Login - Register Content
======================================--> 

<div class="ps-my-account">

    <div class="container">

        <div class="ps-form--account ps-tab-root">

            <ul class="ps-tab-list">

                <li class=""><a href="#sign-in">Se Connecter</a></li>

                <li class="active"><a href="#register">S'inscrire</a></li>

            </ul>

            <div class="ps-tabs">

                <!--=====================================
                Login Form
                ======================================--> 

                <div class="ps-tab" id="sign-in">

                    <div class="ps-form__content">

                        <h5>Se Connecter a votre Compte</h5>

                        <form action="{{ route('user.check') }}" method="POST">

                            @csrf

                            <div class="form-group">

                                <input class="form-control" type="text" name="email" placeholder="Entrer votre Email">

                                @error('email')
                                    <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group form-forgot">

                                <input class="form-control" type="password" name="password" placeholder="Saisir votre mot de passe">

                                @error('password')
                                    <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                @enderror

                                <a href="">Forgot?</a>

                            </div>

                            <div class="form-group">

                                <div class="ps-checkbox">

                                    <input class="form-control" type="checkbox" id="remember-me" name="remember-me">

                                    <label for="remember-me">se souvenir de moi</label>

                                </div>

                            </div>

                            <div class="form-group ">

                                <button type="submit" class="ps-btn ps-btn--fullwidth">Se connceter</button>

                            </div>  
                        
                        </form>

                    </div>

                    <div class="ps-form__footer">

                        <p>Se connecter avec:</p>

                        <ul class="ps-list--social">

                            <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a class="google" href="#"><i class="fab fa-google"></i></a></li>

                        </ul>

                    </div>

                </div><!-- End Login Form -->

                <!--=====================================
                Register Form
                ======================================--> 

                <div class="ps-tab active" id="register">

                    <div class="ps-form__content">

                        <h5>Creer un Compte</h5>

                        <form action="{{ route('user.create') }}" method="POST">

                            @csrf

                            <div class="form-group">

                                <input class="form-control" type="text" name="firstname" placeholder="Entrer votre Nom">
                                
                                @error('firstname')
                                    <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <input class="form-control" type="text" name="lastname" placeholder="Entrer votre Prenom">

                                @error('lastname')
                                    <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <input class="form-control" type="email" name="email" placeholder="Saisir votre Email">

                                {{-- @error('email')
                                    <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                @enderror --}}

                            </div>

                            <div class="form-group">

                                <input class="form-control" type="text" name="phone" placeholder="Numero de telephone">
                                {{-- @error('phone')
                                    <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                @enderror --}}

                            </div>

                            <div class="form-group">

                                <input class="form-control" type="password" name="password" placeholder="Saisir un mot de passe">

                                {{-- @error('password')
                                    <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                @enderror --}}

                            </div>

                            <div class="form-group submtit">

                                <button type="submit" class="ps-btn ps-btn--fullwidth">Valider</button>

                            </div>

                        </form>

                    </div>

                    <div class="ps-form__footer">

                        <p>Se connceter avec:</p>

                        <ul class="ps-list--social">

                            <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a class="google" href="#"><i class="fab fa-google"></i></a></li>

                        </ul>

                    </div>

                </div><!-- End Register Form -->

            </div>

        </div>

    </div>

</div>

@endsection

