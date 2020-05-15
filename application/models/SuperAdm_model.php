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

    public function getSupplier(){
        $sql = "SELECT * FROM `m_supplier`";

        $query = $this->db->query($sql);

        return $query;
    }

    function addsupplier($add){
        $sql = "INSERT INTO `m_supplier` (id_supplier, kode_supplier, nama_supplier, npwp, badan_usaha, pic, direktur, alamat, telepon, nama_bank, mata_uang, no_rek) VALUES 
                ('".$add['id_supplier']."','".$add['kode_supplier']."','".$add['nama_supplier']."','".$add['npwp']."','".$add['badan_usaha']."','".$add['pic']."',
                '".$add['direktur']."','".$add['alamat']."','".$add['telepon']."','".$add['nama_bank']."','".$add['mata_uang']."','".$add['no_rek']."')"; 

        $query = $this->db->query($sql);

        return $query;        
    }
     function updatesupplier($upd){
        $sql = "UPDATE `m_supplier` SET `kode_supplier`='".$upd['kode_supplier']."',`nama_supplier`='".$upd['nama_supplier']."',`npwp`='".$upd['npwp']."',
                `badan_usaha`='".$upd['badan_usaha']."',`pic`='".$upd['pic']."',`direktur`='".$upd['direktur']."',`alamat` = '".$upd['alamat']."',
                `telepon` = '".$upd['telepon']."',`nama_bank` = '".$upd['nama_bank']."',`mata_uang` = '".$upd['mata_uang']."',`no_rek` = '".$upd['no_rek']."' WHERE id_supplier = '".$upd['id_supplier']."'";
       
       $query = $this->db->query($sql);

        return $query;       
     }

     function deletesupplier($id){
        $sql = "DELETE FROM `m_supplier` WHERE `m_supplier`.`id_supplier` = $id";

        $query = $this->db->query($sql);

        return $query;
     }

     function getCurrency(){
        $result = $this->db->get('m_currency')->result();
        return $result; 
     }

     function addcurr($add){
        $sql = "INSERT INTO `m_currency` (id_curr, mata_uang, currency) VALUES ('".$add['id_curr']."','".$add['mata_uang']."','".$add['currency']."')";

        $query = $this->db->query($sql);

        return $query;
    }
    
    public function updatecurr($upd){
        $sql = "UPDATE `m_currency` SET `mata_uang`='".$upd['mata_uang']."',`currency`='".$upd['currency']."' WHERE id_curr = '".$upd['id_curr']."'";

        $query = $this->db->query($sql);

        return $query;
    }
    
    function deletecurr($id){
        $sql = "DELETE FROM `m_currency` WHERE `m_currency`.`id_curr` = $id";

        $query = $this->db->query($sql);

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
}