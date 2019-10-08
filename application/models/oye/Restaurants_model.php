<?php

if(!defined('BASEPATH'))exit('No direct script access allowed');

class Restaurants_model extends CI_Model
{
    private $DB_res = "restaurants";
    private $DB_res_time = "restaurantstime";
    private $DB_product = "products_cuisine";
    private $DB_cat = "categories";
    private $DB_cusine_cat = "categories_cusine";
    private $DB_res_cat_assign = "cuisine_merchant_cate_assign";
    private $DB_state = "states";
    private $DB_city = "state_cities";
    private $DB_productmerges = "productmerges";
    private $DB_tablereserv = "tablereservations";
            
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
    
    public function get_day_where($by_id) 
        {
            
            $this->db->select('*')
                 ->from($this->DB_res_time)
                 ->where('restaurantid',(int)$by_id);
            
            $query = $this->db->get();
            return $query->result_array();
        }
    public function get_state_where($by_id) 
        {
            //$query = $this->db->get_where($this->DB_state, array('id' => (int)$by_id),1);
            //var_dump($query->result());
            //return $query->result();
            
            $this->db->select('id,statename')
                 ->from($this->DB_state)
                 ->where('id',(int)$by_id);
            
            $query = $this->db->get();
            return $query->result();
            //return $query->result_array();
            
        }
    public function get_city_where($by_id) 
        {
            
            $this->db->select('*')
                 ->from($this->DB_city)
                 ->where('id',(int)$by_id);
            
            $query = $this->db->get();
            return $query->result_array();
            
        }
    public function get_prd_where($by_id) 
        {
            
            $this->db->select('*')
                 ->from($this->DB_product)
                 ->where('id',(int)$by_id);
            
            $query = $this->db->get();
            return $query->result_array();
            
        }

