<!-- Bagian Header -->
<?php $this->load->view('v_header'); ?> 

  <body class="login-page">
    <?php foreach ($user_profile->result()as $data):?>
    <div class="login-box">
      <div class="login-logo">
          <b>TOWNFOLK JURNALIST</b>
      </div><!-- /.login-logo -->
      
      
      <div class="login-box-body">
          <p class="login-box-msg"><b>Account Finded</b></p>
          <form action="<?php echo base_url();?>home/reset_password" method="post">
            <div class="user-panel">
                <div class="pull-left image">
                  <img src="<?php echo $assets_url;?>images/<?php echo $data->picture;?>" class="img-circle" alt="User Image" />
                </div>
            <div class="pull-left info">
                <p><?php echo $data->nama_depan; echo " ".$data->nama_belakang ;?></p>
            </div>
          </div>
            <p class="login-box-msg"><b>Reset Your Password</b></p>
            <p class="login-box-msg">Your new password will send to <b><?php echo $data->email;?><b/></p>
            <input type="hidden" name="email" value="<?php echo $data->email;?>"/>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <?php endforeach;?>
<!-- Bagian Footer -->
<?php $this->load->view('v_footer'); ?>
        