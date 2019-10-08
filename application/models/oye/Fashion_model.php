<?php

if(!defined('BASEPATH'))exit('No direct script access allowed');

class Fashion_model extends CI_Model
{
    private $DB_res = "restaurants";
    private $DB_state = "states";
    private $DB_city = "state_cities";
    private $DB_product_fas = "products_fashion";
    private $DB_cat_fas = "categories_fashion";
    private $DB_prd_qty_c_s= "product_qty_color_size";
    private $DB_size_cat = "size_category";
    private $DB_size = "size_tbl";
    private $DB_color = "color_tbl";
    private $DB_nav_fas = "fashionnav";
    private $DB_cat_prd="product_fashion_cate_assign";
    private $DB_prd_fashionimg = "productimages";
    private $DB_ord_details = "orderlistdetails";
    private $DB_ord = "orders";
    private $DB_ord_status = "orderstatus";
    private $DB_address = "accountaddresses";
    private $DB_user = "users";
    private $DB_system_modules = "system_modules";
    private $DB_role_assignments = "role_assignments";
    private $DB_user_roles = "user_roles";
            
    function __construct()
        {
	
            parent::__construct();
            $this->load->model('oye/Session_model'); // call in the session model class
            $this->load->model('oye/Email_model'); // call in the emai;l model class
		
	}
    
    public function _all_sizes($search) 
    {   
        
        $this->db->select(" ".$this->DB_size.".* , ".$this->DB_size_cat.".sizecategory ")->from($this->DB_size);
        $this->db->where("".$this->DB_size.".status", 1);
        $this->db->join( $this->DB_size_cat, " ".$this->DB_size_cat.".id = ".$this->DB_size.".sizecategoryid " );
        
        
        if(isset($search) && !empty($search))
        {
            $this->db->like(" ".$this->DB_size_cat.".sizecategory",$search);
            $this->db->or_like(" ".$this->DB_size.".sizename",$search);
            $this->db->or_like(" ".$this->DB_size.".sizecode",$search);
        }
        $this->db->order_by(" ".$this->DB_size_cat.".sizecategory", 'ASC');
        $this->db->order_by(" ".$this->DB_size.".arrange", 'ASC');
        $this->db->order_by(" ".$this->DB_size.".sizename", 'ASC');
        $this->db->order_by(" ".$this->DB_size.".sizecode", 'ASC');
        
        $query = $this->db->get();
        return $query->result();
        //print("<pre>".print_r($query->result_array(),true)."</pre>");die;
    }
    
    public function _all_sizecategory()
    {
        $this->db->select('*');
        $this->db->from($this->DB_size_cat)
                 ->where("status ", 1);
        $query = $this->db->get()->result();

        return $query;
    }
    
    public function _all_colors($search) 
    {   
        
        $this->db->select(" * ")->from($this->DB_color);
        $this->db->where("status", 1);
        
        if(isset($search) && !empty($search))
        {
            $this->db->like('colorname',$search);
            $this->db->or_like('colorcode',$search);
        }
        $this->db->order_by("colorname", 'ASC');
        $query = $this->db->get();
        return $query->result();
        //print("<pre>".print_r($query->result_array(),true)."</pre>");die;
    }
    
    public function get_state_where($by_id) 
        {
            //$query = $this->db->get_where($this->DB_state, array('id' => (int)$by_id),1);
            //var_dump($query->result());
            //return $query->result();
            
            $this->db->select('statename')
                 ->from($this->DB_state)
                 ->where('isdeleted',0);
            if(isset($by_id) && !empty($by_id))
                {
                    $this->db->where('id',(int)$by_id);
                }
            $query = $this->db->get();
            return $query->result_array();
            //return $query->result_array();
            
        }
    public function get_allstate() 
    {
        $this->db->select('id,statename')
             ->from($this->DB_state)
             ->where('status',1)
             ->where('isdeleted',0);

        $query = $this->db->get();
        return $query->result();
        //return $query->result_array();

    }
    public function get_city_bystate($by_id) 
    {

        $this->db->select('*')
             ->from($this->DB_city)
             ->where('stateid',(int)$by_id)
             ->where('status',1)
             ->where('isdeleted',0);

        $query = $this->db->get();
        return $query->result();

    }
    
    public function get_city_where($by_id) 
        {
            
            $this->db->select('*')
                 ->from($this->DB_city)
                 ->where('id',(int)$by_id);
            
            $query = $this->db->get();
            return $query->result_array();
            
        }
    public function get_user_info ()
    {
        $query = $this->db->get_where($this->DB_user, array(
                                                        'id' => (int)$_SESSION['User_id'],
                                                        'restaurantid' => (int)$_SESSION['rest_id'],
                                                        'isdeleted' =>'0'
                                                            )
                                                        );
        return $query->row();
    }
    public function get_prd_where($by_id) 
        {
            
            $this->db->select('*')
                 ->from($this->DB_product)
                 ->where('id',(int)$by_id);
            
            $query = $this->db->get();
            return $query->result_array();
            
        }
    public function get_color_where($by_id) 
        {
            
            $this->db->select('*')
                 ->from($this->DB_color)
                 ->where('id',(int)$by_id)
                 ->where('status','1');
            
            $query = $this->db->get();
            return $query->result_array();
            
        }
    public function get_size_where($by_id) 
        {
            
            $this->db->select('*')
                 ->from($this->DB_size)
                 ->where('id',(int)$by_id)
                 ->where('status','1');
            
            $query = $this->db->get();
            return $query->result_array();
            
        }


    public function _insertrestaurant($data)
        {
            $this->db->insert($this->DB_res, $data);
            
            if ( $this->db->affected_rows() > 0 )
                {
                    return true;
                }
        }
        
    public function get_restaurant_info($by_id) 
    {
        
        $this->db->select(" ".$this->DB_res.".*  , ".$this->DB_city.".cityname , ".$this->DB_state.".statename")
                 ->from($this->DB_res)
                 ->where(" ".$this->DB_res.".status" ,1)
                 ->where(array(" ".$this->DB_res.".id" => (int)$by_id ," ".$this->DB_res.".isdeleted" =>"0"))
                 ->join( $this->DB_city, " ".$this->DB_city.".id = ".$this->DB_res.".cityid " ,"LEFT ")
                 ->join( $this->DB_state, " ".$this->DB_state.".id = ".$this->DB_res.".stateid ","LEFT ");
        
        $query = $this->db->get()->row();
          
        return $query;
        
        //print("<pre>".print_r($query,true)."</pre>");
        //die;
        
    }
    
    public function get_parent_category()
        {
            $this->db->select('*');
            $this->db->from($this->DB_cat_fas)
                     ->where("categoryparentid ", 0)
                     ->where("isdeleted ", 0)
                     ->order_by("arrangecategory" , "ASC");
            
            $query = $this->db->get()->result();
                
		
		return $query;
                
                //print("<pre>".print_r($get_cate_prd,true)."</pre>");
                //die;
            
        }
    public function get_sub_category_where($by_id)
        {
             $this->db->select('*');
            $this->db->from($this->DB_cat_fas)
                     ->where("categoryparentid ",(int)$by_id)
                     ->where("isdeleted ", 0)
                     ->order_by("arrangecategory" , "ASC");
            
            $query = $this->db->get()->result();
                
		
		return $query;
            
        }
    
    public function get_sub_category_where_row($by_id)
        {
             $this->db->select('*');
            $this->db->from($this->DB_cat_fas)
                     ->where("categoryparentid ",(int)$by_id)
                     ->where("isdeleted ", 0)
                     ->order_by("arrangecategory" , "ASC");
            
            $query = $this->db->get()->row(); //$this->db->get()->result();
                
		
		return $query;
            
        }

    
    public function get_subcategory_details($by_id)
        {
             $this->db->select('*');
            $this->db->from($this->DB_cat_fas)
                     ->where("id ",(int)$by_id)
                     ->where("isdeleted ", 0);
            
            $query = $this->db->get()->result();
                
		
		return $query;
                
                //print("<pre>".print_r($get_cate_prd,true)."</pre>");
                //die;
            
        }
    
        public function _getcategoryid($url) 
        {
            $_id = $this->db->get_where($this->DB_cat_fas , array( 'slug' =>  $url, 'isdeleted' =>0 ))->row(); 
            if($_id == TRUE)
                {
                    return $_id->id;
                }
            else 
                {
                    return FALSE;
                }
            //$_id = $this->db->get_where($this->DB_cat_fas , array( 'slug' =>  $url, 'isdeleted' =>0 ))->row()->id; // get the id of url db
            //return $_id;
        }
        public function _get_stores_prdcounts()
        {
            $this->db->select("
                                ".$this->DB_product_fas.".merchantid,
                                ".$this->DB_res.".slug as companyurl,
                                ".$this->DB_res.".companyname,
                                ".$this->DB_res.".logo,
                                COUNT( ".$this->DB_product_fas.".id) AS storeproductcount
                            ")
                ->from($this->DB_product_fas)
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_product_fas.".merchantid " , "LEFT" )         //Join product_fashion to restaurants Table
                ->where(" ".$this->DB_product_fas.".status ", 1)
                ->where(" ".$this->DB_product_fas.".isdeleted ", 0)
                ->where(" ".$this->DB_res.".status ", 1)
                ->where(" ".$this->DB_res.".isdeleted ", 0)
                ->group_by(" ".$this->DB_product_fas.".merchantid");
            $query = $this->db->get();
            if ($query->num_rows() > 0)
            {
                return $query->result_array();
            }
            else
            {
                return false;
            }
            
        }

        public function _get_stores()
        {
            $this->db->select("*");
            $this->db->from($this->DB_res);
            $this->db->where(" ".$this->DB_res.".merchanttype ", 'fashion');
            $this->db->where(" ".$this->DB_res.".status ", 1);
            $this->db->where(" ".$this->DB_res.".isdeleted ", 0);
            $query = $this->db->get();
            $get_prod = null;

            if($query->num_rows() > 0)
            {
                $rows = $query->result_array();
                foreach($rows as $row)
                {
                    $row['storeproductcount'] =   $this->_get_storeproductcount($row['id']);
                    $get_prod[] = $row;
                }
                
                return $get_prod;
            }
            else
            {
                return null;
            }
            
        }
        Public function _get_storeproductcount($by_id)
        {

            $this->db->from($this->DB_product_fas);
            $this->db->join($this->DB_res," ".$this->DB_product_fas.".merchantid = ".$this->DB_res.".id", "left");
            // Clause to only fetch data with deletedat field set to null
            $this->db->where(array(" ".$this->DB_product_fas.".status"=>1, " ".$this->DB_product_fas.".isdeleted"=>0," ".$this->DB_product_fas.".merchantid" => $by_id));
            
            $total = $this->db->count_all_results();
            return $total;
        }
        