    public function _getcuisine_categoryid($url) 
        {
            $_id = $this->db->get_where($this->DB_cusine_cat , array( 'slug' =>  $url, 'isdeleted' =>0 ))->row(); 
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
        
    public function _insertrestaurant($data)
    {
        $this->db->insert($this->DB_res, $data);
        
        if ( $this->db->affected_rows() > 0 )
            {
                return true;
            }
    }
        
    public function _allrestaurants_bycuisine($by_id , $limit , $loadmore ,$location_state,$location_city,$searchbox)
        {
            
            $this->db->select("".$this->DB_res.".*")
                 ->from($this->DB_res_cat_assign)
                 //->where("".$this->DB_res_cat_assign.".cat_cusid",$by_id )
                 ->where(" ".$this->DB_res.".merchanttype", 'cuisine')
                 ->where("".$this->DB_res.".status", '1')
                 ->order_by(" ".$this->DB_res.".id" , "ASC")
                 ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_res_cat_assign.".restaurantid ");
                
                if((isset($location_state) && !empty($location_state)))
                {
                    
                    $this->db->where("'.$this->DB_res.'.stateid ",$location_state);
                    
                }
                if((isset($location_city) && !empty($location_city)))
                {
                    
                    $this->db->where("'.$this->DB_res.'.cityid ",$location_city);
                    
                }
                
                
                if(isset($loadmore) && !empty($loadmore))
                {
                    $this->db->where(" ".$this->DB_res.".id >", $loadmore);
                }
                if(isset($limit) && !empty($limit))
                {
                    
                    $this->db->limit($limit);
                }
                
                
                //cheack to sort by user id or to get all users
                if (is_numeric($by_id))
                {
                    $this->db->where(" ".$this->DB_res_cat_assign.".cat_cusid ",$by_id);
                }
                
                if((isset($searchbox) && !empty($searchbox)))
                {
                    
                    $this->db->join( $this->DB_product, " ".$this->DB_product.".restaurantid = ".$this->DB_res.".id ",'left');
                    
                    $this->db->like(" ".$this->DB_res.".companyname", $searchbox);
                    $this->db->or_like(" ".$this->DB_product.".productname", $searchbox);
                    $this->db->where(" ".$this->DB_product.".status",1);
                    
                    $this->db->group_by(" ".$this->DB_res.".id ");
                    //print("<pre> se ".print_r($this->db->get()->result(),true)."</pre>");die;
                    
                }
                
                
		$query = $this->db->get();

		$get_rest = array();

		if($query->num_rows() > 0)
                    {
			foreach ($query->result() as $row)
			   {
                                $rest_id                            =   $row->id; //get id of each restaurant for
                                $get_rest[$row->id]['cate_id']      =   $by_id;
                                $get_rest[$row->id]['id']           =   $row->id;
                                $get_rest[$row->id]['companyname']  =   $row->companyname;
                                $get_rest[$row->id]['companydesc']  =   $row->companydesc;
                                $get_rest[$row->id]['address']      =   $row->address;
                                $get_rest[$row->id]['cityname']     =   $this->get_city_name($row->cityid);
                                $get_rest[$row->id]['statename']    =   $this->get_state_name($row->stateid);
                                $get_rest[$row->id]['country']      =   $row->country;
                                $get_rest[$row->id]['address']      =   $row->address;
                                $get_rest[$row->id]['latitude']     =   $row->latitude;
                                $get_rest[$row->id]['longitude']    =   $row->longitude;
                                $get_rest[$row->id]['logo']         =   $row->logo;
                                $get_rest[$row->id]['minorder']     =   $row->minorder;
                                $get_rest[$row->id]['deliverytime'] =   $row->deliverytime;
                                $get_rest[$row->id]['pickup']       =   $row->pickup;
                                $get_rest[$row->id]['homedelivery'] =   $row->homedelivery;
                                $get_rest[$row->id]['tablereservation'] = $row->tablereservation;
                                $get_rest[$row->id]['vat']          =   $row->vat;
                                $get_rest[$row->id]['banner']       =   $row->banner;
                                
                                
                                
                                $get_rest[$row->id]['parentid']     =   $row->parentid;
                                $get_rest[$row->id]['firstname']    =   $row->firstname;
                                $get_rest[$row->id]['lastname']     =   $row->lastname;
                                $get_rest[$row->id]['gender']       =   $row->gender;
                                $get_rest[$row->id]['email']        =   $row->email;
                                $get_rest[$row->id]['phone']        =   $row->phone;
                                $get_rest[$row->id]['phone2']       =   $row->phone2;
                                
                                $get_rest[$rest_id]['time']       =   $this->get_day_where($row->id);
                                $get_rest[$rest_id]['state']      =   $this->get_state_where($row->stateid);
                                $get_rest[$rest_id]['city']       =   $this->get_city_where($row->cityid);
                                $get_rest[$row->id]['mapdata']    =   $this->get_rest_map($row->id);
			   }
                    }
                else 
                   {

                   }

		return $get_rest;
               
                  //var_dump($get_rest);
                  //print("<pre>".print_r($get_rest,true)."</pre>");die;
                 
        }
        
