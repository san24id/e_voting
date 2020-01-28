<?php
class Login_model extends CI_Model{
    //cek nip dan password dosen
    function auth_admin($username,$password){
        $query=$this->db->query("SELECT * FROM t_adminpii WHERE username='$username' AND password=md5('$password') LIMIT 1");
        return $query;
    }
 
    //cek nim dan password mahasiswa
    function auth_user($username,$password){
        $query=$this->db->query("SELECT * FROM t_user WHERE username='$username' AND password= md5('$password') LIMIT 1");
        return $query;
    }

    function auth_ldap($username){
        $query=$this->db->query("SELECT * FROM t_adminpii WHERE username='$username' LIMIT 1");
        return $query;
    }

    function insert_regist($regist){

        $nik =addslashes($regist['nik']);
        $foto =addslashes($regist['foto']);
        $nama_user =addslashes($regist['nama_user']);
        $instansi = addslashes($regist['instansi']);
        $jabatan = addslashes($regist['jabatan']);
        $email = addslashes($regist['email']);
        $telepon = addslashes($regist['telepon']);
        $username = addslashes($regist['username']);
        $password = addslashes($regist['password']);


        $sql = $this->db->query("INSERT INTO `t_user`(`nomor_user`, `nik`, `foto`, `nama_user`, `instansi`, `jabatan`, `email`, `telepon`, `username`, `password`, `log_create`, `log_update`) VALUES ( '$nomor_user', '$nik', '$foto', '$nama_user','$instansi','$jabatan','$email','$telepon','$username',md5('$password'),NOW(), NOW())");


        $nomor_user = 'SIP'.date('dmY').$this->db->insert_id();
        
        $rid = $this->db->insert_id();

        $sql = $this->db->query("UPDATE t_user SET nomor_user = '$nomor_user' WHERE id_user = '$rid'");

        return $sql;

    }


    function update_status($user){
        $sql = "UPDATE `t_user` SET `status`=1, log_update = NOW() WHERE username = '$user'";
        $query = $this->db->query($sql);

        return $query;
    }

    function update_fpassword($addfp){

        $sql = "UPDATE `t_user` SET password = md5('".$addfp['password']."'), `status`='".$addfp['status']."', log_update = NOW() WHERE email = '".$addfp['email']."'";
        $query = $this->db->query($sql);

        return $query;
    }

    function auth_email($addfp){
        $query=$this->db->query("SELECT * FROM t_user WHERE email = '".$addfp['email']."' LIMIT 1")->result();
        return $query;
    }

}