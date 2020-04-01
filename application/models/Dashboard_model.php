<?php
error_reporting(0);
class Dashboard_model extends CI_Model{

    public function payment() {
        $sql = "SELECT a.*, b.dsc FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getTotal(){

        $sql = "SELECT COUNT(jenis_pembayaran) as totalreq FROM t_payment";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getTotalDraft(){

        $sql = "SELECT COUNT(status) as totaldraft FROM t_payment";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getVPayment() {
        // $sql = "SELECT * FROM (SELECT b.dsc, a.divisi, COUNT(a.jenis_pembayaran) AS jmlpembayaran FROM t_payment a RIGHT JOIN t_pembayaran b ON a.jenis_pembayaran = b.id_pay 
        //         GROUP by b.jenis_pembayaran ORDER by b.id_pay) otr WHERE otr.dsc != '' AND otr.divisi = '$test' AND otr.jmlpembayaran != 0 AND otr.dsc IS NOT NULL";

        $sql = "SELECT * FROM (SELECT b.dsc, COUNT(a.jenis_pembayaran) AS jmlpembayaran FROM t_payment a RIGHT JOIN t_pembayaran b ON a.jenis_pembayaran = b.id_pay 
                GROUP by b.jenis_pembayaran ORDER by b.id_pay) otr WHERE otr.dsc != '' AND otr.jmlpembayaran != 0 AND otr.dsc IS NOT NULL";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }
}