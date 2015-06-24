<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Member extends CI_Controller {

    private $data;

    function member() {
        parent::__construct();
        //to handle back in browser when user has logged out
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . 'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-chace');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

        if ($this->session->userdata("is_login") != "log" or $this->session->userdata("user_tipe") != "member") {
            $this->session->set_flashdata("error_msg", "Anda harus Login terlebih dahulu");
            redirect("home/index");
        }

        //$username=$this->session->userdata("username");
        $assets_url = "http://localhost/rpl/assets/";
        $title = "Halaman Member";
        $this->data = array("assets_url" => $assets_url,
                            "title" => $title);
        $this->load->model("m_user","msr");
        $this->load->model("m_postingan","mps");
    }
    
    function index() {
        $email=$this->session->userdata("email");
        $member_profile=  $this->msr->get_data_member($email);
        foreach ($member_profile ->result() as $data):
            $this->data['full_name']=$data->nama_depan." ".$data->nama_belakang;
            $this->data['image']=$data->picture;
            $this->data['birthday']=$data->tanggal_lahir;
        endforeach;
        $this->data['email']=$email;
        $this->load->view("member/v_member", $this->data);
    }
    function post_foto(){
        $this->data['title']="Share - Foto";
        $email=$this->session->userdata("email");
        $member_profile=  $this->msr->get_data_member($email);
        foreach ($member_profile ->result() as $data):
            $this->data['full_name']=$data->nama_depan." ".$data->nama_belakang;
            $this->data['image']=$data->picture;
            $this->data['birthday']=$data->tanggal_lahir;
            $id_member=$data->id_user;
        endforeach;
        $this->data['email']=$email;
        $this->session->set_userdata("id_member",$id_member);
        $this->load->view("member/v_post_foto",  $this->data);
    }
    
    function share_foto(){
        $describe=  $this->input->post('describe');
        $id_member=  $this->input->post('id_member');
        
        if(isset($_FILES['foto']['name']))
        {
            $gambar=$_FILES['foto']['name'];
            $gambar_type=$_FILES['foto']['type'];
            $gambar_size=$_FILES['foto']['size'];

            //echo $gambar."".$gambar_type."".$gambar_size;
        }
        
        if($gambar_type!="")
        {
            $file_type=explode("/",$gambar_type);
        }
			
			
            $config['upload_path']='assets/images';
            $config['allowed_types']='gif|jpg|jpeg|png';
            $config['max_size']='2000000';
            $config['max_width']='500';
            $config['max_height']='500';

            $config['overwrite']=TRUE;
            $config['remove_spaces']=TRUE;
            $config['file_name']="pdk_".date('YmdHis').".".$file_type[1];

            $this->load->library('upload',$config);

            if(!$this->upload->do_upload('foto'))
            {
                    $err_upload=$this->upload->display_errors();
                    $this->session->set_flashdata('error_msg',$err_upload);
                    $this->load->view('member/v_post_foto',$this->data);

            }
            else
            {
                    $prm['describe']=$describe;
                    $prm['id_member']=$id_member;
                    $prm['gambar']=$config['file_name'];

                    if($this->mps->save($prm))
                    {
                        $this->session->set_flashdata("success_msg","Photo successfully shared");

                    }
                    else{
                        $this->session->set_flashdata("error_msg","Photo failed shared");
                    }
                    redirect('member/post_foto');
            }
    }
            
    function sign_out(){
        $this->session->unset_userdata("is_login");
        $this->session->unset_userdata("user_tipe");
        $this->session->sess_destroy();
        redirect("home/index");
    }

    
}
