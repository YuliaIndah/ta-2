 <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar"
    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%">
    10%
</div>
</div>
<?php 
foreach ($detail_progress as $progress=>$key) {
    ?>
    <div class="modal-body">
        <div class="container">
            <div class="qa-message-list" id="wallmessages">
                <div class="message-item" id="m16">
                    <div class="message-inner">
                        <div class="message-head clearfix">
                            <div class="avatar pull-left"><a href="#"><img style="height: 50px;" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png"></a></div>
                            <div class="avatar pull-right"><span class="glyphicon glyphicon-close"></span></div>
                        <div class="user-detail">
                            <h5 class="handle"><?php echo $key->nama;?></h5>
                            <div class="post-meta">
                                <div class="asker-meta">
                                    <span class="qa-message-what"></span>
                                    <span class="qa-message-who">
                                        <span class="qa-message-who-pad">Sebagai </span>
                                        <span class="qa-message-who-data"><?php echo $key->nama_jabatan." ".$key->nama_unit;?></span>
                                    </span>
                                </div>
                                <span class="qa-message-when">
                                    <span class="qa-message-when-data">
                                        <?php
                                        $tgl =  $key->tgl_progress;
                                        $new_tgl = date('d-m-Y', strtotime($tgl));
                                        echo $new_tgl;
                                        ?>
                                    </span>
                                    <span class="qa-message-when">
                                        <?php echo $key->waktu_progress;?>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="qa-message-content">
                      <?php echo $key->komentar;?>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<?php
}
?>

<style type="text/css">
.message-item {
    margin-bottom: 25px;
    margin-left: 40px;
    position: relative;
}
.message-item .message-inner {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 3px;
    padding: 10px;
    position: relative;
    width: 40%;
}
.message-item .message-inner:before {
    border-right: 10px solid #ddd;
    border-style: solid;
    border-width: 10px;
    color: rgba(0,0,0,0);
    content: "";
    display: block;
    height: 0;
    position: absolute;
    left: -20px;
    top: 6px;
    width: 0;
}
.message-item .message-inner:after {
    border-right: 10px solid #fff;
    border-style: solid;
    border-width: 10px;
    color: rgba(0,0,0,0);
    content: "";
    display: block;
    height: 0;
    position: absolute;
    left: -18px;
    top: 6px;
    width: 0;
}
.message-item:before {
    background: #fff;
    border-radius: 2px;
    bottom: -30px;
    box-shadow: 0 0 3px rgba(0,0,0,0.2);
    content: "";
    height: 100%;
    left: -30px;
    position: absolute;
    width: 3px;
}
.message-item:after {
    background: #fff;
    border: 2px solid #ccc;
    border-radius: 50%;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
    content: "";
    height: 15px;
    left: -36px;
    position: absolute;
    top: 10px;
    width: 15px;
}
.clearfix:before, .clearfix:after {
    content: " ";
    display: table;
}
.message-item .message-head {
    border-bottom: 1px solid #eee;
    margin-bottom: 8px;
    padding-bottom: 8px;
}
.message-item .message-head .avatar {
    margin-right: 20px;
}
.message-item .message-head .user-detail {
    overflow: hidden;
}
.message-item .message-head .user-detail h5 {
    font-size: 16px;
    font-weight: bold;
    margin: 0;
}
.message-item .message-head .post-meta {
    float: left;
    padding: 0 15px 0 0;
}
.message-item .message-head .post-meta >div {
    color: #333;
    font-weight: bold;
    text-align: right;
}
.post-meta > div {
    color: #777;
    font-size: 12px;
    line-height: 22px;
}
.message-item .message-head .post-meta >div {
    color: #333;
    font-weight: bold;
    text-align: right;
}
.post-meta > div {
    color: #777;
    font-size: 12px;
    line-height: 22px;
}
img {
 min-height: 40px;
 max-height: 40px;
}
</style>
