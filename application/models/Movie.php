<?php defined('BASEPATH') OR exit('No direct script access allowed');

class movie extends CI_Model
{
    
	function __construct()
	{
		parent::__construct();
	}
	
    function queryParameters($params=array())
    {
        // filter by movie status
        if(isset($params['status'])){
            $this->db->where(array('movie.status'=>$params['status']));
        }

        // filter by movie name
        if(isset($params['moviename']) ){
            $this->db->where(array('movie.name'=>$params['moviename']));
        }

        if(isset($params['movienamelike']) ){
            $this->db->where("(movie.name LIKE'%$params[movienamelike]%')");
        }

        // filter by movie name
        if(isset($params['movieslug']) ){
            $this->db->where(array('movie.slug'=>$params['movieslug']));
        }

        // filter by movie_and_cinema movie id
        if(isset($params['idbymc']) ){
            $this->db->where(array('movie_and_cinema.id'=>$params['idbymc']));
        }

        // filter by movie_and_cinema movie id
        if(isset($params['movieidbymc']) ){
            $this->db->where(array('movie_and_cinema.movieid'=>$params['movieidbymc']));
        }

        // filter by movie_and_cinema cinema id
        if(isset($params['cinemaidbymc']) ){
            $this->db->where(array('movie_and_cinema.cinemaid'=>$params['cinemaidbymc']));
        }

        // filter by movie_and_cinema Date
        if(isset($params['moviedatebymc']) ){
            $this->db->where(array('movie_and_cinema.moviedate'=>$params['moviedatebymc']));
        }

        // filter by movie_and_cinema Time
        if(isset($params['movietimebymc']) ){
            $this->db->where(array('movie_and_cinema.movietime'=>$params['movietimebymc']));
        }
        // filter by movie_and_cinema Time compear
        if(isset($params['movietimebymcgrate']) ){
            $this->db->where(array('movie_and_cinema.movietime >'=>$params['movietimebymcgrate']));
        }
        // filter by movie_and_cinema date compear
        if(isset($params['moviedatebymcgratenow']) ){
            $this->db->where(array('movie_and_cinema.moviedate >='=>date('Y-m-d')));
        }
        // filter by movie_and_cinema date compear
        if(isset($params['moviedatebymclessnow']) ){
            $this->db->where(array('movie_and_cinema.moviedate <'=>date('Y-m-d')));
        }




        // filter by movie genre by tate
        if(isset($params['moviegenre'])){
           $this->db->where(array('movie.genre'=>$params['moviegenre']));
        }

        // filter by Cinema stateid
        if(isset($params['cinemastateid']) ){
           $this->db->where(array('movie_cinema.stateid'=>$params['cinemastateid']));
        }

        // filter by Cinema Name
        if(isset($params['cinemaname'])){
           $this->db->where(array('movie_cinema.name'=>$params['cinemaname']));
        }

        if(isset($params['cinemanamelike']) ){
            $this->db->where("(movie_cinema.name LIKE'%$params[cinemanamelike]%')");
        }

        // filter by Cinema Code
        if(isset($params['cinemacode'])){
           $this->db->where(array('movie_cinema.code'=>$params['cinemacode']));
        }




        // filter by movie_categries db by movie id
        if(isset($params['moviecatemovieid'])){
           $this->db->where(array('movie_categries.movieid'=>$params['moviecatemovieid']));
        }

        // filter by movie_categries db by movie ID
        if(isset($params['moviecatebycatemovieid'])){
           $this->db->where(array('movie_categries.cate_moviesid'=>$params['moviecatebycatemovieid']));
        }


        // filter by movie_categries db by movie ID
        if(isset($params['moviecategriesbyid'])){
           $this->db->where(array('movie_categries.cate_moviesid'=>$params['moviecategriesbyid']));
        }

        // filter by movie creation date
        if(isset($params['createdat']) )
        {
            //$t_date = explode("-", $params['createdat']);
            //$startdate = date("yyyy-mm-dd", strtotime($t_date[0]));
            //$enddate = date("yyyy-mm-dd", strtotime($t_date[1]));
            //$this->db->where(array('img_ads.createdat >='=>$startdate, 'img_ads.createdat <='=>$enddate.' 23:59:59' ));
            $this->db->like('movie.createdat ',$params['createdat']);
        }

        // filter by accounts movie location; this would perform a general search like filter
        if(isset($params['movielocation']) ){
            $this->db->where("(movie.address LIKE'%$params[movielocation]%' OR state_cities.cityname LIKE'%$params[movielocation]%' OR states.statename LIKE'%$params[movielocation]%')");
        }

    }

    function queryParametersGroup($params=array())
    {
         // group by
        if(isset($params['groupbymoviecinemaid'])){
            $this->db->group_by("movie_cinema.id");
        }

        if(isset($params['groupbycinemastateid'])){
            $this->db->group_by("movie_cinema.stateid");
        }

        if(isset($params['groupbymovieandcinemadate'])){
            $this->db->group_by("movie_and_cinema.moviedate");
        }
    }

