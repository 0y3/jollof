<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
                $this->load->model('oye/Restaurants_model');
                $this->load->model('oye/Restaurant_admin_model');
                $this->load->model('oye/Checkout_model');
                $this->load->model('oye/Profile_model');
                $this->load->model('oye/Super_admin_model');
                $this->load->helper('text');
	}
	
	public function index()
	{  
            //$this->load->model("oye/shopping_cart_model");
            //$data["product"] = $this->shopping_cart_model->fetch_all();
            //$this->load->view("mainpage_v/shopping_cart", $data);
            $this->products();
            
	}
        public function products()
	{  
            $this->check_Loginin();
            
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-checkout';
            
            $data['cart_list'] = $this->cart->contents(); //load in the cart item
            $data['state'] = $this->get_state();
            $data['add_list'] = $this->get_address();
            $data['add_card'] = $this->Checkout_model->get_card_id($_SESSION['User_id']);
            
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/checkout',$data);
            $this->load->view('included/footer', $data);
	}
        
        public function get_address()
        {  
            $this->check_Loginin();
            
            $by_userid = $this->session->userdata('User_id');
            
            if(isset($_POST["id"]) && !empty($_POST["id"]) )
            {
                $get_addres = $this->Checkout_model->get_address_where($_POST["id"]); // call City by address
                
                $output = '<div class="panel panel-primary">
                                        <div class="panel-heading"><i class="fa fa-truck" ></i>&nbsp; Delivery Address</div>
                                        <div class="panel-body">
                                            
                                            <table class="table">
                                                <tbody class="table">
                                                    
                                                    <tr class="table-bordered">
                                                        <td class="heading-table" style=" width: 5%"><i class="fa fa-user" aria-hidden="true"></i></td>
                                                        <td class="heading-name" style=" width: 95%">
                                                            <span><b> '.$get_addres[0]->firstname.'</b></span>
                                                            <span style=" padding-left:10px;"><b> '.$get_addres[0]->lastname.'</b></span>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr class="table-bordered">
                                                        <td class="heading-table" style=" width: 5%"><i class="fa fa-map-marker"></i> </td>
                                                        <td class="heading-name" style=" width: 95%">
                                                            '. $get_addres[0]->address.', <br>
                                                            '. $get_addres[0]->cityname.',<br>
                                                            '. $get_addres[0]->statename.'
                                                        </td>
                                                    </tr>
                                                     <tr class="table-bordered">
                                                        <td class="heading-table" style=" width: 5%"><i class="fa fa-phone" aria-hidden="true"></i></td>
                                                        <td class="heading-name" style=" width: 95%">
                                                            <span>'.$get_addres[0]->phone.'</span>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr class="table-bordered">
                                                        <td class="heading-table" style=" width: 5%"><i class="fa fa-mobile" aria-hidden="true"></i></td>
                                                        <td class="heading-name" style=" width: 95%">
                                                            <span>'.$get_addres[0]->phone2.'</span>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>';
                echo $output;
            }
            else
            {
                $get_addres = $this->Checkout_model->get_address_where($by_id=FALSE); // call City by State
            }
            
            return $get_addres;
            
            /*if(isset($get_addres) && !empty($get_addres) ){
                
                
                foreach($get_addres as $row)
                {
                    echo '<option value="'.$row->id.'">'.$row->address.'</option>';
                }
            }
            else{
                
                echo '<option value="">Address not available</option>';
            }*/
        }
        
        public function refradd() 
        {
                $this->check_Loginin();
                
                $get_add = $this->Checkout_model->get_address_where($by_id=FALSE); // call address
                
                foreach($get_add as $row)
                {
                    echo '<option value="'.$row->id.'">'.$row->address.'</option>';
                }
                        
        }
        
        public function Payment()
	{
            $this->check_Loginin();
	
        
        $total = $_SESSION['total_cart']*100;
        $cardcode = $_POST['card_au'];
        if ( $_POST['paytype'] == 'delivery' )
            {
                $data_order = array(  
                                    'accountid'           =>   $_SESSION['User_id'],
                                    'reference'           =>   strtolower(substr(uniqid(sha1(time())),0,10)),
                                    'accountaddressid'    =>   $this->input->post('add_option'),
                                    //'vat'               =>   $this->input->post('vat'),
                                    //'additionalcharges' =>   $this->input->post('city_div'),
                                    //'discount'          =>   $this->input->post('state_div'),
                                    //'couponcode'        =>   $this->input->post('cell'),
                                    'deliverytype'        =>   'On Delivery ',
                                    'totalordervalue'     =>  $_SESSION['total_cart'],
                                    'status'              => 1
                                 );
                $get_orderid = $this->Checkout_model->saveorder($data_order); // save orders to db
                $this->Checkout_model->saveorderproduct($get_orderid); // save orders Product to db

                    $this->success_payondelivery();
            }
            
        elseif ( $_POST['paytype'] == 'card' ) 
            {
                if ( $_POST['card_au'] != '0' )
                {   
                  //$get_orderid = $this->Checkout_model->update_orders('delxrbjoi9p4k2m');
                  //echo print("<pre>".print_r($get_orderid,true)."</pre>");
                  //die;
                    $response = $this->paystack->transaction->charge([
                                    'authorization_code'=> $_POST['card_au'],
                                    'amount'=> $total,
                                    'email'=> $this->session->userdata('Email'),
                                    //'subaccount'=>   'ACCT_hveknjddxjpe0qg',
                                    //'transaction_charge'=>   5000,
                                    //'bearer'=>   'subaccount'
                                  ]);
                    print("<pre>".print_r($response,true)."</pre>");die;
                    if($response)
                    {

                        $data_order = array(  
                                            'accountid'         =>   $_SESSION['User_id'],
                                            'reference'         =>   $response->data->reference,
                                            'accountaddressid'  =>   $this->input->post('add_option'),
                                            //'vat'               =>   $this->input->post('vat'),
                                            //'additionalcharges' =>   $this->input->post('city_div'),
                                            //'discount'          =>   $this->input->post('state_div'),
                                            //'couponcode'        =>   $this->input->post('cell'),
                                            'deliverytype'      =>   'Card',
                                            'totalordervalue'    =>  $this->session->userdata('total_cart'),
                                            'status'             => 1
                                         );

                    $get_orderid = $this->Checkout_model->saveorder($data_order); // save orders to db and return id
                    $data_orderproduct=$this->Checkout_model->saveorderproduct($get_orderid); // save orders Product to db

                    $this->success($response);
                    }
                }
                else 
                {
                    $response = $this->paystack->transaction->initialize([
                                    'amount'=>  $total,
                                    'email'=>   $this->session->userdata('Email'),
                                    //'subaccount'=>   'ACCT_hveknjddxjpe0qg',
                                    //'transaction_charge'=>   5000,
                                    //'bearer'=>   'subaccount'
                                  ]);
                    //print("<pre>".print_r($response,true)."</pre>");die;
                    if($response){

                    $data_order = array(  
                                            'accountid'         =>   $_SESSION['User_id'],
                                            'reference'         =>   $response->data->reference,
                                            'accountaddressid'  =>   $this->input->post('add_option'),
                                            //'vat'               =>   $this->input->post('vat'),
                                            //'additionalcharges' =>   $this->input->post('city_div'),
                                            //'discount'          =>   $this->input->post('state_div'),
                                            //'couponcode'        =>   $this->input->post('cell'),
                                            'deliverytype'      =>   'Card',
                                            'totalordervalue'    =>  $this->session->userdata('total_cart'),
                                         );

                   // $this->Checkout_model->saveorder($data_order); // save orders to db
                    redirect($response->data->authorization_url);
                    }



                }
        
            }
		
	}
        public function payment_verification()
	{
            $this->check_Loginin();
            
            $reference = isset($_GET['trxref']) ? $_GET['reference'] : '';
            if(!$reference){
              die('No reference supplied');
            }
            
    
            //$this->paystack->transaction->verify($reference) will return an array of verification details or FALSE on failure
            $ver_info = $this->paystack->transaction->verify([
                                                            'reference'=>$reference, // unique to transactions
                                                          ]);
            $this->success($ver_info);
            /*
            if($ver_info && ($ver_info->status = TRUE) && ($ver_info->data->status == "success"))
            {
                
                
                
                $get_orderid = $this->Checkout_model->update_orders($reference); // update the order db ang get the id
                
                $data_orderproduct=$this->Checkout_model->saveorderproduct($get_orderid); // save orders Product to db
                
                if($data_orderproduct)  // if it saved
                {
                    
                    //do something with $auth_code. $auth_code can be used to charge the customer next time
                    //echo $auth_code;
                    //print("<pre>".print_r($ver_info,true)."</pre>");
                    
                    $this->success($ver_info);
                }
                
            
                
            }
            else
            {
                //do something else
            }
             * 
             */
        }
        
        public function success($code)
	{
            //$this->check_Loginin();
            //send email
            $auth_code = $code->data->authorization->authorization_code;
            $data['card_status'] = $this->Checkout_model->check_card($auth_code);
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-checkout';
            $data ['code']= $code;
            
            $data['cart_list'] = $this->cart->contents(); //load in the cart item
            $data['add_list'] = $this->get_address();
            
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/checkout_verify',$data);
            $this->load->view('included/footer', $data);
            
            $this->cart->destroy();
            unset($_SESSION['total_cart']);
        }
        
        public function success_payondelivery()
        {
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-checkout';
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/checkout_verify_delivery',$data);
            $this->load->view('included/footer', $data);
            
            $this->cart->destroy();
            unset($_SESSION['total_cart']);
        }
        
        
        public function check_Loginin()
	{
		
		$check_logged = $this->session->userdata('logged_in');
		$check_user = $this->session->userdata('Type');
			
		if(!isset($check_logged) || $check_logged != true || $check_user != 'User' || $this->cart->contents() != true)
		{
			//$this->index(); 
			redirect('restaurants', 'refresh');	
		}
		
	}
        
        
        
        
        
        public function savecard(){
            $data_card = array(  
                                    'accountid'         =>   $_SESSION['User_id'],
                                    'authorizationcode' =>   $_POST['auth_code'],
                                    'cardtype'          =>   $_POST['card_type'],
                                    'last4'             =>   $_POST['last4']
                                 );
            
            $this->Checkout_model->savecard($data_card); // save orders to db
        }
        
        public function savetosession(){
            $this->session->set_userdata('total_cart', $_POST['grandtotal']);
        }
        
     
	
}
