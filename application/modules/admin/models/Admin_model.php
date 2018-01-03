<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show in Admin Dashboard
     * 100% Completed
     */

    public function getAddons()
    {
        return $this->db->query("SELECT * FROM ac_addons")->num_rows();
    }

    public function getUsers()
    {
      return $this->db->query("SELECT * FROM ac_users")->num_rows();
    }

    public function getLogs()
    {
      return $this->db->query("SELECT * FROM ac_logs ORDER BY time DESC LIMIT 8");
    }

    public function getLastAddons()
    {
      return $this->db->query("SELECT * FROM ac_addons ORDER BY updated DESC LIMIT 8");
    }


    public function getStatsForums()
    {
      return $this->db->query("SELECT * FROM ac_discussion_thread")->num_rows();
    }

     /**
      * Functions news
      * 30% Completed
      */

      public function getNewsDates()
      {
        return $this->db->query("SELECT * FROM ac_news");
      }

      public function updateNew($idnew)
      {

      }

      /**
       * Functions Forums
       * 0% Completed
       */


       /**
        * Functions config site
        * 50% Completed
        */

        public function getConfigDates()
        {
          return $this->db->query("SELECT * FROM ac_config");
        }

        public function updateConfig()
        {


        }

}
