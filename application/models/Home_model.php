<?php
error_reporting(0);
class Home_model extends CI_Model{   

    function getList() {
      $sql = "SELECT * FROM t_question ORDER BY id_question DESC";

      $query = $this->db->query($sql)->result();
      return $query;
    } 
    
    function getQuestion() {
      $sql = "SELECT * FROM t_question WHERE isactive='1' ORDER BY id_question DESC LIMIT 1";

      $query = $this->db->query($sql)->result();
      return $query;
    } 

    function getListAttandance() {
      $sql = "SELECT a.*,b.question FROM t_vote as a JOIN t_question as b on a.id_question=b.id_question";
      $query = $this->db->query($sql)->result();
      return $query;
    }

    public function updatestats($upd){
      $sql = "UPDATE t_question SET isactive='".$upd['isactive']."' WHERE id_question='".$upd['id_question']."'"; 
      
      $query = $this->db->query($sql);
      // var_dump($sql);exit;

      return $query;
    }

    function addvoter($add){
      $sql = "INSERT INTO t_vote (nama, email, pin, choice, id_question) VALUES ('".$add['nama']."','".$add['email']."',
              '".$add['pin']."','".$add['choice']."','".$add['id_question']."')";

      $query = $this->db->query($sql);

      return $query;
    }

    function addquestion($add){
      $sql = "INSERT INTO t_question (jenis, question, isactive) VALUES ('".$add['jenis']."','".$add['question']."','".$add['isactive']."')";

      $query = $this->db->query($sql);

      return $query;
    }

    public function updquestion($upd){
      $sql = "UPDATE t_question SET jenis='".$upd['jenis']."', question='".$upd['question']."', isactive='".$upd['isactive']."' WHERE id_question='".$upd['id_question']."'"; 
      
      $query = $this->db->query($sql);
      // var_dump($query);exit;

      return $query;
    }

    public function getform($id_question) {
      $sql = "SELECT * FROM t_question WHERE id_question = '$id_question'";
              
      $query = $this->db->query($sql)->result();
      return $query;
    }

}