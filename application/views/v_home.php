<!-- Bagian Header -->
<?php $this->load->view('v_header'); ?>

<?php $this->load->view("v_alert_msg");?>  

  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
          <b>TOWNFOLK JURNALIST</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?php echo base_url();?>home/login_process" method="post">
          <div class="form-group has-feedback">
              <input type="email" name="email" class="form-control" placeholder="Email" required="true"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <input type="password" name="password" class="form-control" placeholder="Password" required="true"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="<?php echo $signin_fb_url;?>" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <!--<a href="<?php //echo $signin_google_url;?>" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>-->
        </div><!-- /.social-auth-links -->

        <a href="<?php echo base_url();?>home/forgot_password">I forgot my password</a><br>
        <a href="<?php echo base_url();?>home/form_register" class="text-center">Register a new membership</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
<!-- Bagian Footer -->
<?php $this->load->view('v_footer'); ?>
        