<?PHP
class Customer extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('validate_session','valSessObj');
		$this->load->model('generic');
		$this->load->model('system_audit', 'audit');
		$this->load->model('customers', 'customer');
		$this->load->model('utilities', 'utility');
	}
	
	function index($existing_search=0, $page=0)
	{
		$this->valSessObj->validate(__METHOD__);
		
		$filterparams = array();
		$query_params = array();
		
		if($this->input->post() && $existing_search == 0)
		{
			$filterparams['customercode'] = $this->input->post('customercode');
			$filterparams['customerstatus'] = $this->input->post('customerstatus');
			$filterparams['createdat'] = $this->input->post('createdat');
			$filterparams['merchantid'] = $this->input->post('merchantid');
			$filterparams['orangecardid'] = $this->input->post('orangecardid');
			
			$this->session->set_flashdata(array(
					'search_customercode' => $filterparams['customercode'],
					'search_customerstatus' => $filterparams['customerstatus'],
					'search_createdat' => $filterparams['createdat'],
					'search_merchantid' => $filterparams['merchantid'],
					'search_orangecardid' => $filterparams['orangecardid'],
			));
			$existing_search = 1;
		}
		else if($existing_search == 1)
		{
			$filterparams['customercode'] = $this->session->flashdata('search_customercode');
			$filterparams['customerstatus'] = $this->session->flashdata('search_customerstatus');
			$filterparams['createdat'] = $this->session->flashdata('search_createdat');
			$filterparams['merchantid'] = $this->session->flashdata('search_merchantid');
			$filterparams['orangecardid'] = $this->session->flashdata('search_orangecardid');
			
			$this->session->keep_flashdata('search_merchantname');
			$this->session->keep_flashdata('search_merchantstatus');
			$this->session->keep_flashdata('search_createdat');
			$this->session->keep_flashdata('search_merchantid');
			$this->session->keep_flashdata('search_orangecardid');
		}
		
		// sanitize params and only pass along the ones with data
		foreach ($filterparams as $key => $value)
		{
			if ($value != '' && $value != NULL && $value != 'all')
				$query_params[$key] = $value;
		}
		
		$data['customers'] = $this->customer->getAll($query_params, $page);
		$data['breadCrumbs'] = '<li class="active">Customers</li>';
		$data['pageheader'] = "Customers";
		$data['pageTabTitle'] = 'Create, edit and delete customers';
		$data['mainmenu'] = "customers";
		$data['submenu'] = "customers";
		
		$data['filterparams'] = $filterparams;
		//load pagenation details
		$this->load->library('pagination');
		$config['base_url'] = site_url("customer/index");
		$config['total_rows'] = $this->customer->getAllCount($query_params);
		$config['per_page'] = '25';
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pagenation'] = $this->pagination->create_links();
		// Load the view page
		$data['content_file'] = 'customers';
		$this->load->view('layout', $data);
	}
	
	function delete($id=0)
	{
		$sess = $this->valSessObj->validate(__METHOD__);
		
		$stationID = $this->session->stationID;
		$expenseData = $this->merchant->getByID($this->session->stationID, $id);
		if($expenseData != false)
		{
			$this->generic->delete($id, "customers");
			//Log the user action in the system audit
			$action = 'User deleted customer record with ID: '.$id;
			$auditLog = array('actionPerformed'=>$action,'userID'=>$this->session->userdata('userID'));
			$this->audit->add($auditLog);
			//End of audit trail log code
			$flash = array('success'=>true, 'message'=>"Customer data has been successfully deleted!");
			$this->session->set_flashdata($flash);
			redirect("customer/index");
		}
	}
	
}
