<?php 
    $segment=$this->uri->segment(2);    
?>
<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $assets_url;?>images/<?php echo $this->session->userdata("picture");?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata("full_name");?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Manage Admin</span>
                <span class="label label-primary pull-right">2</span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="<?php echo base_url();?>admin/add_admin"><i class="fa fa-plus"></i>Add Admin</a></li>
                  <li><a href="<?php echo base_url();?>admin/list_admin"><i class="fa fa-archive"></i>List Admin</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Manage Member</span>
                <span class="label label-primary pull-right">2</span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="<?php echo base_url();?>admin/add_member"><i class="fa fa-plus"></i>Add Member</a></li>
                <li><a href="<?php echo base_url();?>admin/list_member"><i class="fa fa-archive"></i>List Member</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Manage Post</span>
                <span class="label label-primary pull-right">2</span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-plus"></i>Add Member</a></li>
                  <li><a href="#"><i class="fa fa-archive"></i>List Member</a></li>
              </ul>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>