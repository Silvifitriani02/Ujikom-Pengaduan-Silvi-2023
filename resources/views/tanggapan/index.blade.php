<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <link href="../dataTables/DataTables-1.10.13/css/jquery.dataTables.css" rel="stylesheet">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="images/logo.png" class="mr-2" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo.png" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <!-- <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span> -->
              </div>
              <!-- <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search"> -->
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <!-- <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a> -->
          <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div> -->
          <li class="nav-item nav-profile dropdown">
            <!-- <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/profile-1506810-1278719.png" alt="profile" />
            </a> -->
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{'user_profile'}}">
                <i class="ti-settings text-primary"></i>
                Profile
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                <i class="ti-power-off text-primary"></i>
                Logout
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="list-wrapper px-3">
            </div>
            <div class="events pt-4 px-3">
            </div>
            <div class="events pt-4 px-3">
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/beranda">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="fa-solid fa-flag"></i> &nbsp &nbsp &nbsp
              <span class="menu-title">Data Pengaduan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/pengaduan">Pengaduan</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="fa-solid fa-reply-all"></i>&nbsp &nbsp &nbsp
              <span class="menu-title">Data Tanggapan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="/tanggapan">Tanggapan</a></li>
              </ul>
            </div>
          </li>
          @if (auth()->user()->role =="admin")
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#data-user" aria-expanded="false" aria-controls="data-user">
              <i class="fa-solid fa-users"></i>&nbsp &nbsp &nbsp
              <span class="menu-title">Data User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="data-user">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="/user">User</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#cetak-laporan" aria-expanded="false" aria-controls="cetak-laporan">
              <i class="fa-solid fa-users"></i>&nbsp &nbsp &nbsp
              <span class="menu-title">Cetak Laporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cetak-laporan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="/user">Pengaduan</a></li>
              </ul>
            </div>
          </li>
          @endif
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold"></h3>
                  <!-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>-->
                </div>
                <div class="container">
                  <div class="card mt-5">
                    <div class="card-header text-center">
                      Data Tanggapan Masyarakat
                    </div>
                    <div class="card-body">
                      <!-- <a href="/tanggapan/create" class="btn btn-primary">Input Tanggapan Masyarakat</a> -->
                      <br />
                      <br />
                      <table class="table table-bordered table-hover table-striped" id="datatables">
                        <thead>
                          <tr>
                            <th>Nik</th>
                            <th>ID Pengaduan</th>
                            <th>Tanggal Tanggapan</th>
                            <th>Tanggapan</th>
                            <th>OPSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($tanggapan as $p)
                          <tr>
                            <td>{{ $p->nik }}</td>
                            <td>{{ $p->id_pengaduan }}</td>
                            <td>{{ $p->tgl_tanggapan }}</td>
                            <td>{{ $p->tanggapan }}</td>
                            <td>
                              <a href="/tanggapan/edit/{{ $p->id_tanggapan }}" class="btn btn-warning">Edit</a>
                              <a href="/tanggapan/destroy/{{ $p->id_tanggapan }}" class="btn btn-danger">Hapus</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <!-- <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
          </div>
        </footer>  -->
                <!-- partial -->
              </div>
              <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
          </div>
          <!-- container-scroller -->

          <!-- plugins:js -->
          <script src="vendors/js/vendor.bundle.base.js"></script>
          <!-- endinject -->
          <!-- Plugin js for this page -->
          <script src="vendors/chart.js/Chart.min.js"></script>
          <script src="vendors/datatables.net/jquery.dataTables.js"></script>
          <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
          <script src="js/dataTables.select.min.js"></script>

          <!-- End plugin js for this page -->
          <!-- inject:js -->
          <script src="js/off-canvas.js"></script>
          <script src="js/hoverable-collapse.js"></script>
          <script src="js/template.js"></script>
          <script src="js/settings.js"></script>
          <script src="js/todolist.js"></script>
          <!-- endinject -->
          <!-- Custom js for this page-->
          <script src="js/dashboard.js"></script>
          <script src="js/Chart.roundedBarCharts.js"></script>
          <!-- End custom js for this page-->

          <script src="../dataTables/DataTables-1.10.13/js/jquery.dataTables.js"></script>

          <script type="text/javascript">
            $(document).ready(function() {
              $('#datatables').DataTable();
            });
          </script>
</body>

</html>