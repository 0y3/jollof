<?php

class Email_model extends CI_Model {

    private $DB_site_email = "email_templates";
    private $company_name = "jollof";
    private $admin_email = "segun@stakle.com";
    private $sda = "Badguys007";
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

    public function generate_random_string($length)
    {
        $characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $randomString = '';
        for($i = 0; $i < $length; $i++){
            $randomString .= $characters[random_int(0,strlen($characters) - 1 )];
        }
        return $randomString;
        //echo $randomString;
    }

    public function send_registration_email($firstname, $lastname, $email, $token, $site_email, $logo) {

        $this->load->library('email');
        //$site_email       = "info@jollof.com"; 
        $company_name = "Jollof.com";

        //$site_css           = '<link href="'.base_url().'assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
        //                       <link href="'.base_url().'assets/css/emails.css" rel="stylesheet" type="text/css" />';

        $site_logo = base_url() . 'assets/img/' . $logo;
        
        $url_confirm  = base_url().'accounts/validationcallback/'.$token;
                 
        $voucher = 'You have been awarder with <span class="msg-mail-cnct"> {voucher} </span>voucher';

        /* send an email */
        // get the email template
        $res = $this->db->where('id', '1')->get($this->DB_site_email);
        $row = $res->row_array();

        // set replacement values for subject & body
        // {customer_name}	
        $row['subject'] = str_replace('{customer_name}', ucfirst($firstname) . ' ' . ucfirst($lastname), $row['subject']);
        $row['content'] = str_replace('{customer_name}', ucfirst($firstname) . ' ' . ucfirst($lastname), $row['content']);

        // {customer_email}		
        $row['subject'] = str_replace('{customer_email}', $email, $row['subject']);
        $row['content'] = str_replace('{customer_email}', $email, $row['content']);

        // {url}
        $row['subject'] = str_replace('{url}', base_url(), $row['subject']);
        

        $row['content'] = str_replace('{url_confirm}', $url_confirm, $row['content']);

        // {site_name}
        $row['subject'] = str_replace('{site_name}', $company_name, $row['subject']);
        $row['content'] = str_replace('{site_name}', $company_name, $row['content']);

        // {site_css}
        //$row['subject'] = str_replace('{site_css}', $site_css, $row['subject']);
        //$row['content'] = str_replace('{site_css}', $site_css, $row['content']);
        // {site_logo}
        $row['content'] = str_replace('{site_logo}', $site_logo, $row['content']);

        /* $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.gmail.com',
          'smtp_port' => 465,
          'smtp_user' => 'yourmail@gmail.com', // change it to yours
          'smtp_pass' => '***********', // change it to yours
          'mailtype' => 'html',
          'charset' => 'utf-8',
          'wordwrap' => TRUE
          );
         */


        $config['useragent'] = 'CodeIgniter';
        $config['protocol'] = 'smtp';
        $config['_smtp_auth'] = TRUE;
        
        $config['smtp_host'] = $this->ssl;
        $config['smtp_user'] = $this->admin_email;
        $config['smtp_pass'] = $this->sda;
        $config['smtp_port'] = $this->port_email;

        $config['charset'] = 'utf-8';//'iso-8859-1';
        $config['mailtype'] = 'html';
        $config['wordwrap'] = TRUE;
        //$config['wrapchars'] = 76;
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        //$config['bcc_batch_mode'] = TRUE;
        //$config['bcc_batch_size'] = '200';
        


        $this->email->initialize($config);
        //$this->email->set_newline("\r\n");

        $this->email->from($site_email, $company_name);
        $this->email->to($email);
        $this->email->subject($row['subject']);
        $this->email->message($row['content']);

        //$this->email->send();
        //print("<pre>".print_r($this->email->print_debugger(),true)."</pre>");//die;
        //return TRUE;

        if ($this->email->send()) {
            //Success email Sent
            return TRUE;
            //$this->email->print_debugger();
            //print("<pre>".print_r('sent',true)."</pre>");
            //die;
        } else {
            //Email Failed To Send
            //echo $this->email->print_debugger();
           //print("<pre>".print_r($this->email->print_debugger(),true)."</pre>");
            //die;
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
            throw $e;
            //return FALSE;
        }
    }
    // send the user a reset password email
    public function send_password_reset_maill($name, $url, $email, $site_email, $logo) {
        //$site_email       = "info@jollof.com"; 
        $company_name = "Jollof.com";

        $site_logo = base_url() . 'assets/img/' . $logo;

        // - get the email template



        $res = $this->db->where('id', '2')->get($this->DB_site_email);
        $row = $res->row_array();

        $row['content'] = $row['content'];

        // set replacement values for subject & body
        // {customer_name}
        $row['subject'] = str_replace('{customer_name}', $name, $row['subject']);
        $row['content'] = str_replace('{customer_name}', $name, $row['content']);

        // {url}
        $row['content'] = str_replace('{reset_link}', $url, $row['content']);

        // {site_name}
        $row['subject'] = str_replace('{site_name}', $company_name, $row['subject']);
        $row['content'] = str_replace('{site_name}', $company_name, $row['content']);

        // {site_logo}
        $row['content'] = str_replace('{site_logo}', $site_logo, $row['content']);

        /* $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.zoho.com',
          'smtp_port' => 465,
          'smtp_user' => 'segun@stakle.com', // change it to yours
          'smtp_pass' => 'Badguys007' // change it to yours
          'mailtype' => 'html',
          'charset' => 'utf-8',
          'wordwrap' => TRUE
          );
         */

        $config['useragent'] = "CodeIgniter";
        $config['protocol'] = "smtp";
        $config['_smtp_auth'] = TRUE;
        
        $config['smtp_host'] = $this->ssl;
        $config['smtp_user'] = $this->admin_email;
        $config['smtp_pass'] = $this->sda;
        $config['smtp_port'] = $this->port_email;
        
        $config['wordwrap'] = TRUE;
        //$config['wrapchars'] = 76;
        $config['mailtype'] = "html";
        $config['charset'] = "utf-8";
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        //$config['priority'] = 3;
        //$config['bcc_batch_mode'] = TRUE;
        // $config['bcc_batch_size'] = "200";
        //$config['mailtype'] = 'html';
        $this->email->initialize($config);

        $this->email->from($site_email, $company_name);

        $this->email->to($email);

        $this->email->subject($row['subject']);
        $this->email->message($row['content']);

        $this->email->send();
        if ($this->email->send()) {
            //Success email Sent
            return TRUE;
            //echo 'sent';
            //print("<pre>".print_r($row['content'],true)."</pre>");//die;
        } else {
            //Email Failed To Send
            //echo $this->email->print_debugger();
            //print("<pre>".print_r($this->email->print_debugger(),true)."</pre>");
            //die;
        }
    }

