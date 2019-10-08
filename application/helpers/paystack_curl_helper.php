<?php
defined('BASEPATH') OR exit('Access Denied');//remove this line if not using with CodeIgniter
/**
 * Description of Paystack
 *
 * @author Amir <amirsanni@gmail.com>
 * @date 20-Dec-2016
 */
    /*
    protected $secret_key = $this->config->item('paystack_key_test_secret');
    protected $public_key = $this->config->item('paystack_key_test_public');
   
    public function __construct($data) {
        $this->secret_key = $this->config->item('paystack_key_test_secret');//$data['secret_key'];
        $this->public_key = $this->config->item('paystack_key_test_public');//$data['public_key'];
    }
    */
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /**
     * 
     * @param string $url url to call
     * @param boolean $use_post Whether to use POST as request method or not
     * @param array $post_data an array of post data
     * @param $use_customRequest = 'PUT'or'DELETE'
     * @return type
     */
    function curl($url, $use_post, $post_data=[],$use_customRequest=null){

        $ci = get_instance();
        $ci->config->item('paystack_key_test_secret');

        $curl = curl_init();
        
        $headers = [
            "Authorization: Bearer {$ci->config->item('paystack_key_test_secret')}",
            'Content-Type: application/json'
        ];
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        
        if($use_post){
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post_data));
        }
        if($use_put){
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $use_customRequest);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post_data));
        }
        //Modify this two lines to suit your needs
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);
        $response = curl_exec($curl);
        curl_close($curl);
        
        return $response;
    }


    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /**
     * 
     * @param string $ref Transaction Reference
     * @param int $amount_in_kobo Amount to be paid (in kobo)
     * @param string $email Customer's email address
     * @param array $metadata_arr An array of metadata to add to transaction
     * @param string $callback_url URL to call in case you want to overwrite the callback_url set on your paystack dashboard
     * @param boolean $return_obj Whether to return the whole Object or just the authorisation URL
     * @return boolean
     */
    function init($ref, $amount_in_kobo, $email, $metadata_arr=[], $callback_url="", $return_obj=false){        
        if($ref && $amount_in_kobo && $email){
            //https://api.paystack.co/transaction/initialize
            $url = "https://api.paystack.co/transaction/initialize/";
                
            $post_data = [
                'reference'=>$ref,
                'amount'=>$amount_in_kobo,
                'email'=>$email,
                'metadata'=>json_encode($metadata_arr),
                'callback_url'=>$callback_url
            ];
            
            //curl($url, $use_post, $post_data=[])
            $response = $this->curl($url, TRUE, $post_data);
            
            if($response){                
                //return the whole Object if $return_obj is true, otherwise return just the authorization_url
                return $return_obj ? json_decode($response) : json_decode($response)->data->authorization_url;
            }
            
            //api request failed
            return FALSE;
        }
        
        return FALSE;
    }
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /**
     * 
     * @param int $amount_in_kobo Amount to be paid (in kobo)
     * @param string $email Customer's email address
     * @param string $plan Plan to subscribe user to
     * @param array $metadata_arr An array of metadata to add to transaction
     * @param string $callback_url URL to call in case you want to overwrite the callback_url set on your paystack dashboard
     * @param boolean $return_obj Whether to return the whole Object or just the authorisation URL
     */
    function initSubscription($amount_in_kobo, $email, $plan, $metadata_arr=[], $callback_url="", $return_obj=false){        
        if($amount_in_kobo && $email && $plan){
            //https://api.paystack.co/transaction/initialize
            $url = "https://api.paystack.co/transaction/initialize/";
                
            $post_data = [
                'amount'=>$amount_in_kobo,
                'email'=>$email,
                'plan'=>$plan,
                'metadata'=>json_encode($metadata_arr),
                'callback_url'=>$callback_url
            ];
            //curl($url, $use_post, $post_data=[])
            $response = $this->curl($url, TRUE, $post_data);
            
            if($response){                
                //return the whole decoded object if $return_obj is true, otherwise return just the authorization_url
                return $return_obj ? json_decode($response) : json_decode($response)->data->authorization_url;
            }
            
            //api request failed
            return FALSE;
        }
        
        return FALSE;
    }	
	
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /**
     * 
     * @param type $transaction_reference
     * @return array
     */
    function verifyTransaction($transaction_reference){
        //https://api.paystack.co/transaction/verify/:reference
        $url = "https://api.paystack.co/transaction/verify/".$transaction_reference;
        
        //curl($url, $use_post, $post_data=[])
        return json_decode($this->curl($url, FALSE));
    }
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    function chargeReturningCustomer($auth_code, $amount_in_kobo, $email, $ref="", $metadata_arr=[]){
        
        if($auth_code && $amount_in_kobo && $email){
            //https://api.paystack.co/transaction/charge_authorization
            $url = "https://api.paystack.co/transaction/charge_authorization/";
                
            $post_data = [
                'authorization_code'=>$auth_code,
                'amount'=>$amount_in_kobo,
                'email'=>$email,
                'reference'=>$ref,
                'metadata'=>json_encode($metadata_arr)
            ];
            //curl($url, $use_post, $post_data=[])
            $response = $this->curl($url, TRUE, $post_data);
            
            if($response){                
                //return the whole json decoded object 
                return json_decode($response);
            }
            
            //api request failed
            return FALSE;
        }
        
        //required fields are not set
        return FALSE;
    }
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /**
     * 
     * @param string $email
     * @param string $first_name
     * @param string $last_name
     * @param string $phone
     * @param Array $meta
     * @return boolean
     */
    function createCustomer($email, $first_name='', $last_name='', $phone='', $meta=[]){
        //https://api.paystack.co/customer
        $url = "https://api.paystack.co/customer";
        
        if($email && $url){
            $post_data = [
                'email'=>$email,
                'first_name'=>$first_name,
                'last_name'=>$last_name,
                'phone'=>$phone,
                'metadata'=>json_encode($meta)
            ];
            
            //curl($url, $use_post, $post_data=[])
            $response = $this->curl($url, TRUE, $post_data);
            
            //decode the response
            $data = json_decode($response);
            
            if($data && $data->status){                
                //return customer_code and ID
                return ['customer_id'=>$data->data->id, 'customer_code'=>$data->data->customer_code];
            }
            
            //api request failed
            return FALSE;
        }
        
        //required fields are not set
        return FALSE;
    }


    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /**
     * 
     * @param string $business_name
     * @param string $settlement_bank
     * @param string $account_number
     * @param string $percentage_charge
     * @param string $primary_contact_email
     * @param string $primary_contact_name
     * @param string $primary_contact_phone
     * @param Array $meta
     * @return boolean
     */

    function createSubaccount($dataSubaccount= array(), $meta=[]){
        //https://api.paystack.co/subaccount
        $url = "https://api.paystack.co/subaccount";
        
        if($dataSubaccount && $url){
            $post_data = [
                'business_name'=>   $dataSubaccount["store_accountName"],
                'settlement_bank'=> $dataSubaccount["store_bankName"],
                'account_number'=>  $dataSubaccount["store_accountNo"],
                'percentage_charge'=>   $dataSubaccount["percharge"],
                'primary_contact_email'=>   $dataSubaccount['email'],
                'primary_contact_name'=>   $dataSubaccount["store_name"],
                'primary_contact_phone'=>   $dataSubaccount["store_phone1"],
                'metadata'=>json_encode($meta)
            ];
            
            //curl($url, $use_post, $post_data=[])
            $response = curl($url, TRUE, $post_data);
            
            //decode the response
            $data = json_decode($response);
            //print("<pre>".print_r($response,true)."</pre>");//die;
            
            if($data && $data->status){                
                //return customer_code and ID
                //return ['settlement_bank'=>$data->data->settlement_bank, 'subaccount_code'=>$data->data->subaccount_code];
                 return $data;
            }
            
            //api request failed
            return FALSE;
        }
        
        //required fields are not set
        return FALSE;
    }

    function updateSubaccount($id, $dataSubaccount= array(), $meta=[])
    {
        //https://api.paystack.co/subaccount/:id_or_slug
        $url = "https://api.paystack.co/subaccount/".$id;

        if($dataSubaccount && $url){
            $post_data = [
                'business_name'=>   $dataSubaccount["store_accountName"],
                'settlement_bank'=> $dataSubaccount["store_bankName"],
                'account_number'=>  $dataSubaccount["store_accountNo"],
                'primary_contact_email'=>   $dataSubaccount['email'],
                'primary_contact_name'=>   $dataSubaccount["store_name"],
                'primary_contact_phone'=>   $dataSubaccount["store_phone1"],
                'metadata'=>json_encode($meta)
            ];
            if(isset($dataSubaccount["percharge"]))
            {
                 $post_data['percentage_charge']= $dataSubaccount["percharge"];
            }
            
            //curl($url, $use_post, $post_data=[])
            $response = curl($url,FALSE,$post_data,'PUT');

            //decode the response
            $data = json_decode($response);
            print("<pre>".print_r($response,true)."</pre>");//die;
            
            if($data && $data->status){                
                //return customer_code and ID
                //return ['settlement_bank'=>$data->data->settlement_bank, 'subaccount_code'=>$data->data->subaccount_code];
                 return $data;
            }
            
            //api request failed
            return FALSE;
        }
        
        //required fields are not set
        return FALSE;
    }

    function bankList()
    {
        $url ="https://api.paystack.co/bank";
        $response = file_get_contents($url);

        //decode the response
        $data = json_decode($response,true);
        //print("<pre>".print_r($response,true)."</pre>");//die;
        return $data;
    }