        public function _get_filtercolor($by_catid,$by_storeid,$by_giftporta=null,$filter=array())
        {
            
            $this->db->select("
                                ".$this->DB_cat_prd.".id,
                                ".$this->DB_cat_prd.".cat_fasid,
                                ".$this->DB_cat_prd.".product_fasid,
                                ".$this->DB_cat_fas.".categoryname,
                                ".$this->DB_prd_qty_c_s.".colorid,
                                ".$this->DB_color.".colorname,
                                count(DISTINCT ".$this->DB_prd_qty_c_s.".productid ) AS full_color_count,
                            ");
            if(isset($by_catid)&& !empty($by_catid))
            {
            $this->db->from($this->DB_cat_prd);
            $this->db->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " );
            $this->db->join( $this->DB_product_fas, " ".$this->DB_product_fas.".id = ".$this->DB_cat_prd.".product_fasid ","LEFT"  );
            $this->db->where(" ".$this->DB_cat_prd.".cat_fasid ", $by_catid);
            }
            if(isset($by_storeid)&& !empty($by_storeid))
            {
            $this->db->from($this->DB_product_fas);
            $this->db->join( $this->DB_cat_prd, " ".$this->DB_cat_prd.".product_fasid = ".$this->DB_product_fas.".id " );
            $this->db->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " );
            $this->db->where(" ".$this->DB_product_fas.".merchantid ", $by_storeid);
            }
            if(isset($by_giftporta)&& !empty($by_giftporta))
            {
            $this->db->from($this->DB_product_fas);
            $this->db->join( $this->DB_cat_prd, " ".$this->DB_cat_prd.".product_fasid = ".$this->DB_product_fas.".id " );
            $this->db->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " );
            $this->db->where(" ".$this->DB_product_fas.".giftportal ", $by_giftporta);
            }
            
            $this->db->join( $this->DB_prd_qty_c_s, " ".$this->DB_prd_qty_c_s.".productid = ".$this->DB_product_fas.".id " , "LEFT" );
            $this->db->join( $this->DB_color, " ".$this->DB_color.".id = ".$this->DB_prd_qty_c_s.".colorid " , "LEFT");
            if(!empty($filter))
                {
                    if(isset($filter['filterpricemin']) || isset($filter['filterpricemax']) )
                    {
                       $this->db->where(" ".$this->DB_prd_qty_c_s.".price >=", $filter['filterpricemin']);
                       $this->db->where(" ".$this->DB_prd_qty_c_s.".price <=", $filter['filterpricemax']);
                    }
                }
            
            $this->db->where(" ".$this->DB_product_fas.".status ", 1);
            $this->db->order_by(" ".$this->DB_color.".colorname", 'ASC');
            $this->db->group_by(" ".$this->DB_prd_qty_c_s.".colorid");
            $query = $this->db->get();
            //print("<pre>".print_r($query->result(),true)."</pre>");die;
            if ($query->num_rows() > 0){
                return $query->result_array();
            }
            else{
                return false;
            }
            
        }
        
        public function _get_filtersize($by_catid,$by_storeid,$by_giftporta=null,$filter=array())
        {
            $this->db->select("
                                ".$this->DB_cat_prd.".id,
                                ".$this->DB_cat_prd.".cat_fasid,
                                ".$this->DB_cat_prd.".product_fasid,
                                ".$this->DB_cat_fas.".categoryname,
                                ".$this->DB_prd_qty_c_s.".sizeid,
                                ".$this->DB_size.".sizename,
                                ".$this->DB_size.".sizecode, 
                                count(DISTINCT ".$this->DB_prd_qty_c_s.".productid ) AS full_size_count,
                            ");
            if(isset($by_catid)&& !empty($by_catid))
            {
            $this->db->from($this->DB_cat_prd);
            $this->db->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " );
            $this->db->join( $this->DB_product_fas, " ".$this->DB_product_fas.".id = ".$this->DB_cat_prd.".product_fasid ","LEFT"  );
            //$this->db->where(" ".$this->DB_cat_prd.".cat_fasid ", $by_catid);
            }
            if(isset($by_storeid)&& !empty($by_storeid))
            {
            $this->db->from($this->DB_product_fas);
            $this->db->join( $this->DB_cat_prd, " ".$this->DB_cat_prd.".product_fasid = ".$this->DB_product_fas.".id " );
            $this->db->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " );
            //$this->db->where(" ".$this->DB_product_fas.".merchantid ", $by_storeid);
            }
            if(isset($by_giftporta)&& !empty($by_giftporta))
            {
            $this->db->from($this->DB_product_fas);
            $this->db->join( $this->DB_cat_prd, " ".$this->DB_cat_prd.".product_fasid = ".$this->DB_product_fas.".id " );
            $this->db->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " );
            //$this->db->where(" ".$this->DB_product_fas.".giftportal ", $by_giftporta);
            }
            //$this->db->from($this->DB_cat_prd);
            //$this->db->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " );
            //$this->db->join( $this->DB_product_fas, " ".$this->DB_product_fas.".id = ".$this->DB_cat_prd.".product_fasid ","LEFT"  );
            $this->db->join( $this->DB_prd_qty_c_s, " ".$this->DB_prd_qty_c_s.".productid = ".$this->DB_product_fas.".id " , "LEFT" );
            $this->db->join( $this->DB_size, " ".$this->DB_size.".id = ".$this->DB_prd_qty_c_s.".sizeid " , "LEFT");
            $this->db->join( $this->DB_size_cat, " ".$this->DB_size_cat.".id = ".$this->DB_size.".sizecategoryid " , "LEFT");
            if(!empty($filter))
                {
                    if(isset($filter['filterpricemin']) || isset($filter['filterpricemax']) )
                    {
                       $this->db->where(" ".$this->DB_prd_qty_c_s.".price >=", $filter['filterpricemin']);
                       $this->db->where(" ".$this->DB_prd_qty_c_s.".price <=", $filter['filterpricemax']);
                    }
                   if(isset($filter['color']))
                   {
                        $this->db->join( $this->DB_color, " ".$this->DB_color.".id = ".$this->DB_prd_qty_c_s.".colorid " , "LEFT");
                        $this->db->where_in(" ".$this->DB_color.".colorname ", $filter['color']);
                       
                   }
                }
            if(isset($by_catid)&& !empty($by_catid))
            {
            $this->db->where(" ".$this->DB_cat_prd.".cat_fasid ", $by_catid);
            }
            if(isset($by_storeid)&& !empty($by_storeid))
            {
            $this->db->where(" ".$this->DB_product_fas.".merchantid ", $by_storeid);
            }
            //$this->db->where(" ".$this->DB_cat_prd.".cat_fasid ", $by_catid);
            $this->db->order_by(" ".$this->DB_size_cat.".sizecategory", 'ASC');
            $this->db->group_by(" ".$this->DB_prd_qty_c_s.".sizeid");
            $query = $this->db->get();
            //print("<pre>".print_r($query->result(),true)."</pre>");die;
            if ($query->num_rows() > 0){
                return $query->result_array();
            }
            else{
                return false;
            }
            
        }
        public function _get_filterstore($by_catid,$filter=array())
        {
            
            
            $this->db->select("
                                ".$this->DB_cat_prd.".id,
                                ".$this->DB_cat_prd.".cat_fasid,
                                ".$this->DB_cat_prd.".product_fasid,
                                ".$this->DB_cat_fas.".categoryname,
                                ".$this->DB_product_fas.".merchantid,
                                ".$this->DB_res.".slug as companyurl,
                                ".$this->DB_res.".companyname,
                                count(DISTINCT ".$this->DB_prd_qty_c_s.".productid ) AS full_store_count,
                            ")
                ->from($this->DB_cat_prd)
                ->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " )
                ->join( $this->DB_product_fas, " ".$this->DB_product_fas.".id = ".$this->DB_cat_prd.".product_fasid ","LEFT"  )
                ->join( $this->DB_prd_qty_c_s, " ".$this->DB_prd_qty_c_s.".productid = ".$this->DB_product_fas.".id " , "LEFT" );
            $this->db->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_product_fas.".merchantid " , "LEFT" );
            if(!empty($filter))
                {
                   if(isset($filter['filterpricemin']) || isset($filter['filterpricemax']) )
                    {
                       $this->db->where(" ".$this->DB_prd_qty_c_s.".price >=", $filter['filterpricemin']);
                       $this->db->where(" ".$this->DB_prd_qty_c_s.".price <=", $filter['filterpricemax']);
                    }
                   if(isset($filter['color']))
                   {
                        $this->db->join( $this->DB_color, " ".$this->DB_color.".id = ".$this->DB_prd_qty_c_s.".colorid " , "LEFT");
                        $this->db->where_in(" ".$this->DB_color.".colorname ", $filter['color']);
                       
                   }
                }
            $this->db->where(" ".$this->DB_cat_prd.".cat_fasid ", $by_catid);
            $this->db->order_by(" ".$this->DB_res.".companyname", 'ASC');
            $this->db->group_by(" ".$this->DB_product_fas.".merchantid");
            $query = $this->db->get();
            //print("<pre>".print_r($query->result(),true)."</pre>");die;
            if ($query->num_rows() > 0){
                return $query->result_array();
            }
            else{
                return false;
            }
            
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
        
        public function _allcat_bystore_navcount($by_storeid) 
        {
            $this->db->select("
                                ".$this->DB_product_fas.".merchantid,
                                ".$this->DB_cat_prd.".id,
                                ".$this->DB_cat_prd.".cat_fasid,
                                ".$this->DB_cat_prd.".product_fasid,
                                ".$this->DB_cat_fas.".id as categoryid,
                                ".$this->DB_cat_fas.".categoryname,
                                ".$this->DB_cat_fas.".slug,
                                ".$this->DB_cat_fas.".arrangecategory,
                                ".$this->DB_cat_fas.".categoryparentid,
                                COUNT( ".$this->DB_cat_prd.".cat_fasid) AS categoryparentcount
                            ")
                ->from($this->DB_product_fas)
                ->join( $this->DB_cat_prd, " ".$this->DB_cat_prd.".product_fasid = ".$this->DB_product_fas.".id " )
                ->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " )
                ->where(" ".$this->DB_product_fas.".merchantid ", $by_storeid)
                ->where(" ".$this->DB_product_fas.".isdeleted ", 0)
                ->where(" ".$this->DB_product_fas.".status ", 1)
                ->where(" ".$this->DB_cat_fas.".categoryparentid ", 0)
                ->where(" ".$this->DB_cat_fas.".isdeleted ", 0)
                ->where(" ".$this->DB_cat_fas.".status ", 1)
                ->order_by(" ".$this->DB_cat_fas.".arrangecategory", "ASC")
                ->group_by(" ".$this->DB_cat_prd.".cat_fasid");
            
            $query = $this->db->get();
            //print("<pre>".print_r($query->result(),true)."</pre>");die;
            
            $get_nav_cat	= array();
            
            if($query->num_rows() > 0)
            {
                foreach($query->result() as $row)
                    {
                        $get_nav_cat[$row->id]['id']                =   $row->categoryid;
                        $get_nav_cat[$row->id]['cat_fasid']         =   $row->id;
                        $get_nav_cat[$row->id]['categoryid']        =   $row->categoryid;
                        $get_nav_cat[$row->id]['slug']              =   $row->slug;
                        $get_nav_cat[$row->id]['categoryname']      =   $row->categoryname;
                        $get_nav_cat[$row->id]['arrangecategory']   =   $row->arrangecategory;
                        $get_nav_cat[$row->id]['categoryparentid']  =   $row->categoryparentid;
                        $get_nav_cat[$row->id]['categoryparentcount'] =   $row->categoryparentcount;
                        $get_nav_cat[$row->id]['nav_cate_submenu']  =   $this->_allcat_bystore_count_subnav($by_storeid,$row->categoryid);// feach data by category from the category_fashion tb 
                           
                    }
            }
            
            //print("<pre>".print_r($get_nav_cat,true)."</pre>");die;
            return $get_nav_cat;
        }
        public function _allcat_bystore_count_subnav($by_storeid,$by_id)
        {
            $this->db->select("
                                ".$this->DB_product_fas.".merchantid,
                                ".$this->DB_cat_prd.".id,
                                ".$this->DB_cat_prd.".cat_fasid,
                                ".$this->DB_cat_prd.".product_fasid,
                                ".$this->DB_cat_fas.".id as categoryid,
                                ".$this->DB_cat_fas.".categoryname,
                                ".$this->DB_cat_fas.".slug,
                                ".$this->DB_cat_fas.".arrangecategory,
                                ".$this->DB_cat_fas.".categoryparentid,
                                COUNT( ".$this->DB_cat_prd.".cat_fasid) AS categoryparentcount
                            ")
                ->from($this->DB_product_fas)
                ->join( $this->DB_cat_prd, " ".$this->DB_cat_prd.".product_fasid = ".$this->DB_product_fas.".id " )
                ->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " )
                ->where(" ".$this->DB_product_fas.".merchantid ", $by_storeid)
                ->where(" ".$this->DB_product_fas.".isdeleted ", 0)
                ->where(" ".$this->DB_product_fas.".status ", 1)
                ->where(" ".$this->DB_cat_fas.".categoryparentid ", $by_id)
                ->where(" ".$this->DB_cat_fas.".isdeleted ", 0)
                ->where(" ".$this->DB_cat_fas.".status ", 1)
                ->order_by(" ".$this->DB_cat_fas.".arrangecategory", "ASC")
                ->group_by(" ".$this->DB_cat_prd.".cat_fasid");
            
            $query = $this->db->get();
            $get_nav_cat	= array();
            
            if($query->num_rows() > 0)
            {
                foreach($query->result() as $row)
                    {
                        
                        $get_nav_cat[$row->id]['id']                =   $row->categoryid;
                        $get_nav_cat[$row->id]['cat_fasid']         =   $row->id;
                        $get_nav_cat[$row->id]['categoryid']        =   $row->categoryid;
                        $get_nav_cat[$row->id]['slug']              =   $row->slug;
                        $get_nav_cat[$row->id]['categoryname']      =   $row->categoryname;
                        $get_nav_cat[$row->id]['arrangecategory']   =   $row->arrangecategory;
                        $get_nav_cat[$row->id]['categoryparentid']  =   $row->categoryparentid;
                        $get_nav_cat[$row->id]['categoryparentcount'] =   $row->categoryparentcount;
                        $get_nav_cat[$row->id]['submenu_nav']       =   $this->_allcat_bystore_count_subnav($by_storeid,$row->categoryid);
                        //$get_prd[$row->id]['canaddproduct'] =   $row->canaddproduct;
                    }
            }
            return $get_nav_cat;
        }
        
        public function record_count_allproduct_bystore($by_storeid) 
        {
            $this->db->select("*")->from($this->DB_product_fas);
            if(!empty($by_storeid))
                {
                    $this->db->where(" ".$this->DB_product_fas.".merchantid ", $by_storeid);
                }
            
            
            $query = $this->db->get();
            return $query->num_rows();

        }
        public function _allproduct_bystore($by_catid,$by_storeid,$limit, $start,$order_by,$filter=array()) 
        {
            $this->db->select("
                                ".$this->DB_product_fas.".merchantid,
                                ".$this->DB_cat_prd.".id,
                                ".$this->DB_cat_prd.".cat_fasid,
                                ".$this->DB_cat_prd.".product_fasid,
                                ".$this->DB_cat_fas.".categoryname
                            ")
                ->from($this->DB_product_fas)
                ->where(" ".$this->DB_product_fas.".merchantid ", $by_storeid)
                ->where(" ".$this->DB_product_fas.".isdeleted ", 0)
                ->where(" ".$this->DB_product_fas.".status ", 1)
                ->join( $this->DB_cat_prd, " ".$this->DB_cat_prd.".product_fasid = ".$this->DB_product_fas.".id " )
                ->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " )
                ->join( $this->DB_prd_qty_c_s, " ".$this->DB_prd_qty_c_s.".productid = ".$this->DB_product_fas.".id " , "LEFT" );
                //->order_by(" ".$this->DB_cat_prd.".createdat", "DESC");
                if(!empty($order_by))
                {
                    if($order_by=="name")
                        {
                            $this->db->order_by(" ".$this->DB_product_fas.".productname", "ASC");
                        }
                    elseif($order_by=="price_low_high")
                        {
                            $this->db->order_by(" ".$this->DB_prd_qty_c_s.".price", "DESC");
                        }
                    elseif($order_by=="price_high_low")
                        {
                            $this->db->order_by(" ".$this->DB_prd_qty_c_s.".price", "ASC");
                        }
                }
                else{
                        $this->db->order_by(" ".$this->DB_cat_prd.".createdat", "DESC");
                    }
                
                if(!empty($by_catid))
                    {
                        $this->db->where(" ".$this->DB_cat_prd.".cat_fasid ", $by_catid);
                    }
                if(!empty($filter))
                {
                   
                   if(isset($filter['filterpricemin']) || isset($filter['filterpricemax']) )
                    {
                       $this->db->where(" ".$this->DB_prd_qty_c_s.".price >=", $filter['filterpricemin']);
                       $this->db->where(" ".$this->DB_prd_qty_c_s.".price <=", $filter['filterpricemax']);
                    }
                   if(isset($filter['color']))
                   {
                        $this->db->join( $this->DB_color, " ".$this->DB_color.".id = ".$this->DB_prd_qty_c_s.".colorid " , "LEFT");
                        $this->db->where_in(" ".$this->DB_color.".colorname ", $filter['color']);
                       
                   }
                   if(isset($filter['size']))
                   {
                        $this->db->join( $this->DB_size, " ".$this->DB_size.".id = ".$this->DB_prd_qty_c_s.".sizeid " , "LEFT");
                        $this->db->where_in(" ".$this->DB_size.".id", $filter['size']);
                       
                   }
                   if(isset($filter['store']))
                   {
                        $this->db->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_product_fas.".merchantid " , "LEFT" );
                        $this->db->where_in(" ".$this->DB_res.".companyname", $filter['store']);
                       
                   }
                }
                
                $this->db->group_by(" ".$this->DB_cat_prd.".product_fasid");
                    
                if(!empty($limit)  )
                {
                    $this->db->limit($limit, $start);
                }
                
            $query = $this->db->get();
            //print("<pre>".print_r($query->result(),true)."</pre>");die;
            $get_store_prod	= array();
            
            if($query->num_rows() > 0)
            {
                foreach($query->result() as $row)
                    {
                        $get_store_prod[$row->id]['id']               =   $row->id;
                        $get_store_prod[$row->id]['cat_id']           =   $row->cat_fasid;
                        $get_store_prod[$row->id]['cat_name']         =   $row->categoryname;
                        
                        $get_store_prod[$row->id]['prd_id']           =   $row->product_fasid;
                        $get_store_prod[$row->id]['merchantid']       =   $row->merchantid;
                        $get_store_prod[$row->id]['prd_qcs']          =   $this->_get_product_options($by_storeid=FALSE,$row->product_fasid);// feach data by category from the category_fashion tb 
                           
                    }
            }
            
            
            //print("<pre>".print_r($get_store_prod,true)."</pre>");die;
            
            return $get_store_prod;
        }

        public function record_count_allproduct_bygiftportal() 
        {
            $this->db->select("*")->from($this->DB_product_fas);
            $this->db->where(" ".$this->DB_product_fas.".giftportal ", 1);
            $query = $this->db->get();
            return $query->num_rows();

        }
        public function _allproduct_bygiftportal($by_catid,$limit, $start,$order_by,$filter=array()) 
        {
            $this->db->select("
                                ".$this->DB_product_fas.".adminid,
                                ".$this->DB_product_fas.".id
                            ")
                ->from($this->DB_product_fas)
                ->where(" ".$this->DB_product_fas.".giftportal ", 1)
                ->where(" ".$this->DB_product_fas.".isdeleted ", 0)
                ->where(" ".$this->DB_product_fas.".status ", 1)
                //->join( $this->DB_cat_prd, " ".$this->DB_cat_prd.".product_fasid = ".$this->DB_product_fas.".id " )
                //->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " )
                ->join( $this->DB_prd_qty_c_s, " ".$this->DB_prd_qty_c_s.".productid = ".$this->DB_product_fas.".id " , "LEFT" );
                //->order_by(" ".$this->DB_cat_prd.".createdat", "DESC");
                if(!empty($order_by))
                {
                    if($order_by=="name")
                        {
                            $this->db->order_by(" ".$this->DB_product_fas.".productname", "ASC");
                        }
                    elseif($order_by=="jpoint_low_high")
                        {
                            $this->db->order_by(" ".$this->DB_prd_qty_c_s.".jpoints", "DESC");
                        }
                    elseif($order_by=="jpoint_high_low")
                        {
                            $this->db->order_by(" ".$this->DB_prd_qty_c_s.".jpoints", "ASC");
                        }
                }
                else{
                        $this->db->order_by(" ".$this->DB_product_fas.".createdat", "DESC");
                    }
                
                if(!empty($by_catid))
                    {
                        $this->db->where(" ".$this->DB_cat_prd.".cat_fasid ", $by_catid);
                    }
                if(!empty($filter))
                {
                   
                   if(isset($filter['filterpricemin']) || isset($filter['filterpricemax']) )
                    {
                       $this->db->where(" ".$this->DB_prd_qty_c_s.".price >=", $filter['filterpricemin']);
                       $this->db->where(" ".$this->DB_prd_qty_c_s.".price <=", $filter['filterpricemax']);
                    }
                   if(isset($filter['color']))
                   {
                        $this->db->join( $this->DB_color, " ".$this->DB_color.".id = ".$this->DB_prd_qty_c_s.".colorid " , "LEFT");
                        $this->db->where_in(" ".$this->DB_color.".colorname ", $filter['color']);
                       
                   }
                   if(isset($filter['size']))
                   {
                        $this->db->join( $this->DB_size, " ".$this->DB_size.".id = ".$this->DB_prd_qty_c_s.".sizeid " , "LEFT");
                        $this->db->where_in(" ".$this->DB_size.".id", $filter['size']);
                       
                   }
                  
                }
                
                $this->db->group_by(" ".$this->DB_product_fas.".id");
                    
                if(!empty($limit)  )
                {
                    $this->db->limit($limit, $start);
                }
                
            $query = $this->db->get();
            //print("<pre>".print_r($query->result(),true)."</pre>");die;
            $get_store_prod = array();
            
            if($query->num_rows() > 0)
            {
                foreach($query->result() as $row)
                    {
                        $get_store_prod[$row->id]['id']               =   $row->id;
                        
                        $get_store_prod[$row->id]['adminid']       =   $row->adminid;
                        $get_store_prod[$row->id]['prd_qcs']          =   $this->_get_giftportal_product_options($row->id);// feach data by category from the category_fashion tb 
                           
                    }
            }
            
            
            //print("<pre>".print_r($get_store_prod,true)."</pre>");die;
            
            return $get_store_prod;
        }

        public function _get_giftportal_product_options($by_prodid=null) 
        {
            $this->db->select(" 
                            ".$this->DB_prd_qty_c_s.".id,
                            ".$this->DB_prd_qty_c_s.".productid,
                            ".$this->DB_prd_qty_c_s.".jpoints,
                            ".$this->DB_prd_qty_c_s.".discount_price,
                                
                            ".$this->DB_color.".colorname,
                            ".$this->DB_size.".sizecode,
                            ".$this->DB_prd_fashionimg.".imagename,
                                
                            
                             
                            ".$this->DB_product_fas.".adminid,   
                            ".$this->DB_product_fas.".productname,
                            ".$this->DB_product_fas.".productdesc,
                            ".$this->DB_product_fas.".productshortdesc,
                            ".$this->DB_product_fas.".slug,
                            ".$this->DB_product_fas.".discount_percentage,
                            ".$this->DB_product_fas.".productfrontimage,
                            ".$this->DB_product_fas.".sales,
                                
                            SUM(".$this->DB_prd_qty_c_s.".quantity) AS sum_quntity,
                            SUM(".$this->DB_prd_qty_c_s.".productinstock) AS sum_productinstock,
                            count(DISTINCT ".$this->DB_prd_qty_c_s.".colorid ) AS full_color_count,
                            count(DISTINCT ".$this->DB_prd_qty_c_s.".discount_price ) AS full_discount_price_count
                            
                        ")
                ->from($this->DB_prd_qty_c_s)
                ->join( $this->DB_product_fas, " ".$this->DB_product_fas.".id = ".$this->DB_prd_qty_c_s.".productid " , "LEFT" )         //Join product_fashion to Prod_qty_color Table
                ->join( $this->DB_color, " ".$this->DB_color.".id = ".$this->DB_prd_qty_c_s.".colorid " , "LEFT")
                ->join( $this->DB_size, " ".$this->DB_size.".id = ".$this->DB_prd_qty_c_s.".sizeid " , "LEFT")
                ->join("    
                        (
                            SELECT ".$this->DB_prd_fashionimg.".id,".$this->DB_prd_fashionimg.".productid,".$this->DB_prd_fashionimg.".imagename
                            FROM ".$this->DB_prd_fashionimg." where colorimg= 0
                            GROUP BY ".$this->DB_prd_fashionimg.".productid
                        ) ".$this->DB_prd_fashionimg." " 
                        , " ".$this->DB_prd_fashionimg.".productid = ".$this->DB_prd_qty_c_s.".productid " , "LEFT")
                //->where(" ".$this->DB_prd_qty_c_s.".productid ", $by_prodid)
                ->where(" ".$this->DB_product_fas.".status ", 1)
                ->where(" ".$this->DB_prd_qty_c_s.".status ", 1)
                ->where(" ".$this->DB_product_fas.".isdeleted ", 0)
                ->where(" ".$this->DB_prd_qty_c_s.".isdeleted ", 0)
                ->group_by(" ".$this->DB_prd_qty_c_s.".productid");
            
            if(!empty($by_prodid))
                {
                    $this->db->where(" ".$this->DB_prd_qty_c_s.".productid ", $by_prodid);
                }
            
            $query = $this->db->get();
            $get_prod_details   = array();
            //print("<pre>".print_r($by_id,true)."</pre>");die;
            if($query->num_rows() > 0)
            {
                foreach($query->result() as $row)
                    {
                       
                        $get_prod_details[$row->id]['id']                   =   $row->id;
                        $get_prod_details[$row->id]['prd_id']               =   $row->productid;
                        $get_prod_details[$row->id]['frontimage']           =   $row->productfrontimage;
                        $get_prod_details[$row->id]['imagename']            =   $row->imagename;
                        $get_prod_details[$row->id]['prd_url']              =   $row->slug;
                        $get_prod_details[$row->id]['productname']          =   $row->productname;
                        $get_prod_details[$row->id]['productshortdesc']     =   $row->productshortdesc;
                        $get_prod_details[$row->id]['productdesc']          =   $row->productdesc;
                        $get_prod_details[$row->id]['quantity']             =   $row->sum_quntity;
                        $get_prod_details[$row->id]['quantity_instock']     =   $row->sum_productinstock;
                        $get_prod_details[$row->id]['jpoints']              =   $row->jpoints;
                        $get_prod_details[$row->id]['discount_percentage']  =   $row->discount_percentage;
                        $get_prod_details[$row->id]['discount_price_count'] =   $row->full_discount_price_count;
                        $get_prod_details[$row->id]['sales']                =   $row->sales;
                        $get_prod_details[$row->id]['discount_price']       =   $row->discount_price;
                        $get_prod_details[$row->id]['sizecode']             =   $row->sizecode;
                        $get_prod_details[$row->id]['colorname']            =   $row->colorname;
                        $get_prod_details[$row->id]['color_count']          =   $row->full_color_count;
                           
                    }
            }
            //print("<pre>".print_r($get_prod_details,true)."</pre>");die;
            return $get_prod_details;
            
            
        }
        
        public function count_all_results($column_name = array(),$where=array(), $table_name = array())
        {
            $this->db->select($column_name);
            // If Where is not NULL
            if(!empty($where) && count($where) > 0 )
            {
                $this->db->where($where);
            }
            // Return Count Column
            return $this->db->count_all_results($table_name[0]);//table_name array sub 0
        }
        
        public function record_count_allproduct_bycat($by_catid) 
        {
            $this->db->select("*")->from($this->DB_cat_prd);
            if(!empty($by_catid))
                {
                    $this->db->where(" ".$this->DB_cat_prd.".cat_fasid ", $by_catid);
                }
            else
                {
                    $this->db->group_by(" ".$this->DB_cat_prd.".product_fasid");
                }
            
            $query = $this->db->get();
            return $query->num_rows();

        }
        public function _allproduct_bycat($by_catid,$limit, $start,$order_by,$filter=array()) 
        {
            $this->db->select("
                                ".$this->DB_cat_prd.".id,
                                ".$this->DB_cat_prd.".cat_fasid,
                                ".$this->DB_cat_prd.".product_fasid,
                                ".$this->DB_cat_fas.".categoryname
                            ")
                ->from($this->DB_cat_prd)
                ->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " )
                ->join( $this->DB_product_fas, " ".$this->DB_product_fas.".id = ".$this->DB_cat_prd.".product_fasid ","LEFT"  )
                ->join( $this->DB_prd_qty_c_s, " ".$this->DB_prd_qty_c_s.".productid = ".$this->DB_product_fas.".id " , "LEFT" );
                if(!empty($order_by))
                {
                    if($order_by=="name")
                        {
                            $this->db->order_by(" ".$this->DB_product_fas.".productname", "ASC");
                        }
                    elseif($order_by=="price_low_high")
                        {
                            $this->db->order_by(" ".$this->DB_prd_qty_c_s.".price", "DESC");
                        }
                    elseif($order_by=="price_high_low")
                        {
                            $this->db->order_by(" ".$this->DB_prd_qty_c_s.".price", "ASC");
                        }
                }
                //else{ $this->db->order_by(" ".$this->DB_prd_qty_c_s.".createdat", "DESC");};
                
                if(empty($order_by))
                    {
                        $this->db->order_by(" ".$this->DB_cat_prd.".createdat", "DESC");
                    }
                if(!empty($by_catid))
                    {
                        $this->db->where(" ".$this->DB_cat_prd.".cat_fasid ", $by_catid);
                    }
                if(!empty($filter))
                {
                   if(isset($filter['filterpricemin']) || isset($filter['filterpricemax']) )
                   {
                   $this->db->where(" ".$this->DB_prd_qty_c_s.".price >=", $filter['filterpricemin']);
                   $this->db->where(" ".$this->DB_prd_qty_c_s.".price <=", $filter['filterpricemax']);
                   }
                   if(isset($filter['color']))
                   {
                        $this->db->join( $this->DB_color, " ".$this->DB_color.".id = ".$this->DB_prd_qty_c_s.".colorid " , "LEFT");
                        $this->db->where_in(" ".$this->DB_color.".colorname ", $filter['color']);
                       
                   }
                   if(isset($filter['size']))
                   {
                        $this->db->join( $this->DB_size, " ".$this->DB_size.".id = ".$this->DB_prd_qty_c_s.".sizeid " , "LEFT");
                        $this->db->where_in(" ".$this->DB_size.".id", $filter['size']);
                       
                   }
                   if(isset($filter['store']))
                   {
                        $this->db->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_product_fas.".merchantid " , "LEFT" );
                        $this->db->where_in(" ".$this->DB_res.".companyname", $filter['store']);
                       
                   }
                }
                    
                $this->db->group_by(" ".$this->DB_cat_prd.".product_fasid");
                    
                if(!empty($limit) )
                {
                    $this->db->limit($limit, $start);
                }
            
            $query = $this->db->get();
            //print("<pre>".print_r($query->result(),true)."</pre>");die;
            $get_cat_prod	= array();
            
            if($query->num_rows() > 0)
            {
                foreach($query->result() as $row)
                    {
                       
                        $get_cat_prod[$row->id]['id']               =   $row->id;
                        $get_cat_prod[$row->id]['cat_id']           =   $row->cat_fasid;
                        $get_cat_prod[$row->id]['prd_id']           =   $row->product_fasid;
                        $get_cat_prod[$row->id]['cat_name']         =   $row->categoryname;
                        $get_cat_prod[$row->id]['prd_qcs']          =   $this->_get_product_options($row->product_fasid,$by_storeid=FALSE);// feach data by category from the category_fashion tb 
                           
                    }
            }
            
            
            //print("<pre>".print_r($get_cat_prod,true)."</pre>");die;
            
            return $get_cat_prod;
        }
        
        
        public function _get_product_rand($by_catid,$rand_where,$limitend) 
        {
            $this->db->select("
                                ".$this->DB_product_fas.".merchantid,
                                ".$this->DB_product_fas.".productsold,
                                ".$this->DB_cat_prd.".id,
                                ".$this->DB_cat_prd.".cat_fasid,
                                ".$this->DB_cat_prd.".product_fasid,
                                ".$this->DB_cat_fas.".categoryname
                            ")
                ->from($this->DB_product_fas)
                //->where(array(" ".$this->DB_res.".id" => (int)$by_id ," ".$this->DB_res.".isdeleted" =>"0"))
                ->where(" ".$this->DB_product_fas.".isdeleted ", 0)
                ->where(" ".$this->DB_product_fas.".status ", 1)
                ->join( $this->DB_cat_prd, " ".$this->DB_cat_prd.".product_fasid = ".$this->DB_product_fas.".id " )
                ->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " )
                //->order_by(" ".$this->DB_cat_prd.".createdat", "DESC")
                ->order_by('rand()')
                ->limit($limitend,0 );
            
                if(!empty($rand_where))
                    {
                        $this->db->where($rand_where);
                    }
                if(!empty($by_catid))
                    {
                        $this->db->where(" ".$this->DB_cat_prd.".cat_fasid ", $by_catid);
                    }
                else
                    {
                        $this->db->group_by(" ".$this->DB_cat_prd.".product_fasid");
                    }
                
                
            $query = $this->db->get();
            //print("<pre>".print_r($query->result(),true)."</pre>");die;
            $get_store_prod	= array();
            
            if($query->num_rows() > 0)
            {
                foreach($query->result() as $row)
                    {
                        $get_store_prod[$row->id]['id']               =   $row->id;
                        $get_store_prod[$row->id]['prd_fas_cat_assign']=  $row->id;
                        $get_store_prod[$row->id]['cat_id']           =   $row->cat_fasid;
                        $get_store_prod[$row->id]['cat_name']         =   $row->categoryname;
                        
                        $get_store_prod[$row->id]['prd_id']           =   $row->product_fasid;
                        $get_store_prod[$row->id]['merchantid']       =   $row->merchantid;
                        $get_store_prod[$row->id]['productsold']      =   $row->productsold;
                        $get_store_prod[$row->id]['prd_qcs']          =   $this->_get_product_options($by_storeid=FALSE,$row->product_fasid);// feach data by category from the category_fashion tb 
                           
                    }
            }
            
            
            //print("<pre>".print_r($get_store_prod,true)."</pre>");die;
            
            return $get_store_prod;
        }
        
        public function record_count_allproduct_bysearch($search_data=null,$cate_id=null,$layaway=null) 
        {
            $this->db->select("*")
                ->from($this->DB_product_fas)
                ->join( $this->DB_cat_prd, " ".$this->DB_cat_prd.".product_fasid = ".$this->DB_product_fas.".id " )
                ->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " )
                ->where(" ".$this->DB_product_fas.".isdeleted ", 0)
                ->where(" ".$this->DB_product_fas.".status ", 1);
            if(!empty($layaway)  )
                {
                    $this->db->where(" ".$this->DB_product_fas.".productlayawaystatus ", 1);
                }
            if(!empty($search_data)  )
                {
                $this->db->like(" ".$this->DB_product_fas.".productname", $search_data);
                $this->db->or_like(" ".$this->DB_cat_fas.".categoryname", $search_data);
                } 
            if(!empty($by_catid)  )
                {
                    $this->db->where(" ".$this->DB_cat_prd.".cat_fasid ", $by_catid);
                } 
            $this->db->group_by(" ".$this->DB_cat_prd.".product_fasid");
            
            $query = $this->db->get();
            return $query->num_rows();

        }
        
        public function _get_filtercolor_search($search_data,$filter=array())
        {
            $this->db->select("
                                ".$this->DB_cat_prd.".id,
                                ".$this->DB_cat_prd.".cat_fasid,
                                ".$this->DB_cat_prd.".product_fasid,
                                ".$this->DB_cat_fas.".categoryname,
                                ".$this->DB_prd_qty_c_s.".colorid,
                                ".$this->DB_color.".colorname,
                                count(DISTINCT ".$this->DB_prd_qty_c_s.".productid ) AS full_color_count,
                            ")
                ->from($this->DB_cat_prd)
                ->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " )
                ->join( $this->DB_product_fas, " ".$this->DB_product_fas.".id = ".$this->DB_cat_prd.".product_fasid ","LEFT"  )
                ->join( $this->DB_prd_qty_c_s, " ".$this->DB_prd_qty_c_s.".productid = ".$this->DB_product_fas.".id " , "LEFT" );
            $this->db->join( $this->DB_color, " ".$this->DB_color.".id = ".$this->DB_prd_qty_c_s.".colorid " , "LEFT");
            $this->db->where(" ".$this->DB_product_fas.".isdeleted ", 0);
            $this->db->where(" ".$this->DB_product_fas.".status ", 1);
            
            if(!empty($filter))
            {
                if(isset($filter['filterpricemin']) || isset($filter['filterpricemax']) )
                {
                    $this->db->where(" ".$this->DB_prd_qty_c_s.".price >=", $filter['filterpricemin']);
                    $this->db->where(" ".$this->DB_prd_qty_c_s.".price <=", $filter['filterpricemax']);
                }
            }
            //$this->db->where(" ".$this->DB_cat_prd.".cat_fasid ", $by_catid);
            $this->db->like(" ".$this->DB_product_fas.".productname", $search_data);
            $this->db->or_like(" ".$this->DB_cat_fas.".categoryname", $search_data);
            $this->db->order_by(" ".$this->DB_color.".colorname", 'ASC');
            $this->db->group_by(" ".$this->DB_prd_qty_c_s.".colorid");
            $query = $this->db->get();
            //print("<pre>".print_r($query->result(),true)."</pre>");die;
            if ($query->num_rows() > 0){
                return $query->result_array();
            }
            else{
                return false;
            }
            
        }
        
        public function _get_filtersize_search($search_data,$filter=array())
        {
            $this->db->select("
                                ".$this->DB_cat_prd.".id,
                                ".$this->DB_cat_prd.".cat_fasid,
                                ".$this->DB_cat_prd.".product_fasid,
                                ".$this->DB_cat_fas.".categoryname,
                                ".$this->DB_prd_qty_c_s.".sizeid,
                                ".$this->DB_size.".sizename,
                                ".$this->DB_size.".sizecode, 
                                count(DISTINCT ".$this->DB_prd_qty_c_s.".productid ) AS full_size_count,
                            ")
                ->from($this->DB_cat_prd)
                ->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " )
                ->join( $this->DB_product_fas, " ".$this->DB_product_fas.".id = ".$this->DB_cat_prd.".product_fasid ","LEFT"  )
                ->join( $this->DB_prd_qty_c_s, " ".$this->DB_prd_qty_c_s.".productid = ".$this->DB_product_fas.".id " , "LEFT" );
            $this->db->join( $this->DB_size, " ".$this->DB_size.".id = ".$this->DB_prd_qty_c_s.".sizeid " , "LEFT");
            $this->db->join( $this->DB_size_cat, " ".$this->DB_size_cat.".id = ".$this->DB_size.".sizecategoryid " , "LEFT");
            $this->db->where(" ".$this->DB_product_fas.".isdeleted ", 0);
            $this->db->where(" ".$this->DB_product_fas.".status ", 1);
            
            if(!empty($filter))
            {
               if(isset($filter['filterpricemin']) || isset($filter['filterpricemax']))
               {
                    $this->db->where(" ".$this->DB_prd_qty_c_s.".price >=", $filter['filterpricemin']);
                    $this->db->where(" ".$this->DB_prd_qty_c_s.".price <=", $filter['filterpricemax']);
               }
               if(isset($filter['color']))
               {
                    $this->db->join( $this->DB_color, " ".$this->DB_color.".id = ".$this->DB_prd_qty_c_s.".colorid " , "LEFT");
                    $this->db->where_in(" ".$this->DB_color.".colorname ", $filter['color']);

               }
            }
            //$this->db->where(" ".$this->DB_cat_prd.".cat_fasid ", $by_catid);
            $this->db->like(" ".$this->DB_product_fas.".productname", $search_data);
            $this->db->or_like(" ".$this->DB_cat_fas.".categoryname", $search_data);
            $this->db->order_by(" ".$this->DB_size_cat.".sizecategory", 'ASC');
            $this->db->group_by(" ".$this->DB_prd_qty_c_s.".sizeid");
            $query = $this->db->get();
            //print("<pre>".print_r($query->result(),true)."</pre>");die;
            if ($query->num_rows() > 0){
                return $query->result_array();
            }
            else{
                return false;
            }
            
        }
        

        public function _allproduct_bysearch($search_data=null,$by_catid,$limit, $start,$layaway=null) 
        {
           
            $this->db->select("
                                ".$this->DB_product_fas.".id,
                                ".$this->DB_cat_prd.".id,
                                ".$this->DB_cat_prd.".cat_fasid,
                                ".$this->DB_cat_prd.".product_fasid,
                                ".$this->DB_cat_fas.".categoryname
                            ")
                ->from($this->DB_product_fas)
                ->join( $this->DB_cat_prd, " ".$this->DB_cat_prd.".product_fasid = ".$this->DB_product_fas.".id " )
                ->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid " );
                
            //} 
                
                //$this->db->order_by('rand()');
                
                $this->db->where(" ".$this->DB_product_fas.".isdeleted ", 0);
                $this->db->where(" ".$this->DB_product_fas.".status ", 1);
                if(!empty($layaway)  )
                {
                    $this->db->where(" ".$this->DB_product_fas.".productlayawaystatus ", 1);
                } 
                if(!empty($by_catid)  )
                {
                    $this->db->where(" ".$this->DB_cat_prd.".cat_fasid ", $by_catid);
                } 
                else
                    {
                        $this->db->group_by(" ".$this->DB_cat_prd.".product_fasid");
                    }
                if(!empty($search_data))
                {
                    $this->db->like(" ".$this->DB_product_fas.".productname", $search_data);
                    $this->db->or_like(" ".$this->DB_cat_fas.".categoryname", $search_data);
                }
                $this->db->group_by(" ".$this->DB_cat_prd.".product_fasid");
                $this->db->order_by(" ".$this->DB_cat_prd.".createdat", "DESC");
                if(!empty($limit) )
                {
                    $this->db->limit($limit, $start);
                }
                
            $query = $this->db->get();
            //print("<pre>".print_r($query->result(),true)."</pre>");die;
            $get_store_prod	= array();
            
            if($query->num_rows() > 0)
            {
                foreach($query->result() as $row)
                    {
                        $get_store_prod[$row->id]['id']               =   $row->id;
                        $get_store_prod[$row->id]['prd_fas_cat_assign']=  $row->id;
                        $get_store_prod[$row->id]['cat_id']           =   $row->cat_fasid;
                        $get_store_prod[$row->id]['cat_name']         =   $row->categoryname;
                        
                        $get_store_prod[$row->id]['prd_id']           =   $row->product_fasid;
                        $get_store_prod[$row->id]['merchantid']       =   $row->id;
                        $get_store_prod[$row->id]['prd_qcs']          =   $this->_get_product_options($by_storeid=FALSE,$row->product_fasid);// feach data by category from the category_fashion tb 
                           
                    }
            }
            
            //print("<pre>".print_r($get_store_prod,true)."</pre>");die;
            
            return $get_store_prod;
        }
        
        public function _get_product_options($by_prodid,$by_storeid) 
        {
            $this->db->select(" 
                            ".$this->DB_prd_qty_c_s.".id,
                            ".$this->DB_prd_qty_c_s.".productid,
                            ".$this->DB_prd_qty_c_s.".price,
                            ".$this->DB_prd_qty_c_s.".discount_price,
                                
                            ".$this->DB_color.".colorname,
                            ".$this->DB_size.".sizecode,
                            ".$this->DB_prd_fashionimg.".imagename,
                                
                            ".$this->DB_res.".slug as companyurl,
                            ".$this->DB_res.".companyname, 
                             
                            ".$this->DB_product_fas.".merchantid,   
                            ".$this->DB_product_fas.".productname,
                            ".$this->DB_product_fas.".productdesc,
                            ".$this->DB_product_fas.".productshortdesc,
                            ".$this->DB_product_fas.".slug,
                            ".$this->DB_product_fas.".discount_percentage,
                            ".$this->DB_product_fas.".productfrontimage,
                            ".$this->DB_product_fas.".sales,
                                
                            SUM(".$this->DB_prd_qty_c_s.".quantity) AS sum_quntity,
                            SUM(".$this->DB_prd_qty_c_s.".productinstock) AS sum_productinstock,
                            count(DISTINCT ".$this->DB_prd_qty_c_s.".colorid ) AS full_color_count,
                            count(DISTINCT ".$this->DB_prd_qty_c_s.".discount_price ) AS full_discount_price_count
                            
                        ")
                ->from($this->DB_prd_qty_c_s)
                ->join( $this->DB_product_fas, " ".$this->DB_product_fas.".id = ".$this->DB_prd_qty_c_s.".productid " , "LEFT" )         //Join product_fashion to Prod_qty_color Table
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_product_fas.".merchantid " , "LEFT" )         //Join product_fashion to restaurants Table
                ->join( $this->DB_color, " ".$this->DB_color.".id = ".$this->DB_prd_qty_c_s.".colorid " , "LEFT")
                ->join( $this->DB_size, " ".$this->DB_size.".id = ".$this->DB_prd_qty_c_s.".sizeid " , "LEFT")
                ->join("    
                        (
                            SELECT ".$this->DB_prd_fashionimg.".id,".$this->DB_prd_fashionimg.".productid,".$this->DB_prd_fashionimg.".imagename
                            FROM ".$this->DB_prd_fashionimg." where colorimg= 0
                            GROUP BY ".$this->DB_prd_fashionimg.".productid
                        ) ".$this->DB_prd_fashionimg." " 
                        , " ".$this->DB_prd_fashionimg.".productid = ".$this->DB_prd_qty_c_s.".productid " , "LEFT")
                //->where(" ".$this->DB_prd_qty_c_s.".productid ", $by_prodid)
                ->where(" ".$this->DB_product_fas.".status ", 1)
                ->where(" ".$this->DB_prd_qty_c_s.".status ", 1)
                ->where(" ".$this->DB_res.".status ", 1)
                ->where(" ".$this->DB_product_fas.".isdeleted ", 0)
                ->where(" ".$this->DB_prd_qty_c_s.".isdeleted ", 0)
                ->group_by(" ".$this->DB_prd_qty_c_s.".productid");
            
            if(!empty($by_prodid))
                {
                    $this->db->where(" ".$this->DB_prd_qty_c_s.".productid ", $by_prodid);
                }
            elseif(!empty($by_storeid))
                {
                    $this->db->where(" ".$this->DB_prd_qty_c_s.".productid ", $by_storeid);
                }
            
            $query = $this->db->get();
            $get_prod_details	= array();
            //print("<pre>".print_r($by_id,true)."</pre>");die;
            if($query->num_rows() > 0)
            {
                foreach($query->result() as $row)
                    {
                       
                        $get_prod_details[$row->id]['id']                   =   $row->id;
                        $get_prod_details[$row->id]['prd_id']               =   $row->productid;
                        $get_prod_details[$row->id]['frontimage']           =   $row->productfrontimage;
                        $get_prod_details[$row->id]['imagename']            =   $row->imagename;
                        $get_prod_details[$row->id]['storeid']              =   $row->merchantid;
                        $get_prod_details[$row->id]['storename']            =   $row->companyname;
                        $get_prod_details[$row->id]['store_url']            =   $row->companyurl;
                        $get_prod_details[$row->id]['prd_url']              =   $row->slug;
                        $get_prod_details[$row->id]['productname']          =   $row->productname;
                        $get_prod_details[$row->id]['productshortdesc']     =   $row->productshortdesc;
                        $get_prod_details[$row->id]['productdesc']          =   $row->productdesc;
                        $get_prod_details[$row->id]['quantity']             =   $row->sum_quntity;
                        $get_prod_details[$row->id]['quantity_instock']     =   $row->sum_productinstock;
                        $get_prod_details[$row->id]['price']                =   $row->price;
                        $get_prod_details[$row->id]['discount_percentage']  =   $row->discount_percentage;
                        $get_prod_details[$row->id]['discount_price_count'] =   $row->full_discount_price_count;
                        $get_prod_details[$row->id]['sales']                =   $row->sales;
                        $get_prod_details[$row->id]['discount_price']       =   $row->discount_price;
                        $get_prod_details[$row->id]['sizecode']             =   $row->sizecode;
                        $get_prod_details[$row->id]['colorname']            =   $row->colorname;
                        $get_prod_details[$row->id]['color_count']          =   $row->full_color_count;
                           
                    }
            }
            //print("<pre>".print_r($get_prod_details,true)."</pre>");die;
            return $get_prod_details;
            
            
        }
        
    public function cat_parent($by_id)
    {
        $_id = $this->db->get_where($this->DB_cat_fas , array( 'id' =>  $by_id, 'isdeleted' =>0 ))->row(); 
            if($_id == TRUE)
                {
                    return $_id->categoryname;
                }
    }
    public function sum_qty($by_id) 
    {
        $this->db->select("SUM( ".$this->DB_prd_qty_c_s.".productinstock) AS sum_productinstock,")
                 ->from($this->DB_prd_qty_c_s)
                 ->where('isdeleted',0)
                ->where('productid',$by_id);
            $query = $this->db->get();
            if($query->num_rows()>0) 
                {
                    $data = $query->row_array();
                    $value = $data['sum_productinstock'];
                    Return $value;
                }

    }
    
        var $order_set = array(
                                "products_fashion.createdat " ,
                                //"productimages.imagename",
                                NULL,
                                "products_fashion.productname",
                                "categories_fashion.categoryname",
                                NULL,
                                //NULL,
                                "product_qty_color_size.price",
                                "products_fashion.status",
                                NULL,
                            ); //set column field database for datatable orderable
    
    public function _make() {
        
        $by_id = $_SESSION['rest_id'];
        
        $order_search = array(
                                " ".$this->DB_product_fas.".createdat " ,
                                " ".$this->DB_product_fas.".productname",
                                " ".$this->DB_prd_qty_c_s.".price",
                                " ".$this->DB_cat_fas.".categoryname"
                            );
        
        
        $this->db->select("
                            ".$this->DB_prd_fashionimg.".imagename, 
                            ".$this->DB_product_fas.".* ,
                    
                            ".$this->DB_cat_fas.".id AS category_id,
                            ".$this->DB_cat_fas.".categoryparentid,
                            ".$this->DB_cat_fas.".categoryname,
                                
                            
                            ".$this->DB_prd_qty_c_s.".price,
                            min(".$this->DB_prd_qty_c_s.".price) AS min_price,
                            max(".$this->DB_prd_qty_c_s.".price) AS max_price,
                            count(DISTINCT ".$this->DB_prd_qty_c_s.".id) AS variant,
                                
                        ")
                ->from($this->DB_product_fas)
                ->join( $this->DB_prd_qty_c_s, " ".$this->DB_prd_qty_c_s.".productid = ".$this->DB_product_fas.".id ",'left')
                ->join( $this->DB_cat_prd, " ".$this->DB_cat_prd.".product_fasid = ".$this->DB_product_fas.".id ", 'left')
                ->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid ", 'left')
               
                ->join("    
                        (
                            SELECT ".$this->DB_prd_fashionimg.".id,".$this->DB_prd_fashionimg.".productid,".$this->DB_prd_fashionimg.".imagename
                            FROM ".$this->DB_prd_fashionimg." where colorimg= 0
                            GROUP BY ".$this->DB_prd_fashionimg.".productid
                        ) ".$this->DB_prd_fashionimg." " 
                        , " ".$this->DB_prd_fashionimg.".productid = ".$this->DB_product_fas.".id " , "LEFT")
                ->where(" ".$this->DB_product_fas.".isdeleted ", 0)
                ->where(" ".$this->DB_product_fas.".merchantid ", $by_id)
                //->order_by(" ".$this->DB_product_fas.".createdat", "DESC")
                ->group_by(" ".$this->DB_product_fas.".id ");

        $i=0;
        foreach ($order_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_product_fas.".merchantid ", $by_id);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                              ->where(" ".$this->DB_product_fas.".merchantid ", $by_id);
                }
                if(count($order_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->order_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_product_fas.".status", 'ASC');
            $this->db->order_by(" ".$this->DB_product_fas.".createdat", 'DESC');
        }
    }
    
    
    public function _get_product() 
    {
        $this->_make();
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data()
    {  
           $this->_make();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_product_all()  
    {  
        $by_id = $_SESSION['rest_id']; 
         $this->db->select("
                            ".$this->DB_prd_fashionimg.".imagename, 
                            ".$this->DB_product_fas.".* ,
                    
                            ".$this->DB_cat_fas.".id AS category_id,
                            ".$this->DB_cat_fas.".categoryparentid,
                            ".$this->DB_cat_fas.".categoryname,
                                
                            
                            ".$this->DB_prd_qty_c_s.".price,
                            min(".$this->DB_prd_qty_c_s.".price) AS min_price,
                            max(".$this->DB_prd_qty_c_s.".price) AS max_price,
                            count(DISTINCT ".$this->DB_prd_qty_c_s.".id) AS variant,
                                
                        ")
                ->from($this->DB_product_fas)
                ->join( $this->DB_prd_qty_c_s, " ".$this->DB_prd_qty_c_s.".productid = ".$this->DB_product_fas.".id ",'left')
                ->join( $this->DB_cat_prd, " ".$this->DB_cat_prd.".product_fasid = ".$this->DB_product_fas.".id ", 'left')
                ->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid ", 'left')
               
                ->join("    
                        (
                            SELECT ".$this->DB_prd_fashionimg.".id,".$this->DB_prd_fashionimg.".productid,".$this->DB_prd_fashionimg.".imagename
                            FROM ".$this->DB_prd_fashionimg." where colorimg= 0
                            GROUP BY ".$this->DB_prd_fashionimg.".productid
                        ) ".$this->DB_prd_fashionimg." " 
                        , " ".$this->DB_prd_fashionimg.".productid = ".$this->DB_product_fas.".id " , "LEFT")
                ->where(" ".$this->DB_product_fas.".isdeleted ", 0)
                ->where(" ".$this->DB_product_fas.".merchantid ", $by_id)
                ->order_by(" ".$this->DB_product_fas.".createdat", "DESC")
                ->group_by(" ".$this->DB_product_fas.".id ");

        return $this->db->count_all_results();  
    
    }
    
    public function _update_status($id,$value) 
        {
            $this->db->set('status', $value); 
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_product_fas); 
            return true;
            
        }
        
    public function _save_product($data) 
    {
        $config = array(
                        'table' => $this->DB_product_fas,
                        'id' => 'id',
                        'field' => 'slug',
                        'title' => 'title',
                        'replacement' => 'dash' // Either dash or underscore
                        );
        $this->load->library('slug', $config);
            
        $data_slug = array(
                'slug' => $_POST["product_name"],       // slug name of filed in db were ur url is stored
                );
        $data['slug'] = $this->slug->create_uri($data_slug);

        $this->db->insert($this->DB_product_fas, $data); // save to db
        return $this->db->insert_id();
        
    }
    
    public function _savevariant($data) 
    {
        $this->db->insert($this->DB_prd_qty_c_s, $data); // save to db
        if ( $this->db->affected_rows() > 0 )
        {
            return TRUE;
        } 
    }
    
    public function _save_categories($data) 
    {
        $this->db->insert($this->DB_cat_prd, $data); // save to db
        if ( $this->db->affected_rows() > 0 )
        {
            return TRUE;
        } 
    }
    public function _update_image($data,$where) 
    {
        $this->db->set($data); 
        $this->db->where($where); //which row want to upgrade  
        $this->db->update($this->DB_prd_fashionimg); 
        return true;
    }
    public function _getcolorid($by_value) 
    {
        $this->db->select("*")
                 ->from($this->DB_color)
                 ->where('isdeleted',0)
                ->where('colorname',$by_value);
            $query = $this->db->get();
            if($query->num_rows()>0) 
                {
                    $data = $query->row_array();
                    $value = $data['id'];
                    Return $value;
                }

    }
    
    public function _getsizeid($by_value) 
    {
        $this->db->select("*")
                 ->from($this->DB_size)
                 ->where('isdeleted',0)
                ->where('sizecode',$by_value);
            $query = $this->db->get();
            if($query->num_rows()>0) 
                {
                    $data = $query->row_array();
                    $value = $data['id'];
                    Return $value;
                }

    }
    public function _getstoreid($url) 
        {
            $_id = $this->db->get_where($this->DB_res , array( 'slug' =>  $url, 'isdeleted' =>0 ))->row(); 
            if($_id == TRUE) { return $_id->id; }
            else {return FALSE; }
        }
    public function _getproductid($url) 
        {
            $_id = $this->db->get_where($this->DB_product_fas , array( 'slug' =>  $url, 'isdeleted' =>0 ))->row(); 
            if($_id == TRUE) { return $_id->id; }
            else {return FALSE; }
        }
        
    public function _getstoreurl($by_id) 
        {
            $_url = $this->db->get_where($this->DB_res , array( 'id' =>  $by_id, 'isdeleted' =>0 ))->row(); 
            if($_url == TRUE) { return $_url->slug; }
            else {return FALSE; }
        }
    public function _getproducturl($by_id) 
        {
            $_url = $this->db->get_where($this->DB_product_fas , array( 'id' =>  $by_id, 'isdeleted' =>0 ))->row(); 
            if($_url == TRUE) { return $_url->slug; }
            else {return FALSE; }
        }
        
    public function _getproductdetails_byid($by_id)
    {
        $this->db->select(" ".$this->DB_product_fas.".*, ".$this->DB_res.".companyname");
            $this->db->from($this->DB_product_fas);
            $this->db->where(" ".$this->DB_product_fas.".id ", $by_id)
                     ->where(" ".$this->DB_product_fas.".status ", 1)
                     ->where(" ".$this->DB_product_fas.".isdeleted ", 0);
            
            $this->db->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_product_fas.".merchantid ","LEFT ");
            
            
            $query = $this->db->get();
            $get_prod	= array();
            
            if($query->num_rows() > 0)
            {
                foreach($query->result() as $row)
                    {
                        
                        $get_prod[$row->id]['id']                =   $row->id;
                        $get_prod[$row->id]['adminid']           =   $row->adminid;
                        $get_prod[$row->id]['merchantid']        =   $row->merchantid;
                        $get_prod[$row->id]['storename']         =   $row->companyname;
                        $get_prod[$row->id]['slug']              =   $row->slug;
                        $get_prod[$row->id]['productfrontimage'] =   $row->productfrontimage;
                        $get_prod[$row->id]['productname']       =   $row->productname;
                        $get_prod[$row->id]['productdesc']       =   $row->productdesc;
                        $get_prod[$row->id]['productshortdesc']  =   $row->productshortdesc;
                        $get_prod[$row->id]['productlayawaystatus']  =   $row->productlayawaystatus;
                        $get_prod[$row->id]['sales']             =   $row->sales;
                        $get_prod[$row->id]['prd_price']         =   $this->_getprd_price($row->id);
                        $get_prod[$row->id]['prd_color']         =   $this->_getprd_color($row->id);
                        $get_prod[$row->id]['prd_size']          =   $this->_getprd_size($row->id);
                        $get_prod[$row->id]['prd_img']           =   $this->_getprd_img($row->id);
                    }
            }
            return $get_prod;
    }
    public function _getprd_color($by_id) 
    {
        $this->db->select("
                            ".$this->DB_prd_qty_c_s.".id as prd_color_size_id,
                            ".$this->DB_prd_qty_c_s.".colorid,
                            ".$this->DB_color.".id,
                            ".$this->DB_prd_qty_c_s.".colorimagename,
                            ".$this->DB_color.".colorname,
                            ".$this->DB_color.".colorcode,
                            ".$this->DB_prd_qty_c_s.".colorimage
                        ")
                ->from($this->DB_prd_qty_c_s)
                ->where(" ".$this->DB_prd_qty_c_s.".productid ", $by_id)
                ->where(" ".$this->DB_prd_qty_c_s.".status ", 1)
                ->where(" ".$this->DB_prd_qty_c_s.".isdeleted ", 0)
                ->group_by(" ".$this->DB_prd_qty_c_s.".colorid")
                ->join( $this->DB_color, " ".$this->DB_color.".id = ".$this->DB_prd_qty_c_s.".colorid ","LEFT ");
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
          
        
        
    }
    public function _getprd_size($by_id) 
    {
        $this->db->select("
                            ".$this->DB_prd_qty_c_s.".sizeid,
                            ".$this->DB_size.".sizecode,
                            ".$this->DB_size.".sizename
                        ")
                ->from($this->DB_prd_qty_c_s)
                ->where(" ".$this->DB_prd_qty_c_s.".productid ", $by_id)
                ->where(" ".$this->DB_prd_qty_c_s.".status ", 1)
                ->where(" ".$this->DB_prd_qty_c_s.".isdeleted ", 0)
                ->group_by(" ".$this->DB_prd_qty_c_s.".sizeid")
                ->join( $this->DB_size, " ".$this->DB_size.".id = ".$this->DB_prd_qty_c_s.".sizeid " ,"LEFT ")
                ->order_by(" ".$this->DB_size.".arrange", 'ASC');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
    }
    public function _getprd_img($by_id) 
    {
        $this->db->select("id,imagename")
                ->from($this->DB_prd_fashionimg)
                ->where(" ".$this->DB_prd_fashionimg.".productid ", $by_id)
                ->where(" ".$this->DB_prd_fashionimg.".colorimg ", 0)
                ->where(" ".$this->DB_prd_fashionimg.".status ", 1)
                ->where(" ".$this->DB_prd_fashionimg.".isdeleted ", 0)
                ->order_by("arrange", 'ASC');
        $query = $this->db->get();
          
        return $query->result_array();
    }
    public function _getprd_price($by_id) 
    {
        
        $this->db->select("
                            price,
                            discount_price,
                            jpoints,
                            min(price) AS min_price,
                            max(price) AS max_price,
                            min(discount_price) as min_discount_price,
                            max(discount_price) as max_discount_price,
                            SUM(productinstock) as productinstock
                         ")
                ->from($this->DB_prd_qty_c_s)
                ->where(" ".$this->DB_prd_qty_c_s.".productid ", $by_id)
                ->where(" ".$this->DB_prd_qty_c_s.".status ", 1)
                ->where(" ".$this->DB_prd_qty_c_s.".isdeleted ", 0);
        $query = $this->db->get();
          
        return $query->result_array();
    }
    
    
    
    // THIS FEILD GET ALL ORDERS
        
        var $list_order_set = array(
                                
                                " orderlistdetails.createdat",
                                " orderlistdetails.ordercode",
                                " orderlistdetails.productname",
                                NULL,
                                " orders.deliverytype ",
                                " orderlistdetails.quantity",
                                " orderlistdetails.price",
                                " orderlistdetails.status",
                                NULL,
                            ); //set column field database for datatable orderable
    
    
    
    public function _make_order() {
        
        $by_id = $_SESSION['rest_id'];
        
        $order_search = array(
                                
                                " ".$this->DB_ord_details.".createdat",
                                " ".$this->DB_ord_details.".ordercode",
                                " ".$this->DB_ord_details.".productname",
                                " " .$this->DB_ord.".deliverytype",
                                " ".$this->DB_ord_details.".quantity",
                                " ".$this->DB_ord_details.".price",
                                " ".$this->DB_ord_status.".orderstatus_desc"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_ord_details.".*,
                            ".$this->DB_ord.".deliverytype,
                            ".$this->DB_ord_status.".orderstatus_desc
                        ")
                ->from($this->DB_ord_details)
                ->join( $this->DB_ord, " ".$this->DB_ord.".id = ".$this->DB_ord_details.".orderid " )
                ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                ->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                ->where(" ".$this->DB_ord_details.".restaurantid ", $by_id);
       

        $i=0;
        foreach ($order_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                            ->where(" ".$this->DB_ord_details.".restaurantid ", $by_id);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                            ->where(" ".$this->DB_ord_details.".restaurantid ", $by_id);
                }
                if(count($order_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->list_order_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_ord_details.".status", 'ASC');
            $this->db->order_by(" ".$this->DB_ord_details.".createdat", 'DESC');
        }
    }
    
    public function _get_order() 
    {
        $this->_make_order();
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_order()
    {  
           $this->_make_order();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_all_order()  
    {  
        $by_id = $_SESSION['rest_id']; 
        $this->db->select(" 
                            ".$this->DB_ord_details.".*,
                            ".$this->DB_ord.".deliverytype,
                            ".$this->DB_ord_status.".orderstatus_desc
                        ")
                ->from($this->DB_ord_details)
                ->join( $this->DB_ord, " ".$this->DB_ord.".id = ".$this->DB_ord_details.".orderid " )
                ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                ->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                ->where(" ".$this->DB_ord_details.".restaurantid ", $by_id);

        return $this->db->count_all_results();  
    }
    
    
    
    
    // THIS FIELD GET ORDER BY PENDING, PROCESING ETC
    public function _make_order_by($ord_by) {
        
        $by_id = $_SESSION['rest_id'];
        
        $order_search = array(
                                
                                " ".$this->DB_ord_details.".createdat",
                                " ".$this->DB_ord_details.".ordercode",
                                " ".$this->DB_ord_details.".productname",
                                " " .$this->DB_ord.".deliverytype",
                                " ".$this->DB_ord_details.".quantity",
                                " ".$this->DB_ord_details.".price",
                                " ".$this->DB_ord_status.".orderstatus_desc"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_ord_details.".*,
                            ".$this->DB_ord.".deliverytype,
                            ".$this->DB_ord_status.".orderstatus_desc
                        ")
                ->from($this->DB_ord_details)
                ->join( $this->DB_ord, " ".$this->DB_ord.".id = ".$this->DB_ord_details.".orderid " )
                ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                ->where(" ".$this->DB_ord_details.".status ", $ord_by)
                ->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                ->where(" ".$this->DB_ord_details.".restaurantid ", $by_id);
       

        $i=0;
        foreach ($order_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_ord_details.".status ", $ord_by)
                            ->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                            ->where(" ".$this->DB_ord_details.".restaurantid ", $by_id);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_ord_details.".status ", $ord_by)
                            ->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                            ->where(" ".$this->DB_ord_details.".restaurantid ", $by_id);
                }
                if(count($order_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->list_order_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_ord_details.".status", 'ASC');
            $this->db->order_by(" ".$this->DB_ord_details.".createdat", 'DESC');
        }
    }
    
    public function _get_order_by($ord_by) 
    {
        $this->_make_order_by($ord_by);
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_order_by($ord_by)
    {  
           $this->_make_order_by($ord_by);  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_all_order_by($ord_by)  
    {  
        $id = $_SESSION['rest_id']; 
        $this->db->select(" 
                            ".$this->DB_ord_details.".*,
                            ".$this->DB_ord.".deliverytype,
                            ".$this->DB_ord_status.".orderstatus_desc
                        ")
                ->from($this->DB_ord_details)
                ->join( $this->DB_ord, " ".$this->DB_ord.".id = ".$this->DB_ord_details.".orderid " )
                ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                ->where(" ".$this->DB_ord_details.".status ", $ord_by)
                ->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                ->where(" ".$this->DB_ord_details.".restaurantid ", $id);

        return $this->db->count_all_results();  
    }
    
    
    
    
    
    
    public function _unseen_orders() {
        
        $by_id = $_SESSION['rest_id'];
        
        if($_POST["view"] != '')
        {
            $this->db->set('read_status', 1); 
            $this->db->where('restaurantid', $by_id); //which row want to upgrade  
            $this->db->update($this->DB_ord_details); 
            
        
        }
        else 
            {
        
            /*
             * 
             $this ->db->where(" read_status ", 0)
                        ->where(" isdeleted ", 0)
                        ->where("restaurantid ", $by_id);
             $query = $this->db->get($this->DB_ord_details);
             $query->num_rows();
             return $query;


             */ 
             $this->db->where("read_status ", 0)
                      ->where("isdeleted ", 0)
                      ->where("restaurantid ", $by_id);
             $query= $this->db->count_all_results($this->DB_ord_details);
             return $query;
             
            }
        //print("<pre>".print_r($query,true)."</pre>");
        //die;
        
    }
    
    public function _get_all_orderrecord()
    {
        $by_id = $_SESSION['rest_id'];
        $this ->db->select('*')
                   ->from($this->DB_ord_details)
                    ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                   ->where_in(" ".$this->DB_ord_details.".status ", array(1,2,3,4))
                   ->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                   ->where(" ".$this->DB_ord_details.".restaurantid ", $by_id);
        $total = $this->db->count_all_results();
	return $total;
           //$query = $this->db->get();
           //return $query->result();
           //print("<pre>".print_r($query,true)."</pre>");
           //die;
    }
    public function _get_pending_order()
    {
        $by_id = $_SESSION['rest_id'];
        $this ->db->select('*')
                   ->from($this->DB_ord_details)
                    ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                   ->where(" ".$this->DB_ord_details.".status ", 1)
                   ->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                   ->where(" ".$this->DB_ord_details.".restaurantid ", $by_id);
        $total = $this->db->count_all_results();
	return $total;
           //$query = $this->db->get();
           //return $query->result();
           //print("<pre>".print_r($query,true)."</pre>");
           //die;
    }
    
    public function _get_processing_order()
    {
        $by_id = $_SESSION['rest_id'];
        $this ->db->select('*')
                   ->from($this->DB_ord_details)
                    ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                   ->where(" ".$this->DB_ord_details.".status ", 2)
                   ->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                   ->where(" ".$this->DB_ord_details.".restaurantid ", $by_id);
           $query = $this->db->get();
           return $query->result();
    }
    
    public function _get_delivery_order()
    {
        $by_id = $_SESSION['rest_id'];
        $this ->db->select('*')
                   ->from($this->DB_ord_details)
                    ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                   ->where(" ".$this->DB_ord_details.".status ", 3)
                   ->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                   ->where(" ".$this->DB_ord_details.".restaurantid ", $by_id);
        $total = $this->db->count_all_results();
	return $total;
           //$query = $this->db->get();
           //return $query->result();
    }
    
    public function _get_delivered_order()
    {
        $by_id = $_SESSION['rest_id'];
        $this ->db->select('*')
                   ->from($this->DB_ord_details)
                    ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                   ->where(" ".$this->DB_ord_details.".status ", 4)
                   ->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                   ->where(" ".$this->DB_ord_details.".restaurantid ", $by_id);
           $query = $this->db->get();
           return $query->result();
    }
    
    public function _get_canceled_order()
    {
        $by_id = $_SESSION['rest_id'];
        $this ->db->select('*')
                   ->from($this->DB_ord_details)
                    ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                   ->where(" ".$this->DB_ord_details.".status ", 5)
                   ->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                   ->where(" ".$this->DB_ord_details.".restaurantid ", $by_id);
           $query = $this->db->get();
           return $query->result();
    }
    
    public function _update_order_flow($status, $id)
    {
        $by_id = $_SESSION['rest_id'];
        if ( $status == 5)
        {
            $this->db->set('cancledordercomment', $_POST['ord_note']); 
        }
        $this->db->set('status', $status); 
        $this->db->where('id', $id); //which row want to upgrade 
        $this->db->where('restaurantid', $by_id); //which row want to upgrade  
        $this->db->update($this->DB_ord_details); 
        return true;
    }
    
    public function _update_restaurant_data($data) 
    {
        $config = array(
                        'table' => $this->DB_res,
                        'id' => 'id',
                        'field' => 'slug',
                        'title' => 'title',
                        'replacement' => 'dash' // Either dash or underscore
                        );
        $this->load->library('slug', $config);

        $data_slug = array(
                        'slug' => $_POST["r_name"],       // slug name of filed in db were ur url is stored
                        );
        $data['slug'] = $this->slug->create_uri($data_slug, $_SESSION['rest_id'] );
            
        $this->db->where('id', $_SESSION['rest_id'] );
        $this->db->update($this->DB_res, $data);
        return true;
    }
    
    public function _update_general_data( $data)
    {
        $this->db->where('restaurantid', $_SESSION['rest_id'] );//which row want to upgrade  
        $this->db->update($this->DB_user, $data); 
        return true;
    }
    
    public function check_User_pwd($pwd) 
    {
        $query = $this->db->get_where($this->DB_user, array(
                                                        'id' => (int)$_SESSION['User_id'] ,
                                                        'password' => $pwd,
                                                        'isdeleted' =>'0'
                                                            )
                                                        );
        return $query->result();
    }
    
    public function Update_pwd($pwd) 
    {
        $this->db->where('id', (int)$_SESSION['User_id'] );
        $query = $this->db->update($this->DB_user, array('password' => $pwd ));
        if($query)
        {
                return TRUE;
        }else{
                return FALSE;
        }
    }
    
     public function get_order_products_where($by_id)
        {
            $rest_id = $_SESSION['rest_id'];
            $this->db->select("*")
                 ->from($this->DB_ord_details)
                ->where('restaurantid ',$rest_id)
                 ->where('id',$by_id);
            
                    

		$query = $this->db->get();

		$get_rest = array();

		if($query->num_rows() > 0)
                    {
			foreach ($query->result() as $row)
			   {
                                $rest_id                            =   $row->id; //get id of each restaurant for
                                $get_rest[$row->id]['id']           =   $row->id;
                                $get_rest[$row->id]['ordercode']    =   $row->ordercode;
                                $get_rest[$row->id]['product_fashionid']    =   $row->product_fashionid;
                                $get_rest[$row->id]['productname']  =   $row->productname;
                                $get_rest[$row->id]['addedmenu']    =   $row->addedmenu;
                                $get_rest[$row->id]['quantity']     =   $row->quantity;
                                $get_rest[$row->id]['price']        =   $row->price;
                                $get_rest[$row->id]['color']        =   $row->color;
                                $get_rest[$row->id]['size']         =   $row->size;
                                $get_rest[$row->id]['note']         =   $row->note;
                                $get_rest[$row->id]['status']       =   $row->status;
                                $get_rest[$row->id]['createdat']    =   $row->createdat;
                                
                                
                                
                                $get_rest[$rest_id]['orderid']    =   $this->get_orders_where($row->orderid);
                                
			   }
                    }
                else 
                   {

                   }
                
		return $get_rest;
                /*
                 * var_dump($get_rest);
                 * print("<pre>".print_r($get_rest,true)."</pre>");die;
                 */
        }
        
        public function get_orders_where($by_id)
    {
            $this->db->select('*');
            $this->db->from($this->DB_ord);
            $this->db->where("".$this->DB_ord.".id", $by_id);
            $this->db->where("".$this->DB_ord.".status", "1");

            $this->db->join( $this->DB_address, " ".$this->DB_ord.".accountaddressid = ".$this->DB_address.".id ");

            $query = $this->db->get();
            $list	= array();

            if($query->num_rows() > 0)
            {
                    foreach($query->result() as $row)
                    {
                            $list[$row->id]['order_id']			= $row->id;
                            $list[$row->id]['reference']                = $row->reference;
                            $list[$row->id]['vat']                      = $row->vat;
                            $list[$row->id]['additionalcharges']	= $row->additionalcharges;
                            $list[$row->id]['discount']			= $row->discount;
                            
                            $list[$row->id]['firstname']		= $row->firstname;
                            $list[$row->id]['lastname']			= $row->lastname;
                            $list[$row->id]['phone']                    = $row->phone;
                            $list[$row->id]['phone2']			= $row->phone2;
                            $list[$row->id]['address']			= $row->address;
                            
                            
                            $list[$row->id]['state']      =   $this->get_state_where($row->stateid);
                            $list[$row->id]['city']       =   $this->get_city_where($row->cityid);

                    }	
            }

            return $list;
    }
    
    public function _get_allsize_byprdid($by_id) 
    {
        $this->db->select("
                            ".$this->DB_prd_qty_c_s.".sizeid,
                            ".$this->DB_size.".sizecode,
                            ".$this->DB_size.".sizename,
                            ".$this->DB_prd_qty_c_s.".productinstock,
                            SUM(".$this->DB_prd_qty_c_s.".productinstock) AS sum_productinstock,
                        ")
                ->from($this->DB_prd_qty_c_s)
                ->where(" ".$this->DB_prd_qty_c_s.".productid ", $by_id)
                ->where(" ".$this->DB_prd_qty_c_s.".status ", 1)
                ->where(" ".$this->DB_prd_qty_c_s.".isdeleted ", 0)
                ->group_by(" ".$this->DB_prd_qty_c_s.".sizeid")
                ->join( $this->DB_size, " ".$this->DB_size.".id = ".$this->DB_prd_qty_c_s.".sizeid " ,"LEFT ")
                ->order_by(" ".$this->DB_size.".arrange", 'ASC');
        $query = $this->db->get()->result();
        return $query;
        
    }
    public function _get_size_bycolorid($by_id,$by_prdid) 
    {
        
        $this->db->select("
                            ".$this->DB_prd_qty_c_s.".sizeid,
                            ".$this->DB_size.".sizecode,
                            ".$this->DB_size.".sizename,
                            ".$this->DB_prd_qty_c_s.".productinstock
                        ")
                ->from($this->DB_prd_qty_c_s)
                ->where(" ".$this->DB_prd_qty_c_s.".productid ", $by_prdid)
                ->where(" ".$this->DB_prd_qty_c_s.".colorid ", $by_id)
                ->where(" ".$this->DB_prd_qty_c_s.".status ", 1)
                ->where(" ".$this->DB_prd_qty_c_s.".isdeleted ", 0)
                ->group_by(" ".$this->DB_prd_qty_c_s.".sizeid")
                ->join( $this->DB_size, " ".$this->DB_size.".id = ".$this->DB_prd_qty_c_s.".sizeid " ,"LEFT ")
                ->order_by(" ".$this->DB_size.".arrange", 'ASC');
        
        $query = $this->db->get()->result();
        //print("<pre>".print_r($query,true)."</pre>");die;
        return $query;
    }
    
    
    public function _get_color_bysizeid($by_id,$by_prdid) 
    {
        
        $this->db->select("
                            ".$this->DB_prd_qty_c_s.".colorid,
                            ".$this->DB_color.".id,
                            ".$this->DB_prd_qty_c_s.".colorimagename,
                            ".$this->DB_color.".colorname,
                            ".$this->DB_color.".colorcode,
                            ".$this->DB_prd_qty_c_s.".colorimage,
                            ".$this->DB_prd_qty_c_s.".productinstock
                        ")
                ->from($this->DB_prd_qty_c_s)
                ->where(" ".$this->DB_prd_qty_c_s.".productid ", $by_prdid)
                ->where(" ".$this->DB_prd_qty_c_s.".sizeid ", $by_id)
                ->where(" ".$this->DB_prd_qty_c_s.".status ", 1)
                ->where(" ".$this->DB_prd_qty_c_s.".isdeleted ", 0)
                ->group_by(" ".$this->DB_prd_qty_c_s.".colorid")
                ->join( $this->DB_color, " ".$this->DB_color.".id = ".$this->DB_prd_qty_c_s.".colorid " ,"LEFT ");
        
        $query = $this->db->get()->result();
        //print("<pre>".print_r($query,true)."</pre>");die;
        return $query;
    }
    
    public function _get_price_qty($by_prdid,$by_colorid,$by_sizeid=null) 
    {
        
        $this->db->select("
                            price,
                            discount_price,
                            jpoints
                         ");
        $this->db->from($this->DB_prd_qty_c_s);
        $this->db->where(" ".$this->DB_prd_qty_c_s.".productid ", $by_prdid);
        $this->db->where(" ".$this->DB_prd_qty_c_s.".colorid ", $by_colorid);
                
        if(isset($by_sizeid)) // here order processing
        {
            $this->db->where(" ".$this->DB_prd_qty_c_s.".sizeid ", $by_sizeid);
        }
        $this->db->where(" ".$this->DB_prd_qty_c_s.".status ", 1);
        $this->db->where(" ".$this->DB_prd_qty_c_s.".isdeleted ", 0);
        $query = $this->db->get()->result();
        //print("<pre>".print_r($query,true)."</pre>");die;
        return $query;
    }
    
    
    var $stock_set = array(
                                NULL,
                                "products_fashion.productname",
                                //"categories_fashion.categoryname",
                                NULL,
                                NULL,
                                "product_qty_color_size.productinstock",
                                "product_qty_color_size.price",
                                NULL,
                            ); //set column field database for datatable orderable
    
    public function _make_stock() {
        
        $by_id = $_SESSION['rest_id'];
        
        $stock_search = array(
                                " ".$this->DB_product_fas.".productname",
                                " ".$this->DB_prd_qty_c_s.".price",
                                " ".$this->DB_prd_qty_c_s.".productinstock"
                            );
        
        
        $this->db->select("
                            ".$this->DB_prd_fashionimg.".imagename, 
                            ".$this->DB_product_fas.".* ,
                    
                            ".$this->DB_cat_fas.".id AS category_id,
                            ".$this->DB_cat_fas.".categoryparentid,
                            ".$this->DB_cat_fas.".categoryname,
                                
                            
                            ".$this->DB_prd_qty_c_s.".price,
                            min(".$this->DB_prd_qty_c_s.".price) AS min_price,
                            max(".$this->DB_prd_qty_c_s.".price) AS max_price,
                            ".$this->DB_prd_qty_c_s.".id AS variant_id,
                            count(DISTINCT ".$this->DB_prd_qty_c_s.".id) AS variant,
                            ".$this->DB_prd_qty_c_s.".sizeid AS variant_sizeid,
                            ".$this->DB_prd_qty_c_s.".colorid AS variant_colorid,
                            ".$this->DB_prd_qty_c_s.".colorimagename AS variant_colorimagename,
                            ".$this->DB_prd_qty_c_s.".price AS variant_price,
                            ".$this->DB_prd_qty_c_s.".discount_price AS variant_discount_price,
                                
                        ")
                ->from($this->DB_product_fas)
                ->join( $this->DB_prd_qty_c_s, " ".$this->DB_prd_qty_c_s.".productid = ".$this->DB_product_fas.".id ",'left')
                ->join( $this->DB_cat_prd, " ".$this->DB_cat_prd.".product_fasid = ".$this->DB_product_fas.".id ", 'left')
                ->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid ", 'left')
               
                ->join("    
                        (
                            SELECT ".$this->DB_prd_fashionimg.".id,".$this->DB_prd_fashionimg.".productid,".$this->DB_prd_fashionimg.".imagename
                            FROM ".$this->DB_prd_fashionimg." where colorimg= 0
                            GROUP BY ".$this->DB_prd_fashionimg.".productid
                        ) ".$this->DB_prd_fashionimg." " 
                        , " ".$this->DB_prd_fashionimg.".productid = ".$this->DB_product_fas.".id " , "LEFT")
                ->where(" ".$this->DB_product_fas.".isdeleted ", 0)
                ->where(" ".$this->DB_product_fas.".merchantid ", $by_id)
                //->order_by(" ".$this->DB_product_fas.".createdat", "DESC")
                ->group_by(" ".$this->DB_product_fas.".id ");

        $i=0;
        foreach ($stock_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_product_fas.".merchantid ", $by_id);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                              ->where(" ".$this->DB_product_fas.".merchantid ", $by_id);
                }
                if(count($stock_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->stock_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_product_fas.".status", 'ASC');
            $this->db->order_by(" ".$this->DB_product_fas.".createdat", 'DESC');
        }
    }
    
    
    public function _get_product_stock() 
    {
        $this->_make_stock();
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_stock_filtered_data()
    {  
           $this->_make_stock();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_product_stock_all()  
    {  
        $by_id = $_SESSION['rest_id']; 
         $this->db->select("
                            ".$this->DB_prd_fashionimg.".imagename, 
                            ".$this->DB_product_fas.".* ,
                    
                            ".$this->DB_cat_fas.".id AS category_id,
                            ".$this->DB_cat_fas.".categoryparentid,
                            ".$this->DB_cat_fas.".categoryname,
                                
                            
                            ".$this->DB_prd_qty_c_s.".price,
                            min(".$this->DB_prd_qty_c_s.".price) AS min_price,
                            max(".$this->DB_prd_qty_c_s.".price) AS max_price,
                            count(DISTINCT ".$this->DB_prd_qty_c_s.".id) AS variant,
                                
                        ")
                ->from($this->DB_product_fas)
                ->join( $this->DB_prd_qty_c_s, " ".$this->DB_prd_qty_c_s.".productid = ".$this->DB_product_fas.".id ",'left')
                ->join( $this->DB_cat_prd, " ".$this->DB_cat_prd.".product_fasid = ".$this->DB_product_fas.".id ", 'left')
                ->join( $this->DB_cat_fas, " ".$this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid ", 'left')
               
                ->join("    
                        (
                            SELECT ".$this->DB_prd_fashionimg.".id,".$this->DB_prd_fashionimg.".productid,".$this->DB_prd_fashionimg.".imagename
                            FROM ".$this->DB_prd_fashionimg."  where colorimg= 0
                            GROUP BY ".$this->DB_prd_fashionimg.".productid
                        ) ".$this->DB_prd_fashionimg." " 
                        , " ".$this->DB_prd_fashionimg.".productid = ".$this->DB_product_fas.".id " , "LEFT")
                ->where(" ".$this->DB_product_fas.".isdeleted ", 0)
                ->where(" ".$this->DB_product_fas.".merchantid ", $by_id)
                ->order_by(" ".$this->DB_product_fas.".createdat", "DESC")
                ->group_by(" ".$this->DB_product_fas.".id ");

        return $this->db->count_all_results();  
    
    }
    
    public function _update_price_stock($value,$where) 
    {
        $this->db->set( $value); 
        $this->db->where($where); //which row want to upgrade  
        $this->db->update($this->DB_prd_qty_c_s); 
        return true;

    }
    public function _update_sales($id,$value) 
    {
        $this->db->set('sales', $value); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_product_fas); 
        return true;

    }
    public function get_productstock_list($by_id)
    {
       $this->db->select("
                            ".$this->DB_prd_qty_c_s.".*,
                                
                            ".$this->DB_color.".colorname,
                                
                            ".$this->DB_size.".sizecode,
                            ".$this->DB_size.".sizename
                        ")
                ->from($this->DB_prd_qty_c_s)
                ->join( $this->DB_color, " ".$this->DB_color.".id = ".$this->DB_prd_qty_c_s.".colorid " , "LEFT")
                ->join( $this->DB_size, " ".$this->DB_size.".id = ".$this->DB_prd_qty_c_s.".sizeid " , "LEFT")
                ->where(" ".$this->DB_prd_qty_c_s.".productid ", $by_id)
                ->where(" ".$this->DB_prd_qty_c_s.".status ", 1)
                ->where(" ".$this->DB_prd_qty_c_s.".isdeleted ", 0)
                ->order_by(" ".$this->DB_prd_qty_c_s.".createdat", "DESC");
            
            $query = $this->db->get();
            return $query->result_array();
    }
    
    
    
    
    
    
    
    // THIS FEILD GET ALL merchant users
        
        var $users_set = array(
                                
                                null,
                                "users.createdat",
                                "users.firstname",
                                "users.lastname",
                                "users.email",
                                "users.userroleid",
                                null
                            ); //set column field database for datatable orderable
    
    public function _make_users() 
    {
        
        $rest_id = $_SESSION['rest_id']; 
        
        $users_search = array(
                                
                                " ".$this->DB_user.".createdat",
                                " ".$this->DB_user.".firstname",
                                " ".$this->DB_user.".lastname",
                                " ".$this->DB_user.".email",
                                " ".$this->DB_user_roles.".roleName"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_user.".*,
                            ".$this->DB_user_roles.".roleName
                        ")
                ->from($this->DB_user)
                ->join( $this->DB_user_roles, " ".$this->DB_user_roles.".id = ".$this->DB_user.".userroleid " )
                ->where(" ".$this->DB_user.".restaurantid ", (int)$rest_id)
                ->where(" ".$this->DB_user.".isdeleted ", 0);
        
        $i=0;
        foreach ($users_search as $item) // loop column 
        {   
            
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_user.".restaurantid ", (int)$rest_id)
                            ->where(" ".$this->DB_user.".isdeleted ", 0);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_user.".restaurantid ", (int)$rest_id)
                            ->where(" ".$this->DB_user.".isdeleted ", 0);
                }
                if(count($users_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->users_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by("FIELD ( ".$this->DB_user_roles.".roleName, 'Super Admin' )DESC, ".$this->DB_user_roles.".roleName");
            $this->db->order_by(" ".$this->DB_user.".createdat", 'DESC');
        }
    }
    
    public function _get_users() 
    {
        //print_r();
        $this->_make_users();
           
           if($_POST["length"] != -1)  
           {  
               // $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_users()
    {  
           $this->_make_users();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
    
    public function _get_all_users()  
    {  
        $rest_id = $_SESSION['rest_id'];
        $this->db->select(" 
                            ".$this->DB_user.".*,
                            ".$this->DB_user_roles.".roleName
                        ")
                ->from($this->DB_user)
                ->join( $this->DB_user_roles, " ".$this->DB_user_roles.".id = ".$this->DB_user.".userroleid " )
                ->where(" ".$this->DB_user.".restaurantid ", (int)$rest_id)
                ->where(" ".$this->DB_user.".isdeleted ", 0);
        return $this->db->count_all_results();  
    }
    
    public function _update_user_data($data)
    {
        $this->db->where('restaurantid', $_SESSION['rest_id'] );//which row want to upgrade
        $this->db->where('email', $_POST['useremail'] );
        $this->db->update($this->DB_user, $data); 
        return true;
    }
    
    public function _update_user_status($status, $id)
    {
        $this->db->set('status', $status); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_user); 
        return true;
    }
    public function _delete_user($by_id)
    {
        $this->db->set('isdeleted', 1); 
        $this->db->where('id', $by_id); //which row want to upgrade  
        $this->db->update($this->DB_user); 
        return true;
    }
    
    public function _user_role_rest($by_id)
    {
        $this->db->select('*');
        $this->db->from($this->DB_user_roles)
                ->where_in("roleFor ", array($by_id,"general"))
                ->where("status ", 1)
                ->order_by("createdat" , "DESC");

        $query = $this->db->get()->result();
        
        //print("<pre>".print_r($query,true)."</pre>");die;
        return $query;
   
    }
    public function get_user_info_byid ($by_id)
    {
        $query = $this->db->get_where($this->DB_user, array(
                                                        'id' => (int)$by_id,
                                                        'restaurantid' => (int)$_SESSION['rest_id'],
                                                        'isdeleted' =>'0'
                                                            )
                                                        );
        return $query->row();
    }
    
    
    
    
    // THIS FEILD GET ALL merchant users
        
        var $usersrole_set = array(
                                
                                null,
                                "user_roles.roleName",
                                null,null
                            ); //set column field database for datatable orderable
    
    public function _make_usersrole() 
    {
        
        $rest_id = $_SESSION['rest_id']; 
        
        $usersrole_search = array(
                                
                                " ".$this->DB_user_roles.".roleName"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_user_roles.".*
                        ")
                ->from($this->DB_user_roles)
                ->where_in(" ".$this->DB_user_roles.".roleFor ", array((int)$rest_id,"general"))
                ->where(" ".$this->DB_user_roles.".isdeleted ", 0);
        
        $i=0;
        foreach ($usersrole_search as $item) // loop column 
        {   
            
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where_in(" ".$this->DB_user_roles.".roleFor ", array((int)$rest_id,"general"))
                            ->where(" ".$this->DB_user_roles.".isdeleted ", 0);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where_in(" ".$this->DB_user_roles.".roleFor ", array((int)$rest_id,"general"))
                            ->where(" ".$this->DB_user.".isdeleted ", 0);
                }
                if(count($usersrole_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->usersrole_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
           $this->db->order_by("FIELD ( ".$this->DB_user_roles.".roleName, 'Super Admin' )DESC, ".$this->DB_user_roles.".roleName");
           $this->db->order_by(" ".$this->DB_user_roles.".createdat", 'DESC');
        }
    }
    
    public function _get_usersrole() 
    {
        //print_r();
        $this->_make_usersrole();
           
           if($_POST["length"] != -1)  
           {  
               // $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_usersrole()
    {  
           $this->_make_usersrole();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
    
    public function _get_all_usersrole()  
    {  
        $rest_id = $_SESSION['rest_id'];
        $this->db->select(" 
                            ".$this->DB_user_roles.".*
                        ")
                ->from($this->DB_user_roles)
                ->where_in(" ".$this->DB_user_roles.".roleFor ", array((int)$rest_id,"general"))
                ->where(" ".$this->DB_user_roles.".isdeleted ", 0);
        return $this->db->count_all_results();  
    }
    
    public function _insertnewuserroles($data)
    {
        $this->db->insert($this->DB_user_roles, $data);

        if ( $this->db->affected_rows() > 0 )
            {

                $_id = $this->db->get_where($this->DB_user_roles , $data)->row()->id; // get the id of save db

                return $_id;
            }
    }
    
    public function _update_userroles_status($status, $id)
    {
        $this->db->set('status', $status); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_user_roles); 
        return true;
    }
    public function _get_modules($sitetype) 
    {
        $this->db->select('*');
        $this->db->from($this->DB_system_modules)
                ->where("jollofsitetypeid ", $sitetype)
                ->where("moduleStatus ", 1);

        $query = $this->db->get()->result();
        
        //print("<pre>".print_r($query,true)."</pre>");die;
        return $query;
        
    }
    
    public function get_userrole_info_byid ($by_id)
    {
        $query = $this->db->get_where($this->DB_user_roles, array(
                                                        'id' => (int)$by_id,
                                                        //'roleFor' => (int)$_SESSION['rest_id'],
                                                        'isdeleted' =>'0'
                                                            )
                                                        );
        return $query->row();
    }
    function get_role_assign_byid($roleID,$sitetype)
    {
            $this->db->select('*');
            $this->db->from($this->DB_system_modules);
            $this->db->where("jollofsitetypeid ", $sitetype);
            $query = $this->db->get();
            if ($query->num_rows() > 0)
            {
                    $i = 0;
                    $data = array();
                    foreach ($query->result_array() as $row)
                    {
                            $data[$i] = $row;
                            $status = $this->Role_assignment->roleAssignmentStatus($roleID, $data[$i]['moduleID']);
                            if($status == true)
                                    $data[$i]['checkIt'] = 'yes';
                            else
                                    $data[$i]['checkIt'] = 'no';
                            $i++;
                    }
                    return $data;
            }
            else
                    return false;
    }
    public function _update_userroles_data($data)
    {
        $this->db->where('roleFor', $_SESSION['rest_id'] );//which row want to upgrade
        $this->db->where('id', $_POST['userrolenameid'] );
        $this->db->update($this->DB_user_roles, $data); 
        return true;
    }
    
    
    
    public function is_restaurant_email_available($data) 
    {
        $this->db->where($data);  
        $query = $this->db->get($this->DB_res);  

        if($query->num_rows() > 0)  
          {  
            return true;  
          }  
        else  
          {  
            return false;  
          }  
    }

    public function is_user_email_available($data) 
    {
        $this->db->where($data);  
        $query = $this->db->get($this->DB_user);  

        if($query->num_rows() > 0)  
          {  
            return true;  
          }  
        else  
          {  
            return false;  
          }  
    }
    public function _insertnewuser($data)
    {
        $this->db->insert($this->DB_user, $data);

        if ( $this->db->affected_rows() > 0 )
            {

                $_id = $this->db->get_where($this->DB_user , $data)->row()->id; // get the id of save db

                return $_id;
            }

    }
    
    
    
    
    /*
     * 
        SELECT
            X.id,
            X.productid,
            i.imagename,
            p.productname,
            X.quantity,
            X.price,
            c.colorname,
            s.sizecode
        FROM
            product_qty_color_size  X
        JOIN products_fashion  p
        ON
            p.id = X.productid
        LEFT JOIN color_tbl  c
        ON
            c.id = X.colorid
        LEFT JOIN size_tbl s
        ON
            s.id = X.sizeid


        LEFT JOIN (
          SELECT id, productid,imagename
          FROM productimages
          GROUP BY productid
        ) i
        ON 
                i.productid = x.productid

        WHERE
            X.productid = 2
        ORDER BY
            X.createdat
     */
    /*
     * 
     SELECT
        X.id,
        X.productid,
        i.imagename,
        p.productname,
        X.quantity,
        X.price,
        c.colorname,
        s.sizecode,
        SUM(x.quantity) AS sum_quntity,
        SUM(x.productinstock) AS sum_productinstock,
        count(DISTINCT x.colorid) as full_color_count
    FROM
        product_qty_color_size  X
    JOIN products_fashion  p
    ON
        p.id = X.productid
    LEFT JOIN color_tbl  c
    ON
        c.id = X.colorid
    LEFT JOIN size_tbl s
    ON
        s.id = X.sizeid


    LEFT JOIN (
      SELECT id, productid,imagename
      FROM productimages
      GROUP BY productid
    ) i
    ON 
            i.productid = x.productid


    GROUP BY x.productid
    ORDER BY
        X.createdat
     * 
     */
        
   
        
        

        
    
        
        
                
    

}
