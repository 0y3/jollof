<?php

if(!defined('BASEPATH'))exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    private $DB_account_r = "accounts";
    private $DB_state = "states";
    private $DB_city = "state_cities";
    private $DB_address = "accountaddresses";
    private $DB_order = "orders";
    private $DB_orderproduct = "orderlistdetails";
    private $DB_ord_status = "orderstatus";
    private $DB_card= "returncustomers";
    private $DB_res = "restaurants";
    private $DB_tablereserv = "tablereservations";
            
    function __construct()
        {
	
            parent::__construct();
            $this->load->model('oye/Session_model'); // call in the session model class
		
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
    public function _address() 
    { 
       $this->db->insert($this->DB_address, $data);
            
        if ( $this->db->affected_rows() > 0 )
        {
            $_id = $this->db->get_where($this->DB_address , $data)->row()->id; // get the id of save db
            return $_id;
        }
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
    
    public function profile($usrid){
		
        $query = $this->db->get_where($this->DB_account_r, array('id' => (int)$usrid ,'isdeleted' =>'0'));
        //var_dump($query->result());
        return $query->result();

    }
    public function _Update_Profile($usrid) 
    {
        $User_details = $this->db->get_where($this->DB_account_r, array('id' => $usrid,'isdeleted' =>'0'));
        $ro = $User_details->row();
        $User_img = $ro->image; // get the login user profile pics name
        
        
        
            if (!empty($_FILES['User_pic']['name']) )
                {
                    $file_name = "User_pic";  // name of image input from the view
                    $newname = $_SESSION['User_id'].'_'.time();	 // Random Encryp new name save to app

                    $config['upload_path'] = './assets/img/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = '1000';	
                    $config['remove_spaces']  = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = $newname;
                    $config['raw_name'] = $file_name ;

                    $this->load->library('upload', $config);
                    
                    $exploded       = explode('.',$_FILES['User_pic']['name']);
                    $file_extn      = strtolower(end($exploded));
                    $userPic_File   = $newname.'.'.$file_extn;
                    
                    if(!$this->upload->do_upload($file_name))
                        {
                            $mssg = $this->upload->display_errors().' {Profile Picture}';
                            $this->session->set_flashdata('msg_r', $mssg);
                            redirect(base_url().'profile', 'refresh');
                            
                        }
                }
            else {
                    $userPic_File = $User_img;
                 }
            // update the user registration table //
            $data_New = array(
                            'firstname'     =>  $_POST["Firstname"],
                            'lastname'      =>  $_POST["Lastname"],
                            'phone'         =>  $_POST["cell_1"],
                            'phone2'        =>  $_POST["cell_2"],
                            'image'         =>  $userPic_File,
                            'updatedat'     =>  time()
                         );
            
            $this->db->where('id', $usrid);
            $this->db->update($this->DB_account_r , $data_New);
            //var_dump( $data_user);
            return true;
    }
    
    public function _ApiUpdate_Profile($usrid) 
    {
        $User_details = $this->db->get_where($this->DB_account_r, array('id' => $usrid,'isdeleted' =>'0'));
        $ro = $User_details->row();
        $User_img = $ro->image; // get the login user profile pics name
        
        
        
            if (!empty($_FILES['User_pic']['name']) )
                {
                    $file_name = "User_pic";  // name of image input from the view
                    $newname = $_SESSION['User_id'].'_'.time();	 // Random Encryp new name save to app

                    $config['upload_path'] = './assets/img/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = '1000';	
                    $config['remove_spaces']  = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = $newname;
                    $config['raw_name'] = $file_name ;

                    $this->load->library('upload', $config);
                    
                    $exploded       = explode('.',$_FILES['User_pic']['name']);
                    $file_extn      = strtolower(end($exploded));
                    $userPic_File   = $newname.'.'.$file_extn;
                    
                    if(!$this->upload->do_upload($file_name))
                        {
                            $mssg = $this->upload->display_errors().' {Profile Picture}';
                            $this->session->set_flashdata('msg_r', $mssg);
                            redirect(base_url().'profile', 'refresh');
                            
                        }
                }
            else {
                    $userPic_File = $User_img;
                 }
            // update the user registration table //
            $data_New = array(
                            'firstname'     =>  $_GET["Firstname"],
                            'lastname'      =>  $_GET["Lastname"],
                            'phone'         =>  $_GET["cell_1"],
                            'phone2'        =>  $_GET["cell_2"],
                            'image'         =>  $userPic_File,
                            'updatedat'     =>  time()
                         );
            
            $this->db->where('id', $usrid);
            $this->db->update($this->DB_account_r , $data_New);
            //var_dump( $data_user);
            return true;
    }
    
    public function Update_pwd($pwd) 
    {
        $this->db->where('id', (int)$_SESSION['User_id'] );
        $query = $this->db->update($this->DB_account_r, array('password' => $pwd ));
        if($query)
        {
                return TRUE;
        }else{
                return FALSE;
        }
    }
    
    public function check_User_pwd($pwd) 
    {
        $query = $this->db->get_where($this->DB_account_r, array(
                                                        'id' => (int)$_SESSION['User_id'] ,
                                                        'password' => $pwd,
                                                        'isdeleted' =>'0'
                                                            )
                                                        );
        return $query->result();
    }
    
    // Get all products from the fashion products table
    function getAllLayaway($id=null)
    {
        $this->db->select('orderlayaway.*,'.$this->DB_ord_status.'.orderstatus_desc, restaurants.companyname as storename,restaurants.id as storeid,restaurants.slug as storeslug');
        $this->db->from('orderlayaway');
        $this->db->join('restaurants', 'orderlayaway.restaurantid = restaurants.id', "left");
        $this->db->join('accountaddresses', 'orderlayaway.accountaddressid = accountaddresses.id', "left");
        $this->db->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = orderlayaway.status","left" );
        
        $this->db->where(
                    array(
                        "orderlayaway.accountid"     => $id,
                        "orderlayaway.isdeleted"     =>0,
                        "orderlayaway.status"        => 1
                        )
                    );
        
        //$this->db->limit(25, $limit_start);
        
        $query = $this->db->get();
        
        $get_prod = null;
        if($query->num_rows() > 0)
        {
            $rows = $query->result_array();
            foreach($rows as $row)
            {
                $row['layaway_payment']=   $this->getAllLayawayPayment($row['id']);
                $get_prod[] = $row;
            }
            
            return $get_prod;
        }
        else
        {
            return null;
        }
        /*
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
         * 
         */
    }
    public function getAllLayawayPayment($by_id)
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where(" orders.layawayorderid ", $by_id);
        $this->db->where(" orders.layawayorder ", 1);
        $this->db->where(" orders.status ", 1);
        $this->db->where(" orders.isdeleted ", 0);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
        
    }

    public function order_hst() 
    {
        $this->db->select("*")
                 ->from($this->DB_order)
                 ->where("accountid ", (int)$_SESSION['User_id'])
                 ->where("layawayorder ", '0')
                 ->where("status ", '1')
                 ->order_by("createdat" , "DESC");
            
            $query = $this->db->get();
                
		$get_order_prd = array();

		if($query->num_rows() > 0)
                    {
			foreach ($query->result() as $row)
			   {
                            $_id                                    =   $row->id;   
                            $get_order_prd[$_id]['id']              =   $row->id;
                            $get_order_prd[$_id]['vat']             =   $row->vat;
                            $get_order_prd[$_id]['addcharge']       =   $row->additionalcharges;
                            $get_order_prd[$_id]['discount']        =   $row->discount;
                            $get_order_prd[$_id]['total']           =   $row->totalordervalue;
                            $get_order_prd[$_id]['deliverytype']    =   $row->deliverytype;
                            
                            $get_order_prd[$_id]['products_order']    =   $this->get_menu_by_cate($_id);// feach data by order from the orderist tb 
                            
			   }
                    }
                else 
                   {

                   }
                return $get_order_prd;
                
                //print("<pre>".print_r($get_order_prd,true)."</pre>");
                //die;
    }
    
    public function table_reservation_hst($by_id) 
    {
        $this->db->select("
                            ".$this->DB_tablereserv.".*,
                            ".$this->DB_ord_status.".orderstatus_desc,
                            ".$this->DB_res.".companyname,
                            ".$this->DB_res.".phone AS rest_phone,
                            ".$this->DB_res.".phone2 AS rest_phone2,
                            ".$this->DB_res.".email AS rest_email,
                            ".$this->DB_res.".address AS rest_address,
                            ".$this->DB_city.".cityname ,
                            ".$this->DB_state.".statename
                         ")
                 ->from($this->DB_tablereserv)
                
                ->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_tablereserv.".restaurantid " )
                ->join( $this->DB_city, " ".$this->DB_city.".id = ".$this->DB_res.".cityid ")
                ->join( $this->DB_state, " ".$this->DB_state.".id = ".$this->DB_res.".stateid ")
                ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_tablereserv.".requeststatus" )
                
                ->where("".$this->DB_tablereserv.".accountid ", (int)$_SESSION['User_id'])
                ->order_by("".$this->DB_tablereserv.".createdat" , "DESC");
        
                if(isset($by_id) && !empty($by_id))
                {
                    $this->db->where(" ".$this->DB_tablereserv.".id",(int)$by_id);
                    $this->db->where(" ".$this->DB_tablereserv.".accountid", $_SESSION['User_id']);
                }
                
            $get_table = $this->db->get()->result_array();
            return $get_table;

            //print("<pre>".print_r($get_table,true)."</pre>");
            //die;
    }
    public function _update_cancel_table( $id)
        {
            
            $this->db->set('requeststatus', '5'); 
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_tablereserv); 
            return true;
        }
        
    
    public function get_menu_by_cate($by_order_id)
        {
            $this->db->select("
                                ".$this->DB_orderproduct.".*,
                                ".$this->DB_res.".companyname,
                                ".$this->DB_ord_status.".orderstatus_desc
                             ");
            $this->db->from($this->DB_orderproduct);
            $this->db->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_orderproduct.".restaurantid " );
            $this->db->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_orderproduct.".status" );
            $this->db->where(" ".$this->DB_orderproduct.".orderid ", $by_order_id);
            
            
            $query = $this->db->get();
            $get_prd	= array();

            if($query->num_rows() > 0)
            {
                foreach($query->result() as $row)
                    {
                        $get_prd[$row->id]['id']            =   $row->id;
                        $get_prd[$row->id]['ordercode']     =   $row->ordercode;
                        $get_prd[$row->id]['date']          =   $row->createdat;
                        $get_prd[$row->id]['restname']      =   $row->companyname;
                        $get_prd[$row->id]['productname']   =   $row->productname;
                        $get_prd[$row->id]['addedmenu']   =   $row->addedmenu;
                        $get_prd[$row->id]['quantity']      =   $row->quantity;
                        $get_prd[$row->id]['price']         =   $row->price;
                        $get_prd[$row->id]['note']          =   $row->note;
                        $get_prd[$row->id]['status_id']     =   $row->status;
                        $get_prd[$row->id]['status_desc']  =   $row->orderstatus_desc;
                    }
            }
            return $get_prd;
        }
            
        
        
        public function order_hst_list($by_id)
        {
            $user_id = $_SESSION['User_id'];
            
            $this->db->select("
                                ".$this->DB_orderproduct.".*,
                                ".$this->DB_orderproduct.".id AS order_id,
                                ".$this->DB_orderproduct.".createdat AS order_date,
                                ".$this->DB_orderproduct.".status AS order_status,
                                ".$this->DB_res.".companyname,
                                ".$this->DB_ord_status.".orderstatus_desc,
                                ".$this->DB_order.".*,
                                ".$this->DB_address.".*,
                                ".$this->DB_city.".cityname ,
                                ".$this->DB_state.".statename
                             ");
            $this->db->from($this->DB_orderproduct);
            $this->db->join( $this->DB_res, " ".$this->DB_res.".id = ".$this->DB_orderproduct.".restaurantid " );
            $this->db->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_orderproduct.".status" );
            
            $this->db->join( $this->DB_order, " ".$this->DB_order.".id = ".$this->DB_orderproduct.".orderid" );
            
            $this->db->join( $this->DB_address, " ".$this->DB_address.".id = ".$this->DB_order.".accountaddressid" );
            $this->db->join( $this->DB_city, " ".$this->DB_city.".id = ".$this->DB_address.".cityid ");
            $this->db->join( $this->DB_state, " ".$this->DB_state.".id = ".$this->DB_address.".stateid ");
            
            $this->db->where(" ".$this->DB_order.".accountid ", $user_id);
            $this->db->where(" ".$this->DB_orderproduct.".id ", $by_id);
            
                    

		$query = $this->db->get()->result_array();
                
		return $query;
                
                /*
                 * var_dump($get_rest);
                 * print("<pre>".print_r($query,true)."</pre>");
                 * die;
                 */
        }
        
        public function _update_confirm_ord( $id)
        {
            
            $this->db->set('status', '4'); 
            $this->db->where('id', $id); //which row want to upgrade  
            $this->db->update($this->DB_orderproduct); 
            return true;
        }
    
        

}
