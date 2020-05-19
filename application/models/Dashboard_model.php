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

    public function updateprint($upd){
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

    function surat_tax(){
        $sql = "SELECT nomor_surat AS tax FROM t_payment WHERE status = 4";

        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
        return $query;
    }

    function nomorsurat(){
        $sql = "SELECT nomor_surat AS number1 FROM t_payment WHERE status = 5";

        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
        return $query;
    }

    public function updateprocess($upd){
        $sql = "UPDATE `t_payment` SET `status`='".$upd['status']."',`handled_by`='".$upd['handled_by']."' WHERE `id_payment`='".$upd['id_payment']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    function addtax($add){
        $sql = "INSERT INTO `t_pajak` (id_payment, nomor_surat, jenis_pajak, masa_pajak, tahun_pajak, tgl_pemotongan, ber_npwp, npwp, nama_vendor, nik, alamat, kode_pajak,
                penghasilan_bruto, tarif_pajak, pjk_terutang, fasilitas, nomor_skb, vendor, nilai_ppn ) 
                VALUES ('".$add['id_payment']."','".$add['nomor_surat']."','".$add['jenis_pajak']."','".$add['masa_pajak']."','".$add['tahun_pajak']."','".$add['tgl_pemotongan']."',
                '".$add['ber_npwp']."','".$add['npwp']."','".$add['nama_vendor']."','".$add['nik']."','".$add['alamat']."','".$add['kode_pajak']."','".$add['penghasilan_bruto']."',
                '".$add['tarif_pajak']."','".$add['pjk_terutang']."','".$add['fasilitas']."','".$add['nomor_skb']."','".$add['vendor']."','".$add['nilai_ppn']."')";

        $query = $this->db->query($sql);

        return $query;
    }

    public function updatetax($upd){
        $sql = "UPDATE `t_payment` SET `status`='".$upd['status']."',`handled_by`='".$upd['handled_by']."',`PPh_Pasal_21`='".$upd['PPh_Pasal_21']."',`PPh_Pasal_22`='".$upd['PPh_Pasal_22']."'
                ,`PPh_Pasal_23`='".$upd['PPh_Pasal_23']."',`PPh_Pasal_4`='".$upd['PPh_Pasal_4']."',`tarif1`='".$upd['tarif1']."'
                ,`tarif2`='".$upd['tarif2']."',`tarif3`='".$upd['tarif3']."',`tarif4`='".$upd['tarif4']."',`tarif5`='".$upd['tarif5']."',`dpp1`='".$upd['dpp1']."',`dpp2`='".$upd['dpp2']."'
                ,`dpp3`='".$upd['dpp3']."',`dpp4`='".$upd['dpp4']."',`dpp5`='".$upd['dpp5']."',`gross_up1`='".$upd['gross_up1']."',`gross_up2`='".$upd['gross_up2']."',`gross_up3`='".$upd['gross_up3']."'
                ,`gross_up4`='".$upd['gross_up4']."',`gross_up5`='".$upd['gross_up5']."',`pjt1`='".$upd['pjt1']."',`pjt2`='".$upd['pjt2']."',`pjt3`='".$upd['pjt3']."',`pjt4`='".$upd['pjt4']."',`pjt5`='".$upd['pjt5']."'
        
                WHERE `id_payment`='".$upd['id_payment']."'"; 
        
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

    var $table ="t_payment_l";
    public function buat_kode_arf()  {   

        $this->db->select('RIGHT(t_payment_l.arf_doc,4) as kode', FALSE);
        $this->db->order_by('arf_doc','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('t_payment_l');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
         //jika kode ternyata sudah ada.      
         $data = $query->row();      
         $kode = intval($data->kode) + 1;    
        }
        else {      
         //jika kode belum ada      
         $kode = 1;    
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "ARF - ".date('my - ').$kodemax;    // hasilnya 0001/$dvs/SPPP/bulantahun dst.
        return $kodejadi;  
    }

    public function buat_kode_asf()  {   

        $this->db->select('RIGHT(t_payment_l.asf_doc,4) as kode', FALSE);
        $this->db->order_by('asf_doc','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('t_payment_l');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
         //jika kode ternyata sudah ada.      
         $data = $query->row();      
         $kode = intval($data->kode) + 1;    
        }
        else {      
         //jika kode belum ada      
         $kode = 1;    
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "ASF - ".date('my - ').$kodemax;    // hasilnya 0001/$dvs/SPPP/bulantahun dst.
        return $kodejadi;  
    }

    public function buat_kode_prf()  {   

        $this->db->select('RIGHT(t_payment_l.prf_doc,4) as kode', FALSE);
        $this->db->order_by('prf_doc','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('t_payment_l');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
         //jika kode ternyata sudah ada.      
         $data = $query->row();      
         $kode = intval($data->kode) + 1;    
        }
        else {      
         //jika kode belum ada      
         $kode = 1;    
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "PRF - ".date('my - ').$kodemax;    // hasilnya 0001/$dvs/SPPP/bulantahun dst.
        return $kodejadi;  
    }

    public function buat_kode_crf()  {   

        $this->db->select('RIGHT(t_payment_l.crf_doc,4) as kode', FALSE);
        $this->db->order_by('crf_doc','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('t_payment_l');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
         //jika kode ternyata sudah ada.      
         $data = $query->row();      
         $kode = intval($data->kode) + 1;    
        }
        else {      
         //jika kode belum ada      
         $kode = 1;    
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "CRF - ".date('my - ').$kodemax;    // hasilnya 0001/$dvs/SPPP/bulantahun dst.
        return $kodejadi;  
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

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.type = b.id_pay ";
        // var_dump($sql);exit;

        $query = $this->db->query($sql)->result();
        return $query;

    }

    public function getform($id) {
        $sql = "SELECT * FROM `t_payment_l` WHERE id = '$id'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getProcessing(){
        $sql = "SELECT COUNT(status) as totalstatus FROM t_payment WHERE status in ('4','5','6','7')";
        
        $query = $this->db->query($sql)->result();
        return $query;
    
    }

    function getTax() {
        $sql = "SELECT COUNT(status) as tax FROM t_payment WHERE status= '4'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getVTax() {
        $sql = "SELECT a.*, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.status ='4' ";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getFinance(){
        $sql = "SELECT COUNT(status) as finance FROM t_payment WHERE status= '5'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getVFinance() {
        $sql = "SELECT a.*, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.status ='5' ";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitReview(){
        $sql = "SELECT COUNT(status) as wreview FROM t_payment WHERE status= '6'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getVReview() {
        $sql = "SELECT a.*, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.status ='6' ";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitVerifikasi(){
        $sql = "SELECT COUNT(status) as wverifikasi FROM t_payment WHERE status='7'";
        // var_dump ($sql);exit;
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getVWaitVerifikasi(){
        $sql = "SELECT a.*, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.status ='7' ";
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

    function getVWaitApproval(){
        $sql = "SELECT a.*, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.status ='8' ";
        // var_dump ($sql);exit;
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

    function getVWaitPaid(){
        $sql = "SELECT a.*, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.status ='9' ";
        // var_dump ($sql);exit;
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getPaid(){
        $sql = "SELECT COUNT(status) as paid FROM t_payment WHERE status='10'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getVPaid(){
        $sql = "SELECT a.*, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.status ='10' ";
        // var_dump ($sql);exit;
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getDivHeadCSF(){
        $sql = "SELECT a.display_name, b.role_id, c.* FROM m_user as a JOIN m_role as b ON b.role_id='4' JOIN m_division as c ON a.division_id=c.division_id
                WHERE a.division_id='CSF' AND a.role_id='4' AND c.division_name='Corporate Strategy and Finance (CSF)'";

        $query = $this->db->query($sql)->result();
        return $query;

    }

    function addpay($add){
        $sql = "INSERT INTO `t_payment_l` (display_name, type, status, tanggal, arf_doc, asf_doc, prf_doc, crf_doc, nomor_surat, kode_proyek, division_id,
                tanggal_selesai, label1, description, currency, currency1, jumlah, jumlah1, terbilang, dibayar_kepada, verified_date, penanggung_jawab, jabatan, 
                persetujuan_pembayaran1, persetujuan_pembayaran2, persetujuan_pembayaran3, jabatan1, jabatan2, jabatan3, catatan, total_expenses, cash_advance, 
                piutang, metode_pembayaran, bank, no_rek, handled_by ) 
        VALUES ('".$add['display_name']."','".$add['type']."','".$add['status']."','".$add['tanggal']."','".$add['arf_doc']."','".$add['asf_doc']."','".$add['prf_doc']."',
                '".$add['crf_doc']."','".$add['nomor_surat']."','".$add['kode_proyek']."','".$add['division_id']."','".$add['tanggal_selesai']."','".$add['label1']."',
                '".$add['description']."','".$add['currency']."','".$add['currency1']."','".$add['jumlah']."','".$add['jumlah1']."','".$add['terbilang']."','".$add['dibayar_kepada']."','".$add['verified_date']."',
                '".$add['penanggung_jawab']."','".$add['jabatan']."','".$add['persetujuan_pembayaran1']."','".$add['persetujuan_pembayaran2']."','".$add['persetujuan_pembayaran3']."',
                '".$add['jabatan1']."','".$add['jabatan2']."','".$add['jabatan3']."','".$add['catatan']."','".$add['total_expenses']."','".$add['cash_advance']."','".$add['piutang']."','".$add['metode_pembayaran']."'
                ,'".$add['bank']."','".$add['no_rek']."','".$add['handled_by']."')";
        
        $query = $this->db->query($sql);

        return $query;
    }
    
    function report_view($id_pajak){
        $sql = "SELECT * FROM `t_pajak` WHERE id_pajak= '$id_pajak' ";

        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
        return $query;
    }

    function report_pajak(){
        $sql = "SELECT * FROM `t_pajak`";

        $query = $this->db->query($sql)->result();

        return $query;
    }

    function updatepay($status,$nomor_surat){
        
        $sql = "UPDATE `t_payment` SET `status`='".$status."' WHERE `nomor_surat`='".$nomor_surat."'";
        
        $query = $this->db->query($sql);

        return $query;
    }

    function updpay($upd){
        $sql = "UPDATE `t_payment_l` SET `status`='".$upd['status']."',`handled_by`='".$upd['handled_by']."' WHERE `id`='".$upd['id']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    function deletepay($id){
        $sql = "DELETE FROM `t_payment_l` WHERE `t_payment_l`.`id` = $id";

        $query = $this->db->query($sql);

        return $query;
    }
}