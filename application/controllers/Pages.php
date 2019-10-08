<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

        function __construct()
	{
	  parent::__construct();
          $this->load->model('superadmin');
          $this->load->model('cuisine');
          $this->load->model('promo');
	}
       
    public function index()
    {   
        //cuisine banner
        $query_cuisine_params['bannertypeid']=1;
        $usertype= array('admin','fashion','cuisine','thirdparty');
        $data['cuisinebanners'] = $this->promo->getAllPromo_Nolimit($query_cuisine_params, $usertype);

        //Fashion banner
        $query_fashion_params['bannertypeid']=8;
        $usertype= array('admin','fashion','cuisine','thirdparty');
        $data['fashionbanners'] = $this->promo->getAllPromo_Nolimit($query_fashion_params, $usertype);

        //Lifestyle banner
        $query_lifestyl_params['bannertypeid']=14;
        $usertype= array('admin','fashion','cuisine','thirdparty');
        $data['lifestylebanners'] = $this->promo->getAllPromo_Nolimit($query_lifestyl_params, $usertype);

        //Biz banner
        $query_biz_params['bannertypeid']=15;
        $usertype= array('admin','fashion','cuisine','thirdparty');
        $data['bizbanners'] = $this->promo->getAllPromo_Nolimit($query_biz_params, $usertype);

        //Scholar banner
        $query_scholar_params['bannertypeid']=16;
        $usertype= array('admin','fashion','cuisine','thirdparty');
        $data['scholarbanners'] = $this->promo->getAllPromo_Nolimit($query_scholar_params, $usertype);

       //print("<pre>".print_r($this->promo->getAllPromo_Nolimit($query_cuisine_params, $usertype),true)."</pre>");die;

        
        $data['meta_keyword']= 'Shopping,Fashion,Cuisine,Life Style,Scholar,Business, Gift Portal jollof,Sales,Movies, Events,Ticket Online,E-trade Homepage,0y3 ';
        $data['titel'] = 'Jollof:-Home';
        $data['navmenu'] = "index";

        $data['banner'] = $this->superadmin->getBannerByTypeid(4);
        //$data['small_banner'] = $this->Super_admin_model->_banner(2);
        $data['info']= $this->superadmin->getAdminSettings();

        $data['content_file']= 'index';
        $this->load->view('mainpage_view/layout',$data);
    }

}
