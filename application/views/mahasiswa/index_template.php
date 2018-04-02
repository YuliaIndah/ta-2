<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">

  <title><?php echo $title; ?></title>

  <!-- Bootstrap CSS -->    
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?php echo base_url();?>assets/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?php echo base_url();?>assets/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" />    
  <!-- full calendar css-->
  <link href="<?php echo base_url();?>assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="<?php echo base_url();?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
  <!-- owl carousel -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css" type="text/css">
  <link href="<?php echo base_url();?>assets/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/fullcalendar.css">
  <link href="<?php echo base_url();?>assets/css/widgets.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/css/xcharts.min.css" rel=" stylesheet"> 
  <link href="<?php echo base_url();?>assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
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
      <a href="index.html" class="logo">Sekretaris <span class="lite">Departemen</span></a>
      <!--logo end-->
      <div class="top-nav notification-row">                
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
                <!-- <li id="alert_notificatoin_bar" class="dropdown">
                  <select class="form-control m-bot15">
                    <option>Kepala Departemen</option>
                    <option>Pegawai</option>
                  </select>
                </li> -->
                <!-- user login dropdown start-->
                <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="profile-ava">
                      <img alt="" src="<?php echo base_url();?>assets/img/avatar1_small.jpg">
                    </span>
                    <span class="username">Jenifer Smith</span>
                    <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li class="eborder-top">
                      <a href="<?php echo site_url('MahasiswaC/data_diri')?>"><i class="icon_profile"></i> Data Diri</a>
                    </li>
                    <li>
                      <a href="<?php echo site_url('MahasiswaC/pengaturan_akun')?>"><i class="icon_cogs"></i> Pengaturan Akun</a>
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
                <li class="">
                  <a class="" href="<?php echo site_url('MahasiswaC/')?>">
                    <i class="icon_house_alt"></i>
                    <span>Beranda</span>
                  </a>
                </li>
                <li class="">
                  <a class="" href="<?php echo site_url('MahasiswaC/pengajuan_kegiatan')?>">
                    <i class=" icon_documents_alt"></i>
                    <span>Pengajuan Kegiatan</span>
                  </a>
                </li>
                <li class="">
                  <a class="" href="<?php echo site_url('MahasiswaC/status_pengajuan')?>">
                    <i class="icon_tags_alt"></i>
                    <span>Status Pengajuan</span>
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

        <!-- javascripts -->
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.4.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- bootstrap -->
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
        <!-- nice scroll -->
        <script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- charts scripts -->
        <script src="<?php echo base_url();?>assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="<?php echo base_url();?>assets/js/owl.carousel.js" ></script>
        <!-- jQuery full calendar -->
        <<script src="<?php echo base_url();?>assets/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
        <script src="<?php echo base_url();?>assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
        <!--script for this page only-->
        <script src="<?php echo base_url();?>assets/js/calendar-custom.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.rateit.min.js"></script>
        <!-- custom select -->
        <script src="<?php echo base_url();?>assets/js/jquery.customSelect.min.js" ></script>
        <script src="<?php echo base_url();?>assets/chart-master/Chart.js"></script>

        <!--custome script for all page-->
        <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
        <!-- custom script for this page-->
        <script src="<?php echo base_url();?>assets/js/sparkline-chart.js"></script>
        <script src="<?php echo base_url();?>assets/js/easy-pie-chart.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo base_url();?>assets/js/xcharts.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.autosize.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.placeholder.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/gdp-data.js"></script>  
        <script src="<?php echo base_url();?>assets/js/morris.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/sparklines.js"></script>  
        <script src="<?php echo base_url();?>assets/js/charts.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.min.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
        <script src="<?php echo base_url();?>assets/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>assets/datatables/dataTables.bootstrap.min.js"></script>
        <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation : true,
          slideSpeed : 300,
          paginationSpeed : 400,
          singleItem : true

        });
      });

      //custom select box

      $(function(){
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function(){
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code){
            el.html(el.html()+' (GDP - '+gdpData[code]+')');
          }
        });
      });


      // CSS data DataTable

      $(document).ready(function() {
        $('#example').DataTable();
      } );

    </script>

  </body>
  </html>
