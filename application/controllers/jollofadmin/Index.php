<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('oye/Restaurant_admin_model');
        $this->load->model('oye/Fashion_model');
        $this->load->model('oye/Session_model');
        $this->load->model('oye/Role_assignment');
        $this->load->model('admin_m/Auth');
        $this->load->model('promo');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->helper('text');
	}

	public function index()
	{
	    if($this->session->jollofAdmin == true)
	    {
	       redirect("dashboard/index");
	    }
	    else
	    {
	    	$query_params['bannertypeid']=11;
	        $usertype= array('admin','fashion','cuisine','thirdparty');
	        $data['banners'] = $this->promo->getAllPromo_Nolimit($query_params, $usertype);
	        $this->load->view('jollof_admin/login',$data);
	    }
	}
}
