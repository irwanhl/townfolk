<?php
    class M_user extends CI_Model
    {
        function add_account($prm)
        {
           $data =array( "email" => $prm['email'],
                         "password" => md5($prm['password']),
                         "register_date" => date("Y-m-d H:i:s"),
                         "status" =>"pending",
                         "tipe" =>"member"
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
        
        function get_id_user($prm){
            $this->db->where("email",$prm['email']);
            $this->db->where("password",md5($prm['password']));
            $query=$this->db->get("user");
            return $query->row()->id_user;
        }
        
        function changeActiveState($key)
        {
            $data = array('status' => "active");
            $this->db->where('md5(id_user)', $key);
            $this->db->update('user', $data);

            return true;
        }
        
        function check_user($prm){
            
            $this->db->where("email",$prm['email']);
            $this->db->where("password",md5($prm['password']));
            $this->db->where("status","active");
            $query=$this->db->get("user");
            
            if($query->num_rows()>0)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
            
        }
        
        function get_user_type($prm){
            
            $this->db->where("email",$prm['email']);
            $this->db->where("password",md5($prm['password']));
            $query=$this->db->get("user");
            return $query->row()->tipe;
        }
        
        function get_user_account_by($email){
            $this->db->where("email",$email);
            $this->db->where("status","active");
            $query=$this->db->get("user");
            if($query->num_rows()>0){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        function reset_password_user($prm){
            $modify=array("password"=>md5($prm['password']));
            $this->db->where("email",$prm['email']);
            if($this->db->update("user",$modify))
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        function get_member(){
            $this->db->select('u.id_user, u.email, u.register_date, u.status, p.nama_depan, p.nama_belakang, p.tanggal_lahir, p.jenis_kelamin, p.picture');
            $this->db->from('user u');
            $this->db->join('profile p', 'p.id_profile = u.id_user', 'left');
            $this->db->where('u.tipe', "member");
            $this->db->group_by('p.nama_depan');
            return $query = $this->db->get(); 
        }
        
        function get_data_member($email){
            
            $this->db->select('u.id_user, u.email, u.register_date, u.status, p.nama_depan, p.nama_belakang, p.tanggal_lahir, p.jenis_kelamin, p.picture');
            $this->db->from('user u');
            $this->db->join('profile p', 'p.id_profile = u.id_user', 'left');
            $this->db->where('u.email', $email);
            return $query = $this->db->get();
            
        }
        function get_admin(){
            $this->db->select('u.id_user, u.email, u.register_date, u.status, p.nama_depan, p.nama_belakang, p.tanggal_lahir, p.jenis_kelamin, p.picture');
            $this->db->from('user u');
            $this->db->join('profile p', 'p.id_profile = u.id_user', 'left');
            $this->db->where('u.tipe', "admin");
            $this->db->group_by('p.nama_depan');
            return $query = $this->db->get();
        }
        function get_data_admin($email){
            
            $this->db->select('u.email, u.register_date, u.status, p.nama_depan, p.nama_belakang, p.tanggal_lahir, p.jenis_kelamin, p.picture');
            $this->db->from('user u');
            $this->db->join('profile p', 'p.id_profile = u.id_user', 'left');
            $this->db->where('u.email', $email);
            return $query = $this->db->get();
        }
        function get_data_admin_by($id_user){
            $this->db->select('u.id_user, u.email, u.register_date, u.status, p.nama_depan, p.nama_belakang, p.tanggal_lahir, p.jenis_kelamin, p.picture');
            $this->db->from('user u');
            $this->db->join('profile p', 'p.id_profile = u.id_user', 'left');
            $this->db->where('u.id_user', $id_user);
            return $query = $this->db->get();   
        }
        
        function update_admin($prm){
                
            $modify=array("nama_depan" => $prm['nama_depan'],
                          "nama_belakang" => $prm['nama_belakang'],
                          "tanggal_lahir" => $prm['tgl_lahir'],
                          "jenis_kelamin" => $prm['gender']
                        );
            
            $this->db->where("id_profile",$prm['id_user']);
            
            if($this->db->update("profile",$modify)){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        
        function get_data_member_by($id_user){
            $this->db->select('u.id_user, u.email, u.register_date, u.status, p.nama_depan, p.nama_belakang, p.tanggal_lahir, p.jenis_kelamin, p.picture');
            $this->db->from('user u');
            $this->db->join('profile p', 'p.id_profile = u.id_user', 'left');
            $this->db->where('u.id_user', $id_user);
            return $query = $this->db->get(); 
        }
        
        function delete_member($id_user){
            $this->db->where("id_profile",$id_user);
			
            if($this->db->delete("profile"))
            {
                $this->db->where("id_user",$id_user);
                
                if($this->db->delete("user")){
                    return TRUE; 
                }
                else{
                    return FALSE; 
                }
                    
            }
            else{
                return FALSE;
            }
            
        }
        
        function delete_admin($id_user){
            $this->db->where("id_profile",$id_user);
			
            if($this->db->delete("profile"))
            {
                $this->db->where("id_user",$id_user);
                
                if($this->db->delete("user")){
                    return TRUE; 
                }
                else{
                    return FALSE; 
                }
                    
            }
            else{
                return FALSE;
            } 
        }
        
        function set_status_member($prm){
            $modify =array("status" => $prm['status']);
			
            $this->db->where("id_user",$prm['id_user']);

            if($this->db->update("user",$modify)){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        
        function set_status_admin($prm){
            $modify =array("status" => $prm['status']);
            
            $this->db->where("id_user",$prm['id_user']);

            if($this->db->update("user",$modify)){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    }
?>

