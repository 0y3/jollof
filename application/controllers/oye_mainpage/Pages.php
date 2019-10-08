`  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	}

	public function index()
	{
		$data ['titel']= 'Jollof:-Home';
                $this->load->view('included/old_header', $data);
		$this->load->view('oye_mainpage_v/index', $data);
                $this->load->view('included/old_footer', $data);
	}
	public function test()
	{
		$data = '';
		$this->load->view('mainpage_v/dav',$data);
	}
        public function logout(){
            $this->session->sess_destroy();
            //redirect('/' ,'refresh');
            //exit;
        }

        
}
