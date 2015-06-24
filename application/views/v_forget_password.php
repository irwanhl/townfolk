<!-- Bagian Header -->
<?php $this->load->view('v_header'); ?> 
<?php $this->load->view('v_alert_msg');?>

  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
          <b>TOWNFOLK JURNALIST</b></a>
      </div><!-- /.login-logo -->
      
      <div class="login-box-body">
        <p class="login-box-msg">Enter Your Email To Find Your Account</p>
        <form action="<?php echo base_url();?>home/find_account" method="post">
          <div class="form-group has-feedback">
              <input type="email" name="email" class="form-control" placeholder="Email"/>
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
          </div>
            
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Search</button>
            </div><!-- /.col -->
          </div>
        </form>
        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
<!-- Bagian Footer -->
<?php $this->load->view('v_footer'); ?>
        