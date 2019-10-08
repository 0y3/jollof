<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layaway extends CI_Controller {

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
        redirect('fashion');
    }
    
    public function checklayaway() 
    {

        //print("<pre>".print_r($this->session->flashdata('layawayparams'),true)."</pre>"); //die;
        if( $this->input->post())
        {
            // Get all data from the layaway form
            $layawayparams = $this->input->post();
            //print("<pre>".print_r($layawayparams,true)."</pre>"); //die;
            $this->session->set_flashdata('layawayparams',$layawayparams);

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

            $this->session->set_flashdata('layawayparams',$data);
            */
        }
        else
        {
            redirect('fashion');
        }

        //print("<pre>".print_r($data,true)."</pre>");die;
        
    }
    public function checkout() 
    {

        //print("<pre>".print_r($this->session->flashdata('layawayparams'),true)."</pre>");// die;
        if(!is_null($this->session->flashdata('layawayparams')))
        {

            //$layawayparams =array();
            $layawayparams= $this->session->flashdata('layawayparams');
            $product = $this->Generic->getByFieldSingle('id', $layawayparams ['product_fashionid'], $tablename='product_qty_color_size'); // Get product details

            $data_ = array(
                'status'    =>  1,
                'isdeleted' => 0
            ); 
            $data['layaway'] = $this->Generic->findByCondition($data_,'layaway', $orderbyfield='durationweeks');
            


            $user = $this->Generic->getByFieldSingle('id', $_SESSION['User_id'], $tablename='accounts'); // Get product details

            
           //print("<pre>".print_r($layawayparams ['mainproduct_fashionid'],true)."</pre>"); //die;

            $data['icon']       = 'jol_1.ico';
            $data['titel']      = 'Jollof:-Layaway Checkout';
            $data['meta_keyword']= 'Shopping,Cart, Checkout , Sales, Online, Homepage, Layaway';
            $admininfo          = $this->Super_admin_model->get_admin_info();
            $data['info']       = $admininfo;
            $data['cuis_cate']  = $this->Restaurant_admin_model->get_allcuisaine_cate();
            $data ['vat']       = $admininfo->vat;

            
            
            $data['cart_list']  =$layawayparams; //load in the cart item
            //$data['jpoint']  =$product['jpoints']; //load in the cart item
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
            $data ['page_loader']= 'oye_mainpage_v/checkout_layaway';

            $this->load->view('oye_mainpage_v/account_template',$data);

        }
        else
        {
            redirect('fashion');
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
