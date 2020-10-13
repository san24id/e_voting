<?php
error_reporting(0);
class Approval_model extends CI_Model{

    public function getList() {

        $start_date = date('Y-01-01');
        $end_date = date('Y-m-d');

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status in ('8', '12', '13', '9', '10') AND tanggal2 BETWEEN '$start_date' AND '$end_date'
                ORDER BY tanggal2 DESC";
                
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

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status in ('8', '12', '13', '9', '10') AND tanggal2 BETWEEN '$start_date' AND '$end_date'
                ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getListWait(){
        $start_date = date('Y-01-01');
        $end_date = date('Y-m-d');

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status in ('8' ,'12', '13') AND tanggal2 BETWEEN '$start_date' AND '$end_date'
                ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getMonitoringWaitApproval($sid=0,$start_date,$end_date) {
        $dvs = $this->session->userdata('division_id');
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }

        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE  
                status in ('8' ,'12', '13') AND tanggal2 BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getListApproved(){
        $start_date = date('Y-01-01');
        $end_date = date('Y-m-d');

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status ='9' AND tanggal2 BETWEEN '$start_date' AND '$end_date'
                ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getMonitoringListApproved($sid=0,$start_date,$end_date) {
        $dvs = $this->session->userdata('division_id');
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }

        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE  
                status = '9' AND tanggal2 BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getRejected(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('username');
        
        $start_date = date('Y-01-01');
        $end_date = date('Y-m-d');

        $sql = "SELECT * FROM t_payment_l WHERE status='5' AND rejected_by= '$usr' AND tanggal2 BETWEEN '$start_date' AND '$end_date'";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitApproval(){

        $start_date = date('Y-01-01');
        $end_date = date('Y-m-d');

        $sql = "SELECT COUNT(status) as approval FROM t_payment_l WHERE status in ('8' ,'12', '13') AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitApprovalPeriode($start_date,$end_date){
        $sql = "SELECT COUNT(status) as approval FROM t_payment WHERE status in ('8' ,'12', '13') AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function TotalApproved(){
        $sql = "SELECT COUNT(status) as tot_approved FROM t_payment_l WHERE status=9";
        $query = $this->db->query($sql)->result();
        return $query;
    }
    function TotalApprovedPeriode($start_date,$end_date){
        $sql = "SELECT COUNT(status) as tot_approved FROM t_payment WHERE status=9 AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getVPayment() {
        $sql = "SELECT a.tanggal2, b.jenis_pembayaran, COUNT(a.jenis_pembayaran) as jmlpembayaran FROM t_payment_l a RIGHT JOIN t_pembayaran b ON a.jenis_pembayaran = b.id_pay 
                WHERE b.jenis_pembayaran != '' AND a.jenis_pembayaran != 0 AND a.status in ('8', '12', '13', '9','10') GROUP BY b.jenis_pembayaran";

        // $sql = "SELECT * FROM (SELECT a.status, b.dsc, COUNT(a.jenis_pembayaran) AS jmlpembayaran FROM t_payment a RIGHT JOIN t_pembayaran b ON a.jenis_pembayaran = b.id_pay 
        //         GROUP by b.jenis_pembayaran ORDER by b.id_pay) otr WHERE otr.jmlpembayaran != 0 AND otr.dsc IS NOT NULL AND otr.status in ('2','4','5','6','7','8','9','10')";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getVPaymentPeriode($start_date,$end_date) {
        // $sql = "SELECT * FROM (SELECT b.dsc, a.divisi, COUNT(a.jenis_pembayaran) AS jmlpembayaran FROM t_payment a RIGHT JOIN t_pembayaran b ON a.jenis_pembayaran = b.id_pay 
        //         GROUP by b.jenis_pembayaran ORDER by b.id_pay) otr WHERE otr.dsc != '' AND otr.divisi = '$test' AND otr.jmlpembayaran != 0 AND otr.dsc IS NOT NULL";

        $sql = "SELECT a.tanggal2, b.jenis_pembayaran, COUNT(a.jenis_pembayaran) as jmlpembayaran FROM t_payment_l a RIGHT JOIN t_pembayaran b ON a.jenis_pembayaran = b.id_pay 
                WHERE b.jenis_pembayaran != '' AND a.jenis_pembayaran != 0 AND a.status in ('8', '12', '13', '9','10')
                AND a.tanggal2 BETWEEN '$start_date' AND '$end_date' GROUP BY b.jenis_pembayaran";
       
        $query = $this->db->query($sql)->result();
                // var_dump($query);exit;
        
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

    function notifApproval(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql = "SELECT COUNT(status) as w_approval FROM t_payment WHERE status in ('8' ,'12', '13')";
        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
        return $query;

    }
    
}   