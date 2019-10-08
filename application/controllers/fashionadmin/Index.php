<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('promo');
	}

	public function index()
	{
	    if($this->session->fashionAdmin == true)
	    {
	       redirect("dashboard/index");
	    }
	    else
	    {
	    	$query_params['bannertypeid']=12;
	        $usertype= array('admin','fashion','cuisine','thirdparty');
	        $data['banners'] = $this->promo->getAllPromo_Nolimit($query_params, $usertype);
	    	$this->load->view('fashion_admin/login',$data);
	    }
	}
}
