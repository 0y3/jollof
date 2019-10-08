<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Model
{
        private $DB_promo_duration = "promo_duration";
        private $DB_promo_price = "promo_price";
        private $DB_img_ads = "img_ads";
        private $DB_bannertype = "bannertype";
    
	function __construct()
	{
		parent::__construct();
	}
	
	function getAll($bannerTypeId,$promousertype='fashion')
	{
		$this->db->select('img_ads.*, bannertype.bannertypename,bannertype.jollofsitetypeid as bannerjollofsitetypeid');
		$this->db->from('img_ads');
		$this->db->join('bannertype', 'bannertype.id = img_ads.bannertypeid');
        //$this->db->where("bannertype.status ", 1);

        $this->db->where("img_ads.isdeleted ", 0);
        $this->db->where("img_ads.merchantid ", (int)$_SESSION['merchant_id']);
        $this->db->where("img_ads.usertype ", $promousertype);
        $this->db->where_in("img_ads.bannertypeid ", $bannerTypeId);
		
		// Perform checks to show merchants only orders that belong to their store
		//$this->db->where(array("users.restaurantid" => $this->session->merchant_id));
        
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		    return $query->result_array();
		}
		else{
			return false;
		}
	}
    function getAllCount($bannerTypeId,$promousertype='fashion')
    {
        $this->db->select('img_ads.*');
        $this->db->from('img_ads');
        $this->db->join('bannertype', 'bannertype.id = img_ads.bannertypeid');
        //$this->db->where("bannertype.status ", 1);

        $this->db->where("img_ads.isdeleted ", 0);
        $this->db->where("img_ads.merchantid ", (int)$_SESSION['merchant_id']);
        $this->db->where("img_ads.usertype ", $promousertype);
        $this->db->where_in("img_ads.bannertypeid ", $bannerTypeId);
        
        // Perform checks to show merchants only orders that belong to their store
        //$this->db->where(array("users.restaurantid" => $this->session->merchant_id));
        
        $total = $this->db->count_all_results();
        return $total;
    }

    function getByID($userID,$promousertype='fashion')
	{
            $this->db->select('img_ads.*, bannertype.bannertypename,bannertype.jollofsitetypeid as bannerjollofsitetypeid,users.firstname,users.lastname,users.email');
            $this->db->from('img_ads');
            $this->db->join('bannertype', 'bannertype.id = img_ads.bannertypeid');
            $this->db->join('users', 'users.id = img_ads.userid');
            //$this->db->where("img_ads.usertype ", $promousertype);
            $this->db->where_in("img_ads.id ", $userID);
            //$this->db->where("img_ads.merchantid ", (int)$_SESSION['merchant_id']);
            $this->db->where("img_ads.isdeleted ", 0);
            //$this->db->where("img_ads.status ", 0);
            
            $query = $this->db->get();
            if ($query->num_rows() > 0)
            {
                    $row = $query->row();
                    return $row;
            }
            else
                    return false;
	}

    function getThirdpartyByID($userID)
    {
            $this->db->select('img_ads.*, bannertype.bannertypename,bannertype.jollofsitetypeid as bannerjollofsitetypeid');
            $this->db->from('img_ads');
            $this->db->join('bannertype', 'bannertype.id = img_ads.bannertypeid');
            //$this->db->join('users', 'users.id = img_ads.userid');
            //$this->db->where("img_ads.usertype ", $promousertype);
            $this->db->where_in("img_ads.id ", $userID);
            //$this->db->where("img_ads.merchantid ", (int)$_SESSION['merchant_id']);
            $this->db->where("img_ads.isdeleted ", 0);
            //$this->db->where("img_ads.status ", 0);
            
            $query = $this->db->get();
            if ($query->num_rows() > 0)
            {
                    $row = $query->row();
                    return $row;
            }
            else
                    return false;
    }
        
        
        public function merchant_info($by_id) 
        {

            $this->db->select(" ".$this->DB_merchant.".*  , ".$this->DB_city.".cityname , ".$this->DB_state.".statename")
                     ->from($this->DB_merchant)
                     ->where(" ".$this->DB_merchant.".status" ,1)
                     ->where(array(" ".$this->DB_merchant.".id" => (int)$by_id ," ".$this->DB_merchant.".isdeleted" =>"0"))
                     ->join( $this->DB_city, " ".$this->DB_city.".id = ".$this->DB_merchant.".cityid " ,"LEFT ")
                     ->join( $this->DB_state, " ".$this->DB_state.".id = ".$this->DB_merchant.".stateid ","LEFT ");

            $query = $this->db->get()->row();
            //print("<pre>".print_r($query,true)."</pre>");die;
            return $query;

        }
        
        public function promoSliderOption($by_id,$platform=2)
        {
            $this->db->select('*');
            $this->db->from('bannertype');
            //$this->db->where("bannertype ", "general");
            $this->db->where_in("bannertype ",array( 'general','fashion'));
            $this->db->where_in("jollofsitetypeid ",array( $platform, 3));
            $this->db->where("status ", 1);
            if($by_id)
            {
                $this->db->where("jollofsitetypeid ", $by_id);
            }
            
            $query = $this->db->get();
            if ($query->num_rows() > 0)
            {
                return $query->result_array();
            }
            else{
                    return false;
            }
        }
        public function promoSliderOptionCuisine($by_id,$platform=2)
        {
            $this->db->select('*');
            $this->db->from('bannertype');
            $this->db->where_in("jollofsitetypeid ",array( $platform, 3));
            $this->db->where("status ", 1);
            $this->db->where_in("bannertype ",array( 'general','restaurant'));
            if($by_id)
            {
                $this->db->where("jollofsitetypeid ", $by_id);
            }
            
            $query = $this->db->get();
            if ($query->num_rows() > 0)
            {
                return $query->result_array();
            }
            else{
                    return false;
            }
        }
        public function promoDurationOption()
        {
            $this->db->select('*');
            $this->db->from('promo_duration');
            $this->db->where("status ", 1);
            
            $query = $this->db->get();
            if ($query->num_rows() > 0)
            {
                return $query->result_array();
            }
            else{
                    return false;
            }
        }
        public function adminInfo() 
        {

            $this->db->select("*");
            $this->db->from('settings');
            $this->db->where("id","1");
            $query = $this->db->get()->row();
            return $query;
        }
        public function promoDurationByid($by_id) 
        {
            $this->db->select("promo_price.*, promo_duration.durationname");
            $this->db->from('promo_price');
            $this->db->join( 'promo_duration', "promo_duration.id = promo_price.promodurationid ", 'left');
            $this->db->where("promo_price.bannertypeid",(int)$by_id);
            $this->db->where(" promo_duration.status",'1');
            $this->db->where(" promo_price.status",'1');
            $this->db->order_by("promo_duration.order", 'ASC');

            $query = $this->db->get();
            //print("<pre>".print_r($query->result_array(),true)."</pre>");die;
            return $query->result();
        }
        
        function promodurationinfo($id)
    	{
                $this->db->select('*');
                $this->db->from('promo_duration');
                $this->db->where("id ", $id);
                $this->db->where("status ", 1);
                
                $query = $this->db->get();
                if ($query->num_rows() > 0)
                {
                        $row = $query->row();
                        return $row;
                }
                else
                        return false;
    	}
        

        function queryParameters($params=array())
        {
            // filter by merchant status
            if(isset($params['status']) && isset($params['status'])){
                $this->db->where(array('img_ads.status'=>$params['status']));
            }

            // filter by merchant Type
            if(isset($params['merchanttype']) && isset($params['merchanttype'])){
                $this->db->where(array('restaurants.merchanttype'=>$params['merchanttype']));
            }
            
        
            // filter by banner Type ; this would perform a general search like filter
            if(isset($params['bannertype']) && isset($params['bannertype'])){
               $this->db->where(array('bannertype.id'=>$params['bannertype']));
            }

            // filter by banner bannertypename ; this would perform a general search like filter
            if(isset($params['bannertypename']) && isset($params['bannertypename'])){
               $this->db->where(array('bannertype.bannertypename'=>$params['bannertypename']));
            }

            // filter by bannertype jollofsitetypeid ; this would perform a general search like filter
            if(isset($params['bannertypejollofsitetypeid']) && isset($params['bannertypejollofsitetypeid'])){
               $this->db->where(array('bannertype.jollofsitetypeid'=>$params['bannertypejollofsitetypeid']));
            }

            // filter by  durationname ; this would perform a general search like filter
            if(isset($params['durationname']) && isset($params['durationname'])){
               $this->db->where(array('promo_duration.durationname'=>$params['durationname']));
            }

            // filter by promo banner id ; this would perform a general search like filter
            if(isset($params['bannertypeid']) && isset($params['bannertypeid'])){
               $this->db->where(array('img_ads.bannertypeid'=>$params['bannertypeid']));
            }

            // filter by Promo Price   ; this would perform a general search like filter
            if(isset($params['promoprice']) && isset($params['promoprice'])){
               $this->db->where(array('promo_price.price'=>$params['promoprice']));
            }

            // filter by Promo Price Status  ; this would perform a general search like filter
            if(isset($params['promopricestatus']) && isset($params['promopricestatus'])){
               $this->db->where(array('promo_price.status'=>$params['promopricestatus']));
            }

            // filter by promo user Type ; this would perform a general search like filter
            if(isset($params['usertype']) && isset($params['usertype'])){
               $this->db->where(array('img_ads.usertype'=>$params['usertype']));
            }

            // filter by Company name name; this would perform a general search like filter
            if(isset($params['companyname']) && isset($params['companyname'])){
                //$this->db->where("(restaurants.companynamee LIKE'%$params[companyname]%' OR restaurants.phone LIKE'%$params[companyname]%' OR restaurants.email LIKE'%$params[companyname]%')");
                $this->db->where(array('restaurants.companyname'=>$params['companyname']));
            }

            // filter by merchant creation date
            if(isset($params['createdat']) && isset($params['createdat']))
            {
                //$t_date = explode("-", $params['createdat']);
                //$startdate = date("yyyy-mm-dd", strtotime($t_date[0]));
                //$enddate = date("yyyy-mm-dd", strtotime($t_date[1]));
                //$this->db->where(array('img_ads.createdat >='=>$startdate, 'img_ads.createdat <='=>$enddate.' 23:59:59' ));
                $this->db->like('img_ads.createdat ',$params['createdat']);
            }
        }


        function getAllPromo($param=array(), $limit_start,$usertype)
        {
            $this->db->select('img_ads.*, bannertype.bannertypename, bannertype.jollofsitetypeid as bannerjollofsitetypeid,restaurants.id as merchantid, restaurants.companyname,restaurants.merchanttype,users.firstname as userfirstname,users.lastname as userlastname');
            $this->db->from('img_ads');
            $this->db->join('bannertype', 'bannertype.id = img_ads.bannertypeid');
            $this->db->join('restaurants', 'img_ads.merchantid = restaurants.id', "left");
            $this->db->join('users', 'img_ads.userid = users.id', "left");
            //$this->db->where("bannertype.status ", 1);

            // Process any filter options if any
            $this->queryParameters($param);
            // Clause to only fetch data with deletedat field set to null
            $this->db->where(array('img_ads.isdeleted'=>0,'bannertype.isdeleted'=>0));
            $this->db->where_in("img_ads.usertype ", $usertype);

            $this->db->limit(25, $limit_start);
            $this->db->order_by("img_ads.status", "DESC");
            $this->db->order_by("img_ads.createdat", "DESC");
            $this->db->order_by("img_ads.arrangeimage", "ASC");
            $query = $this->db->get();
            if ($query->num_rows() > 0)
            {
                return $query->result_array();
            }
            else{
                return false;
            }
        }

        function getAllPromo_Nolimit($param=array(),$usertype)
        {
            $this->db->select('img_ads.*, bannertype.bannertypename, bannertype.jollofsitetypeid as bannerjollofsitetypeid,restaurants.id as merchantid, restaurants.companyname,restaurants.merchanttype,users.firstname as userfirstname,users.lastname as userlastname');
            $this->db->from('img_ads');
            $this->db->join('bannertype', 'bannertype.id = img_ads.bannertypeid');
            $this->db->join('restaurants', 'img_ads.merchantid = restaurants.id', "left");
            $this->db->join('users', 'img_ads.userid = users.id', "left");
            //$this->db->where("bannertype.status ", 1);

            // Process any filter options if any
            $this->queryParameters($param);
            // Clause to only fetch data with deletedat field set to null
            $this->db->where(array('img_ads.isdeleted'=>0));
            $this->db->where_in("img_ads.usertype ", $usertype);

            $this->db->order_by("img_ads.arrangeimage", "ASC");
            $this->db->order_by("img_ads.createdat", "DESC");
            $query = $this->db->get();
            if ($query->num_rows() > 0)
            {
                return $query->result_array();
            }
            else{
                return false;
            }
        }

        // Get count of all 
        function getAllPromoCount($param=array(),$usertype)
        {
            $this->db->select('*');
            $this->db->from('img_ads');
            $this->db->join('bannertype', 'bannertype.id = img_ads.bannertypeid');
            $this->db->join('restaurants', 'img_ads.merchantid = restaurants.id', "left");
            $this->db->join('users', 'img_ads.userid = users.id', "left");
            
            // Process any filter options if any
            $this->queryParameters($param);
            // Clause to only fetch data with deletedat field set to null
            $this->db->where(array('img_ads.isdeleted'=>0));
            $this->db->where_in("img_ads.usertype ", $usertype);
            
            $total = $this->db->count_all_results();
            return $total;
        }

        public function getFashionCuisinePromoMerchant() 
        {
            $this->db->distinct();
            $this->db->select('restaurants.id, restaurants.companyname');
            $this->db->from('img_ads');
            $this->db->join('bannertype', 'bannertype.id = img_ads.bannertypeid');
            $this->db->join('restaurants', 'img_ads.merchantid = restaurants.id', "left");
            $this->db->join('users', 'img_ads.userid = users.id', "left");
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

        function getAllPromoByAdmin($param=array(), $limit_start,$usertype)
        {
            $this->db->select('img_ads.*, bannertype.bannertypename');
            $this->db->from('img_ads');
            $this->db->join('bannertype', 'bannertype.id = img_ads.bannertypeid');
            //$this->db->where("bannertype.status ", 1);

            // Process any filter options if any
            $this->queryParameters($param);
            // Clause to only fetch data with deletedat field set to null
            $this->db->where(array('img_ads.isdeleted'=>0));
            $this->db->where_in("img_ads.usertype ", $usertype);

            $this->db->limit(25, $limit_start);
            $this->db->order_by("img_ads.createdat", "DESC");
            $query = $this->db->get();
            if ($query->num_rows() > 0)
            {
                return $query->result_array();
            }
            else{
                return false;
            }
        }

        // Get count 
        function getAllPromoByAdminCount($param=array(),$usertype)
        {
            $this->db->select('*');
            $this->db->from('img_ads');
            $this->db->join('bannertype', 'bannertype.id = img_ads.bannertypeid');
            
            // Process any filter options if any
            $this->queryParameters($param);
            // Clause to only fetch data with deletedat field set to null
            $this->db->where(array('img_ads.isdeleted'=>0));
            $this->db->where_in("img_ads.usertype ", $usertype);
            
            $total = $this->db->count_all_results();
            return $total;
        }
	   

        function getAllPromoPrice($param=array(), $limit_start)
        {
            $this->db->select('promo_price.*,  bannertype.jollofsitetypeid, bannertype.bannertype, bannertype.bannertypename,promo_duration.durationname ');
            $this->db->from('promo_price');
            $this->db->join('bannertype', 'bannertype.id = promo_price.bannertypeid','left');
            $this->db->join('promo_duration', 'promo_duration.id = promo_price.promodurationid', "left");

            // Process any filter options if any
            $this->queryParameters($param);
            // Clause to only fetch data with deletedat field set to null
            $this->db->where(array('promo_price.isdeleted'=>0));

            $this->db->limit(25, $limit_start);
            $this->db->order_by("promo_price.createdat", "DESC");
            $query = $this->db->get();
            if ($query->num_rows() > 0)
            {
                return $query->result_array();
            }
            else{
                return false;
            }
        }

        // Get count of all Promo Prices 
        function getAllPromoPriceCount($param=array())
        {
            $this->db->select('*');
            $this->db->from('promo_price');
            $this->db->join('bannertype', 'bannertype.id = promo_price.bannertypeid','left');
            $this->db->join('promo_duration', 'promo_duration.id = promo_price.promodurationid', "left");
            
            // Process any filter options if any
            $this->queryParameters($param);
            // Clause to only fetch data with deletedat field set to null
            $this->db->where(array('promo_price.isdeleted'=>0));
            
            $total = $this->db->count_all_results();
            return $total;
        }

        public function promoSliderOptionId($by_id)
        {
            $this->db->select('*');
            $this->db->from('bannertype');
            $this->db->where("jollofsitetypeid ", $by_id);
            $this->db->where("status ", 1);
            $this->db->where_in("bannertype ",array( 'general','restaurant'));
           
            $query = $this->db->get();
            if ($query->num_rows() > 0)
            {
                return $query->result_array();
            }
            else{
                    return false;
            }
        }
}
