<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addon_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getExpansion($value)
    {
        switch($value)
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

    public function grabExpansion($value)
    {
        return $this->db->query("SELECT * FROM addons WHERE expansion = '$value' AND status =2");
    }

    public function mostDownloaded($value)
    {
        return $this->db->query("SELECT * FROM addons WHERE expansion = '$value' AND status =2 ORDER BY downloads DESC LIMIT 10");
    }

    public function getInformation($id)
    {
        return $this->db->query("SELECT * FROM addons WHERE id = '$id' ORDER BY downloads DESC LIMIT 10");
    }

    public function getFileId($id)
    {
        return $this->db->query("SELECT * FROM files WHERE id = '$id'");
    }

    public function searchAddons($value)
    {
        $name = $_GET['name'];
        return $this->db->query("SELECT * FROM addons WHERE addon_name = '$name' and expansion = '$value' ORDER BY downloads DESC LIMIT 10");
    }
}
