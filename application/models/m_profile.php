<?php
    class M_profile extends CI_Model
    {
        function add_profile($profile)
        {
            if($this->db->insert('profile',$profile))
            {
                return TRUE;
            }
            else 
            {
                return FALSE;
            } 
        }
        function get_profile_user($email){
            $this->db->select('p.nama_depan, p.nama_belakang, p.picture, u.email');
            $this->db->from('profile p');
            $this->db->join('user u', 'p.id_profile = u.id_user', 'left');
            $this->db->where('u.email', $email);
            return $query = $this->db->get();
        }
        
    }
?>

