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
        $sql = "UPDATE `m_user` SET `id_role_app`='".$upd['id_role_app']."',`display_name`='".$upd['display_name']."',`username`='".$upd['username']."',
                `role_id`='".$upd['role_id']."',`division_id`='".$upd['division_id']."',`role_status`='".$upd['role_status']."',`email` = '".$upd['email']."',
                `status` = '".$upd['status']."' WHERE id_user = '".$upd['id_user']."'";

        $query = $this->db->query($sql);

        return $query;
    }
    
    function deletestaff($id){
        $sql = "DELETE FROM `m_user` WHERE `m_user`.`id_user` = $id";

        $query = $this->db->query($sql);

        return $query;
    }

    public function getDivisi(){
        $sql = "SELECT * FROM `m_division`";

        $query = $this->db->query($sql)->result();

        return $query;
    }

    function adddivisi($add){
        $sql = "INSERT INTO `m_division` (id_div, division_id, division_name, short_division, created_by, created_date, status)
                VALUES 
                ('".$add['id_div']."','".$add['division_id']."','".$add['division_name']."','".$add['short_division']."','".$add['created_by']."','".$add['created_date']."',
                '".$add['status']."')"; 
        // var_dump($sql);exit;
        $query = $this->db->query($sql);
        
        return $query;        
    }

     function updatedivisi($upd){
        $sql = "UPDATE `m_division` SET `division_id`='".$upd['division_id']."',`division_name`='".$upd['division_name']."',`shor_division`='".$upd['shor_division']."',
                `created_by`='".$upd['created_by']."',`created_date`='".$upd['created_date']."',`status`='".$upd['status']."' 
                
                WHERE id_div = '".$upd['id_div']."'";
       
       $query = $this->db->query($sql);

        return $query;       
     }

     function deletedivisi($id){
        $sql = "DELETE FROM `m_division` WHERE `m_division`.`id_div` = $id";

        $query = $this->db->query($sql);

        return $query;
     }

     function getCurrency(){
        $result = $this->db->get('m_currency')->result();
        return $result; 
     }

     function addcurr($add){
        $sql = "INSERT INTO `m_currency` (id_curr, mata_uang, currency, kurs) VALUES ('".$add['id_curr']."','".$add['mata_uang']."','".$add['currency']."','".$add['kurs']."')";

        $query = $this->db->query($sql);

        return $query;
    }
    
    public function updatecurr($upd){
        $sql = "UPDATE `m_currency` SET `mata_uang`='".$upd['mata_uang']."',`currency`='".$upd['currency']."',`kurs`='".$upd['kurs']."' WHERE id_curr = '".$upd['id_curr']."'";

        $query = $this->db->query($sql);

        return $query;
    }
    
    function deletecurr($id){
        $sql = "DELETE FROM `m_currency` WHERE `m_currency`.`id_curr` = $id";

        $query = $this->db->query($sql);
        // var_dump($sql);exit;

        return $query;
    }

    function getBank(){
        $result = $this->db->get('m_bank')->result();
        return $result; 
    }

    function addbank($add){
        $sql = "INSERT INTO `m_bank` (id_bank, nama_bank, singkatan) VALUES ('".$add['id_bank']."','".$add['nama_bank']."','".$add['singkatan']."')";

        $query = $this->db->query($sql);

        return $query;
    }
    
    public function updatebank($upd){
        $sql = "UPDATE `m_bank` SET `nama_bank`='".$upd['nama_bank']."',`singkatan`='".$upd['singkatan']."' WHERE id_bank = '".$upd['id_bank']."'";

        $query = $this->db->query($sql);

        return $query;
    }
    
    function deletebank($id){
        $sql = "DELETE FROM `m_bank` WHERE `m_bank`.`id_bank` = $id";

        $query = $this->db->query($sql);

        return $query;
    }
	
	public function get_curr_by_id($id)
	{
		$this->db->from('m_currency');
		$this->db->where('id_curr',$id);
		$query = $this->db->get();

		return $query->row();
	}
	
	public function currency_update($where, $data)
	{
		$this->db->update('m_currency', $data, $where);
		return $this->db->affected_rows();
	}
}
