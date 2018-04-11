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
       <?php 
       $data=$this->session->flashdata('sukses');
       if($data!=""){ ?>
       <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
       <?php } ?>
       <?php 
       $data2=$this->session->flashdata('error');
       if($data2!=""){ ?>
       <div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
       <?php } ?>
       <div class="card mb-3">
        <div class="card-header">
          <div class="card-body">
            <!-- <a href="<?php echo site_url('SekdepC/pengajuan_kegiatan_pegawai')?>" class="btn btn-info"><i class="icon_plus_alt2"> </i> Ajukan Kegiatan</a> -->
            <a class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="icon_plus_alt2"> </i> Ajukan Kegiatan </a>
            <div class="table-responsive">
               <!-- <?php
                  var_dump($data_kegiatan);
                  ?> -->
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <!-- <th>No. Identitas</th> -->
                        <th>Nama Kegiatan</th>
                        <th>Tgl Pengajuan</th>
                        <th>Tgl Kegiatan</th>
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
                          <?php 
                          $tgl_pengajuan = $kegiatan->tgl_pengajuan;
                          $new_tgl_pengajuan = date('d-m-Y',strtotime($tgl_pengajuan));
                          $tgl_kegiatan = $kegiatan->tgl_kegiatan;
                          $new_tgl_kegiatan = date('d-m-Y', strtotime($tgl_kegiatan));
                          ?>
                          <td><?php echo $new_tgl_pengajuan; ?></td>
                          <td><?php echo $new_tgl_kegiatan; ?></td>
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

    <div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title">Pengajuan Kegiatan</h4>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="panel-body">
               <div class="alert alert-danger">
                <ol type="1"> <strong>Perhatian !</strong>
                  <li>Isi <b>Nama Kegiatan</b> sesuai dengan kegiatan yang ingin dilaksanakan.</li>
                  <li>Pengisian <b>Tanggal Kegiatan</b> minimal <b>1 bulan</b> setelah tanggal pengajuan.</li>
                  <li>Pengisian <b>Dana yang diajukan</b> hanya menggunakan <b>angka</b> tanpa <b>titik(.)</b>.</li>
                  <li>Berkas yang diunggah hanya <b>satu(1)</b> berupa berkas <b>.pdf</b>. Apabila membutuhkan lebih dari satu berkas, maka harus dijadikan satu berkas <b>.pdf</b>.</li>
                  <li>Data yang sudah mendapat persetujuan <b>tidak dapat diubah</b>.</li>
                </ol>
              </div>
              <?php echo form_open_multipart('Kepala_unitC/post_pengajuan_kegiatan_pegawai');?>
              <form role="form" action="<?php echo base_url(); ?>Kepala_unitC/post_pengajuan_kegiatan_pegawai" method="post">
                <!-- Alert -->
                <!-- sampai sini -->
                <div class="form-group">
                  <!-- <label>ID Pengguna Jabatan</label> -->

                  <input class="form-control" type="hidden" id="no_identitas" name="no_identitas" value="<?php echo $data_diri->no_identitas;?>" required> <!-- ambil id_pengguna_jabatan berdasarkan user yang login-->
                </div>
                <div class="form-group">
                  <!-- <label>Kode Jenis Kegiatan</label> -->
                  <?php 
                  if($data_diri->kode_jabatan == '5'){
                    ?>  
                    <input class="form-control" type="hidden" id="kode_jenis_kegiatan" name="kode_jenis_kegiatan" value="2" required>
                    <?php
                  }else{
                    ?>
                    <input class="form-control" type="hidden" id="kode_jenis_kegiatan" name="kode_jenis_kegiatan" value="1" required>
                    <?php
                  }
                  ?>
                </div>
                <div class="form-group">
                  <label>Nama Kegiatan</label>
                  <input class="form-control" placeholder="Nama Kegiatan" type="text" id="nama_kegiatan" name="nama_kegiatan" required>
                  <span class="text-danger" style="color: red;"><?php echo form_error('nama_kegiatan'); ?></span>  
                </div>
                <div class="form-group">
                  <label>Tanggal Kegiatan</label>
                  <input type="date" class="form-control" placeholder id="tgl_kegiatan" name="tgl_kegiatan" required>
                  <span class="text-danger" style="color: red;"><?php echo form_error('tgl_kegiatan'); ?></span>  
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" placeholder id="tgl_pengajuan" name="tgl_pengajuan" required value="<?php echo date('Y-m-d');?>">
                </div>
                <div class="form-group">
                  <label>Dana yang diajukan</label>
                  <input class="form-control" placeholder="Dana yang diajukan" type="text" id="dana_diajukan" name="dana_diajukan" required>
                  <span class="text-danger" style="color: red;"><?php echo form_error('dana_diajukan'); ?></span>  
                </div>
                <div class="form-group">
                  <input class="form-control" type="hidden" id="dana_disetujui" name="dana_disetujui" value="0">
                </div>

                <div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>
                <div class="form-group">
                  <label>Unggah Berkas</label>
                  <input type="file" name="file_upload">
                </div>
              </div> 
              <!-- <button type="reset" class="btn btn-default">Reset Button</button> -->
              <div class="modal-footer">
                <input type="submit" class="btn btn-info col-lg-2"  value="Submit">
              </div> 
              <?php echo form_close()?>
            </form>
          </div>
          <div class="col-lg-1"></div>
        </div>
      </div>
    </div>
  </div>