<?php

if(!defined('BASEPATH'))exit('No direct script access allowed');

class Fashion_admin_model extends CI_Model
{
    
    private $DB_state = "states";
    private $DB_city = "state_cities";
    private $DB_product_fas = "products_fashion";
    private $DB_cat_fas = "categories_fashion";
    private $DB_prd_qty_c_s= "product_qty_color_size";
    private $DB_size = "size_tbl";
    private $DB_color = "color_tbl";
    private $DB_nav_fas = "fashionnav";
    private $DB_cat_prd="product_cat_assign";
    private $DB_prd_fashionimg = "productimages";
    
            
    function __construct()
        {
	
            parent::__construct();
            $this->load->model('oye/Session_model'); // call in the session model class
            $this->load->model('oye/Email_model'); // call in the emai;l model class
		
	}
        
    public function generate_random_string($length)
    {
        $characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $randomString = '';
        for($i = 0; $i < $length; $i++){
            $randomString .= $characters[random_int(0,strlen($characters) - 1 )];
        }
        return $randomString;
        //echo $randomString;
    }
    
    
    public function get_allstate() 
    {
        $this->db->select('id,statename')
             ->from($this->DB_state)
             ->where('isdeleted',0);

        $query = $this->db->get();
        return $query->result();
        //return $query->result_array();

    }
    public function get_allcity_where($by_id) 
    {

        $this->db->select('*')
             ->from($this->DB_city)
             ->where('stateid',(int)$by_id)
             ->where('isdeleted',0);

        $query = $this->db->get();
        return $query->result();

    }
    public function get_state_where($by_id) 
    {
        $this->db->select('statename')
             ->from($this->DB_state)
             ->where('id',(int)$by_id);

        $query = $this->db->get();
        return $query->result_array();
        //return $query->result_array();

    }
    public function get_city_where($by_id) 
    {
        $this->db->select('cityname')
             ->from($this->DB_city)
             ->where('id',(int)$by_id);

        $query = $this->db->get();
        return $query->result_array();
        //print("<pre>".print_r($query->result_array(),true)."</pre>");
        //die;

    }
    
    public function _get_parent_nav_by_cate()
        {
            
            $this->db->select('*');
            $this->db->from($this->DB_cat_fas)
                     ->where("categoryparentid ", 0)
                     ->where("status ", 1)
                     ->where("isdeleted ", 0)
                     ->order_by("arrangecategory" , "ASC");
            
            
            $query = $this->db->get();
            $get_nav_cat	= array();
            
            if($query->num_rows() > 0)
            {
                foreach($query->result() as $row)
                    {
                       
                        $get_nav_cat[$row->id]['id']                =   $row->id;
                        $get_nav_cat[$row->id]['slug']              =   $row->slug;
                        $get_nav_cat[$row->id]['categoryname']      =   $row->categoryname;
                        $get_nav_cat[$row->id]['arrangecategory']   =   $row->arrangecategory;
                        $get_nav_cat[$row->id]['categoryparentid']  =   $row->categoryparentid;
                        $get_nav_cat[$row->id]['nav_cate_submenu']  =   $this->get_nav_by_cate_submenu($row->id);// feach data by category from the category_fashion tb 
                           
                    }
            }
            return $get_nav_cat;
            //print("<pre>".print_r($get_nav_cat,true)."</pre>");die;
        }
        
        public function get_nav_by_cate_submenu($by_id)
        {
            $this->db->select('*');
            $this->db->from($this->DB_cat_fas);
            $this->db->where("categoryparentid ", $by_id)
                     ->where("status ", 1)
                     ->where("isdeleted ", 0)
                     ->order_by("arrangecategory" , "ASC")
                     ->order_by("createdat", "DESC");
            
            
            $query = $this->db->get();
            $get_nav_cat	= array();
            
            if($query->num_rows() > 0)
            {
                foreach($query->result() as $row)
                    {
                        
                        $get_nav_cat[$row->id]['id']                =   $row->id;
                        $get_nav_cat[$row->id]['categoryname']      =   $row->categoryname;
                        $get_nav_cat[$row->id]['slug']              =   $row->slug;
                        $get_nav_cat[$row->id]['arrangecategory']   =   $row->arrangecategory;
                        $get_nav_cat[$row->id]['categoryparentid']  =   $row->categoryparentid;
                        $get_nav_cat[$row->id]['submenu_nav']       =   $this->get_nav_by_cate_submenu($row->id);
                        //$get_prd[$row->id]['canaddproduct'] =   $row->canaddproduct;
                    }
            }
            return $get_nav_cat;
        }
    

}



