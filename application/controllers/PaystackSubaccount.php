<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaystackSubaccount extends CI_Controller {
	
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
        $this->Subaccount();
	}
        
    public function check_Loginin()
	{
		
		$check_logged = $this->session->userdata('logged_in');
		$check_user = $this->session->userdata('Type');
			
		if(!isset($check_logged) || $check_logged != true || $check_user != 'Admin' || $this->cart->contents() != true)
		{
			//$this->index(); 
			redirect('restaurants', 'refresh');	
		}
		
	}
        
    public function All_Subaccount()
    {
        $response = $this->paystack->subaccount->getList();
        print("<pre>".print_r($response,true)."</pre>");die;
         
    }
       
    public function All_Subaccount_byid()
    {
        $response = $this->paystack->subaccount->fetch([
                                'id'=> 'ACCT_ifzjkcgym9co3y4',
                            ]);
        print("<pre>".print_r($response,true)."</pre>");die;
         
    }

    public function New_Subaccount()
    {
        $response = $this->paystack->subaccount->create([
                                'business_name'=> $_POST["rest_name"],
                                'settlement_bank'=> $_POST["bank_name"],
                                'account_number'=> $_POST["acc_num"],
                                'percentage_charge'=>   $_POST["percentage"],
                                'primary_contact_name'=>   $_POST["acc_name"],
                                'primary_contact_email'=>   $_POST["rest_email"],
                                'primary_contact_phone'=>   $_POST["rest_num"]
                              ]);
        
        if($response->status)
        {
            $data_order = array(
                                'bankCode'    =>   $response->data->subaccount_code,
                                'bankName'    =>   $response->data->settlement_bank,
                                'accountNo'   =>   $response->data->account_number,
                                'percharge'   =>   $response->data->percentage_charge,
                                'perchargestatus'   =>   1
                             );
            
            $where = array('id'    =>      $_POST["rest_id"]);
            $data_update=$this->Super_admin_model->_update_restaurant_data($data_order,$where); // save  to db
            
            if($data_update)
            {
                $Json_resultSave = array ('status' => '1');
                echo json_encode($Json_resultSave);
                exit();
            } 
        }
         
    }
       
    public function Update_Subaccount()
    {
        $response = $this->paystack->subaccount->update([
                                'id'=> 'ACCT_hveknjddxjpe0qg',
                                'business_name'=> 'Avip Studios',
                                /*'settlement_bank'=> 'Guaranty Trust Bank',
                                'account_number'=> '0193274682',
                                'percentage_charge'=>   '5',
                                'primary_contact_name'=>   'OYE Express',
                                'primary_contact_email'=>   'trivin98@gmail.com ',
                                'primary_contact_phone'=>   '08080696623'*/
                              ]);
        print("<pre>".print_r($response,true)."</pre>");die;
         
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
        if(!$reference)
        {
            die('No reference supplied');
        }
            
    
        //$this->paystack->transaction->verify($reference) will return an array of verification details or FALSE on failure
        $ver_info = $this->paystack->transaction->verify(['reference'=>$reference]);
        $this->success($ver_info);
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
        
        
        
     
	
}
