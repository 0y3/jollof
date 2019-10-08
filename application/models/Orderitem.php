<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class Orderitem extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function queryParameters($params=array())
    {
        // Search account orders
        if(isset($params['accountid'])){
            $this->db->where(array('orders.accountid'=>$params['accountid']));
        }
        
        // Filter orders by merchant option
        if(isset($params['restaurantid'])){
            $this->db->where(array('orderlistdetails.restaurantid'=>$params['restaurantid']));
        }
        
         // filter by order status
        if(isset($params['status'])){
            $this->db->where(array('orders.status'=>$params['status']));
        }
        
        // filter by order product status
        if(isset($params['orderstatus'])){
            $this->db->where(array('orderlistdetails.status'=>$params['orderstatus']));
        }
        
        // filter by merchant
        if(isset($params['reference'])){
            $this->db->where(array('order.reference'=>$params['reference']));
        }
        
        // filter by company name; this would perform a general search like filter
        if(isset($params['companyname'])){
            $this->db->where("(restaurants.companyname LIKE'%$params[companyname]%' OR restaurants.phone LIKE'%$params[companyname]%' OR restaurants.email LIKE'%$params[companyname]%')");
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
            $t_date = explode("-", $params['createdat']);
            $startdate = date("Y-m-d", strtotime($t_date[0]));
            $enddate = date("Y-m-d", strtotime($t_date[1]));
            $this->db->where(array('restaurants.createdat >='=>$startdate, 'restaurants.createdat <='=>$enddate.' 23:59:59' ));

        }
        
        // Search account name
        if(isset($params['accountname'])){
            //$this->db->where(array('accounts.firstname'=>$params['accountname'], 'accounts.lastname'=>$params['accountname'] ));
            $this->db->like('accounts.firstname',$params['accountname']);
            //$this->db->like('accounts.lastname',$params['accountname']);
        }

         // Search account name
        if(isset($params['accounttype'])){
            $this->db->like('accounts.usertype',$params['accounttype']);
        }
        
        // Search product name
        if(isset($params['productname'])){
            $this->db->like(array('orderlistdetails.productname'=>$params['productname'] ));
        }
        
        // Search product Status
        if(isset($params['productstatus'])){
            
            $this->db->where(array('orderstatus.orderstatus_desc'=>$params['productstatus'] ));
        }
        
        // Perform checks to show merchants only orders that belong to their store
        $this->db->where(array("orderlistdetails.restaurantid" => $this->session->merchant_id));
    }
    
    function getFashionOrders($param=array(), $platformid=2, $limit_start)
    {
        $this->db->select('orderlistdetails.*, accounts.firstname as account_firstname, accounts.lastname as account_lastname,accounts.usertype as account_usertype, accountaddresses.lastname as address_lastname,
            accountaddresses.firstname as address_firstname, accountaddresses.address, accountaddresses.phone, orders.reference, orders.deliverytype, orders.couponcode,
            orders.totalordervalue, orders.status as orderstatus, orders.vat, orders.additionalcharges, orders.discount, orders.accountid, orderstatus.orderstatus_desc');
        $this->db->from('orderlistdetails');
        $this->db->join('orders', 'orderlistdetails.orderid = orders.id');
        $this->db->join('accounts', 'orders.accountid = accounts.id', "left");
        $this->db->join('accountaddresses', 'accountaddresses.id = orders.accountaddressid', "left");
        $this->db->join('orderstatus', 'orderlistdetails.status = orderstatus.id', "left");
        //$this->db->join('products_fashion', 'orderlistdetails.product_fashionid = products_fashion.id', "left");
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with isdeleted field set to zero and also based on the jollof platform
        $this->db->where(array('orderlistdetails.isdeleted'=>0, 'orderlistdetails.platformid'=>$platformid, 'orderlistdetails.restaurantid'=>$_SESSION['merchant_id']));
        
        $this->db->limit(25, $limit_start);
        $this->db->order_by("orders.createdat", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return null;
        }
    }
    
    // Get count of all fashion orders
    function getFashionOrdersCount($param=array(), $platformid=2)
    {
        $this->db->from('orderlistdetails');
        $this->db->join('orders', 'orderlistdetails.orderid = orders.id');
        $this->db->join('accounts', 'orders.accountid = accounts.id', "left");
        $this->db->join('accountaddresses', 'accountaddresses.id = orders.accountaddressid', "left");
        $this->db->join('orderstatus', 'orderlistdetails.status = orderstatus.id', "left");
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with deletedat field set to null
        $this->db->where(array('orderlistdetails.isdeleted'=>0, 'orderlistdetails.platformid'=>$platformid, 'orderlistdetails.restaurantid'=>$_SESSION['merchant_id']));
        
        $total = $this->db->count_all_results();
        return $total;
    }
    
    function getFashionOrdersByID($orderid, $platformid=2)
    {
        $this->db->select('orderlistdetails.*, accounts.firstname as account_firstname, accounts.lastname as accont_lastname,accounts.usertype as account_usertype, accountaddresses.lastname as address_lastname,
            accountaddresses.firstname as address_firstname, accountaddresses.address, state_cities.cityname as address_city, states.statename as address_state, accountaddresses.phone as address_phone, accountaddresses.phone2 as address_phone2,
            orders.reference, orders.deliverytype, orders.couponcode,orders.totalordervalue, orders.status as orderstatus, orders.vat, orders.additionalcharges, orders.discount, orders.accountid, orderstatus.orderstatus_desc,
            restaurants.companyname,restaurants.merchanttype');
        $this->db->from('orderlistdetails');
        $this->db->join('restaurants', 'orderlistdetails.restaurantid = restaurants.id', "left");
        $this->db->join('orders', 'orderlistdetails.orderid = orders.id');
        $this->db->join('accounts', 'orders.accountid = accounts.id', "left");
        $this->db->join('accountaddresses', 'accountaddresses.id = orders.accountaddressid', "left");
        $this->db->join('states', 'states.id = accountaddresses.stateid', "left");
        $this->db->join('state_cities', 'state_cities.id = accountaddresses.cityid', "left");
        $this->db->join('orderstatus', 'orderlistdetails.status = orderstatus.id', "left");
        //$this->db->join('products_fashion', 'orderlistdetails.product_fashionid = products_fashion.id', "left");
        
        // Clause to only fetch data with isdeleted field set to zero and also based on the jollof platform
        if($platformid=='admin')
        {
            $this->db->where(array('orderlistdetails.id'=>$orderid, 'orderlistdetails.isdeleted'=>0));
        }
        else
        {
            $this->db->where(array('orderlistdetails.id'=>$orderid, 'orderlistdetails.isdeleted'=>0, 'orderlistdetails.platformid'=>$platformid, 'orderlistdetails.restaurantid'=>$_SESSION['merchant_id']));
        }
        
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
    }
    public function _updateorderflow($status, $id)
    {
        if ( $status == 5)
        {

            $this->db->set('cancledordercomment', $_POST['ord_note']);
        }
        $this->db->set('status', $status); 
        //$this->db->where(array('id'=> $id,'restaurantid'=>$_SESSION['merchant_id'])); //which row want to upgrade 
        $this->db->where(array('id'=> $id)); //which row want to upgrade 
        $this->db->update('orderlistdetails'); 
        return true;
    }
    public function getFashionOrdersByIDlast_month($param=array(), $platformid=2){
        
        $lastmonth = (int) date('n', strtotime('-2 months'));
        $year = (int) date('Y', strtotime('-1 months')); 

        $this->db->select('productid,productname,SUM(price) AS total_price,count(*) AS full_count');
        $this->db->from('orderlistdetails');
        // Process any filter options if any
        //$this->queryParameters($param);
        
        // Clause to only fetch data with isdeleted field set to zero and also based on the jollof platform
        $this->db->where(array( 'orderlistdetails.isdeleted'=>0, 'orderlistdetails.platformid'=>$platformid, 'orderlistdetails.restaurantid'=>$_SESSION['merchant_id']));
        $this->db->where_in('orderlistdetails.status', array(2,3,4));
        $this->db->where('MONTH(createdat)', $lastmonth);
        $this->db->where('YEAR(createdat)', $year);
        
        $this->db->order_by("orderlistdetails.createdat", "desc");
        $this->db->group_by("orderlistdetails.productid");
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return null;
        }
    }
    
    public function getFashionOrdersByIDAll_month($platformid=2){
        
        $this->db->select('productid,productname,createdat,YEAR(createdat) as created_year,MONTH(createdat) as created_month, SUM(price) AS total_price,count(*) AS full_count');
        $this->db->from('orderlistdetails');
        
        // Clause to only fetch data with isdeleted field set to zero and also based on the jollof platform
        $this->db->where(array( 'orderlistdetails.isdeleted'=>0, 'orderlistdetails.platformid'=>$platformid, 'orderlistdetails.restaurantid'=>$_SESSION['merchant_id']));
        $this->db->where_in('orderlistdetails.status', array(2,3,4));
        
        $this->db->order_by("orderlistdetails.createdat", "asc");
        $this->db->group_by("orderlistdetails.productid");
        //$this->db->group_by("YEAR(createdat)");
        $this->db->group_by("MONTH(createdat)");
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return null;
        }
        
    }
    public function getFashionOrdersByDateAll_month($platformid=2){
        
        $this->db->select('createdat,YEAR(createdat) as created_year,MONTH(createdat) as created_month, SUM(price) AS total_price,count(*) AS full_count');
        $this->db->from('orderlistdetails');
        
        // Clause to only fetch data with isdeleted field set to zero and also based on the jollof platform
        $this->db->where(array( 'orderlistdetails.isdeleted'=>0, 'orderlistdetails.platformid'=>$platformid, 'orderlistdetails.restaurantid'=>$_SESSION['merchant_id']));
        $this->db->where_in('orderlistdetails.status', array(2,3,4));
        
        $this->db->order_by("orderlistdetails.createdat", "asc");
        //$this->db->group_by("orderlistdetails.productid");
        $this->db->group_by("YEAR(createdat)");
        $this->db->group_by("MONTH(createdat)");
        
        $query = $this->db->get();
        
        $get_prod = null;
        if($query->num_rows() > 0)
        {
            $rows = $query->result_array();
            foreach($rows as $row)
            {
                
                $row['products'] =   $this->getOrdersByDateAll_month($row['created_month']);
                $get_prod[] = $row;
            }
            
            return $get_prod;
        }
        else
        {
            return null;
        }
        
        
    }
    
    public function getFashionTopSellingproduct($platformid=2,$limit=5){
        
        $this->db->select('restaurants.slug,products_fashion.id as product_fashionid,orderlistdetails.productname,products_fashion.productfrontimage,products_fashion.slug, SUM(orderlistdetails.price) AS total_price,count(orderlistdetails.id) AS full_count');
        $this->db->from('orderlistdetails');
        $this->db->join('restaurants', 'orderlistdetails.restaurantid = restaurants.id', "left");
        $this->db->join('product_qty_color_size', 'product_qty_color_size.id = orderlistdetails.product_fashionid','left');
        $this->db->join('products_fashion', 'products_fashion.id = product_qty_color_size.productid','left');
        
        // Clause to only fetch data with isdeleted field set to zero and also based on the jollof platform
        $this->db->where(array( 'orderlistdetails.isdeleted'=>0, 'orderlistdetails.platformid'=>$platformid, 'orderlistdetails.restaurantid'=>$_SESSION['merchant_id']));
        $this->db->where_in('orderlistdetails.status', array(2,3,4));
        
        $this->db->limit($limit);
        $this->db->order_by("full_count", "desc");
        $this->db->group_by("orderlistdetails.productid");
        
        $query = $this->db->get();
        
        $get_prod = null;
        if($query->num_rows() > 0)
        {
            $rows = $query->result_array();
            foreach($rows as $row)
            {
                
                $row['product_image'] =   $this->_getprd_img($row['product_fashionid']);
                $get_prod[] = $row;
            }
            
            return $get_prod;
        }
        else
        {
            return null;
        }
        
    }
    
    public function _getprd_img($by_id) 
    {
        $this->db->select("id,imagename");
        $this->db->from('productimages');
        $this->db->where(" productimages.productid ", $by_id);
        $this->db->where(" productimages.colorimg ", 0);
        $this->db->where(" productimages.status ", 1);
        $this->db->where(" productimages.isdeleted ", 0);
        $this->db->order_by("arrange", 'ASC');
        $query = $this->db->get();
          
        return $query->result_array();
    }
    
    public function getFashionRecentOrders($platformid=3,$limit=5)
    {
        $this->db->select('orderlistdetails.*, accounts.firstname as account_firstname, accounts.lastname as account_lastname,accounts.usertype as account_usertype, accountaddresses.lastname as address_lastname,
            accountaddresses.firstname as address_firstname, accountaddresses.address, accountaddresses.phone, orders.reference, orders.deliverytype, orders.couponcode,
            orders.totalordervalue, orders.status as orderstatus, orders.vat, orders.additionalcharges, orders.discount, orders.accountid, orderstatus.orderstatus_desc,
            products_fashion.productfrontimage,products_fashion.id as productfashion_id');
        $this->db->from('orderlistdetails');
        $this->db->join('orders', 'orderlistdetails.orderid = orders.id');
        $this->db->join('accounts', 'orders.accountid = accounts.id', "left");
        $this->db->join('accountaddresses', 'accountaddresses.id = orders.accountaddressid', "left");
        $this->db->join('orderstatus', 'orderlistdetails.status = orderstatus.id', "left");
        $this->db->join('product_qty_color_size', 'product_qty_color_size.id = orderlistdetails.product_fashionid','left');
        $this->db->join('products_fashion', 'products_fashion.id = product_qty_color_size.productid','left');
        
        $this->db->where(array('orderlistdetails.isdeleted'=>0, 'orderlistdetails.platformid'=>$platformid, 'orderlistdetails.restaurantid'=>$_SESSION['merchant_id']));
        
        $this->db->limit($limit);
        $this->db->order_by("orders.createdat", "desc");
        $query = $this->db->get();
        
        $get_prod = null;
        if($query->num_rows() > 0)
        {
            $rows = $query->result_array();
            foreach($rows as $row)
            {
                
                $row['product_image'] =   $this->_getprd_img($row['productfashion_id']);
                $get_prod[] = $row;
            }
            
            return $get_prod;
        }
        else
        {
            return null;
        }
    }
    public function getOrdersByDateAll_month($month, $platformid=1){
        
        $this->db->select('productid,productname,createdat, SUM(price) AS total_price,count(*) AS full_count');
        $this->db->from('orderlistdetails');
        
        // Clause to only fetch data with isdeleted field set to zero and also based on the jollof platform
        $this->db->where(array( 'orderlistdetails.isdeleted'=>0, 'orderlistdetails.platformid'=>$platformid, 'orderlistdetails.restaurantid'=>3));
        $this->db->where('MONTH(createdat)', $month);
        $this->db->where_in('orderlistdetails.status', array(2,3,4));
        
        $this->db->order_by("orderlistdetails.createdat", "asc");
        $this->db->group_by("orderlistdetails.productid");
        //$this->db->group_by("YEAR(createdat)");
        //$this->db->group_by("MONTH(createdat)");
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return null;
        }
        
        
    }
    
    public function montlyquary()
    {
        
        //get all order per month
        $get_row = $this->getFashionOrdersByIDAll_month();
        $get_dataByMonth = $this->getFashionOrdersByDateAll_monthh();
        
        $cols = array();
        $table = array();
        $table_col = array();
        
        
        
        // group all array by product name (remove all duplicated product name)
        foreach ($get_row as $mouthlysale)  
        {  
            $sub_array[]=$mouthlysale['productname']; 
        } 
        $sub_array = array_unique($sub_array);
        
        $keys= 1;
        foreach($sub_array as $getrow)
        {
            //Values
            $cols_temp= array('id' => '', 
                                'label' => $getrow, 
                                'type' => 'string'
                               );
            $cols[$keys] = $cols_temp;
            $keys++;
        }
        
        $tables['cols'] = array(
        //Labels for the chart, these represent the column titles
        array('id' => '', 'label' => 'Date', 'type' => 'Month')
        );
        $table_col['cols'] = $cols;
        
        //merge $tables['cols'] to $table_col['cols'] to $table['cols]
        $coloutput = array_merge($tables['cols'] , $table_col['cols']);
        $table['cols'] = $coloutput;
        //return $table;
        
        /*
        $table['cols'] = array(
        //Labels for the chart, these represent the column titles
        array('id' => '', 'label' => 'Date', 'type' => 'Month'),
        array('id' => '', 'label' => 'coconut rice', 'type' => 'string'),
        array('id' => '', 'label' => 'Ewa riro', 'type' => 'string')
        );
         * 
         */
        
        $rows = array();
        foreach($get_dataByMonth as $row)
        {
            
        
            $sub_array = array();
            $sub=array();
            $sub_array[] =  array("v" => 'new Date('.$row['created_year'].','.$row['created_month'].')' );
            
            $first = true;
            //foreach($row['products'] as $productBydate )
            //{
                foreach($coloutput as $key=> $cols)
                {
                    if ($first)
                    {
                        $first = FALSE;
                        continue;
                    }
                    foreach($row['products'] as $productBydate )
                    {
                        
                        if($productBydate['productname']==$cols['label'])
                        {
                            $sub_array[] = array("v" => $productBydate['productname'] );
                            continue;
                        }
                        else
                        {
                            $sub_array[] = array("v" => 0 );continue;
                        }
                        
                    }
                    //$sub_array[] = array("v" => $cols['label'] );
                }
                //$sub_array[] = array("v" => $productBydate["productname"] );
            //}
            /*
            foreach($coloutput as $key=> $cols)
            {
                if ($first)
                {
                    $first = FALSE;
                    continue;
                }

                if ($cols['label']==$row['productname'])
                {
                    $sub_array[] =  array("v" => $row["productname"],"l" => $cols['label'] );
                }
                else
                {
                    $sub_array[] =  array("v" => $row["productname"] );
                }
            } 
             * 
             */
            $rows[]      =  array("c" => $sub_array );
        
         /*
        $temp = array();
        //Values
        $temp[] = array('v' => (string) $row['topping']);
        $temp[] = array('v' => $row['slices']);
        $rows[] = array('c' => $temp);
        
        $datetime = explode(".", $row["datetime"]);
        $sub_array[] =  array("v" => 'Date(' . $datetime[0] . '000)' );
        $sub_array[] =  array("v" => $row["sensors_temperature_data"] );
        $rows[]      =  array("c" => $sub_array );
        * 
        */
 
        }
        $table['rows'] = $rows;
        
        echo '<pre>';
        echo json_encode($table, JSON_PRETTY_PRINT);
        echo '<pre>';
        //$jsonTable = json_encode($table, true);
        //echo $jsonTable;
        
    }




    // cuisine orderitrms 

     public function getCuisineOrdersByIDlast_month($param=array(), $platformid=1){
        
        $lastmonth = (int) date('n', strtotime('-2 months'));
        $year = (int) date('Y', strtotime('-1 months')); 

        $this->db->select('productid,productname,SUM(price) AS total_price,count(*) AS full_count');
        $this->db->from('orderlistdetails');
        // Process any filter options if any
        //$this->queryParameters($param);
        
        // Clause to only fetch data with isdeleted field set to zero and also based on the jollof platform
        $this->db->where(array( 'orderlistdetails.isdeleted'=>0, 'orderlistdetails.platformid'=>$platformid, 'orderlistdetails.restaurantid'=>$_SESSION['merchant_id']));
        $this->db->where_in('orderlistdetails.status', array(2,3,4));
        $this->db->where('MONTH(createdat)', $lastmonth);
        $this->db->where('YEAR(createdat)', $year);
        
        $this->db->order_by("orderlistdetails.createdat", "desc");
        $this->db->group_by("orderlistdetails.productid");
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return null;
        }
    }

    public function getCuisineOrdersByDateAll_month($platformid=1){
        
        $this->db->select('createdat,YEAR(createdat) as created_year,MONTH(createdat) as created_month, SUM(price) AS total_price,count(*) AS full_count');
        $this->db->from('orderlistdetails');
        
        // Clause to only fetch data with isdeleted field set to zero and also based on the jollof platform
        $this->db->where(array( 'orderlistdetails.isdeleted'=>0, 'orderlistdetails.platformid'=>$platformid, 'orderlistdetails.restaurantid'=>$_SESSION['merchant_id']));
        $this->db->where_in('orderlistdetails.status', array(2,3,4));
        
        $this->db->order_by("orderlistdetails.createdat", "asc");
        //$this->db->group_by("orderlistdetails.productid");
        $this->db->group_by("YEAR(createdat)");
        $this->db->group_by("MONTH(createdat)");
        
        $query = $this->db->get();
        
        $get_prod = null;
        if($query->num_rows() > 0)
        {
            $rows = $query->result_array();
            foreach($rows as $row)
            {
                
                $row['products'] =   $this->getOrdersByDateAll_month($row['created_month']);
                $get_prod[] = $row;
            }
            
            return $get_prod;
        }
        else
        {
            return null;
        }
        
        
    }

    public function getCuisineTopSellingproduct($platformid=1,$limit=5){
        
        $this->db->select('restaurants.slug,products_cuisine.id as product_cuisineid,orderlistdetails.productname,products_cuisine.productimage, SUM(orderlistdetails.price) AS total_price,count(orderlistdetails.id) AS full_count');
        $this->db->from('orderlistdetails');
        $this->db->join('restaurants', 'orderlistdetails.restaurantid = restaurants.id', "left");
        $this->db->join('products_cuisine', 'products_cuisine.id = orderlistdetails.productid','left');
        
        // Clause to only fetch data with isdeleted field set to zero and also based on the jollof platform
        $this->db->where(array( 'orderlistdetails.isdeleted'=>0, 'orderlistdetails.platformid'=>$platformid, 'orderlistdetails.restaurantid'=>$_SESSION['merchant_id']));
        $this->db->where_in('orderlistdetails.status', array(2,3,4));
        
        $this->db->limit($limit);
        $this->db->order_by("full_count", "desc");
        $this->db->group_by("orderlistdetails.productid");
        
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return null;
        }
        
    }
    public function getCuisineRecentOrders($platformid=1,$limit=5)
    {
        $this->db->select('orderlistdetails.*, accounts.firstname as account_firstname, accounts.lastname as account_lastname,accounts.usertype as account_usertype, accountaddresses.lastname as address_lastname,
            accountaddresses.firstname as address_firstname, accountaddresses.address, accountaddresses.phone, orders.reference, orders.deliverytype, orders.couponcode,
            orders.totalordervalue, orders.status as orderstatus, orders.vat, orders.additionalcharges, orders.discount, orders.accountid, orderstatus.orderstatus_desc,products_cuisine.productimage');
        $this->db->from('orderlistdetails');
        $this->db->join('orders', 'orderlistdetails.orderid = orders.id');
        $this->db->join('accounts', 'orders.accountid = accounts.id', "left");
        $this->db->join('accountaddresses', 'accountaddresses.id = orders.accountaddressid', "left");
        $this->db->join('orderstatus', 'orderlistdetails.status = orderstatus.id', "left");
        
        $this->db->join('products_cuisine', 'products_cuisine.id = orderlistdetails.productid','left');
        $this->db->where(array('orderlistdetails.isdeleted'=>0, 'orderlistdetails.platformid'=>$platformid, 'orderlistdetails.restaurantid'=>$_SESSION['merchant_id']));
        
        $this->db->limit($limit);
        $this->db->order_by("orders.createdat", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return null;
        }
        
    }



    /*---------------------------------------*/
    /*      Jollof Admin                     
    /*---------------------------------------*/



    function queryParametersAdmin($params=array())
    {
        // Search account orders
        if(isset($params['accountid'])){
            $this->db->where(array('orders.accountid'=>$params['accountid']));
        }
        
        // Filter orders by merchant option
        if(isset($params['restaurantid'])){
            $this->db->where(array('orderlistdetails.restaurantid'=>$params['restaurantid']));
        }
        
         // filter by order status
        if(isset($params['status'])){
            $this->db->where(array('orders.status'=>$params['status']));
        }
        
        // filter by order product status
        if(isset($params['orderstatus'])){
            $this->db->where(array('orderlistdetails.status'=>$params['orderstatus']));
        }
        
        // filter by merchant
        if(isset($params['reference'])){
            $this->db->where(array('order.reference'=>$params['reference']));
        }
        
        // filter by company name; this would perform a general search like filter
        if(isset($params['companyname'])){
            $this->db->where("(restaurants.companyname LIKE'%$params[companyname]%' OR restaurants.phone LIKE'%$params[companyname]%' OR restaurants.email LIKE'%$params[companyname]%')");
        }
        
        // filter by account user's address
        if(isset($params['accountaddressid'])){
            $this->db->where(array('orders.accountaddressid'=>$params['accountaddressid']));
        }

        // filter by merchant type
        if(isset($params['merchanttype'])){
            $this->db->where(array('orderlistdetails.platformid'=>$params['merchanttype']));
        }
        
        
        // filter by delivery type
        if(isset($params['deliverytype'])){
            $this->db->where(array('orders.deliverytype'=>$params['deliverytype']));
        }
        
        // filter by merchant creation date
        if(isset($params['createdat']))
        {
            /*$t_date = explode("-", $params['createdat']);
            $startdate = date("Y-m-d", strtotime($t_date[0]));
            $enddate = date("Y-m-d", strtotime($t_date[1]));
           $this->db->where(array('restaurants.createdat >='=>$startdate, 'restaurants.createdat <='=>$enddate.' 23:59:59' ));*/
           $this->db->like('orders.createdat ',$params['createdat']);
        }

        
        // Search account name
        if(isset($params['accountname'])){
            //$this->db->where(array('accounts.firstname'=>$params['accountname'], 'accounts.lastname'=>$params['accountname'] ));
            $this->db->like('accounts.firstname',$params['accountname']);
            //$this->db->like('accounts.lastname',$params['accountname']);
        }

        // Search account Type
        if(isset($params['accounttype'])){
            //$this->db->where(array('accounts.firstname'=>$params['accountname'], 'accounts.lastname'=>$params['accountname'] ));
            $this->db->like('accounts.usertype',$params['accounttype']);
            //$this->db->like('accounts.lastname',$params['accountname']);
        }
        
        // Search product order code
        if(isset($params['ordercode'])){
            $this->db->like(array('orderlistdetails.ordercode'=>$params['ordercode'] ));
        }

         // Search product name
        if(isset($params['productname'])){
            $this->db->like(array('orderlistdetails.productname'=>$params['productname'] ));
        }
        
        // Search product Status
        if(isset($params['productstatus'])){
            
            $this->db->where(array('orderstatus.orderstatus_desc'=>$params['productstatus'] ));
        }

        // filter by merchant orderlistdetails creation date
        if(isset($params['orderlistdetails_startdate']) && isset($params['orderlistdetails_enddate']))
        {
            $t_date = explode("-", $params['orderlistdetails_startdate']);
            $e_date = explode("-", $params['orderlistdetails_enddate']);
            //$startdate = date("Y-m-d", strtotime($t_date[0]));
            //$enddate = date("Y-m-d", strtotime($e_date[0]));
            $this->db->where(array('DATE(orderlistdetails.createdat) >='=>$params['orderlistdetails_startdate'], 'DATE(orderlistdetails.createdat) <='=>$params['orderlistdetails_enddate'] ));
        }


        // filter by giftportal order product status
        if(isset($params['giftportalorderstatus'])){
            $this->db->where(array('ordergiftportal.status'=>$params['giftportalorderstatus']));
        }

        // Search giftpotal order code
        if(isset($params['giftportalcodeordercode'])){
            $this->db->like(array('ordergiftportal.ordercode'=>$params['giftportalcodeordercode'] ));
        }

         // Search giftportal product name
        if(isset($params['giftportalproductname'])){
            $this->db->like(array('ordergiftportal.productname'=>$params['giftportalproductname'] ));
        }

        // filter by giftportal order product status
        if(isset($params['giftportalorderstatus'])){
            $this->db->where(array('ordergiftportal.status'=>$params['giftportalorderstatus']));
        }

        // filter by giftpotal creation date
        if(isset($params['giftpotalcreatedat']))
        {
            /*$t_date = explode("-", $params['createdat']);
            $startdate = date("Y-m-d", strtotime($t_date[0]));
            $enddate = date("Y-m-d", strtotime($t_date[1]));
            $this->db->where(array('restaurants.createdat >='=>$startdate, 'restaurants.createdat <='=>$enddate.' 23:59:59' ));*/
        }
        
        // Perform checks to show merchants only orders that belong to their store
        //$this->db->where(array("orderlistdetails.restaurantid" => $this->session->merchant_id));
    }

    function getFashionCuisineOrders($param=array(),$limit_start)
    {
        $this->db->select('orderlistdetails.*, accounts.firstname as account_firstname, accounts.lastname as account_lastname, accounts.usertype as account_usertype, accountaddresses.lastname as address_lastname,
            accountaddresses.firstname as address_firstname, accountaddresses.address, accountaddresses.phone, orders.reference, orders.deliverytype, orders.couponcode,
            orders.totalordervalue, orders.status as orderstatus, orders.vat, orders.additionalcharges, orders.discount, orders.accountid, orderstatus.orderstatus_desc,
            restaurants.slug,restaurants.companyname,restaurants.merchanttype
            ');
        $this->db->from('orderlistdetails');
        $this->db->join( "restaurants", "restaurants.id = orderlistdetails.restaurantid " );
        $this->db->join('orders', 'orderlistdetails.orderid = orders.id');
        $this->db->join('accounts', 'orders.accountid = accounts.id', "left");
        $this->db->join('accountaddresses', 'accountaddresses.id = orders.accountaddressid', "left");
        $this->db->join('orderstatus', 'orderlistdetails.status = orderstatus.id', "left");
        //$this->db->join('products_fashion', 'orderlistdetails.product_fashionid = products_fashion.id', "left");
        
        // Process any filter options if any
        $this->queryParametersAdmin($param);
        // Clause to only fetch data with isdeleted field set to zero and also based on the jollof platform
        $this->db->where(array('orderlistdetails.isdeleted'=>0));
        
        $this->db->limit(25, $limit_start);
        $this->db->order_by("orders.createdat", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return null;
        }
    }
    
    // Get count of all fashion And Cuisine orders
    function getFashionCuisineOrdersCount($param=array())
    {
        $this->db->from('orderlistdetails');
        $this->db->join( "restaurants", "restaurants.id = orderlistdetails.restaurantid " );
        $this->db->join('orders', 'orderlistdetails.orderid = orders.id');
        $this->db->join('accounts', 'orders.accountid = accounts.id', "left");
        $this->db->join('accountaddresses', 'accountaddresses.id = orders.accountaddressid', "left");
        $this->db->join('orderstatus', 'orderlistdetails.status = orderstatus.id', "left");
        
        // Process any filter options if any
        $this->queryParametersAdmin($param);
        // Clause to only fetch data with deletedat field set to null
        $this->db->where(array('orderlistdetails.isdeleted'=>0));
        
        $total = $this->db->count_all_results();
        return $total;
    }

    public function getFashionCuisineOrdersMerchant() 
    {
        $this->db->distinct();
        $this ->db->select("orderlistdetails.restaurantid,restaurants.companyname");
        $this->db->from('orderlistdetails');
        $this->db->join( "restaurants", "restaurants.id = orderlistdetails.restaurantid " );
        $this->db->order_by("restaurants.companyname");
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return null;
        }
        //return $query->result();
    }


    function getGiftportalOrders($param=array(),$limit_start)
    {
        $this->db->select('ordergiftportal.*, accounts.firstname as account_firstname, accounts.lastname as account_lastname, accounts.usertype as account_usertype, accountaddresses.lastname as address_lastname,
            accountaddresses.firstname as address_firstname, accountaddresses.address, accountaddresses.phone,
            ordergiftportal.status as orderstatus, orderstatus.orderstatus_desc
            ');
        $this->db->from('ordergiftportal');
        $this->db->join('accounts', 'ordergiftportal.accountid = accounts.id', "left");
        $this->db->join('accountaddresses', 'accountaddresses.id = ordergiftportal.accountaddressid', "left");
        $this->db->join('orderstatus', 'ordergiftportal.status = orderstatus.id', "left");
        //$this->db->join('products_fashion', 'orderlistdetails.product_fashionid = products_fashion.id', "left");
        
        // Process any filter options if any
        $this->queryParametersAdmin($param);
        // Clause to only fetch data with isdeleted field set to zero and also based on the jollof platform
        $this->db->where(array('ordergiftportal.isdeleted'=>0));
        
        $this->db->limit(25, $limit_start);
        $this->db->order_by("ordergiftportal.createdat", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return null;
        }
    }
    
    // Get count of all fashion And Cuisine orders
    function getGiftportalOrdersCount($param=array())
    {
        $this->db->from('ordergiftportal');
        $this->db->join('accounts', 'ordergiftportal.accountid = accounts.id', "left");
        $this->db->join('accountaddresses', 'accountaddresses.id = ordergiftportal.accountaddressid', "left");
        $this->db->join('orderstatus', 'ordergiftportal.status = orderstatus.id', "left");
        
        // Process any filter options if any
        $this->queryParametersAdmin($param);
        // Clause to only fetch data with deletedat field set to null
        $this->db->where(array('ordergiftportal.isdeleted'=>0));
        
        $total = $this->db->count_all_results();
        return $total;
    }
    
}
?>