
<form class="form-horizontal" action="<?php echo base_url(); ?>Man_sarprasC/ubah_data_barang" method="post">
    <div class="form-group">
        <label class="control-label col-sm-5" for="nama_kegiatan" style="text-align: left;">Nama Barang</label>
        <div class="col-sm-5">
            <p class="form-control-static"> <?php echo ": ".$ubah_barang->nama_barang; ?> </p>
            
        </div>
         <input type="hidden" name="kode_fk" value="<?php echo $ubah_barang->kode_barang?>"> <!-- buat input ke tabel progress -->
    </div>
    <div class="form-group">
        <label class="control-label col-sm-5" for="status" name="kode_jenis_barang" id="kode_jenis_barang" style="text-align: left;">Jenis Barang</label>
        <div class="col-sm-5">
            <select class="form-control" name="kode_jenis_barang" id="kode_jenis_barang">
                <!-- <option> ----- pilih nama progress ----- </option> -->
                <?php 
                foreach ($pilihan_jenis_barang as $pilihan_jenis_barang) {
                    ?>
                    <option value="<?php echo $pilihan_jenis_barang->kode_jenis_barang ;?>"> <?php echo $pilihan_jenis_barang->nama_jenis_barang ;?> </option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-5"></div>
        <div class="col-sm-5">
            <button class="btn btn-info">Simpan</button>
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button> -->
        </div>
    </div>
</form>