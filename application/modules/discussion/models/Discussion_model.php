<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discussion_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
  }

  /**
   * Functions Forum Display
   * Get CATEGORY
   */

   public function getCategoryFather()
   {
       return $this->db->query("SELECT * FROM ac_discussion_category WHERE isfather = 1");
   }

   /**
    *  Get Category Father forums
    */

    public function getCategorys($idfather)
    {
      return $this->db->query("SELECT * FROM ac_discussion_category WHERE idfather = '$idfather'");
    }


    /**
     * Count Threads in category
     */

     public function counThreads($count)
     {
       return $this->db->query("SELECT * FROM ac_discussion_thread WHERE id_cat = '$count'")->num_rows();
     }

     /**
      * Count Post in category
      */

      public function counPost($count)
      {
        return $this->db->query("SELECT * FROM ac_discussion_replies WHERE category = '$count'")->num_rows();
      }

      /**
       * Last post
       */

       public function lastPost($cat)
       {
         return $this->db->query("SELECT * FROM ac_discussion_thread WHERE id_cat = '$cat' ORDER BY date DESC LIMIT 1");
       }


       /**
        * Functions Topic display
        * Obtain list topics with category = Complete
        */

        public function getTopics($idtopic)
        {
          return $this->db->query("SELECT * FROM ac_discussion_thread WHERE id_cat = '$idtopic' ORDER BY date DESC");
        }

        public function counReply($topic)
        {
          return $this->db->query("SELECT * FROM ac_discussion_replies WHERE id_thread = '$topic'")->num_rows();
        }

        public function lastReply($topic)
        {
        return $this->db->query("SELECT * FROM ac_discussion_replies WHERE id_thread = '$topic' ORDER BY date DESC LIMIT 1");
        }

        public function categoryName($idtopic)
        {
          return $this->db->query("SELECT * FROM ac_discussion_category WHERE id = '$idtopic'");
        }

        /**
         * Functions thread display
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

           public function categoryById($idlink)
           {
             $query = $this->db->query("SELECT id_cat FROM ac_discussion_thread WHERE id= '$idlink'");
             foreach ($query->result() as $row)
             {
               $category =  $row->id_cat;
               return $this->db->query("SELECT * FROM ac_discussion_category WHERE id = '$category'");
             }
           }

           public function threadById($idlink)
           {
             return $this->db->query("SELECT * FROM ac_discussion_thread WHERE id= '$idlink'");
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
           * $idlink = Array locate in controllers/discussion.php
           */

           public function getThread($idlink)
           {
             return $this->db->query("SELECT * FROM ac_discussion_thread WHERE id = '".$idlink."'");
           }

           public function getReplies($idlink)
           {
             return $this->db->query("SELECT * FROM ac_discussion_replies WHERE id_thread = '$idlink'");
           }


}
