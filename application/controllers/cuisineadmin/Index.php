<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('promo');
	}

	public function index()
	{
	    if($this->session->cuisineAdmin == true)
	    {
	       redirect("dashboard/index");
	    }
	    else
	    {
	    	$query_params['bannertypeid']=13;
	        $usertype= array('admin','fashion','cuisine','thirdparty');
	        $data['banners'] = $this->promo->getAllPromo_Nolimit($query_params, $usertype);
	        $this->load->view("cuisine_admin/login",$data);
	    }
	}
	
}
