
<div class = "side-nav">
            <a class="page-scroll" href = "#firstpage"><div id='bul1' class = "bullet" style="background-color: rgba(46, 117, 97, 0.85); "></div></a>
            <a class="page-scroll" href = "#howitworks"><div id='bul2' class = "bullet"></div></a>
            <a class="page-scroll" href = "#best_wr"><div id='bul3' class = "bullet"></div></a>
            <a class="page-scroll" href = "#think_what"><div id='bul4' class = "bullet"></div></a>
        </div>
<!--1st page-->
<div id="firstpage" class="intro_page module parallax parallax-1">
    
	<div class="row" id="pageitems">
		<div class="col-md-6" >
			<div id="slogan"><p>&nbsp;The One Stop Shop For All Your  &nbsp;Content Needs</p></div>
    
			<br><br>
			<div class="row">
				<div class="col-sm-6" id="myc1" >
					<?php echo $this->Html->link("Order Content",array('controller'=>'Businesses','action'=>'signup'),array('escape' => false,'id'=>'order')); ?>
				</div>
        
				<div class="col-sm-6" id="myc2">
					<?php echo $this->Html->link("Start Writing",array('controller'=>'Writers','action'=>'signup'),array('escape' => false,'id'=>'start')); ?>
				</div>
        
			</div>
		</div>
	</div>
    
    <div id="mybounch" class="row">
    <a href="#howitworks" ><?php echo $this->Html->image('arrow3.png',array('alt'=>'White Panda arrow','id'=>'bounce'));?></a>
    </div>
	
</div>

<!--2nd Page-->
<div class="row" id="page2">
 	<?php echo $this->Html->image('Tile1.jpg',array('alt'=>''));?>
 	<?php echo $this->Html->image('Tile2.jpg',array('alt'=>''));?>
 	<?php echo $this->Html->image('Tile3.jpg',array('alt'=>''));?>
 	<?php echo $this->Html->image('Tile4.jpg',array('alt'=>''));?>
</div>       


<!--3rd page     
<div class='business_need'>

    <a class = "anchors" name = "business_need"></a>
    <div id = "head"><p>Saving Your Time, Money And A Few Grey Hairs!</p></div>
    
    
    <div class="components">
            
        <img src="images/EmptyProfile.png"/ alt="Empty profile content">
        <p id="name">Name Name Name<br/>
        <span id='details'>CEO of ............. </span>
        <p id="quote"><em><img src="images/quotationMark.png"/ alt="Content Quotation mark">We assure perfect matching of clients <img src="images/quotationMark2.png"/ alt="Quotation marks"></em></p>
            
    </div>
    
    
    <div class="components">
        <img src="images/EmptyProfile.png"/ alt="Empty profile Writer">
        <p id="name">Name Name Name<br/>
        <span id='details'>CEO of ............. </span>
        <p id="quote"><em><img src="images/quotationMark.png"/>We assure perfect matching of clients <img src="images/quotationMark2.png"/ alt="Quotation image"></em></p>
    </div>
    
     
    <div class="components">
        <img src="images/EmptyProfile.png"/ alt="White Panda content">
        <p id="name">Name Name Name<br/>
        <span id='details'>CEO of ............. </span>
        <p id="quote"><em><img src="images/quotationMark.png"/ alt="White Panda marketing">We assure perfect matching of clients <img src="images/quotationMark2.png"/ alt="White Panda quotation"></em></p>
    </div>
    
</div>
Merquee of companies        
<div class="merquee">
    <img id='im1' src="images/merquee1.png" alt="White Panda marquee 1">
    <img id='im2' src="images/merquee2.png" alt="White Panda marquee 2">
    <img id='im3' src="images/merquee1.png" alt="White Panda marquee 3">
    <img id='im4' src="images/merquee2.png" alt="White Panda marquee 4">
</div>-->


<div class="last_pg">    
<h3><hr><?php echo $this->Html->image('full_logo_light2.png',array('alt'=>'White Panda - The one stop shop for all your content needs'));?></br>The One Stop Shop For All Your Content Needs</h3>
 <p><a href="https://twitter.com/WhitePanda_in">
    <?php echo $this->Html->image('social_icon_tweet.png',array('alt'=>'Twitter image White Panda'));?></a> <a href="https://www.facebook.com/whitepanda.in">
    <?php echo $this->Html->image('social_icon_facebook.png',array('alt'=>'Facebook White Panda'));?></a><a href="https://in.linkedin.com/in/mrroshana">
    <?php echo $this->Html->image('social_icon_linken.png',array('alt'=>'Linkedin White Panda'));?></a> <a href="https://plus.google.com/114156032023917943919/about">
    <?php echo $this->Html->image('social_icon_google+.png',array('alt'=>'Google Plus White Panda'));?></a></p>
</div>