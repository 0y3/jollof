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
        $this->load->model('oye/Fashion_model');
        $this->load->model('oye/Account_model');
        $this->load->model('oye/Email_model'); // call in the emai;l model class
        $this->load->model('Generic');
        $this->load->model('utility');
        $this->load->helper('text');
	}
	
	public function index()
	{  
            $this->products();
            
	}
        
        public function check_cart()
	{
            if (count($this->cart->contents())<=0)
            {
                redirect('', 'refresh');
            }	
	}
        
    public function products()
	{  
            //$this->check_Loginin();
            $this->check_cart();
            
            $data['icon']       = 'jol_1.ico';
            $data['titel']      = 'Jollof:-Checkout';
            $data['meta_keyword']= 'Shopping,Cart, Checkout , Sales, Online, Homepage, ';
            $admininfo          = $this->Super_admin_model->get_admin_info();
            $data['info']       = $admininfo;
            $data['cuis_cate']  = $this->Restaurant_admin_model->get_allcuisaine_cate();
            $data ['vat']       = $admininfo->vat;
            
            $data['cart_list']  = $this->cart->contents(); //load in the cart item
            $data['state']   = $this->Account_model->get_state_where();
            $data['add_list'] = $this->get_address_();
            
            $by_userid = null;
            if( ( isset($_SESSION['Type']) && $_SESSION['Type'] =='User' ) && $_SESSION['logged_in']==true )
            {
                $by_userid=$_SESSION['User_id'];
                $data['account_info'] = $this->Checkout_model->get_account_info($by_userid);
                $data['add_card']   = $this->Checkout_model->get_card_id($by_userid);
            }
            
            
            $data_ = array();
            foreach($this->cart->contents() as $key => $items)
            {
                $sub_array[]=$items['rest'];
            }
            $sub_array = array_unique($sub_array);
            $restinfo=$this->Super_admin_model->_all_restaurant_data_where($sub_array);
            
            $data ['deliver_rest']= $restinfo;
            
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

            //print("<pre>".print_r($this->cart->contents(),true)."</pre>"); die;

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'oye_mainpage_v/checkout1 - Copy';

            $this->load->view('oye_mainpage_v/account_template',$data);
	}

    
    public function get_address_()
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
        $get_addres=$add_list;
        }
        else
        {
            $get_addres = $this->Checkout_model->get_address_where($by_id=FALSE); // call City by State
        }
        
        return $get_addres;
        
    }
    public function products_old()
	{  
            $this->check_Loginin();
            
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-checkout';
            $data['info']= $this->Super_admin_model->get_admin_info();
            $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
            $admininfo=$this->Super_admin_model->get_admin_info();
            $data ['vat']= $admininfo->vat;
            
            $data['cart_list'] = $this->cart->contents(); //load in the cart item
            $data['add_list'] = $this->get_address();
            $data['add_card'] = $this->Checkout_model->get_card_id($_SESSION['User_id']);
            
            $data_ = array();
            foreach($this->cart->contents() as $key => $items)
            {
                $sub_array[]=$items['rest'];
                //$data_[] = array('id'=>$items['rest']);
            }
            $sub_array = array_unique($sub_array);
            /*
            foreach($sub_array as $key => $items)
            {$data_[] = array('id'=>$items);}
            print("<pre>".print_r($data_,true)."</pre>");die;
             * 
             */
            //print("<pre>".print_r($sub_array,true)."</pre>");die;
            $restinfo=$this->Super_admin_model->_all_restaurant_data_where($sub_array);
            //print("<pre>".print_r($restinfo,true)."</pre>");die;
            
            
            $data ['deliver_rest']= $restinfo;
            
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/checkout',$data);
            $this->load->view('included/footer', $data);
	}
        
        public function get_deliveryfee()
        {
            //$this->check_Loginin();
            $data_get='';
            $data_charge=0;
            $get_fee = $this->Checkout_model->get_deliveryfee_where($_POST["rest_id"],$_POST["city_id"]);//(3,483)
            if($get_fee)
            {
                if($get_fee[0]->freedelivieringstatusMerch==1)
                {
                   $data_get='<span class="label label-success"><b>Free</b></span>';
                   $data_charge=0;
                   
                }
                else
                {
                    $data_get='₦'.$get_fee[0]->delivieringchargesMerch;
                    $data_charge=$get_fee[0]->delivieringchargesMerch;
                }
                $get_fee[0]->delivieringchargesidMerch;
                $Json_resultSave = array (
                                    'status' => 1,
                                    'content' => $data_get,
                                    'charge' => $data_charge,
                                    'logistic' => $_POST["rest_id"]
                                    );
            }
            else
            {
                $get_fee=$this->Checkout_model->get_deliveryfeeadmin_where($_POST["city_id"]);
                if($get_fee && (!empty($get_fee[0]->delivieringchargesidAdmin)))
                {
                    if($get_fee[0]->freedelivieringstatusAdmin==1)
                    {
                       $data_get='<span class="label label-success">Free</span>';
                       $data_charge=0;

                    }
                    else
                    {
                        $data_get= '₦'.$get_fee[0]->delivieringchargesAdmin;
                        $data_charge=$get_fee[0]->delivieringchargesAdmin;
                    }
                    $Json_resultSave = array (
                                    'status' => 1,
                                    'content' => $data_get,
                                    'charge' => $data_charge,
                                    'logistic' => 'admin'
                                    );
                }
                else
                {
                    $get_fee=$this->Checkout_model->get_deliveryfeeadmin_where(0);
                    if($get_fee && (!empty($get_fee[0]->delivieringchargesidAdmin)))
                    {
                        if($get_fee[0]->freedelivieringstatusAdmin==1)
                        {
                           $data_get='<span class="label label-success">Free</span>';
                           $data_charge=0;

                        }
                        else
                        {
                            $data_get= '₦'.$get_fee[0]->delivieringchargesAdmin;
                            $data_charge=$get_fee[0]->delivieringchargesAdmin;
                        }
                        $Json_resultSave = array (
                                        'status' => 1,
                                        'content' => $data_get,
                                        'charge' => $data_charge,
                                        'logistic' => 'admin'
                                        );
                    }
                    else{
                        $data_get="<span class='label label-danger'>Can not deliver</span>";
                        $Json_resultSave = array (
                                        'status' => 0,
                                        'content' => $data_get,
                                        'charge' => $data_charge
                                        );
                    }
                }
            }
            
            
            echo json_encode($Json_resultSave);
            exit();
            //print("<pre>".print_r($get_fee,true)."</pre>");die;
            
        }
        
        public function get_address()
        {  
            $by_userid = null;
            if(!empty($_SESSION['User_id']) )
            {
                $by_userid=$_SESSION['User_id'];
            }
            
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
                    echo '<option data-cityid="'.$row->cityid.'" data-stateid="'.$row->stateid.'" data-cityname="'.$row->cityname.'" data-statename="'.$row->statename.'" value="'.$row->id.'">'.$row->address.'</option>';
                }
                        
        }
        
    public function Payment()
	{
        //$this->check_Loginin();
        //print("<pre>".print_r($_SESSION,true)."</pre>");die;
	   if(empty($this->cart->contents()))
       {
        redirect('', 'refresh');
       }
        
        $total = $_SESSION['total_cart']*100;
        
        if($this->session->userdata('Type')=='User') //Registerd User
        {
            $cardcode = $_POST['card_au'];
            if ( $_POST['paytype'] == 'delivery' )
            {
                $data_order = array(  
                                    'accountid'           =>   $_SESSION['User_id'],
                                    'reference'           =>   strtolower(substr(uniqid(sha1(time())),0,10)),
                                    'accountaddressid'    =>   $this->input->post('add_option'),
                                    'vat'                 =>   $this->input->post('c_vat'),
                                    'deliveryfee'         =>   $this->input->post('deliv_total_fee'),
                                    //'additionalcharges' =>   $this->input->post('city_div'),
                                    //'discount'          =>   $this->input->post('state_div'),
                                    //'couponcode'        =>   $this->input->post('cell'),
                                    'deliverytype'        =>   'On Delivery ',
                                    'totalordervalue'     =>  $_SESSION['total_cart'],
                                    'status'              => 1
                                 );
                $get_orderid = $this->Checkout_model->saveorder($data_order); // save orders to db
                $insert_product= $this->Checkout_model->saveorderproduct($get_orderid); // save orders Product to db

                $this->jpoint($_SESSION['total_cart'],$_SESSION['User_id']); // add point to user
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
                                    'subaccount'=>   'ACCT_zf91xb2qujysmqc', //Stakle Account
                                    'transaction_charge'=>   $this->input->post('stakle'), //Stakle 8%
                                    //'bearer'=>   'subaccount'
                                  ]);
                     
                    /*
                    $pay = array(
                        (0) => Array
                            (
                                ('authorization_code') => $_POST['card_au'],
                                ('amount') => (1200)*100,
                                ('subaccount') => 'ACCT_hveknjddxjpe0qg', // Avip Studios 10%
                                ('bearer')  =>   'subaccount'
                            ),

                        (1) => Array
                            (
                                ('authorization_code') => $_POST['card_au'],
                                ('amount') => 1500*100,
                                ('subaccount') => 'ACCT_5edboqde6c5gvyk', // Avip Studios Logistic 0%
                                ('bearer')  =>   'subaccount'
                            ),

                        (2) => Array
                            (
                                ('authorization_code') => $_POST['card_au'],
                                ('amount') => 300*100,
                                ('subaccount') => 'ACCT_m5kk5d4mggoi8v5', // Bukka Huts 10%
                                ('bearer')  =>   'subaccount'
                            )
                    ); 
                    
                    foreach($pay as $store)
                    {
                        $response = array(); 
                        $response[] = $this->paystack->transaction->charge([
                                    'authorization_code'=> $store['authorization_code'],//$_POST['card_au'],
                                    'amount'=> $store['amount'],
                                    'email'=> $this->session->userdata('Email'),
                                    'subaccount'=>   $store['subaccount'],
                                    //'transaction_charge'=>   5000,
                                    'bearer'=>  $store['bearer']
                                  ]);
                    }
                    
                     * 
                     */
                    //print("<pre>".print_r($response,true)."</pre>");die;
                    //$response =true;
                    if($response)
                    {

                        $data_order = array(  
                                            'accountid'         =>   $_SESSION['User_id'],
                                            'reference'         =>   $response->data->reference,
                                            'accountaddressid'  =>   $this->input->post('add_option'),
                                            'vat'               =>   $this->input->post('c_vat'),
                                            'deliveryfee'       =>   $this->input->post('deliv_total_fee'),
                                            //'additionalcharges' =>   $this->input->post('city_div'),
                                            //'discount'          =>   $this->input->post('state_div'),
                                            //'couponcode'        =>   $this->input->post('cell'),
                                            'deliverytype'      =>   'Card',
                                            'totalordervalue'    =>  $this->session->userdata('total_cart'),
                                            'status'             => 1
                                         );
                    /*
                    $deliv_fee = $_POST['deliv_store_fee'];
                    $store_name = $_POST['store_name'];
                    $store_logistic = $_POST['store_logistic'];

                    foreach( $store_name as $key => $name ) {
                      print "<pre>The store id is ".$name.", store_logistic is ".$store_logistic[$key].
                            ", and deliv fee is ".$deliv_fee[$key].". Thank you\n</pre>";
                    }
                    die;
                     * 
                     */
                    $get_orderid = $this->Checkout_model->saveorder($data_order); // save orders to db and return id
                    $data_orderproduct=$this->Checkout_model->saveorderproduct($get_orderid); // save orders Product to db
                    //$data_logistic=$this->Checkout_model->savelogisticorderproduct($get_orderid); // save orders Product logistic to db

                    $this->jpoint($_SESSION['total_cart'],$_SESSION['User_id']); // add point to user
                    $this->success($response);
                    }
                }
                else 
                {
                    /*
                    $data_get = array();  
                    $pay = array(
                        (0) => Array
                            (
                                ('authorization_code') => $_POST['card_au'],
                                ('amount') => (1200)*100,
                                ('subaccount') => 'ACCT_hveknjddxjpe0qg', // Avip Studios 10%
                                ('bearer')  =>   'subaccount'
                            ),

                        (1) => Array
                            (
                                ('authorization_code') => $_POST['card_au'],
                                ('amount') => 1500*100,
                                ('subaccount') => 'ACCT_5edboqde6c5gvyk', // Avip Studios Logistic 0%
                                ('bearer')  =>   'subaccount'
                            ),

                        (2) => Array
                            (
                                ('authorization_code') => $_POST['card_au'],
                                ('amount') => 300*100,
                                ('subaccount') => 'ACCT_m5kk5d4mggoi8v5', // Bukka Huts 10%
                                ('bearer')  =>   'subaccount'
                            )
                    ); 
                    
                    foreach($pay as $store)
                    {
                        $response = array(); 
                        $response[] = $this->paystack->transaction->initialize([
                     
                                    'amount'=>  $store['amount'],
                                    'email'=>   $this->session->userdata('Email'),
                                    'subaccount'=>   $store['subaccount'],
                                    'bearer'=>  $store['bearer']
                                    //'subaccount'=>   'ACCT_hveknjddxjpe0qg',
                                    //'transaction_charge'=>   5000,
                                    //'bearer'=>   'subaccount'
                                  ]);
                        $data_get[]=$response;
                    }
                    print("<pre>".print_r($data_get,true)."</pre>");die;
                     * 
                     */
                    
                    $response = $this->paystack->transaction->initialize([
                     
                                    'amount'=>  $total,
                                    'email'=>   $this->session->userdata('Email'),
                                    'subaccount'=>   'ACCT_zf91xb2qujysmqc', //Stakle Account
                                    'transaction_charge'=>   $this->input->post('stakle'), //Stakle 8%
                                    //'bearer'=>   'subaccount'
                                  ]);
                     
                    
                    if($response){

                    $data_order = array(  
                                            'accountid'         =>   $_SESSION['User_id'],
                                            'reference'         =>   $response->data->reference,
                                            'accountaddressid'  =>   $this->input->post('add_option'),
                                            'vat'               =>   $this->input->post('c_vat'),
                                            'deliveryfee'       =>   $this->input->post('deliv_total_fee'),
                                            //'additionalcharges' =>   $this->input->post('city_div'),
                                            //'discount'          =>   $this->input->post('state_div'),
                                            //'couponcode'        =>   $this->input->post('cell'),
                                            'deliverytype'      =>   'Card',
                                            'totalordervalue'    =>  $this->session->userdata('total_cart'),
                                         );
                    $insert_data_ref = $this->Generic->add($data_order, $tablename="orders");// insert to db and return id

                    //$this->Checkout_model->saveorder($data_order); // save orders to db
                    //$this->Checkout_model->saveorderproduct($get_orderid); // save orders Product to db
                    //$get_orderid = $this->Checkout_model->saveorder($data_order); // save orders to db
                    //$insert_product= $this->Checkout_model->saveorderproduct($get_orderid); // save orders Product to db
                    //$this->jpoint($_SESSION['total_cart'],$_SESSION['User_id']); // add point to user
                    redirect($response->data->authorization_url);
                    }



                }
        
            }
        }
        else // Guest User
        {
            $check_data = array(  
                                    'email'         =>   $this->input->post('bill_email'),
                                    'usertype'      =>   'guest'
                                 );

            //save guest 
            $checkguestuser = $this->Account_model->_checkuser($check_data);
            if($checkguestuser)
            {
                $guestid= $checkguestuser;
            }
            else
            {
                $insert_data = array(  
                                    'firstname'     =>   $this->input->post('bill_firstname'),
                                    'lastname'      =>   $this->input->post('bill_lastname'),
                                    'email'         =>   $this->input->post('bill_email'),
                                    'phone'         =>   $this->input->post('bill_phone'),
                                    'usertype'      =>   'guest',
                                    'status'              => 0
                                 );
                $guestid = $this->Account_model->_insertguestuser($insert_data);
            }

            $insert_addressdata = array(  
                                    'accountid'     =>   $guestid,
                                    'firstname'     =>   $this->input->post('bill_firstname'),
                                    'lastname'      =>   $this->input->post('bill_lastname'),
                                    'phone'         =>   $this->input->post('bill_phone'),
                                    'address'       =>   $this->input->post('bill_address'),
                                    'cityid'        =>   $this->input->post('city'),
                                    'stateid'       =>   $this->input->post('state'),
                                 );

            // save address
            $guestaddressid = $this->Account_model->_address($insert_addressdata);
            //print("<pre>".print_r($guestaddressid,true)."</pre>");die;


            if ( $_POST['paytype'] == 'delivery' )
            {
                $data_order = array(  
                                    'accountid'           =>   $guestid,
                                    'reference'           =>   strtolower(substr(uniqid(sha1(time())),0,10)),
                                    'accountaddressid'    =>   $guestaddressid,
                                    'vat'                 =>   $this->input->post('c_vat'),
                                    'deliveryfee'         =>   $this->input->post('deliv_total_fee'),
                                    //'additionalcharges' =>   $this->input->post('city_div'),
                                    //'discount'          =>   $this->input->post('state_div'),
                                    //'couponcode'        =>   $this->input->post('cell'),
                                    'deliverytype'        =>   'On Delivery ',
                                    'totalordervalue'     =>  $_SESSION['total_cart'],
                                    'status'              => 1
                                 );
                $get_orderid = $this->Checkout_model->saveorder($data_order); // save orders to db
                $this->Checkout_model->saveorderproduct($get_orderid); // save orders Product to db

                $this->jpoint($_SESSION['total_cart'],$guestid); // add point to user
                $this->success_payondelivery();
            }
            
            elseif ( $_POST['paytype'] == 'card' ) 
            {
                $response = $this->paystack->transaction->initialize([
                 
                                'amount'=>  $total,
                                'email'=>   $this->input->post('bill_email'),
                                'subaccount'=>   'ACCT_zf91xb2qujysmqc', //Stakle Account
                                'transaction_charge'=>   $this->input->post('stakle'), //Stakle 8%
                                //'bearer'=>   'subaccount'
                              ]);
                 
                
                if($response)
                {

                $data_order = array(  
                                        'accountid'         =>   $guestid,
                                        'reference'         =>   $response->data->reference,
                                        'accountaddressid'  =>   $guestaddressid,
                                        'vat'               =>   $this->input->post('c_vat'),
                                        'deliveryfee'       =>   $this->input->post('deliv_total_fee'),
                                        //'additionalcharges' =>   $this->input->post('city_div'),
                                        //'discount'          =>   $this->input->post('state_div'),
                                        //'couponcode'        =>   $this->input->post('cell'),
                                        'deliverytype'      =>   'Card',
                                        'totalordervalue'    =>  $this->session->userdata('total_cart'),
                                     );

                    $this->Checkout_model->saveorder($data_order); // save orders to db
                    $this->jpoint($_SESSION['total_cart'],$guestid); // add point to user
                    redirect($response->data->authorization_url);
                }
            }
        }
		
	}

    public function layawaypayment()
    {
        //print("<pre>".print_r($_SESSION,true)."</pre>");die;
        
        $total = $_SESSION['total_cart']*100;
        
        if($this->session->userdata('Type')=='User') //Registerd User
        {
            $cardcode = $_POST['card_au'];
            $merchant = $this->Generic->getByFieldSingle('id', $this->input->post('merchant_id'), $tablename='restaurants'); // get merchant info
            $user = $this->Generic->getByFieldSingle('id', $_SESSION['User_id'], $tablename='accounts'); // get merchant info
           
            if ( $_POST['paytype'] == 'card' ) 
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
                                    'subaccount'=>   'ACCT_zf91xb2qujysmqc', //Stakle Account
                                    'transaction_charge'=>   $this->input->post('stakle'), //Stakle 8%
                                    //'bearer'=>   'subaccount'
                                  ]);
                     
                    
                    if($response)
                    {
                        print("<pre>".print_r($response,true)."</pre>");die;
                         $data_order = array(  
                                            'ordercode'         =>  'lAY-'.$this->utility->generate_random_string(12),
                                            'accountid'         =>  $_SESSION['User_id'],
                                            'accountaddressid'  =>  $this->input->post('add_option'),
                                            'productprice'      =>  $this->input->post('product_price'),
                                            'vat'               =>  $this->input->post('c_vat'),
                                            'durationweeks'     =>  $this->input->post('durationweeks'),
                                            'cancellationfee'   =>  $this->input->post('cancellationfee'),
                                            'servicefeepercent' =>  $this->input->post('servicefeepercent'),
                                            'servicefee'        =>  $this->input->post('servicefee'),
                                            'totallayawayprice' =>  $this->input->post('totallayawayprice'),
                                            'paymentplain'      =>  $this->input->post('paymentplain'),
                                            'amountperpaymentplain'=>$this->input->post('amoutperpaymentplain'),
                                            'deliveryfee'       =>  $this->input->post('deliv_total_fee'),
                                            'downpayment'       =>  $this->session->userdata('total_cart'),
                                            'platformid'        =>  2,
                                            'restaurantid'      =>  $this->input->post('merchant_id'),
                                            'productid'         =>  $this->input->post('product_id'),
                                            'productname'       =>  $this->input->post('product_name'),
                                            'quantity'          =>  $this->input->post('product_qty'),
                                            'color'             =>  $this->input->post('product_color'),
                                            'size'              =>  $this->input->post('product_size')
                                            //'status'            => 1
                                         );
                        $insert_data = $this->Generic->add($data_order, $tablename="orderlayaway");// insert to db and return id

                        $data_order = array(
                                            'layawayorder'      =>   1,  
                                            'layawayorderid'    =>   $insert_data,
                                            'reference'         =>   $response->data->reference,
                                            'accountid'         =>   $_SESSION['User_id'],
                                            'totalordervalue'   =>   $this->session->userdata('total_cart')
                                         );

                        $insert_data_ref = $this->Generic->add($data_order, $tablename="orders");// insert to db and return id

                        $this->Email_model->send_OrderConfirmation_email($ordercode,$user['firstname'], $user['lastname'], $user['email'], null ); // send the customer an email
                        $this->Email_model->send_Order_merchant_email($ordercode,$merchant['companyname'], $merchant['email'], null ); // send the Merchant an email

                        $this->success($response);
                    }
                }
                else 
                {
                    
                    $response = $this->paystack->transaction->initialize([
                     
                                    'amount'=>  $total,
                                    'email'=>   $this->session->userdata('Email'),
                                    'subaccount'=>   'ACCT_zf91xb2qujysmqc', //Stakle Account
                                    'transaction_charge'=>   $this->input->post('stakle'), //Stakle 8%
                                    //'bearer'=>   'subaccount'
                                  ]);
                     
                    
                    if($response){
                        //print("<pre>".print_r($response,true)."</pre>");die;
                        $ordercode = 'lAY-'.$this->utility->generate_random_string(12);

                         $data_order = array(  
                                            'ordercode'         =>  $ordercode,
                                            'accountid'         =>  $_SESSION['User_id'],
                                            'accountaddressid'  =>  $this->input->post('add_option'),
                                            'productprice'      =>  $this->input->post('product_price'),
                                            'vat'               =>  $this->input->post('c_vat'),
                                            'durationweeks'     =>  $this->input->post('durationweeks'),
                                            'cancellationfee'   =>  $this->input->post('cancellationfee'),
                                            'servicefeepercent' =>  $this->input->post('servicefeepercent'),
                                            'servicefee'        =>  $this->input->post('servicefee'),
                                            'totallayawayprice' =>  $this->input->post('totallayawayprice'),
                                            'paymentplain'      =>  $this->input->post('paymentplain'),
                                            'amountperpaymentplain'=>$this->input->post('amoutperpaymentplain'),
                                            'deliveryfee'       =>  $this->input->post('deliv_total_fee'),
                                            'downpayment'       =>  $this->session->userdata('total_cart'),
                                            'platformid'        =>  2,
                                            'restaurantid'      =>  $this->input->post('merchant_id'),
                                            'productid'         =>  $this->input->post('product_id'),
                                            'productname'       =>  $this->input->post('product_name'),
                                            'quantity'          =>  $this->input->post('product_qty'),
                                            'color'             =>  $this->input->post('product_color'),
                                            'size'              =>  $this->input->post('product_size')
                                         );
                        $insert_data = $this->Generic->add($data_order, $tablename="orderlayaway");// insert to db and return id

                        $data_order = array(
                                            'layawayorder'      =>   1,  
                                            'layawayorderid'    =>   $insert_data,
                                            'reference'         =>   $response->data->reference,
                                            'accountid'         =>   $_SESSION['User_id'],
                                            'deliverytype'      =>   'Card',
                                            'totalordervalue'   =>   $this->session->userdata('total_cart')
                                         );
                        $insert_data_ref = $this->Generic->add($data_order, $tablename="orders");// insert to db and return id

                        
                    
                        redirect($response->data->authorization_url);
                    }



                }
        
            }
        }
        
        
    }
    public function payment_verification()
	{
            //$this->check_Loginin();
            
            $reference = isset($_GET['trxref']) ? $_GET['reference'] : '';
            if(!$reference){
              die('No reference supplied');
            }
            
            $user = $this->Generic->getByFieldSingle('id', $_SESSION['User_id'], $tablename='accounts'); // get merchant info

            //$this->paystack->transaction->verify($reference) will return an array of verification details or FALSE on failure
            $ver_info = $this->paystack->transaction->verify([
                                                            'reference'=>$reference, // unique to transactions
                                                          ]);
            print("<pre>".print_r($ver_info,true)."</pre>");die;
            
            //$this->success($ver_info);
            
            if($ver_info && ($ver_info->status = TRUE) && ($ver_info->data->status == "success"))
            {
                
                $ordersref = $this->Generic->getByFieldSingle('reference', $_GET['reference'], $tablename='orders'); // Get order details by Id
                $orderslayaway[] = $this->Generic->getByFieldSingle('id', $ordersref['layawayorderid'], $tablename='orderlayaway'); // Get layaway order details by Id

                if($ordersref)
                {
                    $data_order = array( 
                            'status' => 1
                        );
                    $this->Generic->edit($data_order,$ordersref['id'], $tablename="orders"); // update order db 

                        if($ordersref['layawayorder']==1) //check if it a layawayorder
                        {
                            $data_layaway = array( 
                                    'status' => 1
                                );
                            $this->Generic->edit($data_layaway,$ordersref['layawayorderid'], $tablename="orderlayaway"); // update layaway order db


                            $this->Email_model->send_OrderConfirmation_email($orderslayaway['ordercode'],$user['firstname'], $user['lastname'], $user['email'], null ); // send the customer an email
                            $this->Email_model->send_Order_merchant_email($orderslayaway['ordercode'],$merchant['companyname'], $merchant['email'], null ); // send the Merchant an email

                            $this->success($ver_info);
                        }
                        else
                        {
                            $insert_product= $this->Checkout_model->saveorderproduct($ordersref['id']); // save orders Product to db
                            $this->jpoint($_SESSION['total_cart'],$_SESSION['User_id']); // add point to user
                            $this->success($ver_info);
                        }
                }
                
                /*
                $get_orderid = $this->Checkout_model->update_orders($reference); // update the order db ang get the id
                
                $data_orderproduct=$this->Checkout_model->saveorderproduct($get_orderid); // save orders Product to db
                
                if($data_orderproduct)  // if it saved
                {
                    
                    //do something with $auth_code. $auth_code can be used to charge the customer next time
                    //echo $auth_code;
                    //print("<pre>".print_r($ver_info,true)."</pre>");
                    
                    $this->success($ver_info);
                }
                */
                
            
                
            }
            else
            {
                $this->paymentfailure();
            }
        }
        
        public function success_old($code)
	    {
            //$this->check_Loginin();
            //send email
            //$auth_code = $code->data->authorization->authorization_code;
            //$data['card_status'] = $this->Checkout_model->check_card($auth_code);
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-checkout';
            $data ['code']= $code;
            
            $data['cart_list'] = $this->cart->contents(); //load in the cart item
            $data['add_list'] = $this->get_address();
            
            $data['info']= $this->Super_admin_model->get_admin_info();
            $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();

            if(!empty($_SESSION['last_shopped_microsite']) )
            {
                $last_shoped = $_SESSION['last_shopped_microsite'];
            }
            else
            {
                $last_shoped = '';
            }
            $data['last_shoped'] =$last_shoped;
            
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/checkout_verify',$data);
            $this->load->view('included/footer', $data);
            
            $this->cart->destroy();
            unset($_SESSION['total_cart']);
            unset($_SESSION['last_shopped_microsite']);
        }

        public function jpoint($amount=null,$userid=null)
        {
            $getAll =$this->Generic->getAll($tablename='jpoints'); // Get jpoints
            $user = $this->Generic->getByFieldSingle('id', $userid, $tablename='accounts'); // Get user details by Id

            $point_gotten=null;
            foreach ($getAll as $key => $value)
            {
                # code...
                //print("<pre>".print_r('key = '.$key,true)."</pre>");
                //print("<pre>".print_r('minamount = '.$value['minamount'],true)."</pre>");
                if($amount >= $value['minamount']  && $amount <= $value['maxamount'] )
                {
                    $point_gotten= $value['jpoint'];
                }

            }

            if(empty($point_gotten))
            {
                if($amount > $value['minamount'])
                {
                    $point_gotten= $value['jpoint'];
                }
                else
                {
                    $point_gotten= 0;
                }

            }

            $point_gotten=(int)$user['point'] + (int)$point_gotten;
            //print("<pre>".print_r('user point b = '.$point_gotten,true)."</pre>"); die;
            //update user points

            $data_New = array(
                                'point'    =>   $point_gotten
                            );
                
                
            $data_update = $this->Generic->edit($data_New, (int)$userid, $tablename="accounts");
            if($data_update)
            {
                return true;
            }
            else
            {
                return FALSE;
            }
            /*
            $data_Where = array(  
                                    'id'  => (int)$userid,
                                    'email'    => (int)$user['email']
                                );
            $data_update = $this->Generic->editByConditions($data_New, $data_Where , $tablename="accounts"); 
            */

            //print("<pre>".print_r($getAll,true)."</pre>"); die;
        }
        public function success($code)
        {

            
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-checkout';
            $data['info']= $this->Super_admin_model->get_admin_info();
            $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
            $data ['code']= $code;
            $data['cart_list'] = $this->cart->contents(); //load in the cart item
            $data['add_list'] = $this->get_address();
            $data ['meta_keyword']= 'Shopping,Fashion,cuisine, Sales, Online, Homepage,checkout ';

            $check_logged = $this->session->userdata('logged_in');
            $check_user = $this->session->userdata('Type');

           
                
            if(!empty($_SESSION['last_shopped_microsite']) )
            {
                $last_shoped = $_SESSION['last_shopped_microsite'];
            
            
                if($last_shoped == 'cuisine')
                {
                    $data ['nav'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
                    $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_cuisine';
                }
                else if($last_shoped == 'fashion')
                {
                    $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                    $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
                    
                }
                else 
                {
                    $data ['nav'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
                    $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_cuisine';
                }
            }
            else
            {
                $last_shoped = 'fashion';
                $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
            }
            
            $data['last_shoped'] =$last_shoped;


            //print("<pre>".print_r($url_arrar,true)."</pre>"); die;
            
            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'oye_mainpage_v/checkout_verify';

            $this->load->view('oye_mainpage_v/account_template',$data);
            
            //$this->load->view('included/header', $data);
            //$this->load->view('oye_mainpage_v/checkout_verify',$data);
            //$this->load->view('included/footer', $data);
            
            $this->cart->destroy();
            unset($_SESSION['total_cart']);
            unset($_SESSION['last_shopped_microsite']);
        }
        
        public function success_payondelivery()
        {
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-checkout';
            $data ['meta_keyword']= 'Shopping,Fashion,cuisine, Sales, Online, Homepage,checkout ';
            $data['info']= $this->Super_admin_model->get_admin_info();
            $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();

            if(!empty($_SESSION['last_shopped_microsite']) )
            {
                $last_shoped = $_SESSION['last_shopped_microsite'];
            
            
                if($last_shoped == 'cuisine')
                {
                    $data ['nav'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
                    $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_cuisine';
                }
                else if($last_shoped == 'fashion')
                {
                    $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                    $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
                    
                }
                else 
                {
                    $data ['nav'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
                    $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_cuisine';
                }
            }
            else
            {
                $last_shoped = 'fashion';
                $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
            }
            
            $data['last_shoped'] =$last_shoped;
            
            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'oye_mainpage_v/checkout_verify';

            $this->load->view('oye_mainpage_v/account_template',$data);
            /*
            $this->load->view('oye_mainpage_v/account_template',$data);
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/checkout_verify_delivery',$data);
            $this->load->view('included/footer', $data);
            */
            
            $this->cart->destroy();
            unset($_SESSION['total_cart']);
            unset($_SESSION['last_shopped_microsite']);
        }
        
        
        public function check_Loginin()
    	{
    		
    		$check_logged = $this->session->userdata('logged_in');
    		$check_user = $this->session->userdata('Type');
    			
    		if(!isset($check_logged) || $check_logged != true || $check_user != 'User' || $this->cart->contents() != true)
    		{
    			//$this->index(); 
    			redirect('', 'refresh');	
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
        
        public function sample() {
            
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-checkout';
            $data['info']= $this->Super_admin_model->get_admin_info();
            $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
            
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/checkoutsample',$data);
            $this->load->view('included/footer', $data);
            
        }
     
	
}
