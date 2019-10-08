<?php

if(!defined('BASEPATH'))exit('No direct script access allowed');

class Restaurant_admin_model extends CI_Model
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
    private $DB_setting = "settings";
    private $DB_tablereserv = "tablereservations";
    private $DB_promo_duration = "promo_duration";
    private $DB_promo_price = "promo_price";
    private $DB_img_ads = "img_ads";
    private $DB_bannertype = "bannertype";
    private $DB_system_modules = "system_modules";
    private $DB_role_assignments = "role_assignments";
    private $DB_user_roles = "user_roles";
    
            
    function __construct()
        {
	
            parent::__construct();
            $this->load->model('oye/Session_model'); // call in the session model class
            $this->load->model('oye/Email_model'); // call in the emai;l model class
            $this->load->model('oye/Role_assignment'); // call in the emai;l model class
		
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
                ->where(" ".$this->DB_product.".categoryid >", 0)
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
                ->where(" ".$this->DB_product.".categoryid >", 0)
                ->where(" ".$this->DB_product.".restaurantid ", $by_id)
                ->join( $this->DB_cat, " ".$this->DB_cat.".id = ".$this->DB_product.".categoryid ", "LEFT OUTER"); 

        return $this->db->count_all_results();  
    }
    
    
    
    
    public function _save_product($data,$status) 
    {
        $this->db->insert($this->DB_product, $data);
            
        if ( $this->db->affected_rows() > 0 )
        {
            //return true;
            $parent_id = $this->db->get_where($this->DB_product , array('productname'=>$_POST["product_name"]))->row()->id; // get the id of save product 
            
            $productnameArr  = $_POST['addproduct_name'];
            $productpriceArr = $_POST['addproduct_price'];
            
                if(!empty($productnameArr) && !empty($productpriceArr))
                {
                    for($i = 0; $i < count($productnameArr); $i++){
                        if( !empty($productnameArr[$i]) && !empty($productpriceArr[$i]) )
                        {
                            $data_merge = array(
                                    'restaurantid'  =>  $_SESSION['rest_id'],
                                    'productname'   =>  $productnameArr[$i],
                                    'productprice'  =>  $productpriceArr[$i],
                                    'status'        =>  $status
                            );

                            
                            $this->db->insert($this->DB_product, $data_merge); // insert query here
            
                            if ( $this->db->affected_rows() > 0 )
                            {
                                
                                $child_id = $this->db->get_where($this->DB_product , array('productname'=>$productnameArr[$i]))->row()->id; // get the id of save product
                                
                                $data_merge_id = array(
                                        'parentproductid'   => $parent_id,
                                        'childproductid'    => $child_id,
                                        'price'             => $productpriceArr[$i]
                                     );
                                $this->db->insert($this->DB_productmerges, $data_merge_id);
                            }
                        }
                    }  
                }
            
            return TRUE;
        }
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    var $cate_order_set = array(
                                
                                " categoryname",
                                " arrangecategory",
                                " categorystatus",
                                NULL,
                            ); //set column field database for datatable orderable
    
    
    
    public function _make_cate() {
        
        $by_id = $_SESSION['rest_id'];
        
        $cate_search = array(
                                
                                " categoryname",
                                " arrangecategory",
                                " categorystatus"
                            );
        
        
        
        $this->db->select("*")
                ->from($this->DB_cat)
                ->where(" isdeleted ", 0)
                ->where(" restaurantid ", $by_id);
       

        $i=0;
        foreach ($cate_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" isdeleted ", 0)
                            ->where(" restaurantid ", $by_id);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" isdeleted ", 0)
                            ->where(" restaurantid ", $by_id);
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
            $this->db->order_by(" arrangecategory", 'ASC');
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
        $by_id = $_SESSION['rest_id']; 
        $this->db->select(" * ")
                ->from($this->DB_cat)
                ->where(" isdeleted ", 0)
                ->where(" restaurantid ", $by_id);

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


    public function _insertrestaurant($data)
    {
        $this->db->insert($this->DB_res, $data);

        if ( $this->db->affected_rows() > 0 )
            {
                return true;
            }
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
        /*
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
                        'table' => $this->DB_cat,
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
            $this->db->update($this->DB_cat,$data); 
            return true;
            
        }
        
        public function _cat_update_status($id,$value) 
        {
            $this->db->set('categorystatus', $value); 
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_cat); 
            return true;
            
        }
        
        public function _cat_order_name($id,$value) 
        {
            $this->db->set('arrangecategory', $value); 
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_cat); 
            return true;
            
        }
        
        public function _get_cat_where($name,$id)
        {
           $this ->db->select('*')
                   ->from($this->DB_cat)
                   ->where('categoryname', $name)
                   ->where('restaurantid', $id);
           $query = $this->db->get();
           return $query->result();
        }    
        
        public function _save_cate($data) 
        {
            $config = array(
                            'table' => $this->DB_cat,
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
            
            $this->db->insert($this->DB_cat, $data);

            if ( $this->db->affected_rows() > 0 )
            {
                return true;
            }
        }
        
        public function _product_price($id,$value,$type) 
        {
            $this->db->set('productprice', $value);
            $this->db->where('id', $id);
            $this->db->update($this->DB_product); 
            
            if($type=='sub')
                {
                    $this->db->set('price', $value);
                    $this->db->where('childproductid', $id);
                    $this->db->update($this->DB_productmerges); 
                }
                
            return TRUE;
            
            /*   
             *  
            $this->db->set('a.productprice', $value);
            $this->db->set('b.price', $value);
            
            $this->db->where('a.id', $id);
            $this->db->where('b.childproductid', $id);
            $this->db->update(" ".$this->DB_product." as a ", " ".$this->DB_productmerges." as b");
            
             * 
             */
        }
        public function _product_update_name($id,$value) 
        {
            $this->db->set('productname', $value); 
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_product); 
            return true;
            
        }
        public function _product_update_status($id,$value) 
        {
            $this->db->set('status', $value); 
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_product); 
            return true;
            
        }
        public function _product_update_des($id,$value) 
        {
            $this->db->set('productdesc', $value); 
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_product); 
            return true;
            
        }
        public function _product_update_img($id,$data) 
        {
            $file = $this->get_image_name_b4($id); // get the Image name b4 Updating
            
            if ( !empty($file->productimage) )
               {
                    unlink(FCPATH."assets/uploads/rest_prod/".$file->productimage);
                    
               }
            
            $this->db->where('id', $id );
            $this->db->update($this->DB_product, $data);
            return true;
        }
        
        public function _delete_submenu_product($id) 
        {
           
           $this->db->where('id', $id);
           $query = $this->db->delete($this->DB_productmerges);
           
           if($query)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        
        public function _delete_mainmenu_product($id) 
        {
           //$file = $this->get_image_name($id); // get the name b4 deleting
           
           //print("<pre>".print_r($file->productimage,true)."</pre>");
           //die;
           
            
           /*if ( !empty($file->productimage) )
               {
                    unlink(FCPATH."assets/uploads/rest_prod/".$file->productimage);
                    
               }
            * 
            */
            
            $this->db->set('isdeleted', TRUE);
            $this->db->where('id', $id); //which row want to upgrade  
            $query = $this->db->update($this->DB_product); 
            
            $this->db->set('isdeleted', TRUE);
            $this->db->where('parentproductid', $id); //which row want to upgrade  
            $query1 = $this->db->update($this->DB_productmerges); 
            
            
           
           if($query && $query1)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
            
        }
        public function get_image_name_b4($by_id)
        {
            return $this->db->select('*')
                    ->from($this->DB_product)
                    ->where('id', $by_id)
                    ->get()
                    ->row();
        }
        
        public function _insertnewrest($data)
        {
            
            $time = date('Y-m-d H:i:s');
            $tim  = strtotime($time);
            $token= do_hash($this->input->post('u_email').$tim);

            $site_email ='segun@stakle.com';
            $logo = 'jol.png';

            $sendemail = $this->Email_model->send_restaurant_registration_email($this->input->post('u_fname'), $this->input->post('u_lname'), $this->input->post('r_email'), $site_email, $logo,$token, $this->input->post('r_name') ); // send the Merchant an email
            //print("<pre>".print_r($sendemail,true)."</pre>");die;
            if($sendemail)
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
                        'slug' => $_POST['r_name'],       // slug name of filed in db were ur url is stored
                        );
                $data['slug'] = $this->slug->create_uri($data_slug);

                $this->db->insert($this->DB_res, $data);
            
                if ( $this->db->affected_rows() > 0 )
                {
                    // save the new user data  table //
                    
                    $_id = $this->db->get_where($this->DB_res , $data)->row()->id; // get the id of save db
                
                    $data_Newrest = array(  
                                    'restaurantid'  =>  $_id,
                                    'firstname'     =>  $this->input->post('u_fname'),
                                    'lastname'      =>  $this->input->post('u_lname'),
                                    'phonenumber'   =>  $this->input->post('u_phone'),
                                    'email'         =>  $this->input->post('u_email'),
                                    'confirmemail'  =>  $token,
                                    'password'      =>  md5($this->input->post('u_pwd')),
                                    'userroleid'    => 1
                                 );
                    
                    //get save and back the user id of reg restaurant
                    $getback_id = $this->_insertnewuser($data_Newrest);
                    
                    // update the save userid that reg the new restaurant table,
                    $this->db->set('usersid', $getback_id); 
                    $this->db->where('id', $_id); //which row want to upgrade  
                    $this->db->update($this->DB_res); 
                    
                    
                    return true;
                }
                else
                {
                    return 'data not save';
                }
            }
            else
            {
                return $sendemail;
            }
        }
        public function check_token($data) 
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
        // check if the token exist
        function signup_token($token)
        {


                $data_update = array(
                                    'confirmemail'  =>   'yes',
                                    'status'        =>   1
                                 );


                
                $this->db->where(array(" ".$this->DB_user.".confirmemail"=>$token));
                $status = $this->db->update($this->DB_user, $data_update);
                return $status;

        }
        public function _insertnewrest_formal($data,$data2)
        {
            $this->db->insert("restaurants_copy", $data);
            
            if ( $this->db->affected_rows() > 0 )
                {
                
                    $_id = $this->db->get_where("restaurants_copy" , $data)->row()->id; // get the id of save db
                
                    $data2 = array(
                                'restaurantid' => $_id,       // slug name of filed in db were ur url is stored
                                );
                    //get save and back the user id of reg restaurant
                    $getback_id = $this->_insertnewuser_formal($data2);
                    
                    // update the save userid that reg the new restaurant table,
                    $this->db->set('usersid', $getback_id); 
                    $this->db->where('id', $_id); //which row want to upgrade  
                    $this->db->update("restaurants_copy"); 
                    
                    // send the customer an email
                    $site_email ='segun@stakle.com';
                    $logo = 'jol.png';
                    //$this->Email_model->send_restaurant_registration_email($this->input->post('u_fname'), $this->input->post('u_lname'), $this->input->post('r_email'), $site_email, $logo );
                    
                    return true;
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
        public function _insertnewuser_formal($data)
        {
            $this->db->insert("users_copy", $data);
            
            if ( $this->db->affected_rows() > 0 )
                {
                
                    $_id = $this->db->get_where("users_copy" , $data)->row()->id; // get the id of save db
                    
                    return $_id;
                }
            
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
        
        public function newtoken($data,$by_id)
        {
            /*
            $this->db->set($data); 
            $this->db->where('id', $by_id); //which row want to upgrade  
            $this->db->update($this->DB_user); 
            */

            $this->db->where(array('id'=>$by_id));
            $status = $this->db->update($this->DB_user, $data);
            return $status;
            
        }
        public function _getrest_details_email($email) 
        {
            $this->db->select(" ".$this->DB_res." .companyname, ".$this->DB_user." .* ")
                 ->from($this->DB_res)
                ->join( $this->DB_user, " ".$this->DB_user.".restaurantid = ".$this->DB_res.".id " )
                 ->where(" ".$this->DB_user.".isdeleted","0")
                 ->where(" ".$this->DB_res.".email",$email)
                 ->where(" ".$this->DB_res.".isdeleted","0");
            $query = $this->db->get()->row();
            return $query;
        }
        public function _update_force_pwd($data,$by_id) 
        {
            $this->db->where('id', $by_id );
            $status = $this->db->update($this->DB_user, $data);
            return $status;
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
        //print("<pre>".print_r($query,true)."</pre>");//die;
        
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
           $query = $this->db->get();
           return $query->result();
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
           $query = $this->db->get();
           return $query->result();
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
    
    
    
    public function get_cuisaine_cate_byid() 
    {
        
        $this->db->select(" 
                            ".$this->DB_res_cat_assign.".id as assigncat_id,
                            ".$this->DB_cusine_cat.".id,
                            ".$this->DB_cusine_cat.".categoryname
                        ")
             ->from($this->DB_cusine_cat)
             ->join( $this->DB_res_cat_assign, " ".$this->DB_res_cat_assign.".cat_cusid = ".$this->DB_cusine_cat.".id ", "LEFT JOIN")
             ->where("".$this->DB_cusine_cat.".status", 1)
             ->where("".$this->DB_cusine_cat.".isdeleted", 0)
             ->where("".$this->DB_res_cat_assign.".isdeleted", 0)
             ->where("".$this->DB_res_cat_assign.".restaurantid ",$_SESSION['rest_id'])
             ->order_by("".$this->DB_cusine_cat.".categoryname", 'ASC');
            // ->group_by(" ".$this->DB_cusine_cat.".id ");

        $query = $this->db->get();
        return $query->result();
        //print("<pre>".print_r($query->result(),true)."</pre>");die;
    }
    public function _delete_cuisaine_cate_byid($id) 
    {
        $this->db->delete($this->DB_res_cat_assign, array('id' => $id));
        return true;
    }
        
    public function get_cuisaine_cate_option() 
    {   
        $this->db->select('cat_cusid,restaurantid')
             ->from($this->DB_res_cat_assign)
             ->where('restaurantid',$_SESSION['rest_id'] )
             ->where('isdeleted',0);
             //->order_by("categoryname", 'ASC');

        $cuis = $this->db->get();
        
        $this->db->select('id,categoryname')
             ->from($this->DB_cusine_cat)
             ->where('isdeleted',0);
             //->order_by("categoryname", 'ASC');

        $query = $this->db->get();
        
        $list	= array();

            if($query->num_rows() > 0)
            {
                    foreach($query->result() as $row)
                    {
                        foreach($cuis->result() as $cuisrow)
                        {
                            
                            $list[$row->id]['id']			= $row->id;
                            $list[$cuisrow->cat_cusid]['cat_cusid']     = $cuisrow->cat_cusid;
                            $list[$row->id]['categoryname']             = $row->categoryname;
                            
                        }
                    }	
            }
            //print("<pre>".print_r($list,true)."</pre>");die;
            return $list;

    }
    public function get_allcuisaine_cate() 
    {
        $this->db->select('*')
             ->from($this->DB_cusine_cat)
             ->where('status',1)
             ->where('isdeleted',0)
             ->order_by("categoryname", 'ASC');

        $query = $this->db->get();
        return $query->result();
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
    public function get_allcity_where($by_id) 
    {

        $this->db->select('*')
             ->from($this->DB_city)
             ->where('stateid',(int)$by_id)
             ->where('status',1)
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
        //print("<pre>".print_r($query->result_array(),true)."</pre>");die;

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
                 * var_dump($get_rest);
                 * print("<pre>".print_r($get_rest,true)."</pre>");
                 * die;
                 */
        }
        
    public function get_restaurant_info_byid() 
    {
        
        $this->db->select(" ".$this->DB_res." .*")
                 ->from($this->DB_res)
                 ->where(" ".$this->DB_res.".id",(int)$_SESSION['rest_id']);
        $query = $this->db->get()->row();
        return $query;
        
        //print("<pre>".print_r($query,true)."</pre>");
        //die;
        
    }
     
    public function get_restaurant_info() 
    {
        
        $this->db->select(" ".$this->DB_res.".*  , ".$this->DB_city.".cityname , ".$this->DB_state.".statename")
                 ->from($this->DB_res)
                 ->where(array(" ".$this->DB_res.".id" => (int)$_SESSION['rest_id'] ," ".$this->DB_res.".isdeleted" =>"0"))
                 ->join( $this->DB_city, " ".$this->DB_city.".id = ".$this->DB_res.".cityid " ,"LEFT ")
                 ->join( $this->DB_state, " ".$this->DB_state.".id = ".$this->DB_res.".stateid ","LEFT ");
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
      
    public function _update_restaurant_data($data) 
    {
        $this->db->where('id', $_SESSION['rest_id'] );
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
    
    public function _update_rest_categories($data)
    {
        $post=$this->db->insert($this->DB_res_cat_assign,$data); // insert query here
        if($post)
        {return true;}
        else { return FALSE;}
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
    
    
    public function _unseen_table() {
        
        $by_id = $_SESSION['rest_id'];
        
        if($_POST["view"] != '')
        {
            $this->db->set('read_status', 1); 
            $this->db->where('restaurantid', $by_id); //which row want to upgrade  
            $this->db->update($this->DB_tablereserv); 
            
        
        }
        else 
            {
             $this->db->where("read_status ", 0)
                      ->where("isdeleted ", 0)
                      ->where("restaurantid ", $by_id);
             $query= $this->db->count_all_results($this->DB_tablereserv);
             return $query;
             
            }
        //print("<pre>".print_r($query,true)."</pre>");
        //die;
        
    }
    
    public function _update_table_flow($status, $id)
    {
        $by_id = $_SESSION['rest_id'];
        $this->db->set('requeststatus', $status);
        
        if($status == '4')
            {
                $this->db->set('status', 1);
                $this->db->set('tablecode', 'TBR-'.strtoupper(substr(uniqid(sha1(time())),0,12)) );
            }
            
        $this->db->where('id', $id); //which row want to upgrade 
        $this->db->where('restaurantid', $by_id); //which row want to upgrade  
        $this->db->update($this->DB_tablereserv); 
        return true;
    }
    
    // THIS FEILD GET ALL Table Reservation
        
        var $list_table_set = array(
                                
                                " createdat",
                                " tablecode",
                                " contactname",
                                " checkindate",
                                " contactphone",
                                " contactemail",
                                NULL,
                                " numguest",
                                NULL,
                            ); //set column field database for datatable orderable
    
    
    
    public function _make_table_reservation() {
        
        $by_id = $_SESSION['rest_id'];
        
        $table_search = array(
                                
                                " ".$this->DB_tablereserv.".createdat",
                                " ".$this->DB_tablereserv.".tablecode",
                                " ".$this->DB_tablereserv.".contactname",
                                " ".$this->DB_tablereserv.".checkindate",
                                " ".$this->DB_tablereserv.".contactphone",
                                " ".$this->DB_tablereserv.".contactemail",
                                " ".$this->DB_tablereserv.".numguest"
                            );
        
        
        
        $this->db->select(" * ")
                ->from($this->DB_tablereserv)
                ->where("isdeleted ", 0)
                ->where(" restaurantid ", $by_id);
       

        $i=0;
        foreach ($table_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_tablereserv.".isdeleted ", 0)
                            ->where(" ".$this->DB_tablereserv.".restaurantid ", $by_id);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_tablereserv.".isdeleted ", 0)
                            ->where(" ".$this->DB_tablereserv.".restaurantid ", $by_id);
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
        $by_id = $_SESSION['rest_id']; 
        $this->db->select(" * ")
                ->from($this->DB_tablereserv)
                ->where("isdeleted ", 0)
                ->where(" restaurantid ", $by_id);

        return $this->db->count_all_results();  
    }
    
    public function _count_all_slider($banntype,$promo_or_free,$status)  
    {  
        $rest_id = $_SESSION['rest_id']; 
        
        $this->db->select("".$this->DB_img_ads.".*")
                ->from($this->DB_img_ads)
                ->join( $this->DB_bannertype, " ".$this->DB_bannertype.".id = ".$this->DB_img_ads.".bannertypeid " )
                ->where(" ".$this->DB_bannertype.".bannertype ", "restaurant")
                ->where(" ".$this->DB_bannertype.".status ", 1)
                ->where(" ".$this->DB_img_ads.".usertype ", "restaurant")
                ->where(" ".$this->DB_img_ads.".userid ", (int)$rest_id)
                ->where(" ".$this->DB_img_ads.".bannertypeid ",(int) $banntype)
                ->where(" ".$this->DB_img_ads.".isdeleted ", 0);
                
                if( isset($promo_or_free) && !empty($promo_or_free) )
                    {
                        $this->db->where(" ".$this->DB_img_ads.".Payment",$promo_or_free);
                    }
                else{
                        $this->db->where(" ".$this->DB_img_ads.".Payment !=","free");
                    }
                if( isset($status) && !empty($status) && $status <= 1)
                    {
                        $this->db->where(" ".$this->DB_img_ads.".status",(int)$status);
                    }
                    
        return $this->db->count_all_results();  
        //$query = $this->db->get()->result();
        //return $query;
       
    }
    
    // THIS FEILD GET ALL Promo banner
        
        var $promobanner_set = array(
            
                                null,
                                "img_ads.createdat",
                                "img_ads.arrangeimage",
                                null,
                                "bannertype.bannertypename",
                                null,
                                "img_ads.status",
                                null
                            ); //set column field database for datatable orderable
    
    public function _make_promobanner($banntype,$promo_or_free,$status) {
        
        $rest_id = $_SESSION['rest_id']; 
        
        $promobanner_search = array(
                                
                                " ".$this->DB_img_ads.".createdat",
                                " ".$this->DB_bannertype.".bannertypename"
                            );
        
        
        
        $this->db->select(" 
                            ".$this->DB_img_ads.".*,
                            ".$this->DB_bannertype.".bannertypename
                        ")
                ->from($this->DB_img_ads)
                ->join( $this->DB_bannertype, " ".$this->DB_bannertype.".id = ".$this->DB_img_ads.".bannertypeid " )
                ->where(" ".$this->DB_bannertype.".bannertype ", "restaurant")
                ->where(" ".$this->DB_bannertype.".status ", 1)
                ->where(" ".$this->DB_img_ads.".usertype ", "restaurant")
                ->where(" ".$this->DB_img_ads.".userid ", (int)$rest_id)
                ->where_in(" ".$this->DB_img_ads.".bannertypeid ", $banntype)
                ->where(" ".$this->DB_img_ads.".isdeleted ", 0);
        
                
        if( isset($promo_or_free) && !empty($promo_or_free) )
            {
                $this->db->where(" ".$this->DB_img_ads.".Payment",$promo_or_free);
            }
        else{
                $this->db->where(" ".$this->DB_img_ads.".Payment !=","free");
            }
        if(isset($status) && !empty($status) && $status <= 1)
            {
                $this->db->where(" ".$this->DB_img_ads.".status ",(int) $status);
            }
       

        $i=0;
        foreach ($promobanner_search as $item) // loop column 
        {   
            
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_bannertype.".bannertype ", "restaurant")
                            ->where(" ".$this->DB_bannertype.".status ", 1)
                            ->where(" ".$this->DB_img_ads.".usertype ", "restaurant")
                            ->where(" ".$this->DB_img_ads.".userid ", (int)$rest_id)
                            ->where_in(" ".$this->DB_img_ads.".bannertypeid ", $banntype)
                            ->where(" ".$this->DB_img_ads.".isdeleted ", 0);
        
                    
                    if( isset($promo_or_free) && !empty($promo_or_free) )
                        {
                            $this->db->where(" ".$this->DB_img_ads.".Payment",$promo_or_free);
                        }
                    else{
                            $this->db->where(" ".$this->DB_img_ads.".Payment !=","free");
                        }
                    if(isset($status) && !empty($status) && $status <= 1)
                        {
                            $this->db->where(" ".$this->DB_img_ads.".status ",(int) $status);
                        }
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value'])
                            ->where(" ".$this->DB_bannertype.".bannertype ", "restaurant")
                            ->where(" ".$this->DB_bannertype.".status ", 1)
                            ->where(" ".$this->DB_img_ads.".usertype ", "restaurant")
                            ->where(" ".$this->DB_img_ads.".userid ", (int)$rest_id)
                            ->where_in(" ".$this->DB_img_ads.".bannertypeid ",$banntype)
                            ->where(" ".$this->DB_img_ads.".isdeleted ", 0);
        
                    
                    if( isset($promo_or_free) && !empty($promo_or_free) )
                        {
                            $this->db->where(" ".$this->DB_img_ads.".Payment",$promo_or_free);
                        }
                    else{
                            $this->db->where(" ".$this->DB_img_ads.".Payment !=","free");
                        }
                    if( isset($status) && !empty($status) && $status <= 1)
                        {
                            $this->db->where(" ".$this->DB_img_ads.".status ",(int) $status);
                        }
                }
                if(count($promobanner_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->promobanner_set[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by(" ".$this->DB_img_ads.".bannertypeid", 'ASC');
            $this->db->order_by(" ".$this->DB_img_ads.".arrangeimage", 'ASC');
            $this->db->order_by(" ".$this->DB_img_ads.".createdat", 'DESC');
        }
    }
    
    public function _get_promobanner($banntype,$promo_or_free,$status) 
    {
        //print_r();
        $this->_make_promobanner($banntype,$promo_or_free,$status);
           
           if($_POST["length"] != -1)  
           {  
               // $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function _get_filtered_data_promobanner($banntype,$promo_or_free,$status)
    {  
           $this->_make_promobanner($banntype,$promo_or_free,$status);  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
    
    public function _get_all_promobanner($banntype,$promo_or_free,$status)  
    {  
        $rest_id = $_SESSION['rest_id'];
         $this->db->select(" 
                            ".$this->DB_img_ads.".*,
                            ".$this->DB_bannertype.".bannertypename
                        ")
                ->from($this->DB_img_ads)
                ->join( $this->DB_bannertype, " ".$this->DB_bannertype.".id = ".$this->DB_img_ads.".bannertypeid " )
                ->where(" ".$this->DB_bannertype.".bannertype ", "restaurant")
                ->where(" ".$this->DB_bannertype.".status ", 1)
                ->where(" ".$this->DB_img_ads.".usertype ", "restaurant")
                ->where(" ".$this->DB_img_ads.".userid ", (int)$rest_id)
                ->where_in(" ".$this->DB_img_ads.".bannertypeid ", $banntype)
                ->where(" ".$this->DB_img_ads.".isdeleted ", 0);
        
                
        if( isset($promo_or_free) && !empty($promo_or_free) )
            {
                $this->db->where(" ".$this->DB_img_ads.".Payment",$promo_or_free);
            }
        else{
                $this->db->where(" ".$this->DB_img_ads.".Payment !=","free");
            }
        if(isset($status) && !empty($status) && $status <= 1)
            {
                $this->db->where(" ".$this->DB_img_ads.".status ",(int) $status);
            }

        return $this->db->count_all_results();  
    }
    
    public function _update_promobanner_status($status, $id)
    {
        $this->db->set('status', $status); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_img_ads); 
        return true;
    }
    public function _update_promobanner_cate($order, $id)
    {
        $this->db->set('arrangeimage', $order); 
        $this->db->where('id', $id); //which row want to upgrade  
        $this->db->update($this->DB_img_ads); 
        return true;
    }
    
    public function _merchant_slider_option($by_id)
    {
        $this->db->select('*');
        $this->db->from($this->DB_bannertype)
                ->where("bannertype ", "restaurant")
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
    
    public function _delete_user($by_id)
    {
        $this->db->set('isdeleted', 1); 
        $this->db->where('id', $by_id); //which row want to upgrade  
        $this->db->update($this->DB_user); 
        return true;
    }
    
    public function _update_user_status($status, $id)
    {
        $this->db->set('status', $status); 
        $this->db->where('id', $id); //which row want to upgrade  
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
}





































/*
 * 
 * var $order_set = array(
                                "products.createdat " ,
                                NULL,
                                "products.productname",
                                NULL,
                                " categories.categoryname",
                                "products.productprice",
                                NULL,
                                NULL,
                            ); //set column field database for datatable orderable
    
    
    
    public function _get_datatables_query() {
        
        $by_id = 3;
        
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
                else {
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
            $this->db->order_by(" ".$this->DB_product.".createdat", 'DESC');
        }
    }
    
        
    function get_datatables() {
        $this->_get_datatables_query();
        if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
        $query = $this->db->get();  
        return $query->result(); 
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query=$this->db->get();
        return $query->num_rows();
    }
    
    public function count_all() {
        $this->db->from($this->DB_product);
        return $this->db->count_all_results();
    } 
 */