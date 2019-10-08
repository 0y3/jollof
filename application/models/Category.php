<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class Category extends CI_Model
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
            $this->db->where(array('categories.id'=>$params['id']));
        }
        
        // filter by merchant creation date
        if(isset($params['createdat']))
        {
            $t_date = explode("-", $params['createdat']);
            $startdate = date("Y-m-d", strtotime($t_date[0]));
            $enddate = date("Y-m-d", strtotime($t_date[1]));
            $this->db->where(array('categories.createdat >='=>$startdate, 'categories.createdat <='=>$enddate.' 23:59:59' ));
        }
        
        // Perform checks to show merchants only orders that belong to their store
        $this->db->where(array("categories.restaurantid" => $this->session->merchant_id));
    }
    
    
    
   
    public function getAllCategory($param=array(), $limit_start)
    {
        $this->db->select('*');
        $this->db->from('categories');

        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with isdeleted field set to zero
        //$this->db->where(" restaurantid", $this->session->merchant_id);
        $this->db->where(array('isdeleted'=>0));
        
        $this->db->limit(25, $limit_start);
        $this->db->order_by("arrangecategory", "ASC");

        
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
        $this->db->from('categories');
        
        // Process any filter options if any
        $this->queryFashionParameters($param);
        // Clause to only fetch data with deletedat field set to null
        $this->db->where(array('isdeleted'=>0));
        
        $total = $this->db->count_all_results();
        return $total;
    }
   
}
?>