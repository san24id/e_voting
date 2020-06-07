<?php
error_reporting(0);
class Dashboard_model extends CI_Model{

    public function payment() {
        $sql = "SELECT a.*, b.dsc FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function monitoring() {
        $sql = "SELECT a.*, b.dsc FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status in ('2','4','5','6','7','8','9','10')";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function processing(){
        $sql = "SELECT COUNT(status) as process FROM t_payment WHERE status=2";
        
        $query = $this->db->query($sql)->result();
        return $query;
    
    }

    public function getReturnedVerif(){
        $dvs = $this->session->userdata('division_id');
        // $usr = $this->session->userdata('id_user');

        $sql ="SELECT * FROM t_payment WHERE status='4' AND division_id='$dvs' AND rejected_by='h.harlina' ";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getReturnedApprov(){
        $usr = $this->session->userdata('username');
        $dvs = $this->session->userdata('division_id');
        $role = $this->session->userdata('id_role_app');

        if ($role == 4){

            $sql ="SELECT * FROM t_payment WHERE status='4' AND division_id='$dvs' AND rejected_by='$usr' ";

            $query = $this->db->query($sql)->result();
            return $query;

        }
    }

    public function getReturnedUser(){
        $dvs = $this->session->userdata('division_id');
        // $usr = $this->session->userdata('id_user');

        $sql ="SELECT * FROM t_payment WHERE status='3' AND division_id='$dvs' AND rejected_by='h.harlina' ";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getTotal(){

        $sql = "SELECT COUNT(jenis_pembayaran) as totalreq FROM t_payment";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function updateaccept($upd){
        $sql = "UPDATE `t_payment` SET `status`='".$upd['status']."',`handled_by`='".$upd['handled_by']."' WHERE `id_payment`='".$upd['id_payment']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    function activated($upd){
        $sql = "UPDATE m_status SET `activate`='".$upd['activate']."' WHERE `id_status`='".$upd['id_status']."' ";

        $query = $this->db->query($sql);

        return $query;
    }

    function approve($upd){

        $sql = "UPDATE t_payment SET `status`='".$upd['status']."' WHERE `id_payment`='".$upd['id_payment']."'";
        
        $query = $this->db->query($sql);

        return $query;
    }

    public function updateprint($upd){
        $sql = "UPDATE `t_payment` SET `status`='".$upd['status']."' WHERE `id_payment`='".$upd['id_payment']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    public function updaterejected($upd){
        $sql = "UPDATE `t_payment` SET `status`='".$upd['status']."',`note`='".$upd['note']."',`rejected_by`='".$upd['rejected_by']."',
                `rejected_date`='".$upd['rejected_date']."',`handled_by`='".$upd['handled_by']."'
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

    public function updatetax($add){
        $sql = "INSERT INTO `t_tax` (id_payment, status, nomor_surat, de, opsional, nilai, objek_pajak, jenis_pajak, kode_pajak, kode_map, nama, npwp, alamat, tarif, fas_pajak, 
                special_tarif, gross, dpp, dpp_gross, pajak_terutang, masa_pajak, keterangan, handled_by)
                VALUES ('".$add['id_payment']."','".$add['status']."','".$add['nomor_surat']."','".$add['de']."','".$add['opsional']."','".$add['nilai']."','".$add['objek_pajak']."','".$add['jenis_pajak']."',
                '".$add['kode_pajak']."','".$add['kode_map']."','".$add['nama']."','".$add['npwp']."','".$add['alamat']."','".$add['tarif']."','".$add['fas_pajak']."','".$add['special_tarif']."',
                '".$add['gross']."','".$add['dpp']."','".$add['dpp_gross']."','".$add['pajak_terutang']."','".$add['masa_pajak']."','".$add['keterangan']."','".$add['handled_by']."')"; 
        
        $query = $this->db->query($sql);
        // var_dump($sql);exit;
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

        $this->db->select('RIGHT(t_payment_l.apf_doc,4) as kode', FALSE);
        $this->db->order_by('apf_doc','DESC');    
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

        $this->db->select('RIGHT(t_payment_l.apf_doc,4) as kode', FALSE);
        $this->db->order_by('apf_doc','DESC');    
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

        $this->db->select('RIGHT(t_payment_l.apf_doc,4) as kode', FALSE);
        $this->db->order_by('apf_doc','DESC');    
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

        $this->db->select('RIGHT(t_payment_l.apf_doc,4) as kode', FALSE);
        $this->db->order_by('apf_doc','DESC');    
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

        // $sql ="SELECT a.*, b.dsc FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status in ('5','6','7')";

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.type = b.id_pay WHERE handled_by='$usr' ";
        // var_dump($sql);exit;

        $query = $this->db->query($sql)->result();
        return $query;

    }

    public function getform($id) {
        $sql = "SELECT * FROM `t_payment_l` WHERE id_payment = '$id'";
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

    function getJenisPajak(){
        $sql = "SELECT * FROM m_jenis_pajak";
        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
        return $query;
    }

    function getKodePajak(){
        $sql = "SELECT * FROM m_kode_bukpot";
        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
        return $query;
    }

    function getKodeMap(){
        $sql = "SELECT * FROM m_kode_map";
        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
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
        $sql = "INSERT INTO `t_payment_l` (id_payment, display_name, type, status, tanggal, pr_doc, apf_doc, apf1_doc, nomor_surat, kode_proyek, division_id, tanggal_selesai, 
                label1, description, description2, description3, description4, description5, description6, description7, description8, description9, description10, description11,
                description12, currency, currency1, currency2, currency3, currency4, currency5, currency6, currency7, currency8, currency9, currency10, currency11, jumlah, jumlah1, 
                jumlah2, jumlah3, jumlah4, jumlah5, jumlah6, jumlah7, jumlah8, jumlah9, jumlah10, jumlah11, jumlah12, terbilang, dibayar_kepada, verified_date, penanggung_jawab,
                jabatan, persetujuan_pembayaran1, persetujuan_pembayaran2, persetujuan_pembayaran3, jabatan1, jabatan2, jabatan3, catatan, total_expenses, cash_advance, piutang, 
                metode_pembayaran, bank, no_rek, handled_by ) 

        VALUES ('".$add['id_payment']."','".$add['display_name']."','".$add['type']."','".$add['status']."','".$add['tanggal']."','".$add['pr_doc']."','".$add['apf_doc']."','".$add['apf1_doc']."',
                '".$add['nomor_surat']."','".$add['kode_proyek']."','".$add['division_id']."','".$add['tanggal_selesai']."','".$add['label1']."','".$add['description']."','".$add['description2']."',
                '".$add['description3']."','".$add['description4']."','".$add['description5']."','".$add['description6']."','".$add['description7']."','".$add['description8']."','".$add['description9']."',
                '".$add['description10']."','".$add['description11']."','".$add['description12']."','".$add['currency']."','".$add['currency1']."','".$add['currency2']."','".$add['currency3']."','".$add['currency4']."',
                '".$add['currency5']."','".$add['currency6']."','".$add['currency7']."','".$add['currency8']."','".$add['currency9']."','".$add['currency10']."','".$add['currency11']."','".$add['jumlah']."',
                '".$add['jumlah1']."','".$add['jumlah2']."','".$add['jumlah3']."','".$add['jumlah4']."','".$add['jumlah5']."','".$add['jumlah6']."','".$add['jumlah7']."','".$add['jumlah8']."','".$add['jumlah9']."',
                '".$add['jumlah10']."','".$add['jumlah11']."','".$add['jumlah12']."','".$add['terbilang']."','".$add['dibayar_kepada']."','".$add['verified_date']."','".$add['penanggung_jawab']."',
                '".$add['jabatan']."','".$add['persetujuan_pembayaran1']."','".$add['persetujuan_pembayaran2']."','".$add['persetujuan_pembayaran3']."','".$add['jabatan1']."','".$add['jabatan2']."',
                '".$add['jabatan3']."','".$add['catatan']."','".$add['total_expenses']."','".$add['cash_advance']."','".$add['piutang']."','".$add['metode_pembayaran']."','".$add['bank']."','".$add['no_rek']."',
                '".$add['handled_by']."')";
        
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

    function updatepay($status,$nomor_surat,$handled_by){
        
        $sql = "UPDATE `t_payment` SET `status`='".$status."',`handled_by`='".$handled_by."' WHERE `nomor_surat`='".$nomor_surat."'";
        
        $query = $this->db->query($sql);

        return $query;
    }

    function rejectapf($status,$nomor_surat,$handled_by,$rejected_by,$rejected_date,$note){
        
        $sql = "UPDATE `t_payment` SET `status`='".$status."',`handled_by`='".$handled_by."',`rejected_by`='".$rejected_by."',`rejected_date`='".$rejected_date."',  
                `note`='".$note."' WHERE `nomor_surat`='".$nomor_surat."'";
        
        $query = $this->db->query($sql);

        return $query;
    }    

    function updpay($upd){
        $sql = "UPDATE `t_payment_l` SET `status`='".$upd['status']."',`handled_by`='".$upd['handled_by']."',`nomor_surat`='".$upd['nomor_surat']."',
                `rejected_by`='".$upd['rejected_by']."',`rejected_date`='".$upd['rejected_date']."',`note`='".$upd['note']."' WHERE `id`='".$upd['id']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    // function rejectedapf($upd){
    //     $sql = "UPDATE `t_payment_l` SET `status`='".$upd['status']."',`handled_by`='".$upd['handled_by']."',`nomor_surat`='".$upd['nomor_surat']."',
    //             `rejected_by`='".$upd['rejected_by']."',`rejected_date`='".$upd['rejected_date']."' WHERE `id`='".$upd['id']."'"; 
        
    //     $query = $this->db->query($sql);

    //     return $query;
    // }

    function deletepay($id){
        $sql = "DELETE FROM `t_payment_l` WHERE `t_payment_l`.`id` = $id";

        $query = $this->db->query($sql);

        return $query;
    }
    
}