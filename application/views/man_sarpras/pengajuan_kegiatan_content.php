<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header" style="margin-top: 0;"><i class="fa fa-pencil"></i>Kegiatan Diajukan</h3>
       <!--  <ol class="breadcrumb">
          <li><i class="fa fa-user"></i><a href="#">Kepala Departemen</a></li>
          <li><i class="fa fa-pencil"></i>Pengajuan Kegiatan</li>                
        </ol> -->
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card mb-3">
          <div class="card-header">
            <div class="card-body">
              <div class="table-responsive">
                <!-- <?php
                  var_dump($data_pengajuan_kegiatan);
                  ?> -->
                  <table id="example" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                    <thead>
                      <tr class="text-center">
                        <!-- <th>No. Identitas</th> -->
                        <th>Nama Kegiatan</th>
                        <th>Tgl Kegiatan</th>
                        <th>Tgl Pengajuan</th>
                        <th>Dana Diajukan</th>
                        <th>Dana Disetujui</th>
                        <th>File</th>
                        <th>Nama Pengaju</th>
                        <th>Jabatan Pengaju</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($data_pengajuan_kegiatan as $kegiatan) {
                          ?>
                          <tr>
                          <td><?php echo $kegiatan->nama_kegiatan;?></td>
                          <td><?php echo $kegiatan->tgl_kegiatan;?></td>
                          <td><?php echo $kegiatan->tgl_pengajuan;?></td>
                          <td><?php echo $kegiatan->dana_diajukan;?></td>
                          <td><?php echo $kegiatan->dana_disetujui;?></td>
                          <?php $link = base_url()."assets/file_upload/".$kegiatan->nama_file;?>
                          <td class="text-center"><a target="_blank" href="<?php echo $link?>"><span><img src="<?php echo base_url()?>assets/image/logo/pdf.svg" style="height: 30px;"></span></a></td>
                          <td><?php echo $kegiatan->nama;?></td>
                          <td><?php echo $kegiatan->nama_jabatan;?></td>
                          <td></td>
                          </tr>
                          <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="text-center">
        <div class="credits">
          <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </section>