    public function send_restaurant_registration_email($firstname, $lastname, $email, $site_email, $logo,$token,$store) {
        //$site_email       = "info@jollof.com"; 
        $company_name = "Jollof.com";


        $site_logo = base_url() . 'assets/img/' . $logo;

        $url_confirm  = base_url().'merchant/validationcallback/'.$token;

        /* send an email */
        // get the email template
        $res = $this->db->where('id', '5')->get($this->DB_site_email);
        $row = $res->row_array();

        // set replacement values for subject & body
        // {customer_name}	
        $row['subject'] = str_replace('{customer_name}', ucfirst($firstname) . ' ' . ucfirst($lastname), $row['subject']);
        $row['content'] = str_replace('{customer_name}', ucfirst($firstname) . ' ' . ucfirst($lastname), $row['content']);

        // {customer_email}		
        $row['subject'] = str_replace('{customer_email}', $email, $row['subject']);
        $row['content'] = str_replace('{customer_email}', $email, $row['content']);

        // {url}
        $row['subject'] = str_replace('{url}', base_url(), $row['subject']);
        $row['content'] = str_replace('{url}', base_url(), $row['content']);
        
        // {store_name}
        $row['content'] = str_replace('{store_name}', $store, $row['content']);
        
        //{url_confirm} confirmation link
        $row['content'] = str_replace('{url_confirm}', $url_confirm, $row['content']);

        // {site_name}
        $row['subject'] = str_replace('{site_name}', $company_name, $row['subject']);
        $row['content'] = str_replace('{site_name}', $company_name, $row['content']);

        // {site_logo}
        $row['content'] = str_replace('{site_logo}', $site_logo, $row['content']);

        /*
        $config['useragent'] = "CodeIgniter";
        $config['protocol'] = "smtp";
        $config['_smtp_auth'] = TRUE;
        
        $config['smtp_host'] = $this->ssl;
        $config['smtp_user'] = $this->admin_email;
        $config['smtp_pass'] = $this->sda;
        $config['smtp_port'] = $this->port_email;
        
        $config['wordwrap'] = TRUE;
        //$config['wrapchars'] = 76;
        $config['mailtype'] = "html";
        $config['charset'] = "utf-8";
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";

        $this->email->initialize($config);

        $this->email->from($site_email, $company_name);
        $this->email->to($email);
        $this->email->subject($row['subject']);
        $this->email->message(html_entity_decode($row['content']));
        //$this->email->message(html_entity_decode($row['content']));

        $this->email->send();

        if($this->email->send()){
            echo 'sent';
        }else{
            //Email Failed To Send
            echo $this->email->print_debugger();
        }
        */


        $config['useragent'] = "CodeIgniter";
        $config['protocol'] = "smtp";
        $config['_smtp_auth'] = TRUE;
        
        $config['smtp_host'] = $this->ssl;
        $config['smtp_user'] = $this->admin_email;
        $config['smtp_pass'] = $this->sda;
        $config['smtp_port'] = $this->port_email;
        $config['wordwrap'] = TRUE;
        //$config['wrapchars'] = 76;

        $config['mailtype'] = "html";
        $config['charset'] = "iso-8859-1";
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        


        $this->email->initialize($config);

        $this->email->from($site_email, $company_name);
        $this->email->to($email);
        $this->email->subject($row['subject']);
        $this->email->message($row['content']);

        $this->email->send();

        $emailsent=$this->email->send();
        //return TRUE;

        if ($emailsent) {
            //Success email Sent
            //return TRUE;
            //$this->email->print_debugger();
            //print("<pre>".print_r('sent',true)."</pre>");die;
        } else {
            //Email Failed To Send
           // echo 'NOT SENT';
            //print("<pre>".print_r($this->email->print_debugger(),true)."</pre>");die;
        }
    }

