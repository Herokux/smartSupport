<!DOCTYPE html>
<html lang="en">

<head>
	<title>Writer- White Panda</title>

	<?php
            echo $this->Html->css('header');
            echo $this->Html->css('footer');
            echo $this->Html->css('reset');
            echo $this->Html->css('bootstrap.min.css');
            echo $this->Html->css('w3.css');
            echo $this->Html->css('writer_fileUpload');
			echo $this->Html->css('writer/writersHomepage');
			echo $this->Html->css('writer/content_details');
            echo $this->Html->css('toaster');
            echo $this->Html->css('fileUpload/jquery.fileupload');
			echo $this->Html->css('nav-bar');
		
            echo $this->fetch('css');
		

            echo $this->Html->script('jquery.min.js');
            
            echo $this->Html->script('writerHomepage.js');
            echo $this->Html->script('angular.min.js');
			echo $this->Html->script('angular_controller/writerAppController.js');
			echo $this->Html->script('angular_controller/toaster.js');
			echo $this->Html->script('angular_controller/angular-file-upload.min.js');

            
       
            echo $this->Html->script('fileUpload/jquery.ui.widget.js');
            echo $this->Html->script('fileUpload/tmpl.min.js');
		echo $this->Html->script('bootstrap.min.js');
            echo $this->Html->script('fileUpload/jquery.fileupload.js');
            echo $this->Html->script('fileUpload/jquery.fileupload-process.js');
            echo $this->Html->script('fileUpload/jquery.fileupload-validate.js');
            echo $this->Html->script('fileUpload/jquery.fileupload-ui.js');
            echo $this->Html->script('fileUpload/main.js');

            
          ?>



		<script>
			(function (h, o, t, j, a, r) {
				h.hj = h.hj || function () {
					(h.hj.q = h.hj.q || []).push(arguments)
				};
				h._hjSettings = {
					hjid: 76030,
					hjsv: 5
				};
				a = o.getElementsByTagName('head')[0];
				r = o.createElement('script');
				r.async = 1;
				r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
				a.appendChild(r);
			})(window, document, '//static.hotjar.com/c/hotjar-', '.js?sv=');
		</script>

		<script>
			(function (i, s, o, g, r, a, m) {
				i['GoogleAnalyticsObject'] = r;
				i[r] = i[r] || function () {
					(i[r].q = i[r].q || []).push(arguments)
				}, i[r].l = 1 * new Date();
				a = s.createElement(o),
					m = s.getElementsByTagName(o)[0];
				a.async = 1;
				a.src = g;
				m.parentNode.insertBefore(a, m)
			})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

			ga('create', 'UA-63498607-1', 'auto');
			ga('send', 'pageview');
		</script>


		<?php echo $this->Html->meta('icon','img/webicon.png');?>

			<meta charset="utf-8" />
			<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
			<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
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
				<?php echo $this->Html->link($this->Html->image('full_logo_white.png'),array('controller'=>'Writers','action'=>'dashboard'),array('escape' => false,'class'=>'navbar-brand mylogo','id'=>'mylogo')); ?>
					<span style="position:absolute; font-size:31px; font-family:champ; top:1px; left:341px; color:#fff;">Writers</span>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">


					<li class="dropdown">
						<a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
							<i class="glyphicon glyphicon-bell"></i>
						</a>

						<ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">

							<div class="notification-heading">
								<h4 class="menu-title">Notifications</h4>
								<h4 class="menu-title pull-right">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4>
							</div>
							<li class="divider"></li>
							<div class="notifications-wrapper">
								<a class="content" href="#">

									<div class="notification-item">
										<h4 class="item-title">Topic</h4>
										<p class="item-info">Headers</p>
									</div>

								</a>

							</div>
							<li class="divider"></li>
							<div class="notification-footer">
								<h4 class="menu-title">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4></div>
						</ul>

					</li>










					<li>
						<a>
							<?php echo $activeUser['User']['username']; ?>
						</a>
					</li>
					<li>
						<?php echo $this->Html->link("Sign out",array('controller'=>'Users','action'=>'logout'),array('escape' => false)); ?>
					</li>
				</ul>
			</div>
		</div>
	</nav>



	<div class="container writer_main" ng-app="myApp" ng-controller="writerdatabase">

		<!--            <img id="arrow_writer" src="images/arrowWriter.png"/>-->
		<div class="writer_tab">
			<ul>
				<a data-toggle="tab" ng-click='jobsearch()' href="#">
					<li id="job_search">Job Search</li>
				</a>
				<a data-toggle="tab" ng-click="notifications()" href="#">
					<li id="my_notifications">Notifications</li>
				</a>
				<!--                    <a data-toggle="tab" href="#"><li id="notification">Notification</li></a>-->
				<a data-toggle="tab" ng-click="profile()" href="#">
					<li id="my_profile">My Profile</li>
				</a>
				<a data-toggle="tab" ng-click="claimedProjects()" href="#">
					<li id="claimed_projects">Claimed Projects</li>
				</a>
				<a data-toggle="tab" ng-click='payment()' href="#">
					<li id="my_balance">Payment</li>
				</a>
				<!--                    <a href="#"><li id="comp_ord">Completed Orders</li></a>-->
				<!--                    <a href="#"><li id="payment">Payment</li></a>-->
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

		<div ng-show="tabShowfx" ng-include="getTab()" class='tab-content tab_result' style="font-family:'Open Sans'">


			<!--			Angular loading tab page-->



		</div>

		<!--Modal for Writer file uploads Angualar vs jQuery Override-->
		
<!--		<iframe ng-src="getUploadSegment()"> </iframe>-->
<!--
		<div ng-include="getUploadSegment()" class='row' style="font-family:'Open Sans'">

			Angular load upload segment tab page

		</div>
-->

		<!-- Modal end-->

	</div>


</body>

</html>