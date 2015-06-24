<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
    private $data;
    
    function home()
    {
        parent::__construct();
        $assets_url="http://localhost/rpl/assets/";
        $title="TOWNFOLK";
        $this->data=array("assets_url"=>$assets_url,
                          "title"=>$title);
        $this->load->model("m_user","msr");
        $this->load->model("m_profile","mpf");
        $this->load->library('facebook-php-sdk-master/src/facebook', array('appId' => '792963177468750', 'secret' => '3f586208913600fe4f8bd8d034d0134e'));

        // Get user's login information
        $this->user = $this->facebook->getUser();
    }
    public function index()
    {
        /*include_once APPPATH . "libraries/google-api-php-client-master/src/Google/autoload.php";
        include_once APPPATH . "libraries/google-api-php-client-master/src/Google/Client.php";
        include_once APPPATH . "libraries/google-api-php-client-master/src/Google/Service/Oauth2.php";

        // Store values in variables from project created in Google Developer Console
        $client_id = '602119920-q2di33cu46njvekjni0qi78glcbns493.apps.googleusercontent.com';
        $client_secret = 'GSkxZLdUdYcrVKIBra3xgkjZ';
        $redirect_uri = 'http://localhost/rpl/index.php';
        $simple_api_key = 'AIzaSyAxy_WJ0ijaRO0XuJMd3qmW3pbBdC73Hus';

        // Create Client Request to access Google API
        $client = new Google_Client();
        $client->setApplicationName("PHP Google OAuth Login Example");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->setDeveloperKey($simple_api_key);
        $client->addScope("https://www.googleapis.com/auth/userinfo.email");

        // Send Client Request
        $objOAuthService = new Google_Service_Oauth2($client);
        // Add Access Token to Session
        if (isset($_GET['code'])) {
        $client->authenticate($_GET['code']);
        $_SESSION['access_token'] = $client->getAccessToken();
        header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }

        // Set Access Token to make Request
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
        $client->setAccessToken($_SESSION['access_token']);
        }

        // Get User Data from Google and store them in $data
        if ($client->getAccessToken()) {
            $userData = $objOAuthService->userinfo->get();
            $this->data['user_profile'] = $userData;
            $_SESSION['access_token'] = $client->getAccessToken();
            //$this->load->view('member/v_member_using_google', $this->data);
        } else {
            $authUrl = $client->createAuthUrl();
            $this->data['signin_google_url'] = $authUrl;
        }*/
        
        //Facebook
        if ($this->user) {
            $user_profile = $this->facebook->api('/me/');
            // Get logout url of facebook
            $this->data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url() . 'home/logout'));
            // Send data to profile page
            $this->data['email']=$user_profile['email'];
            $this->data['birthday']=$user_profile['birthday'];
            $this->data['image']="https://graph.facebook.com/".$user_profile['id']."/picture";
            $this->data['full_name']=$user_profile['name'];
            $this->load->view('member/v_member', $this->data);
            
        } 
        else {
            // Store users facebook login url
                $this->data['signin_fb_url'] = $this->facebook->getLoginUrl();
                $this->load->view("v_home", $this->data);
        }
        
    }
    
    function forgot_password()
    {
        $this->data['title']="Lupa Password";
        $this->load->view("v_forget_password",  $this->data);
    }
    function form_register(){
       $this->data['title']="Register";
       $this->load->view("v_register",  $this->data);
    }
    
    function register(){
        
        //$this->data['title']="Registrasi";
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
            $this->load->view('v_register',$this->data);
        }
        
        else{
                $prm["email"]=$email;
                $prm["password"]=$password;

                //tambah akun user
                $id_user=$this->msr->add_account($prm);

                $profile=array( 'id_profile' => $id_user,
                                'nama_depan' => $nama_depan,
                                'nama_belakang' => $nama_belakang,
                                'tanggal_lahir' => $tgl_lahir,
                                'jenis_kelamin' => $gender,
                                'picture' => "default_user.png"
                             );
                if($this->mpf->add_profile($profile)){
                    //enkripsi id_user
                    $enkripsi_id_user= md5($id_user);

                    $config = array();
                    $config['charset'] = 'utf-8';
                    $config['useragent'] = 'Codeigniter';
                    $config['protocol']= "smtp";
                    $config['mailtype']= "html";
                    $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
                    $config['smtp_port']= "465";
                    $config['smtp_timeout']= "400";
                    $config['smtp_user']= "hariantoirwan@gmail.com"; // isi dengan email kamu
                    $config['smtp_pass']= "perfect2"; // isi dengan password kamu
                    $config['crlf']="\r\n"; 
                    $config['newline']="\r\n"; 
                    $config['wordwrap'] = TRUE;

                    //memanggil library email dan set konfigurasi untuk pengiriman email

                    $this->email->initialize($config);
                    //konfigurasi pengiriman
                    $this->email->from($config['smtp_user']);
                    $this->email->to($email);
                    $this->email->subject("Verifikasi Akun");
                    $this->email->message(
                            "terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
                            base_url("home/verification/$enkripsi_id_user")
                    );

                    if($this->email->send())
                    {
                        $this->session->set_flashdata("success_msg", "Registration success, Please check your email &nbsp;&nbsp;&nbsp;<a href='".  base_url()."'>Back to Login menu</a>");
                           
                    }
                    else
                    {
                        $this->session->set_flashdata("error_msg", "Registration success, But failed to send email verification &nbsp;&nbsp;&nbsp;<a href='".  base_url()."'>Back to Login menu</a>");
                            //echo "Berhasil melakukan registrasi, namun gagal mengirim verifikasi email";
                    }
                    
                    //echo "<br><br><a href='".  base_url()."'>Kembali ke Menu Login</a>";

                }

                else{
                        $this->session->set_flashdata("error_msg", "Registration failed &nbsp;&nbsp;&nbsp;<a href='".  base_url()."'>Back to Login menu</a>");
                    }
                    
               redirect("home/form_register");  
        }
    }
    
    
    function verification($key)
    {
        if($this->msr->changeActiveState($key)){
            $this->session->set_flashdata("success_msg", "Congratulation, You have to verify your account");
            redirect("home/index");
        }
    }
    
    function login_process(){
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        
        $prm['email']=$email;
        $prm['password']=$password;
        
        if($this->msr->check_user($prm)){
            
            $this->session->set_userdata("is_login","log");
            
            if($this->msr->get_user_type($prm)=="admin"){
                
                $this->session->set_userdata("email",$email);
                $this->session->set_userdata("user_tipe","admin");
                
                redirect("admin/index");
                
            }
            elseif($this->msr->get_user_type($prm)=="member"){
                
                $this->session->set_userdata("email",$email);
                $this->session->set_userdata("user_tipe","member");
                redirect("member/index");
            }
            
        }
        else{
            $this->session->set_flashdata("error_msg", "Email or Password Wrong");
            redirect("home/index");
        }
        
    }
    
    function find_account(){
        $email=$this->input->post('email');
        
        if($this->msr->get_user_account_by($email)){
            $this->data['user_profile']=  $this->mpf->get_profile_user($email);
            $this->load->view("v_reset_password",  $this->data);
        }
        else{
            $this->session->set_flashdata("error_msg","Your Account Not Found");
            redirect("home/forgot_password");
        }
    }
    
    function reset_password(){
        $email=$this->input->post('email');
        $password= random_string('alnum', 16);
        
        $prm["email"]=$email;
        $prm["password"]=$password;
        
        
        if($this->msr->reset_password_user($prm)){
            
            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol']= "smtp";
            $config['mailtype']= "html";
            $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
            $config['smtp_port']= "465";
            $config['smtp_timeout']= "400";
            $config['smtp_user']= "hariantoirwan@gmail.com"; // isi dengan email kamu
            $config['smtp_pass']= "perfect2"; // isi dengan password kamu
            $config['crlf']="\r\n"; 
            $config['newline']="\r\n"; 
            $config['wordwrap'] = TRUE;
		
            //memanggil library email dan set konfigurasi untuk pengiriman email
			
            $this->email->initialize($config);
            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject("Reset Password");
            $this->email->message("You have requested the new password, This is your new password: $password");

            if($this->email->send()){
                $this->session->set_flashdata("success_msg", "Reset Password Success and Check Your Email : $email");
                redirect("home/index");        
            }
            else{
                $this->session->set_flashdata("error_msg", "Reset Password Failed");
                redirect("home/index");
            }
            
        }
        else{
            
        }
    }

    public function logout() {

        // Destroy session
        session_destroy();

        // Redirect to baseurl
        redirect(base_url());
        }
}