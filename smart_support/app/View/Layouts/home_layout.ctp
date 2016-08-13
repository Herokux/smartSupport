<!DOCTYPE html>
<html lang='en'>
    <head>
        <title><?php echo $title_for_layout; ?></title>

        <!-- Hotjar Tracking Code for whitepanda.in -->
        <?php
//            echo $this->Html->css('reset');
            echo $this->Html->css('side-nav');
            echo $this->Html->css('nav-bar');
            echo $this->Html->css('base');
            echo $this->Html->css('indexnew');
//            echo $this->Html->css('header');
            echo $this->Html->css('bootstrap.min');
            echo $this->Html->css('style');
            echo $this->Html->css('footer');
            echo $this->Html->css('meetTeam');
//            echo $this->Html->css('businessSignUp');
            //echo $this->Html->css('writerSignUp');
            echo $this->Html->css('Login');
            echo $this->Html->css('privacy');
            echo $this->fetch('css');
            echo $this->Html->script('jquery.min.js');
            echo $this->Html->script('bootstrap.min.js');
            echo $this->Html->script('header.js');
            echo $this->Html->script('modernizr.js');
            echo $this->Html->script('custom.js');
            echo $this->Html->script('demo.js');
            echo $this->Html->script('fusionad.js');
            echo $this->Html->script('login-jquery-1.11.1.js');
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
        <meta name="description" content="White Panda is a Content Development platform connecting Business in need of Content to Talented Freelance writers." />
        <meta name="keywords" content="White, Panda, White Panda, Content, Writing, Content Writing, content writing jobs, Freelancer,   Marketing, Content Marketing, Freelance, Writer, Freelance Writer, India, Asia, Local, Blog, Article, Website Content, Want Content Writer, Content Writer India, Freelance writer India, Order Content, Order, Copy, Copywriting, Hire Content Writer, Hire Writer, Indian, How to write blog, How to do Content Marketing, I want to work as a content writer, Work from home, Cheap Content, Low Cost content, Reasonable Prices, How to get Content, Buy Content, Where can I buy content, Where can I order content, Why should i do content marketing, Hire writer, Appoint writer, Outsource writer, Curate Content, IIT, Indian Institute of Technology, Gandhinagar, Startup" />
        <meta name="robots" content="index, follow" />
        <meta name="revisit-after" content="1 days" />
        <?php echo $this->Html->meta('icon','img/webicon.png');?>
        <!-- <link rel="icon" type="[MIME TYPE]" href="img/" /> -->
        <meta charset="utf-8"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!--my custom fonts-->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">     
        <!--Start of Zopim Live Chat Script-->
        <script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
        d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
        $.src="//v2.zopim.com/?3QB13co722DTDWv3GJSOlqXP13ArU8Hf";z.t=+new Date;$.
        type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
        </script>
<!--End of Zopim Live Chat Script-->
    </head>
    <body>
        <nav class="navbar navbar navbar-fixed-top mynavbar" style="z-index:100;">
            <div class="container-fluid" id="navbarContainer">
                <div class="navbar-header">
                    <button id="mynavtriggerbutton" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>            
                    </button>
                    <?php echo $this->Html->link($this->Html->image('full_logo_white.png'),array('controller'=>'Pages','action'=>'home'),array('escape' => false,'class'=>'navbar-brand mylogo','id'=>'mylogo')); ?>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav" id="hoverEffects">
                        <li><a href="./faqs">Products & Pricing</a></li>
                        <li><a href="./blog">How It Works</a></li>
                        <li><a href="./blog">Blog</a></li>
                        <li><a href="./meetTheTeam.html">About Us</a></li>
                    </ul>
					<ul class="nav navbar-nav navbar-right" id="loginSignup">
						<li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sign Up</a>
                            <ul class="dropdown-menu">
                                <li><?php echo $this->Html->link("Business",array('controller'=>'Businesses','action'=>'signup'),array('escape' => false)); ?></li>
                                <li><?php echo $this->Html->link("Writers",array('controller'=>'Writers','action'=>'signup'),array('escape' => false)); ?></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Login</a>
                            <ul class="dropdown-menu">
                                <li><?php echo $this->Html->link("Business",array('controller'=>'Users','action'=>'business_login'),array('escape' => false)); ?></li>
                                <li><?php echo $this->Html->link("Writers",array('controller'=>'Users','action'=>'writer_login'),array('escape' => false)); ?></li>
                            </ul>
                        </li>
					</ul>
                </div>
            </div>
        </nav>
        <div class="wp-alert">
            <?php
                echo $this->Session->flash('success');
                echo $this->Session->flash('error');
                echo $this->Session->flash('auth', array('params'=>array('class'=>'alert-box radius alert')));
            ?>
        </div>
        <div clas="row" id="main-content">
            <?php echo $content_for_layout; ?>
        </div>
        <script>
        function resize() {
            if ($(window).width() < 980) {
             $('.best_wr .row div').removeClass('col-sm-2');
             $('.best_wr .row div').addClass('col-sm-3');
            }
            else {
                $('.best_wr .row div').addClass('col-sm-2');
             $('.best_wr .row div').removeClass('col-sm-3');
            }
        }

        $(document).ready( function() {
            $(window).resize(resize);
            resize();
        });
        </script>
        <div id = "footer">
            <div id = "footer-links" class="myrowfooter row row-centered">
                <div id="copyright" class="col-sm-5 col-centered col-fixed">
                    Copyright © 2015 whitepanda.in. All rights reserved.
                </div>
                <div id="mylinks" class="col-sm-7 col-centered col-fixed">
                    <?php echo $this->Html->link("Privacy",array('controller'=>'Pages','action'=>'privacy'),array('escape' => false)); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $this->Html->link("Terms of Use",array('controller'=>'Pages','action'=>'termsUse'),array('escape' => false)); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $this->Html->link("Writers' Privacy Agreement",array('controller'=>'Pages','action'=>'writersAgreement'),array('escape' => false)); ?>
                </div>
            </div>
        </div>
    </body>

