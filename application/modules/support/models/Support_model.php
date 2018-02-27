<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function getFAQ()
    {
        return $this->db->query("SELECT * FROM ac_faq");
    }

    public function getFaqId()
    {
        $id = $_GET['id'];
        return $this->db->query("SELECT * FROM ac_faq WHERE id = '$id'");
    }

}
