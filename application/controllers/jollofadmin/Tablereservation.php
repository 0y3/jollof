<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tablereservation extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('Tablereservations');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->helper('text');
	}

	public function index($existing_search=0, $page=0)
    {
       $this->session_manager->validateJollofadmin(__METHOD__);

        $data['pageheader'] = "Table Reservation Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Table Reservation</li>';
        $data['mainmenu'] = "tablereservation";
        
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
            
        if(($this->input->post() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams['createdat'] = $this->input->post('createdat');
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
        // Load all the products items
        $data['tables'] = $this->Tablereservations->getAllTableReservations($query_params, $page, 'admin');
        
        //load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/tablereservation/index/$existing_search");
        //$config['total_rows'] = $this->orderitem->getAllTableReservations($query_params, );
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();

        //print("<pre>".print_r($this->Tablereservations->getAllTableReservations($query_params, $page),true)."</pre>");die;  
        $data ['content_file']= 'tablereservation';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function add($id=null)
    {

        $this->session_manager->validateJollofadmin(__METHOD__);

        $tablecode = 'TBR-'.$this->utility->generate_random_string(12);
        $data_merge = array(
                    'tablecode'     => $tablecode,
                    'requeststatus' => 1,
                    'status'        =>  1
                );

        $data_update = $this->Generic->edit($data_merge, $id , $tablename="tablereservations");

        if($data_update)
        {
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Table Reservations Accepted');
            $Json_resultSave = array ('status' => '1');
            redirect('/jollofadmin/tablereservation', 'refresh');

        } 
        else
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updated The Table Reservations ');
            $Json_resultSave = array ('status' => '0');
            redirect('/jollofadmin/tablereservation', 'refresh');

        }
        
    }

    public function delete($id=null)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

        // delete to db
        $data_merge = array(
                    'tablecode'     => '',
                    'requeststatus' => 0,
                    'status'        =>  0
                );

        $_data = $this->Generic->edit($data_merge, $id , $tablename="tablereservations");
        if($_data)
        {

            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Table Reservations Declined');
            $Json_resultSave = array ('status' => '1');
            redirect('/jollofadmin/tablereservation', 'refresh');
            //echo json_encode($Json_resultSave);
            //exit();
       }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Declined Table Reservations');
            $Json_resultSave = array ('status' => '0');
            redirect('/jollofadmin/tablereservation', 'refresh');
            //echo json_encode($Json_resultSave);
            //exit();
        }
        
    }
    
   
        
}

