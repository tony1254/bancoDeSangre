<!DOCTYPE html>
<html lang="en">
<!-- {{$color_main="blue darken-4"}} -->
<head>
    <meta charset="utf-8">
    
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title> @yield('title','Banco de Sangre')</title>
<!--Import Google Icon Font-->
     

    <link href="\bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="\bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.min.css" rel="stylesheet">
    <link href="\bower_components/bootstrap-material-design/dist/css/ripples.min.css" rel="stylesheet">
    <link href="\bower_components/Materialize/dist/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="\bower_components/bootstrap/dist/css/font-awesome.min.css">
    <link href="\bower_components\material-design-icons\iconfont\material-icons.css" rel="stylesheet">



<style type="text/css">   
ul.side-nav li a
{text-decoration:none;   }  
a.btn-flat
{text-decoration:none;   }  
ul.dropdown-content li a
{text-decoration:none;   }  
ul.dropdown-content a
{text-decoration:none;   }   
ul.nav a
{text-decoration:none;   } 
ul.ico li a
{text-decoration:none;   } 
ul.tabs li a
{text-decoration:none;   } 
</style>
<link rel="icon" type="image/png" href="\bower_components/contenido/icono-o-1.png" />

</head>

<body id="app-layout">

<!-- BARRA MATERIALIZER -->
<nav class="navbar-fixed-top navbar "> 
  <!-- -----------------------------------------BARRA NORMAL------------------------------------------------------------------ -->
    <div class="nav-wrapper {{$color_main}} ">

       <div class="container-fluid">
            <div class="navbar-header">
                        <ul class="ico" >
                             <li >
                               
                             <a  class="nounderline grey-text text-lighten-5 navbar-toggle collapsed  button-collapse " data-activates="mobile"  data-toggle="collapse" >
                        
                          <span class="fa fa-bars fa-2x" style="  vertical-align: top;"></span>
                    
                              </a>
                     
                             </li>
                             </ul>
                           <ul>
      
                        <li>
                              
                           <a class="brand-logo" href="{{ url('/') }}" >
    <font size=4 style="  vertical-align: middle;">
    <span class="fa-stack fa-lg  fa-1x " >
                           <img alt="Responsive " class="img-responsive img-rounded " src="\bower_components/contenido/icono-o-1.png" >
                           </span>
                           </font>
                     <!--      <h6>
                        <span class="fa-stack fa-lg  fa-1x ">
                          <i class="fa fa-archive fa-stack-2x "></i>
                          <i class="fa fa-tint fa-stack-2x red-text text-accent-4"></i>

                        </span>
                          </h6>   -->

                    </a>
                        </li>

                    </ul>


            </div>
          
                 
                        


                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar NORMAL-->
                    <ul class="nav navbar-nav">
                        <a href="{{ url('/') }}"> </a>
                    </ul>
                    <ul class="nav navbar-nav">
                        <a href="{{ url('/') }}"> </a>
                    </ul>
                    <ul class="nav navbar-nav">
                        <a class="nounderline grey-text text-lighten-5" href="{{ url('/home') }}"> Banco de Sangre</a>
                    </ul>

                    <!-- Right Side Of Navbar NORMAL-->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <a class="nounderline grey-text text-lighten-5" href="{{ url('/login') }}">Login</a>
                            <a class="nounderline grey-text text-lighten-5" href="{{ url('/register') }}">Registro</a>
                        @else
                   
                        <!-- Dropdown contenido -->

                        <ul id="link" class="dropdown-content">
                                <li class="divider"></li>
                                <li>
                                     <a href="{{ url('/admin') }}" class=" nounderline black-text waves-effect waves-light "><i class="fa  fa-exchange "></i>&nbsp;&nbsp;Transacciones</a>
                                </li>
                                <li>
                                     <a href="{{ url('/admin/usuario') }}" class=" nounderline black-text waves-effect waves-light "><i class="fa  fa-users "></i>&nbsp;&nbsp;Usuarios</a>
                                </li>
                                <li>
                                     <a href="{{ url('/admin/persona') }}" class=" nounderline black-text waves-effect waves-light "><i class="fa  fa-universal-access "></i>&nbsp;&nbsp;Personas</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                     <a href="{{ url('/admin') }}" class=" nounderline black-text waves-effect waves-light "><i class="fa  fa-user-md "></i>&nbsp;&nbsp;&nbsp;Perfil</a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}" class=" nounderline deep-orange-text waves-effect waves-light "><i class="fa  fa-sign-out "></i>&nbsp;&nbsp;Cerrar Sesion</a>
                                </li>
                        </ul>   
                        <!-- Dropdown Trigger -->
    
                                <a class="dropdown-button white-text" href="#!" data-activates="link"  >
                                   <i class="fa  fa-user-md left " ></i>{{ Auth::user()->name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span></a>

                        @endif
                    </ul>
                </div>


            </div>
        <!-- -----------------------------------------BARRA slide------------------------------------------------------------------ -->
 <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content  ">
      
          <a class="nounderline " href="{{ url('/admin') }}">
            <i class="fa fa-user-md  center"></i>
            Perfil
          </a>  
       
          <a href="{{ url('/logout') }}" class="  deep-orange-text  btn-lg btn-block" >
            <i class="fa fa-btn fa-sign-out ">
            </i>Cerrar Sesion
          </a>
         
       
        </ul>

             
      <ul class="side-nav   " id="mobile">
        

         @if (Auth::guest())
        <li><a class="nounderline  " href="{{ url('/home') }}"> Banco de Sangre</a></li>
        <li><a class="nounderline  "href="{{ url('/login') }}">Login</a></li>
        <li><a class="nounderline "href="{{ url('/register') }}">Register</a></li>


        
        @else
        <li  class="nounderline blue darken-3 ">
        <div class="nounderline  white-text">
          <div class="text-center">
           

        </div>
           
                              
                           <a class="brand-logo white-text btn-block text-center" href="{{ url('/') }}">
    <font size=4>
    <span class="fa-stack fa-lg  fa-2x ">
                           <img alt="Responsive " class="img-responsive img-rounded " src="\bower_components/contenido/icono-o-1.png">
                           </span>
                           </font>
                   
<div class="row">Banco de Sangre</div>
                    </a><br>
                  <br>
           <a class=" row nounderline dropdown-button  white-text" href="#" data-activates="dropdown1">
           
                  <div class="col-xs-10 text-left">
                    {{substr(Auth::user()->name , 0, 15)}}...
                  </div>
                  <div class="col-xs-2 text-right">
                    <i class="fa fa-angle-down " aria-hidden="true"></i>
                    </div>
            </a>             
        
</div>
        </li>
        
              <!-- Dropdown Trigger -->
              <li>
                <a class=" nounderline " href="{{ url('/home') }}" >
                  <div class="col-xs-2 " >
                     <span class="fa fa-retweet  "aria-hidden="true" ></span>
                </div>
                  <div class="col-xs-5 " >
                    Transacciones
                  </div>

                </a>
                  <a class="nounderline " href="{{ url('/admin/usuario') }}" >
                  <div class="col-xs-2 ">
                     <span class="fa fa-user  " aria-hidden="true"></span>
                </div>
                  <div class="col-xs-10 " >
                    Usuarios
                  </div>
                </a>
                <a class="nounderline " href="{{ url('/admin/usuario') }}" >
                  <div class="col-xs-2 ">
                     <span class="fa fa-universal-access  " aria-hidden="true"></span>
                </div>
                  <div class="col-xs-10 " >
                    Personas
                  </div>
                </a>
              </li>
  
 
        @endif
      </ul>
    </div>
  </nav>

<br>
<br>
<br>
    
            <script src="\bower_components/jquery/dist/jquery.min.js"></script>

    
            <script src="\bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="\bower_components/bootstrap-material-design/dist/js/ripples.min.js"></script>
            <script src="\bower_components/bootstrap-material-design/dist/js/material.min.js"></script>
            <script src="\bower_components/Materialize/dist/js/materialize.min.js"></script>
            <script src="\bower_components/maskara.js"></script>
    


<div>
  
@yield('content')
</div> 

        <script type="text/javascript">
            $(document).on('ready',function(){
                $(".button-collapse").sideNav();
                $.material.init();
                  $('.dropdown-button').dropdown({
                  inDuration: 300,
                  outDuration: 225,
                  constrain_width: true, // Does not change width of dropdown to that of the activator
                  hover: false, // Activate on hover
                  gutter: 0, // Spacing from edge
                  belowOrigin: true, // Displays dropdown below the button
                  alignment: 'left' // Displays dropdown with edge aligned to the left of button
                }
              );

            });
        </script>
<style type="text/css">
   body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
      
</style>
<br>
<br>
</body>
<main>
  
</main>
<footer class="fixed-height  page-footer {{$color_main}} white-text" >
          
          <div class="footer-copyright">
            <div class="container text-center">
            © 2016 <a class="white-text" href="https://www.facebook.com/Tonycby">Luis Garcia</a> 
            <a class="grey-text text-lighten-4 right" href="https://github.com/tony1254/bancoSangre"><i class="fa fa-github fa-2x" aria-hidden="true"></i> Codigo Fuente
              </a>
            </div>
          </div>
        </footer>
<style type="text/css">
    body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
</style>
</html>
