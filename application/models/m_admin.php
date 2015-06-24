<?php
    class M_admin extends CI_Model
    {
        function add_account($prm)
        {
           $data =array( "email" => $prm['email'],
                         "password" => md5($prm['password']),
                         "register_date" => date("Y-m-d H:i:s"),
                         "status" =>"active",
                         "tipe" =>"admin"
                        );
            
            if($this->db->insert('user',$data))
            {
                return mysql_insert_id();
            }
            else 
            {
                return FALSE;
            } 
        }
        
    }
?>

