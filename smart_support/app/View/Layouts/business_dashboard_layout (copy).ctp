<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>Business- White Panda</title>

        <!-- Hotjar Tracking Code for whitepanda.in -->
        <?php
            echo $this->Html->css('reset');
            echo $this->Html->css('header');
			echo $this->Html->css('footer');
            echo $this->Html->css('bootstrap.min.css');
            echo $this->Html->css('w3.css');
			echo $this->Html->css('nav-bar');
			echo $this->Html->css('business/businessHomepage');
			echo $this->Html->css('business/formvalidation');
			echo $this->Html->css('business/orderstatusprogressbar');
			echo $this->Html->css('business/progressbar');
			echo $this->Html->css('business/custom');
			echo $this->fetch('css');
		
			echo $this->Html->script('jquery.min.js');
            echo $this->Html->script('business/businessHomepage.js');
			
			echo $this->Html->script('bootstrap.min.js');
			echo $this->Html->script('angular.min.js');
			echo $this->Html->script('business/businessAppController.js');
			echo $this->Html->script('angular_controller/toaster.js');
            echo $this->fetch('script');
		?>

		<script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:76030,hjsv:5};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
        </script>
		
		<script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-63498607-1', 'auto');
          ga('send', 'pageview');

        </script>
		
		<?php echo $this->Html->meta('icon','img/webicon.png');?>
		
		<meta charset="utf-8"/>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
	<body >
		<div class="wp-alert">
            <?php
                echo $this->Session->flash('success');
                echo $this->Session->flash('error');
                echo $this->Session->flash('auth', array('params'=>array('class'=>'alert-box radius alert')));
            ?>
        </div>
        <nav class="navbar navbar-inverse navbar-fixed-top mynavbar" style="z-index:100;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <?php echo $this->Html->link($this->Html->image('full_logo_white.png'),array('controller'=>'Businesses','action'=>'dashboard'),array('escape' => false,'class'=>'navbar-brand mylogo','id'=>'mylogo')); ?>
                    <span style="position:absolute; font-size:31px; font-family:champ; top:1px; left:341px; color:#fff;">Business</span>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                    <li><a style="font-family:nesia"><?php echo $activeUser['User']['username']; ?></a></li>
                    <li><?php echo $this->Html->link("Sign out",array('controller'=>'Users','action'=>'logout'),array('escape' => false)); ?></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container business_main" ng-app="businessApp" ng-controller="businessController">
        	<div class="business_tab">
                <ul>
                    
                    <a ng-click="orderNow()" id="order_now" href="#"><li >Order now</li></a>
                    <a ng-click="myRecentOrders()" id="my_orders" href="#"><li >My orders</li></a>
                    <a ng-click="receivedOrders()" id="recieved_files" href="#received"><li >Received files</li></a>
                </ul>
            </div>
			
			
			<toaster-container toaster-options="{'time-out': 3000}"></toaster-container>
			
			<div class='tab-content tab_result' style="font-family:'Open Sans'">
				
				
				<?php echo $content_for_layout; ?>
            	
				<div ng-show="loading" id="loading">
                    <?php echo $this->Html->image('LoaderIcon.gif'); ?>
				</div>
				<div ng-show="conn_error" id="message">
					<h2>Connection error</h2>
				</div>
				
			</div>
			
			<div ng-include="getTab()"  class='tab-content tab_result' style="font-family:'Open Sans'">
				
				
<!--			Angular loading tab page-->
            	
				
				
			</div>
     
        </div>
	</body>
	
</html>