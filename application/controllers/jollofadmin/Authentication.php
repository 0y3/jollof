<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Authentication extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('oye/Restaurant_admin_model');
        $this->load->model('oye/Fashion_model');
        $this->load->model('oye/Session_model');
        $this->load->model('oye/Role_assignment');
        $this->load->model('admin_m/Auth');
        $this->load->model('promo');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->helper('text');
    }

    public function index()
    {
        $query_params['bannertypeid']=11;
        $usertype= array('admin','fashion','cuisine','thirdparty');
        $data['banners'] = $this->promo->getAllPromo_Nolimit($query_params, $usertype);
        $this->load->view('jollof_admin/login',$data);
    }

    public function login()
    {
        $query_params['bannertypeid']=11;
        $usertype= array('admin','fashion','cuisine','thirdparty');
        $data['banners'] = $this->promo->getAllPromo_Nolimit($query_params, $usertype);
        $this->load->view('jollof_admin/login',$data);
    }

    public function login_validation()
    {
        $email_c =  $_POST['l_email'];//$this->input->post('l_email');
        $pwd_c =  md5($_POST['l_pwd']);//md5($this->input->post('l_pwd'));
        // call the model for auth
        $looker = $this->Auth->check_Admin_login($email_c, $pwd_c);
        switch($looker)
                        {
                            case 'logged_inn':
                            
                            //redirect("fashionadmin/dashboard");
                            $Json_resultSave = array (
                                            'status' => '1',
                                            'content'=> 'logged_inn'
                                            );
                            echo json_encode($Json_resultSave);
                            //echo 'logged_inn';

                            break;

                            case 'Email_not_Found':


                                $mssg = "Email / Password not Found.....";
                                
                                $this->session->set_flashdata('msg', $mssg);
                                //redirect(base_url().'adminoye/login', 'refresh');
                                $Json_resultSave = array (
                                            'status' => '0',
                                            'content'=> 'Email not Found'
                                            );
                                echo json_encode($Json_resultSave);
                                //echo 'Email not Found';

                            break;

                            case 'Incorrect_Password':

                                $mssg = "Incorrect Password.....";
                                
                                $this->session->set_flashdata('msg', $mssg);
                                //redirect(base_url().'adminoye/login', 'refresh');
                                
                                $Json_resultSave = array (
                                            'status' => '0',
                                            'content'=> 'Incorrect Password'
                                            );
                                echo json_encode($Json_resultSave);
                                
                                //echo 'Incorrect Password';



                            break;

                            case 'User_Not_Active':


                                $mssg = "User Account Disactivated.....";
                                
                                $this->session->set_flashdata('msg', $mssg);
                                //redirect(base_url().'adminoye/login', 'refresh');
                                $Json_resultSave = array (
                                            'status' => '0',
                                            'content'=> 'User Not Active'
                                            );
                                echo json_encode($Json_resultSave);
                                //echo 'User Not Active';

                            break;
                        }
        //echo $looker;
    }

    public function logout()
    {
    $this->session->sess_destroy();
    redirect('jollofadmin/authentication/login', 'refresh');
    }
        
    public function check_Loginin()
    {
        if(!isset($_SESSION['jollofAdmin']) || $_SESSION['jollofAdmin'] != true || $_SESSION['Type'] != 'admin')
        {
            redirect('jollofadmin/authentication/login', 'refresh');   
        }
    }
    
}
