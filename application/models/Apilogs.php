<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apilogs extends CI_Model
{
    const TABLE = 'apilogs';
    
    function __construct()
    {
        parent::__construct();
    }
    
    
    function add($controller, $action, $jsonresponse)
    {
    	$requests = $this->input->get();
    	$post = $this->input->post();

        if(!is_array($requests))
            $requests = array();
    	
    	if(is_array($post))
    		$requests = array_merge($requests, $post);
    	
    	$requests['CONTROLLER'] = $controller;
    	$requests['ACTION'] = $action;
        $requests['Request Type'] = $this->input->server("REQUEST_METHOD");
        $requests['Content Type'] = $this->input->server("CONTENT_TYPE");

        if(isset($_FILES['imagedata']['name'])) 
        {
            $requests['Image'] = $_FILES['imagedata']['name'];
        }
    	
    	$log = array();
    	$log['requestjson'] = json_encode($requests);
    	$log['controller'] = $controller;
    	$log['method'] = $action;
    	$log['responsejson'] = $jsonresponse;
    	$log['usertoken'] = $this->input->post('merchant_id');
    	$log['createdat'] = $log['updatedat'] = date('Y-m-d H:i:s');
    	
    	$this->db->insert(self::TABLE, $log);
    	
    }
    
}
?>