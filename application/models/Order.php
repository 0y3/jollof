<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class Order extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function queryParameters($params=array())
    {
        if(isset($params['accountid'])){
            $this->db->where(array('orders.accountid'=>$params['accountid']));
        }
        
        // filter by order status
        if(isset($params['status'])){
            $this->db->where(array('orders.status'=>$params['status']));
        }
        
        // filter by order product status
        if(isset($params['orderstatus'])){
            $this->db->where(array('orderlistdetails.status'=>$params['orderstatus']));
        }

        // filter by giftportal order product status
        if(isset($params['giftportalorderstatus'])){
            $this->db->where(array('ordergiftportal.status'=>$params['giftportalorderstatus']));
        }
        
        // filter by merchant
        if(isset($params['reference'])){
            $this->db->where(array('orders.reference'=>$params['reference']));
        }
        
        // filter by company name; this would perform a general search like filter
        if(isset($params['companyname'])){
            $this->db->where("(restaurants.companyname LIKE'%$params[companyname]%' OR restaurants.phone LIKE'%$params[companyname]%' OR restaurants.email LIKE'%$params[companyname]%')");
        }
        
        // filter by productname name; this would perform a general search like filter
        if(isset($params['productname'])){
            $this->db->where(array('orderlistdetails.productname'=>$params['productname']));
        }
        
        // filter by account user's address
        if(isset($params['accountaddressid'])){
            $this->db->where(array('orders.accountaddressid'=>$params['accountaddressid']));
        }
        
        // filter by delivery type
        if(isset($params['deliverytype'])){
            $this->db->where(array('orders.deliverytype'=>$params['deliverytype']));
        }
        
        // filter by merchant creation date
        if(isset($params['createdat']))
        {
            /*
            $t_date = explode("-", $params['createdat']);
            $startdate = date("Y-m-d", strtotime($t_date[0]));
            $enddate = date("Y-m-d", strtotime($t_date[1]));
            $this->db->where(array('restaurants.createdat >='=>$startdate, 'restaurants.createdat <='=>$enddate.' 23:59:59' ));
            */
            $this->db->like('restaurants.createdat ',$params['createdat']);
        }
        
        
    }
    
    function getAll($param=array(), $limit_start)
    {
        $this->db->select('orders.*, accounts.firstname as account_firstname, accounts.lastname as accont_lastname, accountaddresses.lastname as address_lastname,
            accountaddresses.firstname as address_firstname, accountaddresses.address, accountaddresses.phone');
        $this->db->from('orders');
        $this->db->join('accounts', 'orders.accountid = accounts.id', "left");
        $this->db->join('accountaddresses', 'accountaddresses.accountid = accounts.id', "left");
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with isdeleted field set to zero
        $this->db->where(array('orders.isdeleted'=>0));
        
        $this->db->limit(25, $limit_start);
        $this->db->order_by("orders.createdat", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
    }
    
    // Get count of all restaurants
    function getAllCount($param=array())
    {
        $this->db->from('orders');
        $this->db->join('orderlistdetails', 'orderlistdetails.orderid = orders.id');
        $this->db->join('accounts', 'orders.accountid = accounts.id', "left");
        $this->db->join('accountaddresses', 'accountaddresses.accountid = accounts.id', "left");
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with deletedat field set to null
        $this->db->where(array('orders.isdeleted'=>0,'orderlistdetails.restaurantid'=>$_SESSION['merchant_id']));
        
        $total = $this->db->count_all_results();
        return $total;
    }

    // Get count of all fashion cuisine orders
    function getAllFashionCuisineCount($param=array())
    {
        $this->db->from('orders');
        $this->db->join('orderlistdetails', 'orderlistdetails.orderid = orders.id');
        $this->db->join('accounts', 'orders.accountid = accounts.id', "left");
        $this->db->join('accountaddresses', 'accountaddresses.accountid = accounts.id', "left");
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with deletedat field set to null
        $this->db->where(array('orders.isdeleted'=>0));
        
        $total = $this->db->count_all_results();
        return $total;
    }

    // Get count of all restaurants
    function getGiftportalOrdersCount($param=array())
    {
        $this->db->from('ordergiftportal');
        $this->db->join('accounts', 'ordergiftportal.accountid = accounts.id', "left");
        $this->db->join('accountaddresses', 'accountaddresses.id = ordergiftportal.accountaddressid', "left");
        $this->db->join('orderstatus', 'ordergiftportal.status = orderstatus.id', "left");
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with deletedat field set to null
        $this->db->where(array('ordergiftportal.isdeleted'=>0));
        
        $total = $this->db->count_all_results();
        return $total;
    }
    
}
?>