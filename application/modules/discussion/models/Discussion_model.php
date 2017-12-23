<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discussion_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
  }

  /**
   * Get Username Published (Dates)
   * Get getRankinfo
   */

   public function getUsernameID($idlink)
   {
       $query = $this->db->query("SELECT * FROM ac_discussion_thread WHERE id= '$idlink'");
       foreach ($query->result() as $row)
       {
         $username =  $row->author;
         return $this->db->query("SELECT * FROM ac_users WHERE username= '$username'");
       }
   }

   public function getRanked($idlink)
   {
     $rank = $this->db->query("SELECT * FROM ac_discussion_thread WHERE id= '$idlink'");
     foreach ($rank->result() as $row)
     {
       $username =  $row->author;
       return $this->db->query("SELECT * FROM ac_ranks WHERE username = '$username'");
     }
   }

  /**
   * Get CATEGORY
   */

   public function getCategory()
   {
     return $this->db->query("SELECT * FROM ac_discussion_category");
   }

   /**
    * Last ten discuss
    */

    public function lastest()
    {
      return $this->db->query("SELECT * FROM ac_discussion ORDER BY date DESC LIMIT 10");
    }

  /**
   * Get id forums
   */

   public function getThreadId($idcat)
   {
     return $this->db->query("SELECT * FROM ac_discussion WHERE category = '$idcat'");
   }


   /**
    * Get Category id
    */

    public function getIdCategory($idcat)
    {
      return $this->db->query("SELECT category FROM ac_discussion_category WHERE id = '$idcat'");
    }


    /**
     * Get Thread and Reply fuctions
     * $id = value
     * $cat = value
     */

     public function getThread($idlink)
     {
      return $this->db->query("SELECT * FROM ac_discussion_thread WHERE id = '".$idlink."'");
     }

     public function getReplies($idlink)
     {
        return $this->db->query("SELECT * FROM ac_discussion_replies WHERE id_thread = '$idlink'");
     }

    /**
     * Publish Discussion
     */




     /**
      * Publish comment
      */

      public function addReply($thread, $category)
      {
        if (isset($_POST['replie_send']))
        {
            if (!empty($_POST['msg']))
            {


                $this->db->query("INSERT INTO ac_discussion_replies (id_thread, msg, author, category, date) VALUES()");
            }

      }
      }

      /**
       * Get Comments by ID
       */
}
