<?php
class Login_model extends CI_Model{
     
    //cek nim dan password mahasiswa
    function auth_user($username,$password){
        $query=$this->db->query("SELECT * FROM m_user WHERE username='$username' AND password= md5('$password') LIMIT 1");
        return $query;
    }

    function auth_ldap($username){
        $query=$this->db->query("SELECT * FROM m_user WHERE username='$username' LIMIT 1");
        return $query;
    }

    // function insert_regist($regist){

    //     $nik =addslashes($regist['nik']);
    //     $foto =addslashes($regist['foto']);
    //     $nama_user =addslashes($regist['nama_user']);
    //     $instansi = addslashes($regist['instansi']);
    //     $jabatan = addslashes($regist['jabatan']);
    //     $email = addslashes($regist['email']);
    //     $telepon = addslashes($regist['telepon']);
    //     $username = addslashes($regist['username']);
    //     $password = addslashes($regist['password']);


    //     $sql = $this->db->query("INSERT INTO `t_user`(`nomor_user`, `nik`, `foto`, `nama_user`, `instansi`, `jabatan`, `email`, `telepon`, `username`, `password`, `log_create`, `log_update`) VALUES ( '$nomor_user', '$nik', '$foto', '$nama_user','$instansi','$jabatan','$email','$telepon','$username',md5('$password'),NOW(), NOW())");


    //     $nomor_user = 'SIP'.date('dmY').$this->db->insert_id();
        
    //     $rid = $this->db->insert_id();

    //     $sql = $this->db->query("UPDATE t_user SET nomor_user = '$nomor_user' WHERE id_user = '$rid'");

    //     return $sql;

    // }


    function update_status($user){
        $sql = "UPDATE `m_user` SET `status`=1, created_date = NOW() WHERE username = '$user'";
        $query = $this->db->query($sql);

        return $query;
    }

    function update_fpassword($addfp){

        $sql = "UPDATE `m_user` SET password = md5('".$addfp['password']."'), `status`='".$addfp['status']."', created_date = NOW() WHERE email = '".$addfp['email']."'";
        // var_dump($sql);exit;
        
        $query = $this->db->query($sql);

        return $query;
    }

    function auth_email($addfp){
        $query=$this->db->query("SELECT * FROM m_user WHERE email = '".$addfp['email']."' LIMIT 1")->result();
        // var_dump($query);exit;
        return $query;
    }
	
	function checknotification($id){
        $query=$this->db->query("select * from t_notification where notif_date=curdate() and notif_flag=1 and notif_id=".$id);
        return $query;
    }
	
	function updatenotification(){
        $sql = "update t_notification set notif_date=curdate()";         
        $query = $this->db->query($sql);
        return $query;
    }
	
	function sendnotification(){
        $query=$this->db->query("select c.division_id,concat(c.tempo,'-',DATE_FORMAT(curdate(), '%M-%Y')) tempo,d.division_name,u.display_name,u.email,c.no_billing from t_creditcard c, m_division d, m_user u where c.division_id=d.division_id and c.id_user=u.id_user and (c.jatah > 1 or (c.jatah=1 and c.target_submission<=day(curdate())))");
        return $query;
    }

}