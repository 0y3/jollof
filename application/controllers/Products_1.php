<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
                //$this->load->model('oye/Fashion_moel');
                //$this->load->model('oye/Fashion_admin_model');
                $this->load->model('oye/Profile_model');
                $this->load->model('oye/Super_admin_model');
                $this->load->model('oye/Fashion_model');
                $this->load->helper('text');
	}
	
	public function index()
	{       
                /*$resta_id=null;
                $get_all_resta=$this->Fashion_model->_allrestaurants($resta_id);
                $data['get_all_resta'] = $this->Restaurants_model->_allrestaurants($resta_id);
                //print("<pre>".print_r($get_all_resta,true)."</pre>");
                //die;
		$data ['icon']= 'jol_1.ico';
		$data ['titel']= 'Jollof:-Restaurant';
		$this->load->view('included/header', $data);
		$this->load->view('oye_mainpage_v/allrestaurants', $data);
		$this->load->view('included/footer', $data);
                
                // date("D"); 
                 * 
                 */
            
            $this->category();
                
	}
        
        
	
	public function category()
	{
            $nav_id = $this->uri->segment(3);
            $nav_submenu = $this->uri->segment(4);
            
            if(isset($nav_submenu))
                {
                    //$data_url = array( 'slug' =>  $nav_submenu );
                    $cat_id = $this->Fashion_model->_getcategoryid($nav_submenu); // Get url Id
                    if($cat_id == FALSE){redirect('fashion/products/'.$nav_id);} // If its a wrong url 
                    
                    
                    $data['get_prd'] = $this->Fashion_model->_allproduct_bycat($cat_id); // Get all Product by category details
                    

                    //print("<pre>".print_r($this->Fashion_model->_allproduct_bycat($cat_id),true)."</pre>"); die;

                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Jollof:-Fashion/'.$nav_submenu;
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, '.$nav_submenu;
                    $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                    $data['cat_name']=$nav_submenu;
                    
                    $data['error_page'] = 'included/error_page_fashion';
                    $data ['page_loader']= 'fashion_v/product';
                    
                
                    $this->load->view('included/header_fashion', $data);
                    $this->load->view('fashion_v/template', $data);
                    $this->load->view('included/footer', $data);

                   
                }
            elseif (isset($nav_id)) 
                {   
                    
                    $cat_id = $this->Fashion_model->_getcategoryid($nav_id);    // Get url Id
                    if($cat_id == FALSE){redirect('fashion');}  // If its a wrong url 
                    
                    $data['get_prd']= $this->Fashion_model->_allproduct_bycat($cat_id); // Get all Product by category details                  

                    //print("<pre>".print_r($this->Fashion_model->_allproduct_bycat($cat_id),true)."</pre>"); die;

                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Jollof:-Fashion/'.$nav_submenu;
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, '.$nav_submenu;
                    $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                    $data['cat_name']=$nav_id;
                    
                    $data['error_page'] = 'included/error_page_fashion';
                    $data ['page_loader']= 'fashion_v/product';

                    $this->load->view('included/header_fashion', $data);
                    $this->load->view('fashion_v/template', $data);
                    $this->load->view('included/footer', $data);
                }
            else
                { 
                    redirect('fashion');
                }
            
            
	}
	public function order_form()
	{   
            $product_id = $this->uri->segment(3);
            
            $data['product'] = $this->Restaurants_model->get_prd_where($product_id);
            $data['product_list'] = $this->Restaurants_model->get_product_list($product_id); // call addition product that can be added to menus
            //print("<pre>".print_r($data_restaurant,true)."</pre>");
            //die;
            $data ['icon']= 'jol_1.ico';
            $this->load->view('oye_mainpage_v/order_form', $data);
	}
	public function allcuisines()
	{
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-Cuisines';
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/cuisines', $data);
            $this->load->view('included/footer', $data);
	}
        
        
        public function store()
        {
            $store = $this->uri->segment(3);
            $store_product = $this->uri->segment(4);
            
            if(isset($store_product))
                {
                    $store_id = $this->Fashion_model->_getproductid($store_product); // Get url Id
                    if($store_id == FALSE){redirect('fashion/store/'.$store);} // If its a wrong url 
                    
                    $data['get_prd'] = $this->Fashion_model->_getproductdetails_byid($store_id); // Get all Product by category details
                    

                    //print("<pre>".print_r($this->Fashion_model->_getproductdetails_byid($store_id),true)."</pre>"); die;

                    
                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Jollof:-Fashion/';
                    $data['store_url']=$store;
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, '.$store;
                    $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                    
                    
                
                    $this->load->view('included/header_fashion', $data);
                    $this->load->view('fashion_v/product_view', $data);
                    $this->load->view('included/footer', $data);

                   
                }
            elseif (isset($store)) 
                {   
                    
                    $store_id = $this->Fashion_model->_getstoreid($store); // Get url Id
                    if($store_id == FALSE){redirect('fashion');} // If its a wrong url 
                    
                    $store_details = $this->Fashion_model->get_restaurant_info($store_id);
                    $data['get_prd'] = $this->Fashion_model->_allproduct_bystore($cat_id=FALSE,$store_id);
                    $data['store_nav'] = $this->Fashion_model->_allcat_bystore_navcount($store_id);
                    
                    //print("<pre>".print_r($store_details,true)."</pre>"); die;
                    
                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Jollof:-Fashion '.$store;
                    $data['store_url']=$store;
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, '.$store;
                    $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                    $data['resta'] = $store_details;
                    
                    $this->load->view('included/header_fashion', $data);
                    $this->load->view('fashion_v/store', $data);
                    $this->load->view('included/footer', $data);
                    
                }
           /* else
                { 
                    //redirect('fashion');
                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Jollof:-Fashion ';
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';
                    $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                    
                    $data['error_page'] = 'included/error_page_fashion';
                    $data ['page_loader']= 'fashion_v/product_view';
                    
                
                    $this->load->view('included/header_fashion', $data);
                    $this->load->view('fashion_v/template', $data);
                    $this->load->view('included/footer', $data);
                }
            * 
            */
        }
        
        public function ajaxcall_store()
        {
            //print("<pre>".print_r('$store_id',true)."</pre>"); die;
            $cat_id      =$_POST['cat_id'];
            $cat_parentid=$_POST['cat_parentid'];
            $catname   =$_POST['cat_name'];
            $catslug   =$_POST['cat_slug'];
            $store_id   =$_POST['storeid'];
            $output='';
            $get_prd = $this->Fashion_model->_allproduct_bystore($cat_id,$store_id);
            //print("<pre>".print_r($get_prd,true)."</pre>"); die;
            
            if($get_prd)
                {
                
                    foreach ($get_prd as $allprd)
                    {
                        if(!empty($allprd['prd_qcs'])){
                            
                            $output .= '
                                        <!--product item-->
                                        <div class="product_item specials isotope-item col-sm-" style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px)">
                                            <!--<figure class="r_corners photoframe shadow relative animate_ftb long">-->
                                            <figure class="r_corners photoframe shadow relative animate_ftb long animate_vertical_finished">
                                                <!--product preview-->
                                    ';
                            foreach ($allprd['prd_qcs'] as $prd_details)
                            {
                                if(!empty($prd_details['discount_percentage']))
                                {
                                    $disco  = $prd_details['discount_price'];
                                    $was_price  = $prd_details['price'];
                                    $new_price  = floatval($was_price) - floatval($was_price) ;
                                    $sale_tag='<span class="hot_stripe"><img src="'.site_url('assets/img/sale_product.png').'" alt=""></span>';
                                }
                                else{ $sale_tag='';}
                                
                                if(!empty($prd_details['frontimage']))
                                {
                                    $img_tag='<img src="'.site_url('assets/uploads/fashion_prod/'.$prd_details['frontimage']).'" class=" tr_all_hover img_divimg img-responsive" alt="'. $prd_details['frontimage'].'" >';
                                }
                                elseif (!empty($prd_details['imagename']))
                                {
                                    $img_tag='<img src="'.site_url('assets/uploads/fashion_prod/'.$prd_details['imagename']).'" class=" tr_all_hover img_divimg img-responsive" alt="'. $prd_details['imagename'].'" >';
                                }
                                else
                                {
                                    $img_tag='<img src="'.site_url('assets/img/product_img_1.jpg').'" class="tr_all_hover img_divimg" alt="" >';
                                }
                                
                                if(intval($prd_details['color_count'])  > 1)
                                {
                                   $color_tag='<div data_productid="'. $prd_details['id'].'"class=" "> '.$prd_details['color_count'].' Colors Available</div>'; 
                                }
                                else{ $color_tag='<br>';}
                                $output.='
                                            <div class="img_div ">
                                                <a href="'. site_url('fashion/store/'.$prd_details['store_url'].'/'.$prd_details['prd_url']).'" class="d_block relative pp_wrap">
                                                 '.$sale_tag.'
                                                 '.$img_tag.'
                                                </a>
                                                '.$color_tag.'
                                            </div>
                                        ';
                                
                                $value = $prd_details['productname'];
                                $limit = '22';
                                if (strlen($value) > $limit) {
                                         $trim_tag = substr($value, 0, $limit).'...';
                                          } 
                                else {
                                        $trim_tag = $value;
                                    }
                                if(!empty($prd_details['discount_percentage']))
                                {
                                    $disco  = $prd_details['discount_price'];
                                    $was_price  = $prd_details['price'];
                                    $new_price  =  number_format(floatval($was_price) - floatval($disco), 2,'.', ',');

                                    $price_tag='<p class="scheme_color f_left f_size_large m_bottom_15"><s style=" font-size: 13px;">₦'.number_format(floatval($was_price), 2,'.', ',').'</s> &nbsp; ₦'.$new_price.'</p>';
                                }
                                else
                                {
                                    $price_tag='<p class="scheme_color f_left f_size_large m_bottom_15">₦'. number_format(floatval($prd_details['price']), 2,'.', ',').'</p>';
                                }
                                
                                $value_name2 = $prd_details['storename'];
                                if (strlen($value_name2) > $limit) {
                                         $trim_storename = substr($value_name2, 0, $limit).'...';
                                          } 
                                else {
                                        $trim_storename = $value_name2;
                                  }
                            //character_limiter($resta['companydesc'],25); 
                                  //echo "<a href='.site_url('fashion/store/').'" ".$trimValues_storename;
                                  $trim_store= "<a href='".site_url('fashion/store/'.$prd_details['store_url'])."'>".$trim_storename."</a>";
                                                
                                $output.='
                                        <!--description and price of product-->
                                        <figcaption data_prd_qcsid="'.$prd_details['id'].'" data_productid=" '.$allprd['prd_id'] .'">
                                                <h5 class="m_bottom_10" title=" '.$prd_details['productname'].'">
                                                    <a href="'.site_url('fashion/store/'.$prd_details['store_url'].'/'.$prd_details['prd_url'] ).'" class="color_dark">
                                                     '.$trim_tag.'    
                                                    </a>
                                                </h5>
                                            <div class="clearfix">
                                                '.$price_tag.'
                                                    
                                                <!--rating-->
                                                <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
                                                    <li class="active">
                                                            <i class="fa fa-star-o empty tr_all_hover"></i>
                                                            <i class="fa fa-star active tr_all_hover"></i>
                                                    </li>
                                                    <li class="active">
                                                            <i class="fa fa-star-o empty tr_all_hover"></i>
                                                            <i class="fa fa-star active tr_all_hover"></i>
                                                    </li>
                                                    <li class="active">
                                                            <i class="fa fa-star-o empty tr_all_hover"></i>
                                                            <i class="fa fa-star active tr_all_hover"></i>
                                                    </li>
                                                    <li class="active">
                                                            <i class="fa fa-star-o empty tr_all_hover"></i>
                                                            <i class="fa fa-star active tr_all_hover"></i>
                                                    </li>
                                                    <li>
                                                            <i class="fa fa-star-o empty tr_all_hover"></i>
                                                            <i class="fa fa-star active tr_all_hover"></i>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                            <div class="clearfix">
                                                <span title="'.$prd_details['storename'].'">
                                                    '.$trim_store.'
                                                </span>
                                            </div>
                                        </figcaption>
                                        ';
                            }
                            
                            $output .='
                                            </figure>
                                        </div>
                                ';
                        }
                        
                   
                    }//end of foreah
                   
                    
                    // echo $output; 
                } 
                $Json_resultSave = array (
                                        'status' => '1',
                                        'content' => $output
                                        //'allvalue' => $get_allvalue
                                        );
                echo json_encode($Json_resultSave);
                exit();
        }
        
        public function get_size_bycolor() 
        {
            $by_colorid = $_POST["product_colorid"];
            $by_prdid = $_POST["product_id"];
            //$get_alldata = $this->Fashion_model->_get_allsize_byprdid($by_prdid);// get All sizes to db 
            $get_data = $this->Fashion_model->_get_size_bycolorid($by_colorid,$by_prdid);// get sizes to db 
                if($get_data) 
                {
                    $count_productinstock=0;
                    foreach($get_data as $row)
                    {
                        $count_productinstock+= (int)$row->productinstock;
                    }
                    
                    if ($count_productinstock == 0)
                    {
                        echo 'productinstock_non';
                    }
                    else{
                    
                        foreach($get_data as $row)
                        {


                            /*if($row->productinstock == 0)
                            {
                                echo $row->sizecode ;
                            }
                            */
                            $get_echo = '<li id="'.$row->sizeid.' " data-value="'.$row->sizecode.'" class="swatch-element plain  available" >';

                            if($row->productinstock == 0)
                            {
                                $disable= 'disabled="disabled" ';
                            }
                            else{$disable=null;}
                            $get_echo .=  '
                                            <input id="swatch_size_'.$row->sizecode.'" '.$disable.' class="getcolorsize fashionsize" type="radio" name="fashionsize" data-datasizevalue="'.$row->sizecode.'" value="'.$row->sizeid.'" required="required" />
                                         ';

                            $get_echo .= '<label for="swatch_size_'.$row->sizecode.'" >
                                              '.$row->sizecode.'
                                            </label>
                                        </li>';
                             

                            echo $get_echo;
                        }
                        
                    }
                }
            
        }
        
        public function get_color_bysize() 
        {
            $by_sizeid = $_POST["product_sizeid"];
            $by_prdid = $_POST["product_id"];
           // $get_alldata = $this->Fashion_model->_get_allcolor_byprdid($by_prdid);// get All color to db 
            $get_data = $this->Fashion_model->_get_color_bysizeid($by_sizeid,$by_prdid);// get color to db 
                if($get_data) 
                {
                    $count_productinstock=0;
                    foreach($get_data as $row)
                    {
                        $count_productinstock+= (int)$row->productinstock;
                    }
                    
                    if ($count_productinstock == 0)
                    {
                        echo 'productinstock_non';
                    }
                    else{
                    
                        foreach($get_data as $row)
                        {


                            if($row->productinstock == 0)
                            {
                                echo $row->colorname ;
                            }

                        }
                        
                    }
                }
            
        }
        
        public function get_price_qty() 
        {
            $by_prdid  = $_POST["product_id"];
            $by_colorid = $_POST["product_colorid"];
            $by_sizeid  = $_POST["product_sizeid"];
            if((isset($by_colorid) && !empty($by_colorid)) && (isset($by_sizeid) && !empty($by_sizeid)) ){
                
                $get_data = $this->Fashion_model->_get_price_qty($by_prdid,$by_colorid,$by_sizeid);// get price to db
                
            }
            
            if($get_data) 
            {
                foreach($get_data as $row)
                {
                    if($row->discount_price == 0)
                    {
                        echo '₦<span class="get_price">'.$row->price.'</span>' ;
                    }
                    else
                    {
                        echo '<s style=" font-size: 16px;">₦'.$row->price.'</s> ₦<span class="get_price">'.$row->discount_price.'</span>';
                    }

                }
            }
            
        }
        public function excel()
        {
           /*
            $this->load->helper('to_excel');
           
            $this->db->select(array('field1 ','field3'));
            // run joins, order by, where, or anything else here
            $query = $this->db->get('tablename');
            
            to_excel($query, 'filename'); // filename is optional,with it = filename.xls. without it, the plugin will default to 'exceloutput.xls'
            to_excel($query); // outputs exceloutput.xls
            // you could also use a model here
            to_excel($this->model_name->functioncall());
            
            * 
            */
            $query =$this->db->select(array('id as number','sizename','sizecode'))->get('size_tbl');
            
            to_excel($query, 'myfile'); // outputs myfile.xls
            

            
            
        }
	
}
