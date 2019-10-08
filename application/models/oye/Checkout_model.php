<?php

if(!defined('BASEPATH'))exit('No direct script access allowed');

class Checkout_model extends CI_Model
{
    private $DB_account_r = "accounts";
    private $DB_state = "states";
    private $DB_city = "state_cities";
    private $DB_address = "accountaddresses";
    private $DB_order = "orders";
    private $DB_orderproduct = "orderlistdetails";
    private $DB_card= "returncustomers";
    private $DB_deliviering_charges = "delivieringcharges_admin";
    private $DB_deliviering_charges_mer = "delivieringcharges_merchant";
    private $DB_res = "restaurants";
    private $DB_prd_qty_c_s= "product_qty_color_size";
            
    function __construct()
        {
	
            parent::__construct();
            $this->load->model('oye/Session_model'); // call in the session model class
            $this->load->model('oye/Email_model'); // call in the emai;l model class
            $this->load->model('Generic');
		
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
            return true;
        }
    }
    public function saveorder($data) 
    { 
       $this->db->insert($this->DB_order, $data);
       $insertId = $this->db->insert_id();
    
        if ( $this->db->affected_rows() > 0 )
        {
            return $insertId;
        }
        
    }
    
    
    function update_orders($data){
        
        $set=$this->db->set('status', 1)
                 ->where('reference', $data)
                 ->update($this->DB_order);
        if ($set){
            //$this->db->where('reference',$data);
            //$q = $this->db->get('my_users_table')->row();

            return $this->db->get_where($this->DB_order , array('reference'=>$data))->row()->id; // get the id of updated 
        }   
            
    }
    public function saveorderproduct($id_order) 
    {
        $content = htmlspecialchars($this->input->post('addedmenu'));
        
        $data_order = array();
        foreach ($this->cart->contents() as $items)
        {
            $order_code='ORD-'.strtoupper($this->generate_random_string(12));
            
            $data_order[] = array(
                //'ordercode'    => 'ORD-'.strtoupper(substr(uniqid(sha1(time())),0,12)),
                'ordercode'    => $order_code,
                'restaurantid'=> $items["rest"],
                'productid'   => $items["cuisine_productid"],
                'product_fashionid'   => $items["fashion_productid"],
                'orderid'     => $id_order,
                'productname' => $items["name"],
                'addedmenu'   => $this->input->post('addedmenu'),
                'quantity'    => $items["qty"],
                'price'       => $items["price"],
                'note'        => $items["description"],
                'color'       => $items["product_colorname"],
                'size'        => $items["product_size"],
            );

            // update fashion inventory
            /*
            if($items["fashion_productid"])
            {
                $prdinfo=$this->Generic->getByFieldSingle('id', $items["fashion_productid"], $tablename='product_qty_color_size');

                $productinstock = $prdinfo['productinstock'];
                $productsold = $prdinfo['productsold'];


                $new_productinstock = (int)$productinstock - (int)$items["qty"];
                $new_productsold    = (int)$productsold + (int)$items["qty"];

                $data_New = array(  
                        'productinstock'    => $new_productinstock,
                        'productsold'     => $new_productsold
                     );
                
                // insert to db
                $insert_data = $this->Generic->edi($data_New, $items["fashion_productid"] , $tablename="product_qty_color_size"); 
            }
            */
            
        }
        /* 
        $deliv_fee = $_POST['deliv_store_fee'];
        $store_name = $_POST['store_name'];
        $store_logistic = $_POST['store_logistic'];

       */

       
        //deliver calc for multiple restaurant
        /*
        foreach( $store_name as $key => $storeid ) {
            
            $storeid;
            $store_logistic[$key];
            $deliv_fee[$key];
            $deliv_code = 'DL-'.strtoupper($this->generate_random_string(12));

            $data_order_logistic[] = array(
                        'orderid'           => $id_order,
                        'delivercode'       => $deliv_code,
                        'delivery_fee'      => $deliv_fee[$key],
                        'store_logistic'    => $store_logistic[$key],
                    );

            /*foreach ($data_order as $order)
            {
                if($order['restaurantid']==$storeid)
                {
                    $data_order_logistic[] = array(
                        'store_id'          => $order['restaurantid'],
                        'orderid'           => $order['orderid'],
                        'delivercode'       => $deliv_code,
                        'ordercode'         => $order['ordercode'],
                        'delivery_fee'      => $deliv_fee[$key],
                        'store_logistic'    => $store_logistic[$key],
                    );
                }
                else
                {
                    $data_order_logistic[] = array(
                        'store_id'          => $order['restaurantid'],
                        'orderid'           => $order['orderid'],
                        'delivercode'       => $deliv_code,
                        'ordercode'         => $order['ordercode'],
                        'delivery_fee'      => $deliv_fee[$key],
                        'store_logistic'    => $store_logistic[$key],
                    );
                }
                
            }*/
          //print "<pre>The store id is ".$name.", store_logistic is ".$store_logistic[$key].
          //      ", and deliv fee is ".$deliv_fee[$key].". Thank you\n</pre>";
        //}
        
       
        //print("<pre>".print_r($data_order_logistic,true)."</pre>");die;
        $this->db->insert_batch($this->DB_orderproduct, $data_order);
        if ( $this->db->affected_rows() > 0 )
        {
            foreach ($data_order as $items)
            {
                
                $site_email ='segun@stakle.com';
                $rest_info=$this->get_rest_info($items['restaurantid']);
                $order_info=$this->get_order_info($items['orderid']);
                $account_info=$this->get_account_info($order_info->accountid);
                
                
                if($items["product_fashionid"])
                { 
                    $qty=(int)$items["quantity"];

                    $fahion_product=$this->get_fashion_info($items['product_fashionid']);
                    
                    $new_qty=(int)$fahion_product->productinstock-$qty;
                    $new_sold=(int)$fahion_product->productsold+$qty;
                    
                    $this->db->where('id', $items["product_fashionid"] );//which row want to upgrade  
                    $this->db->update($this->DB_prd_qty_c_s, array('productinstock' => $new_qty, 'productsold' => $new_sold )); 
                    
                } // update fashion Product Stock
            
                
                
                
                //print("<pre>".print_r($items,true)."</pre>");
                $this->Email_model->send_OrderConfirmation_email($items['ordercode'],$account_info->firstname, $account_info->lastname, $account_info->email, $site_email ); // send the customer an email
                $this->Email_model->send_Order_merchant_email($items['ordercode'],$rest_info->companyname, $rest_info->email, $site_email ); // send the Merchant an email
            
            }
            
            return true;
        }
    }
    public function savelogisticorderproduct($id_order)
    {
        
    }
    public function get_rest_info ($by_id)
    {
        $query = $this->db->get_where($this->DB_res, array(
                                                        'id' => $by_id,
                                                        'isdeleted' =>'0'
                                                            )
                                                        );
        return $query->row();
    } 
    public function get_account_info ($by_id)
    {
        $query = $this->db->get_where($this->DB_account_r, array(
                                                        'id' => $by_id,
                                                        'isdeleted' =>'0'
                                                            )
                                                        );
        return $query->row();
    }
    
    public function get_order_info ($by_id)
    {
        $query = $this->db->get_where($this->DB_order, array(
                                                        'id' => $by_id,
                                                        'isdeleted' =>'0'
                                                            )
                                                        );
        return $query->row();
    }
    public function get_fashion_info ($by_id)
    {
        $query = $this->db->get_where($this->DB_prd_qty_c_s, array(
                                                        'id' => $by_id,
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
    
    public function savecard($data) 
    {  
        
       $this->db->insert($this->DB_card, $data);
            
        if ( $this->db->affected_rows() > 0 )
        {
            return true;
        }
        
    }
    
    public function get_card_id($by_id)
    {
        if(isset($by_id) || !empty($by_id))
        {
        $this->db->select('last4,authorizationcode')
                 ->from($this->DB_card)
                 ->where('accountid',$by_id);
            
            $query = $this->db->get();
            return $query->result();
        }
        else{
            return false;
        }
    }
    
    public function check_card($param)
    {
        $this->db->select('id')
                 ->from($this->DB_card)
                 ->where('authorizationcode',$param);
            
            $query = $this->db->get();
            return $query->result();
    }
    
    public function get_deliveryfee_where($by_restid,$by_cityid)
    {
        $this->db->select(" 
                            ".$this->DB_state.".id as stateid,
                            ".$this->DB_state.".statename,
                            ".$this->DB_city.".id as cityid,
                            ".$this->DB_city.".cityname,
                            ".$this->DB_deliviering_charges_mer.".id as delivieringchargesidMerch,
                            ".$this->DB_deliviering_charges_mer.".delivieringcharges as delivieringchargesMerch,
                            ".$this->DB_deliviering_charges_mer.".freedelivieringstatus as freedelivieringstatusMerch
                        ")
                ->from($this->DB_state)
                ->join( $this->DB_city, " ".$this->DB_city.".stateid = ".$this->DB_state.".id " )
                //->join( $this->DB_deliviering_charges, " ".$this->DB_deliviering_charges.".cityid = ".$this->DB_city.".id " ,'left')
                ->join( $this->DB_deliviering_charges_mer, " ".$this->DB_deliviering_charges_mer.".cityid = ".$this->DB_city.".id " ,'left')
                ->where(" ".$this->DB_deliviering_charges_mer.".restaurantid ", $by_restid)
                ->where(" ".$this->DB_city.".id ", $by_cityid)
                ->where(" ".$this->DB_city.".isdeleted ", 0)
                ->where(" ".$this->DB_state.".isdeleted ", 0);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return false;
            
        }
    }
    
    public function get_deliveryfeeadmin_where($by_cityid)
    {
        $this->db->select(" 
                            ".$this->DB_state.".id as stateid,
                            ".$this->DB_state.".statename,
                            ".$this->DB_city.".id as cityid,
                            ".$this->DB_city.".cityname,
                            ".$this->DB_deliviering_charges.".id as delivieringchargesidAdmin,
                            ".$this->DB_deliviering_charges.".delivieringcharges as delivieringchargesAdmin,
                            ".$this->DB_deliviering_charges.".freedelivieringstatus as freedelivieringstatusAdmin 
                        ")
                ->from($this->DB_state)
                ->join( $this->DB_city, " ".$this->DB_city.".stateid = ".$this->DB_state.".id " )
                ->join( $this->DB_deliviering_charges, " ".$this->DB_deliviering_charges.".cityid = ".$this->DB_city.".id " ,'left')
                ->where(" ".$this->DB_city.".id ", $by_cityid)
                ->where(" ".$this->DB_city.".isdeleted ", 0)
                ->where(" ".$this->DB_state.".isdeleted ", 0);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return false;
            
        }
    }
    

}
