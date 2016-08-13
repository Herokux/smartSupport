<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Business | White Panda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <?php echo $this->Html->meta('icon','img/_webicon.png');?>

    <!--        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">-->
    
    <!-- ONLINE AZURE CSS SCRIPT    -->
    <link rel="stylesheet" type="text/css" href="http://whitepanda-lib.azurewebsites.net/White-Panda/css_frameworks/materialize/css/materialize.min.css">
    
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <?php
        
//        echo $this->Html->css('lib/materialize');
    
        echo $this->Html->css('business/layout');
        echo $this->fetch('css');
    ?>
</head>

<body ng-app="businessApp" ng-controller="businessController">

    <!-- nav bar section starts-->

    <div class="sidebar" id="sidebar">
        <div class="head top"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></div>
        <div class="gap30"></div>
        <div id='order' class="icons" ng-click='orderNow()'><i class="fa fa-cart-plus" aria-hidden="true"></i><span class="span">Get Content</span></div>
        <div class="icons" ng-click='notification()'><i class="fa fa-bell" aria-hidden="true"></i><span class="span">Notifications</span>
            <div class="notificationFlag unseen"></div>
        </div>
        <div  class="icons" ng-click="myRecentOrders()"><i class="fa fa-file-text-o" aria-hidden="true"></i><span class="span">My Orders</span></div>
        <div class="icons" ng-click='receivedOrders()'><i class="fa fa-download" aria-hidden="true"></i><span class="span">Completed Orders</span></div>
    </div>

    <!-- main structure starts from here -->

    <div class="main-body">


        <!-- Toaster            -->
        <toaster-container toaster-options="{'time-out': 3000}"></toaster-container>
        <!--Toaster day            -->




        <!-- header of right side starts -->

        <header>
            <div class="left">
                <img class="logo-image" src="http://amarpandey.me/project/online/logo.jpeg">
            </div>
            <div class="right down">
                <ul id="dropdown1" class="dropdown-content">
                    <li><a target="_blank" href="../faqs/">Help</a></li>
                    <li>
                        <?php echo $this->Html->link("Logout",array('controller'=>'Users','action'=>'logout'),array('escape' => false)); ?>
                    </li>
                </ul>
                <a class="hide-on-small-only dropdown-button username" href="#!" data-activates="dropdown1">
                    <?php echo $userName; ?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                <a class="hide-on-med-and-up dropdown-button setting-icon" href="#!" data-activates="dropdown1"><i class="fa fa-cog" aria-hidden="true"></i></a>
            </div>
        </header>

<!--
        <div ng-show="loading" class="progressbar">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        </div>
-->
        
        
        <div class="container dashboard-alerts">
            <?php echo $content_for_layout; ?>
        </div>
        
        
        <div class="pageLoading">


                


                    <div ng-show="loading" id="loading">
                        <div class="preloader-wrapper big active">
                            <div class="spinner-layer spinner-blue-only">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div ng-show="conn_error" id="message">
<!--                        <h2>Connection error</h2>-->
                    </div>

        </div>
        
        <div class="tab-view">
            


            <div ng-show="tabShowfx" ng-include="getTab()">


                <!--  Angular loading tab page   -->

            </div>
        </div>
        

    </div>


    <!-- Side scripts starts from here       -->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>-->
    
    <script src="https://use.fontawesome.com/e694244574.js"></script>
    <?php
    
            echo $this->Html->script('lib/jquery.min.js');
            echo $this->Html->script('lib/materialize.min.js');
    
            echo $this->Html->script('lib/angular.min.js');
            echo $this->Html->script('angular_controller/toaster.js');
            echo $this->Html->script('angular_controller/angular-file-upload.min.js');
            echo $this->Html->script('business/businessAppController.js');
            echo $this->Html->script('business/layout.js');
            echo $this->fetch('script');
    ?>
</body>

</html>