<form class="form-horizontal" action="<?php echo base_url('Man_sarprasC/post_persetujuan_barang');?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <input class="form-control" type="hidden" id="no_identitas" name="no_identitas" value="<?php echo $data_diri->no_identitas;?>" required> <!-- ambil id_pengguna_jabatan berdasarkan user yang login-->
                <input class="form-control" type="hidden" id="kode_fk" name="kode_fk" value="<?php echo $detail_barang->kode_item_pengajuan;?>" required>
                <label class="col-lg-4 col-sm-2 control-label">Komentar Persetujuan:</label>
                <div class="col-lg-8">
                   <input type="hidden" class="form-control" placeholder id="kode_nama_progress" name="kode_nama_progress" required value="1">
                   <input class="form-control" type="hidden" id="jenis_progress" name="jenis_progress" value="barang" required>
                 <textarea name="komentar" value="" class="form-control" placeholder="Komentar" rows="3" required></textarea>
                </div>
              </div>
            </div>
         <div class="modal-footer">
            <button class="btn btn-info" type="submit"> Simpan </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
</form>
       