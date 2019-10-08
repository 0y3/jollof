
                                
                                
                            <div id="">
                                <div id="" class="table-responsive">
                                    <table id="delivery_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                            	<th>State</th>
                                            	<th>City </th>
                                                <th>Charges</th>
                                                <th style="min-width: 160px;">Free Delivery Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <tr>
                                        	<?=form_open("jollofadmin/billing/deliveringcharges/",' id="serachform"')?>
                                                
                                                                
                                                <td>
                                                    <select name="statesid" id="" class="selectpicker form-control" data-live-search="true" show-tick  data-size="8" title="State Search" data-width="90%" onchange="this.form.submit()">
                                                        <option value="">States Search</option>
                                                        <?php 
                                                            foreach ($allState as $row)
                                                            {
                                                             echo '<option data-tokens="'.$row['id'].'" value="'.$row['id'].'">'.$row['statename'].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </td>
                                                                
                                                <td>
                                                    <select name="Dcityid" id="" class="selectpicker form-control" data-live-search="true" show-tick  data-size="8" title="City Search" data-width="90%" onchange="this.form.submit()">
                                                        <option value="">City Search</option>
                                                        <?php 
                                                            foreach ($allCity as $row)
                                                            {
                                                             echo '<option data-tokens="'.$row['id'].'" value="'.$row['id'].'">'.$row['cityname'].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </td>


                                                <td></td>
                                                <td></td>
                                                
                                                <button style=" display: none" type="submit" class=""></button>
                                                <?=form_close()?>
                                            
                                            </tr>
                                            
                                        	<?php if(!empty($location)): ?>   
                                                <?php
                                
                                        	       $status = "";
                                        	       $label_color = array("", "danger", "warning", "primary", "success", "info");
                                                ?>
                                                       
                                        	        <?php foreach ($location as $locations) :?>
                                        	        <?php
                                                        if(empty($locations['delivieringchargesid']))
                                                        {
                                                            $charge  = '<div class="ch_namediv_'.$locations['cityid'].'"> &nbsp;
                                                                            <a href="javascript:void(0);" data-toggle="tooltip"  title="Add Delivery Fee" class="jboxtooltip editdelivering" data-charge_id="'.$locations['cityid'].'" data-city_id="'.$locations['cityid'].'"  data-charge_value="0">
                                                                            <i class="fa fa-plus-circle"" aria-hidden="true"></i>
                                                                            </a>
                                                                        </div>';
                                                            
                                                            $status='<span class="label label-warning"> Delivery Fee Not Set</span>';
                                                        }
                                                        else
                                                        {
                                                        
                                                            $charge  = '<div class="ch_namediv_'.$locations['delivieringchargesid'].'"> &nbsp;
                                                                            <a href="javascript:void(0);" data-toggle="tooltip"  title="Edit Delivery Fee" class="jboxtooltip editdelivering" data-charge_id="'.$locations['delivieringchargesid'].'" data-city_id="'.$locations['cityid'].'"  data-charge_value="'.$locations['delivieringcharges'].'">
                                                                            <i class="ti-pencil-alt""></i>
                                                                            </a> &nbsp;'.$locations['delivieringcharges'].'</div>';
                                                            
                                                            $status = '<div class="statusdiv_'.$locations['delivieringchargesid'].'">
                                                                        <a href="javascript:void(0);" data-toggle="tooltip"  title="Edit Delivery Fee Status" class="jboxtooltip editstatus" data-charge_id="'.$locations['delivieringchargesid'].'">
                                                                        <i class="ti-pencil-alt""></i>
                                                                        </a>';
                                                                if($locations['freedelivieringstatus'] == 1)
                                                                {
                                                                    $status .= '<span class="label label-success">Active</span>';
                                                                }
                                                                else
                                                                {
                                                                    $status .='<span class="label label-danger">In-Active</span>';
                                                                }
                                                            $status .='<div>';
                                                        }
                                                    ?>          
                                            <tr>
                                                <td><?=$locations['statename']?></td>
                                                <td><?=$locations['cityname']?></td>
                                                <td>
                                                    <!--<a href="javascript:void(0);" class="editcost" data-toggle="tooltip" title="Edit B2B % " data-_id="<?=$locations['id']?>" data-_varianttype="price" data-_variant="<?=$merchantslist['percharge']?>"><i class="ti-pencil-alt"></i></a> &nbsp; 
                                                    <b>₦<?= number_format(floatval( $locations['delivieringcharges']  ), 2,'.', ',')?></b>-->
                                                    <?= $charge ?>
                                                </td>
                                                <td><?=$status?> <!--<span class="label label-<?=$status?>"><?=$locations['orderstatus_desc']?> </span>--></td>
                                                
                                            </tr>
                                            <?php endforeach; ?>

                                        <?php else: ?>
                            
                                            <tr>
                                                <td class="text-center" colspan="4location"><b>No Delivery Charges Created</b></td>
                                            </tr>
                                        <?php endif; ?>
                                            
                                        </tbody>
                                        
                                    </table>
                                    
                                    <div id="pagination"><?php if(isset($pagenation)) echo $pagenation; ?></div>
                                    
                                    <!--<ul class="pagination float-right">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>-->
                                    
                                </div>
                            </div>
                                
                     
                                
                                