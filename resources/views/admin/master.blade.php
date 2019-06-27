<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <base href="{{ asset('') }}">
        <title>{{ trans('label.title') }}</title>
        <!-- Custom fonts for this template-->
        <link href="{{ config('home.template.font_css') }}" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-- >
        <link href="{{ config('home.template.plugin') }}" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="{{ config('home.template.css') }}" rel="stylesheet">
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="#">{{ trans('label.music') }}</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
          <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="{{ trans('label.search') }}" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <!-- Navbar -->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                <!--  <span class="badge badge-danger">9+</span> notify--> 
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                        <a class="dropdown-item" href="#"></a>
                        <a class="dropdown-item" href="#"> </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"></a>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope fa-fw"></i>
                        <span class="badge badge-danger"></span>
                    </a>
                    <div class="dropdown-menu dropdown--right" aria-labelledby="messagesDropdown">
                        <a class="dropdown-item" href="#"></a>
                        <a class="dropdown-item" href="#"> </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"> </a>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#"></a>
                        <a class="dropdown-item" href="#"> </a>
                        <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"></a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="wrapper">
        <!-- Sidebar -->
            <ul class="sidebar navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>{{ trans('label.dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>{{ trans('label.manager') }}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <h6 class="dropdown-header">{{ trans('label.manager') }}:</h6>
                        <a class="dropdown-item" href="{{ route('categories') }}">{{ trans('label.home_category') }}</a>
                        <a class="dropdown-item" href="{{ route('artists') }}">{{ trans('label.artists') }}</a>
                        <a class="dropdown-item" href="{{ route('musics') }}">{{ trans('label.music') }}</a>
                        <a class="dropdown-item" href="{{ route('albums') }}">{{ trans('label.album') }}</a>
                        <a class="dropdown-item" href="{{ route('roles') }}">{{ trans('label.role') }}</a>
                        <a class="dropdown-item" href="#">{{ trans('label.rating') }}</a>
                        <a class="dropdown-item" href="{{ route('users') }}">{{ trans('label.user') }}</a>
                    </div>
                </li>
            </ul>
            <div id="content-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /#wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#">
            <i class="fas fa-angle-up"></i>
        </a>
       <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ trans('label.leave') }}?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ trans('label.cancel') }}</button>
                        <a class="btn btn-primary" href="#">{{ trans('label.logout') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="{{ config('home.template.js') }}"></script>
        <script src="{{ config('home.template.js_boostrap') }}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ config('home.template.js_plugin') }}"></script>
        <!-- Page level plugin JavaScript-->
        <script src="{{ config('home.template.js_chart') }}"></script>
        <script src="{{ config('home.template.js_datatable') }}"></script>
        <script src="{{ config('home.template.js_datatable_boostrap') }}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ config('home.template.js_main') }}"></script>
        <script src="{{ config('home.start_DT') }}"></script>
        <script src="{{ config('home.change_role') }}"></script>
        <script type="text/javascript" src="custom-js/review_image.js"></script>
    </body>
</html>
