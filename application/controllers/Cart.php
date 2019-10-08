<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
                $this->load->model('oye/Restaurants_model');
                $this->load->model('oye/Profile_model');
                $this->load->model('oye/Super_admin_model');
                $this->load->model('oye/Fashion_model');
                $this->load->helper('text');
	}
	
	public function index()
	{  
            //$this->load->model("oye/shopping_cart_model");
            //$data["product"] = $this->shopping_cart_model->fetch_all();
            //$this->load->view("mainpage_v/shopping_cart", $data);
            
	}
        public function view2()
	{  
            //$data['cart_list'] = $this->cart->contents();
            //$this->load->view('oye_mainpage_v/cart',$data);
            echo $this->view();
	}
        
        public function add()
        {
            $sub_menu = NULL;
            if(isset($_POST['sub_menu_list']))
            {
                $sub_menu = $_POST['sub_menu_list'];
                for($r=0;$r<count($sub_menu);$r++)
                   {
                           for($c=0;$c<count($sub_menu[$r]);$c++)
                           {
                                   $submenu = $sub_menu[$r][$c]."   ";
                           }
                   }
            }
            
            $product_color_size = null;
            if( isset( $_POST['product_colorname']) || isset($_POST['product_color_size'] )) // fashion
            {
                $product_color_size = 1; 
            }
             
            $real_price=NULL;
            if(isset($_POST["real_price"])){ $real_price =$_POST["real_price"]; }// cusiane
            
            $real_qty=NULL;
            if(isset($_POST["real_qty"])){ $real_qty =$_POST["real_qty"]; } // cusiane
            if(isset($_POST["quantity_fashion"])){ $real_qty =$_POST["quantity_fashion"]; } // fashion
            
            $product_colorcode=NULL;
            if(isset($_POST["product_colorcode"])){ $product_colorcode =$_POST["product_colorcode"]; } // fashion
            
            $product_colorname=NULL;
            if(isset($_POST["product_colorname"])){ $product_colorname =$_POST["product_colorname"]; } // fashion
            
            $product_size=NULL;
            if(isset($_POST["product_size"]) ){ $product_size =$_POST["product_size"]; } // fashion
            
            $cuisine_prdid=NULL;$fashion_prdid=NULL;$mainproduct_fashionid=null;
            if(isset($_POST["product_id"])){ $cuisine_prdid =$_POST["product_id"]; $prdid =$_POST["product_id"]; } // cusiane
            if(isset($_POST["product_fashionid"])){ $fashion_prdid =$_POST["product_fashionid"]; $prdid =$_POST["product_fashionid"]; } // fashion
            if(isset($_POST["mainproduct_fashionid"])){ $mainproduct_fashionid =$_POST["mainproduct_fashionid"]; } // fashion Main Product ID

            $this->session->set_userdata('last_shopped_microsite', $_POST['last_cartadded']); // save last add cart product microsite for redirection after checkout is successful
            
         $data = array(
          "id"           => $_POST["restaurant_id"].$prdid,//$_POST["product_id"],
          "cuisine_productid" => $cuisine_prdid,
          "fashion_productid" => $fashion_prdid,
          "mainfashion_productid" => $mainproduct_fashionid,
          "rest"         => $_POST["restaurant_id"],
          "img"          => $_POST["product_img"],
          "name"         => $_POST["product_name"],
          "qty"          => $_POST["quantity"],
          "price"        => $_POST["product_price"],
          "prd_pr"       => $real_price,
          "prd_qty"      => $real_qty,
          "description"  => $_POST["desc"],
          "submenu"      => $sub_menu,//$_POST['sub_menu_list']
             
          "product_color_size"      => $product_color_size,
          "product_colorcode"       => $product_colorcode,
          "product_colorname"       => $product_colorname,
          "product_size"            => $product_size
         );
         
         $this->cart->insert($data); //return rowid 
         print("<pre>".print_r($data,true)."</pre>");//die;
         //echo $this->view();
        }

        function load()
        {
            $admininfo=$this->Super_admin_model->get_admin_info();
            $data ['vat']= $admininfo->vat;
            $data['cart_list'] = $this->cart->contents();
            $this->load->view('oye_mainpage_v/cart',$data);
            //echo $this->view();
        }

        function remove()
        {
         $row_id = $_POST["rowid"];
         $data = array(
          'rowid'  => $row_id,
          'qty'  => 0
         );
         $this->cart->update($data);
         echo $this->view();
        }

        function clear()
        {
         $this->load->library("cart");
         $this->cart->destroy();
         echo $this->view();
        }

        function view()
        {
         
         $output = '';
         $output .= '
            <table class="table table-responsive table-striped table-hover table-bordered cart_table">
                <tbody>
                    <tr>
                        <th>Item</th>
                        <th style=" min-width:90px;">QTY</th>
                        <th>Note</th>
                        <th>Total Price</th>
                    </tr>
            ';
         $count = 0;
         foreach($this->cart->contents() as $items)
         {
            //print("<pre>".print_r($items,true)."</pre>");//die;
          $count++;
        if(isset($items["product_color_size"])){
            
            $store= $this->Fashion_model->_getstoreurl($items['rest']);
            $store_product= $this->Fashion_model->_getproducturl($items['mainfashion_productid']);
            
            $link= '<a href="'. base_url().'fashion/store/'.$store.'/'.$store_product.'" class=""  data-toggle="tooltip" title="Edit!" id="'.$items["rest"].'">
                        <i class="fa fa-pencil-square-o" style="color: green;cursor: pointer;"></i>
                    </a>
                    ';
            
          $output .= '
                        <tr class="cart_row_total">
                            <td>
                                <div class="col-sm-3 nopadding ">
                                    <!--<img class="cart_img" src="'. base_url().'assets/uploads/fashion_prod/'. $items["img"].'" >-->
                                    <img class="cart_img" src="'. base_url().'assets/uploads/fashion_prod/thumbs/'. $items["img"].'" >
                                
                                <div class="col-sm-9 nopadding" style="padding-left:5px;">
                                    
                                    <div class="cart_menu" data-toggle="tooltip" title="'.$items["name"].'">
                                    
                                        '.$value = $items["name"];
                                            $limit = '25';
                                            if (strlen($value) > $limit) {
                                                     $trimValues = substr($value, 0, $limit).'...';
                                                      } 
                                            else {
                                                    $trimValues = $value;
                                              }
                                              echo $trimValues.'
                                              
                                    </div>';
                
                            $output .= '            
                                        <div class="cart_sub_menu">
                                            <table class=" ">     
                                                <tbody>
                                                    <tr>
                                                        <td class="text-muted">Color:</td>
                                                        <td> '.$items["product_colorname"].' </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Size:</td>
                                                        <td> '.$items["product_size"].' </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>';
                                    
              
        }
        else{
            $link11= '<a href="#" class="ajaxbook_form fancybox.ajax" data-fancybox data-type="ajax" data-src="'. base_url().'restaurants/order_form/'.$items['cuisine_productid'].' "data-toggle="tooltip" title="Edit!" id="'.$items["rest"].'">
                        <i class="fa fa-pencil-square-o" style="color: green;cursor: pointer;"></i>
                    </a>
                    ';
            $link= '<a href="'. base_url().'restaurants/orderform/'.$items['cuisine_productid'].'" class="" data-toggle="tooltip" title="Edit!" id="'.$items["rest"].'">
                        <i class="fa fa-pencil-square-o" style="color: green;cursor: pointer;"></i>
                    </a>
                    ';
          $output .= '
                        <tr class="cart_row_total">
                            <td>
                                <div class="col-sm-3 nopadding ">
                                    <img class="cart_img" src="'. base_url().'assets/uploads/rest_prod/'. $items["img"].'" >
                                </div>
                                
                                <div class="col-sm-9 nopadding" style="padding-left:5px;">
                                    
                                    <div class="cart_menu">
                                        '.$items["name"].'  &nbsp; &nbsp; &nbsp;  '.$items["prd_qty"].'qty  <span class="pull-right">₦ '.$items["prd_pr"].'</span>
                                    </div>';
        
         if(!empty($items['submenu']))
             {
        
                foreach ($items['submenu'] as $submenu)
                    {
                
                        $output .= '            
                                    <div class="cart_sub_menu">
                                        <table class=" ">     
                                            <tbody>
                                                <tr>
                                                    <td> '.$submenu[0].' </td>
                                                    <td class="text-center"> '.$submenu[1].'qty </td>
                                                    <td class="text-right">₦ '. $submenu[2].'</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>';
                                    
                    }
            } 
         }
         
        
        $output .= '
                                </div>
                                
                            </td>
                            <td class="cart_qty_td">
                               
                                <div class="col-sm-6 nopadding ">
                                    <div class="cart_qty">'.$items["prd_qty"].'</div>
                                    <input type="hidden" class="cart_suball_qty" value="">
                                </div>
                                <div class="col-sm-6 nopadding ">
                                
                                    '.$link.'
                                    <a href="#" data-toggle="tooltip" title="Remove from Cart!" class="del_cart" id="'.$items["rowid"].'" >
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </div>
                                
                                
                            </td>
                            <td class="cart_price_td">
                                <div class="col-sm-12 nopadding ">
                                    
                                </div>
                                
                            </td>
                            <td class="cart_price_total">
                                <div class="cart_price">'.$items["price"].'</div>
                                <input type="hidden" class="cart_suball_price" value="">
                                
                            </td>
                        </tr>
                ';
         }
         $output .= '
                    <tr>
                       <th colspan="3"><span class="pull-right">Sub Total</span></th>
                       <td class="boldtext cart_price_sub_grandtotal">'.$this->cart->total().'</td>
                   </tr>
                   <tr>
                       <th colspan="3"><span class="pull-right">VAT</span></th>
                       <td class="boldtext cart_vat">50.00</td>
                   </tr>
                   <tr>
                       <th colspan="3"><span class="pull-right">Total</span></th>
                       <td class="boldtext cart_price_grandtotal"></td>
                   </tr>

                   <tr>
                       <td>
                           <a href="#" class="btn btn-danger" id="btnDelete">Empty Cart</a>
                       </td>
                       <td colspan="3">
                           <a href="#" class="pull-right btn btn-success">Checkout</a>
                       </td>
                   </tr>
                   
                   
               </tbody>
           </table>
                
          
         </table>

         </div>
         ';

         if($count == 0)
         {
          $output = ''
                  . '<div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Oh snap!</strong>
                        Sorry Cart is Empty.
                    </div>';
         }
         return $output;
       //  return $count;
       //  print_r($count);
       //  $result = array();
       //    $result[0] = $output;
       //    $result[1] = $count;
       //  print_r($result);
       //  echo json_encode($result);
       //  exit();
        }
        function cart_count()
        {
            $count = 0;
           foreach($this->cart->contents() as $items)
           {
            $count++;
           }
           echo $count;

        }

        function point_count()
        {
          //$point = 0;

          if( (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true ) && ($_SESSION['Type'] != 'User') )
          { $point = 0; }
          else
          {
            $user_info = $this->Profile_model->profile($_SESSION['User_id']);
            $point=$user_info[0]->point;
          }
          echo $point;
        }
        
	
}
