<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <div class="card-group">
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-danger">
                                        <i class="ti-clipboard text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Clients
                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"><?=number_format(@$totalclients)?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg btn-info">
                                        <i class="icon-Engineering text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Professionals

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"><?=$this->utility->formatFigures(@$totalprofessionals)?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-success">
                                        <i class="icon-Puzzle text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Pending Problems

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"><?=$this->utility->formatFigures(@$totalunresolved)?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-warning">
                                        <i class="ti-check-box text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Resolved Problems

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"><?=$this->utility->formatFigures(@$totalresolved)?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Column -->


                </div>
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                
                
                
                
                
                
                
                
                
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Recent Business Problems</h4>
                            </div>
                            <div class="comment-widgets scrollable ps-container ps-theme-default ps-active-y" style="height:400px;">
                                
                                <?php 
                                if(isset($recentproblems) && $recentproblems!= false)
                              	{
                              		foreach ($recentproblems as $recentproblem)
                              		{
                              		    $status = "Pending";
                              		    $status_color = "danger";
                              		    if($recentproblem['problemstatus'] == 1)
                              		    {
                              		        $status = "Completed";
                              		        $status_color = "primary";
                              		    }
                              		    else if($recentproblem['problemstatus'] == 2)
                              		    {
                              		        $status = "Fully Resolved";
                              		        $status_color = "success";
                              		    }
                                ?>
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2">
                                        <img src="<?=base_url()?><?=@substr(@$recentproblem['avatar'],1)?>" alt="user" width="50" class="rounded-circle">
                                    </div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium"><?=$recentproblem['businessname']?></h6>
                                        <span class="m-b-15 d-block"><?=$recentproblem['problemdescription']?> </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right"><?=date("M d, Y", strtotime($recentproblem['createdat']))?></span>
                                            <span class="label label-rounded label-<?=$status_color?>"><?=$status?></span>
                                            <span class="action-icons">
                                                <a href="javascript:void(0)">
                                                    <i class="ti-pencil-alt"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="ti-check"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="ti-heart"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                              		}
                              	}
                                ?>
                                
                                
                                
                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 560px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 518px;"></div></div></div>
                        </div>
                    </div>
                    
                    
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Recent Appointments</h4>
                                <div class="comment-widgets scrollable ps-container ps-theme-default ps-active-y" style="height:400px;">
                                    <table class="table no-margin">
                                      <thead>
                                      <tr>
                                        <th>Date</th>
                                        <th>Client</th>
                                        <th>Professional</th>
                                        <th>Appointment</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php 
                                      if(isset($recentappointments) && $recentappointments!= false)
                                      	{
                                      		foreach ($recentappointments as $recentappointment)
                                      		{
                                      ?>
                                      <tr>
                                        <td><?=date("M d, Y", strtotime($recentappointment['createdat']))?></td>
                                        <td><?=$recentappointment['businessname']?></td>
                                        <td><?=$recentappointment['firstname']?></td>
                                        <td><?=date("M d, Y H:i a", strtotime($recentappointment['appointmentdate']))?></td>
                                      </tr>
                                      <?php
                                      		} 
                                      	}
                                      ?>
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                
                
                
                
                
                
                
                
                
                
                <!-- ============================================================== -->
                <!-- Email campaign chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Categories</h4>
                                        <small class="card-subtitle">Overview of problem categories</small>
                                    </div>
                                    
                                </div>
                                <div id="chart-container" style="height: 305px;">
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Categories</h4>
                                        <small class="card-subtitle">Overview of resolved problems by categories</small>
                                    </div>
                                    
                                </div>
                                <div id="chart-container-2" style="height: 305px;">
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    
                </div>
                <!-- ============================================================== -->
                <!-- Email campaign chart -->
                <!-- ============================================================== -->
                
                
                
               
                
            </div>