<?php
error_reporting(0);
class Home_model extends CI_Model{   

    public function getPayment($sid=0) {
        $dvs = $this->session->userdata('division_id');

        $sql = "SELECT a.*, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE division_id='$dvs'";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getVPayment() {
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');
        
        $sql = "SELECT * FROM (SELECT b.dsc, a.id_user, a.division_id, COUNT(a.jenis_pembayaran) AS jmlpembayaran FROM t_payment a 
                RIGHT JOIN t_pembayaran b ON a.jenis_pembayaran = b.id_pay AND a.id_user = '$usr' GROUP by b.jenis_pembayaran ORDER by b.id_pay) 
                otr WHERE otr.dsc != '' AND otr.division_id = '$dvs' AND otr.id_user = '$usr' AND otr.jmlpembayaran != 0 AND otr.dsc IS NOT NULL";
               
            //    var_dump($dvs);exit;
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getVdp(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql = "SELECT a.*, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.jenis_pembayaran like '%4%' 
        AND id_user = '$usr' AND division_id='$dvs' ";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getVar(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql = "SELECT a.*, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.jenis_pembayaran like '%2%' 
                AND id_user = '$usr' AND division_id='$dvs' ";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getDivHead(){
        $dvs = $this->session->userdata('division_id'); 

        $sql = "SELECT a.display_name, b.role_id, a.division_id FROM m_user as a JOIN m_role as b ON b.role_id='4' 
                WHERE a.division_id='$dvs' AND a.role_id='4'";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getVasr(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql = "SELECT a.*, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay WHERE a.jenis_pembayaran like '%3%' 
        AND id_user = '$usr' AND division_id='$dvs' ";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getDraftPrint(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql = "SELECT COUNT(status) as draftprint FROM t_payment WHERE status in ('1', '11') AND division_id='$dvs' AND id_user='$usr'";
        
        $query = $this->db->query($sql)->result();
        return $query;
    
    }
    
    public function getSubmitted(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql = "SELECT COUNT(status) as submit FROM t_payment WHERE status='2' AND division_id='$dvs' AND id_user='$usr'";
        
        $query = $this->db->query($sql)->result();
        return $query;
    
    }

    public function getOutstanding(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql = "SELECT COUNT(status) as outstanding FROM t_payment WHERE status in ('4','5','6','7','8','9') AND division_id='$dvs' AND id_user='$usr'";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getProcessing(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql = "SELECT COUNT(status) as process FROM t_payment WHERE status in ('4','5','6','7') AND division_id='$dvs' AND id_user='$usr'";
        
        $query = $this->db->query($sql)->result();
        return $query;
    
    }

    function getVerifikasi(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql = "SELECT COUNT(status) as verifikasi FROM t_payment WHERE status='8' AND division_id='$dvs' AND id_user='$usr'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getApproval(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql = "SELECT COUNT(status) as approval FROM t_payment WHERE status='9' AND division_id='$dvs' AND id_user='$usr'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getPaid(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql = "SELECT COUNT(status) as paid FROM t_payment WHERE status='10' AND division_id='$dvs' AND id_user='$usr'";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getVdraftrequest(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql = "SELECT a.*, b.jenis_pembayaran FROM t_payment as a JOIN t_pembayaran as b ON a.jenis_pembayaran = b.id_pay
                WHERE status in ('0', '1') AND division_id='$dvs' AND id_user='$usr' ";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getTotal(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql = "SELECT COUNT(jenis_pembayaran) as totalreq FROM t_payment WHERE division_id='$dvs' AND id_user='$usr'";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getBank(){
        $sql = "SELECT nama_bank as bank FROM m_bank";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getCurrency(){
        $sql = "SELECT currency as curr FROM m_currency";
        
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function getTotalDraft(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql = "SELECT * FROM (SELECT b.status_laporan, a.id_user, a.division_id, COUNT(a.status) AS totaldraft FROM t_payment a RIGHT JOIN m_status b ON 
                a.status = b.id_status AND a.id_user = '$usr' AND a.status = '0'
                GROUP by b.status_laporan ORDER by b.id_status) otr WHERE otr.status_laporan != '' AND otr.division_id = '$dvs' AND otr.id_user = '$usr' 
                AND otr.totaldraft != 0 AND otr.status_laporan IS NOT NULL";
                
        // var_dump($sql);exit;        
        $query = $this->db->query($sql)->result();
        return $query;
        
    }

    public function getRejected(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql ="SELECT * FROM t_payment WHERE status='3' AND division_id='$dvs' AND id_user='$usr'";

        $query = $this->db->query($sql)->result();
        return $query;
    }

    function notifRejected(){
        $dvs = $this->session->userdata('division_id');
        $usr = $this->session->userdata('id_user');

        $sql = "SELECT COUNT(status) as totrejected FROM t_payment WHERE division_id='$dvs' AND id_user='$usr' AND status='3'";
        $count_rejected = $this->db->query($sql)->result();
        
        return $count_rejected;

    }    
    
    public function getform($id_payment) {
        $sql = "SELECT * FROM `t_payment` WHERE id_payment = '$id_payment'";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    var $table ="t_payment";
    public function buat_kode()  {   
        $dvs = $this->session->userdata('division_id');  

        $this->db->select('LEFT(t_payment.nomor_surat,4) as kode', FALSE);
        $this->db->order_by('nomor_surat','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('t_payment');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
         //jika kode ternyata sudah ada.      
         $data = $query->row();      
         $kode = intval($data->kode) + 1;    
        }
        else {      
         //jika kode belum ada      
         $kode = 1;    
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = $kodemax."/$dvs/SPPP/".date('my');    // hasilnya 0001/$dvs/SPPP/bulantahun dst.
        return $kodejadi;  
    }
    
    function addpayment($add){
        $sql = "INSERT INTO `t_payment` (id_payment, id_user, nomor_surat, jenis_pembayaran, display_name, tanggal, tanggal2, currency, currency2, currency3, 
                division_id, jabatan, label1, label2, jumlah2, jumlah3, label3, label4, label5, label6, label7, label8, label9, penerima, vendor, 
                akun_bank, no_rekening, status, lainnya1, lainnya2) 
                VALUES ('".$add['id_payment']."','".$add['id_user']."','".$add['nomor_surat']."','".$add['jenis_pembayaran']."','".$add['display_name']."',
                '".$add['tanggal']."','".$add['tanggal2']."','".$add['currency']."','".$add['currency2']."','".$add['currency3']."','".$add['division_id']."','".$add['jabatan']."',
                '".$add['label1']."','".$add['label2']."','".$add['jumlah2']."','".$add['jumlah3']."','".$add['label3']."','".$add['label4']."','".$add['label5']."',
                '".$add['label6']."','".$add['label7']."','".$add['label8']."','".$add['label9']."','".$add['penerima']."','".$add['vendor']."','".$add['akun_bank']."',
                '".$add['no_rekening']."','".$add['status']."','".$add['lainnya1']."','".$add['lainnya2']."')";
        
        $query = $this->db->query($sql);

        return $query;
    }

    function updatepayment($upd){
        $sql = "UPDATE `t_payment` SET `display_name`='".$upd['display_name']."',`jabatan`='".$upd['jabatan']."',`jenis_pembayaran`='".$upd['jenis_pembayaran']."',`currency`='".$upd['currency']."',
                `currency2`='".$upd['currency2']."',`currency3`='".$upd['currency3']."',`label1`='".$upd['label1']."',`label2`='".$upd['label2']."',`jumlah2`='".$upd['jumlah2']."',`jumlah3`='".$upd['jumlah3']."',
                `label3`='".$upd['label3']."',`label4`='".$upd['label4']."',`label5`='".$upd['label5']."',`label6`='".$upd['label6']."',`label7`='".$upd['label7']."',`label8`='".$upd['label8']."',`label9`='".$upd['label9']."',
                `vendor`='".$upd['vendor']."',`akun_bank`='".$upd['akun_bank']."',`no_rekening`='".$upd['no_rekening']."',`lainnya1`='".$upd['lainnya1']."',`lainnya2`='".$upd['lainnya2']."'
        WHERE `id_payment`='".$upd['id_payment']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    public function updateprint($upd){
        $sql = "UPDATE `t_payment` SET `status`='".$upd['status']."' WHERE `id_payment`='".$upd['id_payment']."'"; 
        
        $query = $this->db->query($sql);

        return $query;
    }

    // INSERT INTO `pii_csf`.`t_payment` (`nomor_surat`, `nama_user`, `tanggal`, `hari`, `divisi`, `jabatan`, `label1`, `label2`, `label3`, `label4`, `label5`, `label6`, `penerima`, `akun_bank`, `no_rekening`) 
    // VALUES ('SPK/PII/Payment/00003', 'Mutiara', '2020-02-28', 'Friday', 'Admin', 'Admin', 'qwee', '232qq', '121q', '121wqw', '1232ew', '23123d', 'Denbe', 'Mandiri', '200293133');
    function deletepayment($id){
        $sql = "DELETE FROM `t_payment` WHERE `t_payment`.`id_payment` = $id";

        $query = $this->db->query($sql);

        return $query;
    }

    public function getProfilId(){

    	$id_user = $this->session->userdata("id_user");

		$this->db->where('id_user', $id_user);
		$result = $this->db->get('m_user')->result(); // Tampilkan semua data kota berdasarkan id provinsi
		
		return $result; 
    }

    public function update_myprofil($myprofil){
        $sql = "UPDATE `m_user` SET `display_name`='".$myprofil['display_name']."',`division_id`='".$myprofil['division_id']."',`jabatan`='".$myprofil['jabatan']."',
                `email` = '".$myprofil['email']."', `created_date`= NOW() WHERE id_user = '".$myprofil['id_user']."'";

        $query = $this->db->query($sql);

        return $query;
    }

    public function update_myprofilpass($myprofil){
        $sql = "UPDATE `m_user` SET `display_name`='".$myprofil['display_name']."',`division_id`='".$myprofil['division_id']."',`jabatan`='".$myprofil['jabatan']."',
                `email` = '".$myprofil['email']."', `password`=md5('".$myprofil['password_baru']."'), `created_date`= NOW() WHERE id_user = '".$myprofil['id_user']."'";

        $query = $this->db->query($sql);

        return $query;
    }

}