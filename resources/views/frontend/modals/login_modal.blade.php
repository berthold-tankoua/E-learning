    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
    <div class="modal-content" style="" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><span id="pname"></span></h5>
        <button type="button" class="close" data-dismiss="modal" id="closeModel" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" >
                <h4 class="">Se Connecter</h4>
                <p class="">Bienvenue veuillez-vous Connecter.</p>
                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Addresse Email <span>*</span></label>
                    <input type="email" id="memail" class="form-control unicase-form-control text-input" name="email" placeholder="Entrer votre Email" >
                    @error('email')
                      <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="info-title" for="exampleInputPassword1">Mot de passe <span>*</span></label>
                      <div style="display: flex;align-items:center;">
                      <input id="mpassword" type="password" class="form-control unicase-form-control text-input" name="password" id="password" placeholder="Saisir votre mot de passe" >
                      <!-- <a style="color: black;font-size:17px;margin-left:15px;"> <i class="fa fa-eye" onclick="showpassword()"></i></a> -->
                      </div>
                      
                      @error('password')
                        <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="radio outer-xs" style="display: flex;justify-content:space-between;">
                    <label>
                      <input type="radio" id="mremember_me" name="remember_me" value="remember_me">Se souvenir de moi !
                    </label>
                   <p>Pas de compte.? <a href="{{ route('user.login') }}">Creer un compte</a></p>
                  </div>
                  </div>
                  <div class="col-md-6 login-modal-show" >
                    <img src="{{ asset('backend/images/login/1.png') }}" style="width: 70%;margin-left:20%">
                  </div>

                </div>	
                  <button type="submit" class="btn-upper btn btn-primary checkout-page-button" onclick="AjaxLogin()">Se connecter</button>			
              </div>
              <!-- Sign-in -->
      </div>

    </div>
  </div>
</div>