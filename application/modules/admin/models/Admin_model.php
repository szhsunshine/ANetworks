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
      return $this->db->query("SELECT * FROM ac_logs ORDER BY time DESC LIMIT 5");
    }

    public function getLastAddons()
    {
      return $this->db->query("SELECT * FROM ac_addons ORDER BY updated DESC LIMIT 6");
    }


    public function getStatsForums()
    {
      return $this->db->query("SELECT * FROM ac_discussion_thread")->num_rows();
    }

    public function getNews()
    {
      return $this->db->query("SELECT * FROM ac_news")->num_rows();
    }


    public function getVersions()
    {
          return $this->db->query("SELECT * FROM ac_version")->num_rows();
    }
    public function getTitleNews($idnews)
    {
      return $this->db->query("SELECT news_title FROM ac_news WHERE id='$idnews'");
    }
     /**
      * Functions news
      * 100% Completed
      */

      public function getNewsDates()
      {
        return $this->db->query("SELECT * FROM ac_news");
      }

      public function deleteNew($id)
      {
        return $this->db->query("DELETE FROM ac_news WHERE id='$id'");
      }



      public function getNewId($idnews)
      {
        return $this->db->query("SELECT * FROM ac_news WHERE id='$idnews'");
      }

      public function editNews($idnews, $title, $content)
      {
        return $this->db->query("UPDATE ac_news SET news_title = '$title', news_content = '$content' WHERE id='$idnews'");
      }

      public function createNews($title, $content, $author, $date)
      {
        $data = array(
          'news_title' => $title,
          'news_content' => $content,
          'news_author' => $author,
          'post_date' => $date,
        );
        $this->db->insert('ac_news', $data);
      }

      /**
      * Functions Game Version
      * 100% completed
      */

      public function versionSelected()
      {
        return $this->db->get('ac_version');
      }

      public function getVersion($idversion)
      {
        return $this->db->where('id', $idversion)
          ->get('ac_version');
      }

      public function addSupportedGV($gv)
      {
        $data = array(
          'gameversion' => $gv,
        );
        $this->db->insert('ac_version', $data);
      }

      public function editSupportedGV($idversion, $gv)
      {
        return $this->db->query("UPDATE ac_version SET gameversion = '$gv'  WHERE id='$idversion'");
      }

      public function deleteSupportedGV($idversion)
      {
        return $this->db->query("DELETE FROM ac_version WHERE id='$idversion'");
      }

      /**
      * Functions users
      * 5% Completed
      */

      public function getUsersDates()
      {
        return $this->db->get('ac_users');
      }

      /**
       * Functions Forums
       * 0% Completed
       */


      public function getForumsList() // No Father category's
       {
         return $this->db->where('isfather', '0')
              ->get('ac_discussion_category');
       }

       public function getCategory()
       {
         return $this->db->where('isfather', '1')
              ->get('ac_discussion_category');
       }

       public function GroupAdd()
       {
           // Comming soon
       }

       public function GroupCreate()
       {
         // Comming soon
       }

       public function GroupDelete($id)
       {
         // Comming soon
       }


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

        /**
        * Functions User
        * User Function -> 10%
        */

        public function userDelete($id)
        {
          $this->db->where('id', $id);
          return $this->db->delete('ac_users');
        }

}
