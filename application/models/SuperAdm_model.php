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
        $sql = "INSERT INTO `m_supplier` (id_supplier, kode_supplier, nama_supplier, npwp, badan_usaha, pic, direktur, alamat, telepon, nama_bank, no_rek) VALUES 
                ('".$add['id_supplier']."','".$add['kode_supplier']."','".$add['nama_supplier']."','".$add['npwp']."','".$add['badan_usaha']."','".$add['pic']."',
                '".$add['direktur']."','".$add['alamat']."','".$add['telepon']."','".$add['nama_bank']."','".$add['no_rek']."')"; 

        $query = $this->db->query($sql);

        return $query;        
    }
     function updatesupplier($upd){
        $sql = "UPDATE `m_supplier` SET `kode_supplier`='".$upd['kode_supplier']."',`nama_supplier`='".$upd['nama_supplier']."',`npwp`='".$upd['npwp']."',
                `badan_usaha`='".$upd['badan_usaha']."',`pic`='".$upd['pic']."',`direktur`='".$upd['direktur']."',`alamat` = '".$upd['alamat']."',
                `telepon` = '".$upd['telepon']."',`nama_bank` = '".$upd['nama_bank']."',`no_rek` = '".$upd['no_rek']."' WHERE id_supplier = '".$upd['id_supplier']."'";
       
       $query = $this->db->query($sql);

        return $query;       
     }

     function deletesupplier($id){
        $sql = "DELETE FROM `m_supplier` WHERE `m_supplier`.`id_supplier` = $id";

        $query = $this->db->query($sql);

        return $query;
     }

}