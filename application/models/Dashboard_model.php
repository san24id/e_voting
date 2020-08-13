<?php
error_reporting(0);
class Dashboard_model extends CI_Model{

    public function payment() {
        $sql = "SELECT a.*, SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new ,b.dsc FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function monitoring() {
        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay 
                WHERE status in ('2','4','5','6','7','8','9','10') ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function processing(){
        $sql = "SELECT COUNT(status) as process FROM t_payment WHERE status=2";
        
        $query = $this->db->query($sql)->result();
        return $query;
    
    }

    public function processingPeriode($start_date,$end_date){
        $sql = "SELECT COUNT(status) as process FROM t_payment WHERE status=2 AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
        
        $query = $this->db->query($sql)->result();
        return $query;
    
    }

    public function getReturnedVerif(){
        $dvs = $this->session->userdata('division_id');
        // $usr = $this->session->userdata('id_user');

        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new FROM t_payment a WHERE a.status in ('4','5') AND a.rejected_by in ('h.harlina','i.akmal') 
                ORDER BY tanggal2 DESC";

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

        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new FROM t_payment a WHERE a.status='3' AND a.division_id='$dvs' AND a.rejected_by='h.harlina' 
                ORDER BY tanggal2 DESC ";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getCreditCard(){
        $sql ="SELECT SUM(jatah) as creditcard_pay FROM t_creditcard where status='Aktif'";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getTotal(){

        $sql = "SELECT COUNT(jenis_pembayaran) as totalreq FROM t_payment WHERE status in ('2','4','5','6','7','8','9','10')";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getTotalPeriode($start_date,$end_date){

        $sql = "SELECT COUNT(jenis_pembayaran) as totalreq FROM t_payment WHERE status in ('2','3','4','5','6','7','8','9','10')
                AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function updateaccept($upd){
        $sql = "UPDATE `t_payment` SET `status`='".$upd['status']."',`handled_by`='".$upd['handled_by']."',`submit_date`='".$upd['submit_date']."' 
                WHERE `id_payment`='".$upd['id_payment']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    function activated($upd){
        $sql = "UPDATE m_status SET `activate`='".$upd['activate']."' WHERE `id_status`='".$upd['id_status']."' ";

        $query = $this->db->query($sql);

        return $query;
    }

    function approve($upd){

        $sql = "UPDATE t_payment SET `status`='".$upd['status']."',`handled_by`='".$upd['handled_by']."',`submit_date`='".$upd['submit_date']."'
                WHERE `id_payment`='".$upd['id_payment']."'";
        
        $query = $this->db->query($sql);

        return $query;
    }

    public function updateprint($upd){
        $sql = "UPDATE `t_payment` SET `status`='".$upd['status']."',`nomor_surat`='".$upd['nomor_surat']."' WHERE `id_payment`='".$upd['id_payment']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    public function updateprintsendback($upd){
        $sql = "UPDATE `t_payment` SET `status`='".$upd['status']."',`rejected_by`='".$upd['rejected_by']."' WHERE `id_payment`='".$upd['id_payment']."'"; 
        
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
        $sql = "SELECT a.tanggal2, b.jenis_pembayaran, COUNT(a.jenis_pembayaran) as jmlpembayaran FROM t_payment a RIGHT JOIN t_pembayaran b ON a.jenis_pembayaran = b.id_pay 
                WHERE b.jenis_pembayaran != '' AND a.jenis_pembayaran != 0 AND a.status in ('2','4','5','6','7','8','9','10') GROUP BY b.jenis_pembayaran";

        // $sql = "SELECT * FROM (SELECT a.status, b.dsc, COUNT(a.jenis_pembayaran) AS jmlpembayaran FROM t_payment a RIGHT JOIN t_pembayaran b ON a.jenis_pembayaran = b.id_pay 
        //         GROUP by b.jenis_pembayaran ORDER by b.id_pay) otr WHERE otr.jmlpembayaran != 0 AND otr.dsc IS NOT NULL AND otr.status in ('2','4','5','6','7','8','9','10')";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getVPaymentPeriode($start_date,$end_date) {
        // $sql = "SELECT * FROM (SELECT b.dsc, a.divisi, COUNT(a.jenis_pembayaran) AS jmlpembayaran FROM t_payment a RIGHT JOIN t_pembayaran b ON a.jenis_pembayaran = b.id_pay 
        //         GROUP by b.jenis_pembayaran ORDER by b.id_pay) otr WHERE otr.dsc != '' AND otr.divisi = '$test' AND otr.jmlpembayaran != 0 AND otr.dsc IS NOT NULL";

        $sql = "SELECT a.tanggal2, b.jenis_pembayaran, COUNT(a.jenis_pembayaran) as jmlpembayaran FROM t_payment a RIGHT JOIN t_pembayaran b ON a.jenis_pembayaran = b.id_pay 
                WHERE b.jenis_pembayaran != '' AND a.jenis_pembayaran != 0 AND a.status in ('2','4','5','6','7','8','9','10')
                AND a.tanggal2 BETWEEN '$start_date' AND '$end_date' GROUP BY b.jenis_pembayaran";
       
        $query = $this->db->query($sql)->result();
                // var_dump($query);exit;
        
        return $query;
    }

    var $table ="t_payment_l";
    public function buat_kode_arf()  {   

        $this->db->select('RIGHT(t_payment_l.apf_doc,3) as kode', FALSE);
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

        $this->db->select('RIGHT(t_payment_l.apf_doc,3) as kode', FALSE);
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

        $this->db->select('RIGHT(t_payment_l.apf_doc,3) as kode', FALSE);
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

        $this->db->select('RIGHT(t_payment_l.apf_doc,3) as kode', FALSE);
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

    function getApprovalDivHead(){
        $dvs = $this->session->userdata("division_id");
        
        $sql ="SELECT a.*, SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new,b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status = 1 AND division_id= '$dvs'";

        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;

        return $query;
    }


    function getmyTask() {
        $usr= $this->session->userdata("username");

        $sql ="SELECT a.*, SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new,b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status = '2' ";
        // var_dump($sql);exit;

        $query = $this->db->query($sql)->result();
        return $query;

    }

    function getmyTask1() {
        $usr= $this->session->userdata("username");

        // $sql ="SELECT a.*, b.dsc FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status in ('5','6','7')";

        $sql = "SELECT a.*, SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new,b.dsc FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE handled_by='$usr' AND status in ('4','5','6','7')";
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

    function getProcessTaxPPh($id){
        $sql = "SELECT * FROM `t_tax` WHERE id_payment = '$id' AND jenis_pajak LIKE '%PPh%'";

        $query = $this->db->query($sql)->result();
        // var_dump($sql);exit;
        return $query;

    }

    function getProcessTaxPPN($id){
        $sql = "SELECT * FROM `t_tax` WHERE id_payment = '$id' AND jenis_pajak LIKE '%PPN%'";

        $query = $this->db->query($sql)->result();
        // var_dump($sql);exit;
        return $query;

    }

    function getProcessTax($id){
        $sql = "SELECT * FROM `t_tax` WHERE id_payment = '$id'";

        $query = $this->db->query($sql)->result();
        // var_dump($sql);exit;
        return $query;

    }

    function getProcessTax2($id_payment){
        $sql = "SELECT * FROM `t_tax` WHERE id_payment = '$id_payment'  order by no_urut asc";

        $query = $this->db->query($sql)->result();
        // var_dump($sql);exit;
        return $query;

    }
	
	function getProcessTaxHeader($id_payment){
        //$sql = "SELECT DISTINCT de,opsional,objek_pajak,nilai FROM `t_tax` WHERE id_payment = '$id_payment'";
		$sql = "select de,opsional,objek_pajak,nilai FROM `t_tax_header` where id_payment = '$id_payment'";
        $query = $this->db->query($sql)->result();
        // var_dump($sql);exit;
        return $query;

    }

    public function getProcessing(){
        $sql = "SELECT COUNT(status) as totalstatus FROM t_payment WHERE status in ('4','5','6','7')";
        
        $query = $this->db->query($sql)->result();
        return $query;
    
    }

    public function getProcessingPeriode($start_date,$end_date){
        $sql = "SELECT COUNT(status) as totalstatus FROM t_payment WHERE status in ('4','5','6','7') 
                AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
        
        $query = $this->db->query($sql)->result();
        return $query;
    
    }

    function getTax() {
        $sql = "SELECT COUNT(status) as tax FROM t_payment WHERE status= '4'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getTaxPeriode($start_date,$end_date) {
        $sql = "SELECT COUNT(status) as tax FROM t_payment WHERE status= '4' AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
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

	function getkodeMapbytax($id){
        $sql = "SELECT t.id_map,t.kode_map,t.keterangan,m.id_jenis_pjk FROM m_kode_map t , m_jenis_pajak m WHERE t.jenis_pajak=m.jenis_pajak AND m.id_jenis_pjk='" .$id."'";
		$query=$this->db->query($sql);		
		return $query->result();
    }						   

    function getDataVendor(){
        $sql = "SELECT * FROM m_honorarium_konsultan ORDER BY kode_vendor ASC";
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

	function getTarifByTax($id){
        $sql = "SELECT t.id_tarif,t.tarif,t.jenis_pajak,m.id_jenis_pjk FROM t_tarif t , m_jenis_pajak m WHERE t.jenis_pajak=m.jenis_pajak AND m.id_jenis_pjk='" .$id."'";
		$query=$this->db->query($sql);		
		return $query->result();
    }						 

    function getVTax() {
        $sql = "SELECT a.*, SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new,b.jenis_pembayaran FROM t_payment as a 
                JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.status ='4' ORDER BY tanggal2 DESC ";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getFinance(){
        $sql = "SELECT COUNT(status) as finance FROM t_payment WHERE status= '5'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getFinancePeriode($start_date,$end_date){
        $sql = "SELECT COUNT(status) as finance FROM t_payment WHERE status= '5' AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getVFinance() {
        $sql = "SELECT a.*, SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new,b.jenis_pembayaran FROM t_payment as a 
                JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.status ='5' ORDER BY tanggal2 DESC";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitReview(){
        $sql = "SELECT COUNT(status) as wreview FROM t_payment WHERE status= '6'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitReviewPeriode($start_date,$end_date){
        $sql = "SELECT COUNT(status) as wreview FROM t_payment WHERE status= '6' AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getVReview() {
        $sql = "SELECT a.*, SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new,b.jenis_pembayaran FROM t_payment as a 
                JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.status ='6' ORDER BY tanggal2 DESC";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitVerifikasi(){
        $sql = "SELECT COUNT(status) as wverifikasi FROM t_payment WHERE status='7'";
        // var_dump ($sql);exit;
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitVerifikasiPeriode($start_date,$end_date){
        $sql = "SELECT COUNT(status) as wverifikasi FROM t_payment WHERE status='7' AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
        // var_dump ($sql);exit;
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getVWaitVerifikasi(){
        $sql = "SELECT a.*, SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new,b.jenis_pembayaran FROM t_payment as a 
                JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.status ='7' ORDER BY tanggal2 DESC";
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

    function getVerifikasiPeriode($start_date,$end_date){
        $sql = "SELECT COUNT(status) as verifikasi FROM t_payment WHERE status='8' AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
        // var_dump ($sql);exit;
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitApproval(){
        $sql = "SELECT COUNT(status) as wapproval FROM t_payment WHERE status='8'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitApprovalPeriode($start_date,$end_date){
        $sql = "SELECT COUNT(status) as wapproval FROM t_payment WHERE status='8' AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getVWaitApproval(){
        $sql = "SELECT a.*, SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new,b.jenis_pembayaran FROM t_payment as a 
                JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.status ='8' ORDER BY tanggal2 DESC";
        // var_dump ($sql);exit;
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getApproval(){
        $sql = "SELECT COUNT(status) as approval FROM t_payment WHERE status='9'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getApprovalPeriode($start_date,$end_date){
        $sql = "SELECT COUNT(status) as approval FROM t_payment WHERE status='9' AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitPaid(){
        $sql = "SELECT COUNT(status) as wpaid FROM t_payment WHERE status='9'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getWaitPaidPeriode($start_date,$end_date){
        $sql = "SELECT COUNT(status) as wpaid FROM t_payment WHERE status='9' AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getVWaitPaid(){
        $sql = "SELECT a.*, SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new,b.jenis_pembayaran FROM t_payment as a 
                JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.status ='9' ORDER BY tanggal2 DESC";
        // var_dump ($sql);exit;
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getUpcomingOverdue(){
        $dvs = $this->session->userdata('division_id');
        $start_date = date('Y-01-01');
        $end_date = date('Y-m-d');

        $sql = "SELECT label3 + INTERVAL '14' DAY as upcoming from `t_payment` WHERE division_id='$dvs' AND jenis_pembayaran LIKE '%2%' 
                AND tanggal2 BETWEEN '$start_date' AND '$end_date'";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getUpcomingOverduePeriode($start_date,$end_date){
        $dvs = $this->session->userdata('division_id');

        $sql = "SELECT label3 + INTERVAL '14' DAY as upcoming from `t_payment` WHERE division_id='$dvs' AND jenis_pembayaran LIKE '%2%' 
                AND tanggal2 BETWEEN '$start_date' AND '$end_date'";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getPaid(){
        $sql = "SELECT COUNT(status) as paid FROM t_payment WHERE status='10'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getPaidPeriode($start_date,$end_date){
        $sql = "SELECT COUNT(status) as paid FROM t_payment WHERE status='10' AND tanggal2 BETWEEN '$start_date' AND '$end_date'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getVPaid(){
        $sql = "SELECT a.*, SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new,b.jenis_pembayaran FROM t_payment as a 
                JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.status ='10' ORDER BY tanggal2 DESC";
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

    function periode_tax($start_date,$end_date){
        $sql = "SELECT * FROM t_tax WHERE masa_pajak BETWEEN '$start_date' AND '$end_date'";

        $query = $this->db->query($sql)->result();
        // var_dump($sql);exit;
        return $query;
    }


    function periode($start_date,$end_date){
       
        $sql = "SELECT a.*, SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new,b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay 
                WHERE status in ('2','4','5','6','7','8','9','10') AND tanggal2 BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal2 DESC";

        $query = $this->db->query($sql)->result();
        // var_dump($sql);exit;
        return $query;
    }

    function periode2($start_date,$end_date){
        $dvs = $this->session->userdata('division_id');
        
        $sql = "SELECT a.*, SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new,b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE 
                status in ('0','1','11','2','4','5','6','7','8','9','10') AND division_id='$dvs' AND tanggal2 BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal2 DESC";

        $query = $this->db->query($sql)->result();
        // var_dump($sql);exit;
        return $query;
    }

    function addpay($add){
        $sql = "INSERT INTO `t_payment_l` (id_payment, display_name, type, status, tanggal, tanggal2, pr_doc, apf_doc, apf1_doc, nomor_surat, kode_proyek, division_id, tanggal_selesai, 
                label1, label2, description, description2, description3, description4, description5, description6, description7, description8, description9, description10, description11,
                description12, currency, currency1, currency2, currency3, currency4, currency5, currency6, currency7, currency8, currency9, currency10, currency11, jumlah, jumlah1, 
                jumlah2, jumlah3, jumlah4, jumlah5, jumlah6, jumlah7, jumlah8, jumlah9, jumlah10, jumlah11, jumlah12, terbilang, terbilang2, terbilang3, dibayar_kepada, verified_date, penanggung_jawab,
                jabatan, persetujuan_pembayaran1, persetujuan_pembayaran2, persetujuan_pembayaran3, jabatan1, jabatan2, jabatan3, catatan, total_expenses, total_expenses2, total_expenses3, cash_advance, 
                cash_advance2, cash_advance3, piutang, piutang2, piutang3, metode_pembayaran, bank, no_rek, handled_by, rejected_by, rejected_date, note ) 

        VALUES ('".$add['id_payment']."','".$add['display_name']."','".$add['type']."','".$add['status']."','".$add['tanggal']."','".$add['tanggal2']."','".$add['pr_doc']."','".$add['apf_doc']."','".$add['apf1_doc']."',
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
        $sql = "UPDATE `t_payment_l` SET `status`='".$upd['status']."',`display_name`='".$upd['display_name']."',`tanggal`='".$upd['tanggal']."',`tanggal2`='".$upd['tanggal2']."',`pr_doc`='".$upd['pr_doc']."',`apf_doc`='".$upd['apf_doc']."',`apf1_doc`='".$upd['apf1_doc']."',
                `nomor_surat`='".$upd['nomor_surat']."',`kode_proyek`='".$upd['kode_proyek']."',`tanggal_selesai`='".$upd['tanggal_selesai']."',`division_id`='".$upd['division_id']."',`label1`='".$upd['label1']."',`label2`='".$upd['label2']."',`cash_advance`='".$upd['cash_advance']."',
                `piutang`='".$upd['piutang']."',`total_expenses`='".$upd['total_expenses']."',`total_expenses2`='".$upd['total_expenses2']."',`total_expenses3`='".$upd['total_expenses3']."',`description`='".$upd['description']."',`description2`='".$upd['description2']."',
                `description3`='".$upd['description3']."',`description4`='".$upd['description4']."',`description5`='".$upd['description5']."',`description6`='".$upd['description6']."',`description7`='".$upd['description7']."',`description8`='".$upd['description8']."',
                `description9`='".$upd['description9']."',`description10`='".$upd['description10']."',`description11`='".$upd['description11']."',`description12`='".$upd['description12']."',`currency`='".$upd['currency']."',`currency1`='".$upd['currency1']."',`currency2`='".$upd['currency2']."',
                `currency3`='".$upd['currency3']."',`currency4`='".$upd['currency4']."',`currency5`='".$upd['currency5']."',`currency6`='".$upd['currency6']."',`currency7`='".$upd['currency7']."',`currency8`='".$upd['currency8']."',`currency9`='".$upd['currency9']."',`currency10`='".$upd['currency10']."',
                `currency11`='".$upd['currency11']."',`jumlah`='".$upd['jumlah']."',`jumlah1`='".$upd['jumlah1']."',`jumlah2`='".$upd['jumlah2']."',`jumlah3`='".$upd['jumlah3']."',`jumlah4`='".$upd['jumlah4']."',`jumlah5`='".$upd['jumlah5']."',`jumlah6`='".$upd['jumlah6']."',
                `jumlah7`='".$upd['jumlah7']."',`jumlah8`='".$upd['jumlah8']."',`jumlah9`='".$upd['jumlah9']."',`jumlah10`='".$upd['jumlah10']."',`jumlah11`='".$upd['jumlah11']."',`jumlah12`='".$upd['jumlah12']."',`terbilang`='".$upd['terbilang']."',`terbilang2`='".$upd['terbilang2']."',
                `terbilang3`='".$upd['terbilang3']."',`dibayar_kepada`='".$upd['dibayar_kepada']."',`verified_date`='".$upd['verified_date']."',`catatan`='".$upd['catatan']."',`handled_by`='".$upd['handled_by']."',`rejected_by`='".$upd['rejected_by']."'
               
                WHERE `id`='".$upd['id']."'";

        $query = $this->db->query($sql);
        // var_dump($sql);exit;
        return $query;
    }

    function change_stat($upd,$status,$handled_by){
        
        $sql = "UPDATE `t_payment` SET `status`='".$status."',`handled_by`='".$handled_by."'
                WHERE `nomor_surat`='".$upd['nomor_surat']."'";
        
        $query = $this->db->query($sql);
        // var_dump($sql);exit;
        return $query;
    }     
	
	function getPajak(){
        $sql = "SELECT * FROM m_jenis_pajak";

        $query = $this->db->query($sql)->result();

        return $query;
    }

    function addpajak($add){
        $sql = "INSERT INTO `m_jenis_pajak` (id_jenis_pjk, jenis_pajak)

                VALUES ('".$add['id_jenis_pjk']."','".$add['jenis_pajak']."')"; 
        
        $query = $this->db->query($sql);
        // var_dump($sql);exit;
        return $query;
    }

    function updatepajak($upd){
        $sql = "UPDATE `m_jenis_pajak` SET `jenis_pajak`='".$upd['jenis_pajak']."'
        
                WHERE `id_jenis_pjk`='".$upd['id_jenis_pjk']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    function deletepajak($id){
        $sql = "DELETE FROM `m_jenis_pajak` WHERE `m_jenis_pajak`.`id_jenis_pjk` = $id";

        $query = $this->db->query($sql);
        return $query;
    }

    function getkode_bukpot(){
        $sql = "SELECT * FROM m_kode_bukpot";

        $query = $this->db->query($sql)->result();

        return $query;
    }

    function addbukpot($add){
        $sql = "INSERT INTO `m_kode_bukpot` (id_bukpot, nama_objek_pajak, kode_objek_pajak)

                VALUES ('".$add['id_bukpot']."','".$add['nama_objek_pajak']."','".$add['kode_objek_pajak']."')"; 
        
        $query = $this->db->query($sql);
        // var_dump($sql);exit;
        return $query;
    }

    function updatebukpot($upd){
        $sql = "UPDATE `m_kode_bukpot` SET `nama_objek_pajak`='".$upd['nama_objek_pajak']."',`kode_objek_pajak`='".$upd['kode_objek_pajak']."'
        
                WHERE `id_bukpot`='".$upd['id_bukpot']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    function deletebukpot($id){
        $sql = "DELETE FROM `m_kode_bukpot` WHERE `m_kode_bukpot`.`id_bukpot` = $id";

        $query = $this->db->query($sql);
        // var_dump($sql);exit;
        return $query;
    }

    function getkode_map(){
        $sql = "SELECT * FROM m_kode_map";

        $query = $this->db->query($sql)->result();

        return $query;
    }

    function addkodemap($add){
        $sql = "INSERT INTO `m_kode_map` (id_map, keterangan, jenis_pajak, kode_map)

                VALUES ('".$add['id_map']."','".$add['keterangan']."','".$add['jenis_pajak']."','".$add['kode_map']."')"; 
        
        $query = $this->db->query($sql);
        // var_dump($sql);exit;
        return $query;
    }

    function updatekodemap($upd){
        $sql = "UPDATE `m_kode_map` SET `keterangan`='".$upd['keterangan']."',`jenis_pajak`='".$upd['jenis_pajak']."',`kode_map`='".$upd['kode_map']."'
        
                WHERE `id_map`='".$upd['id_map']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    function deletekodemap($id){
        $sql = "DELETE FROM `m_kode_map` WHERE `m_kode_map`.`id_map` = $id";

        $query = $this->db->query($sql);
        // var_dump($sql);exit;
        return $query;
    }

    function getVendor(){
        $sql = "SELECT * FROM `m_honorarium_konsultan` ORDER BY kode_vendor ASC";

        $query = $this->db->query($sql)->result();

        return $query;
    }

    function addvendor($add){
        $sql = "INSERT INTO `m_honorarium_konsultan` (id_honor, kode_vendor, nama, npwp, alamat ) 

                VALUES ('".$add['id_honor']."','".$add['kode_vendor']."','".$add['nama']."','".$add['npwp']."','".$add['alamat']."')";
        
        $query = $this->db->query($sql);
        // var_dump($sql);exit;
        return $query;
    }

    function updatevendor($upd){
        $sql = "UPDATE `m_honorarium_konsultan` SET `kode_vendor`='".$upd['kode_vendor']."',`nama`='".$upd['nama']."',`npwp`='".$upd['npwp']."',`alamat`='".$upd['alamat']."'
               
                WHERE `id_honor`='".$upd['id_honor']."'";

        $query = $this->db->query($sql);
        // var_dump($sql);exit;
        return $query;
    }

    function deletevendor($id){
        $sql = "DELETE FROM `m_honorarium_konsultan` WHERE `m_honorarium_konsultan`.`id_honor` = $id";

        $query = $this->db->query($sql);
        return $query;
    }

    function getDivision(){
        $sql = "SELECT * FROM m_division";

        $query = $this->db->query($sql)->result();

        return $query; 
    }

    function getPIC(){
        $sql = "SELECT * FROM m_user WHERE role_id = 5";

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
        $sql = "INSERT INTO `t_creditcard` (id_div, pemegang_kartu ,no_billing, division_id, id_user, nama_pic, target_submission, tempo, jatah)

                VALUES ('".$add['id_div']."','".$add['pemegang_kartu']."','".$add['no_billing']."','".$add['division_id']."','".$add['id_user']."','".$add['nama_pic']."',
                '".$add['target_submission']."','".$add['tempo']."','".$add['jatah']."','".$add['status']."')"; 
        
        $query = $this->db->query($sql);
        // var_dump($sql);exit;
        return $query;
    }

    function updatecc($upd){
        $sql = "UPDATE `t_creditcard` SET `pemegang_kartu`='".$upd['pemegang_kartu']."',`no_billing`='".$upd['no_billing']."',`division_id`='".$upd['division_id']."',`id_user`='".$upd['id_user']."',
                `nama_pic`='".$upd['nama_pic']."',`target_submission`='".$upd['target_submission']."',`tempo`='".$upd['tempo']."',`jatah`='".$upd['jatah']."' ,`status`='".$upd['status']."'
        
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
        $sql = "SELECT * FROM `t_tax` WHERE jenis_pajak LIKE '%PPh%' GROUP BY nomor_surat";

        $query = $this->db->query($sql)->result();

        return $query;
    }
    
    function report_pajak_ppn(){
        $sql = "SELECT * FROM `t_tax` WHERE jenis_pajak LIKE '%PPN%' GROUP BY nomor_surat";

        $query = $this->db->query($sql)->result();

        return $query;
    }

    function report_view_pph($id_tax){
        $sql = "SELECT * FROM `t_tax` WHERE id_tax= '$id_tax' AND jenis_pajak LIKE '%PPh%' ";

        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
        return $query;
    }

    function report_view_ppn($id_tax){
        $sql = "SELECT * FROM `t_tax` WHERE id_tax= '$id_tax' AND jenis_pajak LIKE '%PPN%' ";

        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
        return $query;
    }

    function notifTask(){
        $usr = $this->session->userdata('username');

        $sql = "SELECT COUNT(status) as totaltask FROM t_payment WHERE handled_by='$usr' AND status in ('2','4','5','6','7','8')";
        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
        return $query;

    }

    function notifApproval(){
        $dvs = $this->session->userdata('division_id');

        $sql = "SELECT COUNT(status) as taskapproval FROM t_payment WHERE status = 1 AND division_id='$dvs'";

        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
        return $query;
    }

    function getPejabat(){
        $sql = "SELECT * FROM t_approval";

        $query = $this->db->query($sql)->result();
        // var_dump($query);exit;
        return $query;

    }

    function updatewewenang($upd){
        $sql = "UPDATE `t_approval` SET `nama_user`='".$upd['nama_user']."',`jabatan`='".$upd['jabatan']."',`activate`='".$upd['activate']."'
        
                WHERE `idapproval`='".$upd['idapproval']."'"; 
        
        $query = $this->db->query($sql);

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

    function send_back($upd,$status,$handled_by,$rejected_by){
        
        $sql = "UPDATE `t_payment` SET `status`='".$status."',`handled_by`='".$handled_by."',`rejected_by`='".$rejected_by."'
                WHERE `nomor_surat`='".$upd['nomor_surat']."'";
        
        $query = $this->db->query($sql);
        // var_dump($sql);exit;
        return $query;
    }

    function updpay($upd){
        $sql = "UPDATE `t_payment_l` SET `status`='".$upd['status']."',`handled_by`='".$upd['handled_by']."',`nomor_surat`='".$upd['nomor_surat']."',
                `rejected_by`='".$upd['rejected_by']."',`rejected_date`='".$upd['rejected_date']."',`note`='".$upd['note']."' WHERE `id`='".$upd['id']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    function rejectedapf($upd){
        $sql = "UPDATE `t_payment_l` SET `status`='".$upd['status']."',`handled_by`='".$upd['handled_by']."',`nomor_surat`='".$upd['nomor_surat']."',
                `rejected_by`='".$upd['rejected_by']."',`rejected_date`='".$upd['rejected_date']."' WHERE `id`='".$upd['id']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    function deletepay($id){
        $sql = "DELETE FROM `t_payment_l` WHERE `t_payment_l`.`id` = $id";

        $query = $this->db->query($sql);

        return $query;
    }
    
	public function drafttax_add($data)
	{
		$this->db->insert('t_tax', $data);
		return $this->db->insert_id();
	}
	
	public function draftnontax_add($data)
	{
		$this->db->insert('t_nontax', $data);
		return $this->db->insert_id();
	}
	
	public function updatepaytax($where, $data)
	{
		$this->db->update('t_payment', $data, $where);
		return $this->db->affected_rows();
	}
	
	public function updatestatustax($where, $data)
	{
		$this->db->update('t_tax', $data, $where);
		return $this->db->affected_rows();
	}
    
	public function getDataNPWP($id) {
        $sql = "SELECT m.nama,m.npwp,m.alamat FROM t_payment p, m_honorarium_konsultan m WHERE m.kode_vendor=p.vendor and p.id_payment = '$id'";
        $query = $this->db->query($sql)->result();
        return $query;
    }
	
	public function getDataTax($id) {
        $sql = "select id_tax,id_payment,ifnull(no_urut,1) no_urut, jenis_pajak,kode_pajak,kode_map,nama,npwp,alamat,tarif,special_tarif,fas_pajak,gross,dpp,dpp_gross,pajak_terutang,masa_pajak,tahun,keterangan FROM t_tax where id_payment = '$id' order by no_urut";
		$query = $this->db->query($sql)->result();
        return $query;
    }								
    
	public function getDataNonTax($id) {
        $sql = "select id_nontax,id_payment,item_desc,replace(nominal,'.','') nominal FROM t_nontax where id_payment = '$id' order by id_nontax asc ";
		$query = $this->db->query($sql)->result();
        return $query;
    }
	
	public function getdatabysearch($profileid,$txtsearch)
	{
		$filter = $this->session->userdata("filter");
		$dvs = $this->session->userdata('division_id');
        $sql = "SELECT a.*, SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new,b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE division_id='$dvs' ";
		
		switch ($filter) {
			  case "1":
				$sql .=" ";
				break;
			  case "2":
				$sql .=" and a.status in ('4','5','6','7','8','9') ";
				break;
			  case "3":
				$sql .=" and a.status ='0' ";
				break;
			  case "4":
				$sql .=" and a.jenis_pembayaran in ('2','3') and (label3 + INTERVAL '14' DAY) >= curdate()  ";
				break;
			  case "5":
				$sql .=" and a.jenis_pembayaran in ('2','3') and (label3 + INTERVAL '14' DAY) < curdate() ";
				break;
			  /*case "6":
				$sql .=" and a.jenis_pembayaran LIKE '%2%' and (label3 + INTERVAL '14' DAY) < curdate() ";
				break;*/
			  case "7":
				$sql .=" and a.status ='0' ";
				break;
			  case "8":
				$sql .=" and a.status ='1' ";
				break;
			  case "9":
				$sql .=" and a.status ='2' ";
				break;
			  case "10":
				$sql .=" and a.status in ('4','5','6','7') ";
				break;
			  case "11":
				$sql .=" and a.status ='8' ";
				break;
			  case "12":
				$sql .=" and a.status ='9' ";
				break;
			  case "13":
				$sql .=" and a.status ='10' ";
				break;
			  default:
				$sql .=" ";
				
			}
			
		switch ($profileid) {
			  case "1":
				if($txtsearch=='4'){
					$sql .=" and a.status in ('4','5','6','7')";
				}else{
					$sql .=" and a.status = '" . $txtsearch . "'";
				}
				
				break;
			  case "2":
				$sql .=" and a.jenis_pembayaran like '" . $txtsearch . "'";
				break;
			  /*case "3":
				$sql .=" and a.nomor_surat like '%" . $txtsearch . "%'";
				break;
			  case "4":
				$sql .=" and a.display_name like '%" . $txtsearch . "%'";
				break;
			  case "5":
				$sql .=" and a.penerima like '%" . $txtsearch . "%'";
				break;*/
			  default:
				$sql .=" ";
				
			}
			
        $query=$this->db->query($sql);
		return $query->result();
	}
    
    public function getdatabysearch2($profileid,$txtsearch)
	{
		$dvs = $this->session->userdata('division_id');
        $sql = "SELECT a.*, SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new,b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE status in ('2','4','5','6','7','8','9','10')";
		
		switch ($filter) {
            case "1":
              $sql .=" ";
              break;
            case "2":
              $sql .=" and a.status in ('4','5','6','7','8','9') ";
              break;
            case "3":
              $sql .=" and a.status ='0' ";
              break;
            case "4":
              $sql .=" and a.jenis_pembayaran in ('2','3') and (label3 + INTERVAL '14' DAY) >= curdate()  ";
              break;
            case "5":
              $sql .=" and a.jenis_pembayaran in ('2','3') and (label3 + INTERVAL '14' DAY) < curdate() ";
              break;
            /*case "6":
              $sql .=" and a.jenis_pembayaran LIKE '%2%' and (label3 + INTERVAL '14' DAY) < curdate() ";
              break;*/
            case "7":
              $sql .=" and a.status ='0' ";
              break;
            case "8":
              $sql .=" and a.status ='1' ";
              break;
            case "9":
              $sql .=" and a.status ='2' ";
              break;
            case "10":
              $sql .=" and a.status in ('4','5','6','7') ";
              break;
            case "11":
              $sql .=" and a.status ='8' ";
              break;
            case "12":
              $sql .=" and a.status ='9' ";
              break;
            case "13":
              $sql .=" and a.status ='10' ";
              break;
            default:
              $sql .=" ";
              
          }
          
      switch ($profileid) {
            case "1":
              if($txtsearch=='4'){
                  $sql .=" and a.status in ('4','5','6','7')";
              }else{
                  $sql .=" and a.status = '" . $txtsearch . "'";
              }
              
              break;
            case "2":
              $sql .=" and a.jenis_pembayaran like '" . $txtsearch . "'";
              break;
            /*case "3":
              $sql .=" and a.nomor_surat like '%" . $txtsearch . "%'";
              break;
            case "4":
              $sql .=" and a.display_name like '%" . $txtsearch . "%'";
              break;
            case "5":
              $sql .=" and a.penerima like '%" . $txtsearch . "%'";
              break;*/
            default:
              $sql .=" ";
              
          }
            
        $query=$this->db->query($sql);
		return $query->result();
    }
    
    public function getdatatoExport($profileid)
	{
		$filter = $this->session->userdata("filter");
		$dvs = $this->session->userdata('division_id');
        $sql = "SELECT a.*, SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new,b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE division_id='$dvs' ";
		
		switch ($filter) {
			  case "1":
				$sql .=" ";
				break;
			  case "2":
				$sql .=" and a.status in ('4','5','6','7','8','9') ";
				break;
			  case "3":
				$sql .=" and a.status = '0' ";
				break;
			  case "4":
				$sql .=" and a.jenis_pembayaran LIKE '%2%' and (label3 + INTERVAL '14' DAY) >= curdate()  ";
				break;
			  case "5":
				$sql .=" and a.jenis_pembayaran LIKE '%2%' and (label3 + INTERVAL '14' DAY) < curdate() ";
				break;
			  /*case "6":
				$sql .=" and a.jenis_pembayaran LIKE '%2%' and (label3 + INTERVAL '14' DAY) < curdate() ";
				break;*/
			  default:
				$sql .=" ";
				
			}
			
		switch ($profileid) {
			  case "1":
				$sql .=" and a.tanggal like '%" . $txtsearch . "%'";
				break;
			  case "2":
				$sql .=" and b.jenis_pembayaran like '%" . $txtsearch . "%'";
				break;
			  case "3":
				$sql .=" and a.nomor_surat like '%" . $txtsearch . "%'";
				break;
			  case "4":
				$sql .=" and a.display_name like '%" . $txtsearch . "%'";
				break;
			  case "5":
				$sql .=" and a.penerima like '%" . $txtsearch . "%'";
				break;
			  default:
				$sql .=" ";
				
			}
            
        $query=$this->db->query($sql);
		return $query->result();
	}
	
	public function delete_tax($id)
	{
		$sqldel  ="DELETE FROM t_tax WHERE id_tax=" .$id ;
		$this->db->query($sqldel);
	}
	
	public function delete_nontax($id)
	{
		$sqldel  ="delete from t_nontax where id_payment=" .$id ;
		$this->db->query($sqldel);
	}
	
	public function getUrutTax($id) {
        $sql = "SELECT max(ifnull(no_urut,1))+1 as no_urut FROM t_tax WHERE id_payment = '$id'";
        $query = $this->db->query($sql)->result();
        return $query;
    }
	
	public function get_tax_by_nourut($id)
	{
		$sql = "select t.id_tax,t.id_payment,ifnull(t.no_urut,1) no_urut, t.nomor_surat, t.jenis_pajak,t.kode_pajak,t.kode_map,t.nama,t.npwp,t.alamat,t.tarif,";
		$sql .= "t.special_tarif,t.fas_pajak,t.gross,t.dpp,t.dpp_gross,t.pajak_terutang,t.masa_pajak,t.tahun,t.keterangan,p.id_jenis_pjk , ";		
		$sql .= "(select id_map from m_kode_map where trim(kode_map)=trim(t.kode_map)) id_map,";
		$sql .= "t.de,t.opsional,t.nilai,t.objek_pajak  ";		
		$sql .="FROM t_tax t, m_jenis_pajak p where trim(t.jenis_pajak)=trim(p.jenis_pajak) and t.id_tax = ".$id;
		$query = $this->db->query($sql)->result();
        return $query;
	}
	
	public function tax_update($table,$where, $data)
	{
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}
	public function getDataTaxFlag($id) {
        $sql = "select distinct id_payment, objek_pajak,de,opsional,nilai from t_tax where id_payment = '$id' order by no_urut";
		$query = $this->db->query($sql)->result();
        return $query;
    }
	
	public function updatejatahCC($upd,$sts){
		$dvs = $this->session->userdata('division_id');
        
        $sql = "UPDATE t_creditcard SET jatah=jatah-1 WHERE trim(no_billing) = "; 
		$sql .= "(select trim(no_rekening) from t_payment where jenis_pembayaran like '%6%' and status='".$sts."' and id_payment='".$upd['id_payment']."' and division_id='".$dvs."') ";
        $sql .= " and division_id='".$dvs."'";
		$query = $this->db->query($sql);
        return $query;
    }
	
	function getApprovalActivated(){
        $query=$this->db->query("select activate from m_status where id_status=11");
        return $query;
    }							

	public function getDataVendorByPayment($id) {
        $sql = "select a1.id_payment,a2.kode_vendor,a2.nama,a1.v_bank,a1.v_account,replace(replace(replace(a1.v_nominal,'.',''),'(',''),')','') nominal,a3.penerima,a1.v_currency,v_nominal ";
		$sql .= "from t_vendor a1, m_honorarium_konsultan a2 , t_payment a3 where a1.kode_vendor=a2.kode_vendor and a1.id_payment=a3.id_payment and a1.id_payment = '$id' order by a1.id_vendor asc ";
		$query = $this->db->query($sql)->result();
        return $query;
    }
	
	public function delete_vendorpayment($id)
	{
		$sqldel  ="delete from t_vendor where id_payment=" .$id ;
		$this->db->query($sqldel);
	}
	
	public function vendorpayment_add($data)
	{
		$this->db->insert('t_vendor', $data);
		return $this->db->insert_id();
	}
	
	public function getlistarfpaid() {
		$dvs = $this->session->userdata('division_id');
        
        $sql = "select nomor_surat, label1 ";
		$sql .= "from t_payment where jenis_pembayaran='2' and status='10' and division_id = '".$dvs."' order by nomor_surat asc ";
		$query = $this->db->query($sql)->result();
        return $query;
    }
	
	public function draftpaymentdelete($id)
	{
		$this->db->where('id_payment', $id);
		$this->db->delete('t_payment');
	}
	
	public function draftpaymentdeleteFlag($where, $data)
	{
		$this->db->update('t_payment', $data, $where);
		return $this->db->affected_rows();
    }
    
    public function getMonitoringWaitingProcessing($sid=0,$start_date,$end_date) {
        $dvs = $this->session->userdata('division_id');
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }

        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE  
                status = 2 AND tanggal2 BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getMonitoringTotalRequest($sid=0,$start_date,$end_date) {
        $dvs = $this->session->userdata('division_id');
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }

        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE  
                status in ('2','4','5','6','7','8','9','10') AND tanggal2 BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getMonitoringProcessing($sid=0,$start_date,$end_date) {
        $dvs = $this->session->userdata('division_id');
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }

        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE  
                status in ('4','5','6','7') AND tanggal2 BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getMonitoringVerified($sid=0,$start_date,$end_date) {
        $dvs = $this->session->userdata('division_id');
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }

        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE  
                status = 8 AND tanggal2 BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getMonitoringApproved($sid=0,$start_date,$end_date) {
        $dvs = $this->session->userdata('division_id');
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }

        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE  
                status = 9 AND tanggal2 BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getMonitoringPaid($sid=0,$start_date,$end_date) {
        $dvs = $this->session->userdata('division_id');
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }

        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE  
                status = 10 AND tanggal2 BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getMonitoringTax($sid=0,$start_date,$end_date) {
        $dvs = $this->session->userdata('division_id');
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }

        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE  
                status = 4 AND tanggal2 BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getMonitoringFinance($sid=0,$start_date,$end_date) {
        $dvs = $this->session->userdata('division_id');
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }

        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE  
                status = 5 AND tanggal2 BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getMonitoringReview($sid=0,$start_date,$end_date) {
        $dvs = $this->session->userdata('division_id');
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }

        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE  
                status = 6 AND tanggal2 BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getMonitoringWVerif($sid=0,$start_date,$end_date) {
        $dvs = $this->session->userdata('division_id');
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }

        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE  
                status = 7 AND tanggal2 BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getMonitoringWApproval($sid=0,$start_date,$end_date) {
        $dvs = $this->session->userdata('division_id');
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }

        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE  
                status = 8 AND tanggal2 BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getMonitoringWPaid($sid=0,$start_date,$end_date) {
        $dvs = $this->session->userdata('division_id');
        if ($start_date !=1 && $end_date !=1) {
            $start_date = $start_date;
            $end_date = $end_date;
        }
            else{
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d');
        }

        $sql = "SELECT a.*,SUBSTRING_INDEX(SUBSTRING_INDEX(a.tanggal, ',', 2), ',', -1) as tanggal_new, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE  
                status = 9 AND tanggal2 BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal2 DESC";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }
	
	public function addtaxheader($data)
	{
		$this->db->insert('t_tax_header', $data);
		return $this->db->insert_id();
	}
}