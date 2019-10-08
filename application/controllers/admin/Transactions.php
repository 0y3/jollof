<?PHP
class Transaction extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('validate_session','valSessObj');
		$this->load->model('generic');
		$this->load->model('system_audit', 'audit');
		$this->load->model('merchants', 'merchant');
		$this->load->model('transactions', 'transaction');
		$this->load->model('utilities', 'utility');
		$this->load->model('products', 'product');
		$this->load->model('customers', 'customer');
	}
	
	function index($existing_search=0, $page=0, $paymenttype="all")
	{
		$sess = $this->valSessObj->validate(__METHOD__);
		
		$filterparams = array();
		$query_params = array();
		
		if($this->input->post() && $existing_search == 0)
		{
			$filterparams['merchantid'] = $this->input->post('merchantid');
			$filterparams['createdat'] = $this->input->post('createdat');
			$filterparams['customerid'] = $this->input->post('customerid');
			$filterparams['productid'] = $this->input->post('productid');
			$filterparams['paymenttype'] = $this->input->post('paymenttype');
			
			$this->session->set_flashdata(array(
					'search_merchantid' => $filterparams['merchantid'],
					'search_createdat' => $filterparams['createdat'],
					'search_customerid' => $filterparams['customerid'],
					'search_paymenttype' => $filterparams['paymenttype'],
					'search_productid' => $filterparams['productid']
			));
			$existing_search = 1;
		}
		else if($existing_search == 1)
		{
			$filterparams['merchantid'] = $this->session->flashdata('search_merchantid');
			$filterparams['createdat'] = $this->session->flashdata('search_createdat');
			$filterparams['customerid'] = $this->session->flashdata('search_customerid');
			$filterparams['productid'] = $this->session->flashdata('search_productid');
			$filterparams['paymenttype'] = $this->session->flashdata('search_paymenttype');
				
			$this->session->keep_flashdata('search_merchantid');
			$this->session->keep_flashdata('search_createdat');
			$this->session->keep_flashdata('search_customerid');
			$this->session->keep_flashdata('search_paymenttype');
			$this->session->keep_flashdata('search_productid');
		}
		
		// sanitize params and only pass along the ones with data
		foreach ($filterparams as $key => $value)
		{
			if ($value != '' && $value != NULL && $value != 'all')
				$query_params[$key] = $value;
		}
		
		$data['transactions'] = $this->transaction->getAll($query_params, $page);
		$data['breadCrumbs'] = '<li class="active">Purchases</li>';
		$data['pageheader'] = "Purchases";
		$data['pageTabTitle'] = 'View, edit and manage purchases';
		$data['mainmenu'] = "transactions";
		$data['submenu'] = "transactions";
		
		$data['filterparams'] = $filterparams;
		//load pagenation details
		$this->load->library('pagination');
		$config['base_url'] = site_url("transaction/index/$existing_search");
		$config['total_rows'] = $this->transaction->getAllCount($query_params);
		$config['per_page'] = '25';
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['pagenation'] = $this->pagination->create_links();
		// Load the view page
		$data['content_file'] = 'transactions';
		$this->load->view('admin_views/layout', $data);
	}
	
	
}
