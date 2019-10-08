<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lifestyle extends CI_Controller {

        function __construct()
	{
	  parent::__construct();
    $this->load->model('superadmin');
    $this->load->model('promo');
    $this->load->model('event');
    $this->load->model('movie');
    $this->load->model('utility');
    $this->load->model('Generic');
    $this->load->helper('text');
    $this->load->helper('string');
	}
        
	public function index()
	{   
      $data['banner'] = $this->superadmin->getBannerByTypeid(17);
      
      $data['meta_keyword']= 'Shopping,Fashion,Cuisine,Life Style,Scholar,Business, Gift Portal jollof,Sales,Movies, Events,Ticket Online,E-trade Homepage,0y3 ';
      $data['titel'] = 'Jollof:- Lifestyle Home';
      $data['sitenav'] = "lifestyle/nav_lifestyle";
      $data['navmenu'] = "lifestyle";
      $data['info']= $this->superadmin->getAdminSettings(); 

      $data ['content_file']= 'lifestyle/index_lifestyle';
      $this->load->view('mainpage_view/layout',$data);
	}

  public function events($existing_search=0, $page=0)
  {
      $data['meta_keyword']= 'Shopping,Fashion,Cuisine,Life Style,Scholar,Business, Gift Portal jollof,Sales,Movies, Events,Ticket Online,E-trade Homepage,0y3 ';
      $data['titel'] = 'Jollof:- Lifestyle Events';
      $data['sitenav'] = "lifestyle/nav_lifestyle";
      $data['navmenu'] = "lifestyle";
      $data['subnavmenu'] = "lifestyleevents";
      $data['info']= $this->superadmin->getAdminSettings(); 


      if(isset($page) && !is_numeric($page))
      {

      }
      else
      {
        $filterparams = array();
        $query_params = array();
        $existing_search=0;
        // Process filter if any was posted
        $filterparams['eventexpdatetimegratenow'] = 1;
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form

            $filterparams = $this->input->get();
            $filterparams['eventexpdatetimegratenow'] = 1;
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
        $data['event'] = $this->event->getAll($query_params, $page);
        $data['eventcount'] = $this->event->getAllCount($query_params, $page);
        //print("<pre>".print_r(  $this->event->getAll($query_params, $page),true)."</pre>");die;

        $data ['content_file']= 'lifestyle/lifestyle_event';
        $this->load->view('mainpage_view/layout',$data);
      }

  }
  public function eventsshowmore()
  {
      $page=$_POST['lastid'];
      $event = $this->event->getAll($query_params=array(), $page);
  }

  public function eventsdetails($slug=null)
  {
      $data['meta_keyword']= 'Shopping,Fashion,Cuisine,Life Style,Scholar,Business, Gift Portal jollof,Sales,Movies, Events,Ticket Online,E-trade Homepage,0y3 ';
      $data['titel'] = 'Jollof:- Lifestyle Events';
      $data['sitenav'] = "lifestyle/nav_lifestyle";
      $data['navmenu'] = "lifestyle";
      $data['subnavmenu'] = "lifestyleevents";
      $data['info']= $this->superadmin->getAdminSettings(); 


      $query_params['slug'] = $slug;
      $eventinfo = $this->event->getAll($query_params);
      $data['eventinfo'] = $eventinfo;
      if(empty($eventinfo) || empty($slug)){redirect('lifestyle/events');}

      $data ['content_file']= 'lifestyle/lifestyle_eventdetails';
      $this->load->view('mainpage_view/layout',$data);
  }

  public function eventspayment($slug=null)
  {
      $data['meta_keyword']= 'Shopping,Fashion,Cuisine,Life Style,Scholar,Business, Gift Portal jollof,Sales,Movies, Events,Ticket Online,E-trade Homepage,0y3 ';
      $data['titel'] = 'Jollof:- Lifestyle Events';
      $data['sitenav'] = "lifestyle/nav_lifestyle";
      $data['navmenu'] = "lifestyle";
      $data['subnavmenu'] = "lifestyleevents";
      $data['info']= $this->superadmin->getAdminSettings(); 


      $query_params['slug'] = $slug;
      $eventinfo = $this->event->getAll($query_params);
      $data['eventinfo'] = $eventinfo;
      if(empty($eventinfo) || empty($slug)){redirect('lifestyle/events');}

      $data ['content_file']= 'lifestyle/lifestyle_eventpayment';
      $this->load->view('mainpage_view/layout',$data);
  }

  public function event_search($existing_search=0, $page=0)
  {
      $data['meta_keyword']= 'Shopping,Fashion,Cuisine,Life Style,Scholar,Business, Gift Portal jollof,Sales,Movies, Events,Ticket Online,E-trade Homepage,0y3 ';
      $data['titel'] = 'Jollof:- Lifestyle Events';
      $data['sitenav'] = "lifestyle/nav_lifestyle";
      $data['navmenu'] = "lifestyle";
      $data['subnavmenu'] = "lifestyleevents";
      $data['info']= $this->superadmin->getAdminSettings(); 

        $filterparams = array();
        $query_params = array();
        $existing_search=0;
        // Process filter if any was posted

        if($this->input->get())
        {
            // Get all data from the search form

            $filterparams = $this->input->get();
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
        $data['event'] = $this->event->getAll($query_params, $page);
        //print("<pre>".print_r( $filterparams,true)."</pre>");die;

        $data ['content_file']= 'lifestyle/lifestyle_eventsearch';
        $this->load->view('mainpage_view/layout',$data);

  }







  public function movies($existing_search=0, $page=0)
  {
      $data['meta_keyword']= 'Shopping,Fashion,Cuisine,Life Style,Scholar,Business, Gift Portal jollof,Sales,Movies, Events,Ticket Online,E-trade Homepage,0y3 ';
      $data['titel'] = 'Jollof:- Lifestyle Events';
      $data['sitenav'] = "lifestyle/nav_lifestyle";
      $data['navmenu'] = "lifestyle";
      $data['subnavmenu'] = "lifestylemovies";
      $data['info']= $this->superadmin->getAdminSettings(); 

      $filterparams = array();
      $query_params = array();
      $existing_search=0;
      // Process filter if any was posted

      if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
      {
          // Get all data from the search form

          $filterparams = $this->input->get();
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
      $data['movie'] = $this->movie->getAllByMovieCinema($query_params, $page);
      $data['moviecount'] = $this->movie->getAllByMovieCinemaCount($query_params, $page);
      //print("<pre>".print_r(  $this->movie->getAllByMovieCinema($query_params, $page),true)."</pre>");die;

      $data ['content_file']= 'lifestyle/lifestyle_movie';
      $this->load->view('mainpage_view/layout',$data);


  }
  public function moviesdetails($slug=null)
  {
      $data['meta_keyword']= 'Shopping,Fashion,Cuisine,Life Style,Scholar,Business, Gift Portal jollof,Sales,Movies, Events,Ticket Online,E-trade Homepage,0y3 ';
      $data['titel'] = 'Jollof:- Lifestyle Events';
      $data['sitenav'] = "lifestyle/nav_lifestyle";
      $data['navmenu'] = "lifestyle";
      $data['subnavmenu'] = "lifestylemovies";
      $data['info']= $this->superadmin->getAdminSettings(); 

      $moviedetails = $this->Generic->getByFieldSingle('slug', $slug, $tablename='movie');
      if(empty($moviedetails) || empty($slug)){redirect('lifestyle/movies');}

      $query_params['movieslug'] = $slug;

      $query_params2 = array(  
                         'movieidbymc' => $moviedetails['id'],
                         //'groupbymoviecinemaid' => 1,
                         'groupbycinemastateid' => 1
                         );
      //$query_params2['movieidbymc'] = $moviedetails['id'];
      $movieinfo = $this->movie->getAllByMovie($query_params);
      $data['cinemashowed'] =$this->movie->getCinemas($query_params2,true);


      $data['movieinfo'] = $movieinfo;

      //print("<pre>".print_r( $this->movie->getCinemas($query_params2,true),true)."</pre>");die;
      if(empty($movieinfo) || empty($slug)){redirect('lifestyle/movies');}

      $data ['content_file']= 'lifestyle/lifestyle_moviedetails';
      $this->load->view('mainpage_view/layout',$data);
  }

  public function moviespayment($slug=null)
  {
      $data['meta_keyword']= 'Shopping,Fashion,Cuisine,Life Style,Scholar,Business, Gift Portal jollof,Sales,Movies, Events,Ticket Online,E-trade Homepage,0y3 ';
      $data['titel'] = 'Jollof:- Lifestyle Events';
      $data['sitenav'] = "lifestyle/nav_lifestyle";
      $data['navmenu'] = "lifestyle";
      $data['subnavmenu'] = "lifestylemovies";
      $data['info']= $this->superadmin->getAdminSettings(); 

      $moviedetails = $this->Generic->getByFieldSingle('slug', $slug, $tablename='movie');
      if(empty($moviedetails) || empty($slug)){redirect('lifestyle/movies');}

      $query_params2 = array(
                        'idbymc'  => $_SESSION['movieticketid'],
                        'movieidbymc' => $moviedetails['id']
                         );
      $tickeinfo = $this->movie->getCinemas($query_params2,true);
      if(empty($tickeinfo)){redirect('lifestyle/movies/details/'.$slug);}

      $adultcount = $_POST["adultcount"];
      $studentcount = $_POST["studentcount"];
      $childrencount = $_POST["childrencount"];
      if($adultcount==0 && $studentcount==0 && $childrencount==0)
        {redirect('lifestyle/movies/details/'.$slug);}

      $bill=0;
      if($adultcount > 0)
        {
          $bill = ($adultcount * $tickeinfo[0]['billadult']) + $bill;
        }

      if($studentcount > 0)
        {
          $bill = ($studentcount * $tickeinfo[0]['billstudent']) + $bill;
        }

      if($childrencount > 0)
        {
          $bill = ($childrencount * $tickeinfo[0]['billchildren']) + $bill;
        }

      $data['adultticket']    = $adultcount; 
      $data['studentticket']  = $studentcount;
      $data['childrenticket'] = $childrencount;
      $data['totalticket']    = $adultcount+$studentcount+$childrencount;
      $data['totalbill']      = $bill;
      $data['cinemainfo']     = $tickeinfo;
      $data['movieinfo']      = $moviedetails;

      //print("<pre>".print_r($data,true)."</pre>");die;

      $data ['content_file']= 'lifestyle/lifestyle_moviepayment';
      $this->load->view('mainpage_view/layout',$data);
  }

  public function cinemabystate()
  {   
    $by_id = $_POST["stateid"];
    $slug = $_POST["slug"];
    if(isset($by_id) && !empty($by_id) ){

        $query_params2 = array( 
                         'movieidbymc' => $slug, 
                         'cinemastateid' => $by_id,
                         'groupbymoviecinemaid' => 1
                         );
        $getlist = $this->movie->getCinemas($query_params2,true);  // call City by State

        //print("<pre>".print_r($getlist,true)."</pre>");die;
        echo '<option> Select your Preferred cinema </option>';
        foreach($getlist as $row)
        {
            echo '<option data-slug="'.$slug.'" value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }
    else{
        
        echo '<option value="">Cinema not available</option>';
    }
  } 

  public function datebycinema()
  {   
    $cinemaid = $_POST["id"];
    $slug = $_POST["slug"];
    if(isset($cinemaid) && !empty($cinemaid) ){

        $query_params2 = array(  
                         'cinemaidbymc' => $cinemaid,
                         'movieidbymc' => $slug,
                         'groupbymovieandcinemadate' => 1
                         );
        $getlist = $this->movie->getCinemas($query_params2,true);  // call City by State

        //print("<pre>".print_r($getlist,true)."</pre>");die;
        if($getlist)
        {
          echo '<option> Preferred Date </option>';
          foreach($getlist as $row)
          {
              echo '<option data-slug="'.$slug.'" data-cine="'.$cinemaid.'" value="'.$row['moviedate'].'">'.date("D, jS M \, Y \ ", strtotime($row['moviedate'])).'</option>';
          }
        }
        else{  echo '<option value="">Date not available</option>';}
    }
    else{
        
        echo '<option value="">Date not available too</option>';
    }
  }

  public function timebycinema()
  {   
    $date = $_POST["date"];
    $cinemaid = $_POST["cinid"];
    $slug = $_POST["slug"];
    if(isset($cinemaid) && !empty($cinemaid) && !empty($date) && !empty($slug) ){

        $query_params2 = array(  
                         'cinemaidbymc' => $cinemaid,
                         'movieidbymc' => $slug,
                         'moviedatebymc' => $date
                         );
        if($date==date('Y-m-d'))
        {
           $query_params2['movietimebymcgrate'] = date('H:i');
        }
        $getlist = $this->movie->getCinemas($query_params2,true);  // call City by State

        //print("<pre>".print_r($getlist,true)."</pre>");die;
        if($getlist)
        {
          echo '<option> Preferred Time </option>';
          foreach($getlist as $row)
          {
              echo '<option value="'.$row['movie_and_cinema_id'].'">'.date("g:iA", strtotime($row['movietime'])).'</option>';
          }
        }
        else{  echo '<option value="">Time not available</option>';}
    }
    else{
        
        echo '<option value="">Time not available</option>';
    }
  }

  public function detailsbycinema()
  {   
    $id = $_POST["id"];
    if(isset($id) && !empty($id)  ){

        $data_check = array(  
                           'id'  =>   $id,
                           'moviedate >=' =>  date('Y-m-d'),
                           'isdeleted' =>  0
                           );
        $getlist =  $this->Generic->findByCondition($data_check,'movie_and_cinema');

        //print("<pre>".print_r($getlist,true)."</pre>");die;
        if($getlist)
        {
          $timecheck=false;
          if($getlist[0]['moviedate'] == date('Y-m-d'))
          {
            $data_checktime = array(  
                             'id'  =>   $id,
                             'movietime <=' => date('H:i'),
                             'isdeleted' =>  0
                             );
            $timecheck =  $this->Generic->findByCondition($data_checktime,'movie_and_cinema');
          }

          if($timecheck){echo '<option value="">Time not available</option>';}
          else{
          // save cinema id 
          $this->session->set_userdata('movieticketid', $id);
          //unset($_SESSION['cinemaid']);

          $movieinfo = $this->Generic->getByFieldSingle('id', $getlist[0]['movieid'], $tablename='movie');
          // save movie and cinema db id 
          //$this->session->set_userdata('movieandcinema_id', $cinemaid);
          $output = '<div class="selection-wrapper">
                        <div class="row">
                            <div class="col-lg-5 col-md-4">
                                <div>
                                    <p class="bold adultbill" data-field="'.$getlist[0]['billadult'].'">Adult: ₦ '.number_format($getlist[0]['billadult']).' </p>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-8">
                                <div class="pull-right">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-adultnumber" data-type="minus" data-field="adultcount">
                                                <img src="'.site_url('assets/img/minus.png').'" class="img-fluid" alt="minus icon">
                                            </button>
                                        </span>
                                        <input type="text" name="adultcount" class="form-control input-number selection-value" value="0" min="0" max="10">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-adultnumber" data-type="plus" data-field="adultcount">
                                                <img src="'.site_url('assets/img/plus.png').'" id="adult-plus" class="img-fluid" alt="plus icon">
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>';
          $output .=  '<div class="selection-wrapper">
                        <div class="row">
                            <div class="col-lg-5 col-md-4">
                                <div>
                                    <p class="bold studentbill" data-field="'.$getlist[0]['billstudent'].'">Student: ₦ '.number_format($getlist[0]['billstudent']).'</p>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-8">
                                <div class="pull-right">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-studentnumber" data-type="minus" data-field="studentcount">
                                                <img src="'.site_url('assets/img/minus.png').'" class="img-fluid" alt="minus icon">
                                            </button>
                                        </span>
                                        <input type="text" name="studentcount" class="form-control input-number selection-value" value="0" min="0" max="10">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-studentnumber" data-type="plus" data-field="studentcount">
                                                <img src="'.site_url('assets/img/plus.png').'" id="adult-plus" class="img-fluid" alt="plus icon">
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>';
          $output .=  '<div class="selection-wrapper">
                        <div class="row">
                            <div class="col-lg-5 col-md-4">
                                <div>
                                    <p class="bold childrenbill" data-field="'.$getlist[0]['billchildren'].'">Children: ₦ '.number_format($getlist[0]['billchildren']).'</p>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-8">
                                <div class="pull-right">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-childrennumber" data-type="minus" data-field="childrencount">
                                                <img src="'.site_url('assets/img/minus.png').'" class="img-fluid" alt="minus icon">
                                            </button>
                                        </span>
                                        <input type="text" name="childrencount" class="form-control input-number selection-value" value="0" min="0" max="10">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-childrennumber" data-type="plus" data-field="childrencount">
                                                <img src="'.site_url('assets/img/plus.png').'" id="adult-plus" class="img-fluid" alt="plus icon">
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>';
          $output .=  '<div class="total-amount">
                          <div class="row">
                              <div class="col-lg-6 col-md-6">
                                  <div>
                                      <h6>Total</h6>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                  <div class="pull-right">
                                      <h6 class="totalprice" data-field="0">₦ 0</h6>
                                  </div>
                              </div>
                          </div> 
                      </div>
                      <div>
                          <span class="isDisabledd"><button type="Summit" class="btn btn-info btn-join" id="proceed">Proceed</button></span>
                      </div>';

            echo $output;
          }
          
        }
        else{  echo '<option value="">Time not available</option>';}
    }
  }



       
        
}
