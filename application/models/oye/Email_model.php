<?php

class Email_model extends CI_Model {

    private $DB_site_email = "email_templates";
    private $company_name = "jollof";
    private $admin_email = "segun@stakle.com";
    private $sda = "";
    private $ssl = "ssl://smtp.zoho.com";
    private $port_email = "465";
    private $logo = "jollof_logo.png";

    private $emailFrom= " noreply@jollof.com";


    function __construct()
    {
        parent::__construct();
        $this->load->model('Notifications');
    }

    function getEmailTemplate($templateName=null)
    {
        
        require_once('./application/libraries/mandrill-api/Mandrill.php');
        try 
        {
            $mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
            $name = 'Generic';
            $result = $mandrill->templates->info($templateName);
            return $result['code'];
            //$result = $mandrill->templates->getList();
            //return $result;
            
        } 
        catch(Mandrill_Error $e) 
        {
            // Mandrill errors are thrown as exceptions
            // echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            // throw $e;
        }
    }

    function send_registration_email($firstname, $lastname, $email, $token, $site_email, $logo)
    {
        $emailTemplateName= 'user welcome email';
        $emailSubject = 'Thank you for registering with us as a User';
        $url_confirm  = SITE_URL().'accounts/validationcallback/'.$token;

        $html_email = $this->getEmailTemplate($emailTemplateName);
        $html_email = str_replace("*|NAME|*", ucfirst($firstname) . ' ' . ucfirst($lastname), $html_email);
        $html_email = str_replace("*|URL|*", $url_confirm, $html_email);

        require_once('./application/libraries/mandrill-api/Mandrill.php');
        try
        {
            $mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
            $message = array(
                    'html' => $html_email,
                    'text' => 'Please view this message in an HTML compatible viewer',
                    'subject' => $emailSubject,
                    'from_email' => $this->emailFrom,
                    'from_name' => 'Jollof',
                    'to' => array(
                            array(
                                    'email' => $email,
                                    'name' => ucfirst($firstname) . ' ' . ucfirst($lastname),
                                    'type' => 'to'
                            )
                    ),
                    'headers' => array('Reply-To' => 'noreply@jollof.com'),
                    'important' => false,
                    'track_opens' => null,
                    'track_clicks' => null,
                    'auto_text' => null,
                    'auto_html' => null,
                    'inline_css' => null,
                    'url_strip_qs' => null,
                    'preserve_recipients' => null,
                    'view_content_link' => null,
                    'tracking_domain' => null,
                    'signing_domain' => null,
                    'return_path_domain' => null,
                );
            $async = false;
            $ip_pool = 'Main Pool';
            $result = $mandrill->messages->send($message, $async, $ip_pool);
            //$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);
            // print("<pre>".print_r('good '.$result,true)."</pre>"); die;
            return $result;
           
        } 
        catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            //echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            // throw $e;
            //print("<pre>".print_r('error '.$e,true)."</pre>"); die;
            return FALSE;
        }
    }

   

    // send the user a reset password email
    function send_password_reset_mail($name, $url, $email, $site_email, $logo)
    {
        $emailTemplateName= 'password reset';
        $emailSubject = 'Password Reset Confirmation for '.$name.'!';

        $html_email = $this->getEmailTemplate($emailTemplateName);
        $html_email = str_replace("*|NAME|*", $name, $html_email);
        $html_email = str_replace("*|URL|*", $url, $html_email);

        require_once('./application/libraries/mandrill-api/Mandrill.php');
        try
        {
            $mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
            $message = array(
                    'html' => $html_email,
                    'text' => 'Please view this message in an HTML compatible viewer',
                    'subject' => $emailSubject,
                    'from_email' => $this->emailFrom,
                    'from_name' => 'Jollof',
                    'to' => array(
                            array(
                                    'email' => $email,
                                    'name' => ucfirst($name),
                                    'type' => 'to'
                            )
                    ),
                    'headers' => array('Reply-To' => 'noreply@jollof.com'),
                    'important' => false,
                    'track_opens' => null,
                    'track_clicks' => null,
                    'auto_text' => null,
                    'auto_html' => null,
                    'inline_css' => null,
                    'url_strip_qs' => null,
                    'preserve_recipients' => null,
                    'view_content_link' => null,
                    'tracking_domain' => null,
                    'signing_domain' => null,
                    'return_path_domain' => null,
                );
            $async = false;
            $ip_pool = 'Main Pool';
            $result = $mandrill->messages->send($message, $async, $ip_pool);
            //$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);
            return $result;
        } 
        catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            //echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            // throw $e;
            return FALSE;
        }
    }

    
    function send_restaurant_registration_email($firstname, $lastname, $email, $site_email=null, $logo=null, $token,$store)
    {
        $emailTemplateName= 'merchants welcome email';
        $emailSubject = 'Thank you for registering with us as a Merchant';
        $url_confirm  = site_url().'merchant/validationcallback/'.$token;

        $html_email = $this->getEmailTemplate($emailTemplateName);
        $html_email = str_replace("*|NAME|*", ucfirst($firstname) . ' ' . ucfirst($lastname), $html_email);
        $html_email = str_replace("*|SITE_URL|*", base_url(), $html_email);
        $html_email = str_replace("*|STORENAME|*", $store, $html_email);
        $html_email = str_replace("*|URL|*", $url_confirm, $html_email);

        require_once('./application/libraries/mandrill-api/Mandrill.php');
        try
        {
            $mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
            $message = array(
                    'html' => $html_email,
                    'text' => 'Please view this message in an HTML compatible viewer',
                    'subject' => $emailSubject,
                    'from_email' => $this->emailFrom,
                    'from_name' => 'Jollof',
                    'to' => array(
                            array(
                                    'email' => $email,
                                    'name' => ucfirst($firstname) . ' ' . ucfirst($lastname),
                                    'type' => 'to'
                            )
                    ),
                    'headers' => array('Reply-To' => 'noreply@jollof.com'),
                    'important' => false,
                    'track_opens' => null,
                    'track_clicks' => null,
                    'auto_text' => null,
                    'auto_html' => null,
                    'inline_css' => null,
                    'url_strip_qs' => null,
                    'preserve_recipients' => null,
                    'view_content_link' => null,
                    'tracking_domain' => null,
                    'signing_domain' => null,
                    'return_path_domain' => null,
                );
            $async = false;
            $ip_pool = 'Main Pool';
            $result = $mandrill->messages->send($message, $async, $ip_pool);
            //$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);
            return $result;
        } 
        catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            //echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            // throw $e;
            return false;//$e->getMessage();
        }
    }

    

    // send the user a reset password email
    function send_restaurant_password_reset_mail($name, $url, $email, $site_email=null, $logo=null)
    {
        $emailTemplateName= 'Forgot Password Merchant';
        $emailSubject = 'Password Reset Confirmation for '.$name.'!';

        $html_email = $this->getEmailTemplate($emailTemplateName);
        $html_email = str_replace("*|NAME|*", $name, $html_email);
        $html_email = str_replace("*|URL|*", $url, $html_email);

        require_once('./application/libraries/mandrill-api/Mandrill.php');
        try
        {
            $mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
            $message = array(
                    'html' => $html_email,
                    'text' => 'Please view this message in an HTML compatible viewer',
                    'subject' => $emailSubject,
                    'from_email' => $this->emailFrom,
                    'from_name' => 'Jollof',
                    'to' => array(
                            array(
                                    'email' => $email,
                                    'name' => ucfirst($name),
                                    'type' => 'to'
                            )
                    ),
                    'headers' => array('Reply-To' => 'noreply@jollof.com'),
                    'important' => false,
                    'track_opens' => null,
                    'track_clicks' => null,
                    'auto_text' => null,
                    'auto_html' => null,
                    'inline_css' => null,
                    'url_strip_qs' => null,
                    'preserve_recipients' => null,
                    'view_content_link' => null,
                    'tracking_domain' => null,
                    'signing_domain' => null,
                    'return_path_domain' => null,
                );
            $async = false;
            $ip_pool = 'Main Pool';
            $result = $mandrill->messages->send($message, $async, $ip_pool);
            //$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);
            return $result;
        } 
        catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            //echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            // throw $e;
            return FALSE;
        }
    }


    function send_OrderConfirmation_email($order_no,$firstname, $lastname, $email, $site_email=NULL)
    {
        $emailTemplateName= 'Order confirmation';
        $emailSubject = 'An order have been made';

        $html_email = $this->getEmailTemplate($emailTemplateName);
        $html_email = str_replace("*|NAME|*", ucfirst($firstname) . ' ' . ucfirst($lastname), $html_email);
        $html_email = str_replace("*|SITE_URL|*", base_url(), $html_email);
        $html_email = str_replace("*|ORDERno|*", $order_no, $html_email);

        require_once('./application/libraries/mandrill-api/Mandrill.php');
        try
        {
            $mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
            $message = array(
                    'html' => $html_email,
                    'text' => 'Please view this message in an HTML compatible viewer',
                    'subject' => $emailSubject,
                    'from_email' => $this->emailFrom,
                    'from_name' => 'Jollof',
                    'to' => array(
                            array(
                                    'email' => $email,
                                    'name' => ucfirst($firstname) . ' ' . ucfirst($lastname),
                                    'type' => 'to'
                            )
                    ),
                    'headers' => array('Reply-To' => 'noreply@jollof.com'),
                    'important' => false,
                    'track_opens' => null,
                    'track_clicks' => null,
                    'auto_text' => null,
                    'auto_html' => null,
                    'inline_css' => null,
                    'url_strip_qs' => null,
                    'preserve_recipients' => null,
                    'view_content_link' => null,
                    'tracking_domain' => null,
                    'signing_domain' => null,
                    'return_path_domain' => null,
                );
            $async = false;
            $ip_pool = 'Main Pool';
            $result = $mandrill->messages->send($message, $async, $ip_pool);
            //$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);
            //return $result;
        } 
        catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            //echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            // throw $e;
            //return FALSE;
        }
    }

    function send_Order_merchant_email($order_no, $merchant_name, $email, $site_email=null)
    {
        $emailTemplateName= 'Merchant Order email';
        $emailSubject = 'An order have been made';

        $html_email = $this->getEmailTemplate($emailTemplateName);
        $html_email = str_replace("*|NAME|*", $merchant_name, $html_email);
        $html_email = str_replace("*|SITE_URL|*", base_url(), $html_email);
        $html_email = str_replace("*|ORDERno|*", $order_no, $html_email);

        require_once('./application/libraries/mandrill-api/Mandrill.php');
        try
        {
            $mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
            $message = array(
                    'html' => $html_email,
                    'text' => 'Please view this message in an HTML compatible viewer',
                    'subject' => $emailSubject,
                    'from_email' => $this->emailFrom,
                    'from_name' => 'Jollof',
                    'to' => array(
                            array(
                                    'email' => $email,
                                    'name' => ucfirst($merchant_name) ,
                                    'type' => 'to'
                            )
                    ),
                    'headers' => array('Reply-To' => 'noreply@jollof.com'),
                    'important' => false,
                    'track_opens' => null,
                    'track_clicks' => null,
                    'auto_text' => null,
                    'auto_html' => null,
                    'inline_css' => null,
                    'url_strip_qs' => null,
                    'preserve_recipients' => null,
                    'view_content_link' => null,
                    'tracking_domain' => null,
                    'signing_domain' => null,
                    'return_path_domain' => null,
                );
            $async = false;
            $ip_pool = 'Main Pool';
            $result = $mandrill->messages->send($message, $async, $ip_pool);
            //$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);
            //return $result;
        } 
        catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            //echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            // throw $e;
            //return FALSE;
        }
    }

    
    
    // send the New user email.
    function send_restaurant_User_email($firstname, $lastname,$email, $site_email=null, $logo=null,$store, $token,$pwd )
    {
        $emailTemplateName= 'new merchant user';
        $emailSubject = 'New User Role of a Manager at'. $store.' in jollof.com! ';
        $url_confirm  = base_url().'merchant/validationusers/'.$token;

        $html_email = $this->getEmailTemplate($emailTemplateName);
        $html_email = str_replace("*|NAME|*", ucfirst($firstname) . ' ' . ucfirst($lastname), $html_email);
        $html_email = str_replace("*|STORENAME|*", $store, $html_email);
        $html_email = str_replace("*|URL|*", $url_confirm, $html_email);
        $html_email = str_replace("*|PASSWORD|*", $pwd, $html_email);

        require_once('./application/libraries/mandrill-api/Mandrill.php');
        try
        {
            $mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
            $message = array(
                    'html' => $html_email,
                    'text' => 'Please view this message in an HTML compatible viewer',
                    'subject' => $emailSubject,
                    'from_email' => $this->emailFrom,
                    'from_name' => 'Jollof',
                    'to' => array(
                            array(
                                    'email' => $email,
                                    'name' => ucfirst($store) ,
                                    'type' => 'to'
                            )
                    ),
                    'headers' => array('Reply-To' => 'noreply@jollof.com'),
                    'important' => false,
                    'track_opens' => null,
                    'track_clicks' => null,
                    'auto_text' => null,
                    'auto_html' => null,
                    'inline_css' => null,
                    'url_strip_qs' => null,
                    'preserve_recipients' => null,
                    'view_content_link' => null,
                    'tracking_domain' => null,
                    'signing_domain' => null,
                    'return_path_domain' => null,
                );
            $async = false;
            $ip_pool = 'Main Pool';
            $result = $mandrill->messages->send($message, $async, $ip_pool);
            //$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);
            return $result;
        } 
        catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            //echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            // throw $e;
            return FALSE;
        }
    }


    function send_merchant_confirmed_mail($email, $site_email=null, $logo=null,$store,$storetype)
    {
        $emailTemplateName= 'Merchant Registration Approval Email';
        $emailSubject = 'Jollof Merchant Verifiation Confirmed';
        $url_confirm  = base_url().$storetype.'admin';

        $html_email = $this->getEmailTemplate($emailTemplateName);
        $html_email = str_replace("*|STORENAME|*", $store, $html_email);
        $html_email = str_replace("*|URL|*", $url_confirm, $html_email);

        require_once('./application/libraries/mandrill-api/Mandrill.php');
        try
        {
            $mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
            $message = array(
                    'html' => $html_email,
                    'text' => 'Please view this message in an HTML compatible viewer',
                    'subject' => $emailSubject,
                    'from_email' => $this->emailFrom,
                    'from_name' => 'Jollof',
                    'to' => array(
                            array(
                                    'email' => $email,
                                    'name' => ucfirst($store) ,
                                    'type' => 'to'
                            )
                    ),
                    'headers' => array('Reply-To' => 'noreply@jollof.com'),
                    'important' => false,
                    'track_opens' => null,
                    'track_clicks' => null,
                    'auto_text' => null,
                    'auto_html' => null,
                    'inline_css' => null,
                    'url_strip_qs' => null,
                    'preserve_recipients' => null,
                    'view_content_link' => null,
                    'tracking_domain' => null,
                    'signing_domain' => null,
                    'return_path_domain' => null,
                );
            $async = false;
            $ip_pool = 'Main Pool';
            $result = $mandrill->messages->send($message, $async, $ip_pool);
            //$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);
            return $result;
        } 
        catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            //echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            // throw $e;
            return FALSE;
        }
    }

    function send_tablereservation_user_email($bookingname,$bookingdate,$bookingtime,$store,$email)
    {
        $emailTemplateName= 'Table reservation';
        $emailSubject = '';

        $html_email = $this->getEmailTemplate($emailTemplateName);
        $html_email = str_replace("*|SITE_URL|*", base_url(), $html_email);
        $html_email = str_replace("*|STORENAME|*", $store, $html_email);
        $html_email = str_replace("*|NAME|*", $bookingname, $html_email);
        $html_email = str_replace("*|BDATE|*", $bookingdate, $html_email);
        $html_email = str_replace("*|BTIME|*", $bookingtime, $html_email);

        require_once('./application/libraries/mandrill-api/Mandrill.php');
        try
        {
            $mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
            $message = array(
                    'html' => $html_email,
                    'text' => 'Please view this message in an HTML compatible viewer',
                    'subject' => $emailSubject,
                    'from_email' => $this->emailFrom,
                    'from_name' => 'Jollof',
                    'to' => array(
                            array(
                                    'email' => $email,
                                    'name' => ucfirst($bookingname) ,
                                    'type' => 'to'
                            )
                    ),
                    'headers' => array('Reply-To' => 'noreply@jollof.com'),
                    'important' => false,
                    'track_opens' => null,
                    'track_clicks' => null,
                    'auto_text' => null,
                    'auto_html' => null,
                    'inline_css' => null,
                    'url_strip_qs' => null,
                    'preserve_recipients' => null,
                    'view_content_link' => null,
                    'tracking_domain' => null,
                    'signing_domain' => null,
                    'return_path_domain' => null,
                );
            $async = false;
            $ip_pool = 'Main Pool';
            $result = $mandrill->messages->send($message, $async, $ip_pool);
            //$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);
            //return $result;
        } 
        catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            //echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            // throw $e;
            //return FALSE;
        }
    }

    function send_tablereservation_merchant_email($bookingname,$bookingdate,$bookingtime,$store,$email)
    {
        $emailTemplateName= 'Merchant Table reservation';
        $emailSubject = '';

        $html_email = $this->getEmailTemplate($emailTemplateName);
        $html_email = str_replace("*|SITE_URL|*", base_url(), $html_email);
        $html_email = str_replace("*|STORENAME|*", $store, $html_email);
        $html_email = str_replace("*|NAME|*", $bookingname, $html_email);
        $html_email = str_replace("*|BDATE|*", $bookingdate, $html_email);
        $html_email = str_replace("*|BTIME|*", $bookingtime, $html_email);

        require_once('./application/libraries/mandrill-api/Mandrill.php');
        try
        {
            $mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
            $message = array(
                    'html' => $html_email,
                    'text' => 'Please view this message in an HTML compatible viewer',
                    'subject' => $emailSubject,
                    'from_email' => $this->emailFrom,
                    'from_name' => 'Jollof',
                    'to' => array(
                            array(
                                    'email' => $email,
                                    'name' => ucfirst($store) ,
                                    'type' => 'to'
                            )
                    ),
                    'headers' => array('Reply-To' => 'noreply@jollof.com'),
                    'important' => false,
                    'track_opens' => null,
                    'track_clicks' => null,
                    'auto_text' => null,
                    'auto_html' => null,
                    'inline_css' => null,
                    'url_strip_qs' => null,
                    'preserve_recipients' => null,
                    'view_content_link' => null,
                    'tracking_domain' => null,
                    'signing_domain' => null,
                    'return_path_domain' => null,
                );
            $async = false;
            $ip_pool = 'Main Pool';
            $result = $mandrill->messages->send($message, $async, $ip_pool);
            //$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);
            //return $result;
        } 
        catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            //echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            // throw $e;
            //return FALSE;
        }
    }

    function send_tablereservation_confirmation_email($bookingname,$bookingguest,$bookingdate,$bookingtime,$bookingcode,$bookingnote,$store,$storeaddress,$storeurl,$email)
    {
        $emailTemplateName= 'Table reservation approved';
        $emailSubject = 'Table reservation approved';

        $html_email = $this->getEmailTemplate($emailTemplateName);
        $html_email = str_replace("*|SITE_URL|*", $storeurl, $html_email);
        $html_email = str_replace("*|STORENAME|*", $store, $html_email);
        $html_email = str_replace("*|BADD|*", $storeaddress, $html_email);
        $html_email = str_replace("*|NAME|*", $bookingname, $html_email);
        $html_email = str_replace("*|BGUEST|*", $bookingguest, $html_email);
        $html_email = str_replace("*|BNOTE|*", $bookingnote, $html_email);
        $html_email = str_replace("*|BDATE|*", $bookingdate, $html_email);
        $html_email = str_replace("*|BTIME|*", $bookingtime, $html_email);
        $html_email = str_replace("*|BCODE|*", $bookingcode, $html_email);

        require_once('./application/libraries/mandrill-api/Mandrill.php');
        try
        {
            $mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
            $message = array(
                    'html' => $html_email,
                    'text' => 'Please view this message in an HTML compatible viewer',
                    'subject' => $emailSubject,
                    'from_email' => $this->emailFrom,
                    'from_name' => 'Jollof',
                    'to' => array(
                            array(
                                    'email' => $email,
                                    'name' => ucfirst($bookingname) ,
                                    'type' => 'to'
                            )
                    ),
                    'headers' => array('Reply-To' => 'noreply@jollof.com'),
                    'important' => false,
                    'track_opens' => null,
                    'track_clicks' => null,
                    'auto_text' => null,
                    'auto_html' => null,
                    'inline_css' => null,
                    'url_strip_qs' => null,
                    'preserve_recipients' => null,
                    'view_content_link' => null,
                    'tracking_domain' => null,
                    'signing_domain' => null,
                    'return_path_domain' => null,
                );
            $async = false;
            $ip_pool = 'Main Pool';
            $result = $mandrill->messages->send($message, $async, $ip_pool);
            //$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);
            //return $result;
        } 
        catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            //echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            // throw $e;
            //return FALSE;
        }
    }

    function send_tablereservation_rejected_email($bookingname,$bookingdate,$bookingtime,$store,$email,$note)
    {
        $emailTemplateName= 'Table reservation cancellation';
        $emailSubject = 'Table reservation cancellation';

        $html_email = $this->getEmailTemplate($emailTemplateName);
        $html_email = str_replace("*|STORENAME|*", $store, $html_email);
        $html_email = str_replace("*|NAME|*", $bookingname, $html_email);
        $html_email = str_replace("*|BDATE|*", $bookingdate, $html_email);
        $html_email = str_replace("*|BTIME|*", $bookingtime, $html_email);
        $html_email = str_replace("*|NOTE|*", $note, $html_email);

        require_once('./application/libraries/mandrill-api/Mandrill.php');
        try
        {
            $mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
            $message = array(
                    'html' => $html_email,
                    'text' => 'Please view this message in an HTML compatible viewer',
                    'subject' => $emailSubject,
                    'from_email' => $this->emailFrom,
                    'from_name' => 'Jollof',
                    'to' => array(
                            array(
                                    'email' => $email,
                                    'name' => ucfirst($bookingname) ,
                                    'type' => 'to'
                            )
                    ),
                    'headers' => array('Reply-To' => 'noreply@jollof.com'),
                    'important' => false,
                    'track_opens' => null,
                    'track_clicks' => null,
                    'auto_text' => null,
                    'auto_html' => null,
                    'inline_css' => null,
                    'url_strip_qs' => null,
                    'preserve_recipients' => null,
                    'view_content_link' => null,
                    'tracking_domain' => null,
                    'signing_domain' => null,
                    'return_path_domain' => null,
                );
            $async = false;
            $ip_pool = 'Main Pool';
            $result = $mandrill->messages->send($message, $async, $ip_pool);
            //$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);
            //return $result;
        } 
        catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            //echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            // throw $e;
            //return FALSE;
        }
    }


}
