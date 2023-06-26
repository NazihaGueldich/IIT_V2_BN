<!DOCTYPE html>
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Se Connecter - Exachantier</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('welcomepage/assets/img/Fichier 3@3x.png')}}" rel="icon">
  <link href="{{asset('welcomepage/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

<web-particles id="tsparticles" options='{"fps_limit":60,"interactivity":{"detectsOn":"canvas","events":{"onClick":{"enable":true,"mode":"push"},"onHover":{"enable":true,"mode":"repulse"},"resize":true},"modes":{"push":{"particles_nb":4},"repulse":{"distance":200,"duration":0.4}}},"particles":{"color":{"value":"#ffffff"},"links":{"color":"#ffffff","distance":150,"enable":true,"opacity":0.4,"width":1},"move":{"bounce":false,"direction":"none","enable":true,"outMode":"out","random":false,"speed":2,"straight":false},"number":{"density":{"enable":true,"area":800},"value":80},"opacity":{"value":0.5},"shape":{"type":"circle"},"size":{"random":true,"value":5}},"detectRetina":true}'></web-particles>
<script src="https://cdn.jsdelivr.net/npm/tsparticles@1.28.0/dist/tsparticles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@webcomponents/webcomponentsjs@2.5.0/custom-elements-es5-adapter.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@webcomponents/webcomponentsjs@2.5.0/webcomponents-loader.js"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/web-particles@1.1.0/dist/web-particles.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
</head>
<body>

 
  <div class="board">
      <a href="#" id="logout"><i class="fas fa-sign-out-alt"></i></a>
      <div class="container">
        <div class="lightbluebox">
            <div class="login-box">
              <div >
              <h1  style="font-family: serif; font-size:28px;  
                text-decoration: underline;">Connexion</h1>
              <div class="third-party-box">
              </div>
          <br><br><br>  
              <form method="POST" action="{{ route('login') }}">
                @csrf 
            
              <div class="input-group">
                <label for="email"  >
                 </label>
               
                  <input id="email" name="email" required autofocus  placeholder="votre adresse e-mail" />
                                  @error('email')
                   <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror 
                         
                           
                                   <label class="block mt-4 text-sm">
                                   </label> 
                                    <input
                                      id="password"placeholder="*************"
                                      type="password"
                                      name="password"
                                      required autocomplete="current-password"
                                    />
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror 
                    
              </div>         
              </div>
              <div class="col-12">
                <div class="form-check">
                <label for="remember_me" class="inline-flex items-center"  style="margin-left:-50%;">
          <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
          <span class="ml-2 text-sm text-gray-600" style="font-size:14px; font-family: sans-serif; color:rgb(0, 0, 0);font-family: Georgia, serif; ">{{ __('Remember me') }}</span>
      </label>
                </div>
              </div> 
              <br><br><br>
              <button  class="signin-btn"type="submit"  >
         
                <span class="front"  style="color: #fff">Connexion</span>
              </button>
            </form>
    <br>
    <br>
    <br>
            @if (Route::has('password.request'))
              <a  style="font-size:14px;font-family: Georgia, serif; color:rgb(0, 0, 0); margin-left:-6%; "
                class="text-sm font-medium hover:underline" href="{{ route('password.request') }}"> Mot de passe oublié? </a> @endif </p>
</form>
<a   style="font-size:14px; font-family: Georgia, serif;color:rgb(0, 0, 0); margin-left:-13%;"class="text-sm font-medium hover:underline"  href="{{ route('register') }}">
                Créer un compte </a>
</div>
            
            <div class="signup-box">
              <h1>Créer un compte</h1>
              <div class="third-party-box">
                <button class="third-party-btn"><span><i class="fab fa-facebook-f"></i></span></button>
                <button class="third-party-btn"><span><i class="fab fa-google-plus-g"></i></span></button>
                <button class="third-party-btn"><span><i class="fab fa-github"></i></span></button>
              </div>
              <h4>ou utilisez votre email pour vous inscrire</h4>
              <div class="input-group">
                <input id="signUpName" type="text" placeholder="Name">
                <input id="signUpEmail" type="text" placeholder="Email">
                <input id="signUpPassword" type="password" placeholder="Password">
              </div>
              <button id="signUpBtn" class="signin-btn">
                <span class="front">SIGN UP</span>
              </button>
            </div>
        </div>
        <div class="yellowbox">
          <div class="hello">
            <div class="textcontent">
              <h1 class="sayHi" style="margin-top:-10%;margin-left:10%;">Bienvenue !</h1>
              <br>
              <img  classe="img" src="{{asset('images/logo-IIT.png')}}"   style="width:260px ;height:230px ;margin-left:0%; ">
            
          </div>
        
        </div>
      </div>
    </div>

</body>
</html>
<style> 
  body {
    margin: 0;
    font: normal 75% Arial, Helvetica, sans-serif;
  }
  canvas {
    display: block;
    vertical-align: bottom;
  }
  /* ---- tsparticles container ---- */
  #tsparticles {
    position: absolute;
    width: 100%;
    height: 100%;
    background: hsla(220, 23%, 58%, 1);

