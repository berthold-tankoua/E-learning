<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('512.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('512.png') }}" type="image/x-icon">
    <title>Admin | Login</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend/') }}../assets/css/font-awesome.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome.css') }}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendor_components/bootstrap/dist/css/bootstrap.css') }}">
    <!-- App css-->
    {{-- <link rel="stylesheet" type="text/css" href="../assets/css/style.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/style2.css') }}">
    {{-- <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen"> --}}
    <link id="color" rel="stylesheet" href="{{ asset('backend/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/responsive.css') }}">

  </head>
  <body>
    <!-- login page start-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-5" ><img class="bg-img-cover bg-center" src="{{ asset('backend/images/login/1.png') }}" alt="looginpage"></div>
        <div class="col-xl-7 p-0">    
          <div class="login-card">
            <div>
              <div ><a class="logo text-start" href="index.html"><h1 style="color:black">E-LEARNING <span style="color: rgb(252, 184, 0);">Login</p></h1></a></div>
              <div class="login-main"> 

                <form action="{{ route('admin.check') }}" method="POST" class="theme-form">

                    @if(session('fail'))
                        <div class="alert alert-danger">
                            {{ Session('fail') }}
                        </div>   
                    @endif    

                  @csrf

                  <h4 style="text-align: center;">Se connecter a votre compte</h4>
                  <p style="text-align: center;">Entrer votre Email & Mot de passe</p>
                  
                  <div class="form-group">
                    <label class="col-form-label">Email Addresse</label>
                    <input class="form-control" type="email" name="email" required="" placeholder="Test@gmail.com">

                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                  </div>

                  <div class="form-group">
                    <label class="col-form-label">Mot de passe</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" name="password" required="" placeholder="*********">
                      <div class="show-hide"><span class="show">                         </span></div>
                    </div>
                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                  </div>

                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input type="checkbox" id="mremember_me" name="remember_me" value="remember_me" checked>
                      <label class="text-muted" for="checkbox1">Se souvenir de moi</label>
                    </div>
                    <button class="btn btn-primary btn-block w-100" type="submit" style="background: #fcb800 !important; border: 1px solid #fcb800 !important; ">Se Connecter</button>
                  </div>

                  <p class="mt-4 mb-0 text-center">Pas de compte ?<a class="ms-2" href="#">Creer un compte</a></p>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div> {{-- {{ asset('backend/') }} --}}
      <!-- latest jquery-->
      <script src="{{ asset('backend/../assets/jquery-3.5.1.min.js') }}"></script>
      <!-- Bootstrap js-->
      <script src="{{ asset('backend/vendor_components/bootstrap/dist/js/bootstrap.css') }}"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="{{ asset('backend/../assets/config.js') }}"></script>
      <!-- Plugins JS start-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="{{ asset('backend/../assets/script.js') }}"></script>
      <!-- login js-->
      <!-- Plugin used-->
    </div>
  </body>
</html>