    // send the user a reset password email
    public function send_restaurant_password_reset_mail($name, $url, $email, $site_email, $logo) {
        //$site_email       = "info@jollof.com"; 
        $company_name = "Jollof.com";

        $site_css = '<link href="' . base_url() . 'assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
                                       <link href="' . base_url() . 'assets/css/emails.css" rel="stylesheet" type="text/css" />';

        $site_logo = base_url() . 'assets/img/' . $logo;

        // - get the email template
        $res = $this->db->where('id', '6')->get($this->DB_site_email);
        $row = $res->row_array();

        $row['content'] = $row['content'];

        // set replacement values for subject & body
        // {customer_name}
        $row['subject'] = str_replace('{customer_name}', $name, $row['subject']);
        $row['content'] = str_replace('{customer_name}', $name, $row['content']);

        // {url}
        $row['content'] = str_replace('{reset_link}', $url, $row['content']);

        // {site_name}
        $row['subject'] = str_replace('{site_name}', $company_name, $row['subject']);
        $row['content'] = str_replace('{site_name}', $company_name, $row['content']);

        // {site_logo}
        $row['content'] = str_replace('{site_logo}', $site_logo, $row['content']);

        
        $config['useragent'] = "CodeIgniter";
        $config['protocol'] = "smtp";
        $config['_smtp_auth'] = TRUE;
        
        $config['smtp_host'] = $this->ssl;
        $config['smtp_user'] = $this->admin_email;
        $config['smtp_pass'] = $this->sda;
        $config['smtp_port'] = $this->port_email;
        
        $config['wordwrap'] = TRUE;
        //$config['wrapchars'] = 76;
        $config['mailtype'] = "html";
        $config['charset'] = "utf-8";
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";

        
        $this->email->initialize($config);

        $this->email->from($site_email, $company_name);
        $this->email->to($email);
        $this->email->subject($row['subject']);
        $this->email->message($row['content']);

        //$this->email->send();
        if ($this->email->send()) 
        {
            return TRUE;
        }
        else 
        {
            return FALSE;//"Could not send email, please try again later";
        }
    }
    public function send_OrderConfirmation_email($order_no,$firstname, $lastname, $email, $site_email) {
        //$site_email       = "info@jollof.com"; 
        $company_name = "Jollof.com";


        $site_logo = base_url() . 'assets/img/' .$this->logo;


        /* send an email */
        // get the email template
        $res = $this->db->where('id', '3')->get($this->DB_site_email);
        $row = $res->row_array();

        // set replacement values for subject & body
        //{order_no}
        $row['subject'] = str_replace('{order_no}', ucfirst($order_no) , $row['subject']);
        $row['content'] = str_replace('{order_no}', ucfirst($order_no), $row['content']);
        
        // {customer_name}	
        $row['subject'] = str_replace('{customer_name}', ucfirst($firstname) . ' ' . ucfirst($lastname), $row['subject']);
        $row['content'] = str_replace('{customer_name}', ucfirst($firstname) . ' ' . ucfirst($lastname), $row['content']);
        
        // {site_name}
        $row['subject'] = str_replace('{site_name}', $company_name, $row['subject']);
        $row['content'] = str_replace('{site_name}', $company_name, $row['content']);

        // {site_logo}
        $row['content'] = str_replace('{site_logo}', $site_logo, $row['content']);

        $config['useragent'] = "CodeIgniter";
        $config['protocol'] = "smtp";
        $config['_smtp_auth'] = TRUE;
        
        $config['smtp_host'] = $this->ssl;
        $config['smtp_user'] = $this->admin_email;
        $config['smtp_pass'] = $this->sda;
        $config['smtp_port'] = $this->port_email;
        
        $config['wordwrap'] = TRUE;
        //$config['wrapchars'] = 76;
        $config['mailtype'] = "html";
        $config['charset'] = "utf-8";
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";

        $this->email->initialize($config);

        $this->email->from($site_email, $company_name);
        $this->email->to($email);
        $this->email->subject($row['subject']);
        $this->email->message($row['content']);

        $this->email->send();
    }
    public function send_Order_merchant_email($order_no, $merchant_name, $email, $site_email) {
        //$site_email       = "info@jollof.com"; 
        $company_name = "Jollof.com";


        $site_logo = base_url() . 'assets/img/' .$this->logo;


        /* send an email */
        // get the email template
        $res = $this->db->where('id', '4')->get($this->DB_site_email);
        $row = $res->row_array();

        // set replacement values for subject & body
        //{order_no}
        $row['subject'] = str_replace('{order_no}', ucfirst($order_no) , $row['subject']);
        $row['content'] = str_replace('{order_no}', ucfirst($order_no), $row['content']);
        
        // {merchant_name}	
        $row['subject'] = str_replace('{merchant_name}', ucfirst($merchant_name) , $row['subject']);
        $row['content'] = str_replace('{merchant_name}', ucfirst($merchant_name) , $row['content']);
        
        // {site_name}
        $row['subject'] = str_replace('{site_name}', $company_name, $row['subject']);
        $row['content'] = str_replace('{site_name}', $company_name, $row['content']);

        // {site_logo}
        $row['content'] = str_replace('{site_logo}', $site_logo, $row['content']);

        $config['useragent'] = "CodeIgniter";
        $config['protocol'] = "smtp";
        $config['_smtp_auth'] = TRUE;
        
        $config['smtp_host'] = $this->ssl;
        $config['smtp_user'] = $this->admin_email;
        $config['smtp_pass'] = $this->sda;
        $config['smtp_port'] = $this->port_email;
        
        $config['wordwrap'] = TRUE;
        //$config['wrapchars'] = 76;
        $config['mailtype'] = "html";
        $config['charset'] = "utf-8";
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";

        $this->email->initialize($config);

        $this->email->from($site_email, $company_name);
        $this->email->to($email);
        $this->email->subject($row['subject']);
        $this->email->message($row['content']);

        $this->email->send();
    }
    
    
    // send the New user email 
    public function send_restaurant_User_email($firstname, $lastname,$email, $site_email, $logo,$store, $token ) {
        //$site_email       = "info@jollof.com"; 
        $company_name = "Jollof.com";

        $site_css = '<link href="' . base_url() . 'assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
                    <link href="' . base_url() . 'assets/css/emails.css" rel="stylesheet" type="text/css" />';

        $site_logo = base_url() . 'assets/img/'.$logo;

        $url_confirm  = base_url().'merchant/validationusers/'.$token;

        // - get the email template
        $res = $this->db->where('id', '7')->get($this->DB_site_email);
        $row = $res->row_array();

        $row['content'] = $row['content'];

        // set replacement values for subject & body
        // 
        // {customer_name}
        $row['content'] = str_replace('{customer_name}', ucfirst($firstname) . ' ' . ucfirst($lastname), $row['content']);
        
        // {customer_email}
        $row['content'] = str_replace('{customer_email}', $email, $row['content']);
        // {url_confirm}
        $row['content'] = str_replace('{url_confirm}', $url_confirm, $row['content']);
        
        

        // {store_name}
        $row['subject'] = str_replace('{store_name}', $store, $row['subject']);
        
        // {site_name}
        $row['subject'] = str_replace('{site_name}', $company_name, $row['subject']);
        $row['content'] = str_replace('{site_name}', $company_name, $row['content']);

        // {site_logo}
        $row['content'] = str_replace('{site_logo}', $site_logo, $row['content']);

        
        $config['useragent'] = "CodeIgniter";
        $config['protocol'] = "smtp";
        $config['_smtp_auth'] = TRUE;
        
        $config['smtp_host'] = $this->ssl;
        $config['smtp_user'] = $this->admin_email;
        $config['smtp_pass'] = $this->sda;
        $config['smtp_port'] = $this->port_email;
        
        $config['wordwrap'] = TRUE;
        //$config['wrapchars'] = 76;
        $config['mailtype'] = "html";
        $config['charset'] = "utf-8";
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        
        $this->email->initialize($config);

        $this->email->from($this->admin_email, $company_name);
        $this->email->to($email);
        $this->email->subject($row['subject']);
        $this->email->message($row['content']);
        //$this->email->send();

        if ($this->email->send()) 
        {
            return TRUE;
        }
        else 
        {
            return FALSE;//"Could not send email, please try again later";
        }
        /*
        if($this->email->send()){
            echo $this->email->print_debugger();
        }else{
            //Email Failed To Send
            echo $this->email->print_debugger();
        }
         * 
         */
        
    }

