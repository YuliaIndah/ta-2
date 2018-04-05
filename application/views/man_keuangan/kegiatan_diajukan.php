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
                <?php
                  // var_dump($detail_kegiatan);
                ?>
                <table id="example" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                  <thead>
                    <tr class="text-center">
                      <!-- <th>No. Identitas</th> -->
                      <th>Nama Kegiatan</th>
                      <th>Tgl Pengajuan</th>
                      <th>Tgl Kegiatan</th>
                      <th>Dana Diajukan</th>
                      <th>Dana Disetujui</th>
                      <th>File</th>
                      <th>Nama Pengaju</th>
                      <th>Jabatan Pengaju</th>
                      <th>Jenis Kegiatan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($data_pengajuan_kegiatan as $kegiatan) {
                      ?>
                      <tr>
                        <td><?php echo $kegiatan->nama_kegiatan;?></td>
                        <?php 
                        $tgl_pengajuan = $kegiatan->tgl_pengajuan;
                        $new_tgl_pengajuan = date('d-m-Y',strtotime($tgl_pengajuan));
                        ?>
                        <td><?php echo $new_tgl_pengajuan;?></td>

                        <?php
                        $timestamp = $kegiatan->created_at;
                        $datetime = explode(" ",$timestamp); //parsing tanggal 
                        $date = $datetime[0];
                        $time = $datetime[1];
                        $new_date = date('d-m-Y',strtotime($date));
                        ?>
                        <td><?php echo $new_date;?></td>
                        <td><?php echo $kegiatan->dana_diajukan;?></td>
                        <td><?php echo $kegiatan->dana_disetujui;?></td>
                        <?php $link = base_url()."assets/file_upload/".$kegiatan->nama_file;?>
                        <td class="text-center"><a target="_blank" href="<?php echo $link?>"><span><img src="<?php echo base_url()?>assets/image/logo/pdf.svg" style="height: 30px;"></span></a></td>
                        <td><?php echo $kegiatan->nama;?></td>
                        <td><?php echo $kegiatan->nama_jabatan." ".$kegiatan->nama_unit;?></td>
                        <td><?php echo $kegiatan->nama_jenis_kegiatan;?></td>
                        <td>Status</td>
                        <td>
                          <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Aksi" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
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
    </section>
    <div class="text-center">
      <div class="credits">
        <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </section>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Kegiatan</h4>
        </div>
        <div class="modal-body">
          <div class="fetched-data"></div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#myModal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type : 'get',
              url : '<?php echo base_url().'Man_keuanganC/detail_kegiatan/'?>'+rowid,
                //data :  'rowid='+ rowid, // $_POST['rowid'] = rowid
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
              }
            });
          });
    });

  </script>