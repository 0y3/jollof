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
        

	    $this->session_manager->validateFashion("Admin::product");
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
        $data['products'] = $this->product->getAllProduct($query_params, $page);

        //get all layaway conditions
        $data['layaways'] =$this->Generic->getAll($tablename='layaway', $limit=NULL, $fieldlist=null, $createdat=null, $updatedat=null, $orderbyfield='minorder', $d_order='DESC');
	    
        //print("<pre>".print_r( $datalayaways,true)."</pre>");die;
        //load pagenation details
	    $this->load->library('pagination');
	    $config['base_url'] = site_url("fashionadmin/orders/index/$existing_search");
	    //$config['total_rows'] = $this->orderitem->getProductCount($query_params, );
	    $config['per_page'] = '25';
	    $config['uri_segment'] = 5;
	    $this->pagination->initialize($config);
	    $data['pagenation'] = $this->pagination->create_links();
            
	    $data ['content_file']= 'product';
	    $this->load->view('fashion_admin/layout', $data);
	}
    
	// Controller function to display the add product form
	public function addform()
	{
        
	    $this->session_manager->validateFashion("Admin::newproduct");
	    
	    $data['cate']= $this->product->_get_fashion_cate();
        $data['brand']= $this->product->get_fashionbrands();
         
	    $data['pageheader'] = "Add Product";
	    $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("fashionadmin/products").'">Products</a></li> <li class="breadcrumb-item active">Add Product</li>';
	    $data['mainmenu'] = "products";

        $data ['content_file']= 'product_new';
	    $this->load->view('fashion_admin/layout', $data);
	}
	
	// Controller function to actually add the product; this method is what will save the new product
	public function add()
	{
	    $this->session_manager->validateFashion("Admin::newproduct");
	    // Add code to collect the product details from the form
            if(isset($_POST["variant_check"] ) )
            {
                
                // insert to product db
                $data_New = array(  
                                    'merchantid'    =>  $this->session->merchant_id,
                                    'productname'   =>  $this->input->post("product_name"),
                                    'productshortdesc'   =>  $this->input->post("product_shortdesc"),
                                    'productdesc'   =>  $this->input->post("product_desc"),
                                    'productbrandid'   =>  $this->input->post("product_brand"),
                                    'status'   =>  $this->input->post("product_status")
                                 );
                
                // slug library
                $config = array(
                        'table' => 'products_fashion',
                        'id' => 'id',
                        'field' => 'slug',
                        'title' => 'title',
                        'replacement' => 'dash' // Either dash or underscore
                        );
                $this->load->library('slug', $config);

                $data_slug = array(
                        'slug' => $this->input->post("product_name"),       // slug name of filed in db were ur url is stored
                        );
                $data_New['slug'] = $this->slug->create_uri($data_slug);
                //
                // insert to db
                $getid_insert = $this->Generic->add($data_New, $tablename="products_fashion");
                //$getid_insert = $this->Fashion_model->_save_product($data_New);// insert to db to return product id
                
                
                
                if($getid_insert)
                {
                    // insert to product variant db by product id
                    $discountcheck=0;
                    foreach($_POST['variant_check'] as $key => $value)
                    {
                        
                        // color id's 
                        $data_wherecolor = array(  
                                    'colorname'    =>  $value,
                                    'isdeleted'   =>  0
                                 );
                        
                        if(!empty($_POST['variant_size'][$key]))
                        {
                        // size id's 
                        $data_wheresize = array(  
                                    'sizecode'    =>  $_POST['variant_size'][$key],
                                    'isdeleted'   =>  0
                                 );
                        $getsizeid = $this->Generic->getrowid($data_wheresize, $tablename='size_tbl');// insert to db to return size id;
                        $data_New2 = array(
                                        'sizeid'         => $getsizeid,//$_POST['variant_size'][$key],
                                        );
                        }
                        $getcolorid = $this->Generic->getrowid($data_wherecolor, $tablename='color_tbl');// insert to db to return color id;
                        
                             $data_New2 = array(
                                        'productid'      => $getid_insert,
                                        'quantity'       => $_POST["variant_qty"][$key],
                                        'productinstock' => $_POST["variant_qty"][$key],
                                        'price'          => $_POST['variant_price'][$key],
                                        'discount_price' => $_POST["variant_discount"][$key],
                                        'colorid'        => $getcolorid,//$value,
                                        'colorimagename' => $_POST['variant_name'][$key],
                                        'colorimage'     => $_POST['variant_colorimage'][$key],
                                     );
                            //print("<pre>".print_r( $data_New2,true)."</pre>");
                             
                             // insert product variants
                            $insert_data=$this->Generic->add($data_New2,$tablename='product_qty_color_size');
                        if(!empty($_POST["variant_discount"][$key]))
                        {
                           $discountcheck=1; 
                        }
                    } 
                    
                    $update = array(  
                                    'discount_percentage'  =>  $discountcheck
                                    );
                    // update products fashion 
                    $this->Generic->edit($update, $getid_insert, $tablename="products_fashion");
                    /*
                    $this->db->set($update); 
                    $this->db->where("id",$getid_insert); //which row want to upgrade  
                    $this->db->update("products_fashion"); 
                     * 
                     */
                    
                    foreach($_POST['category'] as $key=>$cat_name) 
                    {
                        $data_New3= array(  
                                        'cat_fasid'     =>  $cat_name,
                                        'product_fasid' =>  $getid_insert
                                     );
                        // insert to Product category db 
                        $this->Generic->add($data_New3,$tablename='product_fashion_cate_assign');
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
                                        'restaurantid'  =>  $this->session->merchant_id//$_SESSION['rest_id'],
                                     );
                            $this->Generic->editByConditions($update, $where, $tablename="productimages");
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
                                            'restaurantid'  =>  $_SESSION['merchant_id'],
                                         );
                                $this->Generic->editByConditions($update, $where, $tablename="productimages");
                            }
                    }
                }
                

            }
            
            
            if($insert_data) 
            {
                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'Product Saved');
                $Json_resultSave = array ('status' => '1');
                redirect('fashionadmin/products/addform', 'refresh');
                
            }
            else 
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Saving Product');
                $Json_resultSave = array ('status' => '0');
                redirect('fashionadmin/products/addform', 'refresh');
            }
	}
	
	// Controller function to display the edit product form
        public function editform($id=null)
        {
            
            $this->session_manager->validateFashion("Admin::product_stock_manager");

            // Get the product details from the db
            $query_param = array('id'=>$id);
            $product = $this->product->getAllFashion($query_param);
            
            if($product)
            {
                // product categories form db
                $data['cate']= $this->product->get_fashioncateroles($id);
                $data['brand']= $this->product->get_fashionbrands();
                $data['color'] = $this->product->_all_colors($get_like=null); // call City by State
                $data['size']  = $this->product->_all_sizes($get_like=null);
                //print("<pre>".print_r($product,true)."</pre>");die;
                
                $data['productinfo']= $product;
                $data['productid']= $id;
                $data ['content_file']= 'product_edit';
                $data['pageheader'] = "Edit Product";
                $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("fashionadmin/products").'">Products</a></li> <li class="breadcrumb-item active">Edit Product</li>';
                $data['mainmenu'] = "products";
                $this->load->view('fashion_admin/layout', $data);
            }
            else
            {

                redirect('fashionadmin/products', 'refresh'); 
            }
        }
        
        public function delete($id=null)
        {
            

            $this->session_manager->validateFashion(__METHOD__);

            // delete to db
            $_data =$this->Generic->delete($id, $tablename="products_fashion");
            if($_data)
            {

                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'Product Deleted');
                $Json_resultSave = array ('status' => '1');
                redirect('/fashionadmin/products', 'refresh');
                //echo json_encode($Json_resultSave);
                //exit();
           }
            else 
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Deleted Product');
                $Json_resultSave = array ('status' => '0');
                redirect('/fashionadmin/products', 'refresh');
                //echo json_encode($Json_resultSave);
                //exit();
            }
            
        }
    
        // Controller function to perform the actual editting of the products
        public function edit($id=null)
        {
            // insert to product db
                $data_New = array(  
                                    'productname'   =>  $this->input->post("product_name"),
                                    'productshortdesc'   =>  $this->input->post("product_shortdesc"),
                                    'productdesc'   =>  $this->input->post("product_desc"),
                                    'productbrandid'   =>  $this->input->post("product_brand"),
                                    'status'   =>  $this->input->post("product_status"),
                                    'sales'  =>  $this->input->post("product_sales")
                                 );
                
                // slug library
                $config = array(
                        'table' => 'products_fashion',
                        'id' => 'id',
                        'field' => 'slug',
                        'title' => 'title',
                        'replacement' => 'dash' // Either dash or underscore
                        );
                $this->load->library('slug', $config);

                $data_slug = array(
                        'slug' => $this->input->post("product_name"),       // slug name of filed in db were ur url is stored
                        );
                $data_New['slug'] = $this->slug->create_uri($data_slug, $id );
                //
                // update to db
                $update_data = $this->Generic->edit($data_New, $id , $tablename="products_fashion");

                $delete_data =$this->product->deleteFashionCateByProductId($id);
                if($delete_data)
                {
                    //save categories
                    foreach($_POST['category'] as $key=>$cat_name) 
                    {
                        $data_cate= array(  
                                'cat_fasid'     =>  $cat_name,
                                'product_fasid' =>  $id
                                         );
                        // insert to Product category db 
                        $insert_cate =$this->Generic->add($data_cate, $tablename='product_fashion_cate_assign');
                    }
                }

                if($insert_cate) 
                {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Product Updated');
                    $Json_resultSave = array ('status' => '1');
                    redirect('fashionadmin/products/editform/'.$id, 'refresh');
                    
                }
                else 
                {
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updating Product');
                    $Json_resultSave = array ('status' => '0');
                    redirect('fashionadmin/products/editform/'.$id, 'refresh');
                }
        }
        
        public function all_sizes() 
        {
            $get_like = $_GET["q"];
            if(isset($get_like) && !empty($get_like) )
            {
                $data_all = $this->product->_all_sizes($get_like);
            }
            else
            {
                $data_all = $this->product->_all_sizes($get_like=FALSE); // call City by State
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
            $get_like = $_GET["color"];
            if(isset($get_like) && !empty($get_like) )
            {
                $data_all = $this->product->_all_colors($get_like);
            }
            else
            {
                $data_all = $this->product->_all_colors($get_like=FALSE); // call City by State
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
        
        public function newimage_form($id=null) 
        {
            $data['mainmenu'] = "products";
            $data['productid']=$id;
            $this->load->view('fashion_admin/product_imageform',$data);
        }
      
        public function delete_multipleimage() 
        {
            //rmdir($dir); //to delete directory use
            
            $fullpath = './assets/uploads/fashion_prod/';
            $bigpath  = './assets/uploads/fashion_prod/mainimage/';
            $thumbpath= './assets/uploads/fashion_prod/thumbs/';
            $picture=$_POST["key"];

            unlink($fullpath.$picture);
            unlink($bigpath.$picture);
            unlink($thumbpath.$picture);
           
            $this->db->where(array('imagename' => $picture));
            //$status = $this->db->update('productimages', array('deletedat'=>date("Y-m-d H:i:s"),'isdeleted'=> 1));
            $status = $this->db->delete('productimages');
            return $status;
            
        }
        
        public function productimagesave($id=null) 
        {
            $this->load->library('image_lib');
                //$this->load->library('upload');
                
            if (!empty($_FILES['product_image']['name']) )
            {
                    $file_name = "product_image";  // name of image input from the view
                    $gen_code =$this->utility->generate_random_string(4);
                    $newname = $_SESSION['merchant_id'].'_'.$gen_code.'_product'.time();     // Random Encryp new name save to app
                    
                    
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

                //$newname = $this->generate_random_string(4).'_banner'.time(). '.png';  // Random Encryp new name save to app
                $newname_1 = $newname.'.'.$file_extn;
                
                if (!is_dir($path)) {
                  mkdir($path);
                }
                file_put_contents($path.$newname_1, $cropimg);

                if(!empty($id))
                {
                     $data_New = array(
                                'restaurantid'  => $this->session->merchant_id,
                                'productid'     => $id,
                                'imagename'     => $data['file_name']
                            );
                    $this->Generic->add($data_New,$tablename='productimages');
                }
                else
                {
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
                }

                $output = '';
                $num = $this->utility->generate_random_string(4);
                $output .= '
                    <div class="preview-image preview-show-'. $num. '" >
                        <div class="image-cancel" data-no="'. $num .'" data-key="'.$data["file_name"].'"><i class="far fa-trash-alt"></i></div> 
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

        }
        public function savecolorimage() 
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
                if (count($_FILES['var_files']['name'])>0 )
                {
                    foreach($_FILES['var_files']['name'] as $i => $images)
                    {
                        $exploded = explode('.',$images);
                        $file_extn = strtolower(end($exploded));
                        //print("<pre>".print_r($i."--".$images,true)."</pre>");

                        //$ext = end((explode(".", $_FILES['files']['name'][$i])));
                        //$file_name = time().$i."_".($i+1).".".$ext;

                        $newname = $_SESSION['merchant_id'].'_colorimg_'.time().$i.($i+1).".".$file_extn;

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

                                $num = $this->utility->generate_random_string(4);
                                /*
                                $this->db->insert('productimages', array(
                                                    'restaurantid'  => $this->session->merchant_id,
                                                    'imagename'     => $data['file_name'],
                                                    'colorimg'      => 1
                                                ));
                                 * 
                                 */
                                if(isset($this->session->merchant_id))
                                {
                                    $data_New = array(
                                            'restaurantid'  => $this->session->merchant_id,
                                            'imagename'     => $data['file_name'],
                                            'colorimg'      => 1
                                            );
                                }
                                elseif(isset($this->session->User_id))
                                {
                                    $data_New = array(
                                            'adminid'  => $this->session->User_id,
                                            'imagename'     => $data['file_name'],
                                            'colorimg'      => 1
                                            );
                                }
                                
                                $this->Generic->add($data_New,$tablename='productimages'); 
                                $output .= $data["file_name"];
                            } 
                        //else{ print_r($this->upload->display_errors()); }
                    }
                }
                else
                {
                    $exploded = explode('.',$_FILES['var_files']['name']);
                    $file_extn = strtolower(end($exploded));
                    
                    $file_name = "var_files";  // name of image input from the view
                    $num = $this->utility->generate_random_string(4);
                    $newname = $_SESSION['merchant_id'].'_colorimg_'.time().$num.".".$file_extn; // Random Encryp new name save to app
                    
                    $config['file_name'] = $newname;

                    $this->load->library('upload', $config);
                    
                    if(!$this->upload->do_upload($file_name))
                    {
                        $mssg = $this->upload->display_errors();
                        //print("<pre>".print_r($mssg,true)."</pre>");
                        //die; 
                    }
                    
                    $data = $this->upload->data(); 
                    // using Thumbsnails helper
                    create_thumb($data, '80', '80', './assets/uploads/fashion_prod/thumbs/', TRUE);

                    if(isset($this->session->merchant_id))
                    {
                        $data_New = array(
                                'restaurantid'  => $this->session->merchant_id,
                                'imagename'     => $data['file_name'],
                                'colorimg'      => 1
                                );
                    }
                    elseif(isset($this->session->User_id))
                    {
                        $data_New = array(
                                'adminid'  => $this->session->User_id,
                                'imagename'     => $data['file_name'],
                                'colorimg'      => 1
                                );
                    }
                    $this->Generic->add($data_New,$tablename='productimages'); 
                    $output .= $data["file_name"];
                    
                }
                //print("<pre>".print_r($output,true)."</pre>");die;
                echo $output;
                
            }
        }
        
        public function productinventorysave($id=null) 
        {
            $query_where = array(  
                                'productid' =>  $this->input->post("modal_productid"),
                                'sizeid'    =>  $this->input->get("modal_productsize"),
                                'colorid'   =>  $this->input->get("modal_productcolor")
                             );
            $checkproductinventory = $this->Generic->findByCondition($query_where,$tablename="product_qty_color_size");
            if( empty($checkproductinventory) )
            {
                $data_New = array(  
                                        'productid' =>  $this->input->post("modal_productid"),
                                        'quantity'  =>  $this->input->post("modal_productquantity"),
                                        'sizeid'    =>  $this->input->post("modal_productsize"),
                                        'colorid'   =>  $this->input->post("modal_productcolor"),
                                        'price'     =>  $this->input->post("modal_productprice"),
                                        'status'        =>  1
                                     );
                $insert_inventory = $this->Generic->add($data_New, $tablename="product_qty_color_size");
                if($insert_inventory) 
                {
                        $this->session->set_flashdata('success','success');
                        $this->session->set_flashdata('message', 'New Product Inventory Added');
                        $Json_resultSave = array (
                                                'status' => '1',
                                                'content' => 'success'
                                                );
                        echo json_encode($Json_resultSave);
                }
                else 
                {       
                        $this->session->set_flashdata('error','error');
                        $this->session->set_flashdata('message', 'An error occur when saving Product Inventory');
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
                    $this->session->set_flashdata('message', 'Product Inventory Exist Already !!!');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'Product Inventory Exist Already!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
            }
        }

        public function productinventoryedit($productid=null)
        {   
            
            $data = $_POST["data"];
            $id = $_POST["id"];
            $type = $_POST["type"];

            $data_Where = array(  'id'  => $id );

            if($type=='price')
            {
                $update = array(  'price'  =>  $data );
            }
            elseif ($type=='colorimagename')
            {
                $update = array(  'colorimagename'  =>  $data );
                $data_Where = array( 'colorid'  => $id,);
            }
            elseif ($type=='discount_price')
            {
                $update = array(  'discount_price'  =>  $data );
                if($data>0 || !empty($data) )
                {
                     $update_dis = array(  
                                    'discount_percentage'  =>  1
                                    );
                    // update products fashion 
                    //$this->Generic->edit($update_dis, $productid, $tablename="products_fashion");
                }
            }
            elseif ($type=='productinstock')
            {
                /*
                $get_data   = $this->Generic->getByID( $id, $tablename="product_qty_color_size");
                $db_instock = $get_data['productinstock'];
                $db_quantity= $get_data['quantity'];
 
                $quantity_new= $data + $db_quantity;
                $stock_new= $data + $db_instock;

                $update = array(  
                    'productinstock'  =>  $stock_new,
                    'quantity'  =>  $quantity_new
                     );
                */
                $update = array(  
                    'productinstock'  =>  $data,
                    'quantity'  =>  $data
                     );
            }
        
            //$save_data =$this->Generic->edit($update, $id, $tablename="product_qty_color_size");
            $save_data =$this->Generic->editByConditions($update, $data_Where , $tablename="product_qty_color_size");

            if($save_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Product Inventory Updated');
                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => 'success'
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updated Product Inventory');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
            }

        }

        public function layawaystatus( $id=null,$status=null)
        {
             $update = array(  
                            'productlayawaystatus'  =>  $status
                            );
            //
            // update to db
            $update_data = $this->Generic->edit($update, $id , $tablename="products_fashion");
            if($update_data)
            {

                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'Layaway Product Activated');
                $Json_resultSave = array ('status' => '1');
                redirect('/fashionadmin/products', 'refresh');
                //echo json_encode($Json_resultSave);
                //exit();
           }
            else 
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Activating Layaway Product');
                $Json_resultSave = array ('status' => '0');
                redirect('/fashionadmin/products', 'refresh');
                //echo json_encode($Json_resultSave);
                //exit();
            }
        }
    
}