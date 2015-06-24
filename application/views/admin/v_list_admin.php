<?php $this->load->view("admin/v_header");?>
  <body class="skin-blue">
    <div class="wrapper">
        
      <?php $this->load->view("admin/v_top_menu");?>
      <?php $this->load->view("admin/v_sidebar");?>
        
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <?php $this->load->view("admin/v_alert_msg");?>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Admin Of Townfolk Jurnalist</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Birth Of Date</th>
                        <th>Gender</th>
                        <th>Register Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php if($data_admin->num_rows()>0){
                            $no=$off+1;
                            foreach($data_admin->result()as $data):
                        
                        ?>
                      <tr>
                        <td><a href="#<?php echo $no;?>" data-toggle="modal"><?php echo $data->nama_depan; echo " ".$data->nama_belakang;?></a></td>
                        <div class="modal fade" id="<?php echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="myModalLabel"><b>Informasi Member : </b><?php echo " ".$data->nama_depan; echo " ".$data->nama_belakang;?></h4>
                                    </div>
                                      <form action="<?php echo base_url();?>admin/set_status_admin" method="post">
                                        <div class="modal-body">

                                            <div span="3" class="pull-left">
                                                <label class="label-info">First Name : <?php echo $data->nama_depan;?></label>
                                                <br><label class="label-info">Last Name : <?php echo $data->nama_belakang;?></label>
                                                <br><label class="label-info">Gender : <?php echo $data->jenis_kelamin;?></label>
                                                <br><label class="label-info">Status : <?php echo $data->status;?></label>
                                            </div>
                                            <div span="6">&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $assets_url;?>images/<?php echo $data->picture;?>" width="100px" height="100px"/></div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="id_user" value="<?php echo $data->id_user?>"/>
                                          <?php if($data->status=="active"){
                                              echo "<button type='submit' class='btn btn-danger' name='status' value='block'>block</button>";
                                          } elseif($data->status=="pending" or $data->status=="block"){
                                              echo "<button type='submit' class='btn btn-success' name='status' value='active'>active</button>";
                                          }
                                          ?>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                            </div>
                        <td><?php echo $data->email;?></td>
                        <td><?php echo $data->tanggal_lahir;?></td>
                        <td><?php echo $data->jenis_kelamin;?></td>
                        <td><?php echo $data->register_date;?></td>
                        <td><div class="col-xs-4 pull-left">
                                <a href="<?php echo base_url();?>admin/edit_admin/<?php echo $data->id_user;?>"><button class="btn btn-warning btn-sm">
                                                <i class="glyphicon glyphicon-edit"></i> Edit
                                            </button>
                                </a>
                            </div><!-- /.col -->
                            
                            <div class="col-xs-8 pull-right">
                                <button class="btn btn-danger btn-sm" onclick="delete_admin('<?php echo $data->nama_depan; echo " ".$data->nama_belakang;?>','<?php echo $data->id_user;?>');">
                                            <i class="glyphicon glyphicon-trash"></i> Delete
                                </button>
                            </div><!-- /.col -->
                        </td>
                      </tr>
                      <?php 
                            $no++;
                            endforeach;
                        }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Birth Of Date</th>
                        <th>Gender</th>
                        <th>Register Date</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
    <?php $this->load->view("admin/v_footer")?>