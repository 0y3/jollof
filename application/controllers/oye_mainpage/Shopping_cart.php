<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shopping_cart extends CI_Controller {
 
 function __construct()
{
        parent::__construct();
        $this->load->library("cart");
}

 function index()
 {
  $this->load->model("oye/shopping_cart_model");
  $data["product"] = $this->shopping_cart_model->fetch_all();
  $this->load->view("mainpage_v/shopping_cart", $data);
 }

 function add()
 {
  $this->load->library("cart");
  $data = array(
   "id"  => $_POST["product_id"],
   "name"  => $_POST["product_name"],
   "qty"  => $_POST["quantity"],
   "price"  => $_POST["product_price"]
  );
  $this->cart->insert($data); //return rowid 
  echo $this->view();
 }

 function load()
 {
  echo $this->view();
 }

 function remove()
 {
  $row_id = $_POST["row_id"];
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
  <h3>Shopping Cart</h3><br />
  <div class="table-responsive">
   <div align="right">
    <button type="button" id="clear_cart" class="btn btn-warning">Clear Cart</button>
   </div>
   <br />
   <table class="table table-bordered">
    <tr>
     <th width="40%">Name</th>
     <th width="15%">Quantity</th>
     <th width="15%">Price</th>
     <th width="15%">Total</th>
     <th width="15%">Action</th>
    </tr>

  ';
  $count = 0;
  foreach($this->cart->contents() as $items)
  {
   $count++;
   $output .= '
   <tr> 
    <td>'.$items["name"].'</td>
    <td>'.$items["qty"].'</td>
    <td>'.$items["price"].'</td>
    <td>'.$items["subtotal"].'</td>
    <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="'.$items["rowid"].'">Remove</button></td>
   </tr>
   ';
  }
  $output .= '
   <tr>
    <td colspan="4" align="right">Total</td>
    <td>'.$this->cart->total().'</td>
   </tr>
  </table>

  </div>
  ';

  if($count == 0)
  {
   $output = '<h3 align="center">Cart is Empty</h3>';
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
 function view1(){
   $this->load->library("cart");
  $output = '';
  $output .= '  
            <div class="containerr">
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                                <th style="width:50%">Product</th>
                                <th style="width:10%">Price</th>
                                <th style="width:8%">Quantity</th>
                                <th style="width:22%" class="text-center">Subtotal</th>
                                <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                    ';
$count = 0;
foreach($this->cart->contents() as $items)
{
 $count++;
             $output .= '
                        <tr>
                                <td data-th="Product">
                                        <div class="row">
                                                <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/80x80" alt="..." class="img-responsive"/></div>
                                                <div class="col-sm-10">
                                                        <h4 class="nomargin">'.$items["name"].'</h4>
                                                        <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
                                                </div>
                                        </div>
                                </td>
                                <td data-th="Price">'.$items["price"].'</td>
                                <td data-th="Quantity">
                                        <input type="number" class="form-control text-center" value="'.$items["qty"].'">
                                </td>
                                <td data-th="Subtotal" class="text-center">'.$items["subtotal"].'</td>
                                <td class="actions" data-th="">
                                        <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>								
                                </td>
                        </tr>
                        ';
 }
        $output .= '
                    </tbody>
                    
                    <tfoot>
                            <tr class="visible-xs">
                                    <td class="text-center"><strong>Total 1.99</strong></td>
                            </tr>
                            <tr>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="btngrp-search2" placeholder="Coupon text" />
                                            <span class="input-group-btn">
                                             <button class="btn btn-default" type="button">Add Coupon</button>
                                            </span>
                                        </div>
                                    </td>
                                    <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                    <td colspan="2" class="hidden-xs"></td>
                                    <td class="hidden-xs text-center"><strong>Total '.$this->cart->total().'</strong></td>
                                    <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                            </tr>
                    </tfoot>
                </table>
            </div>
          ';
        if($count == 0)
        {
         $output = '<h3 align="center">Cart is Empty</h3>';
        }
        //return $output;
        echo json_encode($output);
        exit();
       }
}
