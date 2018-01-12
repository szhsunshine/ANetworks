<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Plugin system for developpers
 */


class M_plugins extends CI_Model {

  public function __construct()
  	{
  		parent::__construct();
  	}

  /**
   * Enable plugin
   */

  public function plugin_enable()
  {
    return $this->db->query("SELECT * FROM ac_config where id_cnf='5'");
  }


  /**
   * Create pages module
   * Author : Sayghteight
   */


   public function page_info($id)
   {

   }

   public function page_title($id)
   {

   }

   public function page_desc($id)
   {

   }

   /**
    * Widget Last Post
    * Author : Sayghteight
    */

    public function lastforums()
    {
      return $this->db->query("SELECT * FROM ac_config where id_cnf='5'");
    }

    public function lastForumPost()
    {
      return $this->db->query("SELECT * FROM ac_discussion_thread  ORDER BY date DESC LIMIT 10");
    }

}
