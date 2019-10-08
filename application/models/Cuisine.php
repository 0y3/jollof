<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cuisine extends CI_Model
{
    
	function __construct()
	{
		parent::__construct();
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

    public function getAllCuisaineCate() 
    {
        $this->db->select('*')
             ->from('categories_cusine')
             ->where('status',1)
             ->where('isdeleted',0)
             ->order_by("categoryname", 'ASC');

        $query = $this->db->get();
        return $query->result();
    }


}
