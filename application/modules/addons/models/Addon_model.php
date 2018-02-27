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

    public function versionSelected($version)
    {
      return $this->db->where('id', $version)
              ->get('ac_version');
    }

    public function expansionSelected($expansion)
    {
      return $this->db->where('id', $expansion)
              ->where('status', 1)
              ->get('ac_expansion');
    }

    public function categorySelected($idcategory)
    {
      return $this->db->where('id', $idcategory)
              ->get('ac_category');
    }

    public function grabCategory($idcategory)
    {
        return $this->db->where('category', $idcategory)
                ->get('ac_addons');
    }

    public function grabExpansion($expansion)
    {
        return $this->db->where('expansion', $expansion)
                ->where('status', 2)
                ->get('ac_addons');
    }

    public function getCount()
    {
        return $this->db->where('status', 2)
                ->count_all('ac_addons');
    }

    public function get_current_page_records($limit, $start)
    {
      $this->db->limit($limit, $start);
      $query = $this->db->where('status', 2)
      ->get("ac_addons");

      if ($query->num_rows() > 0)
      {
          foreach ($query->result() as $row)
          {
              $data[] = $row;
          }

          return $data;
      }

      return false;
  }

    public function getCategory()
    {
      return $this->db->get('ac_category');
    }

    public function mostDownloaded($value)
    {
      return $this->db->where('expansion', $value)
              ->where('status', 2)
              ->order_by('downloads', 'DESC')
              ->limit(10)
              ->get('ac_addons');
    }

    public function getInformation($addonid)
    {
      return $this->db->where('id', $addonid)
              ->get('ac_addons');
    }

    public function getFileId($addonid)
    {
        return $this->db->where('id', $addonid)
                ->get('ac_files');
    }

    public function searchAddons($value)
    {
        $name = $_GET['name'];
        return $this->db->query("SELECT * FROM ac_addons WHERE addon_name = '$name' and expansion = '$value' ORDER BY downloads DESC LIMIT 10");
    }

    public function getExternalDownload($addonid)
    {
      return $this->db->where('addon_id', $addonid)
                  ->get('ac_external_download');
    }


    public function getRamdonAddons($addonid)
    {
      $query = $this->db->where('id', $addonid)
              ->get('ac_addons');
      foreach ($query->result() as $row)
      {
        $category = $row->category;
        return $this->db->where('category', $category)
              ->order_by('category', 'RANDOM')
              ->limit(4)
              ->get('ac_addons');
      }

    }

    public function download($addonid)
    {
      if (isset($_POST['button_get']))
        {
      $query = $this->db->where('id', $addonid)
              ->get('ac_addons');
      foreach ($query->result() as $row)
      {
        $downloads = $row->downloads;
        $file_id = $row->file_id;
        $this->db->query("UPDATE ac_addons SET downloads = ($downloads+1) WHERE id = '$addonid'");
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