    public function _allrestaurants($by_id , $limit , $loadmore, $location_state,$location_city,$searchbox )
        {
            
            $this->db->select("".$this->DB_res.".*")
                 ->from($this->DB_res)
                 ->where(" ".$this->DB_res.".merchanttype", "cuisine")
                 ->where(" ".$this->DB_res.".status", 1)
                 ->where(" ".$this->DB_res.".isdeleted", 0)
                 ->order_by(" ".$this->DB_res.".id" , "ASC");
                
                if((isset($location_state) && !empty($location_state)))
                {
                    
                    $this->db->where(" ".$this->DB_res.".stateid ",$location_state);
                    
                }
                if((isset($location_city) && !empty($location_city)))
                {
                    
                    $this->db->where(" ".$this->DB_res.".cityid",$location_city);
                    
                }
                
                
                if(isset($loadmore) && !empty($loadmore))
                {
                    $this->db->where(" ".$this->DB_res.".id >", $loadmore);
                }
                if(isset($limit) && !empty($limit))
                {
                    
                    $this->db->limit($limit);
                    
                }
                
                
                //cheack to sort by user id or to get all users
                if (is_numeric($by_id))
                    {
                        $this->db->where(" ".$this->DB_res.".id",$by_id);
                    }
                    
                if((isset($searchbox) && !empty($searchbox)))
                {
                    
                    $this->db->join( $this->DB_product, " ".$this->DB_product.".restaurantid = ".$this->DB_res.".id ",'left');
                    
                    
                    $this->db->like(" ".$this->DB_res.".companyname", $searchbox);
                    $this->db->or_like(" ".$this->DB_product.".productname", $searchbox);
                    $this->db->where(" ".$this->DB_product.".status",1);
                    
                    $this->db->group_by(" ".$this->DB_res.".id ");
                    //print("<pre> se ".print_r($this->db->get()->result(),true)."</pre>");die;
                    
                }
		$query = $this->db->get();
                
                //print("<pre> all ".print_r($this->db->get()->result(),true)."</pre>");die;
		$get_rest = array();

		if($query->num_rows() > 0)
                    {
			foreach ($query->result() as $row)
			   {
                                $rest_id                            =   $row->id; //get id of each restaurant for
                                $get_rest[$row->id]['cate_id']      =   NULL;
                                $get_rest[$row->id]['id']           =   $row->id;
                                $get_rest[$row->id]['companyname']  =   $row->companyname;
                                $get_rest[$row->id]['companydesc']  =   $row->companydesc;
                                $get_rest[$row->id]['address']      =   $row->address;
                                $get_rest[$row->id]['cityname']     =   $this->get_city_name($row->cityid);
                                $get_rest[$row->id]['statename']    =   $this->get_state_name($row->stateid);
                                $get_rest[$row->id]['country']      =   $row->country;
                                $get_rest[$row->id]['latitude']     =   $row->latitude;
                                $get_rest[$row->id]['longitude']    =   $row->longitude;
                                $get_rest[$row->id]['logo']         =   $row->logo;
                                $get_rest[$row->id]['minorder']     =   $row->minorder;
                                $get_rest[$row->id]['deliverytime'] =   $row->deliverytime;
                                $get_rest[$row->id]['pickup']       =   $row->pickup;
                                $get_rest[$row->id]['homedelivery'] =   $row->homedelivery;
                                $get_rest[$row->id]['tablereservation'] = $row->tablereservation;
                                $get_rest[$row->id]['vat']          =   $row->vat;
                                $get_rest[$row->id]['banner']       =   $row->banner;
                                
                                
                                
                                $get_rest[$row->id]['parentid']     =   $row->parentid;
                                $get_rest[$row->id]['firstname']    =   $row->firstname;
                                $get_rest[$row->id]['lastname']     =   $row->lastname;
                                $get_rest[$row->id]['gender']       =   $row->gender;
                                $get_rest[$row->id]['email']        =   $row->email;
                                $get_rest[$row->id]['phone']        =   $row->phone;
                                $get_rest[$row->id]['phone2']       =   $row->phone2;
                                
                                $get_rest[$row->id]['time']       =   $this->get_day_where($row->id);
                                $get_rest[$row->id]['state']      =   $this->get_state_where($row->stateid);
                                $get_rest[$row->id]['city']       =   $this->get_city_where($row->cityid);
                                $get_rest[$row->id]['mapdata']    =   $this->get_rest_map($row->id);
			   }
                    }
                else 
                   {

                   }
                //print("<pre>".print_r($get_rest,true)."</pre>");die;
		return $get_rest;
                /*
                 * var_dump($get_rest);
                 * print("<pre>".print_r($get_rest,true)."</pre>");die;
                 */
        }
    public function get_rest_map($by_id) 
    {
        $this->db->select('companyname,latitude,longitude')
             ->from($this->DB_res)
             ->where('id',(int)$by_id);

        $query = $this->db->get();
        return $query->result();
        //return $query->result_array();

    }
    public function get_city_name($by_id) 
    {

        $this->db->select('cityname')
             ->from($this->DB_city)
             ->where('id',(int)$by_id);

        $query = $this->db->get();
        return $query->row()->cityname;

    }
    public function get_state_name($by_id) 
    {

        $this->db->select('statename')
             ->from($this->DB_state)
             ->where('id',(int)$by_id);

        $query = $this->db->get();
        return $query->row()->statename;
        //return $query->result_array();

    }
    public function restaurant_time($by_id)
    {
        $query = $this->db->get_where($this->DB_res_time, array('restaurantid' =>(int)$by_id));
        return $query->result();

    }
        
