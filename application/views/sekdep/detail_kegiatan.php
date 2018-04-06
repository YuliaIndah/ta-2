<form class="form-horizontal" action="<?php echo base_url(); ?>Man_keuanganC/post_progress" method="post">
   <div class="form-group">
    <label class="control-label col-sm-5" for="tgl_pengajuan" style="text-align: left;">Nama Kegiatan</label>
    <div class="col-sm-5">
        <p class="form-control-static"> <?php echo ": ".$detail_kegiatan->nama_kegiatan; ?> </p>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-5" for="tgl_pengajuan" style="text-align: left;">Tanggal Pengajuan Kegiatan</label>
    <div class="col-sm-5">
        <p class="form-control-static"> <?php echo ": ".$detail_kegiatan->tgl_pengajuan; ?> </p>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-5" for="tgl_kegiatan" style="text-align: left;">Tanggal Pelaksanaan Kegiatan</label>
    <div class="col-sm-5">
        <p class="form-control-static"> <?php echo ": ".$detail_kegiatan->tgl_kegiatan; ?> </p>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-5" for="dana_diajukan" style="text-align: left;">Dana Yang Diajukan</label>
    <div class="col-sm-5">
        <p class="form-control-static"> <?php echo ": Rp".$detail_kegiatan->dana_diajukan.",-"; ?> </p>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-5" for="dana_disetujui" style="text-align: left;">Dana Yang Disetujui</label>
    <div class="col-sm-5">
        <p class="form-control-static"> <?php echo ": Rp".$detail_kegiatan->dana_disetujui.",-"; ?> </p>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-5" for="dana_diajukan" style="text-align: left;">Nama Pengaju</label>
    <div class="col-sm-5">
        <p class="form-control-static"> <?php echo ": ".$detail_kegiatan->nama;?> </p>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-5" for="dana_diajukan" style="text-align: left;">Jabatan Pengaju</label>
    <div class="col-sm-5">
        <p class="form-control-static"> <?php echo ": ".$detail_kegiatan->nama_jabatan." ".$detail_kegiatan->nama_unit;?> </p>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-5"></div>
    <div class="col-sm-5">
        <!-- <button class="btn btn-info">Simpan</button> -->
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button> -->
    </div>
</div>
</form>