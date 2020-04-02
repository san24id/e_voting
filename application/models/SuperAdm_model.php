 <?php

class SuperAdm_model extends CI_model {
  
    public function getProfilId(){
    	
		$result = $this->db->get('m_user')->result(); 
		return $result; 
    }

    function addstaff($add){
        $sql = "INSERT INTO `m_user`(id_user, username, password, id_role_app, display_name, role_id, division_id, created_by, created_date, role_status, email, status, 
                status_login, status_mail1, status_mail2) VALUES ('".$add['id_user']."','".$add['username']."',md5('".$add['password']."'),'".$add['id_role_app']."',
                '".$add['display_name']."','".$add['role_id']."','".$add['division_id']."','".$add['created_by']."','".$add['created_date']."','".$add['role_status']."',
                '".$add['email']."','".$add['status']."','".$add['status_login']."','".$add['status_mail1']."','".$add['status_mail2']."')";

        $query = $this->db->query($sql);

        return $query;
    }
    
    public function updatestaff($upd){
        $sql = "UPDATE `m_user` SET `id_role_app`='".$upd['id_role_app']."',`display_name`='".$upd['display_name']."',`role_id`='".$upd['role_id']."',`division_id`='".$upd['division_id']."',
                `role_status`='".$upd['role_status']."',`email` = '".$upd['email']."',`status` = '".$upd['status']."' WHERE id_user = '".$upd['id_user']."'";

        $query = $this->db->query($sql);

        return $query;
    }
    
    function deletestaff($id){
        $sql = "DELETE FROM `m_user` WHERE `m_user`.`id_user` = $id";

        $query = $this->db->query($sql);

        return $query;
    }
    

}