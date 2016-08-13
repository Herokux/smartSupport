<div class="side-nav">
    <a class="page-scroll" href="#firstpage">
        <div id='bul1' class="bullet" style="background-color: rgba(46, 117, 97, 0.85); "></div>
    </a>
    <a class="page-scroll" href="#howitworks">
        <div id='bul2' class="bullet"></div>
    </a>
    <a class="page-scroll" href="#best_wr">
        <div id='bul3' class="bullet"></div>
    </a>
    <a class="page-scroll" href="#think_what">
        <div id='bul4' class="bullet"></div>
    </a>
</div>
<!--1st page-->
<div id="firstpage" class="intro_page module parallax parallax-1">

    <div class="row" id="pageitems">
        <div class="col-md-6">
            <div id="slogan">
                <p>&nbsp;The One Stop Shop For All Your &nbsp;Content Needs</p>
            </div>

            <br>
            <br>
            <div class="row">
                <div class="col-sm-6" id="myc1">
                    <?php echo $this->Html->link("Order Content",array('controller'=>'Businesses','action'=>'signup'),array('escape' => false,'id'=>'order')); ?>
                </div>

                <div class="col-sm-6" id="myc2">
                    <?php echo $this->Html->link("Start Writing",array('controller'=>'Writers','action'=>'signup'),array('escape' => false,'id'=>'start')); ?>
                </div>

            </div>
        </div>
    </div>

    <div id="mybounch" class="row">
        <a href="#howitworks"><?php echo $this->Html->image('arrow3.png',array('alt'=>'White Panda arrow','id'=>'bounce'));?></a>
    </div>

</div>

<!--2nd Page-->
<div id="howitworks" class="how_it_works">
    <br>

    <div id="head">
        <p>How It Works</p>
    </div>

    <div id="process" class="row">

        <div id="guidelines" class="col-sm-4 col-centered myprocesssection">
            <?php echo $this->Html->image('guidelines.png',array('alt'=>'White Panda writer claim'));?>
                <p>Post complete requirements</p>
                <br>
                <br>
        </div>
        <div id="claim" class="col-sm-4 col-centered myprocesssection">
            <?php echo $this->Html->image('scriter_writer_claims.png',array('alt'=>'White Panda writer claim'));?>

                <p>White Panda Content-strategists assign your work to relevant writers</p>
                <br>
                <br>
                <br>
        </div>
        <div id="content" class="col-sm-4 col-centered myprocesssection">
            <?php echo $this->Html->image('receive_content.png',array('alt'=>'White Panda writer claim'));?>

                <p>Receive awesome content in 5 business days</p>
                <br>
                <br>
                <br>
        </div>
    </div>

    <div id="sectors">
        <div id="myfirstsector">
            <?php echo $this->Html->image('article2.png');?>
                <p>Article</p>
        </div>
        <div>
            <?php echo $this->Html->image('press2.png');?>
                <p>Press Release</p>
        </div>
        <div>
            <?php echo $this->Html->image('blog2.png');?>
                <p>Blog Post</p>
        </div>
        <div id="mysectorseparator" style="width:0px;height:122px;">&nbsp;</div>
        <div>
            <?php echo $this->Html->image('website_pages2.png');?>
                <p>Web Page</p>
        </div>
        <div>
            <?php echo $this->Html->image('Tweets2.png');?>
                <p>Tweets</p>
        </div>
        <div>
            <?php echo $this->Html->image('Facebook_post2.png');?>
                <p>Facebook Post</p>
        </div>
        <div>
            <?php echo $this->Html->image('product_description2.png'); ?>
                <p>Product Description</p>
        </div>
    </div>
</div>


<!--4TH PAGE-->
<!--BEST WRITERS ON THE WEB-->


<div id="best_wr" class="best_wr">
    <!--
            <img id="backgrnd2" src="images/background2.jpg"/ alt="White Panda background">
            
-->
    <br/>
    <br/>

    <h1>Industries We Cater To</h1>

    <div id="myrowareas" class="row row-centered">

        <div class="col-sm-2 col-centered col-fixed" id="business">
            <?php echo $this->Html->image('Business.png'); ?>
                <p>BUSINESS</p>
        </div>
        <div class="col-sm-2 col-centered col-fixed" id="art_des">
            <?php echo $this->Html->image('art%20and%20design.png'); ?>
                <p>ART & DESIGN</p>
        </div>
        <div class="col-sm-2 col-centered col-fixed" id="food_bev">
            <?php echo $this->Html->image('Food%20and%20beverage.png'); ?>
                <p>FOOD & BEVERAGE</p>
        </div>
        <div class="col-sm-2 col-centered col-fixed" id="entertain">
            <?php echo $this->Html->image('Entertainment.png'); ?>
                <p>ENTERTAINMENT</p>
        </div>
        <div class="col-sm-2 col-centered col-fixed" id="healthcare">
            <?php echo $this->Html->image('healthcare.png'); ?>
                <p>HEALTHCARE</p>
        </div>
        <div class="col-sm-2 col-centered col-fixed" id="view_all_ind">
            <?php echo $this->Html->image('journalism-icon.png'); ?>
                <p>JOURNALISM</p>
        </div>
        <br>
        <div class="col-sm-2 col-centered col-fixed" id="business">
            <?php echo $this->Html->image('publish.png'); ?>
                <p>PUBLISHING</p>
        </div>
        <div class="col-sm-2 col-centered col-fixed" id="art_des">
            <?php echo $this->Html->image('travel.png'); ?>
                <p>LIFESTYLE & TRAVEL</p>
        </div>
        <div class="col-sm-2 col-centered col-fixed" id="food_bev">
            <?php echo $this->Html->image('educationIcon.png'); ?>
                <p>EDUCATION</p>
        </div>
        <div class="col-sm-2 col-centered col-fixed" id="entertain">
            <?php echo $this->Html->image('technology.png'); ?>
                <p>SOFTWARE & TECHNOLOGY</p>
        </div>
        <div class="col-sm-2 col-centered col-fixed" id="healthcare">
            <?php echo $this->Html->image('sports.png'); ?>
                <p>SPORTS & FITNESS</p>
        </div>
        <div class="col-sm-2 col-centered col-fixed" id="view_all_ind">
            <?php echo $this->Html->image('view_all_ind.png'); ?>
                <p>OTHERS</p>
        </div>


    </div>


    <br>
    <br>




</div>
<!-- best writers-->