<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Promos extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('role_assignment');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->model('promo');
        $this->load->model('user');
        $this->load->model('oye/Email_model'); // call in the email model class
        $this->load->helper('text');
    }
    
    public function index($page=0)
    {
        $this->b2bpromos ($existing_search=0, $page=0);
    }

    public function b2bpromos ($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "B2B Promos Review Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">B2B Promos</li>';
        $data['mainmenu'] = "promos";
        $data['submenu'] = "b2bpromos";
        
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
            
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
            if(  $this->input->get('status')!='' )
            {
                $filterparams['status'] = $this->input->get('status');
            }
            $this->session->set_userdata(array('search_params' => $filterparams));
            $existing_search = 1;
        }
        else if($existing_search == 1)
        {
            // if there is an existing search it means the parameters are already in the session
            $filterparams = $this->session->search_order_params;
        }
        // sanitize params and only pass along the ones with data
        foreach ($filterparams as $key => $value)
        {
            if ($value != '' && $value != NULL && $value != 'all')
                $query_params[$key] = $value;
        }
        
        // Set back any parameter so the filter forms can have the data searched
        $data['filterparams'] = $filterparams;
        
        $usertype= array('fashion','cuisine');
        // Load all the Merchants
        $data['promos'] = $this->promo->getAllPromo($query_params, $page, $usertype);
        $data['promoMerchant']  = $this->promo->getFashionCuisinePromoMerchant();
        $data['bannertype']  = $this->Generic->getByField($fieldname='status', $fieldvalue='1',$tablename='bannertype');

        // Get record count for pagination
        $all_count = $this->promo->getAllPromoCount($query_params,$usertype);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->promo->getAllPromo($query_params, $page, $usertype),true)."</pre>");die;
        $promotype_params = array('fashion'); // this is to get total pending B2B count
        $data['fashionPromo'] = $this->promo->getAllPromoCount(null,$promotype_params);
        
        $promotype_params = array('cuisine'); // this is to get total cancelled B2B count
        $data['cuisinePromo']  = $this->promo->getAllPromoCount(null,$promotype_params);

        $promotype_params = array('thirdparty'); // this is to get total cancelled B2B count
        $data['thirdpartyads']  = $this->promo->getAllPromoCount(null,$promotype_params);
        
        //print("<pre>".print_r($this->promo->getAllPromo($query_params, $page, $usertype),true)."</pre>");die;
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/promos/b2bpromos/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'promos-b2blist';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function thirdpartyads ($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Thirdparty Ads Promos Review Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Thirdparty Ads Promos</li>';
        $data['mainmenu'] = "promos";
        $data['submenu'] = "thirdpartyads";
        
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
            
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
            if(  $this->input->get('status')!='' )
            {
                $filterparams['status'] = $this->input->get('status');
            }
            $this->session->set_userdata(array('search_params' => $filterparams));
            $existing_search = 1;
        }
        else if($existing_search == 1)
        {
            // if there is an existing search it means the parameters are already in the session
            $filterparams = $this->session->search_order_params;
        }
        // sanitize params and only pass along the ones with data
        foreach ($filterparams as $key => $value)
        {
            if ($value != '' && $value != NULL && $value != 'all')
                $query_params[$key] = $value;
        }
        
        // Set back any parameter so the filter forms can have the data searched
        $data['filterparams'] = $filterparams;
        
        $usertype= array('thirdparty');
        // Load all the Merchants
        $data['promos'] = $this->promo->getAllPromo($query_params, $page, $usertype);
        $data['bannertype']  = $this->Generic->getByField($fieldname='status', $fieldvalue='1',$tablename='bannertype');

        // Get record count for pagination
        $all_count = $this->promo->getAllPromoCount($query_params,$usertype);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($query_params,true)."</pre>");die;
        $promotype_params = array('fashion'); // this is to get total pending B2B count
        $data['fashionPromo'] = $this->promo->getAllPromoCount(null,$promotype_params);
        
        $promotype_params = array('cuisine'); // this is to get total cancelled B2B count
        $data['cuisinePromo']  = $this->promo->getAllPromoCount(null,$promotype_params);

        $promotype_params = array('thirdparty'); // this is to get total cancelled B2B count
        $data['thirdpartyads']  = $this->promo->getAllPromoCount(null,$promotype_params);
        
        //print("<pre>".print_r($this->promo->getAllPromo($query_params, $page, $usertype),true)."</pre>");die;
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/promos/thirdpartyads/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'promos-thirdpartyads';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function settings ($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Promo Settings Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Promo Settings</li>';
        $data['mainmenu'] = "promos";
        $data['submenu'] = "settings";

        $data['displaysection'] = $this->Generic->getAll($tablename='bannertype', $limit=NULL, $fieldlist=null, $createdat=null, $updatedat=null, $orderbyfield='jollofsitetypeid');
        

        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->Generic->getAll($tablename='bannertype'),true)."</pre>");die;

        $data['displaysectioncount'] = $this->Generic->getAllCount('bannertype');
        
        $data['promodurationcount']  = $this->Generic->getAllCount('promo_duration');

        $data['promopricing']  = $this->Generic->getAllCount('promo_price');

        //print("<pre>".print_r($this->promo->getAllPromo($query_params, $page, $usertype),true)."</pre>");die;
        
        $data ['content_file']= 'promos-settingspromodisplay';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function settingspromoduration ($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Promo Settings Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/promos/settings").'">Promos Settings</a></li> <li class="breadcrumb-item active">Promo Duration</li>';
        $data['mainmenu'] = "promos";
        $data['submenu'] = "settings";
        
        $data['duration'] = $this->Generic->getAll($tablename='promo_duration', $limit=NULL, $fieldlist=null, $createdat=null, $updatedat=null, $orderbyfield='order');
        

        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->Generic->getAll($tablename='bannertype'),true)."</pre>");die;

        $data['displaysectioncount'] = $this->Generic->getAllCount('bannertype');
        
        $data['promodurationcount']  = $this->Generic->getAllCount('promo_duration');

        $data['promopricing']  = $this->Generic->getAllCount('promo_price');
        
        //print("<pre>".print_r($this->promo->getAllPromo($query_params, $page, $usertype),true)."</pre>");die;
        
        $data ['content_file']= 'promos-settingspromoduration';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function settingspromopricing ($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Promo Settings Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/promos/settings").'">Promos Settings</a></li> <li class="breadcrumb-item active">Promo Pricing</li>';
        $data['mainmenu'] = "promos";
        $data['submenu'] = "settings";

        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
            
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
            if(  $this->input->get('status')!='' )
            {
                $filterparams['status'] = $this->input->get('status');
            }
            $this->session->set_userdata(array('search_params' => $filterparams));
            $existing_search = 1;
        }
        else if($existing_search == 1)
        {
            // if there is an existing search it means the parameters are already in the session
            $filterparams = $this->session->search_order_params;
        }
        // sanitize params and only pass along the ones with data
        foreach ($filterparams as $key => $value)
        {
            if ($value != '' && $value != NULL && $value != 'all')
                $query_params[$key] = $value;
        }
        
        // Set back any parameter so the filter forms can have the data searched
        $data['filterparams'] = $filterparams;
        
        // Load all the promo pricings
        $data['pricing'] = $this->promo->getAllPromoPrice($query_params, $page);
        $data['bannertype']  = $this->Generic->getByField($fieldname='status', $fieldvalue='1',$tablename='bannertype');
        $data['duration'] = $this->Generic->getByField($fieldname='status', $fieldvalue='1',$tablename='promo_duration', $fieldlist=null, $createdat=null, $updatedat=null, $limit=NULL, $recordcount=null, $orderbyfield='order');  

        // Get record count for pagination
        $all_count = $this->promo->getAllPromoPriceCount($query_params);
        
        // Load stats
        $data['displaysectioncount'] = $this->Generic->getAllCount('bannertype');
        
        $data['promodurationcount']  = $this->Generic->getAllCount('promo_duration');

        $data['promopricing']  = $this->Generic->getAllCount('promo_price');
        
        //print("<pre>".print_r($this->promo->getAllPromoPrice($query_params, $page),true)."</pre>");die;
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/promos/settingspromopricing/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'promos-settingspromoprice';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function promopricing($id=null) 
    {
        $this->session_manager->validateJollofadmin("Promos::settingspromopricing");

         $data_ = array(
                    'bannertype'=>'general',
                    'status'    =>  1,
                    'isdeleted' => 0
                );
        $data['catelist']= $this->Generic->findByCondition($data_,'bannertype', $orderbyfield='bannertypename');

        $data_1 = array(
                'status'    =>  1,
                'isdeleted' => 0
            );
        $data['duraction']= $this->Generic->findByCondition($data_1,'promo_duration', $orderbyfield='order');
        
        if(!empty($id) )
        {
            $priceinfo = $this->Generic->getByFieldSingle('id', $id, $tablename='promo_price');
            if($priceinfo)
            {
               
                $data['priceinfo'] = $priceinfo;
                $data['pageheader'] = "Edit Promo Price";
                $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/promos/settings").'">Promos Settings</a></li>
                <li class="breadcrumb-item"><a href="'.site_url("jollofadmin/promos/settingspromopricing").'">Promo Pricing</a></li>
                <li class="breadcrumb-item active">Edit Promo Pricing</li>';
                $data['mainmenu'] = "promos";
                $data['submenu'] = "settings";

                //print("<pre>".print_r($priceinfo,true)."</pre>");die;
                $data ['content_file']= 'promos-settingspromopricenew';
                $this->load->view('jollof_admin/layout', $data);
            }
            else
            {
                redirect('jollofadmin/promos/settingspromopricing');
            }
        }
        else
        {
            $data['pageheader'] = "Create New Promo Price";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/promos/settings").'">Promos Settings</a></li>
            <li class="breadcrumb-item"><a href="'.site_url("jollofadmin/promos/settingspromopricing").'">Promo Pricing</a></li>
            <li class="breadcrumb-item active">New Promo Pricing</li>';
            $data['mainmenu'] = "promos";
            $data['submenu'] = "settings";

           
            $data ['content_file']= 'promos-settingspromopricenew';
            $this->load->view('jollof_admin/layout', $data);
        }
        
    }

    public function promopricingadd ()
    {
        $data_check = array(  
                                'bannertypeid'      =>  $_POST['bannertypeid'],
                                'promodurationid'  =>  $_POST["promodurationid"]
                             );
        $check_data = $this->Generic->findByCondition($data_check, $tablename="promo_price");// insert to db

        if($check_data)  
        { 
            $this->session->set_flashdata('warning','warning');
            $this->session->set_flashdata('message','Promo Price Already Register');
            $Json_resultSave = array (
                                  'status' => '0',
                                  'content' => 'Promo Price Already Register'
                                  );
            echo json_encode($Json_resultSave);
        }
        else
        {
            $data_New = array(  
                                'bannertypeid'      =>  $_POST['bannertypeid'],
                                'promodurationid'  =>  $_POST["promodurationid"],
                                'price'         =>  $_POST["price"],
                                'status'        =>  1
                             );
            $insert_data = $this->Generic->add($data_New, $tablename="promo_price");// insert to db

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Promo Price Saved');
                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => $imageName
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Adding New Promo Price');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
            }
        }
        redirect('jollofadmin/promos/promopricing');
    }

    public function promopricingedit ()
    {
        
            $data_New = array(  
                                'price'         =>  $_POST["price"],
                                'status'        =>  $_POST["status"]
                             );
             $data_Where = array(  
                                'id'         =>  $_POST["id"]
                             );
            $insert_data = $this->Generic->editByConditions($data_New, $data_Where , $tablename="promo_price"); 

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Promo Price Updated');
                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => $imageName
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updating Promo Price');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
            }
            redirect('jollofadmin/promos/promopricing/'.$_POST['id']);
    }
    
    public function promoduration($id=null) 
    {
        //$this->session_manager->validateJollofadmin("Promos::settingspromopricing");
        
        if(!empty($id) )
        {
            $durationinfo = $this->Generic->getByFieldSingle('id', $id, $tablename='promo_duration');
            if($durationinfo)
            {
               
                $data['durationinfo'] = $durationinfo;
                $data['pageheader'] = "Edit Promo Duration";
                $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/promos/settings").'">Promos Settings</a></li>
                <li class="breadcrumb-item"><a href="'.site_url("jollofadmin/promos/settingspromoduration").'">Promo Duration</a></li>
                <li class="breadcrumb-item active">Edit Promo Duration</li>';
                $data['mainmenu'] = "promos";
                $data['submenu'] = "settings";

                //print("<pre>".print_r($durationinfo,true)."</pre>");die;
                $data ['content_file']= 'promos-settingspromodurationenew';
                $this->load->view('jollof_admin/layout', $data);
            }
            else
            {
                redirect('jollofadmin/promos/settingspromoduration');
            }
        }
        else
        {
            $data['pageheader'] = "Create New Promo Duration";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/promos/settings").'">Promos Settings</a></li>
            <li class="breadcrumb-item"><a href="'.site_url("jollofadmin/promos/settingspromoduration").'">Promo Duration</a></li>
            <li class="breadcrumb-item active">New Promo Duration</li>';
            $data['mainmenu'] = "promos";
            $data['submenu'] = "settings";

           
            $data ['content_file']= 'promos-settingspromodurationenew';
            $this->load->view('jollof_admin/layout', $data);
        }
        
    }

    public function promodurationadd ()
    {
        $data_check = array(
                            'durationcount'  =>  $_POST["durationcount"],
                            'durationdate'   =>  $_POST['durationdate'],
                            'durationname'   =>  $_POST["durationcount"].' '.$_POST['durationdate'] 
                         );
        $check_data = $this->Generic->findByCondition($data_check, $tablename="promo_duration");// insert to db

        if($check_data)  
        { 
            $this->session->set_flashdata('warning','warning');
            $this->session->set_flashdata('message','Promo Duration Already Register');
            $Json_resultSave = array (
                                  'status' => '0',
                                  'content' => 'Promo Duration Already Register'
                                  );
            echo json_encode($Json_resultSave);
        }
        else
        {
            $data_New = array(  
                            'durationcount'  =>  $_POST["durationcount"],
                            'durationdate'   =>  $_POST['durationdate'],
                            'durationname'   =>  $_POST["durationcount"].' '.$_POST['durationdate'],
                            'status'        =>  1
                             );
            $insert_data = $this->Generic->add($data_New, $tablename="promo_duration");// insert to db

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Promo Duration Saved');
                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => $imageName
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Adding New Promo Duration');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
            }
        }
        redirect('jollofadmin/promos/promoduration');
    }

    public function promodurationedit ()
    {
        
            $data_New = array(  
                            'order'   =>  $_POST['order'],
                            'status'  =>  $_POST["status"]
                             );

            $data_Where = array(  
                                'id'         =>  $_POST["id"]
                             );
            $insert_data = $this->Generic->editByConditions($data_New, $data_Where , $tablename="promo_duration"); 

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Promo Duration Updated');
                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => $imageName
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updating Promo Duration');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
            }
            redirect('jollofadmin/promos/promoduration/'.$_POST['id']);
    }

    // Controller function to display the add user form
    public function addform()
    {
        
        //$this->session_manager->validateFashion(__METHOD__);
        
        $data['cate'] = $this->promo->promoSliderOptionCuisine($by_id=null,$platform=1);
        $data['promo_duration'] = $this->promo->promoDurationOption();
        $data['admin_info'] = $this->promo->adminInfo();
        
        $data['title_type']= 'New Promo Form';
        $data ['content_file']= 'promo_new';
        $data['pageheader'] = "Add Promo";
        $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/promos").'">Promos</a></li> <li class="breadcrumb-item active">Add Promo</li>';
        $data['mainmenu'] = "promos";
        $this->load->view('jollof_admin/layout', $data);
    }

    
    // Controller function to display the edit user form
    public function editform($id=null)
    {
        //$this->session_manager->validateJollofadmin(__METHOD__);
        
        if(!empty($id) )
        {
            $data['cate'] = $this->promo->promoSliderOptionCuisine($by_id=null,$platform=1);
            $data['promo_duration'] = $this->promo->promoDurationOption();
            $data['admin_info'] = $this->promo->adminInfo();
            $promoinfo = $this->promo->getByID($id);
            $data['promoprice'] = $this->promo->promoDurationByid($promoinfo->bannertypeid);
            $data['promoinfo'] = $promoinfo;
            
            //print("<pre>".print_r($this->promo->getByID($id),true)."</pre>");die;
            
            $data['title_type']= 'Edit Promo Form';
            $data ['content_file']= 'promo_new';
            $data['pageheader'] = "Edit Promo";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/promos").'">Promo</a></li> <li class="breadcrumb-item active">Edit Promo</li>';
            $data['mainmenu'] = "promos";
            $data['submenu'] = "b2bpromos";
            $this->load->view('jollof_admin/layout', $data);
        }
        else
        {
            redirect('jollofadmin/promo');
        }
        
        
    }

     public function editformthirdparty($id=null)
    {
        //$this->session_manager->validateJollofadmin(__METHOD__);
        
        if(!empty($id) )
        {
            $data['cate'] = $this->promo->promoSliderOptionCuisine($by_id=null,$platform=1);
            $data['promo_duration'] = $this->promo->promoDurationOption();
            $data['admin_info'] = $this->promo->adminInfo();
            $promoinfo = $this->promo->getThirdpartyByID($id);
            $data['promoprice'] = $this->promo->promoDurationByid($promoinfo->bannertypeid);
            $data['promoinfo'] = $promoinfo;
            
            //print("<pre>".print_r($this->promo->getThirdpartyByID($id),true)."</pre>");die;
            
            $data['title_type']= 'Edit Promo Form';
            $data ['content_file']= 'promo_new';
            $data['pageheader'] = "Edit Promo";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/promos").'">Promo</a></li> <li class="breadcrumb-item active">Edit Promo</li>';
            $data['mainmenu'] = "promos";
            $data['submenu'] = "b2bpromos";
            $this->load->view('jollof_admin/layout', $data);
        }
        else
        {
            redirect('jollofadmin/promo');
        }
        
        
    }

    // Controller fuction to save the user
    public function save()
    {
        // save the new Promo data  table //
        $cropimg_data = $_POST['cropimg'];
        // smth like:- data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

        $cropimg_remove_array1 = explode(";", $cropimg_data);
        // smth like:- base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

        $cropimg_remove_array2 = explode(",", $cropimg_remove_array1[1]);
        // smth like:- iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

        $cropimg = base64_decode($cropimg_remove_array2[1]);

        $imageName = 'promo_'.time() . '.png';

        $dir_to_save = "./assets/jollof_banners/fashionhompage_banner/";
        if (!is_dir($dir_to_save)) {
          mkdir($dir_to_save);
        }
        file_put_contents($dir_to_save.$imageName, $cropimg);
        
        
        
        $input_date=$_POST['promo_date'];
        $date_start=date("Y-m-d H:i:s",strtotime($input_date));
        
        $promo_duration = $this->promo->promodurationinfo($_POST['promo_duration']);
        
        if($promo_duration->durationname == '1 Day'){$date_end= date('Y-m-d H:i:s',strtotime('+1 day',$input_date));}
        else if($promo_duration->durationname == '1 Week') {$date_end= date('Y-m-d H:i:s',strtotime('+1 week',strtotime($input_date)));}
        else if($promo_duration->durationname == '1 Month'){$date_end= date('Y-m-d H:i:s',strtotime('+1 month',strtotime($input_date)));}
        else if($promo_duration->durationname == '3 Month'){$date_end= date('Y-m-d H:i:s',strtotime('+3 week',strtotime($input_date)));}
        else if($promo_duration->durationname == '6 Month'){$date_end= date('Y-m-d H:i:s',strtotime('+6 week',strtotime($input_date)));}
        else if($promo_duration->durationname == '1 Year') {$date_end= date('Y-m-d H:i:s',strtotime('+1 year',strtotime($input_date)));}
        
        $data_New = array(  
                            'imageurl'      =>  $_POST['promo_url'],
                            'imagename'     =>  $imageName,
                            'bannertypeid'  =>  $_POST["promotype"],
                            'promodurationid'=>  $_POST["promo_duration"],
                            'usertype'      =>  $this->session->Type,
                            'merchantid'    =>  $this->session->merchant_id,
                            'userid'        =>  $this->session->User_id,
                            'username'      =>  $this->session->companyname,
                            'payment'       =>  'FREE',
                            'startdate'     =>  $date_start,
                            'enddate'       =>  $date_end,
                            'status'        =>  0
                         );
        $insert_data = $this->Generic->add($data_New, $tablename="img_ads");// insert to db

        if($insert_data) 
        {
                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'Promo Saved');
                $Json_resultSave = array (
                                        'status' => '1',
                                        'content' => $imageName
                                        );
                echo json_encode($Json_resultSave);
                exit();
        }
        else 
        {       
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Adding New Promo');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                echo json_encode($Json_resultSave);
                exit();
        }
    }
    
    // Controller function to edit a specified user
    public function edit()
    {
        if(isset($_POST['cropimg'])&& !empty($_POST['cropimg']))
        {
        // save the new Promo data  table //
        $cropimg_data = $_POST['cropimg'];
        // smth like:- data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

        $cropimg_remove_array1 = explode(";", $cropimg_data);
        // smth like:- base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

        $cropimg_remove_array2 = explode(",", $cropimg_remove_array1[1]);
        // smth like:- iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

        $cropimg = base64_decode($cropimg_remove_array2[1]);

        $imageName = 'promo_'.time() . '.png';

        $dir_to_save = "./assets/jollof_banners/fashionhompage_banner/";
        if (!is_dir($dir_to_save)) {
          mkdir($dir_to_save);
        }
        file_put_contents($dir_to_save.$imageName, $cropimg);
        
        
        $input_date=$_POST['promo_date'];
        $date_start=date("Y-m-d H:i:s",strtotime($input_date));
        
        $promo_duration = $this->promo->promodurationinfo($_POST['promo_duration']);
        
        if($promo_duration->durationname == '1 Day'){$date_end= date('Y-m-d H:i:s',strtotime('+1 day',$input_date));}
        else if($promo_duration->durationname == '1 Week') {$date_end= date('Y-m-d H:i:s',strtotime('+1 week',strtotime($input_date)));}
        else if($promo_duration->durationname == '1 Month'){$date_end= date('Y-m-d H:i:s',strtotime('+1 month',strtotime($input_date)));}
        else if($promo_duration->durationname == '3 Month'){$date_end= date('Y-m-d H:i:s',strtotime('+3 week',strtotime($input_date)));}
        else if($promo_duration->durationname == '6 Month'){$date_end= date('Y-m-d H:i:s',strtotime('+6 week',strtotime($input_date)));}
        else if($promo_duration->durationname == '1 Year') {$date_end= date('Y-m-d H:i:s',strtotime('+1 year',strtotime($input_date)));}
        
        $data_New = array(  
                            'imageurl'      =>  $_POST['promo_url'],
                            'imagename'     =>  $imageName,
                            'bannertypeid'  =>  $_POST["promotype"],
                            'promodurationid'=>  $_POST["promo_duration"],
                            'usertype'      =>  $this->session->Type,
                            'merchantid'    =>  $this->session->merchant_id,
                            'userid'        =>  $this->session->User_id,
                            'username'      =>  $this->session->companyname,
                            'payment'       =>  'FREE',
                            'startdate'     =>  $date_start,
                            'enddate'       =>  $date_end,
                            'status'        =>  0
                         );
        }
        else
        {
        
            $input_date=$_POST['promo_date'];
            $date_start=date("Y-m-d H:i:s",strtotime($input_date));
            
            $promo_duration = $this->promo->promodurationinfo($_POST['promo_duration']);
        
            if($promo_duration->durationname == '1 Day'){$date_end= date('Y-m-d H:i:s',strtotime('+1 day',$input_date));}
            else if($promo_duration->durationname == '1 Week') {$date_end= date('Y-m-d H:i:s',strtotime('+1 week',strtotime($input_date)));}
            else if($promo_duration->durationname == '1 Month'){$date_end= date('Y-m-d H:i:s',strtotime('+1 month',strtotime($input_date)));}
            else if($promo_duration->durationname == '3 Month'){$date_end= date('Y-m-d H:i:s',strtotime('+3 week',strtotime($input_date)));}
            else if($promo_duration->durationname == '6 Month'){$date_end= date('Y-m-d H:i:s',strtotime('+6 week',strtotime($input_date)));}
            else if($promo_duration->durationname == '1 Year') {$date_end= date('Y-m-d H:i:s',strtotime('+1 year',strtotime($input_date)));}
        
        
            $data_New = array(  
                                'imageurl'      =>  $_POST['promo_url'],
                                'bannertypeid'  =>  $_POST["promotype"],
                                'promodurationid'=>  $_POST["promo_duration"],
                                'payment'       =>  'FREE',
                                'startdate'     =>  $date_start,
                                'enddate'       =>  $date_end,
                                'status'        =>  0
                             );

            $data_Where = array(  
                            'id'    => $this->input->post('promoid')
                         );

            // update to db
            $insert_data = $this->Generic->editByConditions($data_New, $data_Where , $tablename="img_ads"); 
        
        }
        if($insert_data)
            {
                $this->session->set_flashdata('success','Promo Info Updated');
                $this->session->set_flashdata('message', 'Promo Info Updated');
                $Json_resultSave = array ('status' => '1');
                echo json_encode($Json_resultSave);
                exit();

            }
        else {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updated Promo Info');
                $Json_resultSave = array ('status' => '0');
                echo json_encode($Json_resultSave);
                exit();
        }
    }
    // Controller function to delete a specified user
    public function delete()
    {
        $by_id = $_POST["_id"];
        $picture=$_POST["_name"];
        
        
        // delete to db
        $_data =$this->Generic->delete($by_id, $tablename="img_ads");
        if($_data)
        {   
            // delete image from folder
            $dir_to_delete = './assets/jollof_banners/'.$_POST["_type"].'_banner/';
            unlink($dir_to_delete.$picture);
            
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Promo Deleted');
            $Json_resultSave = array ('status' => '1');
            echo json_encode($Json_resultSave);
            //exit();
        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Deleted Promo');
            $Json_resultSave = array ('status' => '1');
            echo json_encode($Json_resultSave);
            //exit();
        }

    }
    
    
    public function promoDurationByid()
    {   $by_id = $_POST["bannertypeid"];
        if(isset($by_id) && !empty($by_id) ){

            $get_duration = $this->promo->promoDurationByid($by_id); 
            if(isset($get_duration) && !empty($get_duration) ){
                echo '<option value="">Choose Promo Duration..</option>';
                foreach($get_duration as $row)
                {
                    $price= "₦ ".number_format($row->price, 2);
                    echo '<option value="'.$row->promodurationid.'" data-durationprice="'.$price.'">'.$row->durationname.'</option>';
                }
            }
            else{

                echo '<option value="">Promo Duration not available</option>';
            }

        }
        else{

            echo '<option value="">Promo Duration not available</option>';
        }
    }

    public function promostatus()
    {
        
        
        $data_New = array( 
                            'status' => $_POST["_status"]
                         );

        $data_Where = array(  
                        'id'    => $_POST["_id"]
                     );

        // update to db
        $_data = $this->Generic->editByConditions($data_New, $data_Where , $tablename="img_ads");
        if($_data)
        {   
            
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Promo Updated');
            $Json_resultSave = array ('status' => '1');
            echo json_encode($Json_resultSave);
            //exit();
        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updating Promo');
            $Json_resultSave = array ('status' => '0');
            echo json_encode($Json_resultSave);
            //exit();
        }
    }
    
    
    
}
