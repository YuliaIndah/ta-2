<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header text-center" style="margin-top: 0;"> Konfigurasi Sistem </h3>
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

       <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active program-title" data-toggle="tab" href="#1" role="tab"><span class="glyphicon glyphicon-user"></span><br class="hidden-md-up"> Jabatan </a>
        </li>
        <li class="nav-item">
          <a class="nav-link program-title" data-toggle="tab" href="#2" role="tab"><span class="glyphicon glyphicon-user"></span><br class="hidden-md-up"> Unit </a>
        </li>
        <li class="nav-item">
          <a class="nav-link program-title" data-toggle="tab" href="#3" role="tab"><span class="glyphicon glyphicon-gift"></span><br class="hidden-md-up"> Jenis Barang </a>
        </li>
        <li class="nav-item">
          <a class="nav-link program-title" data-toggle="tab" href="#4" role="tab"><span class="glyphicon glyphicon-list-alt"></span><br class="hidden-md-up"> Jenis Kegiatan </a>
        </li>
        <li class="nav-item">
          <a class="nav-link program-title" data-toggle="tab" href="#5" role="tab"><span class="glyphicon glyphicon-time"></span><br class="hidden-md-up"> Nama Progress </a>
        </li>
        <li class="nav-item">
          <a class="nav-link program-title" data-toggle="tab" href="#6" role="tab"><span class="glyphicon glyphicon-ok"></span><br class="hidden-md-up"> Persetujuan Kegiatan </a>
        </li>
      </ul>
    </div>
  </div>
  <!-- project team & activity end -->

  <div class="row">
   <div class="col-md-2 col-lg-2 col-sm-12">
   </div>

   <div class="col-md-8 col-lg-8 col-sm-12">
    <div class="tab-content" >
      <!-- Data tabel jabatan-->
      <div id="1" class="tab-pane active" role="tabpanel">
        <div class="row pt-5">
          <div class="col-lg-12">
            <div style="margin-top: 20px;">
             <a class="btn btn-info" data-toggle="modal" data-target="#modal_tambah_jabatan"><i class="icon_plus_alt2"> </i> Tambah Jabatan </a>
             <div class="table-responsive">
               <table id="jabatan" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th style="width: 10px;">No</th>
                    <th style="width: 10px;">ID</th>
                    <th>Nama Jabatan</th>
                    <th>Status</th>
                    <th style="width: 50px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                 $i=0;
                 foreach ($jabatan as $jabatan) {
                  $i++;              
                  ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $jabatan->kode_jabatan;?></td>
                    <td><?php echo $jabatan->nama_jabatan;?></td>
                    <td><?php echo "status blm ada";?></td>
                    <td class="text-center"> 
                      <a href="#modal_jabatan" id="custId" data-toggle="modal" data-id="<?php echo $jabatan->kode_jabatan;?>" data-toggle="tooltip" title="Edit Jabatan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                    </td>
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

  <!-- modal edit jabatan -->
  <div class="modal fade" id="modal_jabatan" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Jabatan</h4>
        </div>
        <div class="modal-body">
          <div class="fetched-data"></div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <!-- modal tambah jabatan -->
  <div aria-hidden="true" aria-labelledby="modal_tambah_jabatan" role="dialog" tabindex="-1" id="modal_tambah_jabatan" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Tambah Jabatan</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open_multipart('KadepC/tambah_jabatan');?>
          <form role="form" action="<?php echo base_url(); ?>KadepC/tambah_jabatan" method="post">
            <div class="form-group">
              <label>Nama Jabatan</label>
              <input class="form-control" placeholder="Nama Jabatan" type="text" id="nama_jabatan" name="nama_jabatan" required>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-info col-lg-2"  value="Simpan">
            </div> 
            <?php echo form_close()?>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Data tabel unit-->
  <div id="2" class="tab-pane" role="tabpanel">
    <div class="row pt-5">
      <div class="col-lg-12">
       <div style="margin-top: 20px;">
         <a class="btn btn-info" data-toggle="modal" data-target="#modal_tambah_unit"><i class="icon_plus_alt2"> </i> Tambah Unit </a>
         <div class="table-responsive">
           <table id="unit" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th style="width: 10px;">No</th>
                <th style="width: 10px;">ID</th>
                <th> Nama Unit</th>
                <th>Status</th>
                <th style="width: 50px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=0;
              foreach ($unit as $unit) {
                $i++;
                ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $unit->kode_unit;?></td>
                  <td><?php echo $unit->nama_unit;?></td>
                  <td><?php echo "status";?></td>
                  <td class="text-center"> 
                    <a href="#modal_unit" id="custId" data-toggle="modal" data-id="<?php echo $unit->kode_unit;?>" data-toggle="tooltip" title="Edit Unit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                  </td>
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

<!-- modal edit unit -->
<div class="modal fade" id="modal_unit" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Unit</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- modal tambah unit -->
<div aria-hidden="true" aria-labelledby="modal_tambah_unit" role="dialog" tabindex="-1" id="modal_tambah_unit" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Tambah Unit</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('KadepC/tambah_unit');?>
        <form role="form" action="<?php echo base_url(); ?>KadepC/tambah_unit" method="post">
          <div class="form-group">
            <label>Nama Unit</label>
            <input class="form-control" placeholder="Nama Unit" type="text" id="nama_unit" name="nama_unit" required>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-info col-lg-2"  value="Simpan">
          </div> 
          <?php echo form_close()?>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Data tabel jenis_barang-->
<div id="3" class="tab-pane" role="tabpanel">
  <div class="row pt-5">
    <div class="col-lg-12">
      <div style="margin-top: 20px;">
        <a class="btn btn-info" data-toggle="modal" data-target="#modal_tambah_jenis_barang"><i class="icon_plus_alt2"> </i> Tambah Jenis Barang </a>
       <div class="table-responsive">
         <table id="jenis_barang" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="width: 10px;">No</th>
              <th style="width: 10px;">ID</th>
              <th>Nama Jenis Barang</th>
              <th>Status</th>
              <th style="width: 50px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i=0;
            foreach ($jenis_barang as $jenis_barang) {
              $i++;
              ?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $jenis_barang->kode_jenis_barang;?></td>
                <td><?php echo $jenis_barang->nama_jenis_barang;?></td>
                <td><?php echo "status";?></td>
                <td class="text-center"> 
                  <a href="#modal_jenis_barang" id="custId" data-toggle="modal" data-id="<?php echo $jenis_barang->kode_jenis_barang;?>" data-toggle="tooltip" title="Edit Jenis Barang" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                </td>
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

<!-- modal jenis barang -->
<div class="modal fade" id="modal_jenis_barang" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Jenis Barang</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- modal tambah_jenis_barang -->
<div aria-hidden="true" aria-labelledby="modal_tambah_jenis_barang" role="dialog" tabindex="-1" id="modal_tambah_jenis_barang" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Tambah Jenis Barang</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('KadepC/tambah_jenis_barang');?>
        <form role="form" action="<?php echo base_url(); ?>KadepC/tambah_jenis_barang" method="post">
          <div class="form-group">
            <label>Nama Jenis Barang</label>
            <input class="form-control" placeholder="Nama Jenis Barang" type="text" id="nama_jenis_barang" name="nama_jenis_barang" required>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-info col-lg-2"  value="Simpan">
          </div> 
          <?php echo form_close()?>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Data tabel jenis_kegiatan-->
<div id="4" class="tab-pane" role="tabpanel">
  <div class="row pt-5">
    <div class="col-lg-12">
      <div>
       <div class="table-responsive">
         <table id="jenis_kegiatan" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="width: 10px;">No</th>
              <th style="width: 10px;">ID</th>
              <th>Nama Jenis Kegiatan</th>
              <th>Status</th>
              <th style="width: 50px;">Aksi</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
</div>

<!-- modal edit jenis kegiatan -->
<div class="modal fade" id="jenis_kegiatan" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Jenis Kegiatan</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- Data tabel nama_progress-->
<div id="5" class="tab-pane" role="tabpanel">
  <div class="row pt-5">
    <div class="col-lg-12">
      <div>
       <div class="table-responsive">
         <table id="nama_progress" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="width: 10px;">No</th>
              <th style="width: 10px;">ID</th>
              <th>Nama Progress</th>
              <th>Status</th>
              <th style="width: 50px;">Aksi</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
</div>

<!-- modal edit nama_progress -->
<div class="modal fade" id="nama_progress" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Nama Progress/h4>
        </div>
        <div class="modal-body">
          <div class="fetched-data"></div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <!-- Data tabel persetujuan_kegiatan-->
  <div id="6" class="tab-pane" role="tabpanel">
    <div class="row pt-5">
      <div class="col-lg-12">
        <div>
         <div class="table-responsive">
           <table id="persetujuan_kegiatan" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th style="width: 10px;">No</th>
                <th style="width: 10px;">ID</th>
                <th>Nama Pengguna</th>
                <th>Jabatan</th>
                <th>Jenis Kegiatan</th>
                <th>Status</th>
                <th style="width: 50px;">Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal edit Persetujuan kegiatan -->
<div class="modal fade" id="persetujuan_kegiatan" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Persetujuan Kegiatan</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

</div>
</div>
<div class="col-md-2 col-lg-3 col-sm-12">
</div>
</div>

</section>
</section>

<script type="text/javascript">
    // js detail pengajuan
    $(document).ready(function(){
      $('#modal_jabatan').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type : 'get',
              url : '<?php echo base_url().'KadepC/detail_jabatan/'?>'+rowid,
                //data :  'rowid='+ rowid, // $_POST['rowid'] = rowid
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
              }
            });
          });

      $('#modal_unit').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type : 'get',
              url : '<?php echo base_url().'KadepC/detail_unit/'?>'+rowid,
                //data :  'rowid='+ rowid, // $_POST['rowid'] = rowid
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
              }
            });
          });

      $('#modal_jenis_barang').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type : 'get',
              url : '<?php echo base_url().'KadepC/detail_jenis_barang/'?>'+rowid,
                //data :  'rowid='+ rowid, // $_POST['rowid'] = rowid
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
              }
            });
          });
    });
  </script>