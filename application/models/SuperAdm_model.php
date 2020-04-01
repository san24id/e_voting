 <?php

class SuperAdm_model extends CI_model {
  
    public function getProfilId(){
    	
		$result = $this->db->get('m_user')->result(); 
		return $result; 
    }

    function addstaff($add){
        $sql = "INSERT INTO `m_user`(id_user, username, password, id_role_app, display_name, role_id, division_id, created_by, created_date, role_status, email, status, status_1, status_mail1, status_mail2) 
        VALUES ('".$add['id_user']."','".$add['username']."',md5('".$add['password']."'),'".$add['id_role_app']."','".$add['display_name']."','".$add['role_id']."','".$add['division_id']."',
        '".$add['created_by']."','".$add['created_date']."','".$add['role_status']."','".$add['email']."','".$add['status']."','".$add['status_1']."',
        '".$add['status_mail1']."','".$add['status_mail2']."')";

        $query = $this->db->query($sql);

        return $query;
    }
    
    public function update_myprofil($myprofil){
        $sql = "UPDATE `m_user` SET `id_role_app`='".$myprofil['id_role_app']."',`display_name`='".$myprofil['display_name']."',`role_id`='".$myprofil['role_id']."',`division_id`='".$myprofil['division_id']."',
                `role_status`='".$myprofil['role_status']."',`email` = '".$myprofil['email']."', `created_date`= NOW() WHERE id_user = '".$myprofil['id_user']."'";

        $query = $this->db->query($sql);

        return $query;
    }

    public function update_myprofilpass($myprofil){
        $sql = "UPDATE `m_user` SET `display_name`='".$myprofil['display_name']."',`role_id`='".$myprofil['role_id']."',`division_id`='".$myprofil['division_id']."',
                `role_status`='".$myprofil['role_status']."',`email` = '".$myprofil['email']."', `password`=md5('".$myprofil['password_baru']."'), 
                `created_date`= NOW() WHERE id_user = '".$myprofil['id_user']."'";

        $query = $this->db->query($sql);

        return $query;
    }
    
    

}