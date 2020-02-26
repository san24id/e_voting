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
        $kodejadi = "ODJ-9921-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $kodejadi;  
  }


    // public function cn_assesment() {
    //     $sql = "SELECT * FROM `t_assessment`";
                
    //     $query = $this->db->query($sql)->num_rows();
    //     return $query;
    // }

    // public function assesmentskor($idp) {
    //     $sql = "SELECT * FROM `t_skor` WHERE id_projek = '$idp'";
                
    //     $query = $this->db->query($sql)->result();
    //     return $query;
    // }

    // public function cn_assesmentskor($idp) {
	// 	$sql = "SELECT * FROM `t_skor`  WHERE id_projek = '$idp'";
	// 	$query = $this->db->query($sql)->num_rows();
				
	// 	return $query;
	// }

    // public function assesmentskor_u($idp) {
    //     $sql = "SELECT @no:=@no+1 AS nomor, a.* FROM `t_skor` a, (SELECT @no:=0)w WHERE a.id_projek = '$idp'";
                
    //     $query = $this->db->query($sql)->result();
    //     return $query;
    // }

    // public function cn_assesmentskor_u($idp) {
    //     $sql = "SELECT @no:=@no+1 AS nomor, a.* FROM `t_skor` a, (SELECT @no:=0)w WHERE a.id_projek = '$idp'";
                
    //     $query = $this->db->query($sql)->num_rows();
    //     return $query;
    // }

    // public function getno(){
    //     $sql = "SELECT * FROM `m1` ORDER BY `idass`, nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
        
    //     return $query;
    // }

    // public function getno1(){
    //     $sql = "SELECT * FROM `m1`  WHERE nomor_urut = '1' ORDER BY `idass`, nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
        
    //     return $query;
    // }

    // public function getno2(){
    //     $sql = "SELECT * FROM `m1`  WHERE nomor_urut = '2' ORDER BY `idass`, nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
        
    //     return $query;
    // }

    // public function getno3(){
    //     $sql = "SELECT * FROM `m1`  WHERE nomor_urut = '3' ORDER BY `idass`, nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
        
    //     return $query;
    // }


    // public function getno4(){
    //     $sql = "SELECT * FROM `m1`  WHERE nomor_urut = '4' ORDER BY `idass`, nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
        
    //     return $query;
    // }


    // public function getno5(){
    //     $sql = "SELECT * FROM `m1`  WHERE nomor_urut = '5' ORDER BY `idass`, nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
        
    //     return $query;
    // }


    // public function getno6(){
    //     $sql = "SELECT * FROM `m1`  WHERE nomor_urut = '6' ORDER BY `idass`, nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
        
    //     return $query;
    // }


    // public function getno7(){
    //     $sql = "SELECT * FROM `m1`  WHERE nomor_urut = '7' ORDER BY `idass`, nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
        
    //     return $query;
    // }


    // public function getno8(){
    //     $sql = "SELECT * FROM `m1`  WHERE nomor_urut = '8' ORDER BY `idass`, nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
        
    //     return $query;
    // }


    // public function getno9(){
    //     $sql = "SELECT * FROM `m1`  WHERE nomor_urut = '9' ORDER BY `idass`, nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
        
    //     return $query;
    // }


    // public function getno10(){
    //     $sql = "SELECT * FROM `m1`  WHERE nomor_urut = '10' ORDER BY `idass`, nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
        
    //     return $query;
    // }


    // public function getno11(){
    //     $sql = "SELECT * FROM `m1`  WHERE nomor_urut = '11' ORDER BY `idass`, nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
        
    //     return $query;
    // }

    // public function getno12(){
    //     $sql = "SELECT * FROM `m1`  WHERE nomor_urut = '12' ORDER BY `idass`, nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
        
    //     return $query;
    // }

    // public function getno13(){
    //     $sql = "SELECT * FROM `m1`  WHERE nomor_urut = '13' ORDER BY `idass`, nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
        
    //     return $query;
    // }

    // public function getno14(){
    //     $sql = "SELECT * FROM `m1`  WHERE nomor_urut = '14' ORDER BY `idass`, nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
        
    //     return $query;
    // }

    // public function getno15(){
    //     $sql = "SELECT * FROM `m1`  WHERE nomor_urut = '15' ORDER BY `idass`, nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
        
    //     return $query;
    // }


	// public function getSektor() {
	// 	$sql = "select 
	// 			* from t_sektor where id_sektor != 0";
				
	// 	$query = $this->db->query($sql);
	// 	foreach($query->result_array() as $row) {
	// 		$res[] = $row;
	// 	}
	// 	return $res;
	// }

	// public function getKementerian() {
	// 	$sql = "select 
	// 			* from t_kementerian where id_kementerian != 0";
				
	// 	$query = $this->db->query($sql);
	// 	foreach($query->result_array() as $row) {
	// 		$res[] = $row;
	// 	}
	// 	return $res;
	// }

	// public function getNonKementrian() {
	// 	$sql = "select 
	// 			* from t_lpnk where id_lpnk != 0";
				
	// 	$query = $this->db->query($sql);
	// 	foreach($query->result_array() as $row) {
	// 		$res[] = $row;
	// 	}
	// 	return $res;
	// }

	// public function getProvinsi() {
	// 	$sql = "select 
	// 			* from t_provinsi where id_provinsi != 0";
				
	// 	$query = $this->db->query($sql);
	// 	foreach($query->result_array() as $row) {
	// 		$res[] = $row;
	// 	}
	// 	return $res;
	// }
	// public function getKota() {
	// 	$sql = "select 
	// 			* from t_kota a, t_provinsi b where a.id_provinsi =  b.id_provinsi";
				
	// 	$query = $this->db->query($sql);
	// 	foreach($query->result_array() as $row) {
	// 		$res[] = $row;
	// 	}
	// 	return $res;
	// }
	// public function getKabupaten() {
	// 	$sql = "select 
	// 			* from t_kabupaten a, t_provinsi b where a.id_provinsi = b.id_provinsi";
				
	// 	$query = $this->db->query($sql);
	// 	foreach($query->result_array() as $row) {
	// 		$res[] = $row;
	// 	}
	// 	return $res;
	// }
    // public function getKotaKabu() {
    //     $sql = "select 
    //             * from t_kotakabu a, t_provinsi b where a.id_provinsi = b.id_provinsi and a.id_kotakabu != 0";
                
    //     $query = $this->db->query($sql);
    //     foreach($query->result_array() as $row) {
    //         $res[] = $row;
    //     }
    //     return $res;
    // }

	// public function getProfilProjek($sid=0, $filter_status='') {

	// 	$sql = "SELECT *, concat(LPAD(a.kategori,2,0),'-',LPAD(a.sektor,2,0),'-', LPAD(a.id_projek, 3, '0')) as act_code FROM t_projekprofil a, t_kategori b, t_sektor c WHERE a.kategori = b.id_kategori AND a.sektor = c.id_sektor AND id_user = '$sid'";
    //     if ( $filter_status != '' AND $filter_status != '0' )
    //     {
    //         $sql .= " AND status = '$filter_status'";
    //     }
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }

	// public function getIdProfilProjek($idp) {
	// 	$sql = "SELECT *, concat(LPAD(a.kategori,2,0),'-',LPAD(a.sektor,2,0),'-', LPAD(a.id_projek, 3, '0')) as act_code FROM t_projekprofil a, t_kategori b, t_sektor c, t_user_kategori d, t_lpnk e, t_kementerian f, t_provinsi g, t_kotakabu h, t_subsektor_ln i, t_subsektor j WHERE a.kategori = b.id_kategori AND a.sektor = c.id_sektor AND a.id_projek = d.id_projek AND d.n_lembaga = e.id_lpnk AND d.n_kementerian = f.id_kementerian AND d.n_provinsi = g.id_provinsi AND d.n_kotakabu = h.id_kotakabu AND a.id_projek = i.id_projek AND a.subsektor = j.id_subsektor AND a.id_projek = '$idp'";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }


    // public function getmailProfilProjek($idp) {
    //     $sql = "SELECT *, a.status as status_profil, concat(LPAD(a.kategori,2,0),'-',LPAD(a.sektor,2,0),'-', LPAD(a.id_projek, 3, '0')) as act_code FROM t_projekprofil a, t_kategori b, t_sektor c, t_user_kategori d, t_lpnk e, t_kementerian f, t_provinsi g, t_kotakabu h, t_user i WHERE a.kategori = b.id_kategori AND a.sektor = c.id_sektor AND a.id_projek = d.id_projek AND d.n_lembaga = e.id_lpnk AND d.n_kementerian = f.id_kementerian AND d.n_provinsi = g.id_provinsi AND d.n_kotakabu = h.id_kotakabu AND a.id_projek = '$idp'";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }

    // public function getIdProfilProjekUser($idp, $idu) {
    //     $sql = "SELECT *, concat(LPAD(a.kategori,2,0),'-',LPAD(a.sektor,2,0),'-', LPAD(a.id_projek, 3, '0')) as act_code FROM t_projekprofil a, t_kategori b, t_sektor c, t_user_kategori d, t_lpnk e, t_kementerian f, t_provinsi g, t_kotakabu h WHERE a.kategori = b.id_kategori AND a.sektor = c.id_sektor AND a.id_projek = d.id_projek AND d.n_lembaga = e.id_lpnk AND d.n_kementerian = f.id_kementerian AND  d.n_provinsi = g.id_provinsi AND d.n_kotakabu = h.id_kotakabu AND a.id_projek = '$idp' AND a.id_user = '$idu'";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }

    // public function getskor($idp){
    //     $sql = "SELECT * FROM t_skor WHERE id_projek = '$idp'";
    //     $query =  $this->db->query($sql)->result();  
        
    //     return $query; 
    // }

    // public function gett($idp) {
	// 	$sql = "SELECT * FROM `t_m1profil`  WHERE id_projek = '$idp' ORDER BY `idass`, nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }

	// public function gett1($idp) {
	// 	$sql = "SELECT * FROM `t_m1profil`  WHERE id_projek = '$idp' AND nomor_urut = '1' ORDER BY `idass`, nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }

	// public function gett2($idp) {
	// 	$sql = "SELECT * FROM `t_m1profil`  WHERE id_projek = '$idp' AND nomor_urut = '2' ORDER BY `idass`, nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }


	// public function gett3($idp) {
	// 	$sql = "SELECT * FROM `t_m1profil`  WHERE id_projek = '$idp' AND nomor_urut = '3' ORDER BY `idass`, nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }

	// public function gett4($idp) {
	// 	$sql = "SELECT * FROM `t_m1profil`  WHERE id_projek = '$idp' AND nomor_urut = '4' ORDER BY `idass`, nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }

	// public function gett5($idp) {
	// 	$sql = "SELECT * FROM `t_m1profil`  WHERE id_projek = '$idp' AND nomor_urut = '5' ORDER BY `idass`, nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }

	// public function gett6($idp) {
	// 	$sql = "SELECT * FROM `t_m1profil`  WHERE id_projek = '$idp' AND nomor_urut = '6' ORDER BY `idass`, nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }

	// public function gett7($idp) {
	// 	$sql = "SELECT * FROM `t_m1profil`  WHERE id_projek = '$idp' AND nomor_urut = '7' ORDER BY `idass`, nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }

	// public function gett8($idp) {
	// 	$sql = "SELECT * FROM `t_m1profil`  WHERE id_projek = '$idp' AND nomor_urut = '8' ORDER BY `idass`, nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }

	// public function gett9($idp) {
	// 	$sql = "SELECT * FROM `t_m1profil`  WHERE id_projek = '$idp' AND nomor_urut = '9' ORDER BY `idass`, nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }

	// public function gett10($idp) {
	// 	$sql = "SELECT * FROM `t_m1profil`  WHERE id_projek = '$idp' AND nomor_urut = '10' ORDER BY `idass`, nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }

	// public function gett11($idp) {
	// 	$sql = "SELECT * FROM `t_m1profil`  WHERE id_projek = '$idp' AND nomor_urut = '11' ORDER BY `idass`, nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }

	// public function gett12($idp) {
	// 	$sql = "SELECT * FROM `t_m1profil`  WHERE id_projek = '$idp' AND nomor_urut = '12' ORDER BY `idass`, nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }

	// public function gett13($idp) {
	// 	$sql = "SELECT * FROM `t_m1profil`  WHERE id_projek = '$idp' AND nomor_urut = '13' ORDER BY `idass`, nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }

	// public function gett14($idp) {
	// 	$sql = "SELECT * FROM `t_m1profil`  WHERE id_projek = '$idp' AND nomor_urut = '14' ORDER BY `idass`, nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }

	// public function gett15($idp) {
	// 	$sql = "SELECT * FROM `t_m1profil`  WHERE id_projek = '$idp' AND nomor_urut = '15' ORDER BY `idass`, nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
	// }

    // public function gettu($idp) {
    //     $sql = "SELECT * FROM `t_m1profil` a, t_skor b WHERE a.idass = b.idass AND b.s_upload = 1 AND a.id_projek = '$idp' AND b.id_projek = '$idp'  ORDER BY a.`idass`, a.nomor_urut, urut ASC";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
    // }
    
    // public function gettu1($idp) {
    //     $sql = "SELECT * FROM `t_m1profil` a, t_assessment b WHERE a.idass = b.id_ass AND b.s_upload = 1 AND a.id_projek = '$idp' AND a.nomor_urut = '1' ORDER BY a.`idass`, a.nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }

    // public function gettu2($idp) {
    //    $sql = "SELECT * FROM `t_m1profil` a, t_assessment b WHERE a.idass = b.id_ass AND b.s_upload = 1 AND a.id_projek = '$idp' AND a.nomor_urut = '2' ORDER BY a.`idass`, a.nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }


    // public function gettu3($idp) {
    //     $sql = "SELECT * FROM `t_m1profil` a, t_assessment b WHERE a.idass = b.id_ass AND b.s_upload = 1 AND a.id_projek = '$idp' AND a.nomor_urut = '3' ORDER BY a.`idass`, a.nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }

    // public function gettu4($idp) {
    //    $sql = "SELECT * FROM `t_m1profil` a, t_assessment b WHERE a.idass = b.id_ass AND b.s_upload = 1 AND a.id_projek = '$idp' AND a.nomor_urut = '4' ORDER BY a.`idass`, a.nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }

    // public function gettu5($idp) {
    //     $sql = "SELECT * FROM `t_m1profil` a, t_assessment b WHERE a.idass = b.id_ass AND b.s_upload = 1 AND a.id_projek = '$idp' AND a.nomor_urut = '5' ORDER BY a.`idass`, a.nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }

    // public function gettu6($idp) {
    //     $sql = "SELECT * FROM `t_m1profil` a, t_assessment b WHERE a.idass = b.id_ass AND b.s_upload = 1 AND a.id_projek = '$idp' AND a.nomor_urut = '6' ORDER BY a.`idass`, a.nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }

    // public function gettu7($idp) {
    //    $sql = "SELECT * FROM `t_m1profil` a, t_assessment b WHERE a.idass = b.id_ass AND b.s_upload = 1 AND a.id_projek = '$idp' AND a.nomor_urut = '7' ORDER BY a.`idass`, a.nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }

    // public function gettu8($idp) {
    //    $sql = "SELECT * FROM `t_m1profil` a, t_assessment b WHERE a.idass = b.id_ass AND b.s_upload = 1 AND a.id_projek = '$idp' AND a.nomor_urut = '8' ORDER BY a.`idass`, a.nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }

    // public function gettu9($idp) {
    //    $sql = "SELECT * FROM `t_m1profil` a, t_assessment b WHERE a.idass = b.id_ass AND b.s_upload = 1 AND a.id_projek = '$idp' AND a.nomor_urut = '9' ORDER BY a.`idass`, a.nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }

    // public function gettu10($idp) {
    //     $sql = "SELECT * FROM `t_m1profil` a, t_assessment b WHERE a.idass = b.id_ass AND b.s_upload = 1 AND a.id_projek = '$idp' AND a.nomor_urut = '10' ORDER BY a.`idass`, a.nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }

    // public function gettu11($idp) {
    //     $sql = "SELECT * FROM `t_m1profil` a, t_assessment b WHERE a.idass = b.id_ass AND b.s_upload = 1 AND a.id_projek = '$idp' AND a.nomor_urut = '11' ORDER BY a.`idass`, a.nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }

    // public function gettu12($idp) {
    //     $sql = "SELECT * FROM `t_m1profil` a, t_assessment b WHERE a.idass = b.id_ass AND b.s_upload = 1 AND a.id_projek = '$idp' AND a.nomor_urut = '12' ORDER BY a.`idass`, a.nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }

    // public function gettu13($idp) {
    //    $sql = "SELECT * FROM `t_m1profil` a, t_assessment b WHERE a.idass = b.id_ass AND b.s_upload = 1 AND a.id_projek = '$idp' AND a.nomor_urut = '13' ORDER BY a.`idass`, a.nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }

    // public function gettu14($idp) {
    //    $sql = "SELECT * FROM `t_m1profil` a, t_assessment b WHERE a.idass = b.id_ass AND b.s_upload = 1 AND a.id_projek = '$idp' AND a.nomor_urut = '14' ORDER BY a.`idass`, a.nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }

    // public function gettu15($idp) {
    //    $sql = "SELECT * FROM `t_m1profil` a, t_assessment b WHERE a.idass = b.id_ass AND b.s_upload = 1 AND a.id_projek = '$idp' AND a.nomor_urut = '15' ORDER BY a.`idass`, a.nomor_urut, urut ASC";
    //     $query =  $this->db->query($sql)->result();
                
    //     return $query;
    // }

	// public function viewByProvinsi($id_provinsi){
	// 	$result = $this->db->query("SELECT * FROM t_kota WHERE id_provinsi = '$id_provinsi'")->result(); // Tampilkan semua data kota berdasarkan id provinsi
		
	// 	return $result;  
    // }

    // public function viewByKabuProvinsi($id_provinsi){
	// 	$result = $this->db->query("SELECT * FROM t_kabupaten WHERE id_provinsi = '$id_provinsi'")->result(); // Tampilkan semua data kota berdasarkan id provinsi
		
	// 	return $result; 
    // }

    // public function viewByKotabuProvinsi($id_provinsi){
    //     $result = $this->db->query("SELECT * FROM t_kotakabu WHERE id_provinsi = '$id_provinsi'")->result(); // Tampilkan semua data kota berdasarkan id provinsi
        
    //     return $result; 
    // }

    // public function viewBySubsektor($id_sektor){
    //     $result = $this->db->query("SELECT * FROM t_subsektor WHERE id_sektor = '$id_sektor'")->result(); // Tampilkan semua data kota berdasarkan id provinsi
        
    //     return $result; 
    // }

    // public function viewBySubsektor_edit($id_sektor, $id_subsektor){
    //     $result = $this->db->query("SELECT * FROM t_subsektor WHERE id_sektor = '$id_sektor' AND id_subsektor = '$id_subsektor'")->result(); // Tampilkan semua data kota berdasarkan id provinsi
        
    //     return $result; 
    // }

    // public function viewByProvinsi_edit($id_provinsi, $n_kota){
	// 	$result = $this->db->query("SELECT * FROM t_kota WHERE id_provinsi = '$id_provinsi' AND id_kota = '$n_kota'")->result(); // Tampilkan semua data kota berdasarkan id provinsi
		
	// 	return $result; 
    // }

    // public function viewByKabuProvinsi_edit($id_provinsi, $n_kabupaten){
	// 	$result = $this->db->query("SELECT * FROM t_kabupaten WHERE id_provinsi = '$id_provinsi' AND id_kabupaten = '$n_kabupaten'")->result(); // Tampilkan semua data kota berdasarkan id provinsi
		
	// 	return $result; 
    // }

    // public function viewByKotabuProvinsi_edit($id_provinsi, $n_kotakabu){
    //     $result = $this->db->query("SELECT * FROM t_kotakabu WHERE id_provinsi = '$id_provinsi' AND id_kotakabu = '$n_kotakabu'")->result(); // Tampilkan semua data kota berdasarkan id provinsi
        
    //     return $result; 
    // }

    // public function getProfilId(){

    // 	$id_user = $this->session->userdata("id_user");

	// 	$this->db->where('id_user', $id_user);
	// 	$result = $this->db->get('t_user')->result(); // Tampilkan semua data kota berdasarkan id provinsi
		
	// 	return $result; 
    // }


    // public function update_myprofil($myprofil){
    //     $sql = "UPDATE `t_user` SET `nama_user`='".$myprofil['nama_user']."',`instansi`='".$myprofil['instansi']."',`jabatan`='".$myprofil['jabatan']."', `telepon` = '".$myprofil['telepon']."', `log_update`= NOW() WHERE id_user = '".$myprofil['id_user']."'";

    //     $query = $this->db->query($sql);

    //     return $query;
    // }

    // public function update_myprofilpass($myprofil){
    //     $sql = "UPDATE `t_user` SET `nama_user`='".$myprofil['nama_user']."',`instansi`='".$myprofil['instansi']."',`jabatan`='".$myprofil['jabatan']."', `telepon` = '".$myprofil['telepon']."', `password`=md5('".$myprofil['password_baru']."'), `log_update`= NOW() WHERE id_user = '".$myprofil['id_user']."'";

    //     $query = $this->db->query($sql);

    //     return $query;
    // }

    // public function insert_profil($addprof, $addktprof){

    // 	$id_user = $this->session->userdata("id_user");
    // 	$nama_pj = addslashes($addprof['nama_pj']);
    // 	$kategori = addslashes($addprof['kt']);
    // 	$sektor = addslashes($addprof['sektor']);
    //     $subsektor = addslashes($addprof['subsektor']);
    //     $subsektorln = addslashes($addprof['subsektorln']);
    // 	$nama_projek = addslashes($addprof['nama_proyek']);
    // 	$lokasi = addslashes($addprof['lokasi']);
    // 	$estimasi = addslashes($addprof['estimasi']);
    //     $nama = addslashes($addprof['nama']);
    //     $telepon = addslashes($addprof['telepon']);
    //     $jabatan = addslashes($addprof['jabatan']);


    // 	$next = addslashes($addprof['next']);

    // 	$bumn_text = addslashes($addktprof['bumn_text']);
    // 	$bumd_text = addslashes($addktprof['bumd_text']);
    // 	$lainnya_text = addslashes($addktprof['lainnya_text']);
    // 	$jenis = addslashes($addktprof['jenis']);
    // 	$n_kementerian = addslashes($addktprof['n_kementerian']);
    // 	$n_lembaga = addslashes($addktprof['n_lembaga']);
    // 	$n_provinsi = addslashes($addktprof['n_provinsi']);
    // 	$n_kotakabu = addslashes($addktprof['n_kotakabu']);

    //     if($next == 'next'){
    //         $status = '2';
    //     }else{
    //         $status = '1';
    //     }


    // 	$query = "INSERT INTO `t_projekprofil`(`id_user`, `nama_pj`, `kategori`, `sektor`, `subsektor`, `nama_projek`, `lokasi`, `estimasi`, `nama`, `telepon`, `jabatan`, `status`, `log_create`, `log_update`) VALUES ('$id_user', '$nama_pj', '$kategori', '$sektor', '$subsektor', '$nama_projek', '$lokasi', '$estimasi', '$nama', '$telepon', '$jabatan', '$status', NOW(), NOW())";
    // 	$sql = $this->db->query($query);

    // 	$rid = $this->db->insert_id();

    // 	$query = "UPDATE t_projekprofil AS Table_A, (SELECT a.id_projek, concat(LPAD(a.kategori,2,0),'-',LPAD(a.sektor,2,0),'-', LPAD(a.id_projek, 3, '0')) as act_code FROM `t_projekprofil` a WHERE a.id_projek = $rid) AS Table_B SET Table_A.nomor_projek = Table_B.act_code WHERE Table_A.id_projek = Table_B.id_projek AND Table_A.id_projek = $rid";

    // 	$sql = $this->db->query($query);

    //     $query = "INSERT INTO `t_subsektor_ln`(`id_projek`, `id_sektor`, `id_subsektor`, `nama_lainnya`) VALUES ('$rid','$sektor','$subsektor','$subsektorln')";

    //     $sql = $this->db->query($query);

    // 	$query = "INSERT INTO `t_user_kategori`(`id_projek`, `id_kategori`, `bumn_text`, `bumd_text`, `lainnya_text`, `jenis`, `n_kementerian`, `n_lembaga`, `n_provinsi`, `n_kotakabu`) VALUES ('$rid',(SELECT kategori FROM t_projekprofil WHERE id_projek = $rid),'$bumn_text','$bumd_text','$lainnya_text', '$jenis', '$n_kementerian', '$n_lembaga', '$n_provinsi', '$n_kotakabu')";

    // 	$sql = $this->db->query($query);

    // 	return $rid;
    // }


    //     public function update_profil($addprof, $addktprof){

    //     $id_user = $this->session->userdata("id_user");
    //     $rid = addslashes($addprof['id_projek']);
    //     $nama_pj = addslashes($addprof['nama_pj']);
    //     $kategori = addslashes($addprof['kt']);
    //     $sektor = addslashes($addprof['sektor']);
    //     $subsektor = addslashes($addprof['subsektor']);
    //     $subsektorln = addslashes($addprof['subsektorln']);
    //     $nama_projek = addslashes($addprof['nama_proyek']);
    //     $lokasi = addslashes($addprof['lokasi']);
    //     $estimasi = addslashes($addprof['estimasi']);
    //     $nama = addslashes($addprof['nama']);
    //     $telepon = addslashes($addprof['telepon']);
    //     $jabatan = addslashes($addprof['jabatan']);

    //     $next = addslashes($addprof['next']);

    //     $bumn_text = addslashes($addktprof['bumn_text']);
    //     $bumd_text = addslashes($addktprof['bumd_text']);
    //     $lainnya_text = addslashes($addktprof['lainnya_text']);
    //     $jenis = addslashes($addktprof['jenis']);
    //     $n_kementerian = addslashes($addktprof['n_kementerian']);
    //     $n_lembaga = addslashes($addktprof['n_lembaga']);
    //     $n_provinsi = addslashes($addktprof['n_provinsi']);
    //     $n_kotakabu = addslashes($addktprof['n_kotakabu']);

    //     if($next == 'next'){
    //         $status = '2';
    //     }else{
    //         $status = '1';
    //     }

    //     $query = "UPDATE `t_projekprofil` SET `nama_pj`='$nama_pj', `kategori`='$kategori', `sektor`='$sektor', `subsektor` = '$subsektor', `nama_projek`='$nama_projek', `lokasi`='$lokasi', `estimasi`='$estimasi', `nama`='$nama', `telepon`='$telepon', `jabatan`='$jabatan', `status`='$status', `log_update`= NOW() WHERE id_projek = '$rid'";

    //     $sql = $this->db->query($query);

    //     $query = "UPDATE t_projekprofil AS Table_A, (SELECT a.id_projek, concat(LPAD(a.kategori,2,0),'-',LPAD(a.sektor,2,0),'-', LPAD(a.id_projek, 3, '0')) as act_code FROM `t_projekprofil` a WHERE a.id_projek = $rid) AS Table_B SET Table_A.nomor_projek = Table_B.act_code WHERE Table_A.id_projek = Table_B.id_projek AND Table_A.id_projek = $rid";

    //     $sql = $this->db->query($query);

    //     $sql = "UPDATE `t_subsektor_ln` SET `id_sektor`='$sektor',`id_subsektor`='$subsektor',`nama_lainnya`='$subsektorln' WHERE id_projek = '$rid'";
    //     $query = $this->db->query($sql);

    //     $sql = "DELETE FROM `t_user_kategori` WHERE `t_user_kategori`.`id_projek` = $rid";
    //     $query = $this->db->query($sql);

    //     $query = "INSERT INTO `t_user_kategori`(`id_projek`, `id_kategori`, `bumn_text`, `bumd_text`, `lainnya_text`, `jenis`, `n_kementerian`, `n_lembaga`, `n_provinsi`, `n_kotakabu`) VALUES ('$rid',(SELECT kategori FROM t_projekprofil WHERE id_projek = $rid),'$bumn_text','$bumd_text','$lainnya_text', '$jenis', '$n_kementerian', '$n_lembaga', '$n_provinsi', '$n_kotakabu')";

    //     $sql = $this->db->query($query);

    //     return $rid;
    // }


    // public function viewassesment(){

	// 	$sql = "SELECT * FROM `t_assessment`";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
    // }


    // public function getrespon($idp){

	// 	$sql = "SELECT * FROM `t_skor` WHERE id_projek = '$idp' AND respon is not NULL AND respon != ''";
	// 	$query =  $this->db->query($sql)->result();
				
	// 	return $query;
    // }

    // public function updatestatus_profil($addprof){

    //     $id_projek = addslashes($addprof['id_projek']);
    //     $status = addslashes($addprof['status']);

    //     $sql = "UPDATE `t_projekprofil` SET status= '$status' WHERE id_projek = '$id_projek'";
    //     $query =  $this->db->query($sql);
                
    //     return $query;

    // }

    // private function _uploadImage()
    // {
    //     $config['upload_path']          = './upload/product/';
    //     $config['allowed_types']        = 'gif|jpg|png|pdf';
    //     $config['file_name']            = 'testnama';
    //     $config['overwrite']            = true;
    //     $config['max_size']             = 1024; // 1MB
    //     // $config['max_width']            = 1024;
    //     // $config['max_height']           = 768;

    //     $this->load->library('upload', $config);

    //     if ($this->upload->do_upload('image')) {
    //         return $this->upload->data("file_name");
    //     }
        
    //     return "default.jpg";
    // }

    // public function nextcomplete($data){

    //     $id_projek = addslashes($data['id_projek']);
    //     $status = addslashes($data['status']);

    //     if ( $status != '' )
    //     {
    //         $sql = "UPDATE `t_projekprofil` SET status= '$status' WHERE id_projek = '$id_projek'";
    //         $query =  $this->db->query($sql);
    //     }

    //     if ( isset($data[3]) )
    //     {
    //         $sql = "UPDATE `t3` SET upload= '$data[3]' WHERE id_projek = '$id_projek'";
    //         $query =  $this->db->query($sql);
    //     }

    //     if ( isset($data[4]) )
    //     {
    //         $sql = "UPDATE `t4` SET upload= '$data[4]' WHERE id_projek = '$id_projek'";
    //         $query =  $this->db->query($sql);
    //     }

    //     if ( isset($data[7]) )
    //     {
    //         $sql = "UPDATE `t7` SET upload= '$data[7]' WHERE id_projek = '$id_projek'";
    //         $query =  $this->db->query($sql);
    //     }

    //     return $query;

    // }

    // function uploaduser($file, $id){
    //     $sql = "UPDATE `t_user` SET `foto`= '".$file['foto']."' WHERE id_user = $id";
    //     $query = $this->db->query($sql);
    //     return true;
    // }

    // function updatefile1($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '".$file['upload']."' WHERE nomor_urut = 3 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile2($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload1`= '".$file['upload']."' WHERE nomor_urut = 3 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile3($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload2`= '".$file['upload']."' WHERE nomor_urut = 3 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile4($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '".$file['upload']."' WHERE nomor_urut = 5 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile5($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload1`= '".$file['upload']."' WHERE nomor_urut = 5 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile6($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload2`= '".$file['upload']."' WHERE nomor_urut = 5 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile7($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '".$file['upload']."' WHERE nomor_urut = 6 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile8($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '".$file['upload']."' WHERE nomor_urut = 7 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile9($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload1`= '".$file['upload']."' WHERE nomor_urut = 7 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile10($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload2`= '".$file['upload']."' WHERE nomor_urut = 7 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile11($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload3`= '".$file['upload']."' WHERE nomor_urut = 7 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }


    // function updatefile12($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload4`= '".$file['upload']."' WHERE nomor_urut = 7 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile13($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '".$file['upload']."' WHERE nomor_urut = 8 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile14($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload1`= '".$file['upload']."' WHERE nomor_urut = 8 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile15($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload2`= '".$file['upload']."' WHERE nomor_urut = 8 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile16($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload3`= '".$file['upload']."' WHERE nomor_urut = 8 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile17($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload4`= '".$file['upload']."' WHERE nomor_urut = 8 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile18($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '".$file['upload']."' WHERE nomor_urut = 9 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile19($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '".$file['upload']."' WHERE nomor_urut = 13 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }


    // function updatefile20($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload1`= '".$file['upload']."' WHERE nomor_urut = 13 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile21($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload2`= '".$file['upload']."' WHERE nomor_urut = 13 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile22($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload3`= '".$file['upload']."' WHERE nomor_urut = 13 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile23($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '".$file['upload']."' WHERE nomor_urut = 14 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile24($file, $id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '".$file['upload']."' WHERE nomor_urut = 15 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error1($id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '' WHERE nomor_urut = 3 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    //    function updatefile1_error2($id){
    //     $sql = "UPDATE `t_skor` SET `upload1`= '' WHERE nomor_urut = 3 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error3($id){
    //     $sql = "UPDATE `t_skor` SET `upload2`= '' WHERE nomor_urut = 3 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error4($id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '' WHERE nomor_urut = 5 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error5($id){
    //     $sql = "UPDATE `t_skor` SET `upload1`= '' WHERE nomor_urut = 5 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error6($id){
    //     $sql = "UPDATE `t_skor` SET `upload2`= '' WHERE nomor_urut = 5 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error7($id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '' WHERE nomor_urut = 6 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error8($id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '' WHERE nomor_urut = 7 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error9($id){
    //     $sql = "UPDATE `t_skor` SET `upload1`= '' WHERE nomor_urut = 7 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error10($id){
    //     $sql = "UPDATE `t_skor` SET `upload2`= '' WHERE nomor_urut = 7 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error11($id){
    //     $sql = "UPDATE `t_skor` SET `upload3`= '' WHERE nomor_urut = 7 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }


    // function updatefile1_error12($id){
    //     $sql = "UPDATE `t_skor` SET `upload4`= '' WHERE nomor_urut = 7 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error13($id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '' WHERE nomor_urut = 8 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error14($id){
    //     $sql = "UPDATE `t_skor` SET `upload1`= '' WHERE nomor_urut = 8 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error15($id){
    //     $sql = "UPDATE `t_skor` SET `upload2`= '' WHERE nomor_urut = 8 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error16($id){
    //     $sql = "UPDATE `t_skor` SET `upload3`= '' WHERE nomor_urut = 8 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error17($id){
    //     $sql = "UPDATE `t_skor` SET `upload4`= '' WHERE nomor_urut = 8 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error18($id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '' WHERE nomor_urut = 9 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error19($id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '' WHERE nomor_urut = 13 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }


    // function updatefile1_error20($id){
    //     $sql = "UPDATE `t_skor` SET `upload1`= '' WHERE nomor_urut = 13 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error21($id){
    //     $sql = "UPDATE `t_skor` SET `upload2`= '' WHERE nomor_urut = 13 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error22($id){
    //     $sql = "UPDATE `t_skor` SET `upload3`= '' WHERE nomor_urut = 13 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error23($id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '' WHERE nomor_urut = 14 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    // function updatefile1_error24($id){
    //     $sql = "UPDATE `t_skor` SET `upload`= '' WHERE nomor_urut = 15 AND id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }


    // function updatefileprofil($id){
    //     $sql = "UPDATE `t_projekprofil` SET `status`= '3' WHERE id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }

    //  function updatefileprofil_error($id){
    //     $sql = "UPDATE `t_projekprofil` SET `status`= '2' WHERE id_projek = $id";

    //     $query = $this->db->query($sql);

    //     return true;
    // }
}