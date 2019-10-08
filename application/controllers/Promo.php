<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Promo extends CI_Controller {

    function __construct()
	{
        parent::__construct();
        $this->load->library('session');
        $this->load->model('oye/Auth'); //call the model for auth
        $this->load->model('oye/Account_model');
        $this->load->model('oye/Profile_model');
        $this->load->model('oye/Super_admin_model');
        $this->load->model('oye/Restaurants_model');
        $this->load->model('oye/Restaurant_admin_model');
	}
        
	public function index()
	{  
        $data ['icon']= 'jol_1.ico';
        $data ['titel']= 'Jollof:-Promo';
        
        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
            
        $data['banner'] = $this->Super_admin_model->_banner(4);
        //$data['small_banner'] = $this->Super_admin_model->_banner(2);
        $data['rest_logo'] = $this->Super_admin_model->_rest_logo();
                
        //$this->load->view('included/header', $data);
		$this->load->view('oye_mainpage_v/index', $data);
        $this->load->view('included/footer', $data);
	}
        
	public function Promo_form()
	{
         
	$data ['icon']= 'jol_1.ico';
        $data ['titel']= 'Jollof:-Promo';
        
        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
        
        $data['cate'] = $this->Super_admin_model->_slider_option($by_id=FALSE);
        $data['promo_du'] = $this->Super_admin_model->_promo_duration_option();
        $data['admin_info'] = $this->Super_admin_model->get_admin_info();
        $this->load->view('included/header', $data);
		$this->load->view('oye_mainpage_v/promo_formnew', $data);
        $this->load->view('included/footer', $data);
	}
        
        
}
