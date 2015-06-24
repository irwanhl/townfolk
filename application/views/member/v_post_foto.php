<?php $this->load->view("member/v_header");?>
<?php //echo "<a href=".$user_profile['link']." target='_blank' ><img class='fb_profile' src="."https://graph.facebook.com/".$user_profile['id']."/picture".">"."</a>"."<p class='profile_name'>Welcome ! <em>".$user_profile['name']."</em></p>";
//echo "<a class='logout' href='$logout_url'>Logout</a>";
?>
  <body class="skin-blue">
    <div class="wrapper">
        <?php $this->load->view("member/v_top_menu");?>
        <?php $this->load->view("member/v_sidebar");?>
        <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <?php $this->load->view("member/v_alert_msg");?>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- row -->
          <div class="register-box">

            <div class="register-box-body">
                <p class="login-box-msg"><b>Share Photo and Describe It</b></p>
                <form action="<?php echo base_url();?>member/share_foto" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_member" value="<?php echo $this->session->userdata("id_member");?>"/>
                    <div class="form-group has-feedback">
                        <textarea class="form-control" rows="3" name="describe" class="form-control" placeholder="Describe about photo" required="true"></textarea>
                    </div>
                    
                    <div class="form-group has-feedback">
                        <input type="file" name="foto" class="form-control" required="true"/>
                    </div>
                    
                    <div class="row">
                      <div class="col-xs-4 pull-right">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Share</button>
                      </div><!-- /.col -->
                    </div>
                  </form>        
            </div><!-- /.form-box -->
        </div><!-- /.register-box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
    <?php $this->load->view("member/v_footer")?>