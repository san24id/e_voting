<?php
error_reporting(0);
class Tri_model extends CI_Model{

    public function getList() {

        $start_date = date('Y-01-01');
        $end_date = date('Y-m-d');

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status in ('9','10') AND tanggal2 BETWEEN '$start_date' AND '$end_date'
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

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status in ('9','10') AND tanggal2 BETWEEN '$start_date' AND '$end_date'
                ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitPaid(){
        $start_date = date('Y-01-01');
        $end_date = date('Y-m-d');

        $sql = "SELECT COUNT(status) as wpaid FROM t_payment_l WHERE status='9' AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
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

        $start_date = date('Y-01-01');
        $end_date = date('Y-m-d');

        $sql = "SELECT COUNT(status) as paid FROM t_payment_l WHERE status='10' AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
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

        $start_date = date('Y-01-01');
        $end_date = date('Y-m-d');

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status='9' AND tanggal2 BETWEEN '$start_date' AND '$end_date'
                ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getpaidList() {

        $start_date = date('Y-01-01');
        $end_date = date('Y-m-d');

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status='10' AND tanggal2 BETWEEN '$start_date' AND '$end_date'
                ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getVPayment() {
        $sql = "SELECT a.tanggal2, b.jenis_pembayaran, COUNT(a.jenis_pembayaran) as jmlpembayaran FROM t_payment_l a RIGHT JOIN t_pembayaran b ON a.jenis_pembayaran = b.id_pay 
                WHERE b.jenis_pembayaran != '' AND a.jenis_pembayaran != 0 AND a.status in ('9','10') GROUP BY b.jenis_pembayaran";

        // $sql = "SELECT * FROM (SELECT a.status, b.dsc, COUNT(a.jenis_pembayaran) AS jmlpembayaran FROM t_payment a RIGHT JOIN t_pembayaran b ON a.jenis_pembayaran = b.id_pay 
        //         GROUP by b.jenis_pembayaran ORDER by b.id_pay) otr WHERE otr.jmlpembayaran != 0 AND otr.dsc IS NOT NULL AND otr.status in ('2','4','5','6','7','8','9','10')";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getVPaymentPeriode($start_date,$end_date) {
        // $sql = "SELECT * FROM (SELECT b.dsc, a.divisi, COUNT(a.jenis_pembayaran) AS jmlpembayaran FROM t_payment a RIGHT JOIN t_pembayaran b ON a.jenis_pembayaran = b.id_pay 
        //         GROUP by b.jenis_pembayaran ORDER by b.id_pay) otr WHERE otr.dsc != '' AND otr.divisi = '$test' AND otr.jmlpembayaran != 0 AND otr.dsc IS NOT NULL";

        $sql = "SELECT a.tanggal2, b.jenis_pembayaran, COUNT(a.jenis_pembayaran) as jmlpembayaran FROM t_payment_l a RIGHT JOIN t_pembayaran b ON a.jenis_pembayaran = b.id_pay 
                WHERE b.jenis_pembayaran != '' AND a.jenis_pembayaran != 0 AND a.status in ('9','10') AND a.tanggal2 BETWEEN '$start_date' AND '$end_date' GROUP BY b.jenis_pembayaran";
       
        $query = $this->db->query($sql)->result();
                // var_dump($query);exit;
        
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

    function notifPayment(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql = "SELECT COUNT(status) as w_payment FROM t_payment WHERE status='9'";
        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
        return $query;

    }
}