background: linear-gradient(0deg, rgb(112, 147, 218) 0%, hsla(242, 97%, 25%, 1) 100%);

background: -moz-linear-gradient(0deg, rgb(18, 79, 202) 0%, rgb(117, 114, 203) 100%);

background: -webkit-linear-gradient(0deg, rgb(93, 128, 174) 0%, rgb(19, 16, 84) 100%);

filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#7A8BAC", endColorstr="#06027D", GradientType=1 );
  }
  
  .github {
    bottom: 10px;
    right: 10px;
    position: fixed;
    border-radius: 10px;
    background: #fff;
    padding: 0 12px 6px 12px;
    border: 1px solid #000;
  }
  
  .github a:hover,
  .github a:link,
  .github a:visited,
  .github a:active {
    color: #000;
    text-decoration: none;
  }
  
  .github img {
    height: 30px;
  }
  
  .github #gh-project {
    font-size: 20px;
    padding-left: 5px;
    font-weight: bold;
    vertical-align: bottom;
  }
  .board {
  margin: auto;
  max-width: 700px;
  display: flex;
  justify-content: flex-end;
}

#logout {
  margin-right: 0;
  font-size: 25px;
  cursor: pointer;
  color: rgb(248, 188, 35);
}

.container {
  width: 700px;
  height: 500px;
  border-radius: 30px;
  display: flex;
  box-sizing: border-box;
  overflow: hidden;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  margin: auto;
  box-shadow:3px 3px 9px rgb(202, 202, 195);
}

.lightbluebox {
  width: 350px;
  height: 500px;
  background-color: rgb(233, 239, 245);
  transition: .5s;
  display: flex;
  align-items: center;
  overflow: hidden;
  position: relative;
}

.yellowbox {
  background: -webkit-linear-gradient(0deg, rgb(163, 179, 189) 0%, rgb(137, 156, 169) 80%);
  width: 350px;
  height: 500px;
  transition: .5s;
  z-index: 1;
  display: flex;
  align-items: center;
  overflow: hidden;
  position: relative;
}

.hello {
  width: 310px;
  text-align: center;
  color: white;
  padding: 20px;
  position: absolute;
  transition: .5s;
}

.welcome {
  width: 310px;
  text-align: center;
  color: white;
  padding: 20px;
  position: absolute;
  left: -350px;
  transition: .5s;
}

.signup-btn {
  margin-top: 20px;
  background: rgb(255, 255, 255);
  border-radius: 20px;
  border-top: rgb(0, 0, 0) solid 5px;
  border-left: rgb(80, 61, 247) solid 2px;
  border-right: none;
  border-bottom: none;
  padding: 0;
  cursor: pointer;
  outline-offset: 4px;
  box-shadow: 0 8px 2px rgb(248 188 35), 2px 8px 2px rgb(151, 119, 38);
}

.signup-btn .front {
  display: block;
  padding: 15px 42px 10px 42px;
  border-radius: 20px;
  font-size: 1.25rem;
  background: rgb(148, 148, 148);
  color: white;
  transform: translateY(-2px);
}

.signin-btn {
  margin-top: 10px;
  background: rgb(245, 250, 255);
  border-radius: 20px;
  border-top: rgb(237, 237, 237) solid 3px;
  border-left: none;
  border-right: none;
  border-bottom: none;
  padding: 0;
  cursor: pointer;
  outline-offset: 4px;
  box-shadow: 0 8px 2px rgb(226, 161, 58), 2px 9px 2px rgb(236, 222, 25);
}

.signin-btn .front {
  display: block;
  padding: 15px 42px 10px 42px;
  border-radius: 20px;
  font-size: 1.25rem;
  background: rgb(24, 12, 155) ;
  transform: translateY(-2px);
}

.login-box {
  width: 100%;
  margin: auto;
  text-align: center;
  position: absolute;
  transition: .5s;
}

.signup-box {
  width: 100%;
  margin: auto;
  text-align: center;
  position: absolute;
  left: -350px;
  transition: .5s;
}

.input-group {
  display: flex;
  flex-direction: column;
}

.input-group input {
  margin: auto;
  outline: none;
  border: solid 1px rgb(208, 216, 224);
  border-radius: 10px;
  margin-bottom: 10px;
  width: 80%;
  height: 30px;
  padding: 5px;
}

.signin-btn:active .front, .signup-btn:active .front {
  transform: translateY(-1px);
}

.right, .InBoxRight {
  transform:translate(350px,0)
}

.left {
  transform:translate(-350px,0)
}

.InBoxLeft {
  transform:translate(0px,0)
}

.third-party-btn {
  width: 50px;
  height: 50px;
  border-radius: 100%;
  font-size: 1.25rem;
  cursor: pointer;
  background: rgb(233, 239, 245);
  border: solid 1px rgb(208, 216, 224);
  transform: translateY(-4px);
}

.third-party-btn:active span i {
  transform: translateY(-2px);
}
h:before,
h3:after {
    background-color:#cc941c;
    content: "";
    display: inline-block;
    height: 1px;
    position: relative;
    vertical-align: middle;
    width: 50%;
}
  </style>