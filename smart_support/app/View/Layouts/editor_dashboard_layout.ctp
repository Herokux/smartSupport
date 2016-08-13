<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Editor- White Panda</title>
<!--		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>-->
        <?php
            
            echo $this->Html->css('reset');
            echo $this->Html->css('bootstrap.min.css');
            echo $this->Html->css('w3.css');
			echo $this->Html->css('editor/editorCustom');
			echo $this->Html->css('editor/customRadio');
			echo $this->Html->css('editor/fileUpload');
			echo $this->Html->css('editor/star-rating');
            echo $this->Html->css('toaster');
			echo $this->Html->css('nav-bar');
            echo $this->Html->css('lib/bootstrap-progressbar-3.3.4.min');
            echo $this->Html->css('fileUpload/jquery.fileupload');
            echo $this->fetch('css');
		

            echo $this->Html->script('lib/jquery.min.js');
            echo $this->Html->script('lib/angular.min.js');	
			echo $this->Html->script('angular_controller/toaster.js');
			echo $this->Html->script('lib/bootstrap.min.js');
			echo $this->Html->script('editor/app.js');
			echo $this->Html->script('editor/star-rating.js');
            
        
        
        
            
            echo $this->Html->script('editor/angular-file-upload.min.js');
//            echo $this->Html->script('lib/nprogress.js');
//            echo $this->Html->script('lib/bootstrap-progressbar.min.js');
//            echo $this->Html->script('fileUpload/jquery.ui.widget.js');
//            echo $this->Html->script('fileUpload/tmpl.min.js');
//            echo $this->Html->script('fileUpload/jquery.fileupload.js');
//            echo $this->Html->script('fileUpload/jquery.fileupload-process.js');
//            echo $this->Html->script('fileUpload/jquery.fileupload-validate.js');
//            echo $this->Html->script('fileUpload/jquery.fileupload-ui.js');
//            echo $this->Html->script('fileUpload/main.js');


            
          ?>
        
        
		
		
      
      
		<?php echo $this->Html->meta('icon','img/webicon.png');?>
        
		<meta charset="utf-8"/>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
    </head>
    
    <body ng-app="editorApp" ng-controller="editorsController">
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
                    <?php echo $this->Html->link($this->Html->image('full_logo_white.png'),array('controller'=>'Editors','action'=>'dashboard'),array('escape' => false,'class'=>'navbar-brand mylogo','id'=>'mylogo')); ?>
                    <span style="position:absolute; font-size:31px; font-family:champ; top:1px; left:341px; color:#fff;">Editor Panel</span>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
						<li><a data-toggle="tab" ng-click="contentSamples()" href="#">Paygrade Assign</a></li>
						<li><a data-toggle="tab" ng-click="contentEditing()" href="#">Content Editing</a></li>
						<li><a data-toggle="tab" ng-click="" href="#">Revision Requests</a></li>
						<li><a style="font-family:nesia"><?php echo $activeUser['User']['username']; ?></a></li>
						<li><?php echo $this->Html->link("<span class='glyphicon glyphicon-off'></span>",array('controller'=>'Users','action'=>'logout'),array('escape' => false)); ?></li>
                    </ul>
                </div>
            </div>
        </nav>
		
		
		<toaster-container toaster-options="{'time-out': 3000}"></toaster-container>
        
        <div class="container editor" >
<!--            <img id="arrow_writer" src="images/arrowWriter.png"/>-->
        
			<div class='tab-content' style="font-family:'Open Sans'">
				
				
				<?php echo $content_for_layout; ?>

            	
				<div ng-show="loading" id="loading">
                    <?php echo $this->Html->image('LoaderIcon.gif'); ?>
				</div>
				<div ng-show="conn_error" id="message">
					<h2>Connection error</h2>
				</div>
				

			</div>
			
			<div ng-show="tabShowfx" ng-include="getTab()"  class='tab-content tab_result' style="font-family:'Open Sans'">
				
<!--			Angular loading tab page-->
            	
				
				
			</div>
			
			
        </div>
    </body>
</html>