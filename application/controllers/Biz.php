<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biz extends CI_Controller {

        function __construct()
	{
	  parent::__construct();
          $this->load->library('session');
          $this->load->model('oye/Auth'); //call the model for auth
          $this->load->model('oye/Account_model');
          $this->load->model('oye/Profile_model');
          $this->load->model('oye/Restaurant_admin_model');
          $this->load->model('oye/Super_admin_model');
          $this->load->model('promo');
	}
        
	public function index()
	{  
      $query_params['bannertypeid']=15;
      $usertype= array('admin','fashion','cuisine','thirdparty');
      $data['banners'] = $this->promo->getAllPromo_Nolimit($query_params, $usertype); 
               
      $data ['icon']= 'jol_1.ico';
      $data ['titel']= 'Jollof:- Comming Soon';
                
                
		$this->load->view('comming_soon/index', $data);
	}
        
       
        
}