<meta name="keywords" content="content writing jobs,
    
    
  content writing meaning,
     
    
   
                        
                                
          
                
  content writing courses,
     
    
    
                        
                                
          
                
  content writing services,
     
    
 
                        
                                
          
                
  content writing jobs in bangalore,
     
    
   
                        
                                
          
                
  content writing jobs in kolkata,
     
    
   
                        
                                
          
                
  content writing jobs in mumbai,
     
    
                        
                                
          
                
  content writing jobs from home,
     
    
                        
                                
          
                
  content writing jobs in pune,
     
    
                        
                                
          
                
  content writing internships,
     
    
                        
                                
          
                

  content writing tips,
    
                        
                                
          
                
  
  
  
  
  
  
  
  
content writing agency,
     

                                
          
                
  content writing assignments,
     

                        
                                
          
                
  content writing articles,
     

                                
          
                
  content writing assignments india,

                                
          
                
  content writing as a profession,
     
    
                                
          
                
  content writing as a career,
     
   
                        
                                
          
                
  content writing at home,
     
 
                                
          
                
  content writing ahmedabad,
     

                                
          
                
  content writing at dafso,
     

                                
          
                
  content writing application,
     
  
                        
                                
          
                
start a content writing business,

                
  what is a content writing,
     

                        
                                
          
                
  what is a content writing job,
     

                        
                                
          
                
  example of a content writing,
     

                                
          
                
  what is a content writing business,
     

                
  writing a content analysis,
                       
          
                
  writing a content strategy,
     
  
                        
                                
          
                
  writing a content analysis paper,
             
                                
          
                
  how to get a content writing job,
     
             
                                
          
                
  writing a content plan,
     

                
content writing business,
     
                 
                                
          
                
  content writing bangalore,
     
                        
          
                
  content writing books,
     

                
  content writing blogs,
     
  
                
  content writing basics,
     
                 
                                
          
                
  content writing business model,
                       
          
                
  content writing best practices,
     
                           
          
                
  content writing bangalore jobs,
                          
          
                
  content writing books pdf,
     
                 
                                
          
                
  content writing business plan,
     
                          
          
                

content writing companies,
     
                           
          
                
content writing courses in chennai,
     
                        
          
                
content writing courses in delhi,
                       
          
                
content writing companies in india,
     
                            
          
                
content writing charges,
     
     
          
                
content writing companies in bangalore,
     
                
          
                
content writing courses in pune,
     
                    
          
                
content writing courses in ignou,
              
                                
          
                
content writing courses in india,
     
                            
          
                

content writing definition,
     
                      
          
                
content writing demo,
     
                           
          
                
content writing delhi,
                         
          
                
content writing description,
                    
                                
          
                
content writing diploma,
     
                          
          
                
content writing dubai,
     
                         
          
                
content writing degree,
     
                       
          
                
content writing define,
     
                          
          
                
content writing dos and don'ts,
     
                   
                                
          
                
content writing designations,
     
                    
                                
          
                
content writing examples,
     
                     
          
                
  content writing exercises,
     
    
                
  content writing essentials,
     
                         
          
                
  content writing experience,                 
                                
          
                
  content writing english,
     
                  
                                
          
                
  content writing earn money,
     
    
                
  content writing ebook,
     
                 
                                
          
                
  content writing eligibility,
     
  
                
  content writing elance,
     
                           
          
                
  content writing experts,
     
                      
                                
          
                
e-commerce content writing,
                       
                                
          
                
  e learning content writing tips,
  
                                
          
                
  e-learning content writing,
     
  
          
                
content writing for websites,
     
 
                                
          
                
  content writing freelance,
     
    
                        
                                
          
                
  content writing format,
     
    
                                
          
                
  content writing from home,
   
                                
          
                
  content writing for seo,
   
                                
          
                
  content writing free online courses,
     
                        
                                
          
                
  content writing freelance jobs india,
    
                        
                                
          
                
  content writing firms,
    
                        
                                
          
                
  content writing freelancing jobs,
     
   
                
  content writing for websites tips,
    
          
                

content writing guidelines,
     
        
          
                
 content writing guide pdf,
     
  
                                
          
                
 content writing generator,
     
    
          
                
 content writing gigs,
 
          
                
 content writing glossary,
  
                                
          
                
content writing google,
   
                                
          
                
 content writing goa,
     
      
          
                
 content writing gurgaon,
     
            
          
                
 content writing group,
   
                                
          
                
 content writing guest post
     
 
                   " />
</html>