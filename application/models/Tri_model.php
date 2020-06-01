<?php
error_reporting(0);
class Tri_model extends CI_Model{

    public function getList() {

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.type = b.id_pay WHERE status in ('9','10')";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitPaid(){
        $sql = "SELECT COUNT(status) as wpaid FROM t_payment_l WHERE status='9'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getPaid(){
        $sql = "SELECT COUNT(status) as paid FROM t_payment_l WHERE status='10'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getListwfp() {

        $sql = "SELECT * FROM t_payment_l WHERE status='9'";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getpaidList() {

        $sql = "SELECT * FROM t_payment_l WHERE status='10'";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function updatepaid($upd){
        $sql = "UPDATE `t_payment_l` SET `status`='".$upd['status']."',`handled_by`='".$upd['handled_by']."' WHERE `id`='".$upd['id']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }
}