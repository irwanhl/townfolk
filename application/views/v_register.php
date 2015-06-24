<!-- Bagian Header -->
<?php $this->load->view('v_header'); ?>
<?php $this->load->view("v_alert_msg");?>

<?php 

    $err_first_name = form_error('nama_depan');
    $err_last_name = form_error('nama_belakang');
    $err_email = form_error('email');
    $err_password = form_error('password');
    if($err_first_name!=""){$att_err_first_name="has-error";}else{$att_err_first_name="";}
    if($err_last_name!=""){$att_err_last_name="has-error";}else{$att_err_last_name="";}
    if($err_email!=""){$att_err_email="has-error";}else{$att_err_email="";}
    if($err_password!=""){$att_err_password="has-error";}else{$att_err_password="";}


?>
<script type="text/javascript">
    function validateForm(){
        var radios = document.getElementsByName("gender");
        var formValid = false;
        
        var i=0;
        while(!formValid && i< radios.length){
            if(radios[i].checked) formValid=true;
            i++;
        }
        if(!formValid) alert("Gender must checked one option");
        return formValid;
    }
    
</script>

<body class="register-page">
    <div class="register-box">
      <div class="login-logo">
          <b>TOWNFOLK JURNALIST</b></a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <form action="<?php echo base_url();?>home/register" onsubmit="return validateForm()" method="post">
          <div class="form-group has-feedback <?php echo $att_err_first_name;?>">
              <input type="text" name="nama_depan" class="form-control" placeholder="First Name" value="<?php echo set_value('nama_depan');?>" required="true"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <?php if($att_err_first_name="has-error"){?>
            <label><?php echo $err_first_name;?></label>
            <?php }?>
          </div>
            <div class="form-group has-feedback <?php echo $att_err_last_name;?>">
                <input type="text" name="nama_belakang" class="form-control" placeholder="Last Name" value="<?php echo set_value('nama_belakang');?>" required="true"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <?php if($att_err_last_name="has-error"){?>
            <label><?php echo $err_last_name;?></label>
            <?php }?>
          </div>
          <div class="form-group has-feedback <?php echo $att_err_email;?>">
              <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email');?>" required="true"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <?php if($att_err_email="has-error"){?>
            <label><?php echo $err_email;?></label>
            <?php }?>
          </div>
          <div class="form-group has-feedback <?php echo $att_err_password;?>">
              <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password');?>" required="true"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?php if($att_err_password="has-error"){?>
            <label><?php echo $err_password;?></label>
            <?php }?>
          </div>
          <div class="form-group has-feedback">
              <input type="password" name="repassword" class="form-control" placeholder="Retype Password" required="true"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <label></label>
          </div>
          <div class="form-group has-feedback">
              <input type="date" name="tgl_lahir" class="form-control" placeholder="Birth Of Date" required="true"/>
            <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
            <label></label>
          </div>
          <div class="form-group has-feedback">
              <div class="radio">
                  <label class="col-xs-4">
                    <input type="radio" name="gender" id="optionsRadios1" value="Female">
                    Female
                </label>
                <label class="col-xs-6">
                    <input type="radio" name="gender" id="optionsRadios2" value="Male">
                    Male
                </label>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4 pull-right">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        </form>       
        <a href="<?php echo base_url();?>" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
<?php $this->load->view('v_footer'); ?>