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
       <!--  <ol class="breadcrumb">
          <li><i class="fa fa-user"></i><a href="#">Kepala Departemen</a></li>
          <li><i class="fa fa-pencil"></i>Pengajuan Kegiatan</li>                
        </ol> -->
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
                          <td><center><img style="height: 60px;" src="<?php echo base_url();?>assets/file_gambar/<?php echo $barang->file_gambar;?>"></center></td>
                          <td><?php echo $barang->tgl_item_pengajuan;?></td>
                          <td><?php echo $barang->jumlah;?></td>
                          <td><?php echo $barang->status_pengajuan;?></td>
                          <td><?php echo $barang->nama;?></td>
                          <td><?php echo $barang->nama_jabatan;?></td>
                          <td><center>
                            <a href="#myModal1" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Aksi" class="btn btn-success btn-sm"><span class="icon_check"></span></a>
                            <a href="#myModal2" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Aksi" class="btn btn-danger btn-sm"><span class="  icon_close"></span></a>
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
  </script>