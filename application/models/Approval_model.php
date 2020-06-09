<?php
error_reporting(0);
class Approval_model extends CI_Model{

    public function getList() {

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.type = b.id_pay WHERE status in ('8', '9', '10')";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getListWait(){

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.type = b.id_pay WHERE status ='8'";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getListApproved(){

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.type = b.id_pay WHERE status ='9'";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getRejected(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('username');

        $sql ="SELECT * FROM t_payment_l WHERE status='4' AND rejected_by= '$usr' ";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitApproval(){
        $sql = "SELECT COUNT(status) as approval FROM t_payment_l WHERE status=8";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function TotalApproved(){
        $sql = "SELECT COUNT(status) as tot_approved FROM t_payment_l WHERE status=9";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function updateapprove($upd){
        $sql = "UPDATE `t_payment_l` SET `status`='".$upd['status']."',`handled_by`='".$upd['handled_by']."' WHERE `id`='".$upd['id']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    function updatepay($status,$nomor_surat,$handled_by,$rejected_by,$rejected_date,$note){
        
        $sql = "UPDATE `t_payment` SET `status`='".$status."',`handled_by`='".$handled_by."',`rejected_by`='".$rejected_by."',`rejected_date`='".$rejected_date."',`note`='".$note."' 
                WHERE `nomor_surat`='".$nomor_surat."'";
        
        $query = $this->db->query($sql);

        return $query;
    }

    public function updaterejected($upd){
        $sql = "UPDATE `t_payment_l` SET `status`='".$upd['status']."',`note`='".$upd['note']."',`rejected_by`='".$upd['rejected_by']."',`rejected_date`='".$upd['rejected_date']."'
                WHERE `id`='".$upd['id']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    
}   