<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Authentication extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('oye/Restaurant_admin_model');
        $this->load->model('oye/Fashion_model');
        $this->load->model('oye/Session_model');
        $this->load->model('oye/Role_assignment');
        $this->load->model('restaurant_m/Auth');
        $this->load->model('promo');
        $this->load->helper('text');
	}

	public function index()
	{
        $query_params['bannertypeid']=12;
        $usertype= array('admin','fashion','cuisine','thirdparty');
        $data['banners'] = $this->promo->getAllPromo_Nolimit($query_params, $usertype);
	    $this->load->view('fashion_admin/login',$data);
	}

    public function login()
	{
		$query_params['bannertypeid']=12;
        $usertype= array('admin','fashion','cuisine','thirdparty');
        $data['banners'] = $this->promo->getAllPromo_Nolimit($query_params, $usertype);
        $this->load->view('fashion_admin/login',$data);
	}

    public function login_validation()
    {
        $email_c =  $this->input->post('l_email');
        $pwd_c =  md5($this->input->post('l_pwd'));
        // call the model for auth
        $looker = $this->Auth->check_fashion_login($email_c, $pwd_c);
        switch($looker)
                        {
                            case 'logged_inn':
                            
                            //redirect("fashionadmin/dashboard");
                            echo 'logged_inn';

                            break;

                            case 'Email_not_Found':


                                $mssg = "Email / Password not Found.....";
                                
                                $this->session->set_flashdata('msg', $mssg);
                                //redirect(base_url().'adminoye/login', 'refresh');
                                
                                echo 'Email not Found';

                            break;

                            case 'Incorrect_Password':

                                $mssg = "Incorrect Password.....";
                                
                                $this->session->set_flashdata('msg', $mssg);
                                //redirect(base_url().'adminoye/login', 'refresh');
                                
                                
                                echo 'Incorrect Password';



                            break;

                            case 'User_Not_Active':


                                $mssg = "User Account Disactivated.....";
                                
                                $this->session->set_flashdata('msg', $mssg);
                                //redirect(base_url().'adminoye/login', 'refresh');
                                
                                echo 'User Not Active';

                            break;

                            case 'Merchant_Not_Active':


                                $mssg = "Store Account Disactivated.....";
                                
                                $this->session->set_flashdata('msg', $mssg);
                                //redirect(base_url().'adminoye/login', 'refresh');
                                
                                echo 'Store Account Disactivated';

                            break;
                        }
        //echo $looker;
    }

    public function logout()
    {
    $this->session->sess_destroy();
    redirect('fashionadmin/authentication/login', 'refresh');
    }
        
    public function check_Loginin()
    {
        if(!isset($_SESSION['fashionAdmin']) || $_SESSION['fashionAdmin'] != true || $_SESSION['Type'] != 'fashion')
        {
            redirect('fashionadmin/authentication/login', 'refresh');	
        }
        if(!isset($_SESSION['Paymentid']) ||  $_SESSION['Paymentid'] = '')
        {
            redirect('fashionadmin/dashboard/settings', 'refresh');   
        }
    }
    
}
