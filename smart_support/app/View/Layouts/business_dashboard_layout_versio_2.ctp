<!DOCTYPE html>
<html lang='en'>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <?php echo $this->Html->meta('icon','img/_webicon.png');?>
    <title>White Panda | Business</title>
    <?php
        echo $this->Html->css('lib/bootstrap.min');
        echo $this->Html->css('lib/w3');
        echo $this->Html->css('writer/custom');
        echo $this->Html->css('business/customRadio');
        
        echo $this->Html->css('lib/toaster');
        echo $this->Html->css('business/star-rating');
    
        echo $this->Html->css('lib/font-awesome/css/font-awesome.min');
//        echo $this->Html->css('lib/bootstrap-progressbar-3.3.4.min');
        echo $this->Html->css('business/formvalidation');
        echo $this->Html->css('business/orderstatusprogressbar');
        echo $this->Html->css('business/progressbar');
        echo $this->Html->css('business/custom');
        echo $this->Html->css('business/businessHomepage');
        echo $this->fetch('css');
    ?>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,200,100' rel='stylesheet' type='text/css'>
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container" ng-app="businessApp" ng-controller="businessController">
            
            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <?php echo $this->Html->link($this->Html->image('full_logo_white.png'),array('controller'=>'Businesses','action'=>'dashboard'),array('escape' => false,'class'=>'navbar-brand mylogo')); ?>
<!--                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>-->
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <?php 
                                        echo $userName; 
                                    ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
<!--                                    <li><a href="javascript:;">  Profile</a>-->
                                    </li>
                                    <li>
                                        <a target="_blank" href="../faqs/">Help</a>
                                    </li>
                                    <li>
                                        <?php echo $this->Html->link("Logout",array('controller'=>'Users','action'=>'logout'),array('escape' => false)); ?>
                                    </li>
<!--                                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>-->
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
<!--
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="badge bg-green">1</span>
                                </a>
-->
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <li>
                                        <a>
                                            <span class="image">
<!--                                          <img src="images/img.jpg" alt="Profile Image" />-->
                                      </span>
                                            <span>
                                          <span>White Panda</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                          Stay touched with your dashboard to access cool features.
                                      </span>
                                        </a>
                                    </li>
<!--
                                    <li>
                                        <a>
                                            <span class="image">
                                          <img src="images/img.jpg" alt="Profile Image" />
                                      </span>
                                            <span>
                                          <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                          <img src="images/img.jpg" alt="Profile Image" />
                                      </span>
                                            <span>
                                          <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                          <img src="images/img.jpg" alt="Profile Image" />
                                      </span>
                                            <span>
                                          <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a href="inbox.html">
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
-->
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->
            
            
            <div class="col-md-3 left_col" id="mysidebar">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <div id="Namecircle"><?php echo $userName[0]; ?></div>
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $userName; ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section" id="nav-tabs">
                            <ul class="nav side-menu">
                                <li ><a ng-click='orderNow()'><i class="fa fa-pencil"></i> Get Content <span class="fa fa-chevron-right"></span></a>

                                </li>
                                <li><a ng-click="myRecentOrders()"><i class="fa fa-bell"></i> My Orders <span class="fa fa-chevron-right"></span></a>
                                </li>
                                <li><a ng-click="receivedOrders()"><i class="fa fa-user"></i> Completed Orders <span class="fa fa-chevron-right"></span></a>
                                  
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /sidebar menu -->
                    
                    
                    <!--Navbar toggle button -->
                    <div class="col-md-3 text-center nav-toggle-button" id="menu_toggle">
                        <i class="fa fa-chevron-right" id="arrow-left"></i>
                        <i class="fa fa-chevron-left" id="arrow-right"></i>
                    </div>
                    <!-- /Navbar toggle button -->
                    
                    
                </div>
            </div>

            
            
            <!-- Toaster            -->
            <toaster-container toaster-options="{'time-out': 3000}"></toaster-container>
            <!--Toaster day            -->
            
            
            
            <!-- page content -->
            <div class="right_col" role="main">
                
                <div class='tab-content tab_result'>
                        <?php echo $content_for_layout; ?>


                        <div ng-show="loading" id="loading">
                            <?php echo $this->Html->image('LoaderIcon.gif'); ?>
                        </div>
                        <div ng-show="conn_error" id="message">
                            <h2>Connection error</h2>
                        </div>

                </div>
                
                <div ng-show="tabShowfx" ng-include="getTab()" class='tab-content tab_result'>


			<!--			Angular loading tab page-->

                </div>
                <br><br><br><br><br>
            </div>
            <!-- /page content -->





            <!-- footer content -->
<!--
            <footer>
                <div class="pull-right">
                    xx <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
-->
            <!-- /footer content -->
        </div>
    </div>
    
    <?php
        echo $this->Html->script('lib/jquery.min.js');
        echo $this->Html->script('bootstrap.min.js');
        echo $this->Html->script('business/businessHomepage.js');
        echo $this->Html->script('writer/writerHomepage.js');
        echo $this->Html->script('lib/angular.min.js');
        echo $this->Html->script('business/businessAppController.js');
        echo $this->Html->script('angular_controller/toaster.js');
        echo $this->Html->script('angular_controller/angular-file-upload.min.js');
        echo $this->Html->script('business/radioButton.js');
        echo $this->Html->script('lib/nprogress.js');
        echo $this->Html->script('lib/bootstrap-progressbar.min.js');
        echo $this->Html->script('business/star-rating.js');
        
//        echo $this->Html->script('lib/ui-bootstrap-tpls-1.3.2.min.js');
            
    ?>

</body>
	
</html>