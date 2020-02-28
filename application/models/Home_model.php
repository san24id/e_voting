<?php
error_reporting(0);
class Home_model extends CI_Model{   

    public function payment() {
        $sql = "SELECT * FROM `t_payment`";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }

    var $table ="t_payment";  
    public function buat_kode()  {
        

        $this->db->select('RIGHT(t_payment.nomor_surat,4) as kode', FALSE);
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
        $kodejadi = "SP3/PII/Payment/".$kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $kodejadi;  
    }

    function addpayment($add){
        $sql = "INSERT INTO `t_payment` (id_payment, nomor_surat, nama_user, tanggal, hari, divisi, jabatan, label1, label2,
        label3, label4, label5, label6, penerima, akun_bank, no_rekening) 
        VALUES ('".$add['id_payment']."','".$add['nomor_surat']."','".$add['nama_user']."','".$add['tanggal']."','".$add['hari']."',
        '".$add['divisi']."','".$add['jabatan']."','".$add['label1']."','".$add['label2']."','".$add['label3']."','".$add['label4']."',
        '".$add['label5']."','".$add['label6']."','".$add['penerima']."','".$add['akun_bank']."','".$add['no_rekening']."')";
        
        $query = $this->db->query($sql);

        return $query;
    }

    function updatepayment($upd){
        $sql = "UPDATE `t_payment` SET `label1`='".$upd['label1']."',`label2`='".$upd['label2']."',`label3`='".$upd['label3']."',
        `label4`='".$upd['label4']."',`label5`='".$upd['label5']."',`label6`='".$upd['label6']."',`penerima`='".$upd['penerima']."',`akun_bank`='".$upd['akun_bank']."',`no_rekening`='".$upd['no_rekening']."',
        WHERE `id_payment`='".$upd['id_payment']."'"; 
        
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

}