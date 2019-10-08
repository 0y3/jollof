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
                
            if($this->input->get("search"))
            {  
                $searchbox  = $this->input->get('search');
                $cate=null;
                if($this->input->get("cate_option"))
                {
                    $cate  = $this->input->get('cate_option');
                }
                $this->searchdata($searchbox,$cate);
            }
            else
            {
                $this->category();
            }
                
	}
        
        public function contall()
        {
            $data_column_name = array(
                                    "*" 
                                    );
            $data_where = array(
                                " cat_fasid"
                                );
            $data_table_name = array(
                                    " product_fashion_cate_assign"
                                    );
            
            $data['get_prd_count'] = $this->Fashion_model->count_all_results($data_column_name,$data_where,$data_table_name);
            
        }
	
	public function category()
	{
            $nav_id = $this->uri->segment(3);
            $nav_submenu = $this->uri->segment(4);
            
            $data['info']= $this->Super_admin_model->get_admin_info();
            
            
            if(isset($nav_submenu)&& !is_numeric($nav_submenu))
                {
                    //$data_url = array( 'slug' =>  $nav_submenu );
                    $cat_id = $this->Fashion_model->_getcategoryid($nav_submenu); // Get url Id
                    if($cat_id == FALSE){redirect('fashion/products/'.$nav_id);} // If its a wrong url 
                    
                    
                    
                    $order_by  = $this->input->get('position');
                    $per_page=12;
                    if($this->input->get("pages"))
                    {
                    $per_page  = $this->input->get('pages');
                    }
                    
                    $filterparams = array();
                    $query_params = array();
                    // Process filter if any was posted

                    if( $this->input->get())
                    {
                        // Get all data from the search form
                        $filterparams = $this->input->get();
                        $this->session->set_flashdata('filterparams',$filterparams);
                    }
                    //print("<pre>".print_r($this->session->flashdata('filterparams'),true)."</pre>"); //die;
                    
                    $get_prd_count = $this->Fashion_model->record_count_allproduct_bycat($cat_id);
                    
                    $config = array();
                    $config["base_url"] = base_url() . "fashion/products/".$nav_id."/".$nav_submenu;
                    $config["total_rows"] = $get_prd_count;
                    $config["per_page"] = $per_page;
                    $config["uri_segment"] = 5;
                    // styling/html stuff
                    $config['full_tag_open'] = '<ul class="pagination">';
                    $config['full_tag_close'] = '</ul><!--pagination-->';
                    $config['first_link'] = '&laquo; First';
                    $config['first_tag_open'] = '<li class="prev page">';
                    $config['first_tag_close'] = '</li>' . "\n";
                    $config['last_link'] = 'Last &raquo;';
                    $config['last_tag_open'] = '<li class="next page">';
                    $config['last_tag_close'] = '</li>' . "\n"; 
                   //$config['next_link'] = 'Next &rarr;';
                    $config['next_link'] = '&raquo;';
                    $config['next_tag_open'] = '<li class="next page">';
                    $config['next_tag_close'] = '</li>' . "\n";
                    //$config['prev_link'] = '&larr; Previous';
                    $config['prev_link'] = '&laquo;';
                    $config['prev_tag_open'] = '<li class="prev page">';
                    $config['prev_tag_close'] = '</li>' . "\n";
                    $config['cur_tag_open'] = '<li class=""><a class="active" href="">';
                    $config['cur_tag_close'] = '</a></li>';
                    $config['num_tag_open'] = '<li class="page">';
                    $config['num_tag_close'] = '</li>' . "\n";
                    $this->pagination->initialize($config);
                    
                    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                    
                    $get_prd=$this->Fashion_model->_allproduct_bycat($cat_id,$config["per_page"],$page,$order_by,$this->session->flashdata('filterparams'));// Get all Product by category details
                    
                    
                    //print("<pre>".print_r($this->Fashion_model->_allproduct_bycat($cat_id),true)."</pre>"); die;
                    
                    $data["links"] = $this->pagination->create_links();
                    $data['get_prd']= $get_prd;
                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Jollof:-Fashion/'.$nav_submenu;
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, '.$nav_submenu;
                    $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                    $data ['colors_prdcounts'] = $this->Fashion_model->_get_filtercolor($cat_id,$store_id=null,$by_giftporte=null,$this->session->flashdata('filterparams'));
                    $data ['sizes_prdcounts'] = $this->Fashion_model->_get_filtersize($cat_id,$store_id=null,$by_giftporte=null,$this->session->flashdata('filterparams'));
                    $data ['stores_filterprdcounts'] = $this->Fashion_model->_get_filterstore($cat_id,$this->session->flashdata('filterparams'));
                    $data ['stores_prdcounts'] = $this->Fashion_model->_get_stores_prdcounts();
                    
                    $data_best_sellers = array("products_fashion.productsold >=" =>20);
                    $data['best_sellers'] = $this->Fashion_model->_get_product_rand(FALSE,$data_best_sellers,$limit=20);
                    
                    $data['cat_name']=$nav_id.'/'.$nav_submenu;
                    
                    $data['breadcrumb']='<li><a href="'.site_url('fashion/products/').$nav_id.'">'.$nav_id.'</a> <i class="ion-ios-arrow-right"></i></li>'.
                                        '<li class="active">'.$nav_submenu.'</li>';
                    
                    $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
                    $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
                    $data ['sidebar_loader']= 'included/fashionpage_included/sidebar_filter';
                    $data ['sidebar_mobile_loader']= 'included/fashionpage_included/sidebar_mobile_filter';
                    $data ['footer_loader']= 'included/fashionpage_included/footer';
                    $data ['error_page'] = 'included/error_page_fashion';
                    $data ['page_loader']= 'fashion_view/product';

                    //$this->load->view('included/header_fashion', $data);
                    $this->load->view('fashion_view/product_template', $data);
                    //$this->load->view('included/footer', $data);

                   
                }
            elseif (isset($nav_id)) 
                {   
                    
                    $cat_id = $this->Fashion_model->_getcategoryid($nav_id);    // Get url Id
                    if($cat_id == FALSE){redirect('fashion');}  // If its a wrong url 
                    
                    $filter_get ='';
                    $order_by  = $this->input->get('position');
                    $per_page=12;
                    if($this->input->get("pages"))
                    {
                    $per_page  = $this->input->get('pages');
                        
                    }
                    
                    if($this->input->get("position"))
                    {
                        //print("<pre>".print_r($this->session->flashdata('filterparams'),true)."</pre>"); //die;
                        $filter_get .="?position=".$this->input->get('position');
                        $filter_get .="&pages=".$this->input->get('pages');
                        if($this->input->get('filterpricemin')||$this->input->get('filterpricemax'))
                        {
                            $filter_get .="&filterpricemin=".$this->input->get('filterpricemin');
                            $filter_get .="&filterpricemax=".$this->input->get('filterpricemax');
                        }
                    }
                    
                    elseif($this->input->get('filterpricemin')||$this->input->get('filterpricemax'))
                    {
                        $filter_get .="?filterpricemin=".$this->input->get('filterpricemin');
                        $filter_get .="&filterpricemax=".$this->input->get('filterpricemax');
                        if($this->input->get("color"))
                        {
                           //$filter_get .="&color=".$this->input->get('color'); 
                           foreach($this->input->get("color") as $key=>$value)
                            {
                              $filter_get .='&color%5B'.$key.'%5D='.$value;
                            }
                            
                        }
                        if($this->input->get("size"))
                        {
                           //$filter_get .="&color=".$this->input->get('color'); 
                           foreach($this->input->get("size") as $key=>$value)
                            {
                              //echo $value;
                              $filter_get .='&size%5B'.$key.'%5D='.$value;
                            }
                            
                        }
                        if($this->input->get("position"))
                        {
                            $filter_get .="&position=".$this->input->get('position');
                            $filter_get .="&pages=".$this->input->get('pages');

                        }
                    }
                    
                    $filterparams = array();
                    $query_params = array();
                    // Process filter if any was posted

                    if( $this->input->get())
                    {
                        // Get all data from the search form
                        $filterparams = $this->input->get();
                        $this->session->set_flashdata('filterparams',$filterparams);
                    }
                    // sanitize params and only pass along the ones with data
                    foreach ($filterparams as $key => $value)
                    {
                        if ($value != '' && $value != NULL && $value != 'all')
                            $query_params[$key] = $value;
                    }
                    
                    //print("<pre>".print_r($this->session->flashdata('filterparams'),true)."</pre>"); //die;
                   // print("<pre>".print_r($filter_get,true)."</pre>"); die;
                    
                    $get_prd_count = $this->Fashion_model->record_count_allproduct_bycat($cat_id); // Get all Product by category details                  

                    //print("<pre>".print_r($this->Fashion_model->record_count_allproduct_bycat($cat_id),true)."</pre>"); die;

                    $config = array();
                    $config["base_url"] = base_url() . "fashion/products/".$nav_id;
                    $config["total_rows"] = $get_prd_count;
                    $config["per_page"] = $per_page;
                    $config["uri_segment"] = 4;
                    
                    // styling/html stuff
                    $config['full_tag_open'] = '<ul class="pagination">';
                    $config['full_tag_close'] = '</ul><!--pagination-->';
                    $config['first_link'] = '&laquo; First';
                    $config['first_tag_open'] = '<li class="prev page">';
                    $config['first_tag_close'] = '</li>' . "\n";
                    $config['last_link'] = 'Last &raquo;';
                    $config['last_tag_open'] = '<li class="next page"> ';
                    $config['last_tag_close'] = '</li>' . "\n"; 
                    //$config['next_link'] = 'Next &rarr;';
                    $config['next_link'] = '&raquo;';
                    $config['next_tag_open'] = '<li class="next page">';
                    $config['next_tag_close'] = '</li>' . "\n";
                    //$config['prev_link'] = '&larr; Previous';
                    $config['prev_link'] = '&laquo;';
                    $config['prev_tag_open'] = '<li class="prev page">';
                    $config['prev_tag_close'] = '</li>' . "\n";
                    $config['cur_tag_open'] = '<li class=""><a class="active"href="">';
                    $config['cur_tag_close'] = '</a></li>';
                    $config['num_tag_open'] = '<li class="page">';
                    $config['num_tag_close'] = '</li>' . "\n";
                    $this->pagination->initialize($config);
                    
                    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                    
                    $get_prd=$this->Fashion_model->_allproduct_bycat($cat_id,$config["per_page"],$page,$order_by,$this->session->flashdata('filterparams'));
                    
                    
                    //print("<pre>".print_r($get_prd,true)."</pre>"); die;
                    
                    $data["links"] = $this->pagination->create_links();
                    $data['get_prd']= $get_prd;
                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Jollof:-Fashion/'.$nav_id;
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, '.$nav_id;
                    $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                    $data ['colors_prdcounts'] = $this->Fashion_model->_get_filtercolor($cat_id,$store_id=null,$by_giftporte=null,$this->session->flashdata('filterparams'));
                    $data ['sizes_prdcounts'] = $this->Fashion_model->_get_filtersize($cat_id,$store_id=null,$by_giftporte=null,$this->session->flashdata('filterparams'));
                    $data ['stores_filterprdcounts'] = $this->Fashion_model->_get_filterstore($cat_id,$this->session->flashdata('filterparams'));
                    $data ['stores_prdcounts'] = $this->Fashion_model->_get_stores_prdcounts();
                    
                    $data_best_sellers = array("products_fashion.productsold >=" =>20);
                    $data['best_sellers'] = $this->Fashion_model->_get_product_rand(FALSE,$data_best_sellers,$limit=20);
                    
                    $data['cat_name']=$nav_id;
                    $data['breadcrumb']='<li class="active">'.$nav_id.'</li>';
                    
                    $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
                    $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
                    $data ['sidebar_loader']= 'included/fashionpage_included/sidebar_filter';
                    $data ['sidebar_mobile_loader']= 'included/fashionpage_included/sidebar_mobile_filter';
                    $data ['footer_loader']= 'included/fashionpage_included/footer';
                    $data ['error_page'] = 'included/error_page_fashion';
                    $data ['page_loader']= 'fashion_view/product';
                    //$this->load->view('included/header_fashion', $data);
                    $this->load->view('fashion_view/product_template', $data);
                    //$this->load->view('included/footer', $data);
                }
            else
                { 
                    redirect('fashion');
                }
            
            
	}

    public function allstore()
    {
        $data['info']= $this->Super_admin_model->get_admin_info();
            
            $get_prd_count = $this->Fashion_model->record_count_allproduct_bysearch($search_data=null,$by_catid=null,$layaway=1); // Get all Product by category details

            if( $this->input->get())
            {
                // Get all data from the search form
                $filterparams = $this->input->get();
                $this->session->set_flashdata('filterparams',$filterparams);
            }
            
            $config = array();
            $config["base_url"] = base_url() . "fashion/allstore";
            $config["total_rows"] = $get_prd_count;
            $config["per_page"] = 12;
            $config["uri_segment"] = 3;
            $config['enable_query_strings'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config["reuse_query_string"] = FALSE;

            // styling/html stuff
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul><!--pagination-->';
            $config['first_link'] = '&laquo; First';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>' . "\n";
            $config['last_link'] = 'Last &raquo;';
            $config['last_tag_open'] = '<li class="next page"> ';
            $config['last_tag_close'] = '</li>' . "\n"; 
            //$config['next_link'] = 'Next &rarr;';
            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>' . "\n";
            //$config['prev_link'] = '&larr; Previous';
            $config['prev_link'] = '&laquo;';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>' . "\n";
            $config['cur_tag_open'] = '<li class=""><a class="active"href="">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>' . "\n";
            $this->pagination->initialize($config);

            //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $page = ($this->input->get('page')) ? $this->input->get('page') : 0;

            $get_prd=$this->Fashion_model->_get_stores();

            //print("<pre>".print_r($this->Fashion_model->_get_stores_prdcounts(),true)."</pre>"); die;

            //print("<pre>".print_r($get_prd,true)."</pre>"); die;

            //$data["links"] = $this->pagination->create_links();
            $data['get_prd']= $get_prd;
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-Fashion layaway';
            $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, layaway';
            $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
            //$data ['colors_prdcounts'] = $this->Fashion_model->_get_filtercolor_search($search_data,$this->session->flashdata('filterparams'));
            //$data ['sizes_prdcounts'] = $this->Fashion_model->_get_filtersize_search($search_data,$this->session->flashdata('filterparams'));
            $data ['stores_prdcounts'] = $this->Fashion_model->_get_stores_prdcounts();
            
            $data_best_sellers = array("products_fashion.productsold >=" =>20);
            $data['best_sellers'] = $this->Fashion_model->_get_product_rand(FALSE,$data_best_sellers,$limit=20);
                    
            $data['cat_name']=$search_data;
            $data['breadcrumb']='<li class="active">All Store</li>';

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
            $data ['sidebar_loader']= 'included/fashionpage_included/sidebar_filter';
            $data ['sidebar_mobile_loader']= 'included/fashionpage_included/sidebar_mobile_filter';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'fashion_view/allstore';

            //$this->load->view('included/header_fashion', $data);
            $this->load->view('fashion_view/product_template', $data);
            //$this->load->view('included/footer', $data);
            
    }

    public function layaway()
    {
        $data['info']= $this->Super_admin_model->get_admin_info();
            
            $get_prd_count = $this->Fashion_model->record_count_allproduct_bysearch($search_data=null,$by_catid=null,$layaway=1); // Get all Product by category details

            if( $this->input->get())
            {
                // Get all data from the search form
                $filterparams = $this->input->get();
                $this->session->set_flashdata('filterparams',$filterparams);
            }
            
            $config = array();
            $config["base_url"] = base_url() . "fashion/products/layaway";
            $config["total_rows"] = $get_prd_count;
            $config["per_page"] = 12;
            $config["uri_segment"] = 3;
            $config['enable_query_strings'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config["reuse_query_string"] = FALSE;

            // styling/html stuff
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul><!--pagination-->';
            $config['first_link'] = '&laquo; First';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>' . "\n";
            $config['last_link'] = 'Last &raquo;';
            $config['last_tag_open'] = '<li class="next page"> ';
            $config['last_tag_close'] = '</li>' . "\n"; 
            //$config['next_link'] = 'Next &rarr;';
            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>' . "\n";
            //$config['prev_link'] = '&larr; Previous';
            $config['prev_link'] = '&laquo;';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>' . "\n";
            $config['cur_tag_open'] = '<li class=""><a class="active"href="">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>' . "\n";
            $this->pagination->initialize($config);

            //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $page = ($this->input->get('page')) ? $this->input->get('page') : 0;

            $get_prd=$this->Fashion_model->_allproduct_bysearch($search_data=null,$by_catid,$config["per_page"],$page,$layaway=1);

            //print("<pre>".print_r($this->uri->segment(3),true)."</pre>"); 

            //print("<pre>".print_r($get_prd,true)."</pre>"); die;

            $data["links"] = $this->pagination->create_links();
            $data['get_prd']= $get_prd;
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-Fashion layaway';
            $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, layaway';
            $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
            $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
            //$data ['colors_prdcounts'] = $this->Fashion_model->_get_filtercolor_search($search_data,$this->session->flashdata('filterparams'));
            //$data ['sizes_prdcounts'] = $this->Fashion_model->_get_filtersize_search($search_data,$this->session->flashdata('filterparams'));
            $data ['stores_prdcounts'] = $this->Fashion_model->_get_stores_prdcounts();
            
            $data_best_sellers = array("products_fashion.productsold >=" =>20);
            $data['best_sellers'] = $this->Fashion_model->_get_product_rand(FALSE,$data_best_sellers,$limit=20);
                    
            $data['cat_name']=$search_data;
            $data['breadcrumb']='<li class="active">Layaway</li>';

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
            $data ['sidebar_loader']= 'included/fashionpage_included/sidebar_filter';
            $data ['sidebar_mobile_loader']= 'included/fashionpage_included/sidebar_mobile_filter';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'fashion_view/product';

            //$this->load->view('included/header_fashion', $data);
            $this->load->view('fashion_view/product_template', $data);
            //$this->load->view('included/footer', $data);
            
    }
        
        public function searchdata($search_data,$by_catid)
        {
            $data['info']= $this->Super_admin_model->get_admin_info();
            
            $get_prd_count = $this->Fashion_model->record_count_allproduct_bysearch($search_data,$by_catid); // Get all Product by category details

            if( $this->input->get())
            {
                // Get all data from the search form
                $filterparams = $this->input->get();
                $this->session->set_flashdata('filterparams',$filterparams);
            }
            
            $config = array();
            $config["base_url"] = base_url() . "fashion/product?cate_option=".$this->input->get('cate_option', TRUE)."&search=".$this->input->get('search', TRUE);
            $config["total_rows"] = $get_prd_count;
            $config["per_page"] = 12;
            $config["uri_segment"] = 3;
            $config['enable_query_strings'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config["reuse_query_string"] = FALSE;

            // styling/html stuff
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul><!--pagination-->';
            $config['first_link'] = '&laquo; First';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>' . "\n";
            $config['last_link'] = 'Last &raquo;';
            $config['last_tag_open'] = '<li class="next page"> ';
            $config['last_tag_close'] = '</li>' . "\n"; 
            //$config['next_link'] = 'Next &rarr;';
            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>' . "\n";
            //$config['prev_link'] = '&larr; Previous';
            $config['prev_link'] = '&laquo;';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>' . "\n";
            $config['cur_tag_open'] = '<li class=""><a class="active"href="">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>' . "\n";
            $this->pagination->initialize($config);

            //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $page = ($this->input->get('page')) ? $this->input->get('page') : 0;

            $get_prd=$this->Fashion_model->_allproduct_bysearch($search_data,$by_catid,$config["per_page"],$page);

            //print("<pre>".print_r($this->uri->segment(3),true)."</pre>"); 

            //print("<pre>".print_r($get_prd,true)."</pre>"); die;

            $data["links"] = $this->pagination->create_links();
            $data['get_prd']= $get_prd;
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-Fashion/'.$search_data;
            $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, '.$search_data;
            $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
            $data ['colors_prdcounts'] = $this->Fashion_model->_get_filtercolor_search($search_data,$this->session->flashdata('filterparams'));
            $data ['sizes_prdcounts'] = $this->Fashion_model->_get_filtersize_search($search_data,$this->session->flashdata('filterparams'));
            $data ['stores_prdcounts'] = $this->Fashion_model->_get_stores_prdcounts();
            
            $data_best_sellers = array("products_fashion.productsold >=" =>20);
            $data['best_sellers'] = $this->Fashion_model->_get_product_rand(FALSE,$data_best_sellers,$limit=20);
                    
            $data['cat_name']=$search_data;
            $data['breadcrumb']='<li class="active">'.$search_data.'</li>';

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
            $data ['sidebar_loader']= 'included/fashionpage_included/sidebar_filter';
            $data ['sidebar_mobile_loader']= 'included/fashionpage_included/sidebar_mobile_filter';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'fashion_view/product';

            //$this->load->view('included/header_fashion', $data);
            $this->load->view('fashion_view/product_template', $data);
            //$this->load->view('included/footer', $data);
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
	
        public function store()
        {
            $store = $this->uri->segment(3);
            $store_product = $this->uri->segment(4);
            $data['info']= $this->Super_admin_model->get_admin_info();
            
            if(isset($store_product)&& !is_numeric($store_product))
                {
                    $store_id = $this->Fashion_model->_getproductid($store_product); // Get url Id
                    if($store_id == FALSE){redirect('fashion/store/'.$store);} // If its a wrong url 
                    
                    
                    $data['get_prd'] = $this->Fashion_model->_getproductdetails_byid($store_id); // Get all Product by category details
                    
                    if( $this->input->get())
                    {
                        // Get all data from the search form
                        $filterparams = $this->input->get();
                        $this->session->set_flashdata('filterparams',$filterparams);
                    }
                    //print("<pre>".print_r($this->session->flashdata('filterparams'),true)."</pre>"); //die;
                    //print("<pre>".print_r($this->Fashion_model->_getproductdetails_byid($store_id),true)."</pre>"); die;

                    
                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Jollof:-Fashion/';
                    $data['store_url']=$store;
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, '.$store;
                    $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                    $data ['colors_prdcounts'] = $this->Fashion_model->_get_filtercolor(null,$store_id,$by_giftporte=null,$this->session->flashdata('filterparams'));
                    $data ['sizes_prdcounts'] = $this->Fashion_model->_get_filtersize(null,$store_id,$by_giftporte=null,$this->session->flashdata('filterparams'));
                    $data ['stores_prdcounts'] = $this->Fashion_model->_get_stores_prdcounts();
                    
                    $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
                    $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
                    $data ['sidebar_loader']= 'included/fashionpage_included/sidebar_filter';
                    $data ['sidebar_mobile_loader']= 'included/fashionpage_included/sidebar_mobile_filter';
                    $data ['footer_loader']= 'included/fashionpage_included/footer';
                    $data ['error_page'] = 'included/error_page_fashion';
                    $data ['page_loader']= 'fashion_view/product';
                
                    //$this->load->view('included/header_fashion', $data);
                    $this->load->view('fashion_view/product_details', $data);
                    //$this->load->view('included/footer', $data);

                   
                }
            elseif (isset($store)) 
                {   
                    
                    $store_id = $this->Fashion_model->_getstoreid($store); // Get url Id
                    if($store_id == FALSE){redirect('fashion');} // If its a wrong url 
                    
                    $order_by  = $this->input->get('position');
                    $per_page=12;
                    if($this->input->get("pages"))
                    {
                    $per_page  = $this->input->get('pages');
                    }
                    
                    $get_prd_count = $this->Fashion_model->record_count_allproduct_bystore($store_id);
                    
                    if( $this->input->get())
                    {
                        // Get all data from the search form
                        $filterparams = $this->input->get();
                        $this->session->set_flashdata('filterparams',$filterparams);
                    }
                    //print("<pre>".print_r($this->session->flashdata('filterparams'),true)."</pre>"); //die;
                    
                    $config = array();
                    $config["base_url"] = base_url() . "fashion/store/".$store;
                    $config["total_rows"] = $get_prd_count;
                    $config["per_page"] = $per_page;
                    $config["uri_segment"] = 4;
                    
                    // styling/html stuff
                    $config['full_tag_open'] = '<ul class="pagination">';
                    $config['full_tag_close'] = '</ul><!--pagination-->';
                    $config['first_link'] = '&laquo; First';
                    $config['first_tag_open'] = '<li class="prev page">';
                    $config['first_tag_close'] = '</li>' . "\n";
                    $config['last_link'] = 'Last &raquo;';
                    $config['last_tag_open'] = '<li class="next page"> ';
                    $config['last_tag_close'] = '</li>' . "\n"; 
                    //$config['next_link'] = 'Next &rarr;';
                    $config['next_link'] = '&raquo;';
                    $config['next_tag_open'] = '<li class="next page">';
                    $config['next_tag_close'] = '</li>' . "\n";
                    //$config['prev_link'] = '&larr; Previous';
                    $config['prev_link'] = '&laquo;';
                    $config['prev_tag_open'] = '<li class="prev page">';
                    $config['prev_tag_close'] = '</li>' . "\n";
                    $config['cur_tag_open'] = '<li class=""><a class="active"href="">';
                    $config['cur_tag_close'] = '</a></li>';
                    $config['num_tag_open'] = '<li class="page">';
                    $config['num_tag_close'] = '</li>' . "\n";
                    $this->pagination->initialize($config);
                    
                    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                    
                    $get_prd=$this->Fashion_model->_allproduct_bystore(null,$store_id,$config["per_page"],$page,$order_by,$this->session->flashdata('filterparams'));
                    
                    
                    
                    
                    $store_details = $this->Fashion_model->get_restaurant_info($store_id);
                    //$data['get_prd'] = $this->Fashion_model->_allproduct_bystore($cat_id=FALSE,$store_id,$config["per_page"],$page);
                    
                    $data["links"] = $this->pagination->create_links();
                    $data['get_prd']= $get_prd;
                    
                    
                    //print("<pre>".print_r($this->pagination->create_links(),true)."</pre>"); die;
                    
                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Jollof:-Fashion '.$store;
                    $data ['store_url']=$store;
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, '.$store;
                    //$data ['nav'] = $this->Fashion_model->_allcat_bystore_navcount($store_id);
                    $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                    $data ['colors_prdcounts'] = $this->Fashion_model->_get_filtercolor(null,$store_id,$by_giftporte=null,$this->session->flashdata('filterparams'));
                    $data ['sizes_prdcounts'] = $this->Fashion_model->_get_filtersize(null,$store_id,$by_giftporte=null,$this->session->flashdata('filterparams'));
                    $data ['stores_prdcounts'] = $this->Fashion_model->_get_stores_prdcounts();
                    $data ['resta'] = $store_details;
                    $data ['cat_name']=$store;
                    $data ['breadcrumb']='<li class="active">'.$store.'</li>';
                    
                    $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
                    $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
                    $data ['sidebar_loader']= 'included/fashionpage_included/sidebar_filter_store';
                    $data ['sidebar_mobile_loader']= 'included/fashionpage_included/sidebar_mobile_filter_store';
                    $data ['footer_loader']= 'included/fashionpage_included/footer';
                    $data ['error_page'] = 'included/error_page_fashion';
                    $data ['page_loader']= 'fashion_view/store';
                
                    //$this->load->view('included/header_fashion', $data);
                    $this->load->view('fashion_view/product_template', $data);
                    //$this->load->view('included/footer', $data);
                    
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

        public function giftportal()
        {
            $giftportal = $this->uri->segment(4);
            $giftportal_product = $this->uri->segment(3);
            $data['info']= $this->Super_admin_model->get_admin_info();
            
            if(isset($giftportal_product) && !is_numeric($giftportal_product))
                {
                    $giftportal_id = $this->Fashion_model->_getproductid($giftportal_product); // Get url Id
                    if($giftportal_id == FALSE){redirect('fashion/giftportal');} // If its a wrong url 
                    
                    
                    $data['get_prd'] = $this->Fashion_model->_getproductdetails_byid($giftportal_id); // Get all Product by category details
                    
                    if( $this->input->get())
                    {
                        // Get all data from the search form
                        $filterparams = $this->input->get();
                        $this->session->set_flashdata('filterparams',$filterparams);
                    }
                    //print("<pre>".print_r($this->session->flashdata('filterparams'),true)."</pre>"); //die;
                    //print("<pre>".print_r($this->Fashion_model->_getproductdetails_byid($giftportal_id),true)."</pre>"); die;

                    
                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Jollof:-Fashion/';
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, Giftportal ';
                    $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                    $data ['colors_prdcounts'] = $this->Fashion_model->_get_filtercolor(null,$giftportal_id,$by_giftporte=null,$this->session->flashdata('filterparams'));
                    $data ['sizes_prdcounts'] = $this->Fashion_model->_get_filtersize(null,$giftportal_id,$by_giftporte=null,$this->session->flashdata('filterparams'));
                    $data ['stores_prdcounts'] = $this->Fashion_model->_get_stores_prdcounts();
                    
                    $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
                    $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
                    $data ['sidebar_loader']= 'included/fashionpage_included/sidebar_filter';
                    $data ['sidebar_mobile_loader']= 'included/fashionpage_included/sidebar_mobile_filter';
                    $data ['footer_loader']= 'included/fashionpage_included/footer';
                    $data ['error_page'] = 'included/error_page_fashion';
                    $data ['page_loader']= 'fashion_view/product';
                
                    //$this->load->view('included/header_fashion', $data);
                    $this->load->view('fashion_view/giftportal_details', $data);
                    //$this->load->view('included/footer', $data);

                   
                }
            else//if (isset($giftportal)) 
                {   
                    
                    $order_by  = $this->input->get('position');
                    $per_page=12;
                    if($this->input->get("pages"))
                    {
                    $per_page  = $this->input->get('pages');
                    }
                    
                    $get_prd_count = $this->Fashion_model->record_count_allproduct_bygiftportal();
                    
                    if( $this->input->get())
                    {
                        // Get all data from the search form
                        $filterparams = $this->input->get();
                        $this->session->set_flashdata('filterparams',$filterparams);
                    }
                    //print("<pre>".print_r($this->session->flashdata('filterparams'),true)."</pre>"); //die;
                    
                    $config = array();
                    $config["base_url"] = base_url() . "fashion/giftportal/";
                    $config["total_rows"] = $get_prd_count;
                    $config["per_page"] = $per_page;
                    $config["uri_segment"] = 4;
                    
                    // styling/html stuff
                    $config['full_tag_open'] = '<ul class="pagination">';
                    $config['full_tag_close'] = '</ul><!--pagination-->';
                    $config['first_link'] = '&laquo; First';
                    $config['first_tag_open'] = '<li class="prev page">';
                    $config['first_tag_close'] = '</li>' . "\n";
                    $config['last_link'] = 'Last &raquo;';
                    $config['last_tag_open'] = '<li class="next page"> ';
                    $config['last_tag_close'] = '</li>' . "\n"; 
                    //$config['next_link'] = 'Next &rarr;';
                    $config['next_link'] = '&raquo;';
                    $config['next_tag_open'] = '<li class="next page">';
                    $config['next_tag_close'] = '</li>' . "\n";
                    //$config['prev_link'] = '&larr; Previous';
                    $config['prev_link'] = '&laquo;';
                    $config['prev_tag_open'] = '<li class="prev page">';
                    $config['prev_tag_close'] = '</li>' . "\n";
                    $config['cur_tag_open'] = '<li class=""><a class="active"href="">';
                    $config['cur_tag_close'] = '</a></li>';
                    $config['num_tag_open'] = '<li class="page">';
                    $config['num_tag_close'] = '</li>' . "\n";
                    $this->pagination->initialize($config);
                    
                    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                    
                    $get_prd=$this->Fashion_model->_allproduct_bygiftportal(null,$config["per_page"],$page,$order_by,$this->session->flashdata('filterparams'));
                    
                    
                    //print("<pre>".print_r($get_prd,true)."</pre>"); die;
                    
                    //$store_details = $this->Fashion_model->get_restaurant_info($store_id);
                    //$data['get_prd'] = $this->Fashion_model->_allproduct_bystore($cat_id=FALSE,$store_id,$config["per_page"],$page);
                    
                    $data["links"] = $this->pagination->create_links();
                    $data['get_prd']= $get_prd;
                    
                    
                    //print("<pre>".print_r($this->pagination->create_links(),true)."</pre>"); die;
                    
                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Jollof:-Fashion Giftportal';
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, Giftportal';
                    //$data ['nav'] = $this->Fashion_model->_allcat_bystore_navcount($store_id);
                    $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                    $data ['colors_prdcounts'] = $this->Fashion_model->_get_filtercolor(null,$store_id=null,$by_giftporte=1,$this->session->flashdata('filterparams'));
                    $data ['sizes_prdcounts'] = $this->Fashion_model->_get_filtersize(null,$store_id=null,$by_giftporte=1,$this->session->flashdata('filterparams'));
                    $data ['stores_prdcounts'] = $this->Fashion_model->_get_stores_prdcounts();
                    //$data ['resta'] = $store_details;
                    $data ['cat_name']='Giftportal';
                    $data ['breadcrumb']='<li class="active"> Giftportal</li>';
                    
                    $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
                    $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
                    $data ['sidebar_loader']= 'included/fashionpage_included/sidebar_filter_store';
                    $data ['sidebar_mobile_loader']= 'included/fashionpage_included/sidebar_mobile_filter_store';
                    $data ['footer_loader']= 'included/fashionpage_included/footer';
                    $data ['error_page'] = 'included/error_page_fashion';
                    $data ['page_loader']= 'fashion_view/giftportal';
                
                    //$this->load->view('included/header_fashion', $data);
                    $this->load->view('fashion_view/product_template', $data);
                    //$this->load->view('included/footer', $data);
                    
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
            $get_prd = $this->Fashion_model->_allproduct_bystore($cat_id,$store_id,null,null);
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
            //$by_sizeid  = $_POST["product_sizeid"];
            if((isset($by_colorid) && !empty($by_colorid)) && (isset($_POST["product_sizeid"]) && !empty($_POST["product_sizeid"])) ){
                
                $get_data = $this->Fashion_model->_get_price_qty($by_prdid,$by_colorid,$_POST["product_sizeid"]);// get price to db
                
            }
            elseif((isset($by_colorid) && !empty($by_colorid)) && (!isset($_POST["product_sizeid"])) ) 
            {
                $get_data = $this->Fashion_model->_get_price_qty($by_prdid,$by_colorid);// get price to db
            }
            
            if($get_data) 
            {
                foreach($get_data as $row)
                {
                    if($row->discount_price == 0)
                    {
                        echo '₦<span class="get_price" data-get_price='.$row->price.'>'.number_format(floatval($row->price), 2).'</span>' ;
                    }
                    else
                    {
                        $disco  = $row->discount_price;
                        $was_price  = $row->price;
                        $new_price = floatval($was_price) - floatval($disco);
                        $new_price_edit  =  number_format($new_price, 2);
                                                                
                        echo '<s style=" font-size: 16px;">₦'.number_format(floatval($was_price), 2,'.', ',').'</s> ₦<span class="get_price" data-get_price='.$new_price.'>'.$new_price_edit.'</span>';
                    }

                }
            }
            
        }

        public function get_jpoint_qty() 
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
                    echo '<span class="get_price" data-get_price='.$row->jpoints.'>'.number_format(floatval($row->jpoints), 2).'</span> Jpoints' ;
                    
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
