<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">

  <title><?php echo $title; ?></title>

  <link href="<?php echo base_url();?>assets/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" />    
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <script src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery-1.8.3.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatables/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatables/dataTables.bootstrap.min.css">

</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo">Kepala <span class="lite">Departemen</span></a>
      <!--logo end-->
      <div class="top-nav notification-row">                
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <span class="profile-ava">
                <img alt="" src="https://scontent-sit4-1.xx.fbcdn.net/v/t1.0-9/14713754_1299932453374328_2078707598612152427_n.jpg?oh=9d0b1568abe4454dd39499ae6931978e&oe=5B32A923" style="height: 35px;">
              </span>
              <span class="username"><?php echo $data_diri->nama;?></span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="<?php echo site_url('KadepC/data_diri')?>"><i class="icon_profile"></i> Data Diri</a>
              </li>
              <li>
                <a href="<?php echo site_url('KadepC/pengaturan_akun')?>"><i class="icon_cogs"></i> Pengaturan Akun</a>
              </li>
              <li>
                <a href="<?php echo site_url('LoginC/logout')?>"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>      
    <!--header end-->
    <!--sidebar start-->
    <aside>
      <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">                
          <li>
            <a href="<?php echo site_url('KadepC/')?>">
              <i class="icon_house_alt"></i>
              <span>Beranda</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('KadepC/pengajuan_kegiatan')?>">
              <i class="icon_bag_alt"></i>
              <span>Kegiatan Diajukan</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('KadepC/pengguna')?>">
              <i class="icon_profile"></i>
              <span>Daftar Pengguna</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('KadepC/kegiatan_pegawai')?>">
              <i class="icon_ol"></i>
              <span>Daftar Kegiatan</span>
            </a>
          </li>
          <!-- <li>
            <a href="<?php echo site_url('KadepC/pengajuan_kegiatan_pegawai')?>">
              <i class="icon_pencil-edit"></i>
              <span>Ajukan Kegiatan</span>
            </a>
          </li> -->
          <li>
            <a href="<?php echo site_url('KadepC/jabatan')?>">
              <i class="icon_ol"></i>
              <span>Daftar Jabatan</span>
            </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <?php echo $body; ?>
    <!--main content end-->
  </section>
  <!-- container section start -->
  <script src="<?php echo base_url();?>assets/js/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
  <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.4.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>

  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

  <script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.rateit.min.js"></script>
  <!-- custom select -->
  <script src="<?php echo base_url();?>assets/js/jquery.customSelect.min.js" ></script>
  <script src="<?php echo base_url();?>assets/js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery-jvectormap-world-mill-en.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.autosize.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.placeholder.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/gdp-data.js"></script>  
  <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url();?>assets/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>assets/datatables/dataTables.bootstrap.min.js"></script>
  <script>

      // CSS data DataTable

      // $(document).ready(function() {
      //   $('#example').DataTable();
      // } );
      $(document).ready(function() {
        var table = $('#example').DataTable();
        
        $("#example tfoot th").each( function ( i ) {
          var select = $('<select><option value=""></option></select>')
          .appendTo( $(this).empty() )
          .on( 'change', function () {
            table.column( i )
            .search( $(this).val() )
            .draw();
          } );
          
          table.column( i ).data().unique().sort().each( function ( d, j ) {
            select.append( '<option value="'+d+'">'+d+'</option>' )
          } );
        } );
      } );
    </script>

  </body>
  </html>