    public function send_merchant_confirmed_mail($email, $site_email, $logo,$store,$storetype) {
        //$site_email       = "info@jollof.com"; 
        $company_name = "Jollof.com";


        $site_logo = base_url() . 'assets/img/' . $logo;

        $url_confirm  = base_url().$storetype.'admin';

        /* send an email */
        // get the email template
        $res = $this->db->where('id', 8)->get($this->DB_site_email);
        $row = $res->row_array();

        // set replacement values for subject & body
        // {customer_name}  
        $row['subject'] = str_replace('{customer_name}', ucfirst($store) , $row['subject']);
        $row['content'] = str_replace('{customer_name}', ucfirst($store) , $row['content']);

        // {customer_email}     
        $row['subject'] = str_replace('{customer_email}', $email, $row['subject']);
        $row['content'] = str_replace('{customer_email}', $email, $row['content']);

        // {url}
        $row['subject'] = str_replace('{url}', base_url(), $row['subject']);
        $row['content'] = str_replace('{url}', base_url(), $row['content']);
        
        // {store_name}
        $row['content'] = str_replace('{store_name}', $store, $row['content']);
        
        //{url_confirm} confirmation link
        $row['content'] = str_replace('{url_confirm}', $url_confirm, $row['content']);

        // {site_name}
        $row['subject'] = str_replace('{site_name}', $company_name, $row['subject']);
        $row['content'] = str_replace('{site_name}', $company_name, $row['content']);

        // {site_logo}
        $row['content'] = str_replace('{site_logo}', $site_logo, $row['content']);

        $config['useragent'] = "CodeIgniter";
        $config['protocol'] = "smtp";
        $config['_smtp_auth'] = TRUE;
        
        $config['smtp_host'] = $this->ssl;
        $config['smtp_user'] = $this->admin_email;
        $config['smtp_pass'] = $this->sda;
        $config['smtp_port'] = $this->port_email;
        
        $config['wordwrap'] = TRUE;
        //$config['wrapchars'] = 76;
        $config['mailtype'] = "html";
        $config['charset'] = "utf-8";
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";


        $this->email->initialize($config);

        $this->email->from($site_email, $company_name);
        $this->email->to($email);
        $this->email->subject($row['subject']);
        $this->email->message($row['content']);

        //$this->email->send();
        if($this->email->send()){
           // echo $this->email->print_debugger();
            return TRUE;
        }else{
            //Email Failed To Send
            //echo $this->email->print_debugger();
            return FALSE;
        }
    }
    function send_tablereservation_user_email($bookingname,$bookingdate,$bookingtime,$store,$email)
    {
    }
    function send_tablereservation_merchant_email($bookingname,$bookingdate,$bookingtime,$store,$email)
    {
    }
    function send_tablereservation_confirmation_email($bookingname,$bookingdate,$bookingtime,$bookingcode,$store,$email)
    {
    }
    function send_tablereservation_rejected_email($bookingname,$bookingdate,$bookingtime,$store,$email)
    {
    }

}