    function getAllByMovieCinema($param=array(), $limit_start=null)
    {
        $this->db->select('movie_and_cinema.*, 
                        min(movie_and_cinema.billchildren) AS min_price, max(movie_and_cinema.billadult) AS max_price,
                        min(movie_and_cinema.moviedate) AS first_dateshowing,max(movie_and_cinema.moviedate) AS last_dateshowing, 
                        count(DISTINCT movie_and_cinema.cinemaid) AS cinemascount, 
                        SUM(movie_and_cinema.sold) AS sum_ticketsold,
            movie.slug as movieslug, movie.name as moviename, movie.triller_youtubeurl, movie.summary, movie.genre, movie.age_restriction, movie.duration, movie.director, movie.starring, movie.image, movie.number_of_views,
            movie_cinema.code as cinemacode, movie_cinema.name as cinemaname, movie_cinema.slug as cinemaslug, movie_cinema.address, state_cities.cityname,states.statename');
        $this->db->from('movie_and_cinema');
        $this->db->join('movie', 'movie.id = movie_and_cinema.movieid', "left");
        $this->db->join('movie_cinema', 'movie_cinema.id = movie_and_cinema.cinemaid', "left");
        $this->db->join('states', 'movie_cinema.stateid = states.id', "left");
        $this->db->join('state_cities', 'movie_cinema.cityid = state_cities.id', "left");
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with isdeleted field set to zero
        if( isset($_SESSION['jollofAdmin']) && $_SESSION['jollofAdmin']==TRUE ){
            $this->db->where(
                            array(
                                'movie_and_cinema.isdeleted'=>0,
                                'movie.isdeleted'=>0
                                )
                            );
            $this->db->limit(25, $limit_start);
        }
        else{
            $this->db->where(
                            array(
                                'movie_and_cinema.moviedate >= '=>  date('Y-m-d'),// date('Y-m-d H:i:s'),
                                'movie_and_cinema.isdeleted'=>0,
                                'movie_and_cinema.status'=>1,
                                'movie.isdeleted'=>0,
                                'movie.status'=>1
                            )
                        );

        $this->db->limit(8, $limit_start);
        }
        $this->db->group_by("movie.id");
        $this->db->order_by("movie_and_cinema.moviedate", "asc");
        $query = $this->db->get();
        $get_all = null;
        if ($query->num_rows() > 0)
        {
            $rows = $query->result_array();
            foreach($rows as $row)
            {
                $row['showingincinemas'] = $this->_getCinemas_showingmovies_count(array('movieidbymc'=>$row['movieid'],'moviedatebymcgratenow'=>1 ));
                $row['cinemas_list'] = $this->getCinemas(array('movieidbymc'=>$row['movieid'] ));
                $get_all[] = $row;
            }
            return $get_all;
        }
        else{
            return false;
        }
    }

    Public function getAllByMovieCinemaCount($param=array(), $limit_start=null)
    {
        $this->db->select('movie_and_cinema.*');
        $this->db->from('movie_and_cinema');
        $this->db->join('movie', 'movie.id = movie_and_cinema.movieid', "left");
        $this->db->join('movie_cinema', 'movie_cinema.id = movie_and_cinema.cinemaid', "left");
        $this->db->join('states', 'movie_cinema.stateid = states.id', "left");
        $this->db->join('state_cities', 'movie_cinema.cityid = state_cities.id', "left");

        $this->queryParameters($param);
        // Clause to only fetch data with deletedat field set to null
        if( isset($_SESSION['jollofAdmin']) && $_SESSION['jollofAdmin']==TRUE ){
            $this->db->where(
                            array(
                                'movie_and_cinema.isdeleted'=>0,
                                'movie.isdeleted'=>0
                                )
                            );
        }
        else {
        $this->db->where(
                    array(
                        'movie_and_cinema.moviedate >= '=>  date('Y-m-d'),// date('Y-m-d H:i:s'),
                        'movie_and_cinema.isdeleted'=>0,
                        'movie_and_cinema.status'=>1,
                        'movie.isdeleted'=>0,
                        'movie.status'=>1
                    )
                );
        }
        $this->db->group_by("movie.id");
        $total = $this->db->count_all_results();
        return $total;
    }

    function getAllByMovie($param=array(), $limit_start=null)
    {
        $this->db->select('movie.*');
        $this->db->from('movie');
        $this->db->join('movie_and_cinema', 'movie.id = movie_and_cinema.movieid', "left");
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with isdeleted field set to zero
        if( isset($_SESSION['jollofAdmin']) && $_SESSION['jollofAdmin']==TRUE ){
            $this->db->where(
                            array(
                                'movie_and_cinema.isdeleted'=>0,
                                'movie.isdeleted'=>0
                                )
                            );
            $this->db->limit(25, $limit_start);
        }
        else{
            $this->db->where(
                            array(
                                'movie_and_cinema.moviedate >= '=>  date('Y-m-d'),// date('Y-m-d H:i:s'),
                                'movie_and_cinema.isdeleted'=>0,
                                'movie_and_cinema.status'=>1,
                                'movie.isdeleted'=>0,
                                'movie.status'=>1
                            )
                        );
        }
        //$this->db->limit(8, $limit_start);
        $this->db->group_by("movie.id");
        $this->db->order_by("movie_and_cinema.moviedate", "asc");
        $query = $this->db->get();
        $get_all = null;
        if ($query->num_rows() > 0){
            $rows = $query->result_array();
            foreach($rows as $row)
            {
                $row['showingincinemas'] = $this->_getCinemas_showingmovies_count(array('movieidbymc'=>$row['id'],'moviedatebymcgratenow'=>1 ));
                $row['cinemas'] = $this->getCinemas(array('movieidbymc'=>$row['id'] ));
                $get_all[] = $row;
            }
            return $get_all;
        }
        else{
            return false;
        }
    }

    Public function getAllByMovieCount($param=array())
    {
        $this->db->from('movie');
        //$this->db->join('branch', 'branch.id = vehicle.branchid', "left");
        // Clause to only fetch data with deletedat field set to null
        $this->queryParameters($param);
        $this->db->where(array("movie.isdeleted"=>0));
       // $this->db->group_by("movie_cinema.id");
        $this->db->group_by("movie.id");
        $total = $this->db->count_all_results();
        return $total;
    }

    Public function getCinemas($param=array(),$group_by=null)
    {
        $this->db->select('movie_cinema.*, movie_and_cinema.id as movie_and_cinema_id, movie_and_cinema.movieid as movie_and_cinema_movieid,  movie_and_cinema.moviedate, movie_and_cinema.movietime, movie_and_cinema.billadult ,movie_and_cinema.billstudent ,movie_and_cinema.billchildren, movie_and_cinema.sold, state_cities.cityname, states.statename');
        $this->db->from('movie_and_cinema');
        $this->db->join('movie_cinema', 'movie_cinema.id = movie_and_cinema.cinemaid', "left");
        $this->db->join('states', 'movie_cinema.stateid = states.id', "left");
        $this->db->join('state_cities', 'movie_cinema.cityid = state_cities.id', "left");
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with isdeleted field set to zero
        if( isset($_SESSION['jollofAdmin']) && $_SESSION['jollofAdmin']==TRUE ){
            $this->db->where(
                            array(
                                'movie_and_cinema.isdeleted'=>0
                                )
                            );
        }
        else{
        $this->db->where(
                            array(
                                'movie_and_cinema.moviedate >= '=>  date('Y-m-d'),// date('Y-m-d H:i:s'),
                                'movie_and_cinema.isdeleted'=>0,
                                'movie_and_cinema.status'=>1,
                                'movie_cinema.isdeleted'=>0,
                                'movie_cinema.status'=>1
                            )
                        );
        }
        if($group_by != NULL)
        {
            $this->queryParametersGroup($param);
        }
        else
        {
            $this->db->group_by("movie_cinema.id");
        }
        $this->db->order_by("movie_and_cinema.moviedate", "asc");
        $this->db->order_by("movie_and_cinema.movietime", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
    }



    Public function _getCinemas_showingmovies_count($param=array())
    {
        $this->db->from('movie_and_cinema');
        //$this->db->join('branch', 'branch.id = vehicle.branchid', "left");
        // Clause to only fetch data with deletedat field set to null
        $this->queryParameters($param);
        $this->db->where(array("movie_and_cinema.isdeleted"=>0));
       // $this->db->group_by("movie_cinema.id");
        $this->db->group_by("movie_and_cinema.moviedate");
        $total = $this->db->count_all_results();
        return $total;
    }

    function getAllByCinema($param=array(), $limit_start=null)
    {
        $this->db->select('movie_cinema.*, state_cities.cityname,states.statename');
        $this->db->from('movie_cinema');
        $this->db->join('states', 'movie_cinema.stateid = states.id', "left");
        $this->db->join('state_cities', 'movie_cinema.cityid = state_cities.id', "left");
        
        // Process any filter options if any
        $this->queryParameters($param);
        // Clause to only fetch data with isdeleted field set to zero
        $this->db->where(
                        array(
                            'movie_cinema.isdeleted'=>0
                            )
                        );
        $this->db->limit(25, $limit_start);
        $this->db->order_by("movie_cinema.name", "asc");
        $query = $this->db->get();
        $get_all = null;
        if ($query->num_rows() > 0)
        {
            $rows = $query->result_array();
            foreach($rows as $row)
            {
                $row['showingincinemas'] = $this->_getCinemas_showingmovies_count(array('cinemaidbymc'=>$row['id'],'moviedatebymcgratenow'=>1 ));
                $get_all[] = $row;
            }
            return $get_all;
        }
        else{
            return false;
        }
    }

    Public function getAllByCinemaCount($param=array())
    {
        $this->db->from('movie_cinema');
        $this->db->join('states', 'movie_cinema.stateid = states.id', "left");
        $this->db->join('state_cities', 'movie_cinema.cityid = state_cities.id', "left");

        $this->queryParameters($param);
        // Clause to only fetch data with deletedat field set to null
        $this->db->where(
                        array(
                            'movie_cinema.isdeleted'=>0
                            )
                        );
        $total = $this->db->count_all_results();
        return $total;
    }

}
