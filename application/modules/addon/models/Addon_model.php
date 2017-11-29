<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Addon_model extends CI_Model {


  public function __construct()
  {
    parent::__construct();
  }


  public function mostDownloadedClassic(){
      return $this->db->query("SELECT * FROM addons WHERE expansion = 1 AND status =2 ORDER BY downloads DESC LIMIT 10");
  }

  public function mostDownloadedTbc(){
      return $this->db->query("SELECT * FROM addons WHERE expansion = 2 AND status =2 ORDER BY downloads DESC LIMIT 10");
  }


  public function mostDownloadedTlk(){
      return $this->db->query("SELECT * FROM addons WHERE expansion = 3 AND status =2 ORDER BY downloads DESC LIMIT 10");
  }

  public function mostDownloadedCata(){
      return $this->db->query("SELECT * FROM addons WHERE expansion = 4 AND status =2 ORDER BY downloads DESC LIMIT 10");
  }

  public function mostDownloadedMop(){
      return $this->db->query("SELECT * FROM addons WHERE expansion = 5 AND status =2 ORDER BY downloads DESC LIMIT 10");
  }

  public function mostDownloadedWod(){
      return $this->db->query("SELECT * FROM addons WHERE expansion = 6 AND status =2 ORDER BY downloads DESC LIMIT 10");
  }

  public function mostDownloadedLegion(){
      return $this->db->query("SELECT * FROM addons WHERE expansion = 7 AND status =2 ORDER BY downloads DESC LIMIT 10");
  }


  public function searchAddons($type,$name){

      $type = $_GET['type'];
      $name = $_GET['name'];

      return $this->db->query("SELECT * FROM addons WHERE expansion = '$type' AND addon_name = '$name' ORDER BY downloads DESC LIMIT 10");

  }


}
