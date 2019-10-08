<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class Product extends CI_Model
{
    
    private $DB_product_fas = "products_fashion";
    private $DB_cat_fas = "categories_fashion";
    private $DB_prd_fashionimg = "productimages";
    private $DB_prd_qty_c_s= "product_qty_color_size";
    private $DB_cat_prd="product_fashion_cate_assign";
    private $DB_res = "restaurants";
    
    function __construct()
    {
        parent::__construct();
    }
    
    // For filtering fashion products
    function queryFashionParameters($params=array())
    {   
        // filter product by id
        if(isset($params['id']))
        {
            $this->db->where(array('products_fashion.id'=>$params['id']));
        }
        
        // filter by merchant creation date
        if(isset($params['createdat']))
        {
            $t_date = explode("-", $params['createdat']);
            $startdate = date("Y-m-d", strtotime($t_date[0]));
            $enddate = date("Y-m-d", strtotime($t_date[1]));
            $this->db->where(array('products_fashion.createdat >='=>$startdate, 'products_fashion.createdat <='=>$enddate.' 23:59:59' ));
        }
        
        // Perform checks to show merchants only orders that belong to their store
        $this->db->where(array("products_fashion.merchantid" => $this->session->merchant_id));
    }
    
    // For filtering cusine products
    function queryCuisineParameters($params=array())
    {
        if(isset($params['merchantid']))
        {
            $this->db->where(array('products_cuisine.merchantid'=>$params['merchantid']));
        }
        
        // filter by merchant creation date
        if(isset($params['createdat']))
        {
            $t_date = explode("-", $params['createdat']);
            $startdate = date("Y-m-d", strtotime($t_date[0]));
            $enddate = date("Y-m-d", strtotime($t_date[1]));
            $this->db->where(array('products_cuisine.createdat >='=>$startdate, 'products_fashion.createdat <='=>$enddate.' 23:59:59' ));
        }
        
        
    }
    
    // Get all products from the fashion products table
    function getAllFashion($param=array(), $limit_start=0)
    {
        $this->db->select('products_fashion.*, restaurants.companyname, brands_tbl.name as brandname, brands_tbl.logo as brandlogo');
        $this->db->from('products_fashion');
        $this->db->join('restaurants', 'products_fashion.merchantid = restaurants.id', "left");
        $this->db->join('brands_tbl',  'brands_tbl.id = products_fashion.productbrandid', "left");
        
        // Process any filter options if any
        $this->queryFashionParameters($param);
        // Clause to only fetch data with isdeleted field set to zero
        $this->db->where(array('products_fashion.isdeleted'=>0));
        
        $this->db->limit(25, $limit_start);
        
        $query = $this->db->get();
        
        $get_prod = null;
        if($query->num_rows() > 0)
        {
            $rows = $query->result_array();
            foreach($rows as $row)
            {
                $row['product_variant']=   $this->getAllProductVariant_byid($row['id']);
                $row['product_category'] =   $this->_getprd_category($row['id']);
                $row['product_color'] =   $this->_getprd_color($row['id']);
                $row['product_size']  =   $this->_getprd_size($row['id']);
                $row['product_image'] =   $this->_getprd_img($row['id']);
                $get_prod[] = $row;
            }
            
            return $get_prod;
        }
        else
        {
            return null;
        }
        /*
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
         * 
         */
    }
    public function getAllProductVariant_byid($by_id)
    {
        $this->db->select('product_qty_color_size.*,color_tbl.colorname,color_tbl.colorcode,size_tbl.sizecode,size_tbl.sizename');
        $this->db->from('product_qty_color_size');
        $this->db->join( 'color_tbl', " color_tbl.id = product_qty_color_size.colorid ","LEFT ");
        $this->db->join( 'size_tbl', " size_tbl.id = product_qty_color_size.sizeid " ,"LEFT ");
        $this->db->where(" product_qty_color_size.productid ", $by_id);
        $this->db->where(" product_qty_color_size.status ", 1);
        $this->db->where(" product_qty_color_size.isdeleted ", 0);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
        
    }
    public function _getprd_category($by_id) 
    {
         $this->db->select("product_fashion_cate_assign.*, categories_fashion.id AS categoriesId,categories_fashion.slug,categories_fashion.categoryname,categories_fashion.categoryparentid ");
        $this->db->from('product_fashion_cate_assign');
        $this->db->where(" product_fashion_cate_assign.product_fasid ", $by_id);
        $this->db->where(" product_fashion_cate_assign.status ", 1);
        $this->db->where(" categories_fashion.status ", 1);
        $this->db->where(" product_fashion_cate_assign.isdeleted ", 0);
        $this->db->join( 'categories_fashion', " categories_fashion.id = product_fashion_cate_assign.cat_fasid ","LEFT ");
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
          
    }
    public function _getprd_color($by_id) 
    {
        $this->db->select("
                            product_qty_color_size.id as prd_color_size_id,
                            product_qty_color_size.colorid,
                            color_tbl.id,
                            product_qty_color_size.colorimagename,
                            color_tbl.colorname,
                            color_tbl.colorcode,
                            product_qty_color_size.colorimage
                        ");
        $this->db->from('product_qty_color_size');
        $this->db->where(" product_qty_color_size.productid ", $by_id);
        $this->db->where(" product_qty_color_size.status ", 1);
        $this->db->where(" product_qty_color_size.isdeleted ", 0);
        $this->db->group_by(" product_qty_color_size.colorid");
        $this->db->join( 'color_tbl', " color_tbl.id = product_qty_color_size.colorid ","LEFT ");
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
          
        
        
    }
    public function _getprd_size($by_id) 
    {
        $this->db->select("
                            product_qty_color_size.sizeid,
                            size_tbl.sizecode,
                            size_tbl.sizename
                        ");
        $this->db->from('product_qty_color_size');
        $this->db->where(" product_qty_color_size.productid ", $by_id);
        $this->db->where(" product_qty_color_size.status ", 1);
        $this->db->where(" product_qty_color_size.isdeleted ", 0);
        $this->db->group_by(" product_qty_color_size.sizeid");
        $this->db->join( 'size_tbl', " size_tbl.id = product_qty_color_size.sizeid " ,"LEFT ");
        $this->db->order_by(" size_tbl.arrange", 'ASC');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
    }
    public function _getprd_img($by_id) 
    {
        $this->db->select("id,imagename");
        $this->db->from($this->DB_prd_fashionimg);
        $this->db->where(" ".$this->DB_prd_fashionimg.".productid ", $by_id);
        $this->db->where(" ".$this->DB_prd_fashionimg.".colorimg ", 0);
        $this->db->where(" ".$this->DB_prd_fashionimg.".status ", 1);
        $this->db->where(" ".$this->DB_prd_fashionimg.".isdeleted ", 0);
        $this->db->order_by("arrange", 'ASC');
        $query = $this->db->get();
          
        return $query->result_array();
    }
    
    
    // Get count of all fashion products count
    function getAllFashionCount($param=array())
    {
        $this->db->from('products_fashion');
        $this->db->join('restaurants', 'products_fashion.merchantid = restaurants.id', "left");
        
        // Process any filter options if any
        $this->queryFashionParameters($param);
        // Clause to only fetch data with deletedat field set to null
        $this->db->where(array('products_fashion.isdeleted'=>0));
        
        $total = $this->db->count_all_results();
        return $total;
    }
    
    public function getAllProduct($param=array(), $limit_start)
    {
        
        $this->db->select("productimages.imagename, products_fashion.*, restaurants.companyname, restaurants.slug as companynameslug, categories_fashion.id AS category_id, 
            categories_fashion.categoryparentid, categories_fashion.categoryname, SUM(product_qty_color_size.productinstock) AS sum_productinstock,
            product_qty_color_size.price, min(product_qty_color_size.price) AS min_price, max(product_qty_color_size.price) AS max_price, 
            count(DISTINCT product_qty_color_size.id) AS variant");
        $this->db->from("products_fashion");
        $this->db->join("product_qty_color_size", "product_qty_color_size.productid = products_fashion.id",'left');
        $this->db->join("restaurants", "restaurants.id = ".$this->DB_product_fas.".merchantid ", 'left');
        $this->db->join("product_fashion_cate_assign", "product_fashion_cate_assign.product_fasid = products_fashion.id", 'left');
        $this->db->join("categories_fashion", "categories_fashion.id = product_fashion_cate_assign.cat_fasid", 'left');
        $this->db->join("    
                (
                    SELECT ".$this->DB_prd_fashionimg.".id,".$this->DB_prd_fashionimg.".productid,".$this->DB_prd_fashionimg.".imagename
                    FROM ".$this->DB_prd_fashionimg."
                    GROUP BY ".$this->DB_prd_fashionimg.".productid
                ) ".$this->DB_prd_fashionimg." " 
                , " ".$this->DB_prd_fashionimg.".productid = ".$this->DB_product_fas.".id " , "LEFT");
        
        // Process any filter options if any
        $this->queryFashionParameters($param);
        // Clause to only fetch data with isdeleted field set to zero and also based on the jollof platform
        $this->db->where(array("products_fashion.isdeleted" => 0));
        
        $this->db->limit(25, $limit_start);
        $this->db->group_by("products_fashion.id");
        $this->db->order_by("products_fashion.status", 'ASC');
        $this->db->order_by("products_fashion.createdat", 'DESC');
        $query = $this->db->get();
        
        $get_prod = null;

        if($query->num_rows() > 0)
        {
            $rows = $query->result_array();
            foreach($rows as $row)
            {
                $row['product_categories'] =   $this->_get_product_categories_byid($row['id']);
                $get_prod[] = $row;
            }
            
            return $get_prod;
        }
        else
        {
            return null;
        }
        
    }
    
    
    Public function _get_product_categories_byid($by_id)
    {
        $this->db->select("".$this->DB_cat_fas.".id AS category_id, ".$this->DB_cat_fas.".categoryparentid, ".$this->DB_cat_fas.".categoryname");
        $this->db->from($this->DB_cat_prd);
        $this->db->join( $this->DB_cat_fas, $this->DB_cat_fas.".id = ".$this->DB_cat_prd.".cat_fasid ", 'left');
        $this->db->where($this->DB_cat_prd.".product_fasid", $by_id);
        $this->db->where($this->DB_cat_prd.".status", 1);
        $this->db->where($this->DB_cat_prd.".isdeleted", 0);
        $this->db->order_by("cat_fasid", 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function _get_fashion_cate()
    {

        $this->db->select('*');
        $this->db->from($this->DB_cat_fas);
        $this->db->where("categoryparentid ", 0);
        $this->db->where("status ", 1);
        $this->db->where("isdeleted ", 0);
        $this->db->order_by("arrangecategory" , "ASC");


        $query = $this->db->get();
        $get_nav_cat	= array();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $get_nav_cat[$row->id]['id']                =   $row->id;
                $get_nav_cat[$row->id]['slug']              =   $row->slug;
                $get_nav_cat[$row->id]['categoryname']      =   $row->categoryname;
                $get_nav_cat[$row->id]['arrangecategory']   =   $row->arrangecategory;
                $get_nav_cat[$row->id]['categoryparentid']  =   $row->categoryparentid;
                $get_nav_cat[$row->id]['nav_cate_submenu']  =   $this->get_fashion_cate_submenu($row->id);// feach data by category from the category_fashion tb 
            }
        }
        return $get_nav_cat;
    }
    
    function productAssignmentStatus($prodID, $ID)
    {
            $this->db->select('*');
            $this->db->from('product_fashion_cate_assign');
            $this->db->where('cat_fasid', $ID);
            $this->db->where('product_fasid', $prodID);
            $query = $this->db->get();
            if ($query->num_rows() > 0)
                    return true;
            else
                    return false;
    }
    public function get_fashioncateroles($prodID)
    {
        $this->db->select('categories_fashion.id,categories_fashion.slug,categories_fashion.categoryname,categories_fashion.arrangecategory,categories_fashion.categoryparentid');
        $this->db->from($this->DB_cat_fas);
        $this->db->where("categoryparentid ", 0);
        $this->db->where("status ", 1);
        $this->db->where("isdeleted ", 0);
        $this->db->order_by("arrangecategory" , "ASC");


        $query = $this->db->get();
        $get_nav_cat	= array();

        if($query->num_rows() > 0)
        {
            $i = 0;
            $rows = $query->result_array();
            foreach($rows as $row)
            {
                $status = $this->productAssignmentStatus($prodID, $row['id']);
                if($status == true)
                    $row['checkIt'] = 'yes';
                else
                    $row['checkIt'] = 'no';
                $row['nav_cate_submenu']  =   $this->get_fashioncateroles_submenu($prodID,$row['id']);// feach data by category from the category_fashion tb
                $get_nav_cat[]=$row;
                $i++;
            }
        }
        return $get_nav_cat;
         
    }
    public function get_fashioncateroles_submenu($prodID,$by_id)
    {
        $this->db->select('categories_fashion.id,categories_fashion.slug,categories_fashion.categoryname,categories_fashion.arrangecategory,categories_fashion.categoryparentid');
        $this->db->from($this->DB_cat_fas);
        $this->db->where("categoryparentid ", $by_id);
        $this->db->where("status ", 1);
        $this->db->where("isdeleted ", 0);
        $this->db->order_by("arrangecategory" , "ASC");
        $this->db->order_by("createdat", "DESC");
        
        $query = $this->db->get();
        $get_nav_cat	= array();
        
        if($query->num_rows() > 0)
        {
            $i = 0;
            $rows = $query->result_array();
            foreach($rows as $row)
            {
                $status = $this->productAssignmentStatus($prodID, $row['id']);
                if($status == true)
                    //$get_nav_cat[$i]['checkIt'] = 'yes';
                    $row['checkIt'] = 'yes';
                else
                    //$get_nav_cat[$i]['checkIt'] = 'no';
                    $row['checkIt'] = 'no';
                $row['submenu_nav']       =   $this->get_fashioncateroles_submenu($prodID,$row['id']);
                $get_nav_cat[]=$row;
                $i++;
            }
        }
        return $get_nav_cat;
    }

    public function get_fashion_cate_submenu($by_id)
    {
        $this->db->select('*');
        $this->db->from($this->DB_cat_fas);
        $this->db->where("categoryparentid ", $by_id);
        $this->db->where("status ", 1);
        $this->db->where("isdeleted ", 0);
        $this->db->order_by("arrangecategory" , "ASC");
        $this->db->order_by("createdat", "DESC");
        
        $query = $this->db->get();
        $get_nav_cat	= array();
        
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {

                $get_nav_cat[$row->id]['id']                =   $row->id;
                $get_nav_cat[$row->id]['categoryname']      =   $row->categoryname;
                $get_nav_cat[$row->id]['slug']              =   $row->slug;
                $get_nav_cat[$row->id]['arrangecategory']   =   $row->arrangecategory;
                $get_nav_cat[$row->id]['categoryparentid']  =   $row->categoryparentid;
                $get_nav_cat[$row->id]['submenu_nav']       =   $this->get_fashion_cate_submenu($row->id);
                //$get_prd[$row->id]['canaddproduct'] =   $row->canaddproduct;
            }
        }
        return $get_nav_cat;
    }
    
    public function _all_colors($search) 
    {   
        
        $this->db->select(" * ")->from('color_tbl');
        $this->db->where("status", 1);
        
        if(isset($search) && !empty($search))
        {
            $this->db->like('colorname',$search);
            $this->db->or_like('colorcode',$search);
        }
        $this->db->order_by("colorname", 'ASC');
        $query = $this->db->get();
        return $query->result();
        //print("<pre>".print_r($query->result_array(),true)."</pre>");die;
    }
    
    public function _all_sizes($search) 
    {   
        
        $this->db->select("size_tbl.* , size_category.sizecategory ")->from('size_tbl');
        $this->db->where("size_tbl.status", 1);
        $this->db->join( "size_category", " size_category.id = size_tbl.sizecategoryid " );
        
        
        if(isset($search) && !empty($search))
        {
            $this->db->like("size_category.sizecategory",$search);
            $this->db->or_like("size_tbl.sizename",$search);
            $this->db->or_like("size_tbl.sizecode",$search);
        }
        $this->db->order_by("size_category.sizecategory", 'ASC');
        $this->db->order_by("size_tbl.arrange", 'ASC');
        $this->db->order_by("size_tbl.sizename", 'ASC');
        $this->db->order_by("size_tbl.sizecode", 'ASC');
        
        $query = $this->db->get();
        return $query->result();
        //print("<pre>".print_r($query->result_array(),true)."</pre>");die;
    }
    
    var $productVariant_order = array(
                                
                                " color_tbl.colorname",
                                " product_qty_color_size.colorimagename",
                                " size_tbl.sizecode",
                                " product_qty_color_size.price",
                                " product_qty_color_size.discount_price",
                                " product_qty_color_size.productinstock",
                                NULL,
                            ); //set column field database for datatable orderable
    
    
    
    public function make_fashionProductVariantByid($by_id)
    {
        $productVariant_search = array(
                                 
                                " color_tbl.colorname",
                                " product_qty_color_size.colorimagename",
                                " size_tbl.sizecode",
                                " size_tbl.sizename",
                                " product_qty_color_size.price",
                                " product_qty_color_size.discount_price",
                                " product_qty_color_size.productinstock"
                            );
        
        
        
        $this->db->select('product_qty_color_size.*,color_tbl.colorname,color_tbl.colorcode,size_tbl.sizecode,size_tbl.sizename');
        $this->db->from('product_qty_color_size');
        $this->db->join( 'color_tbl', " color_tbl.id = product_qty_color_size.colorid ","LEFT ");
        $this->db->join( 'size_tbl', " size_tbl.id = product_qty_color_size.sizeid " ,"LEFT ");
        $this->db->where(" product_qty_color_size.productid ", $by_id);
        $this->db->where(" product_qty_color_size.status ", 1);
        $this->db->where(" product_qty_color_size.isdeleted ", 0);
       

        $i=0;
        foreach ($productVariant_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->like($item, $_POST['search']['value']);
                    $this->db->where(" product_qty_color_size.productid ", $by_id);
                    $this->db->where(" product_qty_color_size.status ", 1);
                    $this->db->where(" product_qty_color_size.isdeleted ", 0);
                }
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                    $this->db->where(" product_qty_color_size.productid ", $by_id);
                    $this->db->where(" product_qty_color_size.status ", 1);
                    $this->db->where(" product_qty_color_size.isdeleted ", 0);
                }
                if(count($productVariant_search) - 1==$i) {}
                //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
    
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->productVariant_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            //$this->db->order_by(" arrangecategory", 'ASC');
        }
    }
    
    public function fashionProductVariantByid($id) 
    {
        $this->make_fashionProductVariantByid($id);
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();   
    }  

    public function filtered_fashionProductVariantByid($id)
    {  
           $this->make_fashionProductVariantByid($id);  
           $query = $this->db->get();  
           return $query->num_rows();  
    }       
      
    public function count_fashionProductVariantByid($id)  
    {  
        $this->db->select('product_qty_color_size.*,color_tbl.colorname,color_tbl.colorcode,size_tbl.sizecode,size_tbl.sizename');
        $this->db->from('product_qty_color_size');
        $this->db->join( 'color_tbl', " color_tbl.id = product_qty_color_size.colorid ","LEFT ");
        $this->db->join( 'size_tbl', " size_tbl.id = product_qty_color_size.sizeid " ,"LEFT ");
        $this->db->where(" product_qty_color_size.productid ", $id);
        $this->db->where(" product_qty_color_size.status ", 1);
        $this->db->where(" product_qty_color_size.isdeleted ", 0);

        return $this->db->count_all_results();  
    }
      
}
?>