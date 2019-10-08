<?PHP
class Restaurants extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('validate_session','valSessObj');
		$this->load->model('generic');
		$this->load->model('system_audit', 'audit');
		$this->load->model('restaurant');
		$this->load->model('utilities', 'utility');
		$this->load->model('orangecards', 'orangecard');
		$this->load->model('transactions', 'transaction');
	}
	
	function index($existing_search=0, $page=0)
	{
		$this->valSessObj->validate(__METHOD__);
		
		$filterparams = array();
		$query_params = array();
		
		if($this->input->post() && $existing_search == 0)
		{
			$filterparams['restaurantname'] = $this->input->post('restaurantname');
			$filterparams['restaurantstatus'] = $this->input->post('restaurantstatus');
			$filterparams['pharmacyid'] = $this->input->post('pharmacyid');
			$filterparams['createdat'] = $this->input->post('createdat');
			$this->session->set_flashdata(array(
					'search_restaurantname' => $filterparams['restaurantname'],
					'search_restaurantstatus' => $filterparams['restaurantstatus'],
					'search_pharmacyid' => $filterparams['pharmacyid'],
					'search_createdat' => $filterparams['createdat'],
			));
			$existing_search = 1;
		}
		else if($existing_search == 1)
		{
			$filterparams['restaurantname'] = $this->session->flashdata('search_restaurantname');
			$filterparams['restaurantstatus'] = $this->session->flashdata('search_restaurantstatus');
			$filterparams['pharmacyid'] = $this->session->flashdata('search_pharmacyid');
			$filterparams['createdat'] = $this->session->flashdata('search_createdat');
			
			$this->session->keep_flashdata('search_restaurantname');
			$this->session->keep_flashdata('search_restaurantstatus');
			$this->session->keep_flashdata('search_pharmacyid');
			$this->session->keep_flashdata('search_createdat');
		}
		
		// sanitize params and only pass along the ones with data
		foreach ($filterparams as $key => $value)
		{
			if ($value != '' && $value != NULL && $value != 'all')
				$query_params[$key] = $value;
		}
		
		$data['restaurants'] = $this->restaurant->getAll($query_params, $page);
		$data['breadCrumbs'] = '<li class="active">Restaurants</li>';
		$data['pageheader'] = "Restaurants";
		$data['pageTabTitle'] = 'Create, edit and delete stores';
		$data['mainmenu'] = "restaurants";
		$data['submenu'] = "restaurants";
		
		// Load all pharamcies for purpose of filter
		$data['pharmacies'] = $this->generic->getAll("pharmacies", NULL, null, null, null, "pharmacyname", 'asc');
		
		
		$data['filterparams'] = $filterparams;
		//load pagenation details
		$this->load->library('pagination');
		$config['base_url'] = site_url("restaurant/index");
		$config['total_rows'] = $this->restaurant->getAllCount($query_params);
		$config['per_page'] = '25';
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pagenation'] = $this->pagination->create_links();
		
		// Prepare some aggregate data
		if(!isset($query_params['restaurantstatus']))
			$query_params['restaurantstatus'] = 1;
		$data['totalrestaurants'] = $this->restaurant->getAllCount($query_params);
		
		//$data['totalrestaurants'] = $config['total_rows'];
		$data['totalcardsissued'] = $this->orangecard->getAssignedCount($query_params);
		$data['totalpurchases'] = $this->transaction->getAllCount($query_params);
		$data['totalpharmacies'] = $this->restaurant->getMerchantPharmacyCount($query_params);
		
		$data['totalrecords'] = $config['total_rows'];
		// Load the view page
		$data['content_file'] = 'restaurants';
		$this->load->view('admin_views/layout', $data);
	}
	
	function loadform($action='add', $id=0)
	{
		$this->valSessObj->validate(__METHOD__);
		
		if($id != 0)
			$data = $this->generic->getByID($id, "restaurants");
		
		$data['breadCrumbs'] = '<li><a href="'.site_url('restaurant').'" title="Restaurant">Restaurants</a></li><li class="active">Add Restaurant</li>';
		$data['pageheader'] = "Restaurant";
		$data['pageTabTitle'] = 'Create, edit and delete stores';
		$data['mainmenu'] = "restaurants";
		$data['submenu'] = "restaurants";
		
		$data['states'] = $this->generic->getAll("states", NULL, null, null, null, "statename", 'asc');
		$data['pharmacies'] = $this->generic->getAll("pharmacies", NULL, null, null, null, "pharmacyname", 'asc');
		
		$data['id'] = $id;
		// Load the view page
		$data['content_file'] = 'restaurant_form';
		$this->load->view('admin_views/layout', $data);
	}
	
	function savedata($id=0)
	{
		$sess = $this->valSessObj->validate(__METHOD__);

		$data = array(
				'restaurantname'=>$this->input->post('restaurantname'), 
				'contactfirstname'=>$this->input->post('contactfirstname'),
				'contactlastname'=>$this->input->post('contactlastname'),
				'contactphonenumber'=>$this->input->post('contactphonenumber'),
				'restaurantemail'=>$this->input->post('restaurantemail'),
				'restaurantaddress'=>$this->input->post('restaurantaddress'),
				'stateid'=>$this->input->post('stateid'),
				'pharmacyid' => $this->input->post('pharmacyid')
		);
		
		// Perform form validations
		$this->form_validation->set_rules('restaurantname', 'Restaurant Name', 'required');
		$this->form_validation->set_rules('contactfirstname', 'Firstname', 'required');
		$this->form_validation->set_rules('contactlastname', 'Lastname', 'required');
		$this->form_validation->set_rules('contactphonenumber', 'Phonenumber', 'required|min_length[11]|max_length[11]');
		$this->form_validation->set_rules('restaurantemail', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('restaurantaddress', 'Restaurant Address', 'required');
		$this->form_validation->set_rules('pharmacyid', 'Pharmacy', 'required');
		$this->form_validation->set_rules('stateid', 'State', 'required');
		
		if ($this->form_validation->run() == FALSE) 
		{
			// Load the error into the default handler
			$this->session->set_flashdata(array('warning' => true, 'message' => validation_errors()));
			// redirect back to the customer add form
			redirect("restaurant/loadform/add/$id");
		}
		
		if($id == 0)
		{
			$data['createdat'] = date("Y-m-d H:i:s");
			$this->generic->add($data, "restaurants");
			//Log the user action in the system audit
			$action = 'User created new pharmacy: '.$data['restaurantname'];
			$sid = $this->session->stationID;
			$auditLog = array('actionPerformed'=>$action,'userID'=>$this->session->userdata('userID'), 'stationID'=>$sid);
			$this->audit->add($auditLog);
			//End of audit trail log code
			$flash = array('success'=>true, 'message'=>"New store data has been created successfully");
			$this->session->set_flashdata($flash);
			redirect("restaurant/index");
		}
		else 
		{
			$restaurantdata = $this->generic->getByID($id, "restaurants");
			if($restaurantdata != false)
			{
				$data['updatedat'] = date("Y-m-d H:i:s");
				$this->generic->edit($data, $id, "restaurants");
				//Log the user action in the system audit
				$action = 'User edited pharmacy record with ID: '.$id;
				$auditLog = array('actionPerformed'=>$action,'userID'=>$this->session->userdata('userID'));
				$this->audit->add($auditLog);
				//End of audit trail log code
				$flash = array('success'=>true, 'message'=>"Restaurant data has been updated successfully!");
				$this->session->set_flashdata($flash);
				redirect("restaurant/index");
			}
		}
	}
	
	function delete($id=0)
	{
		$sess = $this->valSessObj->validate(__METHOD__);
		
		$expenseData = $this->generic->getByField("restaurantid", $id, "orangecards");
		if($expenseData == false)
		{
			$this->generic->delete($id, "restaurants");
			//Log the user action in the system audit
			$action = 'User deleted pharmacy record with ID: '.$id;
			$auditLog = array('actionPerformed'=>$action,'userID'=>$this->session->userID);
			$this->audit->add($auditLog);
			//End of audit trail log code
			$flash = array('success'=>true, 'message'=>"Restaurant data has been successfully deleted!");
			$this->session->set_flashdata($flash);
			redirect("restaurant/index");
		}
		else
		{
			$flash = array('error'=>true, 'message'=>"Restaurant has customers attached to it and cannot be deleted!");
			$this->session->set_flashdata($flash);
			redirect("restaurant/index");
		}
	}
	
	
	function cardgiveoutform($action='add')
	{
		$this->valSessObj->validate(__METHOD__);
	
		$data['breadCrumbs'] = '<li><a href="'.site_url('restaurant').'" title="Restaurant">Restaurants</a></li><li class="active">Orange Card Giveout</li>';
		$data['pageheader'] = "Restaurant";
		$data['pageTabTitle'] = 'Create, edit and delete stores. Orange card give out';
		$data['mainmenu'] = "restaurants";
		$data['submenu'] = "restaurants";
		$data['pharmacies'] = $this->generic->getAll("pharmacies", NULL, null, null, null, "pharmacyname", 'asc');
		// Load the view page
		$data['content_file'] = 'giveout-card';
		$this->load->view('admin_views/layout', $data);
	}
	
	function cardgiveout()
	{
		$sess = $this->valSessObj->validate(__METHOD__);
	
		$restaurantid = $this->input->post('restaurantid');
		$totalcards = $this->input->post('totalcards');
	
		// Perform form validations
		$this->form_validation->set_rules('restaurantid', 'Restaurant', 'required');
		$this->form_validation->set_rules('totalcards', 'Total Cards', 'required');
	
		if ($this->form_validation->run() == FALSE)
		{
			// Load the error into the default handler
			$this->session->set_flashdata(array('warning' => true, 'message' => validation_errors()));
			// redirect back to the customer add form
			redirect("restaurant/cardgiveoutform/add");
		}
		
		$this->generic->edit(array('totalavailablecards'=>$totalcards), $restaurantid, "restaurants");
		// $this->orangecard->updateTotalCardsAvailable($restaurantid, $totalcards);
		
		//Log the user action in the system audit
		$action = "User assigned: $totalcards orange cards to pharmacy id: $restaurantid ";
		$sid = $this->session->stationID;
		$auditLog = array('actionPerformed'=>$action,'userID'=>$this->session->userdata('userID'), 'stationID'=>$sid);
		$this->audit->add($auditLog);
		//End of audit trail log code
		$flash = array('success'=>true, 'message'=>"Card give out has been completed successfully");
		$this->session->set_flashdata($flash);
		redirect("restaurant/index");
	}
	
	// Controller function to display upload form
	public function upload()
	{
		$this->valSessObj->validate(__METHOD__);
		
		$data['sample_link'] = base_url().'assets/formats/sample_store.csv';
		$data['breadCrumbs'] = '<li><a href="'.site_url('restaurant').'" title="Restaurants">Restaurants</a></li><li class="active">Upload Restaurants</li>';
		$data['pageheader'] = "Bulk Upload Restaurants";
		$data['pageTabTitle'] = 'Create, edit and delete stores';
		$data['mainmenu'] = "restaurants";
		$data['submenu'] = "restaurants";
		
		// Load the view page
		$data['content_file'] = 'restaurant_upload_form';
		$this->load->view('admin_views/layout', $data);
	}
	
	// Controller function to process store uploads
	public function processupload()
	{
		$this->valSessObj->validate("Merchant::upload");
		
		$tempLocation = $_FILES['userfile']['tmp_name'];
		$fileContents = $this->utility->uploadCSV($tempLocation);
		$not_found = ''; $totalnew = 0; $totalupdated = 0;
		//var_dump($fileContents);
		for($i=1; $i<count($fileContents); $i++)
		{
			if(isset($fileContents[$i][7]) && trim($fileContents[$i][0]) != '' && trim($fileContents[$i][7]) != '')
			{
				
				$data['createdat'] = date("Y-m-d H:i:s");
				$data['restaurantname'] = trim($fileContents[$i][0]);
				$data['restaurantaddress'] = trim($fileContents[$i][1]);
				$data['stateid'] = trim($fileContents[$i][2]);
				$data['pharmacyid'] = trim($fileContents[$i][3]);
				$data['contactfirstname'] = trim($fileContents[$i][4]);
				$data['contactlastname'] = trim($fileContents[$i][5]);
				$data['contactphonenumber'] = trim($fileContents[$i][6]);
				$data['restaurantemail'] = trim($fileContents[$i][7]);
				
				// Phone number must be 11 digits
				if(strlen($data['contactphonenumber']) != 11)
				{
					continue;
				}
				
				// Email address must be valid
				$this->load->helper('email');
				if(!valid_email($data['restaurantemail']))
				{
					continue;
				}
				
				// Ensure the specified pharmacy exists
				$pharmacydata = $this->generic->getByFieldSingle("pharmacyname", $data['pharmacyid'], "pharmacies", "pharmacies.id");
				if($pharmacydata == false)
				{
					continue;
				}
				$data['pharmacyid'] = $pharmacydata['id'];
				
				// Ensure the specified state exists
				$statedata = $this->generic->getByFieldSingle("statename", $data['stateid'], "states", "states.id");
				if($statedata== false)
				{
					continue;
				}
				$data['stateid'] = $statedata['id'];
				
				// Create the store
				$this->generic->add($data, 'restaurants');
				$totalnew++;
			}
		}
		
		// Load index page with the success message
		$displaymessage = array('message'=>"Restaurants have been uploaded successfully. Total successful entries: $totalnew", 'success'=>true);
		$this->session->set_flashdata($displaymessage);
		// Redirect back to the index
		redirect('restaurant');
	}
	
}
