<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class Tablereservations extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    // For filtering categories
    function queryParameters($params=array())
    {   
        // filter product by id
        if(isset($params['id']))
        {
            $this->db->where(array('tablereservations.id'=>$params['id']));
        }
        
        // filter by merchant creation date
        if(isset($params['createdat']))
        {
            $t_date = explode("-", $params['createdat']);
            $startdate = date("Y-m-d", strtotime($t_date[0]));
            $enddate = date("Y-m-d", strtotime($t_date[1]));
            $this->db->where(array('tablereservations.createdat >='=>$startdate, 'categories.createdat <='=>$enddate.' 23:59:59' ));
        }
        
        // Perform checks to show merchants only orders that belong to their store
        //$this->db->where(array("tablereservations.restaurantid" => $this->session->merchant_id));
    }
    
    
    
   
    public function getAllTableReservations($param=array(), $limit_start,$platformid=1)
    {
        $this->db->select('tablereservations.*,restaurants.companyname,restaurants.merchanttype');
        $this->db->from('tablereservations');
        $this->db->join( "restaurants", "restaurants.id = tablereservations.restaurantid " );

        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with isdeleted field set to zero
        //$this->db->where(" restaurantid", $this->session->merchant_id);
        if($platformid=='admin')
        {
            $this->db->where(array('tablereservations.isdeleted'=>0));
        }
        else
        {
            $this->db->where(array('tablereservations.isdeleted'=>0,"tablereservations.restaurantid" => $this->session->merchant_id));
        }
        
        $this->db->limit(25, $limit_start);
        $this->db->order_by("tablereservations.requeststatus", 'ASC');
        $this->db->order_by("tablereservations.createdat", "DESC");

        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }

        
    }
    
    
    // Get count of all Cuisine Categories count
    function getAllCategoryCount($param=array())
    {
        $this->db->select('*');
        $this->db->from('tablereservations');
        
        // Process any filter options if any
        $this->queryFashionParameters($param);
        // Clause to only fetch data with deletedat field set to null
        $this->db->where(array('isdeleted'=>0));
        
        $total = $this->db->count_all_results();
        return $total;
    }
   
}
?>