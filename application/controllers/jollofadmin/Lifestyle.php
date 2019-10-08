<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lifestyle extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('role_assignment');
        $this->load->model('system_modules');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->model('movie');
        $this->load->model('event');
        $this->load->model('user_role');
        $this->load->helper('text');
    }

    public function movies($existing_search=0, $page=0)
    {
        //$this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Lifestyle Movies";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Lifestyle Movies</li>';
        $data['mainmenu'] = "lifestylemovie";
        $data['submenu'] = "movies";
        
        $filterparams = array();
        $query_params = array();

        // Process filter if any was posted
        //$filterparams['moviedatebymcgratenow'] = 1;
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
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
        
        // Load all the Merchants
        
        $data['movie'] = $this->movie->getAllByMovie($query_params, $page);
        $data['moviecount'] = $this->movie->getAllByMovieCount($query_params);
        $data['allmovies'] = $this->Generic->getAll($tablename='movie', $limit=NULL, $fieldlist=null, $createdat=null, $updatedat=null, $orderbyfield='name');
        // Get record count for pagination
        $all_count = $this->movie->getAllByMovieCount($query_params);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->movie->getAllByMovie($query_params, $page),true)."</pre>");die;
        $order_params['status'] = 0; // this is to get total pending B2B count
        $data['incinema'] = '';//$this->restaurant->getAllCount($order_params);
        
        $order_params['status'] = 1; // this is to get total cancelled B2B count
        $data['offcinema']  = '';//$this->restaurant->getAllCount($order_params);
        
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/lifestyle/movies/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'lifestyle-movies';
        $this->load->view('jollof_admin/layoutlifestyle', $data);
    }

    // Controller function to actually add the Movie; this method is what will save the new Movie
    public function moviesave()
    {
        if (empty($_FILES['movie_image']['name']) )
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'Movie Image File is Required ');
            redirect('jollofadmin/lifestyle/movieaddform', 'refresh');
        }

        $fullpath = './assets/uploads/movies/mainimage/';

        $file_name = "movie_image";  // name of image input from the view
        $newname = $this->utility->generate_random_string(6).'_movie'.time();  // Random Encryp new name save to app

        $config['upload_path'] = './assets/uploads/movies/mainimage/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        //$config['max_size'] = '1096';   
        $config['remove_spaces']  = TRUE;
        $config['overwrite'] = TRUE;
        $config['file_name'] = $newname;//$_POST["r_logoimage"];

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload($file_name))
        {
            $mssg = $this->upload->display_errors();
            //print("<pre>".print_r($mssg,true)."</pre>");die;
            $Json_resultSave = array (
                                'status' => '0',
                                'content' => $mssg
                                );
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Saving Movie image :- '.$mssg);
            redirect('jollofadmin/lifestyle/movieaddform', 'refresh');
        }

        // data to save in db
        // 
        $exploded = explode('.',$_FILES['movie_image']['name']);
        $file_extn = strtolower(end($exploded));

        if(isset($_POST['cropimg'])&& !empty($_POST['cropimg']))
        {
        //Using cropping tools 
        
            $cropimg_data = $_POST['cropimg'];

            $cropimg_remove_array1 = explode(";", $cropimg_data);

            $cropimg_remove_array2 = explode(",", $cropimg_remove_array1[1]);

            $cropimg = base64_decode($cropimg_remove_array2[1]);
            
            $img_name = $newname. '.'.$file_extn;     // Random Encryp new name save to app

            $dir_to_save = "./assets/uploads/movies/";
            
            file_put_contents($dir_to_save.$img_name, $cropimg);
        }
        else
        {
            $data = $this->upload->data(); 
            create_thumb($data, '250', '320', './assets/uploads/movies/', TRUE);
        }
            $data_New = array(      
                            'triller_youtubeurl'  =>  $this->input->post("link"),
                            'adminid'        =>  $this->session->merchant_id,
                            'name'           =>  $this->input->post("name"),
                            'summary'        =>  $this->input->post("summary"),
                            'genre'          =>  $this->input->post("genre"),
                            'age_restriction'=>  $this->input->post("age"),
                            'image'          =>  $newname. '.'.$file_extn,
                            'duration'       =>  $this->input->post("duration"),
                            'director'       =>  $this->input->post("director"),
                            'starring'       =>  $this->input->post("starring")
                         );

            $config = array(
                        'table' => 'movie',
                        'id' => 'id',
                        'field' => 'slug',
                        'title' => 'title',
                        'replacement' => 'dash' // Either dash or underscore
                        );
            $this->load->library('slug', $config);

            $data_slug = array( 'slug' => $_POST["name"]);  // slug name of filed in db were ur url is stored
            $data['slug'] = $this->slug->create_uri($data_slug);

            $insert_movie = $this->Generic->add($data_New, $tablename="movie");
            //$this->Restaurant_admin_model->_save_product($data_New, $check);// insert to db
            
        if($insert_movie) 
        {

            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Movie Added');
            $Json_resultSave = array ('status' => '1');
            redirect('jollofadmin/lifestyle/addform', 'refresh');
            
        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Adding Movie');
            $Json_resultSave = array ('status' => '0');
            redirect('jollofadmin/lifestyle/addform', 'refresh');
        }
    }

    public function cinemas($existing_search=0, $page=0)
    {
        //$this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Lifestyle Cinemas";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Lifestyle Cinemas</li>';
        $data['mainmenu'] = "lifestylemovie";
        $data['submenu'] = "cinemas";
        
        $filterparams = array();
        $query_params = array();

        // Process filter if any was posted
        //$filterparams['moviedatebymcgratenow'] = 1;
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
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
        
        // Load all the Merchants
        
        $data['cinema'] = $this->movie->getAllByCinema($query_params, $page);
        $data['cinemacount'] = $this->movie->getAllByCinemaCount($query_params);
        // Get record count for pagination
        $all_count = $this->movie->getAllByCinemaCount($query_params);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->movie->getAllByCinema($query_params, $page),true)."</pre>");die;

        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/lifestyle/cinemas/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'lifestyle-cinema';
        $this->load->view('jollof_admin/layoutlifestyle', $data);
    }
    public function cinemasave()
    {
        $data_New = array(      
                        'code'          =>  strtoupper($this->utility->generate_random_string(10)),
                        'name'          =>  $this->input->post("name"),
                        'email'         =>  $this->input->post("email"),
                        'phone'         =>  $this->input->post("phone"),
                        'cityid'        =>  $this->input->post("city"),
                        'stateid'       =>  $this->input->post("state"),
                        'adminid'       =>  $this->session->merchant_id,
                        'address'       =>  $this->input->post("address"),
                        'latitude'      =>  $_POST["latitude"],
                        'longitude'     =>  $_POST["longitude"]
                     );

        $config = array(
                    'table' => 'movie_cinema',
                    'id' => 'id',
                    'field' => 'slug',
                    'title' => 'title',
                    'replacement' => 'dash' // Either dash or underscore
                    );
        $this->load->library('slug', $config);

        $data_slug = array( 'slug' => $_POST["name"]);  // slug name of filed in db were ur url is stored
        $data['slug'] = $this->slug->create_uri($data_slug);

        $insert_cinema = $this->Generic->add($data_New, $tablename="movie_cinema");
        //$this->Restaurant_admin_model->_save_product($data_New, $check);// insert to db
            
        if($insert_cinema) 
        {

            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Cinema Added');
            $Json_resultSave = array ('status' => '1');
            redirect('jollofadmin/lifestyle/addform', 'refresh');
            
        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Adding Cinema');
            $Json_resultSave = array ('status' => '0');
            redirect('jollofadmin/lifestyle/addform', 'refresh');
        }
    }

    public function showing($existing_search=0, $page=0)
    {
        $data['pageheader'] = "Lifestyle Movies Showing in Cinemas";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Lifestyle Movies Showing in Cinemas</li>';
        $data['mainmenu'] = "lifestylemovie";
        $data['submenu'] = "showing";

        $filterparams = array();
        $query_params = array();
        $existing_search=0;
        // Process filter if any was posted

        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
          // Get all data from the search form
          $filterparams = $this->input->post();
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
        $data['showing'] = $this->movie->getAllByMovieCinema($query_params, $page);
        $data['showingcount'] = $this->movie->getAllByMovieCinemaCount($query_params, $page);
        //print("<pre>".print_r(  $this->movie->getAllByMovieCinema($query_params, $page),true)."</pre>");die;

        $data ['content_file']= 'lifestyle-showing';
        $this->load->view('jollof_admin/layoutlifestyle', $data);
    }

    public function showingsave()
    {
        $data_New = array(
                        'movieid'         =>  $this->input->post("movie"),
                        'cinemaid'        =>  $this->input->post("cinema"),
                        'moviedate'       =>  $this->input->post("date"),
                        'movietime'       =>  $this->input->post("time"),
                        'billadult'       =>  $this->input->post("adult"),
                        'billstudent'     =>  $this->input->post("student"),
                        'billchildren'    =>  $this->input->post("kid"),
                        'adminid'         =>  $this->session->merchant_id,
                     );

        $insert_showing = $this->Generic->add($data_New, $tablename="movie_and_cinema");
        //$this->Restaurant_admin_model->_save_product($data_New, $check);// insert to db
            
        if($insert_showing) 
        {

            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Movie Showing in Cinema Added');
            $Json_resultSave = array ('status' => '1');
            redirect('jollofadmin/lifestyle/addform', 'refresh');
            
        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Adding Movie Showing in Cinema');
            $Json_resultSave = array ('status' => '0');
            redirect('jollofadmin/lifestyle/addform', 'refresh');
        }
    }

    public function events($existing_search=0, $page=0)
    {
        //$this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Lifestyle Events";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Lifestyle Events</li>';
        $data['mainmenu'] = "Lifestyleevent";
        $data['submenu'] = "events";
        
        $filterparams = array();
        $query_params = array();

        // Process filter if any was posted
        //$filterparams['eventexpdatetimegratenow'] = 1;
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
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
        
        // Load all the Merchants
        
        $data['event'] = $this->event->getAll($query_params, $page);
        $data['eventcount'] = $this->event->getAllCount($query_params, $page);
        // Get record count for pagination
        $all_count = $this->event->getAllCount($query_params);
        
        // Load stats
        //$order_params = $query_params;
        
        $order_params['eventexpdatetimegratenow'] = 1; // this is to get total pending B2B count
        $data['activeevents'] = $this->event->getAllCount($order_params);
        
        $order_params['eventexpdatetimelessnow'] = 1; // this is to get total cancelled B2B count
        $data['inactiveevents']  = $this->event->getAllCount($order_params);
        
        //print("<pre>".print_r($this->event->getAll($query_params, $page),true)."</pre>");die;
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/lifestyle/events/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'lifestyle-events';
        $this->load->view('jollof_admin/layoutlifestyle', $data);
    }

    // Controller function to actually add the product; this method is what will save the new product
    public function eventsave()
    {
            if (empty($_FILES['event_image']['name']) )
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'Event Image File is Required ');
                redirect('jollofadmin/lifestyle/eventaddform', 'refresh');
            }
            $fullpath = './assets/uploads/events/mainimage/';

            $file_name = "event_image";  // name of image input from the view
            $newname = $this->utility->generate_random_string(6).'_event'.time();  // Random Encryp new name save to app

            $config['upload_path'] = './assets/uploads/events/mainimage/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            //$config['max_size'] = '1096';   
            $config['remove_spaces']  = TRUE;
            $config['overwrite'] = TRUE;
            $config['file_name'] = $newname;//$_POST["r_logoimage"];

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload($file_name))
                {
                    $mssg = $this->upload->display_errors();
                    //print("<pre>".print_r($mssg,true)."</pre>");die;
                    $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => $mssg
                                        );
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Saving event image :- '.$mssg);
                    redirect('jollofadmin/lifestyle/eventaddform', 'refresh');
                }

            // data to save in db
            // 
            $exploded = explode('.',$_FILES['event_image']['name']);
            $file_extn = strtolower(end($exploded));

            if(isset($_POST['cropimg'])&& !empty($_POST['cropimg']))
            {
            //Using cropping tools 
            
                $cropimg_data = $_POST['cropimg'];

                $cropimg_remove_array1 = explode(";", $cropimg_data);

                $cropimg_remove_array2 = explode(",", $cropimg_remove_array1[1]);

                $cropimg = base64_decode($cropimg_remove_array2[1]);
                
                $img_name = $newname. '.'.$file_extn;     // Random Encryp new name save to app

                $dir_to_save = "./assets/uploads/events/";
                
                file_put_contents($dir_to_save.$img_name, $cropimg);
            }
            else
            {
                $data = $this->upload->data(); 
                create_thumb($data, '350', '250', './assets/uploads/events/', TRUE);
            }
                $data_New = array(      'merchantid'    =>  0,
                                        'isadmin'       =>  1,
                                        'adminid'       =>  $this->session->merchant_id,
                                        'eventcode'     =>  'EVT-'.strtoupper($this->utility->generate_random_string(8)),
                                        'name'          =>  $this->input->post("name"),
                                        'description'   =>  $this->input->post("description"),
                                        'image'         =>  $newname. '.'.$file_extn,
                                        'price'         =>  $this->input->post("price"),
                                        'address'       =>  $this->input->post("address"),
                                        'cityid'        =>  $this->input->post("city"),
                                        'stateid'       =>  $this->input->post("state"),
                                        'latitude'      =>  $_POST["latitude"],
                                        'longitude'     =>  $_POST["longitude"]
                                     );

                $config = array(
                            'table' => 'event',
                            'id' => 'id',
                            'field' => 'slug',
                            'title' => 'title',
                            'replacement' => 'dash' // Either dash or underscore
                            );
                $this->load->library('slug', $config);

                $data_slug = array( 'slug' => $_POST["name"]);  // slug name of filed in db were ur url is stored
                $data['slug'] = $this->slug->create_uri($data_slug);

                $insert_event = $this->Generic->add($data_New, $tablename="event");
                //$this->Restaurant_admin_model->_save_product($data_New, $check);// insert to db

                if($insert_event)
                {
                    // inser Additional Product Options
                    $eventdateArr  = $this->input->post("addevent_date");
                    $eventstartArr = $this->input->post("addevent_starttime");
                    $eventendArr   = $this->input->post("addevent_endtime"); 
                    $eventspaceArr = $this->input->post("addevent_space"); 
                
                    if(!empty($eventdateArr) && !empty($eventstartArr))
                    {
                        for($i = 0; $i < count($eventdateArr); $i++)
                        {
                            if( !empty($eventdateArr[$i]) && !empty($eventstartArr[$i]) )
                            {
                                $data_merge = array(
                                        'eventid'       =>  $insert_event,
                                        'eventdate'     =>  $eventdateArr[$i],
                                        'eventstarttime'=>  $eventstartArr[$i],
                                        'eventendtime'  =>  $eventendArr[$i],
                                        'eventspace'    =>  $eventspaceArr[$i]
                                );

                                $insert_eventdate =$this->Generic->add($data_merge, $tablename="event_date"); // insert query here
                            }
                        } //end of for loop
                    }

                    foreach($_POST['category'] as $key=>$cat_name) 
                    {
                        $data_New3= array(  
                                        'cate_eventsid' =>  $cat_name,
                                        'eventid'       =>  $insert_event
                                     );
                        // insert to event category db 
                        $this->Generic->add($data_New3,$tablename='event_and_categries');
                    }

                }

                
            if($insert_eventdate) 
            {
                $data_Update = array('eventexpdatetime'=>  $_POST['categoryname']);
                $insert_data = $this->Generic->edit($data_Update, $insert_event , $tablename="event"); 

                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'Event Added');
                $Json_resultSave = array ('status' => '1');
                redirect('jollofadmin/lifestyle/addform', 'refresh');
                
            }
            else 
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Adding Event');
                $Json_resultSave = array ('status' => '0');
                redirect('jollofadmin/lifestyle/addform', 'refresh');
            }
    }

    public function eventscategory($existing_search=0, $page=0)
    {
        //$this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Lifestyle Events";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Lifestyle Events</li>';
        $data['mainmenu'] = "Lifestyleevent";
        $data['submenu'] = "eventscategory";
        

        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
        
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
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
        
        // Load all the Merchants
        $data['category'] = $this->event->getAllCategory($query_params,  $page);
        // Get record count for pagination
        $all_count = $this->event->getAllCategoryCount($query_params);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->event->getAllCategory($query_params,$page),true)."</pre>");die;
        
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/lifestyle/eventscategory/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'lifestyle-eventcategory';
        $this->load->view('jollof_admin/layoutlifestyle', $data);

    }

    public function addcategoryform($id=null) 
    {
        //$this->session_manager->validateJollofadmin("lifestyle::eventscategory");
        
        if(!empty($id) )
        {
            $eventinfo = $this->Generic->getByFieldSingle('id', $id, $tablename='event_categries');
            if($eventinfo)
            {

                $data['title_type']= 'Edit Event Category Form';
                $data['eventinfo'] = $eventinfo;
                $data['pageheader'] = "Edit Event Category";
                $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/lifestyle/eventscategory").'">Event Categories Management</a></li> <li class="breadcrumb-item active">Edit Event Categories Form </li>';
                $data['mainmenu'] = "Lifestyle";
                $data['submenu'] = "eventscategory";


                $data ['content_file']= 'lifestyle-eventcategoryadd';
                $this->load->view('jollof_admin/layoutlifestyle', $data);
            }
            else
            {
                redirect('jollofadmin/lifestyle/eventscategory');
            }
        }
        else
        {
            $data['title_type']= 'New Event Category Form';
            $data['pageheader'] = "New Event Category";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/lifestyle/eventscategory").'">Event Categories Management</a></li> <li class="breadcrumb-item active">New Event Categories Form </li>';
            $data['mainmenu'] = "Lifestyle";
            $data['submenu'] = "eventscategory";

            $data ['content_file']= 'lifestyle-eventcategoryadd';// cuisine-add';
            $this->load->view('jollof_admin/layoutlifestyle', $data);
        }
        
    }

    public function categorysave()
    {
        $this->session_manager->validateJollofadmin("lifestyle::eventscategory");

        $data_New = array(  
                        'categoryname'=>  $_POST['categoryname']
                         );
        $checkinfo =  $this->Generic->findByCondition($data_New,'event_categries');
        if(empty($checkinfo))
        {
            $config = array(
                            'table' => 'event_categries',
                            'id' => 'id',
                            'field' => 'slug',
                            'title' => 'title',
                            'replacement' => 'dash' // Either dash or underscore
                            );
            $this->load->library('slug', $config);

            $data_slug = array(
                    'slug' => $_POST["categoryname"],       // slug name of filed in db were ur url is stored
                    );
            $data['slug'] = $this->slug->create_uri($data_slug);

            $insert_data = $this->Generic->add($data_New, $tablename="event_categries");// insert to db

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Event Category Saved');
                    $Json_resultSave = array (
                                            'status' => '1'
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Adding Event Category ');
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
                $this->session->set_flashdata('message', 'Event Category Name Exists');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                echo json_encode($Json_resultSave);
        }
        redirect('jollofadmin/lifestyle/eventscategory');

    }

    public function categoryupdate()
    {   
        $this->session_manager->validateJollofadmin("lifestyle::eventscategory");

         $config = array(
                        'table' => 'event_categries',
                        'id' => 'id',
                        'field' => 'slug',
                        'title' => 'title',
                        'replacement' => 'dash' // Either dash or underscore
                        );
            $this->load->library('slug', $config);
            
            $data_slug = array(
                    'slug' => $_POST["categoryname"],       // slug name of filed in db were ur url is stored
                    );
            $data['slug'] = $this->slug->create_uri($data_slug,$id);

        
        $data_New = array(  
                        'categoryname'=>  $_POST['categoryname'],
                        'arrangecategory'=>  $_POST['arrangecategory'],
                        'status'=> $_POST['status']
                     );
        
        
        
        // insert to db
        $insert_data = $this->Generic->edit($data_New, $_POST['id'] , $tablename="event_categries"); 

        //print("<pre>".print_r($insert_data,true)."</pre>");//die;
        if($insert_data)
            {
                $this->session->set_flashdata('success','Event Category Updated');
                $this->session->set_flashdata('message', 'Event Category Updated');
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);

            }
        else {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updating Event Category Info');
            $Json_resultSave = array (
                                        'status' => '0'
                                        );
                echo json_encode($Json_resultSave);
        }
        redirect('jollofadmin/lifestyle/eventscategory');
    }



}