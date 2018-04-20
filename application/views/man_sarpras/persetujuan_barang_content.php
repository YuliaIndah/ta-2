<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
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
       <h3 class="page-header" style="margin-top: 0;"><i class="fa fa-pencil"></i>Barang Diajukan</h3>
     </div>
   </div>
   <div class="row">
    <div class="col-lg-12">
      <!-- <?php var_dump($detail_barang); ?> -->
      <div class="card mb-3">
        <div class="card-header">
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                <thead>
                  <tr class="text-center">
                    <!-- <th>No. Identitas</th> -->
                    <th>Nama Item Pengajuan Barang</th>
                    <th>Gambar</th>
                    <th>Tgl Pengajuan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Status Pengajuan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($data_persetujuan_barang as $barang) {
                    ?>
                    <tr>
                      <td> 
                       <a href="#" onclick="detail(<?php echo $barang->kode_item_pengajuan; ?>)" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail pengajuan barang"><?php echo $barang->nama_item_pengajuan;?></a> 
                     </td>
                     <td><center><img style="height: 60px;" src="<?php echo base_url();?>assets/file_gambar/<?php echo $barang->file_gambar;?>"></center></td>
                     <td><?php echo $barang->tgl_item_pengajuan;?></td>
                     <td><?php echo $barang->jumlah;?></td>
                     <?php 
                     $jumlah = $barang->jumlah;
                     $harga = $barang->harga_satuan;
                     $total = $jumlah*$harga;
                     ?>
                     <td><?php echo $total;?></td>
                     <td><?php echo $barang->status_pengajuan;?></td>
                     <td><center>
                      <a href="#myModal1" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Aksi" class="btn btn-success btn-sm"><span class="icon_check"></span></a>
                      <a href="#myModal2" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Aksi" class="btn btn-danger btn-sm"><span class="  icon_close"></span></a>
                      <a href="<?php echo base_url('Man_sarprasC/update_klasifikasi/'."2/".$barang->kode_barang);?>" id="custId" data-toggle="tooltip" data-toggle="tooltip" title="Aksi" class="btn btn-info btn-sm">Tersedia</span></a>
                    </center></td>
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

<!-- Modal Detail  Item Pengajuan -->
<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title" id="titlemodal">Item Pengajuan Barang</h4>
      </div>
      <form id="formadd" class="form-horizontal" role="form">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="id" id="idbarang" hidden="true">

            <label class="control-label col-sm-5" style="text-align: left;">Nama Barang</label>
            <div class="col-sm-5">
              <p class="form-control-static"> <?php echo ": ".$barang->nama_barang; ?> </p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-5" style="text-align: left;">Nama Item Pengajuan</label>
            <div class="col-sm-5">
              <p class="form-control-static"> <?php echo ": ".$barang->nama_item_pengajuan; ?> </p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-5" style="text-align: left;">Status Persediaan</label>
            <div class="col-sm-5">
              <p class="form-control-static"> <?php echo ": ".$barang->status_persediaan; ?> </p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-5" style="text-align: left;">URL</label>
            <div class="col-sm-5">
              <p class="form-control-static"> <?php echo ": ".$barang->url; ?> </p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-5" style="text-align: left;">Harga Satuan</label>
            <div class="col-sm-5">
              <p class="form-control-static"> <?php echo ": ".$barang->harga_satuan; ?> </p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-5" style="text-align: left;">Merk</label>
            <div class="col-sm-5">
              <p class="form-control-static"> <?php echo ": ".$barang->merk; ?> </p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- END Modal Item Pengajuan-->

<!-- modal detail persetujuan terima
-->
<div class="modal fade" id="myModal1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Persetujuan Barang</h4>
      </div>
      <div class="fetched-data"></div>
    </div>
  </div>
</div>

<!-- modal detail persetujuan tolak -->
<div class="modal fade" id="myModal2" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Persetujuan Barang</h4>
      </div>
      <div class="fetched-data"></div>
    </div>
  </div>
</div>


<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
    // js detail persetujuan terima
    $(document).ready(function(){
      $('#myModal1').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type : 'get',
              url : '<?php echo base_url().'Man_sarprasC/detail_persetujuan_terima/'?>'+rowid,
                //data :  'rowid='+ rowid, // $_POST['rowid'] = rowid
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
              }
            });
          });
    });

    // js detail persetujuan tolak
    $(document).ready(function(){
      $('#myModal2').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type : 'get',
              url : '<?php echo base_url().'Man_sarprasC/detail_persetujuan_tolak/'?>'+rowid,
                //data :  'rowid='+ rowid, // $_POST['rowid'] = rowid
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
              }
            });
          });
    });

    //buat nampilin detail item pengajuan
    function detail(id) {
      $('#idbarang').val(id);
      $('#formadd').attr('action', '<?php echo base_url('Man_sarprasC/detail_barang');?>');
      $.ajax({
        type : 'get',
        url : '<?php echo base_url().'Man_sarprasC/detail_barang/'?>'+id,
        dataType :'JSON',
        success : function(data){
        }
      });
      $("#myModal").modal('show');
    }
  </script>