<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header" style="margin-top: 0;"><i class="fa fa-pencil"></i>Daftar Kegiatan</h3>
        <!-- <ol class="breadcrumb">
          <li><i class="fa fa-user"></i><a href="#">Pegawai</a></li>
          <li><i class="fa fa-pencil"></i>Kegiatan</li>                
        </ol> -->
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <div class="card mb-3">
          <div class="card-header">
            <div class="card-body">
              <a href="<?php echo site_url('Man_sarprasC/pengajuan_kegiatan_pegawai')?>" class="btn btn-info"><i class="icon_plus_alt2"> </i> Ajukan Kegiatan</a>
              <div class="table-responsive">
               <!-- <?php
                  var_dump($data_kegiatan);
                  ?> -->
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <!-- <th>No. Identitas</th> -->
                        <th>Nama Kegiatan</th>
                        <th>Tgl Kegiatan</th>
                        <th>Tgl Pengajuan</th>
                        <th>Dana Diajukan</th>
                        <th>Dana Disetujui</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <!-- <tfoot>
                      <tr>
                        <th>Nama</th>
                        <th>No. Identitas</th>
                        <th>Jabatan</th>
                        <th>Jenis Kelamin</th>
                        <th>No. HP</th>
                        <th>Status Email</th>
                        <th>Status Akun</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot> -->
                    <tbody>
                      <?php
                      foreach ($data_kegiatan as $kegiatan) {
                        ?>
                        <tr>
                          <td><?php echo $kegiatan->nama_kegiatan; ?></td>
                          <td><?php echo $kegiatan->tgl_kegiatan; ?></td>
                          <td><?php echo $kegiatan->tgl_pengajuan; ?></td>
                          <td><?php echo $kegiatan->dana_diajukan; ?></td>
                          <td><?php echo $kegiatan->dana_disetujui; ?></td>
                          <td><?php echo 'status'?></td>
                        </tr>

                        <?php
                        # code...
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- project team & activity end -->

      </section>
      <div class="text-center">
        <div class="credits">
          <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </section>