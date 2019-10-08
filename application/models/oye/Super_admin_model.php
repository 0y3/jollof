<?php

if(!defined('BASEPATH'))exit('No direct script access allowed');

class Super_admin_model extends CI_Model
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
    private $DB_ord_details = "orderlistdetails";
    private $DB_ord = "orders";
    private $DB_ord_status = "orderstatus";
    private $DB_address = "accountaddresses";
    private $DB_user = "users";
    private $DB_account_r = "accounts";
    private $DB_img_ads = "img_ads";
    private $DB_bannertype = "bannertype";
    private $DB_comment = "comments";
    private $DB_setting = "settings";
    private $DB_tablereserv = "tablereservations";
    private $DB_nav_fsh = "fashionnav";
    private $DB_product_fas = "products_fashion";
    private $DB_cat_fas = "categories_fashion";
    private $DB_prd_qty_c_s= "product_qty_color_size";
    private $DB_size = "size_tbl";
    private $DB_size_cat = "size_category";
    private $DB_color = "color_tbl";
    private $DB_nav_fas = "fashionnav";
    private $DB_cat_prd="product_cat_assign";
    private $DB_prd_fashionimg = "productimages";
    private $jollof_site = "jollof_sitetype";
    private $paystack_bank = "paystackBanks";
    private $DB_deliviering_charges = "delivieringCharges_admin";
    private $DB_deliviering_charges_mer = "delivieringCharges_merchant";
    private $DB_promo_duration = "promo_duration";
    private $DB_promo_price = "promo_price";
            
            
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
        
    var $order_set = array(
                                "products_cuisine.createdat " ,
                                NULL,
                                "products_cuisine.productname",
                                NULL,
                                " categories.categoryname",
                                "products_cuisine.productprice",
                                "products_cuisine.status",
                                NULL,
                            ); //set column field database for datatable orderable

    public function _make() {
        
        $by_id = $_SESSION['rest_id'];
        
        $order_search = array(
                                " ".$this->DB_product.".createdat " ,
                                " ".$this->DB_cat.".categoryname",
                                " ".$this->DB_product.".productname",
                                " ".$this->DB_product.".productprice"
                            );
        
        
        
        $this->db->select("
                            ".$this->DB_cat.".id AS categories_id, 
                            ".$this->DB_product.".* ,
                            ".$this->DB_cat.".categoryname
                        ")
                ->from($this->DB_product)
                ->join( $this->DB_cat, " ".$this->DB_cat.".id = ".$this->DB_product.".categoryid ", 'left')
                ->where(" ".$this->DB_product.".isdeleted ", 0)
                ->where(" ".$this->DB_product.".restaurantid ", $by_id);
       

        $i=0;
        foreach ($order_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_product.".restaurantid ", $by_id);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                              ->where(" ".$this->DB_product.".restaurantid ", $by_id);
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
            $this->db->order_by(" ".$this->DB_product.".id", 'DESC');
        }
    }
    
    public function _save_product($data) 
    {
        $this->db->insert($this->DB_product, $data);
            
        if ( $this->db->affected_rows() > 0 )
        {
            return true;
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
                            ".$this->DB_cat.".id AS categories_id, 
                            ".$this->DB_product.".* ,
                            ".$this->DB_cat.".categoryname
                        ")
                ->from($this->DB_product)
                ->where(" ".$this->DB_product.".isdeleted ", 0)
                ->where(" ".$this->DB_product.".restaurantid ", $by_id)
                ->join( $this->DB_cat, " ".$this->DB_cat.".id = ".$this->DB_product.".categoryid ", "LEFT OUTER"); 

        return $this->db->count_all_results();  
    }
    
    
    
    
    
    
    
    
    
    var $cate_order_set = array(
                                
                                " categoryname",
                                " status",
                                NULL,
                            ); //set column field database for datatable orderable
    
    
    
    public function _make_cate() {
        
        
        $cate_search = array(
                                
                                " categoryname",
                                " status"
                            );
        
        
        
        $this->db->select("*")
                ->from($this->DB_cusine_cat)
                ->where(" isdeleted ", 0);
       

        $i=0;
        foreach ($cate_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" isdeleted ", 0);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" isdeleted ", 0);
                }
                if(count($cate_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->cate_order_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" categoryname", 'ASC');
        }
    }
    
    public function _get_cate() 
    {
        $this->_make_cate();
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_cate()
    {  
           $this->_make_cate();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_cate_all()  
    {  
        $this->db->select(" * ")
                ->from($this->DB_cusine_cat)
                ->where(" isdeleted ", 0);

        return $this->db->count_all_results();  
    }
    
    
    
    var $cate_order_set_prd = array(
                                
                                " categories.categoryname",
                                " categories.arrangecategory",
                                "COUNT( products_cuisine.id)",
                                " categories.categorystatus",
                                NULL,
                            ); //set column field database for datatable orderable
    
    
    
    public function _make_cate_prd() {
        
        $by_id = $_SESSION['rest_id'];
        
        $cate_search = array(
                                
                                " ".$this->DB_cat.".categoryname",
                                " ".$this->DB_cat.".arrangecategory",
                                //" COUNT(".$this->DB_product.".id) ",
                                " ".$this->DB_cat.".categorystatus"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_cat.".*,
                            count(".$this->DB_product.".id) AS productcount 
                        ")
                ->from($this->DB_cat)
                ->join( $this->DB_product, " ".$this->DB_product.".categoryid = ".$this->DB_cat.".id ", 'right outer' )
                ->where(" ".$this->DB_cat.".isdeleted ", 0)
                ->where(" ".$this->DB_product.".isdeleted ", 0)
                ->where(" ".$this->DB_cat.".restaurantid ", $by_id)
                ->group_by(" ".$this->DB_cat.".id ");
       

        $i=0;
        foreach ($cate_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_cat.".isdeleted ", 0)
                            ->where(" ".$this->DB_product.".isdeleted ", 0)
                            ->where(" ".$this->DB_cat.".restaurantid ", $by_id);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_cat.".isdeleted ", 0)
                            ->where(" ".$this->DB_product.".isdeleted ", 0)
                            ->where(" ".$this->DB_cat.".restaurantid ", $by_id);
                }
                if(count($cate_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->cate_order_set_prd[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_cat.".arrangecategory", 'ASC');
        }
    }
    
    public function _get_cate_prd() 
    {
        $this->_make_cate();
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_cate_prd()
    {  
           $this->_make_cate();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_cate_all_prd()  
    {  
        $by_id = $_SESSION['rest_id']; 
        $this->db->select(" 
                            ".$this->DB_cat.".*,
                            count(".$this->DB_product.".id) AS productcount
                        ")
                ->from($this->DB_cat)
                ->join( $this->DB_product, " ".$this->DB_product.".categoryid = ".$this->DB_cat.".id " , 'left outer')
                ->where(" ".$this->DB_cat.".isdeleted ", 0)
                ->where(" ".$this->DB_product.".isdeleted ", 0)
                ->where(" ".$this->DB_cat.".restaurantid ", $by_id)
                ->group_by(" ".$this->DB_cat.".id ");

        return $this->db->count_all_results();  
    }
    
    
    
    
    
    
    
    
    
    
    
        
   
    public function get_prd_where($by_id) 
        {
            
            $this->db->select('*')
                 ->from($this->DB_product)
                 ->where('id',(int)$by_id);
            
            $query = $this->db->get();
            return $query->result_array();
            
        }
                           
    public function get_restaurant_category($by_id)
        {
            $this->db->select("*")
                 ->from($this->DB_cat)
                 ->where("categorystatus ", '1')
                 ->where("restaurantid ", $by_id)
                 ->order_by("arrangecategory" , "ASC");
            
            $query = $this->db->get()->result();
                
		
		return $query;
                
                //print("<pre>".print_r($get_cate_prd,true)."</pre>");
                //die;
            
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
        
        public function _update_status($id,$value) 
        {
            $this->db->set('status', $value); 
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_product); 
            return true;
            
        }
        
        public function _cat_update_name($id,$value) 
        {
            $config = array(
                        'table' => $this->DB_cusine_cat,
                        'id' => 'id',
                        'field' => 'slug',
                        'title' => 'title',
                        'replacement' => 'dash' // Either dash or underscore
                        );
            $this->load->library('slug', $config);

            $data_slug = array(
                            'slug' => $value,       // slug name of filed in db were ur url is stored
                            );
            $data['slug'] = $this->slug->create_uri($data_slug, $id );
            
            $this->db->set('categoryname', $value); 
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_cusine_cat,$data); 
            return true;
            
        }
        
        public function _cat_update_status($id,$value) 
        {
            $this->db->set('status', $value); 
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_cusine_cat); 
            return true;
            
        }
        
        public function _cat_order_name($id,$value) 
        {
            $this->db->set('arrangecategory', $value); 
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_cat); 
            return true;
            
        }
        
        public function _get_cat_where($name)
        {
           $this ->db->select('*')
                   ->from($this->DB_cusine_cat)
                   ->where('categoryname', $name);
           $query = $this->db->get();
           return $query->result();
        }    
        
        public function _save_cate($data) 
        {
            $config = array(
                            'table' => $this->DB_cusine_cat,
                            'id' => 'id',
                            'field' => 'slug',
                            'title' => 'title',
                            'replacement' => 'dash' // Either dash or underscore
                            );
            $this->load->library('slug', $config);

            $data_slug = array(
                    'slug' => $_POST['save_name'],       // slug name of filed in db were ur url is stored
                    );
            $data['slug'] = $this->slug->create_uri($data_slug);
            
            $this->db->insert($this->DB_cusine_cat, $data);

            if ( $this->db->affected_rows() > 0 )
            {
                return true;
            }
        }
        
    
        
        
        
        
        
        // THIS FEILD GET ALL B2B Registration
        
        var $b2bregistration_set = array(
                                
                                " restaurants.createdat",
                                " users.firstname",
                                //" users.lastname",
                                "restaurants.companyname",
                                "restaurants.merchanttype",
                                " restaurants.email",
                                " restaurants.phone",
                                null,
                                " state_cities.cityname",
                                NULL,
                                NULL,
                            ); //set column field database for datatable orderable
    
    
    
    public function _make_b2bregistration($status) {
        
        
        
        $b2bregistration_search = array(
                                
                                " ".$this->DB_res.".createdat",
                                " ".$this->DB_res.".companyname",
                                " ".$this->DB_res.".merchanttype",
                                " ".$this->DB_user.".firstname",
                                " ".$this->DB_user.".lastname",
                                " ".$this->DB_res.".email",
                                " ".$this->DB_res.".phone",
                                " ".$this->DB_res.".phone2",
                                " ".$this->DB_city.".cityname",
                                " ".$this->DB_state.".statename"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_res.".*,
                            ".$this->DB_user.".firstname AS userf,".$this->DB_user.".lastname AS userl,
                            ".$this->DB_city.".cityname,
                            ".$this->DB_state.".statename
                        ")
                ->from($this->DB_res)
                ->join( $this->DB_user, " ".$this->DB_user.".id = ".$this->DB_res.".usersid " )
                ->join( $this->DB_city, " ".$this->DB_city.".id = ".$this->DB_res.".cityid " )
                ->join( $this->DB_state, " ".$this->DB_state.".id = ".$this->DB_res.".stateid" );
                if($status <= 1)
                    {
                        $this->db->where(" ".$this->DB_res.".status ",(int) $status);
                    }
                //$this->db->where(" ".$this->DB_res.".merchanttype ", "cuisine");
                
       

        $i=0;
        foreach ($b2bregistration_search as $item) // loop column 
        {   
            
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value']);
                    if($status <= 1)
                        {
                            $this->db->where(" ".$this->DB_res.".status ",(int) $status);
                        }
                    $this->db->where(" ".$this->DB_res.".merchanttype ", "cuisine");
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                    if($status <= 1)
                        {
                            $this->db->where(" ".$this->DB_res.".status ",(int) $status);
                        }
                    $this->db->where(" ".$this->DB_res.".merchanttype ", "cuisine");
                }
                if(count($b2bregistration_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->b2bregistration_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_res.".createdat", 'DESC');
        }
    }
    
    public function _get_b2bregistration($status) 
    {
        //print_r();
        $this->_make_b2bregistration($status);
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_b2bregistration($status)
    {  
           $this->_make_b2bregistration($status);  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_all_b2bregistration($status)  
    {  
        $this->db->select(" 
                            ".$this->DB_res."*.,
                            ".$this->DB_user.".firstname AS userf,".$this->DB_user.".lastname AS userl,
                            ".$this->DB_city.".cityname,
                            ".$this->DB_state.".statename
                        ")
                ->from($this->DB_res)
                ->join( $this->DB_user, " ".$this->DB_user.".id = ".$this->DB_res.".usersid " )
                ->join( $this->DB_city, " ".$this->DB_city.".id = ".$this->DB_res.".cityid " )
                ->join( $this->DB_state, " ".$this->DB_state.".id = ".$this->DB_res.".stateid" );
                if($status <= 1)
                    {
                        $this->db->where(" ".$this->DB_res.".status ",(int) $status);
                    }
               // $this->db->where(" ".$this->DB_res.".merchanttype ", "cuisine");

        return $this->db->count_all_results();  
    }
    public function _update_b2bregistration_flow($status, $id)
    {
        $this->db->set('status', $status); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_res); 
        
        $this->db->set('status', $status);
        $this->db->where('restaurantid',$id  );//which row want to upgrade  
        $this->db->update($this->DB_user); 
        return true;
    }
    public function _count_all_b2bregistration($status)  
    {  
        $this->db->select(" 
                            ".$this->DB_res.".*,
                            ".$this->DB_user.".firstname AS userf,".$this->DB_user.".lastname AS userl,
                            ".$this->DB_city.".cityname,
                            ".$this->DB_state.".statename
                        ")
                ->from($this->DB_res)
                ->join( $this->DB_user, " ".$this->DB_user.".id = ".$this->DB_res.".usersid " )
                ->join( $this->DB_city, " ".$this->DB_city.".id = ".$this->DB_res.".cityid " )
                ->join( $this->DB_state, " ".$this->DB_state.".id = ".$this->DB_res.".stateid" );
                
                if($status <= 1)
                    {
                        $this->db->where(" ".$this->DB_res.".status ",(int) $status);
                    }
                //$this->db->where(" ".$this->DB_res.".merchanttype ", "cuisine");
                    
        return $this->db->count_all_results();  
        //$query = $this->db->get()->result();
        //return $query;
    }
    
    
    
    
    
    
    
    // THIS FEILD GET ALL B2B Registration
        
        var $b2bbilling_set = array(
                                
                                " restaurants.createdat",
                                " restaurants.companyname",
                                " restaurants.email",
                                " restaurants.phone",
                                " restaurants.address",
                                " state_cities.cityname",
                                " restaurants.percharge",
                                NULL,
                            ); //set column field database for datatable orderable
    
    
    
    public function _make_b2bbilling() {
        
        
        
        $b2bbilling_search = array(
                                
                                " ".$this->DB_res.".createdat",
                                " ".$this->DB_res.".companyname",
                                " ".$this->DB_res.".percharge",
                                " ".$this->DB_res.".email",
                                " ".$this->DB_res.".phone",
                                " ".$this->DB_res.".phone2",
                                " ".$this->DB_city.".cityname",
                                " ".$this->DB_state.".statename"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_res.".*,
                            ".$this->DB_user.".firstname AS userf,".$this->DB_user.".lastname AS userl,
                            ".$this->DB_city.".cityname,
                            ".$this->DB_state.".statename
                        ")
                ->from($this->DB_res)
                ->join( $this->DB_user, " ".$this->DB_user.".id = ".$this->DB_res.".usersid " )
                ->join( $this->DB_city, " ".$this->DB_city.".id = ".$this->DB_res.".cityid " )
                ->join( $this->DB_state, " ".$this->DB_state.".id = ".$this->DB_res.".stateid" )
                ->where(" ".$this->DB_res.".status ",'1')
                ->where(" ".$this->DB_res.".merchanttype ", "cuisine");
                //->where(" ".$this->DB_res.".isdeleted ", 0);
       

        $i=0;
        foreach ($b2bbilling_search as $item) // loop column 
        {   
            
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value']);
                    $this->db->where(" ".$this->DB_res.".status ",'1');
                    $this->db->where(" ".$this->DB_res.".merchanttype ", "cuisine");   
                            //->where(" ".$this->DB_res.".isdeleted ", 0);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                    $this->db->where(" ".$this->DB_res.".status ",'1');
                    $this->db->where(" ".$this->DB_res.".merchanttype ", "cuisine");
                            //->where(" ".$this->DB_res.".isdeleted ", 0);
                }
                if(count($b2bbilling_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->b2bbilling_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_res.".createdat", 'DESC');
        }
    }
    
    public function _get_b2bbilling() 
    {
        //print_r();
        $this->_make_b2bbilling();
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_b2bbilling()
    {  
           $this->_make_b2bbilling();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_all_b2bbilling()  
    {  
        $this->db->select(" 
                            ".$this->DB_res."*.,
                            ".$this->DB_user.".firstname AS userf,".$this->DB_user.".lastname AS userl,
                            ".$this->DB_city.".cityname,
                            ".$this->DB_state.".statename
                        ")
                ->from($this->DB_res)
                ->join( $this->DB_user, " ".$this->DB_user.".id = ".$this->DB_res.".usersid " )
                ->join( $this->DB_city, " ".$this->DB_city.".id = ".$this->DB_res.".cityid " )
                ->join( $this->DB_state, " ".$this->DB_state.".id = ".$this->DB_res.".stateid" )
                ->where(" ".$this->DB_res.".status ",'1');
                $this->db->where(" ".$this->DB_res.".merchanttype ", "cuisine");
                //->where(" ".$this->DB_res.".isdeleted ", 0);

        return $this->db->count_all_results();  
    }
    
    public function _update_billing_status($status, $id)
    {
        $this->db->set('perchargestatus', $status); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_res); 
        return true;
    }
    public function _update_billing_price($price, $id)
    {
        $this->db->set('percharge', $price); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_res); 
        return true;
    }
    
    
    
    
    // THIS FEILD GET ALL ORDERS
        
        var $b2bbillingreport_set = array(
                                
                                 
                                " restaurants.companyname",
                                " restaurants.email",
                                " restaurants.phone",
                                Null,
                                Null,
                                Null,
                                " restaurants.percharge",
                                Null,
                                NULL,
                            ); //set column field database for datatable orderable
    
    
    
    public function _make_b2bbillingreport() {
        
        
        
        $b2bbillingreport_search = array(
                                
                                " ".$this->DB_res.".companyname",
                                " ".$this->DB_res.".percharge",
                                " ".$this->DB_res.".email",
                                " ".$this->DB_res.".phone",
                                " ".$this->DB_res.".phone2"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_res.".id  ,
                            ".$this->DB_res.".companyname,
                            ".$this->DB_res.".email,
                            ".$this->DB_res.".phone,
                            ".$this->DB_res.".phone2,
                            ".$this->DB_res.".percharge,
                            ".$this->DB_ord_details.".createdat,
                                
                            ".$this->DB_ord_status.".orderstatus_desc,
                            SUM(".$this->DB_ord_details.".price) as Totalsales
                        ")
                ->from($this->DB_res)
                ->join( $this->DB_ord_details, " ".$this->DB_ord_details.".restaurantid = ".$this->DB_res.".id " )
                ->join( $this->DB_ord, " ".$this->DB_ord.".id = ".$this->DB_ord_details.".orderid " )
                ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                
                ->where(" ".$this->DB_res.".merchanttype ", "cuisine")
                ->where(" ".$this->DB_res.".status ",'1')
                ->where(" ".$this->DB_res.".perchargestatus ",'1')
                ->where(" ".$this->DB_res.".isdeleted ",'0')
                ->where(" ".$this->DB_ord_details.".status ", '4');
        
        if(isset($_POST["is_date_search"]))
        {
            if($_POST["is_date_search"] == "yes")
            {
             $this->db->where("DATE(".$this->DB_ord_details.".createdat) >= ",$_POST["start_date"])
                      ->where("DATE(".$this->DB_ord_details.".createdat) <= ",$_POST["end_date"]);
            }
        }
        
        $this->db->group_by(" ".$this->DB_res.".id ");
       
       

        $i=0;
        foreach ($b2bbillingreport_search as $item) // loop column 
        {   
            if (isset($_POST["rest_id"]))
            {
                
                    $this->db->where(" ".$this->DB_res.".isdeleted ", 0)
                            ->where(" ".$this->DB_res.".id ", $_POST["rest_id"])
                            ->where(" ".$this->DB_res.".status ",1)
                            ->where(" ".$this->DB_res.".perchargestatus ",1)
                            ->where(" ".$this->DB_res.".isdeleted ",0)
                            ->where(" ".$this->DB_ord_details.".status ", 4);
                    
                    $this->db->where(" ".$this->DB_res.".merchanttype ", "cuisine");

            }
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_res.".status ",1)
                            ->where(" ".$this->DB_res.".perchargestatus ",1)
                            ->where(" ".$this->DB_res.".isdeleted ",0)
                            ->where(" ".$this->DB_ord_details.".status ", 4);
                    
                    $this->db->where(" ".$this->DB_res.".merchanttype ", "cuisine");
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                             ->where(" ".$this->DB_res.".status ",1)
                             ->where(" ".$this->DB_res.".perchargestatus ",1)
                             ->where(" ".$this->DB_res.".isdeleted ",0)
                             ->where(" ".$this->DB_ord_details.".status ", 4);
                    
                    $this->db->where(" ".$this->DB_res.".merchanttype ", "cuisine");
                }
                if(count($b2bbillingreport_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->b2bbillingreport_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_res.".companyname", 'ASC');
            //$this->db->order_by(" ".$this->DB_res.".createdat", 'DESC');
        }
    }
    
    public function _get_b2bbillingreport() 
    {
        //print_r();
        $this->_make_b2bbillingreport();
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_b2bbillingreport()
    {  
           $this->_make_b2bbillingreport();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_all_b2bbillingreport()  
    {  
         $this->db->select(" 
                            ".$this->DB_res.".id  ,
                            ".$this->DB_res.".companyname,
                            ".$this->DB_res.".email,
                            ".$this->DB_res.".phone,
                            ".$this->DB_res.".phone2,
                            ".$this->DB_res.".percharge,
                            ".$this->DB_res.".createdat,
                                
                            ".$this->DB_ord_status.".orderstatus_desc,
                            SUM(".$this->DB_ord_details.".price) as Totalsales
                        ")
                ->from($this->DB_res)
                ->join( $this->DB_ord_details, " ".$this->DB_ord_details.".restaurantid = ".$this->DB_res.".id " )
                ->join( $this->DB_ord, " ".$this->DB_ord.".id = ".$this->DB_ord_details.".orderid " )
                ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                
                ->where(" ".$this->DB_res.".status ",1)
                ->where(" ".$this->DB_res.".perchargestatus ",1)
                ->where(" ".$this->DB_res.".isdeleted ",0)
                ->where(" ".$this->DB_ord_details.".status ", 4);
         $this->db->where(" ".$this->DB_res.".merchanttype ", "cuisine");
         
        if(isset($_POST["is_date_search"]))
        {
            if($_POST["is_date_search"] == "yes")
            {
             $this->db->where("DATE(".$this->DB_ord_details.".createdat) >= ",$_POST["start_date"])
                      ->where("DATE(".$this->DB_ord_details.".createdat) <= ",$_POST["end_date"]);
            }
        }
        
        $this->db->group_by(" ".$this->DB_res.".id ");

        return $this->db->count_all_results();  
    }
    public function _all_restaurant_data_billed() 
    {
        //$query = $this->db->select('*')->from($this->DB_res)->get();
        $this->db->distinct();
        $this ->db->select(" ".$this->DB_res.".companyname, ".$this->DB_res.".id ")
                    
                ->from($this->DB_res)
                ->join( $this->DB_ord_details, " ".$this->DB_ord_details.".restaurantid = ".$this->DB_res.".id " )
                ->where(" ".$this->DB_res.".status ",1)
                ->where(" ".$this->DB_res.".perchargestatus ",1)
                ->where(" ".$this->DB_res.".isdeleted ",0)
                ->where(" ".$this->DB_ord_details.".status ", 4)
                ->order_by(" ".$this->DB_res.".companyname");
        $this->db->where(" ".$this->DB_res.".merchanttype ", "cuisine");
        
        $query = $this->db->get();
        return $query->result();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    // THIS FEILD GET ALL B2B Promo banner
        
        var $b2bpromobanner_set = array(
                                
                                "img_ads.createdat",
                                "restaurants.companyname",
                                "img_ads.startdate",
                                "img_ads.enddate",
                                "bannertype.bannertypename"
                            ); //set column field database for datatable orderable
    
    public function _make_b2bpromobanner($usertype,$status) {
        
        
        
        $b2bpromobanner_search = array(
                                
                                " ".$this->DB_img_ads.".createdat",
                                " ".$this->DB_img_ads.".startdate",
                                " ".$this->DB_img_ads.".enddate",
                                " ".$this->DB_bannertype.".bannertypename",
                                " ".$this->DB_res.".companyname"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_img_ads.".*,
                            ".$this->DB_bannertype.".bannertypename,
                            ".$this->DB_res.".companyname
                        ")
                ->from($this->DB_img_ads)
                ->join( $this->DB_bannertype, " ".$this->DB_bannertype.".id = ".$this->DB_img_ads.".bannertypeid " )
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_img_ads.".userid " )
                ->where(" ".$this->DB_img_ads.".usertype ", $usertype)
                ->where(" ".$this->DB_bannertype.".bannertype ", "general")
                ->where(" ".$this->DB_bannertype.".status ", 1)
                ->where(" ".$this->DB_img_ads.".isdeleted ", 0);
        if($status <= 1)
            {
                $this->db->where(" ".$this->DB_img_ads.".status ",(int) $status);
            }
       

        $i=0;
        foreach ($b2bpromobanner_search as $item) // loop column 
        {   
            
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_img_ads.".usertype ", $usertype)
                            ->where(" ".$this->DB_bannertype.".bannertype ", "general")
                            ->where(" ".$this->DB_bannertype.".status ", 1)
                            ->where(" ".$this->DB_img_ads.".isdeleted ", 0);
                    if($status <= 1)
                    {
                        $this->db->where(" ".$this->DB_img_ads.".status ",(int) $status);
                    }
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_img_ads.".usertype ", $usertype)
                            ->where(" ".$this->DB_bannertype.".bannertype ", "general")
                            ->where(" ".$this->DB_bannertype.".status ", 1)
                            ->where(" ".$this->DB_img_ads.".isdeleted ", 0);
                    if($status <= 1)
                    {
                        $this->db->where(" ".$this->DB_img_ads.".status ",(int) $status);
                    }
                }
                if(count($b2bpromobanner_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->b2bpromobanner_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_img_ads.".createdat", 'DESC');
        }
    }
    
    public function _get_b2bpromobanner($user_type, $status) 
    {
        //print_r();
        $this->_make_b2bpromobanner($user_type, $status);
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_b2bpromobanner($user_type,$status)
    {  
           $this->_make_b2bpromobanner($user_type, $status);  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_all_b2bpromobanner($user_type, $status)  
    {  
        $this->db->select(" 
                            ".$this->DB_img_ads.".*,
                            ".$this->DB_bannertype.".bannertypename,
                            ".$this->DB_res.".companyname
                        ")
                ->from($this->DB_img_ads)
                ->join( $this->DB_bannertype, " ".$this->DB_bannertype.".id = ".$this->DB_img_ads.".bannertypeid " )
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_img_ads.".userid " )
                ->where(" ".$this->DB_img_ads.".usertype ", $user_type)
                ->where(" ".$this->DB_bannertype.".status ", 1)
                ->where(" ".$this->DB_bannertype.".bannertype ", "general")
                ->where(" ".$this->DB_img_ads.".isdeleted ", 0);
        if($status <= 1)
                {
                    $this->db->where(" ".$this->DB_img_ads.".status ",(int) $status);
                }

        return $this->db->count_all_results();  
    }
    
    
    // THIS FEILD GET ALL B2B Third Party ADs
        
        var $b2bthirdpartyads_set = array(
                                
                                "img_ads.createdat",
                                "img_ads.username",
                                "img_ads.userphone",
                                "img_ads.useremail",
                                "img_ads.startdate",
                                "img_ads.enddate",
                                "bannertype.bannertypename"
                            ); //set column field database for datatable orderable
    
    public function _make_b2bthirdpartyads($usertype, $status) {
        
        
        
        $b2bthirdpartyads_search = array(
                                
                                " ".$this->DB_img_ads.".createdat",
                                " ".$this->DB_img_ads.".username",
                                " ".$this->DB_img_ads.".useremail",
                                " ".$this->DB_bannertype.".bannertypename",
                                " ".$this->DB_img_ads.".startdate",
                                " ".$this->DB_img_ads.".enddate",
                                " ".$this->DB_img_ads.".userphone"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_img_ads.".*,
                            ".$this->DB_bannertype.".bannertypename,
                        ")
                ->from($this->DB_img_ads)
                ->join( $this->DB_bannertype, " ".$this->DB_bannertype.".id = ".$this->DB_img_ads.".bannertypeid " )
                ->where(" ".$this->DB_img_ads.".usertype ", $usertype)
                ->where(" ".$this->DB_bannertype.".status ", 1)
                ->where(" ".$this->DB_bannertype.".bannertype ", "general")
                ->where(" ".$this->DB_img_ads.".isdeleted ", 0);
                if($status <= 1)
                    {
                        $this->db->where(" ".$this->DB_img_ads.".status ",(int) $status);
                    }
       

        $i=0;
        foreach ($b2bthirdpartyads_search as $item) // loop column 
        {   
            
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_img_ads.".usertype ", $usertype)
                            ->where(" ".$this->DB_bannertype.".bannertype ", "general")
                            ->where(" ".$this->DB_bannertype.".status ", 1)
                            ->where(" ".$this->DB_img_ads.".isdeleted ", 0);
                    if($status <= 1)
                    {
                        $this->db->where(" ".$this->DB_img_ads.".status ",(int) $status);
                    }
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_img_ads.".usertype ", $usertype)
                            ->where(" ".$this->DB_bannertype.".bannertype ", "general")
                            ->where(" ".$this->DB_bannertype.".status ", 1)
                            ->where(" ".$this->DB_img_ads.".isdeleted ", 0);
                    if($status <= 1)
                    {
                        $this->db->where(" ".$this->DB_img_ads.".status ",(int) $status);
                    }
                }
                if(count($b2bthirdpartyads_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->b2bthirdpartyads_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_img_ads.".createdat", 'DESC');
        }
    }
    
    public function _get_b2bthirdpartyads($user_type ,$status) 
    {
        //print_r();
        $this->_make_b2bthirdpartyads($user_type,$status);
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_b2bthirdpartyads($user_type, $status)
    {  
           $this->_make_b2bthirdpartyads($user_type,$status);  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_all_b2bthirdpartyads($usertype,$status)  
    {  
        $this->db->select(" 
                            ".$this->DB_img_ads.".*,
                            ".$this->DB_bannertype.".bannertypename,
                        ")
                ->from($this->DB_img_ads)
                ->join( $this->DB_bannertype, " ".$this->DB_bannertype.".id = ".$this->DB_img_ads.".bannertypeid " )
                ->where(" ".$this->DB_img_ads.".usertype ", $usertype) 
                ->where(" ".$this->DB_bannertype.".status ", 1)
                ->where(" ".$this->DB_bannertype.".bannertype ", "general")
                ->where(" ".$this->DB_img_ads.".isdeleted ", 0);
       if($status <= 1)
            {
                $this->db->where(" ".$this->DB_img_ads.".status ",(int) $status);
            }

        return $this->db->count_all_results();  
    }
    public function _update_b2bpromobanner_flow($status, $id)
    {
        $this->db->set('status', $status); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_img_ads); 
        return true;
    }
    
    public function _count_all_b2bthirdpartyads($usertype,$status)  
    {  
        $this->db->select("".$this->DB_img_ads.".*")
                ->from($this->DB_img_ads)
                ->join( $this->DB_bannertype, " ".$this->DB_bannertype.".id = ".$this->DB_img_ads.".bannertypeid " )
                ->where(" ".$this->DB_bannertype.".status ", 1)
                ->where(" ".$this->DB_bannertype.".bannertype ", "general")
                ->where(" ".$this->DB_img_ads.".usertype ", $usertype)
                ->where(" ".$this->DB_img_ads.".isdeleted ", 0);
                
                if($status <= 1)
                    {
                        $this->db->where(" ".$this->DB_img_ads.".status",(int)$status);
                    }
                    
        return $this->db->count_all_results();  
        //$query = $this->db->get()->result();
        //return $query;
    }
    
    
    
    
    
    
    
    
    
    // THIS FEILD GET ALL image sliders
        
        var $slider_arrange_set = array(
                                
                                "img_ads.arrangeimage",
                                "img_ads.createdat",
                                "img_ads.usertype",
                                "img_ads.username",
                                "img_ads.imagename",
                                "img_ads.imageurl",
                                NULL
                            ); //set column field database for datatable orderable
    
    public function _make_slider($banntype) {
        
        
        
        $slider_search = array(
                                
                                " ".$this->DB_img_ads.".createdat",
                                " ".$this->DB_img_ads.".username",
                                " ".$this->DB_img_ads.".usertype"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_img_ads.".*,
                            ".$this->DB_bannertype.".bannertypename,
                        ")
                ->from($this->DB_img_ads)
                ->join( $this->DB_bannertype, " ".$this->DB_bannertype.".id = ".$this->DB_img_ads.".bannertypeid " )
                ->where(" ".$this->DB_img_ads.".isdeleted ", 0)
                //->where(" ".$this->DB_img_ads.".status ", 1)
                ->where(" ".$this->DB_img_ads.".bannertypeid ",(int) $banntype);
       

        $i=0;
        foreach ($slider_search as $item) // loop column 
        {   
            
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_img_ads.".isdeleted ", 0)
                //->where(" ".$this->DB_img_ads.".status ", 1)
                ->where(" ".$this->DB_img_ads.".bannertypeid ",(int) $banntype);

                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_img_ads.".isdeleted ", 0)
                //->where(" ".$this->DB_img_ads.".status ", 1)
                ->where(" ".$this->DB_img_ads.".bannertypeid ",(int) $banntype);
                    
                }
                if(count($slider_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->slider_arrange_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_img_ads.".status", 'DESC');
            $this->db->order_by(" ".$this->DB_img_ads.".arrangeimage", 'ASC');
            $this->db->order_by(" ".$this->DB_img_ads.".createdat", 'DESC');
        }
    }
    
    public function _get_slider($banntype) 
    {
        //print_r();
        $this->_make_slider($banntype);
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_slider($banntype)
    {  
           $this->_make_slider($banntype);  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_all_slider($banntype)  
    {  
        $this->db->select(" 
                            ".$this->DB_img_ads.".*,
                            ".$this->DB_bannertype.".bannertypename,
                        ")
                ->from($this->DB_img_ads)
                ->join( $this->DB_bannertype, " ".$this->DB_bannertype.".id = ".$this->DB_img_ads.".bannertypeid " )
                ->where(" ".$this->DB_img_ads.".bannertypeid ",(int) $banntype) 
               // ->where(" ".$this->DB_img_ads.".status ", 1)
                ->where(" ".$this->DB_img_ads.".isdeleted ", 0);

        return $this->db->count_all_results();  
    }
    public function _update_cuisine_slider_status($status, $id)
    {
        $this->db->set('status', $status); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_img_ads); 
        return true;
    }
    public function _update_cuisine_slider_cate($order, $id)
    {
        $this->db->set('arrangeimage', $order); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_img_ads); 
        return true;
    }
    
    public function _count_all_slider($usertype,$status)  
    {  
        $this->db->select("*")
                ->from($this->DB_img_ads)
                ->where("usertype ", $usertype)
                ->where("isdeleted ", 0);
                
                if($status <= 1)
                    {
                        $this->db->where("status",(int)$status);
                    }
                    
        return $this->db->count_all_results();  
        //$query = $this->db->get()->result();
        //return $query;
    }
    public function _slider_option($by_id)
    {
        $this->db->select('*');
        $this->db->from($this->DB_bannertype)
                ->where("bannertype ", "general")
                 ->where("status ", 1);
        if($by_id)
        {
            $this->db->where("jollofsitetypeid ", $by_id);
        }
                 //->order_by("arrangecategory" , "ASC");

        $query = $this->db->get()->result();
        
        //print("<pre>".print_r($query,true)."</pre>");die;
        return $query;
    }
    
    
    
    public function _all_user($search) 
    {   
        
        $this->db->select("*")->from($this->DB_res);
        //$this->db->where(" ".$this->DB_res.".merchanttype ", "cuisine");
        
        if(isset($search) && !empty($search))
        {
            $this->db->like('email',$search);
            $this->db->or_like('firstname',$search);
            $this->db->or_like('lastname',$search);
        }
        $query = $this->db->get();
        return $query->result();
        //print("<pre>".print_r($query->result_array(),true)."</pre>");
        //die;
    }
    
    public function _banner($banntype) 
    {
        $this->db->select('img_ads.*, bannertype.bannertypename, bannertype.jollofsitetypeid as bannerjollofsitetypeid');
        $this->db->from('img_ads');
        $this->db->join('bannertype', 'bannertype.id = img_ads.bannertypeid');
        //$this->db->join('restaurants', 'img_ads.merchantid = restaurants.id', "left");
        //$this->db->join('users', 'img_ads.userid = users.id', "left");
        $this->db->where("img_ads.isdeleted", 0);
        $this->db->where("img_ads.status", 1);
        $this->db->where("bannertypeid ",(int) $banntype);
        $this->db->order_by("img_ads.arrangeimage", "ASC");
        $this->db->order_by("img_ads.createdat", "DESC");

        /*
        $this->db->select("*")
                ->from($this->DB_img_ads)
                ->where("isdeleted ", 0)
                ->where("status ", 1)
                ->where("bannertypeid ",(int) $banntype)
                ->order_by("arrangeimage" , "ASC");
        $this->db->order_by("createdat", 'DESC');
        */
        $query = $this->db->get();
        return $query->result();
         
    }
    public function _banner_rest($banntype,$rest_id) 
    {
        $this->db->select("*")
                ->from($this->DB_img_ads)
                ->where("isdeleted ", 0)
                ->where("status ", 1)
                ->where("usertype ", "restaurant")
                ->where("userid ", (int)$rest_id)
                ->where("bannertypeid ",(int) $banntype)
                ->order_by("arrangeimage" , "ASC");
                $this->db->order_by("createdat", 'DESC');
        $query = $this->db->get();
        return $query->result();
         
    }
    public function _rest_logo() 
    {
        $this->db->select("id,logo")
                ->from($this->DB_res)
                ->where("isdeleted ", 0)
                ->where("status ", 1);
        $this->db->where("merchanttype ", "cuisine");
        $query = $this->db->get();
        return $query->result();
         
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    // THIS FEILD GET ALL B2B Third Party ADs
        
        var $b2ccomment_set = array(
                                
                                "comments.createdat",
                                "comments.status",
                                "accounts.firstname",
                                "accounts.lastname",
                                "comments.comment"
                            ); //set column field database for datatable orderable
    
    public function _make_b2ccomment() {
        
        
        
        $b2ccomment_search = array(
                                
                                " ".$this->DB_comment.".createdat",
                                " ".$this->DB_account_r.".firstname",
                                " ".$this->DB_account_r.".lastname"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_comment.".*,
                            ".$this->DB_account_r.".firstname,
                            ".$this->DB_account_r.".lastname
                        ")
                ->from($this->DB_comment)
                ->join( $this->DB_account_r, " ".$this->DB_account_r.".id = ".$this->DB_comment.".accountid " )
                ->where(" ".$this->DB_comment.".isdeleted ", 0);
       

        $i=0;
        foreach ($b2ccomment_search as $item) // loop column 
        {   
            
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_comment.".isdeleted ", 0);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_comment.".isdeleted ", 0);
                }
                if(count($b2ccomment_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->b2ccomment_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_comment.".status", 'ASC');
            $this->db->order_by(" ".$this->DB_comment.".createdat", 'DESC');
        }
    }
    
    public function _get_b2ccomment() 
    {
        //print_r();
        $this->_make_b2ccomment();
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_b2ccomment()
    {  
           $this->_make_b2ccomment();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_all_b2ccomment()  
    {  
        $this->db->select(" 
                            ".$this->DB_comment.".*,
                            ".$this->DB_account_r.".firstname,
                            ".$this->DB_account_r.".lastname
                        ")
                ->from($this->DB_comment)
                ->join( $this->DB_account_r, " ".$this->DB_account_r.".id = ".$this->DB_comment.".accountid " )
                ->where(" ".$this->DB_comment.".isdeleted ", 0);

        return $this->db->count_all_results();  
    }
    public function _update_b2ccomment_flow($status, $id)
    {
        $this->db->set('status', $status); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_comment); 
        return true;
    }
    
    
    
    
    
    
    
    
    
    
    // THIS FEILD GET ALL B2C Users 
        
        var $b2cusers_set = array(
                                
                                "accounts.createdat",
                                NULL,
                                "accounts.firstname",
                                "accounts.lastname",
                                "accounts.gender",
                                "accounts.email",
                                "accounts.phone",
                                "accounts.status",
                                Null,
                            ); //set column field database for datatable orderable
    
    public function _make_b2cusers() {
        
        
        
        $b2cusers_search = array("*");
        
        
        
        $this->db->select("*")
                ->from($this->DB_account_r)
                ->where("isdeleted ", 0);
       

        $i=0;
        foreach ($b2cusers_search as $item) // loop column 
        {   
            
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where("isdeleted ", 0);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" isdeleted ", 0);
                }
                if(count($b2cusers_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->b2cusers_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by("createdat", 'DESC');
            $this->db->order_by("id", 'ASC');
            $this->db->order_by("status", 'ASC');
        }
    }
    
    public function _get_b2cusers() 
    {
        //print_r();
        $this->_make_b2cusers();
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_b2cusers()
    {  
           $this->_make_b2cusers();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_all_b2cusers()  
    {  
        $this->db->select("*")
                ->from($this->DB_account_r)
                ->where("isdeleted ", 0);

        return $this->db->count_all_results();  
    }
    public function _update_b2cusers_flow($status, $id)
    {
        $this->db->set('status', $status); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_account_r); 
        return true;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        
        
        
        
    
    // THIS FEILD GET ALL ORDERS
        
        var $list_order_set = array(
                                
                                " orderlistdetails.createdat",
                                //" orderlistdetails.ordercode",
                                NULL,//"restaurants.companyname",
                                "restaurants.merchanttype",
                                " orderlistdetails.productname",
                                " orders.deliverytype ",
                                " orderlistdetails.quantity",
                                " orderlistdetails.price",
                                " orderlistdetails.status",
                                NULL,
                            ); //set column field database for datatable orderable
    
    
    
    public function _make_order() {
        
        
        
        $order_search = array(
                                
                                " ".$this->DB_ord_details.".createdat",
                                " ".$this->DB_ord_details.".ordercode",
                                " ".$this->DB_res.".companyname",
                                " ".$this->DB_res.".merchanttype",
                                " ".$this->DB_ord_details.".productname",
                                " " .$this->DB_ord.".deliverytype",
                                " ".$this->DB_ord_details.".quantity",
                                " ".$this->DB_ord_details.".price",
                                " ".$this->DB_ord_status.".orderstatus_desc"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_ord_details.".*,
                            ".$this->DB_res.".companyname,
                            ".$this->DB_res.".merchanttype,
                            ".$this->DB_ord.".deliverytype,
                            ".$this->DB_ord_status.".orderstatus_desc
                        ")
                ->from($this->DB_ord_details)
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                ->join( $this->DB_ord, " ".$this->DB_ord.".id = ".$this->DB_ord_details.".orderid " )
                ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                ->where(" ".$this->DB_ord_details.".isdeleted ", 0);
                if (isset($_POST["getfrom_id"]))
                    {
                     $this->db->where(" ".$this->DB_ord_details.".restaurantid ", $_POST["getfrom_id"])
                              ->where(" ".$this->DB_ord_details.".status ", 4);
                        
                     if(!empty($_POST["start_date"]) || !empty($_POST["end_date"]) )
                        {
                         $this->db->where("DATE(".$this->DB_ord_details.".createdat) >= ",$_POST["start_date"])
                                  ->where("DATE(".$this->DB_ord_details.".createdat) <= ",$_POST["end_date"]);

                        }
                    }
       

        $i=0;
        foreach ($order_search as $item) // loop column 
        {   
            if (isset($_POST["rest_id"]))
            {
                
                    $this->db->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                            ->where(" ".$this->DB_ord_details.".restaurantid ", $_POST["rest_id"]);

            }
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_ord_details.".isdeleted ", 0);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_ord_details.".isdeleted ", 0);
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
        //print_r();
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
        $this->db->select(" 
                            ".$this->DB_ord_details.".*,
                            ".$this->DB_res.".companyname,
                            ".$this->DB_res.".merchanttype,
                            ".$this->DB_ord.".deliverytype,
                            ".$this->DB_ord_status.".orderstatus_desc
                        ")
                ->from($this->DB_ord_details)
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                ->join( $this->DB_ord, " ".$this->DB_ord.".id = ".$this->DB_ord_details.".orderid " )
                ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                ->where(" ".$this->DB_ord_details.".isdeleted ", 0);
                
                if (isset($_POST["getfrom_id"]))
                    {
                        $this->db->where(" ".$this->DB_ord_details.".restaurantid ", $_POST["getfrom_id"])
                              ->where(" ".$this->DB_ord_details.".status ", 4);
                        
                        if(!empty($_POST["start_date"]) || !empty($_POST["end_date"]) )
                        {
                         $this->db->where("DATE(".$this->DB_ord_details.".createdat) >= ",$_POST["start_date"])
                                  ->where("DATE(".$this->DB_ord_details.".createdat) <= ",$_POST["end_date"]);

                        }
                    }
                //->where(" ".$this->DB_ord_details.".restaurantid ", $by_id);

        return $this->db->count_all_results();  
    }
    
    
    
    
    // THIS FIELD GET ORDER BY PENDING, PROCESING ETC
    public function _make_order_by($ord_by) {
        
        
        $order_search = array(
                                
                                " ".$this->DB_ord_details.".createdat",
                                " ".$this->DB_ord_details.".ordercode",
                                " ".$this->DB_res.".companyname",
                                " ".$this->DB_res.".merchanttype",
                                " ".$this->DB_ord_details.".productname",
                                " " .$this->DB_ord.".deliverytype",
                                " ".$this->DB_ord_details.".quantity",
                                " ".$this->DB_ord_details.".price",
                                " ".$this->DB_ord_status.".orderstatus_desc"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_ord_details.".*,
                            ".$this->DB_res.".companyname,
                            ".$this->DB_res.".merchanttype,
                            ".$this->DB_ord.".deliverytype,
                            ".$this->DB_ord_status.".orderstatus_desc
                        ")
                ->from($this->DB_ord_details)
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                ->join( $this->DB_ord, " ".$this->DB_ord.".id = ".$this->DB_ord_details.".orderid " )
                ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                ->where(" ".$this->DB_ord_details.".status ", $ord_by)
                ->where(" ".$this->DB_ord_details.".isdeleted ", 0);

        $i=0;
        foreach ($order_search as $item) // loop column 
        {
            if (isset($_POST["rest_id"]))
            {
                
                    $this->db->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                            ->where(" ".$this->DB_ord_details.".status ", $ord_by)
                            ->where(" ".$this->DB_ord_details.".restaurantid ", $_POST["rest_id"]);

            }
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_ord_details.".status ", $ord_by)
                            ->where(" ".$this->DB_ord_details.".isdeleted ", 0);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_ord_details.".status ", $ord_by)
                            ->where(" ".$this->DB_ord_details.".isdeleted ", 0);
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
        $this->db->select(" 
                            ".$this->DB_ord_details.".*,
                            ".$this->DB_res.".companyname,
                            ".$this->DB_res.".merchanttype,
                            ".$this->DB_ord.".deliverytype,
                            ".$this->DB_ord_status.".orderstatus_desc
                        ")
                ->from($this->DB_ord_details)
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                ->join( $this->DB_ord, " ".$this->DB_ord.".id = ".$this->DB_ord_details.".orderid " )
                ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                ->where(" ".$this->DB_ord_details.".status ", $ord_by)
                ->where(" ".$this->DB_ord_details.".isdeleted ", 0);

        return $this->db->count_all_results();  
    }
    
    public function _unseen_orders() {
        
        
        if($_POST["view"] != '')
        {
            $this->db->set('admin_read_status', 1);  
            $this->db->update($this->DB_ord_details); 
            
        
        }
        else 
            {
        
             $this->db->where("admin_read_status ", 0)
                      ->where("isdeleted ", 0);
             $query= $this->db->count_all_results($this->DB_ord_details);
             return $query;
             
            }
        //print("<pre>".print_r($query,true)."</pre>");
        //die;
        
    }
    
    
    
    
    
     // THIS FEILD GET ALL Table Reservation
        
        var $list_table_set = array(
                                
                                " tablereservations.createdat",
                                " tablereservations.tablecode",
                                " accounts.firstname ",
                                " restaurants.companyname",
                                " tablereservations.contactname",
                                " tablereservations.checkindate",
                                " tablereservations.contactphone",
                                //" tablereservations.contactemail",
                                NULL,
                                " tablereservations.numguest",
                                " tablereservations.requeststatus",
                            ); //set column field database for datatable orderable
    
    
    
    public function _make_table_reservation() {
        
        
        $table_search = array(
                                
                                " ".$this->DB_tablereserv.".createdat",
                                " ".$this->DB_tablereserv.".tablecode",
                                " ".$this->DB_tablereserv.".contactname",
                                " ".$this->DB_tablereserv.".checkindate",
                                " ".$this->DB_tablereserv.".contactphone",
                                //" ".$this->DB_tablereserv.".contactemail",
                                " ".$this->DB_tablereserv.".numguest",
            
                                " ".$this->DB_res.".companyname",
                                " ".$this->DB_account_r.".firstname",
                                " ".$this->DB_account_r.".lastname",
            
                                
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_tablereserv.".*,
                            ".$this->DB_res.".companyname,
                            ".$this->DB_account_r.".firstname,
                            ".$this->DB_account_r.".lastname
                         ")
                ->from($this->DB_tablereserv)
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_tablereserv.".restaurantid " )
                ->join( $this->DB_account_r, " ".$this->DB_account_r.".id = ".$this->DB_tablereserv.".accountid " )
                ->where(" ".$this->DB_tablereserv.".isdeleted ", 0);
       

        $i=0;
        foreach ($table_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_tablereserv.".isdeleted ", 0);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_tablereserv.".isdeleted ", 0);
                }
                if(count($table_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->list_table_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_tablereserv.".requeststatus", 'ASC');
            $this->db->order_by(" ".$this->DB_tablereserv.".createdat", 'DESC');
        }
    }
    
    public function _get_table_reservation() 
    {
        $this->_make_table_reservation();
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_table_reservation()
    {  
           $this->_make_table_reservation();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_all_table_reservation()  
    {  
        $this->db->select(" 
                            ".$this->DB_tablereserv.".*,
                            ".$this->DB_res.".companyname,
                            ".$this->DB_account_r.".firstname,
                            ".$this->DB_account_r.".lastname
                         ")
                ->from($this->DB_tablereserv)
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_tablereserv.".restaurantid " )
                ->join( $this->DB_account_r, " ".$this->DB_account_r.".id = ".$this->DB_tablereserv.".accountid " )
                ->where(" ".$this->DB_tablereserv.".isdeleted ", 0);

        return $this->db->count_all_results();  
    }
    
    
    
    
    // THIS FEILD GET ALL B2C User ORDERS
        
        var $b2corder_set = array(
                                
                                " orderlistdetails.createdat",
                                " orderlistdetails.ordercode",
                                " accounts.firstname ",
                                "restaurants.companyname",
                                "restaurants.merchanttype",
                                " orderlistdetails.productname",
                                "state_cities.cityname",
                                " orderlistdetails.price",
                                " orderlistdetails.status",
                                NULL,
                            ); //set column field database for datatable orderable
    
    
    
    public function _make_b2corder($status) {
        
        
        
        $b2corder_search = array(
                                
                                " ".$this->DB_ord_details.".createdat",
                                " ".$this->DB_ord_details.".ordercode",
                                " ".$this->DB_account_r.".firstname",
                                " ".$this->DB_account_r.".lastname",
                                " ".$this->DB_res.".companyname",
                                " ".$this->DB_res.".merchanttype",
                                " ".$this->DB_ord_details.".productname",
                                " ".$this->DB_city.".cityname",
                                " ".$this->DB_state.".statename",
                                " ".$this->DB_ord_details.".quantity",
                                " ".$this->DB_ord_details.".price",
                                " ".$this->DB_ord_status.".orderstatus_desc"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_ord_details.".id,
                            ".$this->DB_ord_details.".ordercode,
                            ".$this->DB_ord_details.".productname,
                            ".$this->DB_ord_details.".quantity,
                            ".$this->DB_ord_details.".price,
                            ".$this->DB_ord_details.".status,
                            ".$this->DB_ord_details.".createdat,
                                
                            ".$this->DB_res.".companyname,
                            ".$this->DB_res.".merchanttype,
                            ".$this->DB_account_r.".firstname,
                            ".$this->DB_account_r.".lastname,
                            ".$this->DB_city.".cityname,
                            ".$this->DB_state.".statename,
                            ".$this->DB_ord_status.".orderstatus_desc
                        ")
                ->from($this->DB_ord_details)
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                ->join( $this->DB_ord, " ".$this->DB_ord.".id = ".$this->DB_ord_details.".orderid " )
                ->join( $this->DB_account_r, " ".$this->DB_account_r.".id = ".$this->DB_ord.".accountid " )
                ->join( $this->DB_address, " ".$this->DB_address.".id = ".$this->DB_ord.".accountaddressid " )
                ->join( $this->DB_city, " ".$this->DB_city.".id = ".$this->DB_address.".cityid " )
                ->join( $this->DB_state, " ".$this->DB_state.".id = ".$this->DB_address.".stateid " )
                ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" );
                if($status <= 5)
                    {
                        $this->db->where(" ".$this->DB_ord_details.".status ",(int) $status);
                    }
       

        $i=0;
        foreach ($b2corder_search as $item) // loop column 
        {   
            
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value']);
                    if($status <= 5)
                    {
                        $this->db->where(" ".$this->DB_ord_details.".status ",(int) $status);
                    }
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                    if($status <= 5)
                    {
                        $this->db->where(" ".$this->DB_ord_details.".status ",(int) $status);
                    }
                }
                if(count($b2corder_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->b2corder_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_ord_details.".createdat", 'DESC');
            $this->db->order_by(" ".$this->DB_ord_details.".status", 'ASC');
        }
    }
    
    public function _get_b2corder($status) 
    {
        //print_r();
        $this->_make_b2corder($status);
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_b2corder($status)
    {  
           $this->_make_b2corder($status);  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_all_b2corder($status)  
    {  
        $this->db->select(" 
                            ".$this->DB_ord_details.".id,
                            ".$this->DB_ord_details.".ordercode,
                            ".$this->DB_ord_details.".productname,
                            ".$this->DB_ord_details.".quantity,
                            ".$this->DB_ord_details.".price,
                            ".$this->DB_ord_details.".status,
                            ".$this->DB_ord_details.".createdat,
                                
                            ".$this->DB_res.".companyname,
                            ".$this->DB_res.".merchanttype,
                            ".$this->DB_account_r.".firstname,
                            ".$this->DB_account_r.".lastname,
                            ".$this->DB_city.".cityname,
                            ".$this->DB_state.".statename,
                            ".$this->DB_ord_status.".orderstatus_desc
                        ")
                ->from($this->DB_ord_details)
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                ->join( $this->DB_ord, " ".$this->DB_ord.".id = ".$this->DB_ord_details.".orderid " )
                ->join( $this->DB_account_r, " ".$this->DB_account_r.".id = ".$this->DB_ord.".accountid " )
                ->join( $this->DB_address, " ".$this->DB_address.".id = ".$this->DB_ord.".accountaddressid " )
                ->join( $this->DB_city, " ".$this->DB_city.".id = ".$this->DB_address.".cityid " )
                ->join( $this->DB_state, " ".$this->DB_state.".id = ".$this->DB_address.".stateid " )
                ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" );
                if($status <= 5)
                    {
                        $this->db->where(" ".$this->DB_ord_details.".status ",(int) $status);
                    }

        return $this->db->count_all_results();  
    }
    
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function _all_restaurant_data_fromorder() 
    {
        //$query = $this->db->select('*')->from($this->DB_res)->get();
        $this->db->distinct();
        $this ->db->select("
                            ".$this->DB_ord_details.".restaurantid,
                            ".$this->DB_res.".companyname
                         ")
                    
                ->from($this->DB_ord_details)
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                ->order_by(" ".$this->DB_res.".companyname");
        $query = $this->db->get();
        return $query->result();
    }
    public function _get_pending_data_fromorder() 
    {
        $this->db->distinct();
        $this ->db->select("
                            ".$this->DB_ord_details.".restaurantid,
                            ".$this->DB_res.".companyname
                         ")
                    
                ->from($this->DB_ord_details)
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                ->where(" ".$this->DB_ord_details.".status ", 1)
                ->order_by(" ".$this->DB_res.".companyname");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function _get_processing_data_fromorder() 
    {
        $this->db->distinct();
        $this ->db->select("
                            ".$this->DB_ord_details.".restaurantid,
                            ".$this->DB_res.".companyname
                         ")
                    
                ->from($this->DB_ord_details)
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                ->where(" ".$this->DB_ord_details.".status ", 2)
                ->order_by(" ".$this->DB_res.".companyname");
        $query = $this->db->get();
        return $query->result();
    }
    public function _get_delivery_data_fromorder() 
    {
        $this->db->distinct();
        $this ->db->select("
                            ".$this->DB_ord_details.".restaurantid,
                            ".$this->DB_res.".companyname
                         ")
                    
                ->from($this->DB_ord_details)
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                ->where(" ".$this->DB_ord_details.".status ", 3)
                ->order_by(" ".$this->DB_res.".companyname");
        $query = $this->db->get();
        return $query->result();
    }
    public function _get_delivered_data_fromorder() 
    {
        $this->db->distinct();
        $this ->db->select("
                            ".$this->DB_ord_details.".restaurantid,
                            ".$this->DB_res.".companyname
                         ")
                    
                ->from($this->DB_ord_details)
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                ->where(" ".$this->DB_ord_details.".status ", 4)
                ->order_by(" ".$this->DB_res.".companyname");
        $query = $this->db->get();
        return $query->result();
    }
    public function _get_canceled_data_fromorder() 
    {
        $this->db->distinct();
        $this ->db->select("
                            ".$this->DB_ord_details.".restaurantid,
                            ".$this->DB_res.".companyname
                         ")
                    
                ->from($this->DB_ord_details)
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                ->where(" ".$this->DB_ord_details.".status ", 5)
                ->order_by(" ".$this->DB_res.".companyname");
        $query = $this->db->get();
        return $query->result();
    }
    
    
    
    
    public function _get_pending_order()
    {   
        
        $this ->db->select("".$this->DB_ord_details.".*, ".$this->DB_res.".companyname ")
                   ->from($this->DB_ord_details)
                   ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                   ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                   ->where(" ".$this->DB_ord_details.".status ", 1)
                   ->where(" ".$this->DB_ord_details.".isdeleted ", 0);
           $query = $this->db->get()->result();
           return $query;
           //print("<pre>".print_r($query,true)."</pre>");
           //die;
    }
    
    public function _get_processing_order()
    {
        $this ->db->select("".$this->DB_ord_details.".*, ".$this->DB_res.".companyname ")
                   ->from($this->DB_ord_details)
                   ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                   ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                   ->where(" ".$this->DB_ord_details.".status ", 2)
                   ->where(" ".$this->DB_ord_details.".isdeleted ", 0);
           $query = $this->db->get()->result();
           return $query;
    }
    
    public function _get_delivery_order()
    {
        $this ->db->select("".$this->DB_ord_details.".*, ".$this->DB_res.".companyname ")
                   ->from($this->DB_ord_details)
                   ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                   ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                   ->where(" ".$this->DB_ord_details.".status ", 3)
                   ->where(" ".$this->DB_ord_details.".isdeleted ", 0);
           $query = $this->db->get()->result();
           return $query;
    }
    
    public function _get_delivered_order()
    {
        $this ->db->select("".$this->DB_ord_details.".*, ".$this->DB_res.".companyname ")
                   ->from($this->DB_ord_details)
                   ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                   ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                   ->where(" ".$this->DB_ord_details.".status ", 4)
                   ->where(" ".$this->DB_ord_details.".isdeleted ", 0);
           $query = $this->db->get()->result();
           return $query;
    }
    
    public function _get_canceled_order()
    {
        $this ->db->select("".$this->DB_ord_details.".*, ".$this->DB_res.".companyname ")
                   ->from($this->DB_ord_details)
                   ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                   ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                   ->where(" ".$this->DB_ord_details.".status ", 5)
                   ->where(" ".$this->DB_ord_details.".isdeleted ", 0);
           $query = $this->db->get()->result();
           return $query;
    }
    
    public function _update_order_flow($status, $id)
    {
        $this->db->set('status', $status); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_ord_details); 
        return true;
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
    public function get_allcity() 
    {
        $this->db->select('*')
             ->from($this->DB_city)
             ->where('status',1)
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
    public function get_state_name_where($by_name) 
    {
        $this->db->select('id,statename')
             ->from($this->DB_state)
             ->where('statename',$by_name);

        $query = $this->db->get();
        return $query->result_array();
        //return $query->result_array();

    }
    public function get_city_where($by_id) 
    {
        $this->db->select('*')
             ->from($this->DB_city)
             ->where('id',(int)$by_id);

        $query = $this->db->get();
        return $query->result_array();
        //print("<pre>".print_r($query->result_array(),true)."</pre>");
        //die;

    }
    public function get_city_name_where($by_id,$by_name) 
    {
        $this->db->select('*')
             ->from($this->DB_city)
             ->where('stateid',(int)$by_id)
             ->where('cityname',$by_name);

        $query = $this->db->get();
        return $query->result_array();
        //print("<pre>".print_r($query->result_array(),true)."</pre>");
        //die;

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
                            $list[$row->id]['accountinfo']=   $this->get_users_by($row->accountid);

                    }	
            }

            return $list;
    }
    
    public function get_users_by($usrid) 
    {
        $query = $this->db->get_where($this->DB_account_r, array('id' => (int)$usrid ,'isdeleted' =>'0'));
        return $query->result_array();
    }
        
    public function get_order_products_where($by_id)
        {
            $this->db->select(" ".$this->DB_ord_details.".*, ".$this->DB_res.".companyname ")
                 ->from($this->DB_ord_details)
                 ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_ord_details.".restaurantid " )
                 ->where(" ".$this->DB_ord_details.".id",$by_id);
            

		$query = $this->db->get();

		$get_rest = array();

		if($query->num_rows() > 0)
                    {
			foreach ($query->result() as $row)
			   {
                                $rest_id                            =   $row->id; //get id of each restaurant for
                                $get_rest[$row->id]['id']           =   $row->id;
                                $get_rest[$row->id]['ordercode']    =   $row->ordercode;
                                $get_rest[$row->id]['rest_name']    =   $row->companyname;
                                $get_rest[$row->id]['productid']    =   $row->productid;
                                $get_rest[$row->id]['productname']  =   $row->productname;
                                $get_rest[$row->id]['addedmenu']    =   $row->addedmenu;
                                $get_rest[$row->id]['quantity']     =   $row->quantity;
                                $get_rest[$row->id]['price']        =   $row->price;
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
                  var_dump($get_rest);
                  print("<pre>".print_r($get_rest,true)."</pre>");
                  die;
                 */
        }
        
        
     
    public function get_admin_info() 
    {
        
        $this->db->select(" ".$this->DB_setting." .*")
                 ->from($this->DB_setting)
                 ->where(" ".$this->DB_setting.".id","1");
        $query = $this->db->get()->row();
        return $query;
        
        //print("<pre>".print_r($query,true)."</pre>");
        //die;
        
    }
    public function get_restaurant_time ()
    {
        $query = $this->db->get_where($this->DB_res_time, array(
                                                        'restaurantid' => (int)$_SESSION['rest_id'],
                                                        'isdeleted' =>'0'
                                                            )
                                                        );
        return $query->row();
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
    
    public function get_address_where($by_id) 
    {   
        $by_userid = $this->session->userdata('User_id');
    
        $this->db->select(" ".$this->DB_address.".*  , ".$this->DB_city.".cityname , ".$this->DB_state.".statename")
                 ->from($this->DB_address);
        if(isset($by_id) && !empty($by_id))
        {
            $this->db->where(" ".$this->DB_address.".id",(int)$by_id);
        }
          $this->db->where(" ".$this->DB_address.".accountid",(int)$by_userid)
                    ->where(" ".$this->DB_address.".isdeleted ",0)
                    ->order_by( " ".$this->DB_address.".createdat" , "DESC")
                    ->join( $this->DB_city, " ".$this->DB_city.".id = ".$this->DB_address.".cityid " ,"LEFT ")
                    ->join( $this->DB_state, " ".$this->DB_state.".id = ".$this->DB_address.".stateid ","LEFT ");

          $query = $this->db->get();
          
       return $query->result();
    }
      
    public function _all_restaurant_data() 
    {
        $query = $this->db->select('*')->from($this->DB_res)->get();
        //$this->db->where(" ".$this->DB_res.".merchanttype ", "cuisine");
        $query = $this->db->get($this->DB_res);
        return $query->result();
    }
    
    public function _all_restaurant_data_where($data) 
    {
        $this->db->select('*')
                 ->from($this->DB_res)
                 ->where_in('id',$data);
        $query = $this->db->get()->result();
        return $query;
    }
    
    public function _update_restaurant_data($data,$where) 
    {
        $this->db->where($where );
        $this->db->update($this->DB_res, $data);
        return true;
    }
    
    public function _update_time_data( $data)
    {
        $this->db->where('restaurantid', $_SESSION['rest_id'] );//which row want to upgrade  
        $this->db->update($this->DB_res_time, $data); 
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
    

    // THIS FEILD GET ALL delivering_location
        
        var $delivering_location_set = array(
                                
                                " states.statename",
                                " state_cities.cityname"
                            ); //set column field database for datatable orderable
    
    
    
    public function _make_delivering_location() {
        
        
        
        $location_search = array(
                                
                                " ".$this->DB_state.".id",
                                " ".$this->DB_state.".statename",
                                " ".$this->DB_city.".id",
                                " ".$this->DB_city.".cityname",
                                " ".$this->DB_deliviering_charges.".delivieringcharges"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_state.".id as stateid,
                            ".$this->DB_state.".statename,
                            ".$this->DB_city.".id as cityid,
                            ".$this->DB_city.".cityname,
                            ".$this->DB_deliviering_charges.".id as delivieringchargesid,
                            ".$this->DB_deliviering_charges.".freedelivieringstatus,
                            ".$this->DB_deliviering_charges.".delivieringcharges
                        ")
                ->from($this->DB_state)
                ->join( $this->DB_city, " ".$this->DB_city.".stateid = ".$this->DB_state.".id " )
                ->join( $this->DB_deliviering_charges, " ".$this->DB_deliviering_charges.".cityid = ".$this->DB_city.".id " ,'left')
                //->where(" ".$this->DB_deliviering_charges.".restaurantid ", 0)
                ->where(" ".$this->DB_city.".status ", 1)
                ->where(" ".$this->DB_state.".status ", 1)
                ->where(" ".$this->DB_city.".isdeleted ", 0)
                ->where(" ".$this->DB_state.".isdeleted ", 0);
        
       

        $i=0;
        foreach ($location_search as $item) // loop column 
        {   
            
            if (isset($_POST["state_id"]))
            {
                if (!empty($_POST["state_id"]))
                {
                $this->db->where(" ".$this->DB_state.".id ", $_POST["state_id"])
                         //->where(" ".$this->DB_deliviering_charges.".restaurantid ", 0)
                         ->where(" ".$this->DB_city.".status ", 1)
                         ->where(" ".$this->DB_state.".status ", 1)
                         ->where(" ".$this->DB_city.".isdeleted ", 0)
                         ->where(" ".$this->DB_state.".isdeleted ", 0);
                }
            }  
            
            if(isset($_POST["city_id"]) )
            {
                if(!empty($_POST["city_id"]))
                {
                $this->db->where(" ".$this->DB_city.".id ", $_POST["city_id"])
                         //->where(" ".$this->DB_deliviering_charges.".restaurantid ", 0)
                         ->where(" ".$this->DB_city.".status ", 1)
                         ->where(" ".$this->DB_state.".status ", 1)
                         ->where(" ".$this->DB_city.".isdeleted ", 0)
                         ->where(" ".$this->DB_state.".isdeleted ", 0);
                }
            }
            
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            //->where(" ".$this->DB_deliviering_charges.".restaurantid ", 0)
                            ->where(" ".$this->DB_city.".status ", 1)
                            ->where(" ".$this->DB_state.".status ", 1)
                            ->where(" ".$this->DB_city.".isdeleted ", 0)
                            ->where(" ".$this->DB_state.".isdeleted ", 0);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            //->where(" ".$this->DB_deliviering_charges.".restaurantid ", 0)
                            ->where(" ".$this->DB_city.".status ", 1)
                            ->where(" ".$this->DB_state.".status ", 1)
                            ->where(" ".$this->DB_city.".isdeleted ", 0)
                            ->where(" ".$this->DB_state.".isdeleted ", 0);
                }
                if(count($location_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->delivering_location_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_state.".statename", 'ASC');
            $this->db->order_by(" ".$this->DB_deliviering_charges.".delivieringcharges", 'DESC');
        }
    }
    
    public function _get_delivering_location() 
    {
        //print_r();
        $this->_make_delivering_location();
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_delivering_location()
    {  
           $this->_make_delivering_location();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_all_delivering_location()  
    {  
        $this->db->select(" 
                            ".$this->DB_state.".id as stateid,
                            ".$this->DB_state.".statename,
                            ".$this->DB_city.".id as cityid,
                            ".$this->DB_city.".cityname,
                            ".$this->DB_deliviering_charges.".id as delivieringchargesid,
                            ".$this->DB_deliviering_charges.".freedelivieringstatus,
                            ".$this->DB_deliviering_charges.".delivieringcharges
                        ")
                ->from($this->DB_state)
                ->join( $this->DB_city, " ".$this->DB_city.".stateid = ".$this->DB_state.".id " )
                ->join( $this->DB_deliviering_charges, " ".$this->DB_deliviering_charges.".cityid = ".$this->DB_city.".id " ,'left')
                //->where(" ".$this->DB_deliviering_charges.".restaurantid ", 0)
                ->where(" ".$this->DB_city.".status ", 1)
                ->where(" ".$this->DB_state.".status ", 1)
                ->where(" ".$this->DB_city.".isdeleted ", 0)
                ->where(" ".$this->DB_state.".isdeleted ", 0);

        return $this->db->count_all_results();  
    }
    
    public function _delivieringcharges_update_status($id,$value) 
    {
        $this->db->set('freedelivieringstatus', $value); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_deliviering_charges); 
        return true;

    }
    public function _delivieringcharges_update($id,$value) 
    {
        $this->db->set('delivieringcharges', $value); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_deliviering_charges); 
        if ( $this->db->affected_rows() > 0 )
        {
            return true;
        }

    }
    public function _delivieringcharges_save($data) 
    {
        $this->db->insert($this->DB_deliviering_charges, $data);
            
        if ( $this->db->affected_rows() > 0 )
        {
            $lastid = $this->db->insert_id();
            return $this->db->insert_id();
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    // THIS FEILD GET ALL ORDERS
        
        var $location_set = array(
                                " states.statename",
                                " states.status",
                                " state_cities.cityname",
                                " state_cities.cityname"
                            ); //set column field database for datatable orderable
    
    
    
    public function _make_location() {
        
        
        
        $location_search = array(
                                
                                " ".$this->DB_state.".id",
                                " ".$this->DB_state.".statename",
                                " ".$this->DB_city.".id",
                                " ".$this->DB_city.".cityname"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_state.".id as stateid,
                            ".$this->DB_state.".statename,
                            ".$this->DB_state.".status as statestatus,
                            ".$this->DB_city.".id as cityid,
                            ".$this->DB_city.".cityname,
                            ".$this->DB_city.".status as citystatus
                        ")
                ->from($this->DB_state)
                ->join( $this->DB_city, " ".$this->DB_city.".stateid = ".$this->DB_state.".id " )
                ->where(" ".$this->DB_city.".isdeleted ", 0)
                ->where(" ".$this->DB_state.".isdeleted ", 0);
        
       

        $i=0;
        foreach ($location_search as $item) // loop column 
        {   
            
            if (isset($_POST["state_id"]))
            {
                if (!empty($_POST["state_id"]))
                {
                $this->db->where(" ".$this->DB_state.".id ", $_POST["state_id"])
                         ->where(" ".$this->DB_city.".isdeleted ", 0)
                         ->where(" ".$this->DB_state.".isdeleted ", 0);
                }
            }  
            
            if(isset($_POST["city_id"]) )
            {
                if(!empty($_POST["city_id"]))
                {
                $this->db->where(" ".$this->DB_city.".id ", $_POST["city_id"])
                         ->where(" ".$this->DB_city.".isdeleted ", 0)
                         ->where(" ".$this->DB_state.".isdeleted ", 0);
                }
            }
            
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_city.".isdeleted ", 0)
                            ->where(" ".$this->DB_state.".isdeleted ", 0);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_city.".isdeleted ", 0)
                            ->where(" ".$this->DB_state.".isdeleted ", 0);
                }
                if(count($location_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->location_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_state.".status", 'DESC');
            $this->db->order_by(" ".$this->DB_state.".statename", 'ASC');
        }
    }
    
    public function _get_location() 
    {
        //print_r();
        $this->_make_location();
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_location()
    {  
           $this->_make_location();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_all_location()  
    {  
        $this->db->select(" 
                            ".$this->DB_state.".id as stateid,
                            ".$this->DB_state.".statename,
                            ".$this->DB_state.".status as statestatus,
                            ".$this->DB_city.".id as cityid,
                            ".$this->DB_city.".cityname,
                            ".$this->DB_city.".status as citystatus
                        ")
                ->from($this->DB_state)
                ->join( $this->DB_city, " ".$this->DB_city.".stateid = ".$this->DB_state.".id " )
                ->where(" ".$this->DB_city.".isdeleted ", 0)
                ->where(" ".$this->DB_state.".isdeleted ", 0);

        return $this->db->count_all_results();  
    }
    
    public function _save_location_state($data) 
    {
        $this->db->insert($this->DB_state, $data);
            
        if ( $this->db->affected_rows() > 0 )
        {
            return true;
        }
        
    }
    public function _save_location_city($data) 
    {
        $this->db->insert($this->DB_city, $data);
            
        if ( $this->db->affected_rows() > 0 )
        {
            return true;
        }
        
    }
    public function _state_update_status($id,$value) 
    {
        $this->db->set('status', $value); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_state); 
        return true;

    }
    public function _city_update_status($id,$value) 
    {
        $this->db->set('status', $value); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_city); 
        return true;

    }
    public function _update_state($id,$value) 
    {
        $this->db->set('statename', $value); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_state); 
        return true;

    }
    public function _update_city($id,$value) 
    {
        $this->db->set('cityname', $value); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_city); 
        return true;

    }
    
    public function _update_support($data) 
    {
       $this->db->where('id','1');
       $this->db->update($this->DB_setting,$data);
       return true;

    }
    
    
     public function _unseen_table() {
        
        
        if($_POST["view"] != '')
        {
            $this->db->set('admin_read_status', 1); 
            $this->db->update($this->DB_tablereserv); 
            
        
        }
        else 
            {
             $this->db->where("admin_read_status ", 0)
                      ->where("isdeleted ", 0);
             $query= $this->db->count_all_results($this->DB_tablereserv);
             return $query;
             
            }
        //print("<pre>".print_r($query,true)."</pre>");
        //die;
        
    }
    
    public function _get_parent_nav_by_cate()
        {
            
            $this->db->select('*');
            $this->db->from($this->DB_cat_fas)
                     ->where("categoryparentid ", 0)
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
                        $get_nav_cat[$row->id]['status']            =   $row->status;
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
                        $get_nav_cat[$row->id]['status']            =   $row->status;
                        $get_nav_cat[$row->id]['submenu_nav']       =   $this->get_nav_by_cate_submenu($row->id);
                        //$get_prd[$row->id]['canaddproduct'] =   $row->canaddproduct;
                    }
            }
            return $get_nav_cat;
        }
        
        public function _insert_fashioncategory_data($data) 
        {
            $config = array(
                        'table' => $this->DB_cat_fas,
                        'id' => 'id',
                        'field' => 'slug',
                        'title' => 'title',
                        'replacement' => 'dash' // Either dash or underscore
                        );
            $this->load->library('slug', $config);

            $data_slug = array(
                    'slug' => $_POST["save_name"],       // slug name of filed in db were ur url is stored
                    );
            $data['slug'] = $this->slug->create_uri($data_slug);
        
            $this->db->insert($this->DB_cat_fas, $data);

            if ( $this->db->affected_rows() > 0 )
            {
                return true;
            }
        }
        
        public function _update_fashioncategory_data($id,$data) 
        {
            $config = array(
                        'table' => $this->DB_cat_fas,
                        'id' => 'id',
                        'field' => 'slug',
                        'title' => 'title',
                        'replacement' => 'dash' // Either dash or underscore
                        );
            $this->load->library('slug', $config);
            
            $data_slug = array(
                    'slug' => $_POST["name_"],       // slug name of filed in db were ur url is stored
                    );
            $data['slug'] = $this->slug->create_uri($data_slug,$id);
            
            
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_cat_fas, $data); 
            return true;
            
        }
        
        public function _remove_fashioncategory($id) 
        {
            $this->db->delete($this->DB_cat_fas, array('id' => $id));
            return true;
        }
    
        public function _get_cate_size_()
        {
            
            $this->db->select('*');
            $this->db->from($this->DB_size_cat)
                     ->where("status ", 1)
                     ->where("isdeleted ", 0)
                     ->order_by("createdat" , "DESC");
            
            
            $query = $this->db->get();
            $get_cat	= array();
            
            if($query->num_rows() > 0)
            {
                foreach($query->result() as $row)
                    {
                        $get_cat[$row->id]['id']            =   $row->id;
                        $get_cat[$row->id]['sizecategory']  =   $row->sizecategory;
                        $get_cat[$row->id]['status']        =   $row->status;
                        $get_cat[$row->id]['size']          =   $this->_get_size_by_cate($row->id);// feach data by category from the category_fashion tb 
                           
                    }
            }
            //print("<pre>".print_r($get_cat,true)."</pre>");die;
            return $get_cat;
            
        }
        
        public function _get_size_by_cate($by_cate)
        {
            $this->db->select('*');
            $this->db->from($this->DB_size);
            $this->db->where("sizecategoryid ", $by_cate)
                     ->where("isdeleted ", 0)
                     ->order_by("arrange" , "ASC")
                     ->order_by("createdat", "DESC");
            
            
            $query = $this->db->get();
            $get_size	= array();
            
            if($query->num_rows() > 0)
            {
                foreach($query->result() as $row)
                    {
                        
                        $get_size[$row->id]['id']               =   $row->id;
                        $get_size[$row->id]['sizename']         =   $row->sizename;
                        $get_size[$row->id]['sizecode']         =   $row->sizecode;
                        $get_size[$row->id]['arrange']          =   $row->arrange;
                        $get_size[$row->id]['status']           =   $row->status;
                    }
            }
            return $get_size;
        }
        public function _update_fashionsizecategory_data($id,$data) 
        {
            
            
            $this->db->where('sizecategory', $id); //which row want to upgrade  
            $this->db->update($this->DB_size, $data); 
            return true;
            
        }
        public function _size_update_name($id,$value) 
        {
            $this->db->set('sizename', $value); 
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_size); 
            return true;
            
        }
        
        public function _size_update_code($id,$value) 
        {
            $this->db->set('sizecode', $value); 
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_size); 
            return true;
            
        }
        
        public function _size_update_status($id,$value) 
        {
            $this->db->set('status', $value); 
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_size); 
            return true;
            
        }
        
        public function _size_order_name($id,$value) 
        {
            $this->db->set('arrange', $value); 
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_size); 
            return true;
        }
        
        public function _delete_fashionsizecategory($id) 
        {
            $this->db->delete($this->DB_size_cat, array('id' => $id));
            return true;
        }
        public function _delete_fashionsize($id) 
        {
            $this->db->delete($this->DB_size, array('id' => $id));
            return true;
        }
        
        public function _insert_fashionsizecategory_data($data) 
        {
            $this->db->insert($this->DB_size_cat, $data);

            if ( $this->db->affected_rows() > 0 )
            {
                return true;
            }
        }
        
        public function _insert_fashionsize_data($data) 
        {
            $this->db->insert($this->DB_size, $data);

            if ( $this->db->affected_rows() > 0 )
            {
                return true;
            }
        }
        
        
        var $color_order_set = array(
                                
                                " colorname",
                                " colorcode",
                                NULL,
                                NULL,
                            ); //set column field database for datatable orderable
    
    
    
    public function _make_color() {
        
        
        $color_search = array(
                                
                                " colorname",
                                " colorcode"
                            );
        
        
        
        $this->db->select("*")
                ->from($this->DB_color)
                ->where(" isdeleted ", 0);
       

        $i=0;
        foreach ($color_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" isdeleted ", 0);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" isdeleted ", 0);
                }
                if(count($color_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->color_order_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" colorname", 'ASC');
        }
    }
    
    public function _get_color() 
    {
        $this->_make_color();
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_color()
    {  
           $this->_make_color();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function _get_color_all()  
    {  
        $this->db->select(" * ")
                ->from($this->DB_color)
                ->where(" isdeleted ", 0);

        return $this->db->count_all_results();  
    }
    
    public function _get_color_where($data) 
    {
        $this->db->select('*');
        $this->db->from($this->DB_color)
                 ->where($data);
        $query = $this->db->get()->result();

        return $query;
    }
    
    public function _insert_fashioncolor_data($data) 
    {
        $this->db->insert($this->DB_color, $data);

        if ( $this->db->affected_rows() > 0 )
        {
            return true;
        }
    }
    public function _update_fashioncolor_data($id,$data) 
    {
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_color, $data); 
        return true;
    }
    
    public function _delete_fashioncolor($id) 
    {
        $this->db->delete($this->DB_color, array('id' => $id));
        return true;
    }
    
    public function _insert_cuisineslider_data($data) 
    {
        $this->db->insert($this->DB_img_ads, $data);

        if ( $this->db->affected_rows() > 0 )
        {
            return true;
        }
    }
    
    
    public function _count_all_cuisinebanner($usertype)  
    {  
        $this->db->select("*")
                ->from($this->DB_img_ads)
                ->where("bannertypeid ", $usertype)
                ->where("isdeleted ", 0);
                    
        return $this->db->count_all_results();  
        //$query = $this->db->get()->result();
        //return $query;
    }
    public function _get_paystackbanks() {
        
        $this->db->select('*')
             ->from($this->paystack_bank);

        $query = $this->db->get();
        return $query->result();
    }
    
    public function _promo_duration_option()
    {
        $this->db->select('*');
        $this->db->from($this->DB_promo_duration)
                 ->where("status ", 1);
        
                 //->order_by("arrangecategory" , "ASC");

        $query = $this->db->get()->result();
        
        //print("<pre>".print_r($query,true)."</pre>");die;
        return $query;
    }
    public function get_promoduration_where($by_id) 
    {
        $this->db->select("
                           ".$this->DB_promo_duration.".durationname,
                           ".$this->DB_promo_price.".* 
                       ")
             ->from($this->DB_promo_price)
             ->join( $this->DB_promo_duration, " ".$this->DB_promo_duration.".id = ".$this->DB_promo_price.".promodurationid ", 'left')
             ->where(" ".$this->DB_promo_price.".bannertypeid",(int)$by_id);
        
        $this->db->where(" ".$this->DB_promo_duration.".status",'1');
        $this->db->where(" ".$this->DB_promo_price.".status",'1');
        $this->db->order_by(" ".$this->DB_promo_duration.".order", 'ASC');

        $query = $this->db->get();
        //print("<pre>".print_r($query->result_array(),true)."</pre>");die;
        return $query->result();
    }

}



                     





























