<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header" style="margin-top: 0;"><i class="fa fa-pencil"></i>Daftar Barang</h3>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <div class="card mb-3">
          <div class="card-header">
            <div class="card-body">
              <a class="btn btn-info"><i class="icon_plus_alt2"> </i> Tambah Barang</a>
              <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Nama Barang</th>
                        <th>Gambar</th>
                        <th>Jenis Barang</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($data_kegiatan as $barang) {
                        ?>
                        <tr>
                          <td><?php echo $barang->nama_barang; ?></td>
                          <!-- <td><?php echo $barang->gambar; ?></td> -->
                          <td><?php echo $barang->nama_barang; ?></td>
                          <td><?php echo $barang->nama_jenis_barang; ?></td>                        </tr>

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