<?php
    class M_postingan extends CI_Model
    {
        function save($prm){
                    
            $data=array('describe'=>$prm['describe'],
                        'gambar'=>$prm['gambar'],
                        'tgl_post'=>date("Y-m-d H:i:s"),
                        'id_member'=>$prm['id_member']
			);
            if($this->db->insert('post_foto',$data))
            {
                    return TRUE;
            }
            else
            {
                    return FALSE;
            }
            
        }
        
    }
?>

