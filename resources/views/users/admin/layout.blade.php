    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Perpustakaan Online</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Hakko Bio Richard">
        <meta name="keywords" content="Perpus, Website, Aplikasi, Perpustakaan, Online">
        <!-- bootstrap 3.0.2 -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="{{ asset('css/morris/morris.css') }}" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="{{ asset('css/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="{{ asset('css/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
        <!-- Daterange picker -->
        <link href="{{ asset('css/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="{{ asset('css/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <!-- Theme style -->
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet" type="text/css" />

        </style>
    </head>

    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="" class="logo">
                Perpustakaan Online
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span>{{ Auth::user()->name }} <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>

                                <li>
                                    <a href="detail-admin.php?hal=edit&kd=">
                                        <i class="fa fa-user fa-fw pull-right"></i>
                                        Profile
                                    </a>
                                    <a href="admin.php">
                                        <i class="fa fa-cog fa-fw pull-right"></i>
                                        Settings
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                        <button>LOGOUT</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div>
                            <center><img src="" /></center>
                        </div>
                        <div class="info">
                            <center>
                                <p>{{ Auth::user()->name }}</p>
                            </center>

                        </div>
                    </div>
                    <ul class="sidebar-menu">
                        @role('kajur')
                        <li class="active">
                            <a href="{{route('dashboard')}}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        @endrole
                        @role('admin')
                        <li class="active">
                            <a href="{{route('dashboard')}}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span>Data Anggota</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{route('admin.index')}}"><i class="fa fa-angle-double-right"></i> Data Anggota</a></li>
                                <li><a href="{{route('register')}}"><i class="fa fa-angle-double-right"></i> Tambah Anggota</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Data Buku</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{route('books.index')}}"><i class="fa fa-angle-double-right"></i> Data Buku</a></li>
                                <li><a href="{{route('books.create')}}"><i class="fa fa-angle-double-right"></i> Tambah Buku</a></li>
                            </ul>
                        </li>
                        @endrole

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-globe"></i>
                                <span>Transaksi</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                @role('admin')
                                <li><a href="{{route('Transaksi.index')}}"><i class="fa fa-angle-double-right"></i> Data Transaksi</a></li>
                                @endrole
                                @role('kajur')
                                <li><a href="{{route('Transaksi.index')}}"><i class="fa fa-angle-double-right"></i> Data Transaksi</a></li>
                                <li><a href="{{route('Transaksi.create')}}"><i class="fa fa-angle-double-right"></i> Input Transaksi Pinjam</a></li>
                               
                                <li><a href="{{route('anggota.index')}}"><i class="fa fa-angle-double-right"></i> Transaksi Saya</a></li>
                                
                                @endrole
                                @role('user')
                                <li><a href="{{route('Transaksi.create')}}"><i class="fa fa-angle-double-right"></i> Input Transaksi Pinjam</a></li>
                                <li><a href="{{route('anggota.index')}}"><i class="fa fa-angle-double-right"></i> Transaksi Saya</a></li>
                                @endrole
                                
                            </ul>
                        </li>
                        @role('admin')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-lock"></i>
                                <span>Data Admin</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{route('add-admin.index')}}"><i class="fa fa-angle-double-right"></i> Data Admin</a></li>
                            </ul>
                        </li>
                        @endrole
                        @role('admin')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-file"></i>
                                <span>laporan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Laporan Anggota</a></li>
                                <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Laporan Buku</a></li>
                                <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Laporan Peminjaman Buku</a></li>
                                <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Laporan Pengembalian Buku</a></li>
                            </ul>
                        </li>
                        @endrole
                        @role('kajur')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-file"></i>
                                <span>laporan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Laporan Anggota</a></li>
                                <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Laporan Buku</a></li>
                                <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Laporan Peminjaman Buku</a></li>
                                <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Laporan Pengembalian Buku</a></li>
                            </ul>
                        </li>
                        @endrole
                        <li>
                            <a href="tentang.php">
                                <i class="fa fa-envelope"></i> <span>Tentang PerPusWeb</span>
                            </a>
                        </li>


                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <aside class="right-side">
                @yield('content')
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="{{ asset('js/jquery-ui-1.10.3.min.js') }}" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('js/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>

        <script src="{{ asset('js/plugins/chart.js') }}" type="text/javascript"></script>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
        <!-- calendar -->
        <script src="{{ asset('js/plugins/fullcalendar/fullcalendar.js') }}" type="text/javascript"></script>

        <!-- Director App -->
        <script src="{{ asset('js/Director/app.js') }}" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('js/Director/dashboard.js') }}" type="text/javascript"></script>

        <!-- Director for demo purposes -->
    </body>

    </html>