    public function get_restaurant_category($by_id)
        {
            $this->db->select("*")
                 ->from($this->DB_cat)
                 ->where("categorystatus ", '1')
                 ->where("restaurantid ", $by_id)
                 ->order_by("arrangecategory" , "ASC");
            
            $query = $this->db->get();
                
		$get_cate_prd = array();

		if($query->num_rows() > 0)
                    {
			foreach ($query->result() as $row)
			   {
                            $cate_id                                    =   $row->id;   
                            $get_cate_prd[$cate_id]['id']               =   $row->id;
                            $get_cate_prd[$cate_id]['slug']             =   $row->slug;
                            $get_cate_prd[$cate_id]['categoryname']     =   $row->categoryname;
                            
                            $get_cate_prd[$cate_id]['products_cate']    =   $this->get_menu_by_cate($cate_id);// feach data by category from the product tb 
                            
			   }
                    }
                else 
                   {

                   }
                //print("<pre>".print_r($get_cate_prd,true)."</pre>");die;
		return $get_cate_prd;
                
                
            
        }
        
    public function get_menu_by_cate($by_id)
    {
        $this->db->select('*');
        $this->db->from($this->DB_product);
        $this->db->where("categoryid ", $by_id);
        $this->db->where("status", "1");


        $query = $this->db->get();
        $get_prd	= array();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
                {
                    $get_prd[$row->id]['id']            =   $row->id;
                    $get_prd[$row->id]['restaurantid']  =   $row->restaurantid;
                    $get_prd[$row->id]['productdesc']   =   $row->productdesc;
                    $get_prd[$row->id]['productname']   =   $row->productname;
                    $get_prd[$row->id]['productprice']  =   $row->productprice;
                    $get_prd[$row->id]['productimage']  =   $row->productimage;
                    //$get_prd[$row->id]['canaddproduct'] =   $row->canaddproduct;
                }
        }
        return $get_prd;
    }
    public function get_restaurant_category_product ($by_id)
    {
        $this->db->select("".$this->DB_cat.".id AS categories_id, ".$this->DB_product.".* , ".$this->DB_cat.".categoryname,".$this->DB_cat.".arrangecategory, ".$this->DB_cat.".slug AS categories_slug");
        $this->db->from($this->DB_product);
        $this->db->join( $this->DB_cat, " ".$this->DB_cat.".id = ".$this->DB_product.".categoryid ", "LEFT OUTER");
        //$this->db->where("categoryid ", $by_id);
        
        $this->db->where(" ".$this->DB_cat.".categorystatus", "1");
        $this->db->where(" ".$this->DB_product.".status ", '1');
        $this->db->where(" ".$this->DB_product.".restaurantid ", $by_id);
        $this->db->order_by(" ".$this->DB_cat.".id" , "ASC");


        $query = $this->db->get();
        $get_prd	= array();
        

        if($query->num_rows() > 0)
        {
            //print("<pre>".print_r($query->result(),true)."</pre>");die;
            foreach($query->result() as $row)
                {
                    $get_prd[$row->id]['restaurantid']  =   $row->restaurantid;
                    $get_prd[$row->id]['categoryid']     =  $row->categories_id;
                    $get_prd[$row->id]['categoryname']   =   $row->categoryname;
                    $get_prd[$row->id]['categoriesslug'] =   $row->categories_slug;
                    $get_prd[$row->id]['categoryorder'] =   $row->arrangecategory;
                    $get_prd[$row->id]['Productid']     =   $row->id;
                    $get_prd[$row->id]['productdesc']   =   $row->productdesc;
                    $get_prd[$row->id]['productname']   =   $row->productname;
                    $get_prd[$row->id]['productprice']  =   $row->productprice;
                    $get_prd[$row->id]['productimage']  =   $row->productimage;
                    //$get_prd[$row->id]['canaddproduct'] =   $row->canaddproduct; 
                    $get_prd[$row->id]['extraoptions']    =   $this->get_product_list($row->id);// feach data by category from the product tb 
                            
                    
                }
        }
           
            //print("<pre>".print_r($get_prd,true)."</pre>");die;
            return $get_prd;



    }  
        
    public function get_product_list($by_id) 
        {
            
            $this->db->select(" ".$this->DB_productmerges.".* , ".$this->DB_product.".productname")
                     ->from($this->DB_productmerges)
                     ->where(" ".$this->DB_productmerges.".parentproductid ", $by_id)
                     ->where(" ".$this->DB_productmerges.".status ", '1')
                     ->order_by(" ".$this->DB_productmerges.".id" , "ASC")
                     ->join( $this->DB_product, " ".$this->DB_product.".id = ".$this->DB_productmerges.".childproductid ");
            
            $query = $this->db->get();
            
            $get_prd_child = $query->result_array();
            return $get_prd_child;
            /*
            if($query->num_rows() > 0)
                {
                    $get_prd_child = $query->result();
                    print("<pre>".print_r($get_prd_child,true)."</pre>");
                    die;
                }
            else 
                {
                    //$get_prd_child = $this->get_prd_where($by_id);
                    $get_prd_child='';
                    print("<pre>".print_r($get_prd_child,true)."</pre>");
                    die;
                }
             * 
             */
            
            //
            //print("<pre>".print_r($get_prd_child,true)."</pre>");
            //die;
            
        }
        
        
    public function restaurant_menu($by_id)
        {
            $this->db->select("".$this->DB_cat.".id AS categories_id, ".$this->DB_product.".* , ".$this->DB_cat.".categoryname")
                ->from($this->DB_product)
                ->where(" ".$this->DB_product.".status ", '1')
                ->where(" ".$this->DB_product.".restaurantid ", $by_id)
                ->order_by(" ".$this->DB_cat.".id" , "ASC")
                    ->join( $this->DB_cat, " ".$this->DB_cat.".id = ".$this->DB_product.".categoryid ", "LEFT OUTER");
                 
                    
		$query = $this->db->get();
                
                

		$get_prd = array();

		if($query->num_rows() > 0)
                    {
			foreach ($query->result() as $row)
			   {
                                $prd_id                            =   $row->id; //get id of each restaurant for
                                $get_prd[$row->id]['id']           =   $row->id;
                                $get_prd[$row->id]['restaurantid'] =   $row->restaurantid;
                                $get_prd[$row->id]['categoryid']   =   $row->categoryid;
                                $get_prd[$row->id]['productname']  =   $row->productname;
                                $get_prd[$row->id]['productprice'] =   $row->productprice;
                                $get_prd[$row->id]['productimage'] =   $row->productimage;
                                $get_prd[$prd_id]['categoryname']  =   $row->categoryname;
			   }
                    }
                else 
                   {

                   }

		//return $get_prd;
                
                
                print("<pre>".print_r($get_prd,true)."</pre>");
                die;
            /*
            $sql= " 
                    SELECT c.id AS categories_id,p.*,c.categoryname
                    FROM ".$this->DB_product." AS p 
                    LEFT OUTER JOIN
                    ".$this->DB_cat." AS c
                    ON 
                    p.categoryid = c.id
                    WHERE p.restaurantid=".$by_id."
                    ORDER BY p.categoryid
                  ";
            $query = $this->db->query($sql);
            return $query->result();
             
            //print("<pre>".print_r($query->result(),true)."</pre>");
            // die;
             * 
             * 
             * 
             * $this->db->set('arrangecategory', $id, FALSE);
               $this->db->where('id',$id);
               $this->db->update('category');
             */
             
                   
        }
        
        public function _add_restaurant_table($data) 
    { 
       $this->db->insert($this->DB_tablereserv, $data);
       return $this->db->insert_id();
       /*$insertId = $this->db->insert_id();
    
        if ( $this->db->affected_rows() > 0 )
        {
            return $insertId;
        }
        */
    }
        
        
                
    

}
