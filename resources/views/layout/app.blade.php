<!DOCTYPE html>
<html>
    <head>
        <title>Prova Bh Software</title>
        <meta charset="UTF-8">        
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">      
        <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">        
        <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">        
        <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">   
        <link rel="stylesheet" href="{{asset('css/fileinput.css')}}">
        <link rel="stylesheet" href="{{asset('css/prova.css')}}"> 
        <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}"> 
        <link rel="stylesheet" href="{{asset('css/dataTables.responsive.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/bootstrap-glyphicons.css')}}" />        
        <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
        <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">          
        
    </head>
    <body class="hold-transition skin-blue sidebar-mini">    
        <div id="loader"></div>
        <div class="wrapper">
            <header class="main-header">
                <a href="index2.html" class="logo">                   
                    <span class="logo-mini"><b>HV</b>V</span>                    
                    <span class="logo-lg"><b>BH Software</b></span>
                </a>                
                <nav class="navbar navbar-static-top" role="navigation">                   
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Navegação</span>
                    </a>                                                              
                </nav>
            </header>            
            <aside class="main-sidebar">            
                <section class="sidebar">                    
                    <ul class="sidebar-menu">
                        <li class="header"></li>                                               
                        <li class="treeview">
                            <a href="{{route('prova.alunos.index')}}">
                                <i class="fa fa-user"></i>
                                <span>Alunos</span>                                
                            </a>                            
                        </li>   
                        <li class="treeview">
                            <a href="{{route('prova.cursos.index')}}">
                                <i class="fa fa-book"></i>
                                <span>Curso</span>                                
                            </a>                            
                        </li> 
                        <li class="treeview">
                            <a href="{{route('prova.matriculas.index')}}">
                                <i class="fa fa-envelope"></i>
                                <span>Matrícula</span>                                
                            </a>                            
                        </li>
                                                                                                                 
                    </ul>
                </section>                
            </aside>
            <div class="content-wrapper">
                <section class="content">          
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border texto_center">
                                    <h3 class="box-title2">@yield('titulo')</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>                        
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">   
                                            @include('flash::message')
                                            @yield('content')                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
             
        <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>            
        <script src="{{asset('js/bootstrap.min.js')}}"></script>  
        <script src="{{asset('js/fileinput.js')}}"></script>
        <script src="{{asset('js/jquery.mask.js')}}"></script>
        <script src="{{asset('js/app.min.js')}}"></script>
        <script src="{{asset('js/datatables.min.js')}}"></script>
        <script src="{{asset('js/datatables.responsive.min.js')}}"></script>
        <script src="{{asset('js/jquery-ui.min.js')}}"></script>                
        <script src="{{asset('js/prova.js')}}"></script>
    </body>
</html>



