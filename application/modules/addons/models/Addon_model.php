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


  public function getExpansion($value)
  {
    switch($value)
    {
            case 'vanilla': return 1;
            break;
            case 'tbc': return 2;
            break;
            case 'wtlk': return 3;
            break;
            case 'cata': return 4;
            break;
            case 'mop': return 5;
            break;
            case 'wod': return 6;
            break;
            case 'legion': return 7;
		        break;
	   }

}

  public function grabExpansion($value)
  {
    return $this->db->query("SELECT * FROM addons WHERE expansion = '$value' AND status =2");
  }




}
