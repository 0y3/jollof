<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fashion_admin extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
                $this->load->model('oye/Fashion_model');
                //$this->load->model('oye/Fashion_admin_model');
                $this->load->helper('text');
                $this->load->helper('thumb');
                
                $this->original_path = realpath(APPPATH.'../assets/uploads/fashion_prod');
                $this->thumbs_path = realpath(APPPATH.'../assets/uploads/fashion_prod/thumbs');
	}
	
	public function index()
	{       
                
	}
	
	public function check_Loginin()
	{
            if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true || $_SESSION['Type'] != 'fashion')
            {
                    //$this->index(); 
                    redirect('fashion-admin/login', 'refresh');	
            }
		
	}
        
        public function generate_random_string($length)
    {
        $characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $randomString = '';
        for($i = 0; $i < $length; $i++){
            $randomString .= $characters[random_int(0,strlen($characters) - 1 )];
        }
        return $randomString;
        //echo $randomString;
    }
        public function all_sizes() 
	{
            //$this->check_Loginin();
            $get_like = $_GET["q"];
            if(isset($get_like) && !empty($get_like) )
            {
                $data_all = $this->Fashion_model->_all_sizes($get_like);

                
            }
            else
            {
                $data_all = $this->Fashion_model->_all_sizes($get_like=FALSE); // call City by State
            }
            //print("<pre>".print_r($data_all,true)."</pre>");die;
            if($data_all)
                    {

                        $data = array();
                        foreach ($data_all as $value ) 
                        {
                            $data[] = array(
                                    'id' => $value->id,
                                    'sizecategory' => $value->sizecategory,
                                    'sizename' => $value->sizename,
                                    //'name' => $value->firstname.' '.$value->lastname,
                                    'sizecode' => $value->sizecode
                                    );
                        }
                        echo json_encode($data);

                    } 
                
        }
        
        public function all_colors() 
	{
            //$this->check_Loginin();
            $get_like = $_GET["color"];
            if(isset($get_like) && !empty($get_like) )
            {
                $data_all = $this->Fashion_model->_all_colors($get_like);
            }
            else
            {
                $data_all = $this->Fashion_model->_all_colors($get_like=FALSE); // call City by State
            }
            
            if($data_all)
                    {

                        $data = array();
                        foreach ($data_all as $value ) 
                        {
                            $data[] = array(
                                    'id' => $value->id,
                                    'colorname' => $value->colorname,
                                    'colorcode' => $value->colorcode
                                    );
                        }
                        echo json_encode($data);

                    } 
                
        }
        
        public function save_multipleimage_2nd() {
           
            $this->load->library('image_lib');
            $this->load->library('upload');
           
            if (!empty($_FILES['files']['name']) )
            {
                
                $images_thumb = array();
                
                foreach($_FILES['files']['name'] as $i => $images)
                {
                    $exploded = explode('.',$images);
                    $file_extn = strtolower(end($exploded));
                    
                    $newname = $_SESSION['rest_id'].'_'.time().$i.($i+1).".".$file_extn;
                    
                    $_FILES ['userfile'] ['name'] =         $newname;
                    //$_FILES ['userfile'] ['name'] =        $_FILES['files']['name'][$i]; //$newname
                    $_FILES ['userfile'] ['type'] =        $_FILES ['files'] ['type'] [$i];
                    $_FILES ['userfile'] ['tmp_name'] =    $_FILES ['files'] ['tmp_name'] [$i];
                    $_FILES ['userfile'] ['error'] =       $_FILES ['files'] ['error'] [$i];
                    $_FILES ['userfile'] ['size'] =        $_FILES ['files'] ['size'] [$i];
                    
                    $config['upload_path'] = './assets/uploads/fashion_prod/';
                    $config['allowed_types'] = 'jpg|jpeg|png';	
                    $config['remove_spaces']  = TRUE;
                    $config['overwrite'] = TRUE;
                    $this->upload->initialize($config);
                    
                    if (!$this->upload->do_upload('userfile'))
                        {
                            echo $this->upload->display_errors();  
                        }
                    else 
                        {
                            $data = $this->upload->data();   
                            $images_thumb[] = $data['file_name']; 
                            //$this->image_lib->clear();
                            //Resize Configs  $data['file_path'].$data["file_name"];
                            // for the Thumbnail image
                            foreach ($images_thumb as $image_t) {
                                $config_1 = array(
                                    //'image_library' => 'gd2',
                                    'source_image' => './assets/uploads/fashion_prod/'.$image_t,
                                    'new_image' => './assets/uploads/fashion_prod/test/'.$image_t,//$this->thumbs_path,
                                    'maintain_ratio' => FALSE,
                                    'width' => 150,
                                    'height' => 150
                                );
                                $this->create_thumb($image_t);
                                /*$this->image_lib->initialize($config_1);
                            
                                if(!$this->image_lib->resize())
                                {
                                    echo 'error_from_resizing = '.$this->image_lib->display_errors();die;
                                    
                                    //phpinfo(); 
                                }
                                 * 
                                 */
                            }
                            $this->image_lib->clear();


                            /*$this->db->insert('productimages', array(
                                                'restaurantid'  => $_SESSION['rest_id'],
                                                'imagename' => $data['file_name']
                                            ));

                             * 
                             */
                            $num = $this->generate_random_string(4);
                            $output .= '
                                <div class="preview-image preview-show-'. $num. '" >
                                    <div class="image-cancel" data-no="'. $num .'" data-key="'.$data["file_name"].'">x</div> 
                                    <div class="image-zone">
                                        <img id="pro-img-'.$num . '" src="'.site_url('assets/uploads/fashion_prod/').$data["file_name"].'"  />
                                    </div>
                                    <input type="hidden" id="" name="prd_images[]" class="form-control img_prd" value="'.$data["file_name"].'">

                                </div>
                                ';
                           
                        }
                    //else{ print_r($this->upload->display_errors()); }
                }
                //print("<pre>".print_r($output,true)."</pre>");die;
                echo $output;
                
            }
            
             
        }
        
        public function save_multipleimage() {
           
           
            $this->load->library('image_lib');
            $this->load->library('upload');
            
            if (!empty($_FILES['files']['name']) )
            {
                $output = '';
                
                //$newname = '16_'.time();//$_SESSION['rest_id'].'_'.time();	 // Random Encryp new name save to app
                
                //$config['image_library'] = 'gd2';
                //$this->load->library('image_lib');
                
                $config['upload_path'] = './assets/uploads/fashion_prod/';
                $config['allowed_types'] = 'jpg|jpeg|png';	
                $config['remove_spaces']  = TRUE;
                $config['overwrite'] = TRUE;
                //$this->load->library('upload', $config); 
                
                foreach($_FILES['files']['name'] as $i => $images)
                {
                    $exploded = explode('.',$images);
                    $file_extn = strtolower(end($exploded));
                    //print("<pre>".print_r($i."--".$images,true)."</pre>");
                    
                    //$ext = end((explode(".", $_FILES['files']['name'][$i])));
                    //$file_name = time().$i."_".($i+1).".".$ext;
                    
                    $newname = $_SESSION['rest_id'].'_'.time().$i.($i+1).".".$file_extn;
                    
                    $_FILES ['userfile'] ['name'] =         $newname;
                    //$_FILES ['userfile'] ['name'] =        $_FILES['files']['name'][$i]; //$newname
                    $_FILES ['userfile'] ['type'] =        $_FILES ['files'] ['type'] [$i];
                    $_FILES ['userfile'] ['tmp_name'] =    $_FILES ['files'] ['tmp_name'] [$i];
                    $_FILES ['userfile'] ['error'] =       $_FILES ['files'] ['error'] [$i];
                    $_FILES ['userfile'] ['size'] =        $_FILES ['files'] ['size'] [$i];
                    
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('userfile'))
                        {
                            echo $this->upload->display_errors();  
                        }
                    else 
                        {
                            $data = $this->upload->data(); 
                            create_thumb($data, '150', '150', './assets/uploads/fashion_prod/thumbs/', TRUE);
                            
                            //Resize Configs  $data['file_path'].$data["file_name"];
                            //$this->create_thumb($data["file_name"]);
                            
                            /*
                            $config_1['image_library'] = 'GD2';  
                            $config_1['source_image'] = './assets/uploads/fashion_prod/'.$data["file_name"]; 
                            $config_1['new_image'] = $this->thumbs_path;//'./assets/uploads/fashion_prod/thumbs/'.$data["file_name"];
                            $config_1['allowed_types'] = 'jpg|jpeg|png';  
                            $config_1['create_thumb'] = FALSE;  
                            $config_1['maintain_ratio'] = FALSE;
                            $config_1['quality'] = '60%';  
                            $config_1['width'] =150;  
                            $config_1['height'] = 150;  
                            
                            $this->load->library('image_lib',$config_1);  
                             * 
                             
                            // for the Thumbnail image
                            $config_1 = array(
                                'image_library' => 'gd2',
                                'source_image' => './assets/uploads/fashion_prod/'.$data["file_name"],
                                'new_image' => './assets/uploads/fashion_prod/thumbs/'.$this->thumbs_path,
                                'maintain_ratio' => FALSE,
                                'width' => 150,
                                'height' => 150
                            );
                            //$this->load->library('image_lib');
                            $this->image_lib->initialize($config_1);
                            //$this->image_lib->resize();
                            //$this->image_lib->clear();
                            
                            if(!$this->image_lib->resize())
                            {
                                echo $this->image_lib->display_errors();die;
                                $this->image_lib->clear();
                                //phpinfo(); 
                            }
                            else{
                                $this->image_lib->clear();
                            
                            * 
                             */
                            $this->db->insert('productimages', array(
                                                'restaurantid'  => $_SESSION['rest_id'],
                                                'imagename' => $data['file_name']
                                            ));
                            
                             
                            $num = $this->generate_random_string(4);
                            $output .= '
                                <div class="preview-image preview-show-'. $num. '" >
                                    <div class="image-cancel" data-no="'. $num .'" data-key="'.$data["file_name"].'">x</div> 
                                    <div class="image-zone">
                                        <img id="pro-img-'.$num . '" src="'.site_url('assets/uploads/fashion_prod/').$data["file_name"].'"  />
                                    </div>
                                    <input type="hidden" id="" name="prd_images[]" class="form-control img_prd" value="'.$data["file_name"].'">
                                
                                </div>
                                ';
                        //} 
                        }
                    //else{ print_r($this->upload->display_errors()); }
                }
                //print("<pre>".print_r($output,true)."</pre>");die;
                echo $output;
                
            }
            
             
        }
        
        public function save_multipleimage_aa() {      
            $this->load->library('image_lib');
            $this->load->library('upload');

            if(isset($_FILES['files']) && $_FILES['files']['size'] > 0) {
                
              $images = array();

              // Upload
              $files = $_FILES['files'];
            foreach ($files['name'] as $key => $image) {
              //foreach($_FILES['files']['name'] as $i => $images){
                $_FILES['files[]']['name']= $files['name'][$key];
                $_FILES['files[]']['type']= $files['type'][$key];
                $_FILES['files[]']['tmp_name']= $files['tmp_name'][$key];
                $_FILES['files[]']['error']= $files['error'][$key];
                $_FILES['files[]']['size']= $files['size'][$key];

                $upload_config = array(
                  'allowed_types' => 'jpg|jpeg|gif|png',
                  'upload_path' => realpath(APPPATH . "../assets/uploads/fashion_prod"),
                  //'max_size'    => 5000,
                  'remove_spaces' => TRUE,
                  'file_name'   => md5(time()).$key.($key+1)
                );
                $this->upload->initialize($upload_config);

                if ($this->upload->do_upload('files[]')) {
                  $image_data = $this->upload->data();  
                  $images[] = $image_data['file_name']; 
                } else {
                  //$this->session->set_flashdata('error', $this->upload->display_errors() );
                  echo 'error_from_main = '.$this->image_lib->display_errors();die;
                }
            }

              // Resize
            foreach ($images as $image) {
                    $resize_config = array(
                        'source_image'      => realpath(APPPATH . '../assets/uploads/fashion_prod') .'/'. $image,
                        'maintain_ratio'    => TRUE,
                        'width'             => 150,
                        'height'            => 150,
                        'new_image'         => realpath(APPPATH . '../assets/uploads/fashion_prod/thumbs')
                    );
                    $this->image_lib->initialize($resize_config);

                    if ( !$this->image_lib->resize() ) {
                        echo 'error_from_resizing = '.$this->image_lib->display_errors();die;
                    }
                    $this->image_lib->clear();
                    
            }

              // Save to db
              
            foreach ($images as $image) {

             $num = $this->generate_random_string(4);
             $output .= '
                 <div class="preview-image preview-show-'. $num. '" >
                     <div class="image-cancel" data-no="'. $num .'" data-key="'.$image.'">x</div> 
                     <div class="image-zone">
                         <img id="pro-img-'.$num . '" src="'.site_url('assets/uploads/fashion_prod/').$image.'"  />
                     </div>
                     <input type="hidden" id="" name="prd_images[]" class="form-control img_prd" value="'.$image.'">

                 </div>
                 ';     
            } 
            echo $output;   

                
            }
        }
        
       
        public function create_thumb($file_name)
        {
            //Resize Configs  $data['file_path'].$data["file_name"];
           $config['image_library'] = 'gd2';
           $config['source_image'] = './assets/uploads/fashion_prod/'.$file_name;    
           $config['create_thumb'] = FALSE;
           $config['maintain_ratio'] = TRUE;
           $config['width'] = 150;
           $config['height'] = 150;
           $config['new_image'] = './assets/uploads/fashion_prod/thumbs/'.$file_name;
           $this->load->library('image_lib');
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           if(!$this->image_lib->resize())
           {
               return $this->image_lib->display_errors();die;
                
           }
           else{ 
               $this->image_lib->clear();
               return true;
               
           }
                 
        }
       
        
        public function delete_multipleimage() 
        {
            //rmdir($dir); //to delete directory use
            
            $fullpath = './assets/uploads/fashion_prod/';
            $bigpath = './assets/uploads/fashion_prod/mainimage/';
            $thumbpath = './assets/uploads/fashion_prod/thumbs/';
            $picture=$_POST["key"];
            
            unlink($fullpath.$picture);
            unlink($bigpath.$picture);
            unlink($thumbpath.$picture);
            $this->db->delete('productimages', array('imagename' => $picture));
            echo true;
            
        }
        
        public function newimage_form() 
	{
            //$this->check_Loginin();
            $this->load->view('fashion_admin/product_image_form');
        }
        
        public function productimagesave() 
        {
            $this->load->library('image_lib');
            //$this->load->library('upload');
            
            if (!empty($_FILES['product_image']['name']) )
                {
                    $file_name = "product_image";  // name of image input from the view
                    $newname = $_SESSION['rest_id'].'_'.$this->generate_random_string(4).'_product'.time();	 // Random Encryp new name save to app
                    
                    
                    $config['upload_path'] = './assets/uploads/fashion_prod/mainimage/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = '2000';	
                    $config['remove_spaces']  = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = $newname;
                    $config['raw_name'] = $file_name ;

                    $this->load->library('upload', $config);
                    
                    if(!$this->upload->do_upload($file_name))
                    {
                        $mssg = $this->upload->display_errors();
                        //print("<pre>".print_r($mssg,true)."</pre>");
                        //die;
                        $this->session->set_flashdata('msg_r', $mssg);
                        $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => $mssg
                                            );
                        echo json_encode($Json_resultSave);
                        exit();
                    }
                    
                    $data = $this->upload->data(); 
                    create_thumb($data, '250', '300', './assets/uploads/fashion_prod/thumbs/', TRUE);
                         
                       
                    // data to save in db
                    // 
                    $exploded = explode('.',$_FILES['product_image']['name']);
                    $file_extn = strtolower(end($exploded));
                    
                
                $path = './assets/uploads/fashion_prod/';  
                $cropimg_data = $_POST['cropimg'];
                // smth like:- data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

                $cropimg_remove_array1 = explode(";", $cropimg_data);
                // smth like:- base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

                $cropimg_remove_array2 = explode(",", $cropimg_remove_array1[1]);
                // smth like:- iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

                $cropimg = base64_decode($cropimg_remove_array2[1]);

                //$newname = $this->generate_random_string(4).'_banner'.time(). '.png';	 // Random Encryp new name save to app
                $newname_1 = $newname.'.'.$file_extn;
                
                if (!is_dir($path)) {
                  mkdir($path);
                }
                file_put_contents($path.$newname_1, $cropimg);
            
                
                
                $this->db->insert('productimages', array(
                                    'restaurantid'  => $_SESSION['rest_id'],
                                    'imagename' => $data['file_name']
                                ));
                
                
                 
                $output = '';
                $num = $this->generate_random_string(4);
                $output .= '
                    <div class="preview-image preview-show-'. $num. '" >
                        <div class="image-cancel" data-no="'. $num .'" data-key="'.$data["file_name"].'">x</div> 
                        <div class="image-zone">
                           <img id="pro-img-'.$num . '" src="'.site_url('assets/uploads/fashion_prod/').$data["file_name"].'"  />  
                        </div>
                        <input type="hidden" id="" name="prd_images[]" class="form-control img_prd" value="'.$data["file_name"].'">

                    </div>
                    ';
                
                
                $Json_resultSave = array (
                                        'status' => '1',
                                        'content'=>$output
                                        );
                echo json_encode($Json_resultSave);
                exit();
            }
            //print("<pre>".print_r($data_New,true)."</pre>");//die;
            

            

        }
        
        public function save_colorimage() 
        {
            if (!empty($_FILES['var_files']['name']) )
            {
                
                $output = '';
                
                //$newname = '16_'.time();//$_SESSION['rest_id'].'_'.time();	 // Random Encryp new name save to app
                
                
                $config['upload_path'] = './assets/uploads/fashion_prod/';
                $config['allowed_types'] = 'jpg|jpeg|png';	
                $config['remove_spaces']  = TRUE;
                $config['overwrite'] = TRUE;
                $this->load->library('upload', $config);
                //$this->upload->initialize($config);
                foreach($_FILES['var_files']['name'] as $i => $images)
                {
                    $exploded = explode('.',$images);
                    $file_extn = strtolower(end($exploded));
                    //print("<pre>".print_r($i."--".$images,true)."</pre>");
                    
                    //$ext = end((explode(".", $_FILES['files']['name'][$i])));
                    //$file_name = time().$i."_".($i+1).".".$ext;
                    
                    $newname = $_SESSION['rest_id'].'_colorimg_'.time().$i.($i+1).".".$file_extn;
                    
                    $_FILES ['userfile'] ['name'] =         $newname;
                    //$_FILES ['userfile'] ['name'] =        $_FILES['var_files']['name'][$i]; //$newname
                    $_FILES ['userfile'] ['type'] =        $_FILES ['var_files'] ['type'] [$i];
                    $_FILES ['userfile'] ['tmp_name'] =    $_FILES ['var_files'] ['tmp_name'] [$i];
                    $_FILES ['userfile'] ['error'] =       $_FILES ['var_files'] ['error'] [$i];
                    $_FILES ['userfile'] ['size'] =        $_FILES ['var_files'] ['size'] [$i];
                    
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('userfile'))
                        {
                            echo $this->upload->display_errors();  
                        }
                    else 
                        {
                            $data = $this->upload->data(); 
                            // using Thumbsnails helper
                            create_thumb($data, '80', '80', './assets/uploads/fashion_prod/thumbs/', TRUE);

                            /*
                            //Resize Configs
                            $config_1['image_library'] = 'gd2';  
                            $config_1['source_image'] = './assets/uploads/fashion_prod/'.$data["file_name"];  
                            $config_1['create_thumb'] = FALSE;  
                            $config_1['maintain_ratio'] = FALSE;
                            $config_1['quality'] = 60;  
                            $config_1['width'] = 80;  
                            $config_1['height'] = 80;  
                            $config_1['new_image'] = './assets/uploads/fashion_prod/thumbs/'.$data["file_name"];  
                            $this->load->library('image_lib', $config_1); 
                            $this->image_lib->initialize($config_1);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            
                             * 
                             */
                            
                            $num = $this->generate_random_string(4);
                            $this->db->insert('productimages', array(
                                                'restaurantid'  => $_SESSION['rest_id'],
                                                'imagename'     => $data['file_name'],
                                                'colorimg'      => 1
                                            ));
                              
                            $output .= $data["file_name"];
                        } 
                    //else{ print_r($this->upload->display_errors()); }
                }
                //print("<pre>".print_r($output,true)."</pre>");die;
                echo $output;
                
            }
        }
        public function save_product() 
        {
            $this->check_Loginin();
            //$newname = md5(uniqid(mt_rand(), true));	 // Random Encryp new name save to app
            //$user_id = $_SESSION['rest_id'];
            
            if(isset($_POST["variant_check"]) )
            {
                
                // insert to product db
                $data_New = array(  
                                    'merchantid'    =>  $_SESSION['rest_id'],
                                    'productname'   =>  $_POST["product_name"],
                                    'productdesc'   =>  $_POST["product_desc"]
                                 );
                //print("<pre>".print_r($data_New,true)."</pre>");die;
                $getid_insert = $this->Fashion_model->_save_product($data_New);// insert to db to return product id
                
                
                if($getid_insert)
                {
                    // insert to product variant db by product id
                    $discountcheck=0;
                    foreach($_POST['variant_check'] as $key => $value)
                    {
                        
                        $getcolorid = $this->Fashion_model->_getcolorid($value);// insert to db to return color id;
                        $getsizeid= $this->Fashion_model->_getsizeid($_POST['variant_size'][$key]);// insert to db to return size id;
                             $data_New2 = array(
                                        'productid'      => $getid_insert,
                                        'quantity'       => $_POST["variant_qty"][$key],
                                        'productinstock' => $_POST["variant_qty"][$key],
                                        'price'          => $_POST['variant_price'][$key],
                                        'discount_price' => $_POST["variant_discount"][$key],
                                        'sizeid'         => $getsizeid,//$_POST['variant_size'][$key],
                                        'colorid'        => $getcolorid,//$value,
                                        'colorimagename' => $_POST['variant_name'][$key],
                                        'colorimage'     => $_POST['variant_colorimage'][$key],
                                     );
                            //print("<pre>".print_r( $data_New2,true)."</pre>");
                            $insert_data=$this->Fashion_model->_savevariant($data_New2);// insert to db
                        if(!empty($_POST["variant_discount"][$key]))
                        {
                           $discountcheck=1; 
                        }
                    } 
                    $update = array(  
                                    'discount_percentage'  =>  $discountcheck
                                    );
                    
                    $this->db->set($update); 
                    $this->db->where("id",$getid_insert); //which row want to upgrade  
                    $this->db->update("products_fashion"); 
                    
                    foreach($_POST['category'] as $key=>$cat_name) 
                    {
                        $data_New3= array(  
                                        'cat_fasid'     =>  $cat_name,
                                        'product_fasid' =>  $getid_insert
                                     );
                        //$this->db->insert('product_cat_assign',$data_New3);
                        $this->Fashion_model->_save_categories($data_New3);// insert to Product category db to return product id
                    }

                    
                    
                    // insert to product images db by product id
                    if(!empty($_POST['prd_images']) )
                    {
                        
                        $update = array(  
                                        'productid'  =>  $getid_insert
                                        );
                        foreach($_POST['prd_images'] as $key=>$prd_image) 
                        {
                            $where = array(  
                                        'imagename'     =>  $prd_image,
                                        'restaurantid'  =>  $_SESSION['rest_id'],
                                     );
                            $this->Fashion_model->_update_image($update,$where);
                        }
                        //print("<pre>".print_r($where,true)."</pre>");die;
                        
                    }
                    if(!empty($_POST['prd_images']) )
                    {   
                        $update = array(  
                                        'productid'  =>  $getid_insert
                                        );
                        foreach($_POST['variant_colorimage'] as $key=>$var_image) 
                            {
                                $where = array(  
                                            'imagename'     =>  $var_image,
                                            'restaurantid'  =>  $_SESSION['rest_id'],
                                         );
                                $this->Fashion_model->_update_image($update,$where);
                            }
                    }
                }
                

            }
            
            
            if($insert_data) 
                {

                        $Json_resultSave = array (
                                                'status' => '1',
                                                );
                        echo json_encode($Json_resultSave);
                        exit();
                }
            
        }
        
        public function get_product()
	{  
                $get_prod = $this->Fashion_model->_get_product();
                
                //print("<pre>".print_r($get_prod,true)."</pre>");die;

                $data_prod = array();  
                foreach($get_prod as $row)  
                {  
                    $sub_array = array();
                    
                    $sum_qty = $this->Fashion_model->sum_qty($row->id);
                    
                     
                    $parent_cat= $row->categoryparentid;
                    
                    if($parent_cat !='0')
                        {
                            $parent_cat = $this->Fashion_model->cat_parent($parent_cat);
                        }
                    else
                        {
                            $parent_cat =$row->categoryname;
                        }
                     
                     $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));
                     
                     $products_img = null;
                                    if(!empty($row->productfrontimage))
                                        {
                                            $products_img= $row->productfrontimage;
                                        }
                                    elseif (!empty($row->imagename)) 
                                        {
                                            $products_img= $row->imagename;
                                        }
                                    else 
                                        {
                                            $products_img= 'product_img_1.jpg';
                                        }
                     $price = '<div class="text-center"> ₦'.$row->price.'</div>';
                                if($row->min_price != $row->max_price)
                                {
                                    $price = '<div class="text-center"> <b>₦'.$row->min_price.'</b> - <b>₦'.$row->max_price. '</b></div>';
                                }
                     
                     $sub_array[] = '<img class="db_prdimg" src="'. site_url('assets/uploads/fashion_prod/'). $products_img.'" width="70px" height="70px" >';  
                     $sub_array[] = $row->productname;  
                     $sub_array[] = $parent_cat;
                     $sub_array[] = '<b>'.$sum_qty.'</b> in stock for<br> <b>' .$row->variant.'</b> Variant';
                     $sub_array[] = $price;
                     
                     $status = '';
                     $status .= '
                                <div class="statusdiv_'.$row->id.'">
                                    <a href="javascript:void(0);" class="editstatus" data-product_id="'.$row->id.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>';
                                  if($row->status == 1)
                                  {
                                      $status .= '<span class="label label-success">Active</span>';
                                  }
                                  else
                                  {
                                      $status .='<span class="label label-default">Inactive</span>';
                                  }
                    $status .='<div>';
                     
                     $sub_array[] = $status;
                     $sub_array[] = '<div class="btn-group btn-group-xs"> 

                                        <a href="'.site_url('restaurant_admin/quickproduct_view').'" id="'.$row->id.'" data-product_id="'.$row->id.'"  data-toggle="modal" data-tooltip="tooltip" data-target="#modal_prd" title="View" class="jboxtooltip btn btn-xs btn-default prd_view"><i class="fa fa-eye"></i></a>

                                        <a href="" id="'.$row->id.'" data-product_id="'.$row->id.'" data-product_name="'.$row->productname.'" data-toggle="tooltip" title="Delete" class="jboxtooltip btn btn-xs btn-danger prd_del"><i class="fa fa-times"></i></a>

                                    </div>';  
                     $data_prod[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_prod,true)."</pre>");die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Fashion_model->_get_product_all(),  
                     "recordsFiltered"  =>     $this->Fashion_model->_get_filtered_data(),  
                     "data"             =>     $data_prod  
                );  
                echo json_encode($output);  
                
      
	}
        
        public function get_product_stock()
	{  
                $get_prod = $this->Fashion_model->_get_product_stock();
                
               // print("<pre>".print_r($get_prod,true)."</pre>");die;

                $data_prod = array();  
                foreach($get_prod as $row)  
                {  
                    $sub_array = array();
                    
                    $sum_qty = $this->Fashion_model->sum_qty($row->id);
                    
                     
                    $parent_cat= $row->categoryparentid;
                    
                    if($parent_cat !='0')
                        {
                            $parent_cat = $this->Fashion_model->cat_parent($parent_cat);
                        }
                    else
                        {
                            $parent_cat =$row->categoryname;
                        }
                     
                    //$sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));
                     
                     $products_img = null;
                                    if(!empty($row->productfrontimage))
                                        {
                                            $products_img= $row->productfrontimage;
                                        }
                                    elseif (!empty($row->imagename)) 
                                        {
                                            $products_img= $row->imagename;
                                        }
                                    else 
                                        {
                                            $products_img= 'product_img_1.jpg';
                                        }
                     
                     $sub_array[] = '<img class="db_prdimg" src="'. site_url('assets/uploads/fashion_prod/'). $products_img.'" >';  
                     $sub_array[] = $row->productname;  
                     
                     
                    $inventory = '';
                               if($row->variant <= 1)
                                   {
                                        $color = $this->Fashion_model->get_color_where($row->variant_colorid);
                                        if(empty($row->variant_colorimagename))
                                        {
                                            $colorname= $color[0]['colorname'];
                                        }
                                        else
                                        {
                                            $colorname= $row->variant_colorimagename;
                                        }
                                        
                                        $sizename ='';
                                        if(empty($row->variant_sizeid))
                                        {
                                            $sizename .= '';
                                        }
                                        else
                                        {
                                            $size = $this->Fashion_model->get_size_where($row->variant_sizeid);
                                            $sizename .= '<br> Size: <b>'.$size[0]['sizename'].'-'.$size[0]['sizecode'].'</b>' ;
                                        }
                                        
                                        $inventory .= ' Color: <b> ' .$colorname.'</b>'.$sizename;
                                   }
                                else
                                {
                                    $inventory .= '<div class="btn-group btn-group-sm"> 

                                                        <a href="'.site_url('fashion_admin/quickproductstock_edit').'" id="'.$row->id.'" data-product_id="'.$row->id.'" data-product_name="'.$row->productname.'" data-img="'.$products_img.'" data-toggle="modal" data-toggle="tooltip" data-target="#modal_stock" title="Show more Inventory" class=" btn btn-sm btn-default show_inventory"> Show Inventory</a>

                                                    </div>';  
                                }
                     
                     $sub_array[] = $inventory;
                     
                     
                     $sales = '';
                     $sales .= '
                                <div class="statusdiv_'.$row->id.'">
                                    <a href="javascript:void(0);" class="editstatus" data-product_id="'.$row->id.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>';
                                  if($row->sales == 1)
                                  {
                                      $sales .= '<span class="label label-success">Active</span>';
                                  }
                                  else
                                  {
                                      $sales .='<span class="label label-default">Inactive</span>';
                                  }
                    $sales .='<div>';
                     
                    $sub_array[] = $sales;
                    
                    $price='';
                    $stock='';
                    
                    if($row->variant <= 1)
                    {
                        $disco=$row->variant_discount_price;
                         if( ( (int)$disco== 0) || (empty($disco)) )
                            {
                                $price  .= '<div class="price_'.$row->variant_id.'"> &nbsp;
                                                <a href="javascript:void(0);" class="editprice" data-price_id="'.$row->variant_id.'"  data-price="'.$row->variant_price.'">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a> &nbsp;
                                                Price: <b>₦'.$row->variant_price.
                                            '</b></div>';
                                $price .='';
                                
                                $price  .= '<div class="disco_price_'.$row->variant_id.'"> &nbsp;
                                                <a href="javascript:void(0);" title="Add/Edit Product Discount-OFF" class=" editdisco" data-disco_id="'.$row->variant_id.'"  data-disco_price="'.$row->variant_discount_price.'">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a> &nbsp;
                                                Discount-off: <b> '.$row->variant_discount_price.
                                            '</b></div>';
                                
                            }
                            else
                            {
                                $price  .= '<div class="price_'.$row->variant_id.'"> &nbsp;
                                                <a href="javascript:void(0);" class="editprice" data-price_id="'.$row->variant_id.'"  data-price="'.$row->variant_price.'">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a> &nbsp;
                                                Price: <b>₦'.$row->variant_price.
                                            '</b></div>';
                                
                                $price  .= '<div class="disco_price_'.$row->variant_id.'"> &nbsp;
                                                <a href="javascript:void(0);" title="Add/Edit Product Discount-OFF" class=" editdisco" data-disco_id="'.$row->variant_id.'"  data-disco_price="'.$row->variant_discount_price.'">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a> &nbsp;
                                                Discount-off: <b> ₦'.$row->variant_discount_price.
                                            '</b></div>';
                            }
                            
                            $stock  .= '<div class="price_'.$row->variant_id.'"> &nbsp;
                                                <a href="javascript:void(0);" class="editstock" data-stock_id="'.$row->variant_id.'"  data-stock="'.$sum_qty.'">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a> &nbsp;
                                                In Stock: <b>'.$sum_qty.
                                            '</b></div>';
                        
                       
                    }
                    else
                    {
                        $price .= '<div class="btn-group btn-group-sm"> 

                                        <a href="'.site_url('fashion_admin/quickproductstock_edit').'" id="'.$row->id.'" data-product_id="'.$row->id.'" data-product_name="'.$row->productname.'" data-img="'.$products_img.'" data-toggle="modal" data-toggle="tooltip" data-target="#modal_stock" title="Show more Inventory" class=" btn btn-sm btn-default show_inventory"> Show Inventory</a>

                                    </div>'; 
                        /*
                        $stock .= '<div class="btn-group btn-group-sm">
                                    <a href="" id="'.$row->id.'" data-product_id="'.$row->id.'" data-product_name="'.$row->productname.'" data-toggle="tooltip" title="Show more Inventory" class="jboxtooltip btn btn-sm btn-default show_inventory"> Show Inventory</a>
                                   </div>'; 
                         * 
                         */
                        $stock .='<b>'.$sum_qty.'</b> in stock for<br> <b>' .$row->variant.'</b> Variant';
                    }
                    
                     
                    $sub_array[] = $price;
                    $sub_array[] = $stock;
                     
                     $sub_array[] = '<div class="btn-group btn-group-sm"> 

                                        <a href="'.site_url('fashion_admin/quickproduct_view').'" id="'.$row->id.'" data-product_id="'.$row->id.'"  data-tooltip="tooltip"  title="Full Stock Management page" class="jboxtooltip btn btn-sm btn-default prd_view"><i class="fa fa-eye"> Full Details</i></a>
                                    </div>';  
                     $data_prod[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_prod,true)."</pre>");die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Fashion_model->_get_product_stock_all(),  
                     "recordsFiltered"  =>     $this->Fashion_model->_get_stock_filtered_data(),  
                     "data"             =>     $data_prod  
                );  
                echo json_encode($output);  
                
      
	}
        
        public function quickproductstock_edit()
        {
            $prd_id = $_POST["id"];
            $data['imgname']=$_POST["img"];
            
            $data['inv'] = $this->Fashion_model->get_productstock_list($prd_id);
            //$data['product_list'] = $this->Fashion_model->get_product_list($prd_id); // call addition product that can be added to menus
            //print("<pre>".print_r($this->Fashion_model->get_productstock_list($prd_id),true)."</pre>");
            //die;
            //$data ['icon']= 'jol_1.ico';
            //$this->load->view('oye_mainpage_v/order_form', $data);
            
            $this->load->view('fashion_admin/productstock_quickedit',$data);
        }
        
        public function statusupdate()
	{   
            $this->check_Loginin();
            
            $status_id = $_POST["status"];
            $prd_id = $_POST["prd_id"];
            $save_status = $this->Fashion_model->_update_status($prd_id,$status_id); 
                
                if($save_status)
                {
                     $status = '';
                     $status .= '
                                <div class="statusdiv_'.$prd_id.'">
                                    <a href="javascript:void(0);" class="editstatus" data-product_id="'.$prd_id.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>';
                                  if($status_id == 1)
                                  {
                                      $status .= '<span class="label label-success">Active</span>';
                                  }
                                  else
                                  {
                                      $status .='<span class="label label-default">Inactive</span>';
                                  }
                    $status .='<div>';

                    echo json_encode($status);
                    exit();
                }

	}
        
        public function prd_salesupdate()
	{   
            $this->check_Loginin();
            
            $status_id = $_POST["status"];
            $prd_id = $_POST["prd_id"];
            $save_status = $this->Fashion_model->_update_sales($prd_id,$status_id); 
                
                if($save_status)
                {
                     $status = '';
                     $status .= '
                                <div class="statusdiv_'.$prd_id.'">
                                    <a href="javascript:void(0);" class="editstatus" data-product_id="'.$prd_id.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>';
                                  if($status_id == 1)
                                  {
                                      $status .= '<span class="label label-success">Active</span>';
                                  }
                                  else
                                  {
                                      $status .='<span class="label label-default">Inactive</span>';
                                  }
                    $status .='<div>';

                    echo json_encode($status);
                    exit();
                }

	}
        
        public function pricestock_update()
        {
            $this->check_Loginin();
            
            $type = $_POST["_type"];
            
            if($type=='price')
            {
                if(empty($_POST["value"]))
                {
                    $value=NULL;
                }
                else
                {
                    $value=$_POST["value"];
                }
                $data_update = array(  
                                'price' => $value,
                             );
                
                $data_where = array(  
                                'id' => $_POST["_id"],
                             );
            }
            else if($type=='discount')
            {
                if(empty($_POST["value"]))
                {
                    $value=NULL;
                }
                else
                {
                    $value=$_POST["value"];
                }
                $data_update = array(  
                                'discount_price' => $value,
                             );
                
                $data_where = array(  
                                'id' => $_POST["_id"],
                             );
            }
            else if($type=='stock')
            {
                $data_update = array(  
                                'productinstock' => $_POST["value"],
                             );
                
                $data_where = array(  
                                'id' => $_POST["_id"],
                             );
            }
            
            $save_data = $this->Fashion_model->_update_price_stock($data_update,$data_where); 
                
                if($save_data)
                {
                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                }
            
        }
        
        
        
        public function get_order()
	{  
            
                $resta_id = $_SESSION['rest_id'];
                $get_data = $this->Fashion_model->_get_order();
                
                //print("<pre>".print_r($get_data,true)."</pre>");
                //die;

                $data_cate = array();  
                foreach($get_data as $row)  
                {  
                    $sub_array = array(); 
                    $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat)).'<br/> <b>'.$row->ordercode.'</b>';
                     
                    
                    $sub_array[] = '<a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-md btn-default">View <i class="fa fa-eye"></i></a>';
                    $sub_array[] = $row->note;
                    $sub_array[] = $row->deliverytype;
                     
                    $action = ' <div class="btn-group btn-group-xs">';
                    
                    $status = '';
                    $status .= '<div class="statusdiv_'.$row->id.'">';
                                    
                                  if($row->status == '2')
                                  {
                                      $status .= '<span class="label label-warning">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                            
                                                    <a href="javascript:void(0)" id="ord_del '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Move to delivery" class="jboxtooltip ord_del btn btn-xs btn-info"><i class="fa fa-road"></i></a>
                                                 ';
                                  }
                                  else if($row->status == '3')
                                  {
                                      $status .= '<span class="label label-info">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Delivery Order"  data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-info"><i class="fa fa-truck"></i></a>
                                          
                                                 ';
                                  }
                                  else if($row->status == '4')
                                  {
                                      $status .= '<span class="label label-success">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View delived Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-success"><i class="fa fa-eye"></i></a>

                                                 ';
                                  }
                                  else if($row->status == '5')
                                  {
                                      $status .= '<span class="label label-danger">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="javascript:void(0)" id="'.$row->id.'" data-toggle="tooltip" title="View Cancel Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-danger"><i class="fa fa-eye"></i></a>
                                                  ';
                                  }
                                  else
                                  {
                                      $status .='<span class="label label_pending">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                            
                                                    <a href="javascript:void(0)" id="ord_pro '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Accept Order" class="jboxtooltip ord_pro btn btn-xs btn-warning"><i class=" fa fa-fast-forward"></i></a>

                                                    <a href="javascript:void(0)" id="ord_can '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Cancel Order" class="jboxtooltip ord_can btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                 ';
                                  }
                    $status .='<div>';
                    $action .='</div>';
                    
                    
                    $sub_array[] = $status;
                    
                    $data_cate[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_prod,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Fashion_model->_get_all_order(),  
                     "recordsFiltered"  =>     $this->Fashion_model->_get_filtered_data_order(),  
                     "data"             =>     $data_cate  
                );  
                echo json_encode($output);  
                
      
	}
        
        
        public function cancel_orderform() 
        {
            $check=$this->Session_model->validate(__METHOD__);
            
            if($check !="true")
            {
                $data['access_denied'] = TRUE;
            
            }
            else
            {
                $data['access_denied'] = FALSE;
            }
            $data['data_id']   = $_POST["data_id"];
            $data['data_orderid']   = $_POST["data_order"];


            //$data_subcate=$this->Fashion_model->get_subcategory_details($_POST["data_id"]);

            //print("<pre>".print_r($data_subcate[0]->categoryname,true)."</pre>");die;

            $this->load->view('fashion_admin/cancel_orderform',$data);
        }
        public function get_order_by()
	{
                
                $status_id = $this->uri->segment(3);
                $get_data = $this->Fashion_model->_get_order_by($status_id);
                
                //print("<pre>".print_r($get_data,true)."</pre>");
                //die;

                $data_cate = array();  
                foreach($get_data as $row)  
                {  
                     $sub_array = array(); 
                     
                    $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat)).'<br/> <b>'.$row->ordercode.'</b>';
                    $sub_array[] = '<a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-sm btn-default">View <i class="fa fa-eye"></i></a>';
                    
                    $get = '';
                    $action ='';
                                    
                                  if($row->status == '2')
                                  {
                                      $action .= '
                                                    <a href="javascript:void(0)" id="ord_del '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Move to Disperse" class="jboxtooltip ord_del btn btn-sm btn-info">Move to Disperse <i class="fa fa-road"></i></a>
                                                 ';
                                      $get .= '<span class="">'.$row->note.'</span>';
                                  }
                                  else if($row->status == '3')
                                  {
                                      $get .= '<span class="label label-info">'.$row->orderstatus_desc.' <i class="fa fa-truck"></i></span>';
                                      $action .= '<span class="">'.$row->note.'</span>';
                                  }
                                  else if($row->status == '4')
                                  {
                                       $get.= '<span class="label label-success">'.$row->orderstatus_desc.' <i class="fa fa-eye"></i></span>';
                                       $action.= '<span class="">'.$row->note.'</span>';
                                  }
                                  else if($row->status == '5')
                                  {
                                      $action .= '<span class="">'.$row->cancledordercomment.'</span>';
                                      $get .= '<span class="label label-danger">'.$row->orderstatus_desc.'</span>';
                                  }
                                  else
                                  {
                                      $action .='<a href="javascript:void(0)" id="ord_pro '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Accept Order" class="jboxtooltip ord_pro btn btn-sm btn-success">Accept Order <i class="fa fa-fast-forward"></i></a>';
                                      $get .= '
                                                <a href="'. site_url('fashion_admin/cancel_orderform') .'" id="ord_can '.$row->id.'" data-get="'.$row->id.'" data-orderid="'.$row->ordercode.'" data-toggle="modal" data-target="#modal_cancel" data-container="modal_cancel" data-toggle="true" title="Cancel Order" class="jboxtooltip ord_can btn btn-sm btn-danger">Cancel Order <i class="fa fa-times"></i></a>
                                              ';
                                  }
                    
                    $sub_array[] = $action;
                    $sub_array[] = $get;
                    $data_cate[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_prod,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Fashion_model->_get_all_order_by($status_id),  
                     "recordsFiltered"  =>     $this->Fashion_model->_get_filtered_data_order_by($status_id),  
                     "data"             =>     $data_cate  
                );  
                echo json_encode($output); 
        }
        
        
        public function order_nav_tray() 
	{
            $data['pending']    = $this->Fashion_model->_get_pending_order();
            $data['processing'] = $this->Fashion_model->_get_processing_order();
            $data['canceled']   = $this->Fashion_model->_get_canceled_order();
            $data['delivery']   = $this->Fashion_model->_get_delivery_order();
            $data['delivered']  = $this->Fashion_model->_get_delivered_order();
            $this->load->view('fashion_admin/order_nav',$data);
        }
        
        public function view_pending_order()
	{
            $data['pending']    = $this->Fashion_model->_get_pending_order();
            $data['processing'] = $this->Fashion_model->_get_processing_order();
            $data['canceled']   = $this->Fashion_model->_get_canceled_order();
            $data['delivery']   = $this->Fashion_model->_get_delivery_order();
            $data['delivered']  = $this->Fashion_model->_get_delivered_order();
            $this->load->view('fashion_admin/order_pending',$data);
        }
        
        public function view_processing_order()
	{
            $data['pending']    = $this->Fashion_model->_get_pending_order();
            $data['processing'] = $this->Fashion_model->_get_processing_order();
            $data['canceled']   = $this->Fashion_model->_get_canceled_order();
            $data['delivery']   = $this->Fashion_model->_get_delivery_order();
            $data['delivered']  = $this->Fashion_model->_get_delivered_order();
            $this->load->view('fashion_admin/order_processing',$data);
        }
        public function unseen_orders() {
            $data_count = $this->Fashion_model->_unseen_orders();
            
            $Json_resultSave = array (
                                            'unseen_notification' => $data_count,
                                            );
            echo json_encode($Json_resultSave);
            exit();
        }
        
        public function update_order_flow()
	{
            $order_status = $_POST["order"];
            $ord_id = $_POST["ord_id"];
            
            if($order_status == "pro")
                {
                    $method='Admin::product_accept';
                    $order_status =2; 
                }
            elseif ($order_status == "del") 
                {
                    $method='Admin::product_move_disperse';
                    $order_status =3;
                }
            elseif ($order_status == "can") 
                {
                    $method='Admin::product_accept';
                    $order_status =5;
                }
            $check=$this->Session_model->validate($method);
            if($check =="true")
            {
                $data_update = $this->Fashion_model->_update_order_flow($order_status, $ord_id);

                if($data_update)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
            }
            else
            {
                
                $Json_resultSave = array (
                                        'status' => '0',
                                        );
                echo json_encode($Json_resultSave);
                exit();

            }
            
        }
        
        function delete_logoimage() 
        {
            //rmdir($dir); //to delete directory use
            
            $fullpath = './assets/uploads/fashion_prod/';
            $thumbpath = './assets/uploads/fashion_prod/thumbs/';
            $picture=$_POST["r_logoimage"];
            
            unlink($fullpath.$picture);
            unlink($thumbpath.$picture);
            $this->db->delete('productimages', array('imagename' => $picture));
            echo true;
            
        }
        
        public function update_restaurant_data() 
        {
            $this->check_Loginin();
            // Update the Restaurant data  //
           
            
            if (!empty($_FILES['r_logo']['name']) )
                {
                    $fullpath = './assets/uploads/fashion_logo/';
                    $picture=$_POST["r_logoimage"];

                    unlink($fullpath.$picture);
                    
                    $file_name = "r_logo";  // name of image input from the view
                    $newname = $_SESSION['rest_id'].'_'.time();	 // Random Encryp new name save to app

                    $config['upload_path'] = './assets/uploads/fashion_logo/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = '1096';	
                    $config['remove_spaces']  = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = $newname;//$_POST["r_logoimage"];

                    $this->load->library('upload', $config);
                    
                    if(!$this->upload->do_upload($file_name))
                        {
                            $mssg = $this->upload->display_errors();
                            //print("<pre>".print_r($mssg,true)."</pre>");
                            //die;
                            $this->session->set_flashdata('msg_r', $mssg);
                            $Json_resultSave = array (
                                                'status' => '0',
                                                'content' => $mssg
                                                );
                            echo json_encode($Json_resultSave);
                            exit();
                        }
                         
                       
                    // data to save in db
                    // 
                    $exploded = explode('.',$_FILES['r_logo']['name']);
                    $file_extn = strtolower(end($exploded));
                    
                            $data_New = array(  
                                        'companyname'   =>  $_POST['r_name'],
                                        'companydesc'   =>  $_POST["r_desc"],
                                        'logo'         =>  $newname.'.'.$file_extn,
                                     );
                }
            else 
                {          
                    
                    $data_New = array(  
                                        'companyname'   =>  $_POST['r_name'],
                                        'companydesc'   =>  $_POST["r_desc"]
                                     );
                }
                $insert_data = $this->Fashion_model->_update_restaurant_data($data_New);// insert to db
                
                if($insert_data) 
                {

                        $Json_resultSave = array (
                                                'status' => '1',
                                                'content' => 'Update successfull...'
                                                );
                        echo json_encode($Json_resultSave);
                        exit();
                }
                else 
                {
                        $Json_resultSave = array (
                                                'status' => '0',
                                                'content' => 'There was a problem!! Pls Try Again.....'
                                                );
                        echo json_encode($Json_resultSave);
                        exit();
                }
            
        }
       
        public function update_location_data() 
        {
            $this->check_Loginin();
            
            // Update the Restaurant data  //
            $data_New = array(  
                                'address'=>  $_POST['r_add'],
                                'stateid'=>  $_POST["r_state"],
                                'cityid' =>  $_POST["r_city"],
                                'latitude'     =>  $_POST["latitude"],
                                'longitude'    =>  $_POST["longitude"],
                                'email'  =>  $_POST["r_email"],
                                'phone'  =>  $_POST["cell1"],
                                'phone2' =>  $_POST["cell2"]
                             );
            $insert_data = $this->Fashion_model->_update_restaurant_data($data_New);// insert to db

            if($insert_data) 
            {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => 'Update successfull...'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            else 
            {
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            
        }
        
        public function update_general_data() 
        {
            $this->check_Loginin();
            
            // Update the Restaurant data  //
            $data_New = array(  
                                'firstname' =>  $_POST['g_firstname'],
                                'lastname'  =>  $_POST["g_lastname"],
                                //'email'     =>  $_POST["g_email"],
                                'phonenumber'=>  $_POST["g_cell"]
                             );
            $insert_data = $this->Fashion_model->_update_general_data($data_New);// insert to db

            if($insert_data) 
            {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => 'Update successfull...'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            else 
            {
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            
        }
        
        public function update_restaurant_status() 
        {
            $this->check_Loginin();
            
            // Update the Restaurant status  //
            $status=0;
            if(isset($_POST["rest_status"]))
            {
               $status=1;
            }
            $data_New = array(  
                                'status'=>  $status
                             );
            $insert_data = $this->Fashion_model->_update_restaurant_data($data_New);// insert to db

            if($insert_data) 
            {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => 'Update successfull...'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            else 
            {
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            
        }
        
	public function password_change()
        {
            $this->check_Loginin();
            
            $pwd_c =   md5($_POST["oldpwd"]);
            $pwd_check= $this->Fashion_model->check_User_pwd($pwd_c);
            
            if($pwd_check)
             {
                $newpwd = md5($_POST["cfmpwd"]);
                $pwd_save = $this->Fashion_model->Update_pwd($newpwd);
                $Json_resultSave = array (
                                        'status' => '1',
                                        'content' => 'Password Change .....'
                                        );
                echo json_encode($Json_resultSave);
                exit();
             }
            else 
             {
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'Incorrect Password.....'
                                        );
                echo json_encode($Json_resultSave);
                exit();
             }
        }
        public function user_table()
        {  
            //$this->check_Loginin();

            //$promo_type ="free";
            $get_data = $this->Fashion_model->_get_users();

            //print("<pre>".print_r($get_data,true)."</pre>");die;
            $sn=0;
            $data_order = array();  
            foreach($get_data as $row)  
            {  


                $sub_array = array(); 
                $sub_array[] = ++$sn;
                $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));

                $firstname  = '<div class="cat_namediv_'.$row->id.'"> &nbsp;
                                    <a href="javascript:void(0);" class="editname" data-cat_id="'.$row->id.'"  data-cat_name="'.$row->firstname.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a> &nbsp;
                                    '.$row->firstname.
                                '</div>';

                $sub_array[] = $row->firstname;


                $lastname  = '<div class="cat_namediv_'.$row->id.'"> &nbsp;
                                    <a href="javascript:void(0);" class="editname" data-cat_id="'.$row->id.'"  data-cat_name="'.$row->lastname.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a> &nbsp;
                                    '.$row->lastname.
                                '</div>';

                $sub_array[] = $row->lastname;

                $sub_array[] = $row->email;

                $phonenumber  = '<div class="cat_namediv_'.$row->id.'"> &nbsp;
                                    <a href="javascript:void(0);" class="editname" data-cat_id="'.$row->id.'"  data-cat_name="'.$row->phonenumber.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a> &nbsp;
                                    '.$row->phonenumber.
                                '</div>';

                $sub_array[] = $row->phonenumber;

                $roleName = '<div class="statusdiv_'.$row->id.'">
                                <a href="javascript:void(0);" class="edituserrole" data-cat_id="'.$row->id.'">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>&nbsp;
                                    '.$row->roleName.
                                '</div>';

                $sub_array[] = $row->roleName;

                $status ='<div class="statusdiv_'.$row->id.'">';
                $action = ' <div class="btn-groupp btn-group-xsx">';
                /*
                if($row->status == "1")
                    {
                        $status .='<span class="label label-success"> Approved </span>';
                        $action .= '
                                      <a href="javascript:void(0)" id="'.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Decline B2B Promo Banner" class="jboxtooltip b2b_p_can btn btn-xs btn-danger"><i class="fa fa-times"></i> Decline</a>
                                   ';
                    }
                else
                    {
                        $status .='<span class="label label_pending"> Pending </span>';
                        $action .= '
                                      <a href="javascript:void(0)" id="'.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Approve B2B Promo Banner" class="jboxtooltip b2b_p_acc btn btn-xs btn-success"><i class="fa fa-check"></i> Approve</a>
                                   ';
                    }

                $status .='<div>';
                $action .='</div>';

                $status = '<div class="statusdiv_'.$row->id.'">';
                $action = '<div class="btn-group btn-group-xs">';

                $status = '';
                 * 
                 */

                if($row->id != $_SESSION['User_id']){

                $status .= '<div class="statusdiv_'.$row->id.'">
                                <a href="javascript:void(0);" class="editstatus" data-cat_id="'.$row->id.'">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>';
                        if($row->status == 1)
                        {
                            $status .= '<span class="label label-success">Active</span>';
                        }
                        else
                        {
                            $status .='<span class="label label-default">Inactive</span>';
                        }



                $status .='<div>
                            <!--<a style=" margin-left:15px;" href="" id=" '.$row->id.'" data-toggle="tooltip" data-id="'.$row->id.'" data-name="'.$row->firstname.'" title=" Delete User" class="jboxtooltip ban_can btn btn-xs btn-danger">
                                Delete User <i class="fa fa-times"></i>
                            </a>-->';

                 $action .='
                            <a href="" id="'.$row->id.'" data-user_id="'.$row->id.'" data-toggle="modal" data-tooltip="tooltip" data-target="" title="Resend Activation Email" class=" btn btn-xs btn-default send_email">Re-Send Activation Email <i class="fa fa-envelope-o"></i></a>
                            <a href="'.site_url('restaurant_admin/loaduser/'.$row->id).'" id="'.$row->id.'" data-user_id="'.$row->id.'" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_cate" title="Edit User" class=" btn btn-xs btn-default prd_view">Edit <i class="fa fa-eye"></i></a>

                            <a href="" id="'.$row->id.'" data-toggle="tooltip" data-id="'.$row->id.'" data-name="'.$row->firstname.' ' .$row->lastname.'" title="Delete" class=" btn btn-xs btn-danger user_del">Delete <i class="fa fa-times"></i></a>
                                ';
                }
                else
                    {

                        if($row->status == 1)
                        {
                            $status .= '<span style=" margin-left:15px;" class="label label-success">Active</span>';
                        }
                        else
                        {
                            $status .='<span style=" margin-left:15px;" class="label label-default">Inactive</span>';
                        }



                        $status .='<div>';
                    }
                $action .='<div>';


                $sub_array[] = $status;
                $sub_array[] = $action;
                $data_order[] = $sub_array;  

                //}
            } 
            //print("<pre>".print_r($data_order,true)."</pre>");die; 
            $output = array(  
                 "draw"             =>     intval($_POST["draw"]),  
                 "recordsTotal"     =>     $this->Fashion_model->_get_all_users(),
                 "recordsFiltered"  =>     $this->Fashion_model->_get_filtered_data_users(),
                 "data"             =>     $data_order  
            );  
            echo json_encode($output);  


        }

        public function loaduser() 
        {

            $data['cate'] = $this->Fashion_model->_user_role_rest($_SESSION['rest_id']);

            if(!empty($this->uri->segment(3)) )
            {

                $by_id = $this->uri->segment(3);

                    $data['title_type']= 'Edit Users Form';
                    $data['userinfo'] = $this->Restaurant_admin_model->get_user_info_byid($by_id);
                    //print("<pre>".print_r($this->Restaurant_admin_model->get_user_info_byid($by_id),true)."</pre>");
            }
            else
            {
                $data['title_type']= 'New Users Form';
                //print("<pre>".print_r($_SESSION,true)."</pre>");die; 
            }
            $this->load->view('fashion_admin/user_new_1',$data);
        }
        public function resendactivationemail()
        {
            if(!empty($this->uri->segment(3)) )
            {

                $by_id = $_POST['id'];

                $userinfo = $this->Fashion_model->get_user_info_byid($by_id);//get user details

                $restinfo=$this->Fashion_model->get_restaurant_info((int)$_SESSION['rest_id']);//get restaurant details


                // Generat new token //

                $token=$this->generate_random_string(15);

                $data_token = array(
                            'confirmemail'=> $token,
                            'password'=> '',
                            'forcepasswordchange'=> 0
                            );

                $this->Restaurant_admin_model->newtoken($data_token,$by_id);

                // send the customer an email
                $site_email ='segun@stakle.com';
                $logo = 'jol.png';
                $sendemail=$this->Email_model->send_restaurant_User_email($userinfo->firstname, $userinfo->lastname, $userinfo->email, $site_email, $logo, $restinfo->companyname,$token );
                //print("<pre>".print_r($this->Restaurant_admin_model->get_user_info_byid($by_id),true)."</pre>");
                if($sendemail)
                {
                    $Json_resultSave = array (
                                          'status' => '0',
                                          'content' => 'Activation Email Error'
                                          );
                    echo json_encode($Json_resultSave);
                    exit();
                }
                else
                {

                  $Json_resultSave = array (
                                      'status' => '1',
                                      'content' => 'Activation Email Sent '
                                      );
                    echo json_encode($Json_resultSave);
                    exit();
                }

            }
            else
            {
                $Json_resultSave = array (
                                      'status' => '0',
                                      'content' => 'Activation Email Error'
                                      );
              echo json_encode($Json_resultSave);
              exit();
            }
        }
        public function saveuser()
        {
            // save the new user data  table //
            $time = date('Y-m-d H:i:s');
            $tim  = strtotime($time);
            $token= do_hash($this->input->post('useremail').$tim);

            $data_check = array(  
                                     'email'  =>  $_POST["useremail"],// adding the Encryp name and the extention file 2gether
                                     'isdeleted' =>  0
                                     );
            $check_data = $this->Fashion_model->is_user_email_available($data_check);

            if($check_data)  
            {  
              $Json_resultSave = array (
                                      'status' => '0',
                                      'content' => 'Email Already Register'
                                      );
              echo json_encode($Json_resultSave);
              exit();
            }
            else
            {
                $data_New = array(  
                                        'restaurantid'  => $_SESSION['rest_id'],
                                        'userroleid'    => $_POST['userrole'],
                                        'firstname'     => $_POST['firstname'],
                                        'lastname'      => $_POST['lastname'],
                                        'email'         => $_POST['useremail'],
                                        'phonenumber'   => $_POST['phone'],
                                        'confirmemail'  => $token,
                                        'forcepasswordchange'   => 0,
                                        'status'        => 1
                                     );

                //print("<pre>".print_r($data_New,true)."</pre>");//die;
                $insert_data = $this->Fashion_model->_insertnewuser($data_New);// insert to db

                if($insert_data)
                {
                    $rest_info=$this->Fashion_model->get_restaurant_info($_SESSION['rest_id']);
                    // send the customer an email
                    $site_email ='segun@stakle.com';
                    $logo = 'jol.png';
                    $this->Email_model->send_restaurant_User_email($this->input->post('firstname'), $this->input->post('lastname'), $_POST['useremail'], $site_email, $logo, $rest_info->companyname,$token );

                    $Json_resultSave = array (
                                            'status' => '1'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                }
                else 
                {
                    $Json_resultSave = array (
                                                'status' => '0'
                                                );
                        echo json_encode($Json_resultSave);
                        exit();
                }
            }
        }

        public function update_user_status()
        {
            $status_id = $_POST["status"];
            $cat_id = $_POST["cat_id"];

           $data_update = $this->Fashion_model->_update_user_status($status_id, $cat_id);

            if($data_update)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 

        }
        public function updateuser()
        {
            $data_New = array(  
                                    'restaurantid'  =>  $_SESSION['rest_id'],
                                    'userroleid'    => $_POST['userrole'],
                                    'firstname'     => $_POST['firstname'],
                                    'lastname'      => $_POST['lastname'],
                                    //'email'         => $_POST['useremail'],
                                    'phonenumber'   => $_POST['phone']
                                 );

            //print("<pre>".print_r($data_New,true)."</pre>");//die;
            $insert_data = $this->Fashion_model->_update_user_data($data_New);// insert to db
            if($insert_data)
                {

                    $Json_resultSave = array (
                                            'status' => '1'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                }
            else {
                $Json_resultSave = array (
                                            'status' => '0'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }

        }
        public function deleteuser()
        {
            $by_id = $_POST["_id"];
            $_data = $this->Fashion_model->_delete_user($by_id);// delete to db
            if($_data)
                {

                    $Json_resultSave = array (
                                            'status' => '1'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                }
            else {
                $Json_resultSave = array (
                                            'status' => '0'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
        }

        public function userrole_table()
        {  
            //$this->check_Loginin();

            //$promo_type ="free";
            $get_data = $this->Fashion_model->_get_usersrole();

            //print("<pre>".print_r($get_data,true)."</pre>");die;
            $sn=0;
            $data_order = array();  
            foreach($get_data as $row)  
            {  


                $sub_array = array(); 
                $sub_array[] = ++$sn;
                $sub_array[] ='<b>'.$row->roleName.'</b>';

                $status ='<div class="statusdiv_'.$row->id.'">';
                $action = ' <div class="btn-groupp btn-group-xsx">';


                if($row->roleName == 'Super Admin'){  


                    if($row->status == 1)
                    {
                        $status .= '<span style=" margin-left:15px;" class="label label-success">Active</span>';
                    }
                    else
                    {
                        $status .='<span style=" margin-left:15px;" class="label label-default">Inactive</span>';
                    }
                    $action .='';
                }  
                else {
                $status .= '<div class="statusdiv_'.$row->id.'">
                                <a href="javascript:void(0);" class="editstatus" data-cat_id="'.$row->id.'">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>';
                        if($row->status == 1)
                        {
                            $status .= '<span class="label label-success">Active</span>';
                        }
                        else
                        {
                            $status .='<span class="label label-default">Inactive</span>';
                        }
                $action .='
                            <a href="'.site_url('fashion_admin/loaduserrole/'.$row->id).'" id="'.$row->id.'" data-product_id="'.$row->id.'" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_cate" title=" View Permissions" class=" btn btn-xs btn-default role_Per"> <i class="fa fa-lock"></i> Permissions</a>
                                ';
                }
                $status .='<div>';
                $action .='<div>';


                $sub_array[] = $status;
                $sub_array[] = $action;
                $data_order[] = $sub_array;  

                //}
            } 
            //print("<pre>".print_r($data_order,true)."</pre>");die; 
            $output = array(  
                 "draw"             =>     intval($_POST["draw"]),  
                 "recordsTotal"     =>     $this->Fashion_model->_get_all_usersrole(),
                 "recordsFiltered"  =>     $this->Fashion_model->_get_filtered_data_usersrole(),
                 "data"             =>     $data_order  
            );  
            echo json_encode($output);  


        }
        public function loaduserrole() 
        {
            if(!empty($this->uri->segment(3)) )
            {
                $by_id = $this->uri->segment(3);

                    $data['title_type']= 'Edit Users Role Form';
                    $data['roleinfo'] = $this->Fashion_model->get_userrole_info_byid($by_id);
                    $data['role_assign'] = $this->Fashion_model->get_role_assign_byid($by_id,$_SESSION['microType_id']);
                    //print("<pre>".print_r($this->Restaurant_admin_model->get_role_assign_byid($by_id,$_SESSION['microType_id']),true)."</pre>");//die;
            }
            else
            {

                $data['title_type']= 'New Users Role Form';
            }
            //print("<pre>".print_r($this->Restaurant_admin_model->_get_modules($sitetype),true)."</pre>");die;
            $sitetype= 2;//cuisine
            $data['cate'] = $this->Fashion_model->_get_modules($sitetype);
            $this->load->view('fashion_admin/userroles_new',$data);
        }
        public function saveuserroles()
        {
            $data_New = array(  
                                    'roleName' => $_POST['userrolename'],
                                    'roleFor'  =>  $_SESSION['rest_id'],
                                    'status'   => 1
                                 );

            //print("<pre>".print_r($data_New,true)."</pre>");//die;
            $insert_dataID = $this->Fashion_model->_insertnewuserroles($data_New);// insert to db

            $id_module = $this->input->post('module[]');

            $id_count = count($id_module);
            for ($i=0; $i<$id_count; $i++)
            {
                $data = array(
                            'roleID' => $insert_dataID,
                            'moduleID' => $id_module[$i]
                            );

               $insert_data= $this->db->insert('role_assignments',$data);
            }
            if($insert_data)
                {

                    $Json_resultSave = array (
                                            'status' => '1'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                }
            else {
                $Json_resultSave = array (
                                            'status' => '0'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }

        }
        public function updateuserroles()
        {
            $data_New = array(  
                                'roleName'     => $_POST['userrolename']
                             );

            $this->Fashion_model->_update_userroles_data($data_New);// insert to db

            $this->db->where('roleID', $_POST['userrolenameid']);
            $this->db->where('jollofsitetypeid', 2);
            $query = $this->db->delete('role_assignments'); // delete all recode first then save a new one.
            
            $id_module = $this->input->post('module[]');
            $id_count = count($id_module);
            for ($i=0; $i<$id_count; $i++)
            {

                $data = array(
                            'roleID' => $_POST['userrolenameid'],
                            'moduleID' => $id_module[$i],
                            'jollofsitetypeid'=> 2
                            );
                //print("<pre>".print_r($data,true)."</pre>");
                $this->db->insert('role_assignments',$data);
            }
            //print("<pre>".print_r($data_New,true)."</pre>");//die;
            
                    $Json_resultSave = array (
                                            'status' => '1'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

        }

        public function update_userroles_status()
        {
            $status_id = $_POST["status"];
            $cat_id = $_POST["cat_id"];

           $data_update = $this->Fashion_model->_update_userroles_status($status_id, $cat_id);

            if($data_update)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 

        }
        
        
        
        public function phpinfo() 
        {
            if (extension_loaded('gd') && function_exists('gd_info')) {
                echo "PHP GD library is installed on your web server";
            }
            else {
                echo "PHP GD library is NOT installed on your web server";
            }
             phpinfo();
            
        }
        
}
