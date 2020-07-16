<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SMAHATMA | Dashboard</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- SEARCH FORM -->
      <div class="input-group input-group-sm col-sm-2">
        <input class="form-control form-control-navbar" type="search" v-model="search" @keyup="searchit" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" @click="searchit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="/Img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SMAHATMA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="picture/profile/{{Auth::user()->photo}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}
            </a>
            <span class="right badge badge-danger">{{Auth::user()->type}}</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
                <router-link to="/dashboard" class="nav-link ">
                  <i class="fas fa-tachometer-alt nav-icon blue" ></i>
                  <p>Dashboard</p>
                </router-link>
              </li>

              <li class="nav-item">
                <router-link to="/profile" class="nav-link ">
                  <i class="fas fa-id-badge nav-icon green"></i>
                  <p>Profile</p>
                </router-link>
              </li>

              <li class="nav-item">
                <router-link to="/GTK" class="nav-link ">
                  <i class="fas fa-graduation-cap nav-icon orange"></i>
                  <p>Guru & Tendik</p>
                </router-link>
              </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-users indigo"></i>
              <p>
                Peserta Didik
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/siswa" class="nav-link ">
                  <i class="fa fa-user nav-icon indigo"></i>
                  <p>Data Peserta Didik</p>
                </router-link>
                <router-link to="/mutasi" class="nav-link ">
                  <i class="fa fa-user nav-icon indigo"></i>
                  <p>Data Mutasi</p>
                </router-link>
                <router-link to="/alumni" class="nav-link ">
                  <i class="fa fa-user nav-icon indigo"></i>
                  <p>Data Alumni</p>
                </router-link>
              </li>

            </ul>

          </li>

          <!-- Sarpras -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-school purple"></i>
              <p>
                Sarpras
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>ssssss</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-wallet purple"></i>
              <p>
                administrasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/uangan" class="nav-link ">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Keuangan</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/ujian" class="nav-link ">
                  <i class="fa fa-money-check nav-icon"></i>
                  <p>Ujian</p>
                </router-link>
              </li>
            </ul>
          </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-graduation-cap yellow"></i>
                <p>
                  Rombongan Belajar
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/reguler" class="nav-link ">
                    <i class="fa fa-book-reader nav-icon"></i>
                    <p>reguler</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/ekskul" class="nav-link ">
                    <i class="fa fa-basketball-ball nav-icon"></i>
                    <p>Ekskul</p>
                  </router-link>
                </li>
              </ul>
            </li>

            @canany(['isSuperUser','isAdmin'])
            <li class="nav-item">
                <router-link to="/developer" class="nav-link ">
                  <i class="fas fa-cogs nav-icon" ></i>
                  <p>Developer</p>
                </router-link>
              </li>
            @endcanany

            @canany(['isSuperUser','isAdmin'])
            <li class="nav-item">
                <router-link to="/setting" class="nav-link ">
                  <i class="fas fa-cogs nav-icon" ></i>
                  <p>Setting</p>
                </router-link>
              </li>
            @endcanany
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="fas fa-power-off nav-icon red"></i>
               <p> {{ __('Logout') }} </p>
              </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
             </form>
            </li>




        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Main Conten -->
        <router-view></router-view>

        <!-- set progressbar -->
        <vue-progress-bar></vue-progress-bar>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019-2020 <a href="http://smaht5.sch.id">SMA HANG TUAH 5 Sidoarjo</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->
  <script src="/js/app.js"></script>
</body>
</html>
