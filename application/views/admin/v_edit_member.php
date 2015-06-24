<?php $this->load->view("admin/v_header"); ?>
<body class="skin-blue">
    <div class="wrapper">
        <?php $this->load->view("admin/v_top_menu"); ?>
        <?php $this->load->view("admin/v_sidebar"); ?>
        
        <?php
            if($data_member->num_rows()>0){
                foreach ($data_member->result() as $data):
                    $id_user=$data->id_user;
                    $first_name=$data->nama_depan;
                    $last_name=$data->nama_belakang;
                    $email=$data->email;
                    $tgl_lahir=$data->tanggal_lahir;
                    $gender=$data->jenis_kelamin;
                endforeach;
                
            }
            
            $first_name_form=set_value('nama_depan');
            $last_name_form=  set_value('nama_belakang');
            $tgl_lahir_form=  set_value('tgl_lahir');
            $gender_form= set_value('gender');
            
            if($first_name_form!=""){$first_name=$first_name_form;}
            if($last_name_form!=""){$last_name=$last_name_form;}
            if($tgl_lahir_form!=""){$tgl_lahir=$tgl_lahir_form;}
            if($gender_form!=""){$gender=$gender_form;}
        ?>
        
        <?php 
                $err_first_name = form_error('nama_depan');
                $err_last_name = form_error('nama_belakang');
                if($err_first_name!=""){$att_err_first_name="has-error";}else{$att_err_first_name="";}
                if($err_last_name!=""){$att_err_last_name="has-error";}else{$att_err_last_name="";}
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                
            </section>

            <!-- Main content -->
            <section class="content">
                    <div class="register-box">

                        <div class="register-box-body">
                            <p class="login-box-msg"><b>Update Data Administrator</b></p>
                            <form action="<?php echo base_url();?>admin/update_member" onsubmit="return validateForm()" method="post">
                                <input type="hidden" name="id_user" value="<?php echo $id_user;?>"/>
                                <div class="form-group has-feedback <?php echo $att_err_first_name;?>">
                                    <input type="text" name="nama_depan" class="form-control" placeholder="First Name" value="<?php echo $first_name;?>" required="true"/>
                                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  <?php if($att_err_first_name="has-error"){?>
                                  <label><?php echo $err_first_name;?></label>
                                  <?php }?>
                                </div>
                                  <div class="form-group has-feedback <?php echo $att_err_last_name;?>">
                                      <input type="text" name="nama_belakang" class="form-control" placeholder="Last Name" value="<?php echo $last_name;?>" required="true"/>
                                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  <?php if($att_err_last_name="has-error"){?>
                                  <label><?php echo $err_last_name;?></label>
                                  <?php }?>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email;?>" readonly="" required="true"/>
                                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                  <label></label>
                                </div>
                                
                                <div class="form-group has-feedback">
                                    <input type="date" name="tgl_lahir" class="form-control" placeholder="Birth Of Date" value="<?php echo $tgl_lahir;?>" required="true"/>
                                  <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                  <label></label>
                                </div>
                                <div class="form-group has-feedback">
                                    <div class="radio">
                                        <label class="col-xs-4">
                                            <input type="radio" name="gender" id="optionsRadios1" value="Female" <?php if($gender=="Female"){echo "checked";}?>>
                                          Female
                                      </label>
                                      <label class="col-xs-6">
                                          <input type="radio" name="gender" id="optionsRadios2" value="Male" <?php if($gender=="Male"){echo "checked";}?>>
                                          Male
                                      </label>
                                    </div>
                                </div>
                                
                                <div class="row">
                                  <div class="col-xs-4 pull-right">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                                  </div><!-- /.col -->
                                </div>
                              </form>        
                        </div><!-- /.form-box -->
                    </div><!-- /.register-box -->

            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <?php
        $this->load->view("admin/v_footer")?>