<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Admin extends CI_Controller {

    private $data;

    function admin() {
        parent::__construct();
        //to handle back in browser when user has logged out
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . 'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-chace');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

        if ($this->session->userdata("is_login") != "log" or $this->session->userdata("user_tipe") != "admin") {
            $this->session->set_flashdata("error_msg", "Anda harus Login terlebih dahulu");
            redirect("home/index");
        }

        //$username=$this->session->userdata("username");
        $assets_url = "http://localhost/rpl/assets/";
        $title = "Halaman Admin";
        $this->data = array("assets_url" => $assets_url,
                            "title" => $title);
        $this->load->model("m_user","msr");
        $this->load->model("m_profile","mpf");
        $this->load->model("m_admin","mad");
        $this->load->model("m_member","mbr");
    }
    
    function index() {
        $email=$this->session->userdata("email");
        $admin_profile=  $this->msr->get_data_admin($email);
        foreach ($admin_profile ->result() as $data):
            $full_name=$data->nama_depan." ".$data->nama_belakang;
            $picture=$data->picture;
            $register_date=$data->register_date;
            $this->session->set_userdata("full_name",$full_name);
            $this->session->set_userdata("picture",$picture);
            $this->session->set_userdata("register_date",$register_date);
        endforeach;
        $this->load->view("admin/v_admin", $this->data);
    }
    function add_admin(){
        $this->data['title']="Add - Administrator";
        $this->load->view("admin/v_add_admin",  $this->data);
    }
    function save_admin(){
        $this->data['title']="Add - Administrator";
        $nama_depan =  $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $email=  $this->input->post('email');
        $password =  $this->input->post('password');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $gender= $this->input->post('gender');
        
        $this->form_validation->set_rules('nama_depan','First Name','required|alpha');
        $this->form_validation->set_rules('nama_belakang','Last Name','required|alpha');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password','Password','required|matches[repassword]');
        
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('admin/v_add_member',$this->data);
        }
        else{
                $prm["email"]=$email;
                $prm["password"]=$password;

                //tambah akun user
                $id_user=$this->mad->add_account($prm);

                $profile=array( 'id_profile' => $id_user,
                                'nama_depan' => $nama_depan,
                                'nama_belakang' => $nama_belakang,
                                'tanggal_lahir' => $tgl_lahir,
                                'jenis_kelamin' => $gender,
                                'picture' => "default_user.png"
                             );
                if($this->mpf->add_profile($profile)){
                    
                    $this->session->set_flashdata("success_msg","Admin successfully added");
                    
                }

                else{
                    $this->session->set_flashdata("error_msg","Admin failed added");

                }
                redirect("admin/add_admin");
            
        }
    }
    
    function list_admin($off=0){
        $this->data['title']="List - Administrator";
        $this->data['off']=$off;
        $this->data['data_admin']=  $this->msr->get_admin();
        $this->load->view("admin/v_list_admin",  $this->data);
    }
    function edit_admin($id_user){
        $this->data['title']="Edit - Administrator";
        $this->data['data_admin']=  $this->msr->get_data_admin_by($id_user);
        $this->load->view("admin/v_edit_admin",  $this->data);
        
    }
    
    function update_admin(){
        $id_user=  $this->input->post('id_user');
        $nama_depan =  $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $gender= $this->input->post('gender');
        
        $this->form_validation->set_rules('nama_depan','First Name','required|alpha');
        $this->form_validation->set_rules('nama_belakang','Last Name','required|alpha');
        
        if($this->form_validation->run()==FALSE)
        {
            $this->data['data_admin']=  $this->msr->get_data_admin_by($id_user);
            $this->load->view('admin/v_edit_admin',$this->data);
        }
        else{
                $prm['id_user']=$id_user;
                $prm['nama_depan']=$nama_depan;
                $prm['nama_belakang']=$nama_belakang;
                $prm['tgl_lahir']=$tgl_lahir;
                $prm['gender']=$gender;

                if($this->msr->update_admin($prm))
                {
                        $this->session->set_flashdata("success_msg","Data successfully updated");
                }
                else
                {
                        $this->session->set_flashdata("error_msg","Data failed updated");
                }

                redirect("admin/list_admin");
        }
        
    } 
    
    function delete_admin($id_user){
        
        if($this->msr->delete_admin($id_user)){
            $this->session->set_flashdata("success_msg","Data successfully removed");
        }
        else{
            $this->session->set_flashdata("error_msg","Data failed removed");
        }
        redirect("admin/list_admin");
        
    }
    
    function add_member(){
        $this->data['title']="Add - Membership";
        $this->load->view("admin/v_add_member",  $this->data);
    }
    
    function save_member(){
        $this->data['title']="Add - Membership";
        $nama_depan =  $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $email=  $this->input->post('email');
        $password =  $this->input->post('password');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $gender= $this->input->post('gender');
        
        $this->form_validation->set_rules('nama_depan','First Name','required|alpha');
        $this->form_validation->set_rules('nama_belakang','Last Name','required|alpha');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password','Password','required|matches[repassword]');
        
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('admin/v_add_member',$this->data);
        }
        else{
                $prm["email"]=$email;
                $prm["password"]=$password;

                //tambah akun user
                $id_user=$this->mbr->add_account($prm);

                $profile=array( 'id_profile' => $id_user,
                                'nama_depan' => $nama_depan,
                                'nama_belakang' => $nama_belakang,
                                'tanggal_lahir' => $tgl_lahir,
                                'jenis_kelamin' => $gender,
                                'picture' => "default_user.png"
                             );
                
                if($this->mpf->add_profile($profile)){
                    
                    $this->session->set_flashdata("success_msg","Member successfully added");
                    
                }

                else{
                    $this->session->set_flashdata("error_msg","Member failed added");

                }
                redirect("admin/add_member");
            
        }
    }
    
    function verification($key)
    {
        if($this->msr->changeActiveState($key)){
            echo "Selamat kamu telah memverifikasi akun kamu";
            echo "<br><br><a href='".  base_url()."'>Kembali ke Menu Login</a>";
        }
    }
    
    function list_member($off=0){
        $this->data['title']="List - Member";
        $this->data['off']=$off;
        $this->data['data_member']=  $this->msr->get_member();
        $this->load->view("admin/v_list_member",  $this->data);
    }
    
    function edit_member($id_user){
        $this->data['title']="Edit - Member";
        $this->data['data_member']=  $this->msr->get_data_member_by($id_user);
        $this->load->view("admin/v_edit_member",  $this->data);
    }
    function update_member(){
        $id_user=  $this->input->post('id_user');
        $nama_depan =  $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $gender= $this->input->post('gender');
        
        $this->form_validation->set_rules('nama_depan','First Name','required|alpha');
        $this->form_validation->set_rules('nama_belakang','Last Name','required|alpha');
        
        if($this->form_validation->run()==FALSE)
        {
            $this->data['data_member']=  $this->msr->get_data_member_by($id_user);
            $this->load->view('admin/v_edit_member',$this->data);
        }
        else{
                $prm['id_user']=$id_user;
                $prm['nama_depan']=$nama_depan;
                $prm['nama_belakang']=$nama_belakang;
                $prm['tgl_lahir']=$tgl_lahir;
                $prm['gender']=$gender;

                if($this->msr->update_admin($prm))
                {
                        $this->session->set_flashdata("success_msg","Data successfully updated");
                }
                else
                {
                        $this->session->set_flashdata("error_msg","Data failed updated");
                }

                redirect("admin/list_member");
        }
        
    }
    
    function delete_member($id_user){
        
        if($this->msr->delete_member($id_user)){
            $this->session->set_flashdata("success_msg","Data successfully removed");
        }
        else{
            $this->session->set_flashdata("error_msg","Data failed removed");
        }
        redirect("admin/list_member");
        
    }
    
    function set_status_member(){
        $id_user=$this->input->post("id_user");
        $status=$this->input->post("status");
        
        $prm['id_user'] = $id_user;
        $prm['status'] = $status;

       if($this->msr->set_status_member($prm))
        {
           if($status=="active"){
               
               $this->session->set_flashdata("success_msg","Member successfully activated");
           }
           else{
               $this->session->set_flashdata("success_msg","Member successfully blocked");
           }
                
        }
        else
        {
            if($status=="active"){
               
               $this->session->set_flashdata("success_msg","Member failed activated");
           }
           else{
               $this->session->set_flashdata("success_msg","Member failed blocked");
           }
        }
        redirect("admin/list_member");
        
    }
    
    function set_status_admin(){
        $id_user=$this->input->post("id_user");
        $status=$this->input->post("status");
        
        $prm['id_user'] = $id_user;
        $prm['status'] = $status;

       if($this->msr->set_status_admin($prm))
        {
           if($status=="active"){
               
               $this->session->set_flashdata("success_msg","Member successfully activated");
           }
           else{
               $this->session->set_flashdata("success_msg","Member successfully blocked");
           }
                
        }
        else
        {
            if($status=="active"){
               
               $this->session->set_flashdata("success_msg","Member failed activated");
           }
           else{
               $this->session->set_flashdata("success_msg","Member failed blocked");
           }
        }
        redirect("admin/list_admin");
        
    }
    
    function sign_out(){
        $this->session->unset_userdata("is_login");
        $this->session->unset_userdata("user_tipe");
        redirect("home/index");
    }

    
}
