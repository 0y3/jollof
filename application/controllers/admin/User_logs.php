<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_log extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('validate_session','valSessObj');
		$this->load->model('shifts', 'shiftsObj');
		$this->load->model('dip_readings', 'dipObj');
		$this->load->model('meter_readings', 'meterReadingObj');
		$this->load->model('system_audit', 'audit');
	}
	function index($status='', $page=0, $message_type='', $message='')
	{
		$sess = $this->valSessObj->validatePublic();
		if($sess == 'ok')
		{
			$data[$message_type] = $message;
			$uid = $this->session->userdata('userID');
			$data['userAudit'] = $this->audit->getUserLog($uid, $this->session->userdata('stationID'), $page);
			
			$data['breadCrumbs'] = '<li class="active">User Audit Log</li>';
			$data['pageheader'] = "User Log";
			$data['pageTabTitle'] = 'View user activity logs';
			$data['mainmenu'] = "usermanagement";
			$data['submenu'] = "users";
			
			//load pagenation details
			$this->load->library('pagination');
			$config['base_url'] = site_url("user_log/index/");
			$config['total_rows'] = $this->audit->getUserLogCount($uid, $this->session->userdata('stationID'));
			$config['per_page'] = '25';
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);
			$data['pagenation'] = $this->pagination->create_links();
			$data['startFrom'] = $page;
			$data['perpage'] = $config['per_page'];
			
			// Load the view page
			$data['content_file'] = 'user_log';
			$this->load->view('admin_views/layout', $data);
		}
	}
}
?>