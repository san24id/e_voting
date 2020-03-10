<?php
error_reporting(0);
class Dashboard_model extends CI_Model{

    public function payment() {
        $sql = "SELECT * FROM `t_payment`";
                
        $query = $this->db->query($sql)->result();
        return $query;
    }
}