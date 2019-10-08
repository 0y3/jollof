<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
                $this->load->model('oye/Restaurants_model');
                $this->load->model('oye/Profile_model');
                $this->load->model('oye/Super_admin_model');
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
         $data = array(
          "id"           => $_POST["product_id"],
          "rest"         => $_POST["restaurant_id"],
          "img"          => $_POST["product_img"],
          "name"         => $_POST["product_name"],
          "qty"          => $_POST["quantity"],
          "price"        => $_POST["product_price"],
          "description"  => $_POST["desc"],
         );
         $this->cart->insert($data); //return rowid 
         //echo $this->view();
        }

        function load()
        {
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
                        <th>QTY</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                    </tr>
            ';
         $count = 0;
         foreach($this->cart->contents() as $items)
         {
            //print("<pre>".print_r($items,true)."</pre>");
            //die;
          $count++;
          $output .= '
                        <tr class="cart_row_total">
                            <td>
                                <div class="col-sm-2 nopadding ">
                                    <img class="cart_img" src="'. base_url().'assets/uploads/rest_prod/'. $items["img"].'" >
                                </div>
                                
                                <div class="col-sm-10 nopadding" style="padding-left:5px;">
                                    <div class="cart_menu">'.$items["name"].'<div>
                                </div>
                                
                            </td>
                            <td class="cart_qty_td">
                               
                                <div class="col-sm-6 nopadding ">
                                    <div class="cart_qty">'.$items["qty"].'</div>
                                    <input type="hidden" class="cart_suball_qty" value="">
                                </div>
                                <div class="col-sm-6 nopadding ">
                                    <a href="javascript:;" class="ajaxbook_form fancybox.ajax" data-fancybox data-type="ajax" data-src="'. base_url().'restaurants/order_form/'.$items['id'].' "data-toggle="tooltip" title="Edit!" id="'.$items["rest"].'">
                                        <i class="fa fa-pencil-square-o" style="color: green;"></i>
                                    </a>
                                    <a href="#" data-toggle="tooltip" title="Remove from Cart!" class="del_cart" id="'.$items["rowid"].'" >
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </div>
                                
                                
                            </td>
                            <td class="cart_price_td">
                                <div class="cart_price">'.$items["price"].'</div>
                                <input type="hidden" class="cart_suball_price" value="">
                            </td>
                            <td class="cart_price_total">'.$items["subtotal"].'</td>
                        </tr>
                ';
         }
         $output .= '
                    <tr>
                       <th colspan="3"><span class="pull-right">Sub Total</span></th>
                       <td class="boldtext cart_price_sub_grandtotal">'.$this->cart->total().'</td>
                   </tr>
                   <tr>
                       <th colspan="3"><span class="pull-right">VAT 20%</span></th>
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
        
	
}
