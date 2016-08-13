<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>White Panda | Writer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <?php echo $this->Html->meta('icon','img/_webicon.png');?>

    
        <!-- ONLINE CSS SCRIPT    -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


        <?php
       
            
        ?>
</head>

<body ng-app="clientApp" ng-controller="clientController">


    <!-- main structure starts from here -->

    <div class="main-body">


        <!-- Toaster            -->
        <toaster-container toaster-options="{'time-out': 3000}"></toaster-container>
        <!--Toaster day            -->



        <!-- header of right side starts -->

        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Hack</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li>
                        <a class='dropdown-button' href='#' data-activates='dropdown1'><?php echo $userName; ?><i class="material-icons left">cloud</i></a>

                        <!-- Dropdown Structure -->
                        <ul id='dropdown1' class='dropdown-content'>
                            <li><?php echo $this->Html->link("Logout",array('controller'=>'Users','action'=>'logout'),array('escape' => false)); ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>




      
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
                <!-- <h2>Connection error</h2>-->
            </div>

        </div>

        <div class="tab-view">
            <ul>
                <li ng-repeat="x in clientMessages">{{x.message}}</li>

            </ul>
        </div>

    </div>


    <!-- Side scripts starts from here       -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <?php
            echo $this->Html->script('lib/angular.min.js');
            echo $this->Html->script('lib/toaster.js');    
            echo $this->Html->script('client/clientAppController.js');
            echo $this->fetch('script');
    ?>
</body>

</html>