<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class Admin extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    // For filtering categories
    function queryParameters($params=array())
    {   
        // filter product by id
        if(isset($params['colorvariantid']))
        {
            $this->db->where(array('color_tbl.id'=>$params['id']));
        }
        
        // filter by merchant creation date
        if(isset($params['createdat']))
        {
            $t_date = explode("-", $params['createdat']);
            $startdate = date("Y-m-d", strtotime($t_date[0]));
            $enddate = date("Y-m-d", strtotime($t_date[1]));
            $this->db->where(array('color_tbl.createdat >='=>$startdate, 'color_tblcolor_tbl.createdat <='=>$enddate.' 23:59:59' ));
        }
        
        // Perform checks to show merchants only orders that belong to their store
        //$this->db->where(array("tablereservations.restaurantid" => $this->session->merchant_id));
    }
    
    
    
   
    public function getAllColor($param=array(), $limit_start)
    {
        $this->db->select('*');
        $this->db->from('color_tbl');

        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with isdeleted field set to zero
        
            $this->db->where(array('color_tbl.isdeleted'=>0));
        
        $this->db->limit(25, $limit_start);
        $this->db->order_by("colorname", 'ASC');

        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }

        
    }
    
    
    // Get count of all Fashion Color count
    function getAllColorCount($param=array())
    {
        $this->db->select('*');
        $this->db->from('color_tbl');
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with deletedat field set to null
        $this->db->where(array('isdeleted'=>0));
        
        $total = $this->db->count_all_results();
        return $total;
    }

    public function getAllBrand($param=array(), $limit_start)
    {
        $this->db->select('*');
        $this->db->from('brands_tbl');

        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with isdeleted field set to zero
        
            $this->db->where(array('brands_tbl.isdeleted'=>0));
        
        $this->db->limit(25, $limit_start);
        $this->db->order_by("name", 'ASC');

        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }

        
    }
    
    // Get count of all Brand count
    function getAllBrandCount($param=array())
    {
        $this->db->select('*');
        $this->db->from('brands_tbl');
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with deletedat field set to null
        $this->db->where(array('isdeleted'=>0));
        
        $total = $this->db->count_all_results();
        return $total;
    }

    public function getAllCuisineCategory($param=array(), $limit_start)
    {
        $this->db->select('*');
        $this->db->from('categories_cusine');

        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with isdeleted field set to zero
        
            $this->db->where(array('isdeleted'=>0));
        
        $this->db->limit(25, $limit_start);
        $this->db->order_by("categoryname", 'ASC');

        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }

        
    }
    
    
    // Get count of all Cuisine Categories count
    function getAllCuisineCategoryCount($param=array())
    {
        $this->db->select('*');
        $this->db->from('categories_cusine');
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with deletedat field set to null
        $this->db->where(array('isdeleted'=>0));
        
        $total = $this->db->count_all_results();
        return $total;
    }

    public function adminInfo() 
    {

        $this->db->select("*");
        $this->db->from('settings');
        $this->db->where("id","1");
        $query = $this->db->get()->row();
        return $query;
    }
   
}
?>