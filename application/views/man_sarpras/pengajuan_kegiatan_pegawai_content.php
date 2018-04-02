<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header" style="margin-top: 0;"><i class="fa fa-pencil"></i> Pengajuan Kegiatan </h3>
        <!-- <ol class="breadcrumb">
          <li><i class="fa fa-user"></i><a href="#">Pegawai</a></li>
          <li><i class="fa fa-pencil"></i>Pengajuan Kegiatan</li>                
        </ol> -->
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-6">
        <div class="panel-body mt-2">
          <?php echo form_open_multipart('Man_sarprasC/post_pengajuan_kegiatan_pegawai');?>
          <form role="form" action="<?php echo base_url(); ?>Man_sarprasC/post_pengajuan_kegiatan_pegawai" method="post">
            <!-- Alert -->
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
            <!-- sampai sini -->
            <div class="form-group">
              <!-- <label>ID Pengguna Jabatan</label> -->

              <input class="form-control" type="hidden" id="id_pengguna_jabatan" name="id_pengguna_jabatan" value="<?php echo $data_diri->id_pengguna_jabatan;?>" required> <!-- ambil id_pengguna_jabatan berdasarkan user yang login-->
            </div>
            <div class="form-group">
              <!-- <label>Kode Jenis Kegiatan</label> -->
              <?php 
              if($data_diri->kode_jabatan == '7' || $data_diri->kode_jabatan == '8' || $data_diri->kode_jabatan == '9'){
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
            <input type="submit" class="btn btn-info col-lg-2"  value="Submit">
            <!-- <button type="reset" class="btn btn-default">Reset Button</button> -->
          </form>
          <?php echo form_close()?>

        </div>
      </div>
      <div class="col-lg-4">
        <div class="alert alert-danger" style="margin-top: 53px;">
          <ol type="1"> <strong>Perhatian !</strong>
            <li>Isi <b>Nama Kegiatan</b> sesuai dengan kegiatan yang ingin dilaksanakan.</li>
            <li>Pengisian <b>Tanggal Kegiatan</b> minimal <b>1 bulan</b> setelah tanggal pengajuan.</li>
            <li>Pengisian <b>Dana yang diajukan</b> hanya menggunakan <b>angka</b> tanpa <b>titik(.)</b>.</li>
            <li>Berkas yang diunggah hanya <b>satu(1)</b> berupa berkas <b>.pdf</b>. Apabila membutuhkan lebih dari satu berkas, maka harus dijadikan satu berkas <b>.pdf</b>.</li>
            <li>Data yang sudah mendapat persetujuan <b>tidak dapat diubah</b>.</li>
          </ol>
        </div>
      </div>
      <div class="col-lg-1"></div>
    </div>

  </section>
  <div class="text-center">
    <div class="credits">
      <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
</section>
<!-- <script>
function konfirmasi() {
    confirm("Apakah anda yakin data yang anda isikan sudah benar?");
}
</script> -->