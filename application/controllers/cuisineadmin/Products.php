<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('oye/Restaurant_admin_model');
        $this->load->model('oye/Fashion_model');
        $this->load->model('oye/Session_model');
        $this->load->model('oye/Role_assignment');
        
        
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('product');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->helper('text');
	}
	public function index($existing_search=0, $page=0)
	{
        

	    $this->session_manager->validateCuisine("Admin::product");
	    $data['pageheader'] = "Products Management";
	    $data['breadCrumbs'] = '<li class="breadcrumb-item active">Products</li>';
	    $data['mainmenu'] = "products";
	    
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
        $data['products'] = $this->product->getAllProductCuisine($query_params, $page);
	    
        //load pagenation details
	    $this->load->library('pagination');
	    $config['base_url'] = site_url("cuisineadmin/products/index/$existing_search");
	    //$config['total_rows'] = $this->orderitem->getProductCount($query_params, );
	    $config['per_page'] = '25';
	    $config['uri_segment'] = 5;
	    $this->pagination->initialize($config);
	    $data['pagenation'] = $this->pagination->create_links();

        //print("<pre>".print_r($this->product->getAllProductCuisine($query_params, $page),true)."</pre>");die;  
	    $data ['content_file']= 'product';
	    $this->load->view('cuisine_admin/layout', $data);
	}
    
	// Controller function to display the add product form
	public function addform()
	{
        

        //print_r($_SESSION); die;
	    $this->session_manager->validateCuisine("Admin::add_product");
	    
	    $data['cate']= $this->product->get_restaurant_category();
        
        //print("<pre>".print_r($this->product->get_restaurant_category(),true)."</pre>");die;

	    $data ['content_file']= 'product_new';
	    $data['pageheader'] = "Add Product";
	    $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("cuisineadmin/products").'">Products</a></li> <li class="breadcrumb-item active">Add Product</li>';
	    $data['mainmenu'] = "products";
	    $this->load->view('cuisine_admin/layout', $data);
	}
	
	// Controller function to actually add the product; this method is what will save the new product
	public function add()
	{
	    $this->session_manager->validateCuisine("Admin::add_product");
	    // Add code to collect the product details from the form

            if(isset($_POST['cropimg'])&& !empty($_POST['cropimg']))
            {
            //Using cropping tools 
            
                $cropimg_data = $_POST['cropimg'];

                $cropimg_remove_array1 = explode(";", $cropimg_data);

                $cropimg_remove_array2 = explode(",", $cropimg_remove_array1[1]);

                $cropimg = base64_decode($cropimg_remove_array2[1]);
                
                
                $img_name = $_SESSION['merchant_id'].'_'.time(). '.png';     // Random Encryp new name save to app

                $dir_to_save = "./assets/uploads/rest_prod/";
                
                file_put_contents($dir_to_save.$img_name, $cropimg);

                $data_New = array(  
                                        'restaurantid'  =>  $this->session->merchant_id,
                                        'categoryid'    =>  $this->input->post("product_category"),
                                        'productname'   =>  $this->input->post("product_name"),
                                        'productprice'  =>  $this->input->post("product_price"),
                                        'productdesc'   =>  $this->input->post("product_shortdesc"),
                                        'productimage'  =>  $img_name,
                                        'status'        =>  $this->input->post("product_status")
                                     );
            }
            else
            {
                $data_New = array(  
                                'restaurantid'  =>  $this->session->merchant_id,
                                'categoryid'    =>  $this->input->post("product_category"),
                                'productname'   =>  $this->input->post("product_name"),
                                'productprice'  =>  $this->input->post("product_price"),
                                'productdesc'   =>  $this->input->post("product_shortdesc"),
                                'status'        =>  $this->input->post("product_status")
                             );
            }
                $insert_product = $this->Generic->add($data_New, $tablename="products_cuisine");
                //$this->Restaurant_admin_model->_save_product($data_New, $check);// insert to db

                if($insert_product)
                {
                    // inser Additional Product Options
                    $productnameArr  = $this->input->post("addproduct_name");
                    $productpriceArr = $this->input->post("addproduct_price"); 
                
                    if(!empty($productnameArr) && !empty($productpriceArr))
                    {
                        for($i = 0; $i < count($productnameArr); $i++)
                        {
                            if( !empty($productnameArr[$i]) && !empty($productpriceArr[$i]) )
                            {
                                $data_merge = array(
                                        'restaurantid'  =>  $this->session->merchant_id,
                                        'productname'   =>  $productnameArr[$i],
                                        'productprice'  =>  $productpriceArr[$i],
                                        'status'        =>  $this->input->post("product_status")
                                );

                                $insert_Addproduct =$this->Generic->add($data_merge, $tablename="products_cuisine"); // insert query here
                
                                if ($insert_Addproduct)
                                {
                                    $data_merge_id = array(
                                            'parentproductid'   => $insert_product,
                                            'childproductid'    => $insert_Addproduct,
                                            'price'             => $productpriceArr[$i]
                                         );
                                    $insert_merges =$this->Generic->add($data_merge_id,$tablename="productmerges");
                                }
                            }
                        } //end of for loop
                    }
                }

                
            if($insert_merges) 
            {
                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'Product Saved');
                $Json_resultSave = array ('status' => '1');
                redirect('cuisineadmin/products/addform', 'refresh');
                
            }
            else 
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Saving Product');
                $Json_resultSave = array ('status' => '0');
                redirect('cuisineadmin/products/addform', 'refresh');
            }
	}
	
	// Controller function to display the edit product form
    public function editform($id=null)
    {
        

        $this->session_manager->validateCuisine("Admin::product_stock_manager");

        // Get the product details from the db
        $query_param = array('id'=>$id);
        $product = $this->product->getAllProductCuisine($query_param, $page=0);
        if($product)
        {
            // product categories form db
            $data['cate']= $this->product->get_restaurant_category();
            //print("<pre>".print_r($product,true)."</pre>");die;
            
            $data['productinfo']= $product;
            $data['productid']= $id;
            $data ['content_file']= 'product_new';
            $data['pageheader'] = "Edit Product";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("cuisineadmin/products").'">Products</a></li> <li class="breadcrumb-item active">Edit Product</li>';
            $data['mainmenu'] = "products";
            $this->load->view('cuisine_admin/layout', $data);
        }
        else
        {

            redirect('cuisineadmin/products', 'refresh'); 
        }
    }

    public function edit($id=null)
    {
        if(isset($_POST['cropimg'])&& !empty($_POST['cropimg']))
        {
            // save the new Promo data  table //
            $cropimg_data = $_POST['cropimg'];

            $cropimg_remove_array1 = explode(";", $cropimg_data);

            $cropimg_remove_array2 = explode(",", $cropimg_remove_array1[1]);

            $cropimg = base64_decode($cropimg_remove_array2[1]);
            
            
            $img_name = $_SESSION['merchant_id'].'_'.time(). '.png';     // Random Encryp new name save to app

            $dir_to_save = "./assets/uploads/rest_prod/";

            if (!is_dir($dir_to_save)) {
              mkdir($dir_to_save);
            }
            file_put_contents($dir_to_save.$imageName, $cropimg);

            $data_New = array(  
                                    'categoryid'    =>  $this->input->post("product_category"),
                                    'productname'   =>  $this->input->post("product_name"),
                                    'productprice'  =>  $this->input->post("product_price"),
                                    'productdesc'   =>  $this->input->post("product_shortdesc"),
                                    'productimage'  =>  $img_name,
                                    'status'        =>  $this->input->post("product_status")
                                 );
        }
        else
        {
            $data_New = array(  
                            'categoryid'    =>  $this->input->post("product_category"),
                            'productname'   =>  $this->input->post("product_name"),
                            'productprice'  =>  $this->input->post("product_price"),
                            'productdesc'   =>  $this->input->post("product_shortdesc"),
                            'status'        =>  $this->input->post("product_status")
                         );
        }

         $data_Where = array(  
                        'id'    => $id
                     );

        // update Main Product to db
        $insert_data = $this->Generic->edit($data_New, $id , $tablename="products_cuisine");

         // Udate Additional Product Options
        $productidArr  = $this->input->post("addproduct_id");
        $productchildidArr  = $this->input->post("addproduct_childid");
        $productnameArr  = $this->input->post("addproduct_name");
        $productpriceArr = $this->input->post("addproduct_price"); 
        
        if(!empty($productidArr) && !empty($productchildidArr)  && !empty($productnameArr) && !empty($productpriceArr))
        {
            for($i = 0; $i < count($productidArr); $i++)
            {
                if( !empty($productidArr[$i]) && !empty($productchildidArr[$i])  && !empty($productnameArr[$i]) && !empty($productpriceArr[$i]) )
                {
                    $data_merge = array(
                                    'productname'   =>  $productnameArr[$i],
                                    'productprice'  =>  $productpriceArr[$i],
                                    'status'        =>  $this->input->post("product_status")
                                );

                    $update_Addproduct = $this->Generic->edit($data_merge, $productchildidArr[$i] , $tablename="products_cuisine");
    
                    if ($update_Addproduct)
                    {
                        $data_merge_id = array( 'price'  => $productpriceArr[$i] );

                        $update_merges =$this->Generic->edit($data_merge_id, $productidArr[$i], $tablename="productmerges");
                    }
                }
            } //end of for loop

            if($update_merges) 
            {
                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'Product Updated');
                $Json_resultSave = array ('status' => '1');
                redirect('cuisineadmin/products/editform/'.$id, 'refresh');
                
            }
            else 
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Updating Product');
                $Json_resultSave = array ('status' => '0');
                redirect('cuisineadmin/products/editform/'.$id, 'refresh');
            }
        }
        else
        {

            if($insert_data) 
            {
                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'Product Updated');
                $Json_resultSave = array ('status' => '1');
                redirect('cuisineadmin/products/editform/'.$id, 'refresh');
                
            }
            else 
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Updating Product');
                $Json_resultSave = array ('status' => '0');
                redirect('cuisineadmin/products/editform/'.$id, 'refresh');
            }
        }
    }

    public function delete($id=null)
    {
        

        $this->session_manager->validateCuisine(__METHOD__);

        // delete to db
        $_data =$this->Generic->delete($id, $tablename="products_cuisine");
        if($_data)
        {

            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Product Deleted');
            $Json_resultSave = array ('status' => '1');
            redirect('/cuisineadmin/products', 'refresh');
            //echo json_encode($Json_resultSave);
            //exit();
       }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Deleted Product');
            $Json_resultSave = array ('status' => '0');
            redirect('/cuisineadmin/products', 'refresh');
            //echo json_encode($Json_resultSave);
            //exit();
        }
        
    }

    public function deletemergesproduct($id=null,$editformId=null)
    {
        
        
        $this->session_manager->validateCuisine('Products::delete');

        // delete to db
        $_data =$this->Generic->delete($id, $tablename="productmerges");
        if($_data)
        {

            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Additional Product Deleted');
            $Json_resultSave = array ('status' => '1');
            redirect('/cuisineadmin/products/editform/'.$editformId, 'refresh');
            //echo json_encode($Json_resultSave);
            //exit();
       }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Deleted Additional Product');
            $Json_resultSave = array ('status' => '0');
            redirect('/cuisineadmin/products/editform/'.$editformId, 'refresh');
            //echo json_encode($Json_resultSave);
            //exit();
        }
        
    }

    public function addmergesproduct()
    {
        $data_New = array(  
                                'restaurantid'  =>  $this->session->merchant_id,
                                'categoryid'    =>  0,
                                'productname'   =>  $this->input->get("modal_additional_productname"),
                                'productprice'  =>  $this->input->get("modal_additional_productprice"),
                                'status'        =>  1
                             );
        $insert_product = $this->Generic->add($data_New, $tablename="products_cuisine");
        //$this->Restaurant_admin_model->_save_product($data_New, $check);// insert to db

        if($insert_product)
        {
            $data_merge_id = array(
                    'parentproductid'   =>  $this->input->get("modal_additional_productid"),
                    'childproductid'    =>  $insert_product,
                    'price'             =>  $this->input->get("modal_additional_productprice")
                 );
            $insert_merges = $this->Generic->add($data_merge_id,$tablename="productmerges");

            if($insert_merges) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Additional Product Added');
                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => 'success'
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when saving Additional Product');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
            }
        }
        else 
        {       
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when saving Additional Product');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                echo json_encode($Json_resultSave);
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
    
    public function productimagesave() 
    {
        $this->load->library('image_lib');
        //$this->load->library('upload');
        
        if (!empty($_FILES['product_image']['name']) )
            {
                $file_name = "product_image";  // name of image input from the view
                $gen_code =$this->utility->generate_random_string(4);
                $newname = $_SESSION['merchant_id'].'_'.$gen_code.'_product'.time();	 // Random Encryp new name save to app
                
                
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
        
            
            /*
            $this->db->insert('productimages', array(
                                'restaurantid'  => $_SESSION['rest_id'],
                                'imagename' => $data['file_name']
                            ));
             * 
             */
            $data_New = array(
                        'restaurantid'  => $this->session->merchant_id,
                        'imagename'     => $data['file_name']
                    );
            $this->Generic->add($data_New,$tablename='productimages');
            
             
            $output = '';
            $num = $this->utility->generate_random_string(4);
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
        
    
}
