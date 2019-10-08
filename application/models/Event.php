<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Model
{
    
	function __construct()
	{
		parent::__construct();
	}
	
    function queryParameters($params=array())
    {
        // filter by event status
        if(isset($params['status'])){
            $this->db->where(array('event.status'=>$params['status']));
        }

        // filter by event name
        if(isset($params['eventname']) ){
            $this->db->where(array('event.name'=>$params['eventname']));
        }
        
        // filter by Event slug
        if(isset($params['slug']) ){
           $this->db->where(array('event.slug'=>$params['slug']));
        }

        // filter by Event location by tate
        if(isset($params['eventstate'])){
           $this->db->where(array('event.state'=>$params['eventstate']));
        }

        // filter by Event Category
        if(isset($params['eventmerchantid']) ){
           $this->db->where(array('event.merchantid'=>$params['eventmerchantid']));
        }

        // filter by Event exp date
        if(isset($params['eventexpdatetimegratenow'])){
           $this->db->where(array('event.eventexpdatetime >='=>date('Y-m-d')));
        }

        // filter by Event exp date
        if(isset($params['eventexpdatetimelessnow'])){
           $this->db->where(array('event.eventexpdatetime <'=>date('Y-m-d')));
        }

         // filter by Event price
        if(isset($params['eventprice'])){
           $this->db->where(array('event.price'=>$params['eventprice']));
        }

        // filter by Event_Date db by event ID
        if(isset($params['eventdateeventid'])){
           $this->db->where(array('event_date.eventid'=>$params['eventdateeventid']));
        }

        // filter by event_and_categries db by event id
        if(isset($params['eventcateeventid'])){
           $this->db->where(array('event_and_categries.eventid'=>$params['eventcateeventid']));
        }

        // filter by event_and_categries db by event ID
        if(isset($params['eventcatebycateeventid'])){
           $this->db->where(array('event_and_categries.cate_eventsid'=>$params['eventcatebycateeventid']));
        }


        // filter by event_and_categries db by event ID
        if(isset($params['eventcategriesbyid'])){
           $this->db->where(array('event_and_categries.cate_eventsid'=>$params['eventcategriesbyid']));
        }

        // filter by event creation date
        if(isset($params['createdat']) )
        {
            //$t_date = explode("-", $params['createdat']);
            //$startdate = date("yyyy-mm-dd", strtotime($t_date[0]));
            //$enddate = date("yyyy-mm-dd", strtotime($t_date[1]));
            //$this->db->where(array('img_ads.createdat >='=>$startdate, 'img_ads.createdat <='=>$enddate.' 23:59:59' ));
            $this->db->like('event.createdat ',$params['createdat']);
        }

        // filter by accounts Event location; this would perform a general search like filter
        if(isset($params['eventlocation']) ){
            $this->db->where("(event.address LIKE'%$params[eventlocation]%' OR state_cities.cityname LIKE'%$params[eventlocation]%' OR states.statename LIKE'%$params[eventlocation]%')");
        }
    }

    function getAll($param=array(), $limit_start=null)
    {
       /* $this->db->select('event.*, restaurants.companyname,restaurants.slug as companynameslug,state_cities.cityname,states.statename,
                            min(event_date.eventdate) AS first_dateevent, max(event_date.eventdate) AS last_dateevent,
                            event_date.eventstarttime AS event_starttime, event_date.eventendtime AS event_endtime,
                            SUM(event_date.eventspacebooked) AS sum_ticketsold');
        */
        $this->db->select('event.*, restaurants.companyname,restaurants.slug as companynameslug,state_cities.cityname,states.statename');
        $this->db->from('event');
        $this->db->join('event_date', 'event_date.eventid = event.id', "left");
        $this->db->join('restaurants', 'event.merchantid = restaurants.id', "left");
        $this->db->join('states', 'event.stateid = states.id', "left");
        $this->db->join('state_cities', 'event.cityid = state_cities.id', "left");
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with isdeleted field set to zero
        if( isset($_SESSION['jollofAdmin']) && $_SESSION['jollofAdmin']==TRUE ){
            $this->db->where(array('event.isdeleted'=>0,
                                'restaurants.status'=>1));
        }
        else{
            $this->db->where(
                            array(
                                //'event.eventexpdatetime > '=> date('Y-m-d H:i:s'),
                                'event.isdeleted'=>0,
                                'event.status'=>1,
                                'restaurants.status'=>1
                            )
                        );
        
        $this->db->limit(9, $limit_start);
        }
        $this->db->order_by("event.createdat", "desc");
        $query = $this->db->get();
        $get_all = null;
        if ($query->num_rows() > 0){
            $rows = $query->result_array();
            foreach($rows as $row)
            {
                $row['eventdateinfo'] = $this->getEventDateInfo(array('eventdateeventid'=>$row['id'] ));
                $row['eventdate'] = $this->getEventDate(array('eventdateeventid'=>$row['id'] ));
                $row['eventcategory'] = $this->getEventCate(array('eventcateeventid'=>$row['id'] ));
                $get_all[] = $row;
            }
            return $get_all;
        }
        else{
            return false;
        }
    }

    Public function getAllCount($param=array(), $limit_start=null)
    {

        $this->db->from('event');
        //$this->db->join('branch', 'branch.id = vehicle.branchid', "left");
        // Clause to only fetch data with deletedat field set to null
        $this->queryParameters($param);
        if( isset($_SESSION['jollofAdmin']) && $_SESSION['jollofAdmin']==TRUE ){
            $this->db->where(array('event.isdeleted'=>0));
        }
        else{
            $this->db->where(
                            array(
                                //'event.eventexpdatetime > '=> date('Y-m-d H:i:s'),
                                'event.isdeleted'=>0,
                                'event.status'=>1
                            )
                        );
        }
        
        $total = $this->db->count_all_results();
        return $total;
    }

    Public function getEventDate($param=array())
    {
        $this->db->select('event_date.*');
        $this->db->from('event_date');
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with isdeleted field set to zero
         if( isset($_SESSION['jollofAdmin']) && $_SESSION['jollofAdmin']==TRUE ){
            $this->db->where(array('event_date.isdeleted'=>0));
        }
        else{
        $this->db->where(array('event_date.isdeleted'=>0,'event_date.status'=>1,'event_date.eventdate > '=> date('Y-m-d'),));
        }
        $this->db->order_by("event_date.eventdate", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

    Public function getEventDateInfo($param=array())
    {
        $this->db->select('min(event_date.eventdate) AS first_dateevent, max(event_date.eventdate) AS last_dateevent,
                            event_date.eventstarttime AS event_starttime, event_date.eventendtime AS event_endtime,
                            SUM(event_date.eventspacebooked) AS sum_ticketsold');
        $this->db->from('event_date');
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with isdeleted field set to zero
         if( isset($_SESSION['jollofAdmin']) && $_SESSION['jollofAdmin']==TRUE ){
            $this->db->where(array('event_date.isdeleted'=>0));
        }
        else{
        $this->db->where(array('event_date.isdeleted'=>0,'event_date.status'=>1,'event_date.eventdate > '=> date('Y-m-d'),));
        }
        $this->db->order_by("event_date.eventdate", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

    Public function getEventCate($param=array())
    {
        $this->db->select('event_and_categries.*,event_categries.slug,event_categries.categoryname');
        $this->db->from('event_and_categries');
        $this->db->join('event_categries', 'event_and_categries.cate_eventsid = event_categries.id', "left");
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with isdeleted field set to zero
        $this->db->where(array('event_and_categries.isdeleted'=>0, 'event_and_categries.status'=>1));
        $this->db->order_by("event_and_categries.createdat", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

    public function getAllCategory($param=array(), $limit_start)
    {
        $this->db->select('*');
        $this->db->from('event_categries');

        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with isdeleted field set to zero
        
            $this->db->where(array('isdeleted'=>0));
        
        $this->db->limit(25, $limit_start);
        $this->db->order_by("categoryname", 'ASC');

        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
        
    }
    // Get count of all Cuisine Categories count
    function getAllCategoryCount($param=array())
    {
        $this->db->select('*');
        $this->db->from('event_categries');
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with deletedat field set to null
        $this->db->where(array('isdeleted'=>0));
        
        $total = $this->db->count_all_results();
        return $total;
    }


}
