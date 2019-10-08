<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Giftportal extends CI_Controller {

    function __construct()
    {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('oye/Auth'); //call the model for auth
      $this->load->model('oye/Account_model');
      $this->load->model('oye/Profile_model');
      $this->load->model('oye/Super_admin_model');
      $this->load->model('oye/Fashion_model');
      $this->load->model('oye/Checkout_model');
      $this->load->model('oye/Restaurants_model');
      $this->load->model('oye/Restaurant_admin_model');
      $this->load->model('oye/Email_model'); // call in the emai;l model class
      $this->load->model('utility');
      $this->load->model('Generic');
      $this->load->helper('text');
      $this->load->helper('url');
    }
        
    public function index()
    {
        $data['info']= $this->Super_admin_model->get_admin_info();
        $order_by  = $this->input->get('position');
        $per_page=12;
        if($this->input->get("pages"))
        {
        $per_page  = $this->input->get('pages');
        }
        
        $get_prd_count = $this->Fashion_model->record_count_allproduct_bygiftportal();
        
        if( $this->input->get())
        {
            // Get all data from the search form
            $filterparams = $this->input->get();
            $this->session->set_flashdata('filterparams',$filterparams);
        }
        //print("<pre>".print_r($this->session->flashdata('filterparams'),true)."</pre>"); //die;
        
        $config = array();
        $config["base_url"] = base_url() . "giftportal/";
        $config["total_rows"] = $get_prd_count;
        $config["per_page"] = $per_page;
        $config["uri_segment"] = 4;
        
        // styling/html stuff
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>' . "\n";
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page"> ';
        $config['last_tag_close'] = '</li>' . "\n"; 
        //$config['next_link'] = 'Next &rarr;';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>' . "\n";
        //$config['prev_link'] = '&larr; Previous';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>' . "\n";
        $config['cur_tag_open'] = '<li class=""><a class="active"href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>' . "\n";
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        
        $get_prd=$this->Fashion_model->_allproduct_bygiftportal(null,$config["per_page"],$page,$order_by,$this->session->flashdata('filterparams'));
        
        
        //print("<pre>".print_r($get_prd,true)."</pre>"); die;
        
        //$store_details = $this->Fashion_model->get_restaurant_info($store_id);
        //$data['get_prd'] = $this->Fashion_model->_allproduct_bystore($cat_id=FALSE,$store_id,$config["per_page"],$page);
        
        $data["links"] = $this->pagination->create_links();
        $data['get_prd']= $get_prd;
        
        
        //print("<pre>".print_r($this->pagination->create_links(),true)."</pre>"); die;
        
        $data ['icon']= 'jol_1.ico';
        $data ['titel']= 'Jollof:-Fashion Giftportal';
        $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, Giftportal';
        //$data ['nav'] = $this->Fashion_model->_allcat_bystore_navcount($store_id);
        $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
        $data ['colors_prdcounts'] = $this->Fashion_model->_get_filtercolor(null,$store_id=null,$by_giftporte=1,$this->session->flashdata('filterparams'));
        $data ['sizes_prdcounts'] = $this->Fashion_model->_get_filtersize(null,$store_id=null,$by_giftporte=1,$this->session->flashdata('filterparams'));
        $data ['stores_prdcounts'] = $this->Fashion_model->_get_stores_prdcounts();
        //$data ['resta'] = $store_details;
        $data ['cat_name']='Giftportal';
        $data ['breadcrumb']='<li class="active"> Giftportal Products</li>';
        
        $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
        $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
        $data ['sidebar_loader']= 'included/fashionpage_included/sidebar_filter_store';
        $data ['sidebar_mobile_loader']= 'included/fashionpage_included/sidebar_mobile_filter_store';
        $data ['footer_loader']= 'included/fashionpage_included/footer';
        $data ['error_page'] = 'included/error_page_fashion';
        $data ['page_loader']= 'fashion_view/giftportal';
    
        //$this->load->view('included/header_fashion', $data);
        $this->load->view('fashion_view/giftportalproduct_template', $data);
    }

    public function product($giftportal_product=null)
    {

            //$giftportal = $this->uri->segment(3);
            //$giftportal_product = $this->uri->segment(2);
            $data['info']= $this->Super_admin_model->get_admin_info();

            //print("<pre>".print_r($giftportal_product,true)."</pre>"); die;
            if(isset($giftportal_product) && !is_numeric($giftportal_product))
                {
                    $giftportal_id = $this->Fashion_model->_getproductid($giftportal_product); // Get url Id
                    if($giftportal_id == FALSE){redirect('giftportal');} // If its a wrong url 
                    
                    
                    $data['get_prd'] = $this->Fashion_model->_getproductdetails_byid($giftportal_id); // Get all Product by category details
                    
                    if( $this->input->get())
                    {
                        // Get all data from the search form
                        $filterparams = $this->input->get();
                        $this->session->set_flashdata('filterparams',$filterparams);
                    }
                    //print("<pre>".print_r($this->session->flashdata('filterparams'),true)."</pre>"); //die;
                    //print("<pre>".print_r($this->Fashion_model->_getproductdetails_byid($giftportal_id),true)."</pre>"); die;

                    
                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Jollof:-Fashion/';
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, Giftportal ';
                    $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                    $data ['colors_prdcounts'] = $this->Fashion_model->_get_filtercolor(null,$giftportal_id,$by_giftporte=null,$this->session->flashdata('filterparams'));
                    $data ['sizes_prdcounts'] = $this->Fashion_model->_get_filtersize(null,$giftportal_id,$by_giftporte=null,$this->session->flashdata('filterparams'));
                    $data ['stores_prdcounts'] = $this->Fashion_model->_get_stores_prdcounts();
                    
                    $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
                    $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
                    $data ['sidebar_loader']= 'included/fashionpage_included/sidebar_filter';
                    $data ['sidebar_mobile_loader']= 'included/fashionpage_included/sidebar_mobile_filter';
                    $data ['footer_loader']= 'included/fashionpage_included/footer';
                    $data ['error_page'] = 'included/error_page_fashion';
                    $data ['page_loader']= 'fashion_view/product';
                
                    //$this->load->view('included/header_fashion', $data);
                    $this->load->view('fashion_view/giftportal_details', $data);
                    //$this->load->view('included/footer', $data);

                   
                }
            else//if (isset($giftportal)) 
                {   
                    
                    redirect('giftportal');
                    
                }


    }
    
    public function checkgiftportal() 
    {

        //print("<pre>".print_r($this->session->flashdata('giftportalparams'),true)."</pre>"); //die;
        if( $this->input->post())
        {
            // Get all data from the giftportal form
            $giftportalparams = $this->input->post();
            //print("<pre>".print_r($giftportalparams,true)."</pre>"); //die;
            $this->session->set_flashdata('giftportalparams',$giftportalparams);

            /*
            $data['mainproduct_fashionid'] = $_POST["mainproduct_fashionid"];
            $data['product_fashionid']      = $_POST["product_fashionid"];
            $data['product_name']           = $_POST["product_name"];
            $data['product_img']            = $_POST["product_img"];
            $data['product_colorcode']      = $_POST["product_colorcode"];
            $data['product_colorname']      = $_POST["product_colorname"];
            $data['product_size']           = $_POST["product_size"];
            $data['quantity_fashion']       = $_POST["quantity_fashion"];
            $data['quantity']               = $_POST["quantity"];
            $data['product_points']         = $_POST["product_points"];

            $this->session->set_flashdata('giftportalparams',$data);
            */
        }
        else
        {
            redirect('giftportal');
        }

        //print("<pre>".print_r($data,true)."</pre>");die;
        
    }
    public function checkout() 
    {

        //print("<pre>".print_r($this->session->flashdata('giftportalparams'),true)."</pre>");// die;
        if(!is_null($this->session->flashdata('giftportalparams')))
        {

            //$giftportalparams =array();
            $giftportalparams= $this->session->flashdata('giftportalparams');
            $product = $this->Generic->getByFieldSingle('id', $giftportalparams ['product_fashionid'], $tablename='product_qty_color_size'); // Get product details


            $user = $this->Generic->getByFieldSingle('id', $_SESSION['User_id'], $tablename='accounts'); // Get product details

            if( ($product['jpoints'] * $giftportalparams ['quantity']) > $user['point'])
            {
                redirect('giftportal');
            }
            //print("<pre>".print_r($giftportalparams ['mainproduct_fashionid'],true)."</pre>"); //die;

            $data['icon']       = 'jol_1.ico';
            $data['titel']      = 'Jollof:-Checkout';
            $data['meta_keyword']= 'Shopping,Cart, Checkout , Sales, Online, Homepage, Giftportal';
            $admininfo          = $this->Super_admin_model->get_admin_info();
            $data['info']       = $admininfo;
            $data['cuis_cate']  = $this->Restaurant_admin_model->get_allcuisaine_cate();
            $data ['vat']       = $admininfo->vat;

            
            
            $data['cart_list']  =$giftportalparams; //load in the cart item
            $data['jpoint']  =$product['jpoints']; //load in the cart item
            $data['state']   = $this->Account_model->get_state_where();
            $data['add_list'] = $this->_get_address();
            
            $by_userid = null;
            if( ( isset($_SESSION['Type']) && $_SESSION['Type'] =='User' ) && $_SESSION['logged_in']==true )
            {
                $by_userid=$_SESSION['User_id'];
                $data['account_info'] = $this->Checkout_model->get_account_info($by_userid);
                $data['add_card']   = $this->Checkout_model->get_card_id($by_userid);
            }
            
            
            
            if(isset($_GET['nav_path']) && $_GET['nav_path'] == 'cuisine')
            {
                $data ['nav'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
                $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_cuisine';
            }
            else if(isset($_GET['nav_path']) && $_GET['nav_path'] == 'fashion')
            {
                $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
            }
            else 
            {
                $data ['nav'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
            }

            //print("<pre>".print_r($data,true)."</pre>"); die;

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'oye_mainpage_v/checkout_giftportal';

            $this->load->view('oye_mainpage_v/account_template',$data);

        }
        else
        {
            redirect('giftportal');
        }
    }
    public function _get_address()
    {  
        $by_userid = null;
        if(!empty($_SESSION['User_id']) )
        {
            $by_userid=$_SESSION['User_id'];
        }
        
        if(isset($_POST["id"]) && !empty($_POST["id"]) )
        {
            $add_list = $this->Checkout_model->get_address_where($_POST["id"]); // call City by address
            
            $output = ' <span><i class="fa fa-user" aria-hidden="true"></i>: 
                            '.$add_list[0]->firstname .'
                            '.$add_list[0]->lastname  .'
                        </span>
                        <span><i class="fa fa-map-marker"></i>: '. $add_list[0]->address.' </span>
                        <span> '. $add_list[0]->cityname .'</span>
                        <span> '. $add_list[0]->statename .'</span>
                        <span><i class="fa fa-phone" aria-hidden="true"></i> : '. $add_list[0]->phone .' </span>
                        <span><i class="fa fa-mobile" aria-hidden="true"></i> : '. $add_list[0]->phone2 .' </span>  
                    ';
            echo $output;
        }
        else
        {
            $get_addres = $this->Checkout_model->get_address_where($by_id=FALSE); // call City by State
        }
        
        return $get_addres;
        
    }

    public function payment()
    {
        //$this->check_Loginin();
        //print("<pre>".print_r($_SESSION,true)."</pre>");die;
       /*if(empty($this->cart->contents()))
       {
        redirect('', 'refresh');
       }
        */
        $total = $_SESSION['total_cart']*100;
        
        if($this->session->userdata('Type')=='User') //Registerd User
        {
            $product = $this->Generic->getByFieldSingle('id', $this->input->post('product_id'), $tablename='product_qty_color_size'); // Get product details
            

                $data_order = array(  
                                    'ordercode'           =>   'JPT-'.strtoupper($this->utility->generate_random_string(12)) , 
                                    'accountid'           =>   $_SESSION['User_id'],
                                    'accountaddressid'    =>   $this->input->post('add_option'),
                                    'productid'           =>   $this->input->post('product_id'),
                                    'productname'         =>   $this->input->post('product_name'),
                                    'quantity'            =>   $this->input->post('product_qty'),
                                    'point'               =>   $_SESSION['total_cart'],
                                    'color'               =>   $this->input->post('product_color'),
                                    'size'                =>  $this->input->post('product_size')
                                 );
                //print("<pre>".print_r($data_order,true)."</pre>"); die;
                $insert_data = $this->Generic->add($data_order, $tablename="ordergiftportal");// insert to db 
                if($insert_data)
                {
                    $user = $this->Generic->getByFieldSingle('id', $_SESSION['User_id'], $tablename='accounts'); // Get product details

                    $points=$user['point'] - $_SESSION['total_cart'];

                    $data_update = array( 
                                'point' => $points
                            );
                    //print("<pre>".print_r($points,true)."</pre>");die;
                    $qty=(int)$this->input->post('product_qty');
                    $new_qty=(int)$product['productinstock']-$qty;
                    $new_sold=(int)$product['productsold']+$qty;
                    $data_update_fashion = array( 
                                'productinstock' => $new_qty,
                                'productsold' => $new_sold
                            );
                    $this->Generic->edit($data_update_fashion,$this->input->post('product_id'), $tablename="product_qty_color_size"); // update fashion Product Stock

                    $update_data = $this->Generic->edit($data_update, $_SESSION['User_id'] , $tablename="accounts"); 
                    if($update_data)
                    {
                        $this->success();
                    }
                    
            
                
                
                
                //print("<pre>".print_r($items,true)."</pre>");
                //$this->Email_model->send_OrderConfirmation_email($items['ordercode'],$account_info->firstname, $account_info->lastname, $account_info->email, $site_email ); // send the customer an email
                //$this->Email_model->send_Order_merchant_email($items['ordercode'],$rest_info->companyname, $rest_info->email, $site_email ); // send the Merchant an email
                } 
                else{ redirect('giftportal');}       
               
                
        }
        else // Not Login User
        {
             redirect('giftportal');
            //print("<pre>".print_r($guestaddressid,true)."</pre>");die;
        }
        
    }

   public function success()
    {
        $data ['icon']= 'jol_1.ico';
        $data ['titel']= 'Jollof:-checkout';
        $data ['meta_keyword']= 'Shopping,Fashion,cuisine, Sales, Online, Homepage,checkout ';
        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();


        $data ['breadcrumb']='<li class="active"> Giftportal Order Successfull </li>';

        //$data ['page_loader']= 'oye_mainpage_v/checkout_verify';

        $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
        $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
        $data ['sidebar_loader']= 'included/fashionpage_included/sidebar_filter_store';
        $data ['sidebar_mobile_loader']= 'included/fashionpage_included/sidebar_mobile_filter_store';
        $data ['footer_loader']= 'included/fashionpage_included/footer';
        $data ['error_page'] = 'included/error_page_fashion';
        $data ['page_loader']= 'fashion_view/giftportal_success';

        $this->load->view('fashion_view/giftportalproduct_template', $data);
        /*
        $this->load->view('oye_mainpage_v/account_template',$data);
        $this->load->view('included/header', $data);
        $this->load->view('oye_mainpage_v/checkout_verify_delivery',$data);
        $this->load->view('included/footer', $data);
        */
        
        //unset($_SESSION['total_cart']);
    }
    
    
}
