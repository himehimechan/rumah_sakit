<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="<?=base_url()?>assets/images/logo.ico" type="image/ico" />

    <title>RS | Rumah Sakit</title>
    <!-- Bootstrap -->
    <link href="<?=base_url()?>assets_admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url()?>assets_admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url()?>assets_admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?=base_url()?>assets_admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?=base_url()?>assets_admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?=base_url()?>assets_admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?=base_url()?>assets_admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Datatables -->
    
    <link href="<?=base_url()?>assets_admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets_admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets_admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets_admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets_admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- dropify -->
    <link href="<?php echo base_url()?>assets_admin/dropify/dist/css/dropify.min.css" rel="stylesheet">

    <!-- tinymce -->
    <script src="https://cdn.tiny.cloud/1/95kbhnf23p08402a30oku8321e2mkxtftoz1bn6dp30pddhm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Custom Theme Style -->
    <link href="<?=base_url()?>assets_admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?=base_url()?>admin" class="site_title"><span>ADMIN DASHBOARD</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url()?>assets_admin/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$this->session->userdata('username');?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?=base_url()?>admin"><i class="fa fa-home"></i> Home</a>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Data</h3>
                <ul class="nav side-menu">
                  <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2) { ?>
                  <li class="<?php if($this->session->userdata('halaman') == 'dokter'){ echo 'active'; } ?>"><a href="<?=base_url()?>dokter"><i class="fa fa-plus-square"></i> Dokter</a>
                  </li>
                  <?php } ?>
                  <?php if ($this->session->userdata('role') == 4 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 1) { ?>
                  <li class="<?php if($this->session->userdata('halaman') == 'pasien'){ echo 'active'; } ?>"><a href="<?=base_url()?>pasien"><i class="fa fa-users"></i> Pasien</a>
                  </li>
                  <?php } ?>
                  <?php if ($this->session->userdata('role') == 1) { ?>
                  <li class="<?php if($this->session->userdata('halaman') == 'user'){ echo 'active'; } ?>"><a href="<?=base_url()?>user"><i class="fa fa-users"></i> User</a>
                  </li>
                  <?php } ?>
                  <li class="<?php if($this->session->userdata('halaman') == 'chart'){ echo 'active'; } ?>"><a href="<?=base_url()?>chart"><i class="fa fa-bar-chart"></i> Chart</a>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Farmasi</h3>
                <ul class="nav side-menu">
                  <li class="<?php if($this->session->userdata('halaman') == 'obat'){ echo 'active'; } ?>"><a href="<?=base_url()?>obat"><i class="fa fa-medkit"></i> Data Obat</a>
                  </li>
                  <li class="<?php if($this->session->userdata('halaman') == 'pasienresep'){ echo 'active'; } ?>"><a href="<?=base_url()?>pasienresep"><i class="fa fa-user-md"></i> Resep Pasien</a>
                  </li>
                  <li class="<?php if($this->session->userdata('halaman') == 'chartobat'){ echo 'active'; } ?>"><a href="<?=base_url()?>chartobat"><i class="fa fa-bar-chart"></i> Chart Obat Pasien</a>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?=base_url()?>assets_admin/images/img.jpg" alt=""><?=$this->session->userdata('username');?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;" data-toggle="modal" data-target=".change_password"> Change Password</a>
                    <a class="dropdown-item"  href="<?=base_url()?>auth/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?=$contents?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Admin | Dashboard
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <div class="modal fade change_password" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?=base_url()?>user/change_password/<?=$this->session->userdata('id')?>">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Change Password</h4>
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group row ">
                <label class="control-label col-md-3 col-sm-3 ">New Password</label>
                <div class="col-md-9 col-sm-9 ">
                  <input type="password" class="form-control" name="new_password" id="new_pass">
                </div>
              </div>
              <div class="form-group row ">
                <label class="control-label col-md-3 col-sm-3 ">Re-Enter New Password</label>
                <div class="col-md-9 col-sm-9 ">
                  <input type="password" class="form-control" name="renew_password" id="renew_pass" onkeyup="checkPass()">
                </div>
              </div>
              <div class="form-group row ">
                <label class="control-label col-md-3 col-sm-3" id="mismatch" style="color:red;">*Value Mismatch</label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="saveChangePass">Save changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?=base_url()?>assets_admin/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?=base_url()?>assets_admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url()?>assets_admin/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?=base_url()?>assets_admin/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?=base_url()?>assets_admin/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?=base_url()?>assets_admin/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?=base_url()?>assets_admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?=base_url()?>assets_admin/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?=base_url()?>assets_admin/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?=base_url()?>assets_admin/vendors/Flot/jquery.flot.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?=base_url()?>assets_admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?=base_url()?>assets_admin/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?=base_url()?>assets_admin/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?=base_url()?>assets_admin/vendors/moment/min/moment.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?=base_url()?>assets_admin/build/js/custom.min.js"></script>

    <!-- Datatables -->
    <script src="<?=base_url()?>assets_admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- dropify -->
    <script src="<?=base_url()?>assets_admin/dropify/dist/js/dropify.min.js"></script>

    <!-- Chart.js -->
    <script src="<?=base_url()?>assets_admin/vendors/Chart.js/dist/Chart.min.js"></script>

    <script>
      $( document ).ready(function() {
        $("#mismatch").hide();

        
      });

      $('#datatables').dataTable( {
        "searching": false,
        "bLengthChange": false,
      } );

      function checkPass() {
        var valPass = $("#new_pass").val();
        var valRenewPass = $("#renew_pass").val();

        if(valPass != valRenewPass) {
          $("#mismatch").show();
          $("#saveChangePass").hide();
        } else {
          $("#mismatch").hide();
          $("#saveChangePass").show();
        }
      }
    </script>
    
  </body>
</html>

