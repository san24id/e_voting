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

        $sql ="SELECT * FROM t_payment WHERE status='4' AND rejected_by in ('h.harlina','i.akmal') ";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getReturnedApprov(){    
    
        $sql = "SELECT * FROM t_payment_l WHERE status='5' AND rejected_by IS NOT NULL ";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getReturnedUser(){
        $dvs = $this->session->userdata('division_id');
        // $usr = $this->session->userdata('id_user');

        $sql ="SELECT * FROM t_payment WHERE status='3' AND division_id='$dvs' AND rejected_by='h.harlina' ";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getCreditCard(){
        $sql ="SELECT SUM(jatah) as creditcard_pay FROM t_creditcard";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getTotal(){

        $sql = "SELECT COUNT(jenis_pembayaran) as totalreq FROM t_payment WHERE status in ('2','3','4','5','7','8','9','10')";
                
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

    // public function updatetax($add){
    //     $sql = "INSERT INTO `t_tax` (id_payment, status, nomor_surat, de, opsional, nilai, objek_pajak, jenis_pajak1, jenis_pajak2, jenis_pajak3, jenis_pajak4, jenis_pajak5, jenis_pajak6, jenis_pajak7,
    //             kode_pajak1, kode_pajak2, kode_pajak3, kode_pajak4, kode_pajak5, kode_pajak6, kode_pajak7, kode_map1, kode_map2, kode_map3, kode_map4, kode_map5, kode_map6, kode_map7, nama1, nama2, nama3, 
    //             nama4, nama5, nama6, nama7, npwp1, npwp2, npwp3, npwp4, npwp5, npwp6, npwp7, alamat1, alamat2, alamat3, alamat4, alamat5, alamat6, alamat7, tarif1, tarif2, tarif3, tarif4, tarif5, tarif6, tarif7, 
    //             fas_pajak1, fas_pajak2, fas_pajak3, fas_pajak4, fas_pajak5, fas_pajak6, fas_pajak7, special_tarif1, special_tarif2, special_tarif3, special_tarif4, special_tarif5, special_tarif6, special_tarif7,
    //             gross1, gross2, gross3, gross4, gross5, gross6, gross7, dpp1, dpp2, dpp3, dpp4, dpp5, dpp6, dpp7, dpp_gross1, dpp_gross2, dpp_gross3, dpp_gross4, dpp_gross5, dpp_gross6, dpp_gross7, pajak_terutang1,
    //             pajak_terutang2, pajak_terutang3, pajak_terutang4, pajak_terutang5, pajak_terutang6, pajak_terutang7, masa_pajak1, masa_pajak2, masa_pajak3, masa_pajak4, masa_pajak5, masa_pajak6, masa_pajak7, keterangan1,
    //             keterangan2, keterangan3, keterangan4, keterangan5, keterangan6, keterangan7, tahun1, tahun2, tahun3, tahun4, tahun5, tahun6, tahun7, handled_by)

    //             VALUES ('".$add['id_payment']."','".$add['status']."','".$add['nomor_surat']."','".$add['de']."','".$add['opsional']."','".$add['nilai']."','".$add['objek_pajak']."','".$add['jenis_pajak1']."','".$add['jenis_pajak2']."',
    //             '".$add['jenis_pajak3']."','".$add['jenis_pajak4']."','".$add['jenis_pajak5']."','".$add['jenis_pajak6']."','".$add['jenis_pajak7']."','".$add['kode_pajak1']."','".$add['kode_pajak2']."','".$add['kode_pajak3']."',
    //             '".$add['kode_pajak4']."','".$add['kode_pajak5']."','".$add['kode_pajak6']."','".$add['kode_pajak7']."','".$add['kode_map1']."','".$add['kode_map2']."','".$add['kode_map3']."','".$add['kode_map4']."','".$add['kode_map5']."',
    //             '".$add['kode_map6']."','".$add['kode_map7']."','".$add['nama1']."','".$add['nama2']."','".$add['nama3']."','".$add['nama4']."','".$add['nama5']."','".$add['nama6']."','".$add['nama7']."','".$add['npwp1']."','".$add['npwp2']."',
    //             '".$add['npwp3']."','".$add['npwp4']."','".$add['npwp5']."','".$add['npwp6']."','".$add['npwp7']."','".$add['alamat1']."','".$add['alamat2']."','".$add['alamat3']."','".$add['alamat4']."','".$add['alamat5']."','".$add['alamat6']."',
    //             '".$add['alamat7']."','".$add['tarif1']."','".$add['tarif2']."','".$add['tarif3']."','".$add['tarif4']."','".$add['tarif5']."','".$add['tarif6']."','".$add['tarif7']."','".$add['fas_pajak1']."','".$add['fas_pajak2']."','".$add['fas_pajak3']."',
    //             '".$add['fas_pajak4']."','".$add['fas_pajak5']."','".$add['fas_pajak6']."','".$add['fas_pajak7']."','".$add['special_tarif1']."','".$add['special_tarif2']."','".$add['special_tarif3']."','".$add['special_tarif4']."','".$add['special_tarif5']."',
    //             '".$add['special_tarif6']."','".$add['special_tarif7']."','".$add['gross1']."','".$add['gross2']."','".$add['gross3']."','".$add['gross4']."','".$add['gross5']."','".$add['gross6']."','".$add['gross7']."','".$add['dpp1']."','".$add['dpp2']."',
    //             '".$add['dpp3']."','".$add['dpp4']."','".$add['dpp5']."','".$add['dpp6']."','".$add['dpp7']."','".$add['dpp_gross1']."','".$add['dpp_gross2']."','".$add['dpp_gross3']."','".$add['dpp_gross4']."','".$add['dpp_gross5']."','".$add['dpp_gross6']."',
    //             '".$add['dpp_gross7']."','".$add['pajak_terutang1']."','".$add['pajak_terutang2']."','".$add['pajak_terutang3']."','".$add['pajak_terutang4']."','".$add['pajak_terutang5']."','".$add['pajak_terutang6']."','".$add['pajak_terutang7']."',
    //             '".$add['masa_pajak1']."','".$add['masa_pajak2']."','".$add['masa_pajak3']."','".$add['masa_pajak4']."','".$add['masa_pajak5']."','".$add['masa_pajak6']."','".$add['masa_pajak7']."','".$add['keterangan1']."','".$add['keterangan2']."',
    //             '".$add['keterangan3']."','".$add['keterangan4']."','".$add['keterangan5']."','".$add['keterangan6']."','".$add['keterangan7']."','".$add['tahun1']."','".$add['tahun2']."','".$add['tahun3']."','".$add['tahun4']."','".$add['tahun5']."',
    //             '".$add['tahun6']."','".$add['tahun7']."','".$add['handled_by']."')"; 
        
    //     $query = $this->db->query($sql);
    //     // var_dump($sql);exit;
    //     return $query;
    // }

    public function updatetax($add){
        $sql = "INSERT INTO `t_tax` (id_payment, status, nomor_surat, de, opsional, nilai, objek_pajak, jenis_pajak,kode_pajak, kode_map, nama, npwp, alamat, tarif, 
                fas_pajak, special_tarif,gross, dpp, dpp_gross, pajak_terutang, masa_pajak, keterangan, tahun, handled_by)

                VALUES ('".$add['id_payment']."','".$add['status']."','".$add['nomor_surat']."','".$add['de']."','".$add['opsional']."','".$add['nilai']."','".$add['objek_pajak']."','".$add['jenis_pajak']."','".$add['kode_pajak']."','".$add['kode_map']."','".$add['nama']."','".$add['npwp']."','".$add['alamat']."','".$add['tarif']."','".$add['fas_pajak']."','".$add['special_tarif']."','".$add['gross']."','".$add['dpp']."','".$add['dpp_gross']."','".$add['pajak_terutang']."',
                '".$add['masa_pajak']."','".$add['keterangan']."','".$add['tahun']."','".$add['handled_by']."')"; 
        
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

        $sql ="SELECT a.*, b.dsc FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status = '2' ";
        // var_dump($sql);exit;

        $query = $this->db->query($sql)->result();
        return $query;

    }

    function getmyTask1() {
        $usr= $this->session->userdata("username");

        // $sql ="SELECT a.*, b.dsc FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status in ('5','6','7')";

        $sql = "SELECT a.*, b.dsc FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE handled_by='$usr' AND status in ('4','5','6','7')";
        // var_dump($sql);exit;

        $query = $this->db->query($sql)->result();
        return $query;

    }

    function getmyTask2() {
        $usr= $this->session->userdata("username");

        // $sql ="SELECT a.*, b.dsc FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status in ('5','6','7')";

        $sql = "SELECT a.*, b.apf FROM t_payment_l as a JOIN t_pembayaran as b ON a.type = b.id_pay WHERE status = '8' ";
        // var_dump($sql);exit;

        $query = $this->db->query($sql)->result();
        return $query;

    }

    public function getform($id) {
        $sql = "SELECT * FROM `t_payment_l` WHERE id_payment = '$id'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getProcessTax($id_payment){
        $sql = "SELECT * FROM `t_tax` WHERE id_payment = '$id_payment'";

        $query = $this->db->query($sql)->result();
        // var_dump($sql);exit;
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

    function getDataVendor(){
        $sql = "SELECT * FROM m_honorarium_konsultan";
        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
        return $query;
    }

    function getTarif(){
        $sql = "SELECT tarif FROM t_tarif";
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

    function getUpcomingOverdue(){
        $dvs = $this->session->userdata('division_id');

        $sql ="SELECT label3 + INTERVAL '14' DAY as upcoming from `t_payment` WHERE division_id='$dvs' AND jenis_pembayaran LIKE '%2%' ";

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

    function periode($start_date,$end_date){
        $sql = "SELECT a.*, b.dsc FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE tanggal2 BETWEEN '$start_date' AND '$end_date'";

        $query = $this->db->query($sql)->result();
        // var_dump($sql);exit;
        return $query;
    }

    function periode2($start_date,$end_date){
        $sql = "SELECT a.*, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE tanggal2 BETWEEN '$start_date' AND '$end_date'";

        $query = $this->db->query($sql)->result();
        // var_dump($sql);exit;
        return $query;
    }

    function addpay($add){
        $sql = "INSERT INTO `t_payment_l` (id_payment, display_name, type, status, tanggal, pr_doc, apf_doc, apf1_doc, nomor_surat, kode_proyek, division_id, tanggal_selesai, 
                label1, label2, description, description2, description3, description4, description5, description6, description7, description8, description9, description10, description11,
                description12, currency, currency1, currency2, currency3, currency4, currency5, currency6, currency7, currency8, currency9, currency10, currency11, jumlah, jumlah1, 
                jumlah2, jumlah3, jumlah4, jumlah5, jumlah6, jumlah7, jumlah8, jumlah9, jumlah10, jumlah11, jumlah12, terbilang, terbilang2, terbilang3, dibayar_kepada, verified_date, penanggung_jawab,
                jabatan, persetujuan_pembayaran1, persetujuan_pembayaran2, persetujuan_pembayaran3, jabatan1, jabatan2, jabatan3, catatan, total_expenses, total_expenses2, total_expenses3, cash_advance, 
                cash_advance2, cash_advance3, piutang, piutang2, piutang3, metode_pembayaran, bank, no_rek, handled_by, rejected_by, rejected_date, note ) 

        VALUES ('".$add['id_payment']."','".$add['display_name']."','".$add['type']."','".$add['status']."','".$add['tanggal']."','".$add['pr_doc']."','".$add['apf_doc']."','".$add['apf1_doc']."',
                '".$add['nomor_surat']."','".$add['kode_proyek']."','".$add['division_id']."','".$add['tanggal_selesai']."','".$add['label1']."','".$add['label2']."','".$add['description']."','".$add['description2']."',
                '".$add['description3']."','".$add['description4']."','".$add['description5']."','".$add['description6']."','".$add['description7']."','".$add['description8']."','".$add['description9']."',
                '".$add['description10']."','".$add['description11']."','".$add['description12']."','".$add['currency']."','".$add['currency1']."','".$add['currency2']."','".$add['currency3']."','".$add['currency4']."',
                '".$add['currency5']."','".$add['currency6']."','".$add['currency7']."','".$add['currency8']."','".$add['currency9']."','".$add['currency10']."','".$add['currency11']."','".$add['jumlah']."',
                '".$add['jumlah1']."','".$add['jumlah2']."','".$add['jumlah3']."','".$add['jumlah4']."','".$add['jumlah5']."','".$add['jumlah6']."','".$add['jumlah7']."','".$add['jumlah8']."','".$add['jumlah9']."',
                '".$add['jumlah10']."','".$add['jumlah11']."','".$add['jumlah12']."','".$add['terbilang']."','".$add['terbilang2']."','".$add['terbilang3']."','".$add['dibayar_kepada']."','".$add['verified_date']."','".$add['penanggung_jawab']."',
                '".$add['jabatan']."','".$add['persetujuan_pembayaran1']."','".$add['persetujuan_pembayaran2']."','".$add['persetujuan_pembayaran3']."','".$add['jabatan1']."','".$add['jabatan2']."','".$add['jabatan3']."','".$add['catatan']."',
                '".$add['total_expenses']."','".$add['total_expenses2']."','".$add['total_expenses3']."','".$add['cash_advance']."','".$add['cash_advance2']."','".$add['cash_advance3']."','".$add['piutang']."','".$add['piutang2']."','".$add['piutang3']."',
                '".$add['metode_pembayaran']."','".$add['bank']."','".$add['no_rek']."','".$add['handled_by']."','".$add['rejected_by']."','".$add['rejected_date']."','".$add['note']."')";
        
        $query = $this->db->query($sql);
        // var_dump($sql);exit;
        return $query;
    }

    function edit_pay($upd){
        $sql = "UPDATE `t_payment_l` SET `display_name`='".$upd['display_name']."',`tanggal`='".$upd['tanggal']."',`pr_doc`='".$upd['pr_doc']."',`apf_doc`='".$upd['apf_doc']."',`apf1_doc`='".$upd['apf1_doc']."',
                `nomor_surat`='".$upd['nomor_surat']."',`kode_proyek`='".$upd['kode_proyek']."',`tanggal_selesai`='".$upd['tanggal_selesai']."',`division_id`='".$upd['division_id']."',`label1`='".$upd['label1']."',`label2`='".$upd['label2']."',`cash_advance`='".$upd['cash_advance']."',
                `piutang`='".$upd['piutang']."',`total_expenses`='".$upd['total_expenses']."',`total_expenses2`='".$upd['total_expenses2']."',`total_expenses3`='".$upd['total_expenses3']."',`description`='".$upd['description']."',`description2`='".$upd['description2']."',
                `description3`='".$upd['description3']."',`description4`='".$upd['description4']."',`description5`='".$upd['description5']."',`description6`='".$upd['description6']."',`description7`='".$upd['description7']."',`description8`='".$upd['description8']."',
                `description9`='".$upd['description9']."',`description10`='".$upd['description10']."',`description11`='".$upd['description11']."',`description12`='".$upd['description12']."',`currency`='".$upd['currency']."',`currency1`='".$upd['currency1']."',
                `currency2`='".$upd['currency2']."',`currency3`='".$upd['currency3']."',`currency4`='".$upd['currency4']."',`currency5`='".$upd['currency5']."',`currency6`='".$upd['currency6']."',`currency7`='".$upd['currency7']."',`currency8`='".$upd['currency8']."',
                `currency9`='".$upd['currency9']."',`currency10`='".$upd['currency10']."',`currency11`='".$upd['currency11']."',`jumlah`='".$upd['jumlah']."',`jumlah1`='".$upd['jumlah1']."',`jumlah2`='".$upd['jumlah2']."',`jumlah3`='".$upd['jumlah3']."',`jumlah4`='".$upd['jumlah4']."',
                `jumlah5`='".$upd['jumlah5']."',`jumlah6`='".$upd['jumlah6']."',`jumlah7`='".$upd['jumlah7']."',`jumlah8`='".$upd['jumlah8']."',`jumlah9`='".$upd['jumlah9']."',`jumlah10`='".$upd['jumlah10']."',`jumlah11`='".$upd['jumlah11']."',`jumlah12`='".$upd['jumlah12']."',
                `terbilang`='".$upd['terbilang']."',`terbilang2`='".$upd['terbilang2']."',`terbilang3`='".$upd['terbilang3']."',`dibayar_kepada`='".$upd['dibayar_kepada']."',`verified_date`='".$upd['verified_date']."',`catatan`='".$upd['catatan']."'
               
                WHERE `id`='".$upd['id']."'";

        $query = $this->db->query($sql);
        // var_dump($sql);exit;
        return $query;
    }
    
    function report_view($id_pajak){
        $sql = "SELECT * FROM `t_pajak` WHERE id_pajak= '$id_pajak' ";

        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
        return $query;
    }

    function getDivision(){
        $sql = "SELECT * FROM m_division";

        $query = $this->db->query($sql)->result();

        return $query; 
    }

    function credit_card(){
        $sql = "SELECT * FROM t_creditcard";

        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;

        return $query;
    }

    function addcc($add){
        $sql = "INSERT INTO `t_creditcard` (id_div, pemegang_kartu, division_id, nama_pic, target_submission, tempo, jatah)

                VALUES ('".$add['id_div']."','".$add['pemegang_kartu']."','".$add['division_id']."','".$add['nama_pic']."',
                '".$add['target_submission']."','".$add['tempo']."','".$add['jatah']."')"; 
        
        $query = $this->db->query($sql);
        // var_dump($sql);exit;
        return $query;
    }

    function updatecc($upd){
        $sql = "UPDATE `t_creditcard` SET `pemegang_kartu`='".$upd['pemegang_kartu']."',`division_id`='".$upd['division_id']."',`nama_pic`='".$upd['nama_pic']."',`target_submission`='".$upd['target_submission']."',
                `tempo`='".$upd['tempo']."',`jatah`='".$upd['jatah']."' 
        
                WHERE `id_div`='".$upd['id_div']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    function deletecc($id){
        $sql = "DELETE FROM `t_creditcard` WHERE `t_creditcard`.`id_div` = $id";

        $query = $this->db->query($sql);

        return $query;
    }

    function report_pajak_pph(){
        $sql = "SELECT * FROM `t_tax` WHERE jenis_pajak LIKE '%PPh%'";

        $query = $this->db->query($sql)->result();

        return $query;
    }
    
    function report_pajak_ppn(){
        $sql = "SELECT * FROM `t_tax` WHERE jenis_pajak LIKE '%PPN%'";

        $query = $this->db->query($sql)->result();

        return $query;
    }

    function notifTask(){
        $usr = $this->session->userdata('username');

        $sql = "SELECT COUNT(status) as totaltask FROM t_payment WHERE handled_by='$usr' AND status in ('2','4','5','6','7','8')";
        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
        return $query;

    }

    function updatepay($status,$nomor_surat,$handled_by,$rejected_by,$rejected_date,$note){
        
        $sql = "UPDATE `t_payment` SET `status`='".$status."',`handled_by`='".$handled_by."',`rejected_by`='".$rejected_by."',`rejected_date`='".$rejected_date."',
                `note`='".$note."'

                WHERE `nomor_surat`='".$nomor_surat."'";
        
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