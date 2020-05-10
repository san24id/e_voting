<?php
error_reporting(0);
class Dashboard_model extends CI_Model{

    public function payment() {
        $sql = "SELECT a.*, b.dsc FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function processing(){
        $sql = "SELECT COUNT(status) as process FROM t_payment WHERE status=2";
        
        $query = $this->db->query($sql)->result();
        return $query;
    
    }

    public function getTotal(){

        $sql = "SELECT COUNT(jenis_pembayaran) as totalreq FROM t_payment";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function updateaccept($upd){
        $sql = "UPDATE `t_payment` SET `status`='".$upd['status']."' WHERE `id_payment`='".$upd['id_payment']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    public function updaterejected($upd){
        $sql = "UPDATE `t_payment` SET `status`='".$upd['status']."',`note`='".$upd['note']."',`rejected_by`='".$upd['rejected_by']."',`rejected_date`='".$upd['rejected_date']."'
                WHERE `id_payment`='".$upd['id_payment']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    function nomorsurat(){
        $sql = "SELECT nomor_surat AS number1 FROM t_payment WHERE status = 7";

        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
        return $query;
    }

    public function updateprocess($upd){
        $sql = "UPDATE `t_payment` SET `status`='".$upd['status']."',`handled_by`='".$upd['handled_by']."' WHERE `id_payment`='".$upd['id_payment']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    public function getTotalDraft(){

        $sql = "SELECT * FROM (SELECT b.status_laporan, COUNT(a.status) AS totaldraft FROM t_payment a RIGHT JOIN m_status b ON 
                a.status = b.id_status AND a.status = '1' GROUP by b.status_laporan ORDER by b.id_status) otr 
                WHERE otr.status_laporan != '' AND otr.totaldraft != 0 AND otr.status_laporan IS NOT NULL";
                
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

    function getAdminCSF() {
        $sql = "SELECT * FROM `m_user` WHERE id_role_app = '2' AND role_id < 4;";

        $query = $this->db->query($sql)->result();
        return $query;

    }

    function getmyTask() {
        $usr= $this->session->userdata("username");

        $sql ="SELECT a.*, b.dsc FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE handled_by='$usr'";
        // var_dump($sql);exit;

        $query = $this->db->query($sql)->result();
        return $query;

    }

    function getmyTask1() {
        $usr= $this->session->userdata("username");

        $sql = "SELECT * FROM t_payment_l";
        // var_dump($sql);exit;

        $query = $this->db->query($sql)->result();
        return $query;

    }

    public function getProcessing(){
        $sql = "SELECT COUNT(status) as process FROM t_payment WHERE status in ('4','5','6','7')";
        
        $query = $this->db->query($sql)->result();
        return $query;
    
    }

    function getTax() {
        $sql = "SELECT COUNT(status) as tax FROM t_payment WHERE status= '4'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getFinance(){
        $sql = "SELECT COUNT(status) as finance FROM t_payment WHERE status= '5'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitReview(){
        $sql = "SELECT COUNT(status) as wreview FROM t_payment WHERE status= '6'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitVerifikasi(){
        $sql = "SELECT COUNT(status) as wverifikasi FROM t_payment WHERE status='7'";
        // var_dump ($sql);exit;
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getVerifikasi(){
        $sql = "SELECT COUNT(status) as verifikasi FROM t_payment WHERE status='8'";
        // var_dump ($sql);exit;
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitApproval(){
        $sql = "SELECT COUNT(status) as wapproval FROM t_payment WHERE status='8'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getApproval(){
        $sql = "SELECT COUNT(status) as approval FROM t_payment WHERE status='9'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitPaid(){
        $sql = "SELECT COUNT(status) as wpaid FROM t_payment WHERE status='9'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getPaid(){
        $sql = "SELECT COUNT(status) as paid FROM t_payment WHERE status='10'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function addpay($add){
        $sql = "INSERT INTO `t_payment_l` (display_name, type, status, tanggal, arf_doc, asf_doc, prf_doc, crf_doc, nomor_surat, kode_proyek, division_id,
                tanggal_selesai, label1, description, currency, jumlah, terbilang, dibayar_kepada, verified_date, penanggung_jawab, jabatan, 
                persetujuan_pembayaran1, persetujuan_pembayaran2, persetujuan_pembayaran3, jabatan1, jabatan2, jabatan3, catatan ) 
        VALUES ('".$add['display_name']."','".$add['type']."','".$add['status']."','".$add['tanggal']."','".$add['arf_doc']."','".$add['asd_doc']."','".$add['prf_doc']."',
                '".$add['crf_doc']."','".$add['nomor_surat']."','".$add['kode_proyek']."','".$add['division_id']."','".$add['tanggal_selesai']."','".$add['label1']."',
                '".$add['description']."','".$add['currency']."','".$add['jumlah']."','".$add['terbilang']."','".$add['dibayar_kepada']."','".$add['verified_date']."',
                '".$add['penanggung_jawab']."','".$add['jabatan']."','".$add['persetujuan_pembayaran1']."','".$add['persetujuan_pembayaran2']."','".$add['persetujuan_pembayaran3']."',
                '".$add['jabatan1']."','".$add['jabatan2']."','".$add['jabatan3']."','".$add['catatan']."')";
        
        $query = $this->db->query($sql);

        return $query;
    }
    
    function updatepay($status,$nomor_surat){
        
        $sql = "UPDATE `t_payment` SET `status`='".$status."' WHERE `nomor_surat`='".$nomor_surat."'";
        
        $query = $this->db->query($sql);

        return $query;
    }

    function updpay($upd){
        $sql = "UPDATE `t_payment_l` SET `display_name`='".$upd['display_name']."',`status`='".$upd['status']."',`tanggal`='".$upd['tanggal']."',`arf_doc`='".$upd['arf_doc']."',`asf_doc`='".$upd['asf_doc']."',
        `prf_doc`='".$upd['prf_doc']."',`crf_doc`='".$upd['crf_doc']."',`nomor_surat`='".$upd['nomor_surat']."',`kode_proyek`='".$upd['kode_proyek']."',`division_id`='".$upd['division_id']."',
        `tanggal_selesai`='".$upd['tanggal_selesai']."',`label1`='".$upd['label1']."',`description`='".$upd['description']."',`currency`='".$upd['currency']."',`jumlah`='".$upd['jumlah']."',
        `terbilang`='".$upd['terbilang']."',`dibayar_kepada`='".$upd['dibayar_kepada']."',`verified_date`='".$upd['verified_date']."',`penanggung_jawab`='".$upd['penanggung_jawab']."',
        `jabatan`='".$upd['jabatan']."',`persetujuan_pembayaran1`='".$upd['persetujuan_pembayaran1']."',`persetujuan_pembayaran2`='".$upd['persetujuan_pembayaran2']."',
        `persetujuan_pembayaran3`='".$upd['persetujuan_pembayaran3']."',`jabatan1`='".$upd['jabatan1']."',`jabatan2`='".$upd['jabatan2']."',`jabatan3`='".$upd['jabatan3']."',`catatan`='".$upd['catatan']."' 
        WHERE `id_pay`='".$upd['id_pay']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    function deletepay($id){
        $sql = "DELETE FROM `t_payment_l` WHERE `t_payment_l`.`id_pay` = $id";

        $query = $this->db->query($sql);

        return $query;
    }
}