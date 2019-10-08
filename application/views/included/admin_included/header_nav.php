            <?php
                
                $this->load->model('oye/Super_admin_model');
               // $rest_data = $this->Super_admin_model->get_admin_info(); 
            ?>
            <header class="navbar navbar-default">

                    <ul class="nav navbar-nav-custom">

                        <li>

                            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">

                                <i class="fa fa-bars fa-fw"></i>

                            </a>

                        </li>

                    </ul>


                    <form action="page_ready_search_results.php" method="post" class="navbar-form-custom">

                        <div class="form-group">

                            <input type="text" id="top-search" name="top-search" class="form-control" placeholder="">

                        </div>

                    </form>

                    <ul class="nav navbar-nav-custom pull-right">

                        
                        <!--<li class="dropdown">

                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">

                                <i class="fa fa-bell"></i>

                                <span class="label label-primary label-indicator animation-floating">3</span>

                            </a>

                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">

                                <li class="dropdown-header text-center">Activity</li>

                                <li>

                                    <div class="alert alert-success alert-alt">

                                        <small>5 min ago</small><br>

                                        <i class="fa fa-thumbs-up fa-fw"></i> You had a new sale (N3000)

                                    </div>

                                    <div class="alert alert-info alert-alt">

                                        <small>10 min ago</small><br>

                                        <i class="fa fa-arrow-up fa-fw"></i> Please Update your profile

                                    </div>


                                    <div class="alert alert-danger alert-alt">

                                        <small>Yesterday</small><br>

                                        <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)" class="alert-link">You have 12 pending request</a>

                                    </div>

                                </li>

                            </ul>

                        </li>-->

                        <li class="dropdown">

                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">

                                 <i class="fa fa-bell"></i><i class="fa fa-angle-down"></i>

                            </a>

                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">

                                <li class="dropdown-header text-center">Account</li>

                                <!--<li>

                                    <a href="#">

                                        <i class="fa fa-envelope-o fa-fw pull-right"></i>

                                        <span class="badge pull-right">5</span>

                                        Messages

                                    </a>

                                </li>-->

                                <li class="divider"></li>

                                <li>

                                    <a href="<?= site_url('admin/settings')?>">

                                        <i class="fa fa-user fa-fw pull-right"></i>

                                        Profile

                                    </a>

                                </li>

                                <li class="divider"></li>

                                <li>


                                    <a href="<?= site_url('admin/logout')?>"><i class="fa fa-sign-out fa-fw pull-right"></i> Logout</a>

                                </li>


                            </ul>

                        </li>

                    </ul>

                </header>