<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">    
    <div id="loginbox" style="margin-top:22px;" class="mainbox col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">        
        <center>
            <!-- <img src="<?php echo base_url();?>assets/image/logo/logo-ugm.png" style="height: 25%; width: 45%;"> -->
            <!-- <h3>Silahkan Masuk : </h3> -->
        </center>
        <div class="panel panel-info" style="margin-top: 100px;" >
            <div class="panel-heading">
                <div class="panel-title">Silahkan Masuk Disini</div>                     
            </div>     

            <div style="padding-top:20px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form action="<?php echo site_url('LoginC/signin'); ?>" method="post">

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


                    <div style="margin-bottom: 20px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="text" name="email" class="form-email form-control" placeholder="email" autofocus required oninvalid="this.setCustomValidity('email tidak boleh kosong')" oninput="setCustomValidity('')">                                       
                    </div>

                    <div style="margin-bottom: 20px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" name="password" class="form-password form-control" placeholder="Sandi" required oninvalid="this.setCustomValidity('Sandi tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>

                    <div style="margin-bottom: 20px; margin-left: 40px;" class="input-group" >
                        <?=$cap_img?>
                    </div>

                    <div style="margin-bottom: 20px" class="input-group">
                       <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                       <input type="text" name="captcha" class="form-email form-control" placeholder="Masukkan Captcha" required oninvalid="this.setCustomValivdity('Captcha tidak boleh kosong')" oninput="setCustomValidity('')">
                   </div>


                   <div style="margin-top:10px" class="form-group">
                    <!-- Button -->

                    <div class="col-sm-12 controls">
                       <button type="submit" class="btn btn-primary">Masuk</button>
                       <a style="float: right; " href="#">Lupa Password</a>
                   </div>
               </div>


               <div class="form-group">
                <div class="col-md-12 control">
                    <div style="border-top: 1px solid#888; margin-top:10px; margin-bottom: 10px; font-size:85%" >
                    </div>
                    <div>
                      Belum punya akun ?
                      <a href="<?php echo site_url('UserC/halaman_daftar')?>">Daftar</a>
                  </div>
              </div>
          </div>    
      </form>     
  </div>                      
  <div class="panel-footer panel-info">
    <center>
        <img src="<?php echo base_url();?>assets/image/logo/logo-ugm.png" style="height: 50px;">
    </center>
</div> 
</div>
</div>

</div>
