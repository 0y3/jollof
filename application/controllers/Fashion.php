<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fashion extends CI_Controller {

    function __construct()
    {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('oye/Auth'); //call the model for auth
      $this->load->model('oye/Account_model');
      $this->load->model('oye/Profile_model');
      $this->load->model('oye/Super_admin_model');
      $this->load->model('oye/Fashion_model');
      $this->load->model('Generic');
    }
        
    public function index()
    {
        $data ['icon']= 'jol_1.ico';
        $data ['titel']= 'Jollof:-Home';
        $data ['meta_keyword']= 'Creative,Shopping,Fashion, Sales, Online, Homepage';
        
        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
        $data['banner'] = $this->Super_admin_model->_banner(8);
        $data['cat_name']='';

        //print("<pre>".print_r($this->Super_admin_model->_banner(8),true)."</pre>"); die;

        $data_rand_sale = array(" products_fashion.sales" => true);
        $data_rand_discount = array("products_fashion.discount_percentage" =>1);
        $data_best_sellers = array("products_fashion.productsold >=" =>20);
        $limit=5;
        $data_check = array(  
                                 'merchanttype'  =>  'fashion',
                                 'status'   =>  1,
                                 'isdeleted' =>  0
                                 );
        $fashion_stores =  $this->Generic->findByCondition($data_check,'restaurants');
        
        $by_catid=1;
        $data['get_stores']= $fashion_stores;
        $data['get_prd']= $this->Fashion_model->_allproduct_bycat(FALSE,$limit=null,$state=null,$order_by=null);
        $data['all_rand'] = $this->Fashion_model->_get_product_rand(FALSE,FALSE,$limit);
        $data['sales_rand'] = $this->Fashion_model->_get_product_rand(FALSE,$data_rand_sale,$limit);
        $data['discount_rand'] = $this->Fashion_model->_get_product_rand(NULL,$data_rand_discount,$limit);
        $data['rec_rand'] = $this->Fashion_model->_get_product_rand(FALSE,FALSE,$limit=20);
        $data['best_sellers'] = $this->Fashion_model->_get_product_rand(FALSE,$data_best_sellers,$limit=20);
        $this->load->view('fashion_view/index', $data);
    }
    
    public function quickview()
    {
        $store_product = $this->uri->segment(4);
        $data['info']= $this->Super_admin_model->get_admin_info();
       
        if(isset($store_product)&& !is_numeric($store_product))
        {
            $store_id = $this->Fashion_model->_getproductid($store_product); // Get url Id
            //if($store_id == FALSE){redirect('fashion/store/'.$store);} // If its a wrong url 
            
            //print("<pre>".print_r($store_id,true)."</pre>"); die;


            $data['get_prd'] = $this->Fashion_model->_getproductdetails_byid($store_id); // Get all Product by category details
            $data['store_url']=$this->uri->segment(3);
            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
            $data ['sidebar_loader']= 'included/fashionpage_included/sidebar_filter';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'fashion_view/product';

            //$this->load->view('included/header_fashion', $data);
            $this->load->view('fashion_view/product_details_modal', $data);
            //$this->load->view('included/footer', $data);


        }
    }
    
    
}
