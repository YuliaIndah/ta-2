<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header" style="margin-top: 0;"><i class="fa fa-pencil"></i>Barang Diajukan</h3>
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
                  <table id="example" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                    <thead>
                      <tr class="text-center">
                        <!-- <th>No. Identitas</th> -->
                        <th>Nama Barang</th>
                        <th>File</th>
                        <th>Tgl Pengajuan</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Nama Pengaju</th>
                        <th>Jabatan Pengaju</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($data_pengajuan_barang as $barang) {
                          ?>
                          <tr>
                          <td><?php echo $barang->nama_barang;?></td>
                          <td><img style="height: 50px;" src="<?php echo base_url();?>assets/file_gambar/<?php echo $barang->file_gambar;?>"></td>
                          <td><?php echo $barang->tgl_item_pengajuan;?></td>
                          <td><?php echo $barang->jumlah;?></td>
                          <td><?php echo $barang->status_pengajuan;?></td>
                          <td><?php echo $barang->nama;?></td>
                          <td><?php echo $barang->nama_jabatan;?></td>
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