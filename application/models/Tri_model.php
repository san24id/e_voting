<?php
error_reporting(0);
class Tri_model extends CI_Model{

    public function getList() {

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.type = b.id_pay WHERE status in ('9','10') ";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function periode($start_date,$end_date) {
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.type = b.id_pay WHERE status in ('9','10') AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitPaid(){
        $sql = "SELECT COUNT(status) as wpaid FROM t_payment_l WHERE status='9'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitPaidPeriode($start_date,$end_date){
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }
        $sql = "SELECT COUNT(status) as wpaid FROM t_payment_l WHERE status='9' AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getPaid(){
        $sql = "SELECT COUNT(status) as paid FROM t_payment_l WHERE status='10'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getPaidPeriode($start_date,$end_date){
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }
        $sql = "SELECT COUNT(status) as paid FROM t_payment_l WHERE status='10' AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getListwfp() {

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.type = b.id_pay WHERE status='9'";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getpaidList() {

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.type = b.id_pay WHERE status='10'";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function updatepaid($upd){
        $sql = "UPDATE `t_payment_l` SET `status`='".$upd['status']."',`handled_by`='".$upd['handled_by']."',`paid_date`='".$upd['paid_date']."' 
                WHERE `id`='".$upd['id']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }
    
    function approve($paid_date,$nomor_surat){
        $sql = "UPDATE `t_tax` SET `paid_date`='".$paid_date."' WHERE `nomor_surat`='".$nomor_surat."' ";

        $query = $this->db->query($sql);

        return $query;
    }


}