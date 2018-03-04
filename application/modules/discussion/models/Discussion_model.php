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
     return $this->db->select('*')
     ->where('typef', '0')
     ->get('ac_discussion_category');
   }

   /**
    *  Get Category Father forums
    */
    public function getCategorys($idfather)
    {
      return $this->db->where('typef', '1')
              ->where('idforums', $idfather)
              ->get('ac_discussion_category');
    }

    /**
      * Function GetSubforums
      *
    */

    /* Old function Build Nexus 4/3/2018
    public function GetSubforums($idfather)
    {
      return $this->db->where('idfather', $idfather)
              ->get('ac_discussion_category');
    }
    */

    public function GetSubforums($idfather)
    {
      return $this->db->where('idforums', $idfather)
            ->where('typef', '2')
            ->get('ac_discussion_category');
    }

    /**
     * Count Threads in category
     */
     public function counThreads($count)
     {
       return $this->db->where('id_cat', $count)
              ->get('ac_discussion_thread')->num_rows();
     }
     /**
      * Count Post in category
      */
      public function counPost($count)
      {
        return $this->db->where('category', $count)
               ->get('ac_discussion_replies')->num_rows();
      }
      /**
       * Last post
       */
       public function lastPost($cat)
       {
         return $this->db->where('id_cat', $cat)
                ->order_by('date', 'DESC')
                ->limit(1)
                ->get('ac_discussion_thread');
       }

       /**
        * Online or Offline
        */

        public function isOnline()
        {
          return $this->db->where('online', 1)
                  ->get('ac_users');
        }

        /**
          * Rank forum (beta)
          */

        public function userRanked()
        {
          $id = $this->session->userdata('ac_sess_id');
          return $this->db->where('id', $id)
                  ->get('ac_users');
        }

        public function user_moderator()
        {

        }

        /**
          * Groups forums (beta)
          */

          public function userGroups()
          {
            return $this->db->get('ac_users_groups');
          }


       /**
        * Functions Topic display
        * Obtain list topics with category = Complete
        */
        public function getTopics($idtopic)
        {
          return $this->db->where('id_cat', $idtopic)
                  ->order_by('date', 'DESC')
                  ->where('pinned', 'false')
                  ->get("ac_discussion_thread");
        }

        public function getTopicsPinned($idtopic)
        {
          return $this->db->where('id_cat', $idtopic)
                  ->order_by('date', 'DESC')
                  ->where('pinned', 'true')
                  ->get("ac_discussion_thread");
        }

        public function counReply($topic)
        {
          return $this->db->where('id_thread', $topic)
                ->get('ac_discussion_replies')->num_rows();
        }
        public function lastReply($topic)
        {
          return $this->db->where('id_thread', $topic)
                ->order_by('date', 'DESC')
                ->limit(1)
                ->get('ac_discussion_replies');
        }
        public function categoryName($idtopic)
        {
          return $this->db->where('id', $idtopic)
                ->get('ac_discussion_category');
        }

        public function addPost($idtopic, $author, $msg, $title)
        {
          if (isset($_POST['button_send_topic']))
          {
              if (!empty($_POST['msg']))
              {
                $data = array(
                  'id_cat' => $idtopic,
                  'title' => $title,
                  'msg' => $msg,
                  'author' => $author,
                  'pinned' => 'false',
                  'date' => $this->m_data->getTimestamp()
                );
                $this->db->insert('ac_discussion_thread', $data);
                echo '<div class="alert alert-dismissable alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                  <h4>'. $this->lang->line('forumsaddthread_head') .'</h4>
                  <p>'. $this->lang->line('forumsaddthread') .'</a></p>
                  </div>';

                  echo '<script>
                  setTimeout(function () {
                    window.location.href = "'. base_url() .'forums/topic/'. $idtopic .'";
                  }, 3000);
                  </script>';
              }
        }
        }

        public function replyPost($idlink, $author, $msg)
        {
          if (isset($_POST['button_send_reply']))
          {
              if (!empty($_POST['msg']))
              {
                  $query = $this->db->where('id', $idlink)
                          ->get('ac_discussion_thread');
                  foreach ($query->result() as $row)
                  {
                  $category = $row->id_cat;

                  $replies = array(
                    'id_thread' => $idlink,
                    'category' => $category,
                    'msg' => $msg,
                    'author' => $author,
                    'date' => $this->m_data->getTimestamp()
                  );
                  $this->db->insert('ac_discussion_replies', $replies);

                  ## Reply success
                  echo '<div class="alert alert-dismissable alert-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4>'. $this->lang->line('forumsaddreply_head') .'</h4>
                    <p>'. $this->lang->line('forumsaddreply') .'</a></p>
                    </div>';
                    echo '<script>
                    setTimeout(function () {
                      window.location.href = "'. base_url() .'forums/thread/'. $idlink .'";
                    }, 3000);
                    </script>';
                }
              }
        }
        }
        /**
         * Functions thread display
         */
           public function getUsernameID($idlink)
           {
              $query = $this->db->where('id', $idlink)
                    ->get('ac_discussion_thread');
               foreach ($query->result() as $row)
               {
                 $username =  $row->author;
                 return $this->db->where('username', $username)
                        ->get('ac_users');
               }
           }
           public function getRanked($idlink)
           {
             $rank = $this->db->where('id', $idlink)
                    ->get('ac_discussion_thread');
             foreach ($rank->result() as $row)
             {
               $username =  $row->author;
               return $this->db->where('username', $username)
                    ->get('ac_ranks');
             }
           }
           public function categoryById($idlink)
           {
             $query = $this->db->where('id', $idlink)
                  ->get('ac_discussion_thread');
             foreach ($query->result() as $row)
             {
               $category =  $row->id_cat;
               return $this->db->where('id', $idlink)
                  ->get('ac_discussion_category');
             }
           }
           public function threadById($idlink)
           {
             return $this->db->where('id', $idlink)
                    ->get('ac_discussion_thread');
           }

           /**
           * Get Category id
           */
           public function getIdCategory($idcat)
           {
             return $this->db->where('id', $idcat)
                  ->get('ac_discussion_category');
           }
           /**
           * Get Thread and Reply fuctions
           * $idlink = Array locate in controllers/discussion.php
           */
           public function getThread($idlink)
           {
             return $this->db->where('id', $idlink)
              ->get('ac_discussion_thread');
           }
           public function getReplies($idlink)
           {
             return $this->db->where('id_thread', $idlink)
                   ->order_by('date', 'DESC')
                    ->get('ac_discussion_replies');
           }



           /**
            * Mod Functions
            * Closed thread
            */

            public function reportPost($idlink, $author, $msg)
            {
              if (isset($_POST['report_reply']))
              {
                      $report = array(
                        'id_thread' => $idlink,
                        'msg' => $msg,
                        'username' => $author,
                      );
                      $this->db->insert('ac_discussion_reports', $report);

                      ## Reply success
                      echo '<div class="alert alert-dismissable alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                        <h4>User reported</h4>
                        <p>Send report to staff forums moderator.</a></p>
                        </div>';
                        echo '<script>
                        setTimeout(function () {
                          window.location.href = "'. base_url() .'forums/thread/'. $idlink .'";
                        }, 3000);
                        </script>';
                  }
            }
            public function closeThread($idlink)
            {
              $access = $this->session->userdata('ac_sess_rank') != 2;

              if ($access == 2)
              {
              return $this->db->query("UPDATE ac_discussion_thread SET status = 0 WHERE id = '$idlink'");
              } else {

              }
            }

            public function deleteThread($idlink)
            {

            }

            public function pinThread($idlink)
            {

            }





            /**
             * User functions
             */

             public function CountPost($username)
             {
               return $this->db->query("SELECT * FROM ac_users WHERE username = '$username'");
             }

}
