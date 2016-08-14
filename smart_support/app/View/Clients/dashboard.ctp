<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Smart Support</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <?php echo $this->Html->meta('icon','img/_webicon.png');?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php echo $this->Html->css("client/dashboard"); ?>
</head>
<body ng-app="clientApp" ng-controller="clientController">
    <div class="main-body">
        <toaster-container toaster-options="{'time-out': 3000}"></toaster-container>
        <nav>
            <div class="nav-wrapper containx">
                <a href="#" class="brand-logo">Dashboard</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="waves-effect waves-light btn modal-trigger" href="#modal1">View API Key</a></li>
                    <li>
                        <a class='dropdown-button' href='#' data-activates='dropdown1'><?php echo $activeUser['User']['username']; ?><i class="material-icons right">input</i></a>
                        <ul id='dropdown1' class='dropdown-content'>
                            <li><?php echo $this->Html->link("Logout",array('controller'=>'Users','action'=>'logout'),array('escape' => false)); ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>API Key Information</h4>
                <p>You API Key for smart support is : <a href="">http://localhost/project/smart_support/smart_support/pages/support/<?php
                        echo $activeUser['User']['id']; ?></a></p>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>
            


        <div ng-init="sessionID = '<?php echo $sessionID; ?>'"></div>

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

        <div class="row">
            <div class="col s3 offset-s1">
                <ul class="collection with-header">
                    <li class="collection-header"><h4>Waiting list</h4></li>

                    <li class="collection-item" ng-repeat="y in CustomerDetails"><div>{{y.name}}<a href="#!" class="secondary-content" ng-click="startchat(sessionID, y.id)"><i class="material-icons">send</i></a></div></li>
                </ul>
            </div>
            <div class="col s7">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text" style="height: 400px; overflow-y: scroll;">
                        <ul ng-hide = "viewMessagebox">
                            <div class="chatinit">Chat Initialised</div>
                            <span class="chatmessage">i am dummy</span>
                            <span class="chatmessage" ng-repeat="z in clientMessages">{{z.message}}</span>
                        </ul>

                    </div>
                </div>
                <form ng-submit="clientSendMessageTrigger(currentMessage)">
                    <div class="input-field row">
                        <input ng-model="currentMessage" type="tel" class="validate" placeholder="Enter Your Message">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <?php
        echo $this->Html->script('lib/angular.min.js');
        echo $this->Html->script('lib/toaster.js');    
        echo $this->Html->script('client/clientAppController.js');
        echo $this->Html->script('client/script.js');
    ?>
</body>

</html>