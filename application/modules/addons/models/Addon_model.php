<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addon_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getExpansion($idexpansion)
    {
        switch($idexpansion)
        {
            case 'vanilla':
                return 1;
                break;
            case 'tbc':
                return 2;
                break;
            case 'wtlk':
                return 3;
                break;
            case 'cata':
                return 4;
                break;
            case 'mop':
                return 5;
                break;
            case 'wod':
                return 6;
                break;
            case 'legion':
                return 7;
                break;
        }
    }


    public function expansionSelected($expansion)
    {
      return $this->db->query("SELECT * FROM ac_expansion WHERE id = '$expansion' AND status =1");
    }

    public function grabExpansion($expansion)
    {
        return $this->db->query("SELECT * FROM ac_addons WHERE expansion = '$expansion' AND status =2");
    }

    public function getCategory()
    {
      return $this->db->query("SELECT * FROM ac_category");
    }

    public function mostDownloaded($value)
    {
        return $this->db->query("SELECT * FROM ac_addons WHERE expansion = '$value' AND status =2 ORDER BY downloads DESC LIMIT 10");
    }

    public function getInformation($id)
    {
        return $this->db->query("SELECT * FROM ac_addons WHERE id = '$id' ORDER BY downloads DESC LIMIT 10");
    }

    public function getFileId($id)
    {
        return $this->db->query("SELECT * FROM ac_files WHERE id = '$id'");
    }

    public function searchAddons($value)
    {
        $name = $_GET['name'];
        return $this->db->query("SELECT * FROM ac_addons WHERE addon_name = '$name' and expansion = '$value' ORDER BY downloads DESC LIMIT 10");
    }

    public function getExternalDownload($id)
    {
        return $this->db->query("SELECT * FROM ac_external_download WHERE addon_id = '$id'");
    }

    public function download($id)
    {
      if (isset($_POST['button_get']))
        {
      $query = $this->db->query("SELECT * FROM ac_addons WHERE id= '$id'");
      foreach ($query->result() as $row)
      {
        $downloads = $row->downloads;
        $file_id = $row->file_id;
        $this->db->query("UPDATE ac_addons SET downloads = ($downloads+1) WHERE id = '$id'");
        $query2 = $this->db->query("SELECT * FROM ac_files WHERE file_id = '$file_id'");
        foreach ($query2->result() as $row2) {
          $file_url = $row2->file_url;
          echo '<script>setTimeout(function () {
            window.location.href = "'. $this->config->item('base_url') .'/'. $row2->file_url .'";
          }, 4000);</script>';
          echo '<div class="alert alert-dismissable alert-info">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Downloading in four secconds... </strong> If the download doesn´t happen automatically, click on the following  <a href="'.$this->config->item('base_url').'/'.$row2->file_url.'" class="alert-link"> link</a>.
</div>';
        }
      }
    }

    }

}
