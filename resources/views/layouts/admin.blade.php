
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
    <link rel="canonical" href="https://demo-basic.adminkit.io/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>AdminKit Demo - Bootstrap 5 Admin Template</title>
    <link href="{{asset("admin")}}/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />

    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.5/datatables.min.css" rel="stylesheet">
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  
    <style>
        .breadcrumb{
            display:flex;
            list-style: none!important;
            margin: 0px;
            padding: 0px;
        }        
        .breadcrumb li{
            list-style: none!important;
            padding: 5px 10px;
        }
        .content-header{
            background-color: aqua;
            padding: 10px 0px;
        }
        .content-header h1{
            margin: 0px;
        }
        .card-body{
            padding: 10px 20px!important;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="{{url('Posts')}}">
                    <span class="align-middle">Admin Panel</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Pages
                    </li>
                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="{{route('Category.index')}}" class="nav-link {{ (request()->is('admin/post*')) ? 'active':'' }}">
                            <i class="fa-solid fa-layer-group"></i> <span
                                class="align-middle">Category for Diet </span>
                        </a>
                    </li>

                    
                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="{{route('Posts.index')}}" class="nav-link {{ (request()->is('admin/post*')) ? 'active':'' }}">
                            <i class="fa-solid fa-pen-to-square"></i> <span
                                class="align-middle">Post for Diet </span>
                        </a>
                    </li>
                    
                    
                   
                
                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="{{route('Recipe.index')}}" class="nav-link {{ (request()->is('admin/post*')) ? 'active':'' }}">
                            <i class="fa-solid fa-pen-to-square"></i> <span
                                class="align-middle">Post for Receipe</span>
                        </a>
                    </li>
                    

                   
                </ul>
            </div>
        </nav>

        <div class="main">
            @yield('content')
        </div>


    </div>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.5/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</body>

</html>
