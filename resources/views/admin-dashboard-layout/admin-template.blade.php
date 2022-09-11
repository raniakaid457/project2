<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Leaves Manegement system</title>


    <link href="{{asset('mainAssets')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <link href="{{asset('mainAssets')}}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

 
    <div id="wrapper">


        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

          
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3">Leaves managment system</div>
            </a>

            <hr class="sidebar-divider my-0">


            <hr class="sidebar-divider">

  
            <li class="nav-item">
                <a class="nav-link" href="/view-home-page">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Homepage</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/view-staff-management-index">
                    <i class="fas fa-fw fa-users"></i>
                    <span>staff Management</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="/view-user-accounts-index">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Users Account</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/view-settings-index">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/handle-logout">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>Logout</span></a>
            </li>

      
            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
  
        <div id="content-wrapper" class="d-flex flex-column">

      
            <div id="content">

     
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
              
                    <ul class="navbar-nav ml-auto">
                   
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-3 d-none d-lg-inline" style="font-size: 18px; font-weight: bold;">Admin</span>
  
                            </a>
                        </li>
                    </ul>

                </nav>
   
                <div class="container-fluid">


                   @yield('admin-content-page')


                </div>
      

            </div>
  

        

        </div>


    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <script src="{{asset('mainAssets')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('mainAssets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('mainAssets')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{asset('mainAssets')}}/js/sb-admin-2.min.js"></script>
    <script src="{{asset('mainAssets')}}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{asset('mainAssets')}}/js/demo/chart-area-demo.js"></script>
    <script src="{{asset('mainAssets')}}/js/demo/chart-pie-demo.js"></script>

</body>

</html>
