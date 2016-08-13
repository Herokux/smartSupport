<?php

    echo $this->Html->css('writer/jobsearch');
    echo $this->fetch('css');
    
    date_default_timezone_set("Asia/Calcutta");
    $currentDate = date("Y-m-d H:i:s");

?>



    <!-- some gap for heading part -->

    <div class="gap40"></div>

    <!-- heading of right side starts -->

    <div class="row">
        <div class="col s12 m12 l8 offset-l3 edit-search">
            <input type="text" placeholder="search" name="search" ng-model="searchjob"><i class="fa fa-search" aria-hidden="true"></i>
        </div>

    </div>

    <!-- gap for below section -->

    <div class="gap10"></div>

    <div class="row">
        <div class="col s12 m12 l3">
            <div class="actions search-catagorywise">
                <div class="input-field col s12">
                    <select ng-model="searchjob">
                        <option value="" disabled selected>Area</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Business">Business</option>
                        <option value="Education">Education</option>
                        <option value="Sports & Fitness">Sports & Fitness</option>
                        <option value="Art & Design">Art & Design</option>
                        <option value="Food & Beverage">Food & Beverage</option>
                        <option value="Healthcare and Sciences">Healthcare and Sciences</option>
                        <option value="Journalism & Publishing">Journalism & Publishing</option>
                        <option value="Lifestyle & Travel">Lifestyle & Travel</option>
                        <option value="Software and Technology">Software and Technology</option>
                    </select>
                </div>

                <div class="gap20"></div>

                <div class="input-field col s12">
                    <select ng-model="searchjob">
                        <option value="" disabled selected>Type</option>
                        <option value="Blog Post">Blog Post</option>
                        <option value="Articles">Articles</option>
                        <option value="Website Content">Website Content</option>
                        <option value="White Paper">White Paper</option>
                        <option value="Press Release">Press Release</option>
                        <option value="Product Description">Product Description</option>
                        <option value="Social Media">Social Media</option>
                    </select>
                </div>

                <div class="gap20"></div>

                <div class="input-field col s12">
                    <select ng-model="searchjob">
                        <option value="" disabled selected>Stipend</option>
                        <option value="200">200</option>
                        <option value="400">400</option>
                        <option value="800">800</option>
                        <option value="1600">1600</option>
                        <option value="3200">3200</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l8">
            <div class="col s12 m12 l12" ng-repeat="y in myfeeds | filter:searchjob">

            <!-- Bronze card starts here -->

            <div class="job-cards">
                <div class="left left-side">
                    <div class="job-card-paygrade {{y.paygrade}}">
                        <!-- mention the color here-->
                        {{y.paygrade}}
                    </div>
                </div>
                <div class="right job-card-content">
                    <div class="row">
                        <div class="col s8 m9 l9">
                            <h5 class="edit-article">{{y.topic}}</h5>
                            <div class="gap20 hide-on-med-and-down"></div>
                            <div class="gap20"></div>
                            <div class="row make-fix">
                                <div class="col s4 m5 l5">
                                    <b>Industry</b>
                                    <br> {{y.writer_specialization}}
                                </div>
                                <div class="col s4 m4 l4">
                                    <b>Type</b>
                                    <br> {{y.content_quality}}
                                </div>
                                <div class="col s4 m3 l3">
                                    <br>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i> {{mydateDifference("
                                    <?php echo $currentDate; ?>", y.date_ordered)}}
                                </div>
                            </div>
                        </div>
                        <div class="col s4 m3 l3 center">
                            <div class="gap20"></div>
                            <i class="fa fa-inr text-brand inr" aria-hidden="true"></i>
                            <span class="amount text-brand">{{jobStipendArray[y.id]}}</span>
                            <div class="gap10"></div>
                            <button class="view-button" ng-click="jobDetails($index)">View</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        </div>
        <div class="col s12 m12 l8" ng-show="myfeeds.length == 0" style="text-align: center;">
            <h1 id='noProj' style="font-size: 11em;"><i class="fa fa-inbox" ></i></h1>
            <h2 id='noProj'>No updated projects</h2>
        </div>
    </div>

<script>
    $(document).ready( function(){
        $('select').material_select();
    });
</script>