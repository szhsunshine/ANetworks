<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discussion_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
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

   public function getThreadId($cat)
   {
     return $this->db->query("SELECT * FROM ac_discussion WHERE category = '$cat'");
   }


   /**
    * Get Category id
    */

    public function getIdCategory($cat)
    {
      return $this->db->query("SELECT category FROM ac_discussion_category WHERE id = '$cat'");
    }


    /**
     * Get Thread and Reply fuctions
     * $id = value
     * $cat = value
     */

     public function getThread($thread)
     {
      $thread = $_GET['thread'];
      return $this->db->query("SELECT * FROM ac_discussion_thread WHERE id = '$thread'");
     }

     public function getReplies($id)
     {
        return $this->db->query("SELECT category FROM ac_discussion_comments WHERE thread = '$id'")->num_rows();
     }

    /**
     * Publish Discussion
     */




     /**
      * Publish comment
      */

      public function addReply($thread, $category)
      {
        
      }

      /**
       * Get Comments by ID
       */
}
