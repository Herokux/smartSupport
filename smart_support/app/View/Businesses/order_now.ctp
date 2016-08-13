<?php
    echo $this->Html->css('business/order-now');
?>
    <!--  PHASE ONE STARTS HERE  -->

    <div class="phase-one">

        <div class="gap60"></div>
        <div class="checkpoint-wrapper">
            <ul class="row" role="tablist">

                <li id='step-1' role="presentation" class="col s3 active">
                    <a href="#step1" title="Choose Type">
                        <span class="round-tab">
                                    <i class="material-icons check-icons">check</i>
                                    <span class="step-numeric">1</span>
                        </span>
                    </a>

                    <div class="connecting-line"></div>
                </li>


                <li id='step-2' role="presentation" class="col s3">
                    <a href="#step2" title="Choose Plan">
                        <span class="round-tab">
                                    <i class="material-icons check-icons">check</i>
                                    <span class="step-numeric">2</span>
                        </span>
                    </a>
                    <div class="connecting-line"></div>
                </li>

                <li id='step-3' role="presentation" class="col s3">
                    <a href="#step3" title="Content Details">
                        <span class="round-tab">
                                    <i class="material-icons check-icons">check</i>
                                    <span class="step-numeric">3</span>
                        </span>
                    </a>
                    <div class="connecting-line"></div>
                </li>
                <li id='step-4' role="presentation" class="col s3">
                    <a href="#step4" title="Order Confirmation">
                        <span class="round-tab">
                                    <i class="material-icons check-icons">check</i> 
                                    <span class="step-numeric">4</span>
                        </span>
                    </a>
                </li>


            </ul>
        </div>
        <div class="gap60"></div>

        <div class="contain-one">

            <div class="row">
                <div class="col s12 m6 l3 boxes">
                    <div class="box">
                        <div class="row box-content">
                            <div class="col s12 m12 l12 head-box">Blog</div>
                            <div class="col s12 m12 l12 words-box">450-550 words</div>
                            <div class="col s12 m12 l12">
                                <button ng-click="orderType('4141788d-2414-11e6-a8b9-28d2449fa274')" class="box-button">Order</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l3 boxes">
                    <div class="box">
                        <div class="row box-content">
                            <div class="col s12 m12 l12 head-box">Articles</div>
                            <div class="col s12 m12 l12 words-box">850-950 words</div>
                            <div class="col s12 m12 l12">
                                <button ng-click="orderType('8778373b-2414-11e6-a8b9-28d2449fa274')" class="box-button">Order</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l3 boxes">
                    <div class="box">
                        <div class="row box-content">
                            <div class="col s12 m12 l12 head-box">Website Content</div>
                            <div class="col s12 m12 l12 words-box">250-350 words</div>
                            <div class="col s12 m12 l12">
                                <button ng-click="orderType('aacee61e-2414-11e6-a8b9-28d2449fa274')" class="box-button">Order</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l3 boxes">
                    <div class="box">
                        <div class="row box-content">
                            <div class="col s12 m12 l12 head-box">White Paper</div>
                            <div class="col s12 m12 l12 words-box">2000-2500 words</div>
                            <div class="col s12 m12 l12">
                                <button ng-click="orderType('e6e1122a-2414-11e6-a8b9-28d2449fa274')" class="box-button">Order</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l3 boxes">
                    <div class="box">
                        <div class="row box-content">
                            <div class="col s12 m12 l12 head-box">Press Release</div>
                            <div class="col s12 m12 l12 words-box">350-450 words</div>
                            <div class="col s12 m12 l12">
                                <button ng-click="orderType('0c1cb546-2415-11e6-a8b9-28d2449fa274')" class="box-button">Order</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l3 boxes">
                    <div class="box">
                        <div class="row box-content">
                            <div class="col s12 m12 l12 head-box">Product Description</div>
                            <div class="col s12 m12 l12 words-box">150-200 words</div>
                            <div class="col s12 m12 l12">
                                <button ng-click="orderType('2a1bd0bc-2415-11e6-a8b9-28d2449fa274')" class="box-button">Order</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l3 boxes">
                    <div class="box">
                        <div class="row box-content">
                            <div class="col s12 m12 l12 head-box">Social Media</div>
                            <div class="col s12 m12 l12 words-box">1-2 lines / 140 characters</div>
                            <div class="col s12 m12 l12">
                                <button ng-click="orderType('3f0adff5-2415-11e6-a8b9-28d2449fa274')" class="box-button">Order</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l3 boxes">
                    <div class="box">
                        <div class="row box-content">
                            <div class="col s12 m12 l12 head-box">Custom Content</div>
                            <div class="col s12 m12 l12 words-box text-white"></div>
                            <div class="col s12 m12 l12">
                                <button ng-click="orderType('Custom Content')" class="box-button">Order</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>

    <!--  PHASE TWO STARTS HERE  -->


    <div class="phase-two hide">


        <div class="gap60"></div>
        <div class="checkpoint-wrapper">
            <ul class="row" role="tablist">

                <li id='step-1' role="presentation" class="col s3 step-done">
                    <a href="#step1" title="Choose Type">
                        <span class="round-tab">
                                        <i class="material-icons check-icons">check</i>
                                        <span class="step-numeric">1</span>
                        </span>
                    </a>

                    <div class="connecting-line"></div>
                </li>


                <li id='step-2' role="presentation" class="col s3 active">
                    <a href="#step2" title="Choose Plan">
                        <span class="round-tab">
                                        <i class="material-icons check-icons">check</i>
                                        <span class="step-numeric">2</span>
                        </span>
                    </a>
                    <div class="connecting-line"></div>
                </li>

                <li id='step-3' role="presentation" class="col s3">
                    <a href="#step3" title="Content Details">
                        <span class="round-tab">
                                        <i class="material-icons check-icons">check</i>
                                        <span class="step-numeric">3</span>
                        </span>
                    </a>
                    <div class="connecting-line"></div>
                </li>
                <li id='step-4' role="presentation" class="col s3">
                    <a href="#step4" title="Order Confirmation">
                        <span class="round-tab">
                                        <i class="material-icons check-icons">check</i> 
                                        <span class="step-numeric">4</span>
                        </span>
                    </a>
                </li>


            </ul>
        </div>
        <div class="gap60"></div>



        <div class="back-button-to-phase-one">
            <a href="#" class="text-brand"><i class="fa fa-arrow-left arrow" aria-hidden="true"></i> Back</a>
        </div>

        <div class="gap20"></div>

        <div class="contain">
            <div ng-include="order_step2()">
                <!--Angular loading step 2-->
            </div>
        </div>

    </div>


    <!-- PHASE THREE STARTS HERE -->


    <div class="phase-three hide">

        <div class="gap60"></div>
        <div class="checkpoint-wrapper">
            <ul class="row" role="tablist">

                <li id='step-1' role="presentation" class="col s3 step-done">
                    <a href="#step1" title="Choose Type">
                        <span class="round-tab">
                                        <i class="material-icons check-icons">check</i>
                                        <span class="step-numeric">1</span>
                        </span>
                    </a>

                    <div class="connecting-line"></div>
                </li>


                <li id='step-2' role="presentation" class="col s3 step-done">
                    <a href="#step2" title="Choose Plan">
                        <span class="round-tab">
                                        <i class="material-icons check-icons">check</i>
                                        <span class="step-numeric">2</span>
                        </span>
                    </a>
                    <div class="connecting-line"></div>
                </li>

                <li id='step-3' role="presentation" class="col s3 active">
                    <a href="#step3" title="Content Details">
                        <span class="round-tab">
                                        <i class="material-icons check-icons">check</i>
                                        <span class="step-numeric">3</span>
                        </span>
                    </a>
                    <div class="connecting-line"></div>
                </li>
                <li id='step-4' role="presentation" class="col s3">
                    <a href="#step4" title="Order Confirmation">
                        <span class="round-tab">
                                        <i class="material-icons check-icons">check</i> 
                                        <span class="step-numeric">4</span>
                        </span>
                    </a>
                </li>


            </ul>
        </div>
        <div class="gap60"></div>

        <div class="back-button-to-phase-two">
            <a href="#" class="text-brand"><i class="fa fa-arrow-left arrow" aria-hidden="true"></i> Back</a>
        </div>

        <div class="gap20"></div>

        <div class="contain-three">
        <!--    PAGE 2 HELP SIGN-BOARD   START                 -->
            <div class="need-help">
                <div class="need-help-button modal-trigger hide-on-med-and-down" href="#help">
                    Need help <i class="fa fa-question" aria-hidden="true"></i> <br>
                    Schedule a free call!
                </div>
                <div id="smallhelp" class="need-help-button hide-on-large-only modal-trigger" href="#help">
                    <i class="fa fa-question" aria-hidden="true"></i>
                </div>
                <!-- Modal Structure -->
                <div id="help" class="modal">
                    <div class="modal-content">
                        <h5 class="center-align">How can we help you?</h5>
                        <div class="gap30"></div>
  
                        <div class="row">
                            <div class="col s12 m12 l6 border-right">
                                <span>Leave us a message below</span>
                                <form method="POST">
                                <div class="input-field col s12">
                                    <input type="text" name="name" id="call_name" class="validate"/>
                                    <label for="name">Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="email" class="validate" id="call_email"/>
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="call_number" class="validate" type="text"/>
                                    <label for="number">Phone No.</label>
                                </div>
                                <a id="callRequest" class="waves-effect waves-light btn">Send <b><i class="fa fa-angle-right" aria-hidden="true"></i></b></a>
                                </form>
                            </div>
                            <div class="col s12 m12 l6 center-align">
                                <div class="box-request">
                                    <span>Reach us below</span>
                                    <div class="gap20"></div>
                                    <p class="contact">
                                        <i class="fa fa-phone" aria-hidden="true"></i> +91-7600953553<br>
                                        <i class="fa fa-whatsapp" aria-hidden="true"></i> +91-7600953553 <br>
                                        <i class="fa fa-envelope" aria-hidden="true"></i> contact@whitepanda.in
                                    </p>
                                </div>
                            </div>
                        </div>
  
                    </div>
                </div>
            </div>
            
        

















            <!-- slider area starts, you better walk saftely :P -->

            <div class="content-description">
                <!-- page 1 content starts here -->
                <div class="spacing-extra">
                    <div class="heading">Choose your Content Description</div>
                    <div class="gap20"></div>
                    <h6 class="head-part">Title<sup class="star">*</sup></h6>
                    <input id='validate1' ng-model="orderDetails.topic" class="input-feild validate" type="text" name="content_type" placeholder="This will be displayed to the writer">
                    <!-- <label for="validate1" data-error="* Marked fields are mandatory"></label> -->
                    <h6 class="head-part">Industry<sup class="star">*</sup></h6>
                    <select id="validate2" ng-model="orderDetails.writer_specialization" name="area" class="browser-default validate">
                        <option value="" disabled selected>Select Industry</option>
                        <option value="Sports and Fitness">Sports &amp; Fitness</option>
                        <option value="Business">Business</option>
                        <option value="Art and Design">Art &amp; Design</option>
                        <option value="Food and Beverage">Food &amp; Beverage</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Healthcare and Sciences">Healthcare and Sciences</option>
                        <option value="Publishing and Journalism">Journalism &amp; Publishing</option>
                        <option value="Lifestyle and Travel">Lifestyle &amp; Travel</option>
                        <option value="Education">Education</option>
                        <option value="Software and Technology">Software and Technology</option>
                        <option value="Others">Others</option>
                    </select>
                    <!-- <label for="validate2" data-error="* Marked fields are mandatory"></label> -->
                    <div class="gap10"></div>
                    <h6 class="head-part">Keywords<sup class="star">*</sup></h6>
                    <input id="validate3" ng-model="orderDetails.keywords" class="input-feild validate" type="text" name="content_type" placeholder="Content Keywords">
                    <!-- <label for="validate3" data-error="* Marked fields are mandatory"></label> -->
                    <h6 class="head-part">Keypoints<sup class="star">*</sup></h6>
                    <input id="validate4" ng-model="orderDetails.keypoints" class="input-feild validate" type="text" name="content_type" placeholder="Key points the writer should focus on">
                    <!-- <label for="validate4" data-error="* Marked fields are mandatory"></label> -->
                    <h6 class="head-part">Sample Content</h6>
                    <input ng-model="orderDetails.sample" class="input-feild" type="text" name="content_type" placeholder="Reference links">
                    <h6 class="head-part">Attachments</h6>
                    <span class="attach-subtitle">Any data to be shared with the writer</span>
                    <!--<p>
                        <input ng-model="orderDetails.attachment" ng-value="'Yes'" type="radio" id="yes" />
                        <label for="yes">Yes</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input ng-model="orderDetails.attachment" ng-value="'No'" type="radio" id="no" />
                        <label for="no">No</label>
                    </p>-->
                    

                    
                    
                    
                    <div id="uploadbutton" class="row">
                        <input id="selectedFile" accept=".pdf,.doc,.docx" type="file" nv-file-select="" uploader="uploader" />

                        <label class="uploadLabel" for="selectedFile" ng-click="uploader.queue[0].remove()">
                              <a class="btn-floating btn-med waves-effect waves-light red"><i class="material-icons">add</i></a>  Add file
                        </label>

                    </div>
                    <div class="row uploadNav" ng-show="uploader.queue != ''">
                            <div class="col s4 truncate">
                                {{ uploader.queue[0].file.name }}
                            </div>
                            <div class="col s2">
                                {{ uploader.queue[0].file.size/1024/1024|number:2 }} MB
                            </div>
                            <div class="col s1">
                            
                                <span ng-show="uploader.queue[0].isSuccess"><i class="fa fa-check"></i></span>
                                <span ng-show="uploader.queue[0].isCancel"><i class="fa fa-ban"></i></span>
                                <span ng-show="uploader.queue[0].isError"><i class="fa fa-remove"></i></span>

                            </div>
                        
                            
                            <div class="col s5">
                                <div class="row">
                                    <div class="col s6">
                                        <button ng-hide='true'  type="button" class="btn brand" ng-disabled="uploader.queue[0].isReady || uploader.queue[0].isUploading || uploader.queue[0].isSuccess">
                                            <span class="fa fa-upload"></span> Upload
                                        </button>
                                    </div>
                                    
                                    <div class="col s6">
                                        <button ng-disabled="uploader.queue[0].isUploading || uploader.queue[0].isSuccess" type="button" class="btn brand" ng-click="uploader.queue[0].remove()">
                                            <span class="fa fa-trash"></span> Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                    <div class="gap10"></div>
                    <h6 class="head-part">Special Instruction</h6>
                    <input ng-model="orderDetails.instructions" class="input-feild" type="text" name="content_type" placeholder="Any additional instruction">
                    <div class="gap50"></div>
                    <div class="center"><button id="form-validation-one">Next <i class="fa fa-angle-right" aria-hidden="true"></i></button></div>
                </div>
            </div>
            <!-- page 1 content ends here -->

            <!-- page 2 content starts here -->
            <div class="form-phase-two">
                <div class="heading spacing-extra">Choose your Content Description</div>
                <div class="gap20"></div>
                <div class="row content-style">
                    <div class="col s12 m4 l4">
                        <p>
                            <input ng-click="templateCall('Casual')" name="template" type="radio" id="casual" class="templateSelected" />
                            <label for="casual">Casual</label>
                        </p>
                    </div>
                    <div class="col s12 m4 l4">
                        <p>
                            <input ng-click="templateCall('Formal')" name="template" type="radio" id="formal" class="templateSelected" />
                            <label for="formal">Formal</label>
                        </p>
                    </div>
                    <div class="col s12 m4 l4">
                        <p>
                            <input ng-click="templateCall('Custom')" name="template" type="radio" id="custom" />
                            <label for="custom">Custom</label>
                        </p>
                    </div>
                </div>

                <div class="gap20"></div>
                <div class="endline"></div>
                <div class="gap40"></div>

                <div class="spacing-extra">
                    <h6 class="head-part second">Goals</h6>
                    <div class="gap10"></div>
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <input ng-model="checkbox.goal.box1" ng-true-value="'Generate clicks / SEO'" ng-false-value="false" ng-checked="template.goal1" name="group1" type="checkbox" id="test1" />
                            <label for="test1">Generate Clicks/SEO</label>
                        </div>
                        <div class="col s12 m6 l6">
                            <input ng-model="checkbox.goal.box2" ng-true-value="'Anaylsis / In depth research'" ng-false-value="false" name="group1" type="checkbox" id="test2" />
                            <label for="test2">Anaylsis / In depth research</label>
                        </div>
                        <div class="col s12 m6 l6">
                            <input ng-model="checkbox.goal.box3" ng-true-value="'Thought leadership'" ng-false-value="false" ng-checked="template.goal3" name="group1" type="checkbox" id="test3" />
                            <label for="test3">Thought leadership</label>
                        </div>
                        <div class="col s12 m6 l6">
                            <input ng-model="checkbox.goal.box4" ng-true-value="'Educate / provide instructions'" ng-false-value="false" ng-checked="template.goal4" name="group1" type="checkbox" id="test4" />
                            <label for="test4">Educate / provide instructions</label>
                        </div>
                        <div class="col s12 m6 l6">
                            <input ng-model="checkbox.goal.box5" ng-true-value="'Promote Topic'" ng-false-value="false" name="group1" type="checkbox" id="test5" />
                            <label for="test5">Promote Topic</label>
                        </div>
                    </div>

                    <div class="gap20"></div>

                    <h6 class="head-part second">Images(Relevant stock photo with your content)</h6>
                    <div class="gap10"></div>
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <input ng-model="orderDetails.image_include" ng-value="'Yes'" name="group2" type="radio" id="testing1" />
                            <label for="testing1">Yes</label>
                        </div>
                        <div class="col s12 m6 l6">
                            <input ng-model="orderDetails.image_include" ng-value="'No'" ng-checked="template.imagedescription2" name="group2" type="radio" id="testing2" />
                            <label for="testing2">No</label>
                        </div>
                    </div>

                    <div class="gap20"></div>

                    <h6 class="head-part second">Style of Writing</h6>
                    <div class="gap10"></div>
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <input ng-model="checkbox.style_of_writing.box1" ng-true-value="'Authoritative / Informed'" ng-false-value="false" ng-checked="template.style_of_writing1" name="group3" type="checkbox" id="test31" />
                            <label for="test31">Athoritative/Informed</label>
                        </div>
                        <div class="col s12 m6 l6">
                            <input ng-model="checkbox.style_of_writing.box2" ng-true-value="'Serious / Formal'" ng-false-value="false" ng-checked="template.style_of_writing2" name="group3" type="checkbox" id="test32" />
                            <label for="test32">Serious / Formal</label>
                        </div>
                        <div class="col s12 m6 l6">
                            <input ng-model="checkbox.style_of_writing.box3" ng-true-value="'Advice / Instructional'" ng-false-value="false" ng-checked="template.style_of_writing3" name="group3" type="checkbox" id="test33" />
                            <label for="test33">Advice / Instructional</label>
                        </div>
                        <div class="col s12 m6 l6">
                            <input ng-model="checkbox.style_of_writing.box4" ng-true-value="'Viral / Catchy'" ng-false-value="false" name="group3" type="checkbox" id="test34" />
                            <label for="test34">Viral / Catchy</label>
                        </div>
                        <div class="col s12 m6 l6">
                            <input ng-model="checkbox.style_of_writing.box5" ng-true-value="'Casual / Conversational'" ng-false-value="false" ng-checked="template.style_of_writing5" name="group3" type="checkbox" id="test35" />
                            <label for="test35">Casual / Conversational</label>
                        </div>
                        <div class="col s12 m6 l6">
                            <input ng-model="checkbox.style_of_writing.box6" ng-true-value="'Satirical / Witty'" ng-false-value="false" name="group3" type="checkbox" id="test36" />
                            <label for="test36">Satirical / Witty</label>
                        </div>
                    </div>

                    <div class="gap20"></div>

                    <h6 class="head-part second">Point Of View</h6>
                    <div class="gap10"></div>
                    <div class="row">
                        <div class="col s12 m4 l4">
                            <input ng-model="orderDetails.point_view" ng-value="'1st person - I'" name="group4" type="radio" id="test41" />
                            <label for="test41">1st Person - I</label>
                        </div>
                        <div class="col s12 m4 l4">
                            <input ng-model="orderDetails.point_view" ng-value="'2nd person - you'" ng-checked="template.point_of_view2" name="group4" type="radio" id="test42" />
                            <label for="test42">2nd Person - I</label>
                        </div>
                        <div class="col s12 m4 l4">
                            <input ng-model="orderDetails.point_view" ng-value="'3rd person - she / he'" name="group4" type="radio" id="test43" />
                            <label for="test43">3rd Person - She/He</label>
                        </div>
                    </div>

                    <div class="gap20"></div>

                    <h6 class="head-part second">Content Structure</h6>
                    <div class="gap10"></div>
                    <div class="row">
                        <div class="col s12 m4 l4">
                            <input ng-model="checkbox.content_structure.box1" ng-true-value="'Paragraphs'" ng-false-value="false" ng-checked="template.content_structure1" name="group4" type="checkbox" id="test44" />
                            <label for="test44">Paragraphs</label>
                        </div>
                        <div class="col s12 m4 l4">
                            <input ng-model="checkbox.content_structure.box2" ng-true-value="'Subheads'" ng-false-value="false" ng-checked="template.content_structure2" name="group4" type="checkbox" id="test45" />
                            <label for="test45">Subheads</label>
                        </div>
                        <div class="col s12 m4 l4">
                            <input ng-model="checkbox.content_structure.box3" ng-true-value="'Lists'" ng-false-value="false" name="group4" type="checkbox" id="test46" />
                            <label for="test46">List</label>
                        </div>
                    </div>

                    <div class="gap10"></div>
                    <h6 class="head-part">Target Audience</h6>
                    <input ng-model="orderDetails.target_audience" value="{{template.target_audience}}" class="input-feild" type="text" name="content_type" placeholder="Who will your readers be?">

                    <div class="gap10"></div>
                    <h6 class="head-part">Things to Avoid</h6>
                    <input ng-model="orderDetails.avoid" class="input-feild" type="text" name="content_type" placeholder="For example - competitors ">

                    <div class="gap10"></div>
                    <h6 class="head-part">Link to Sources</h6>
                    <input ng-model="orderDetails.link_to_sources" class="input-feild" type="text" name="content_type" placeholder="Links to any research or data">

                    <div class="gap30"></div>

                    <input type="hidden" value="{{orderDetails.paygrade}}" />

                    <div class="div-to-final-phase" >
                        <button id="last-submit" class="button-to-final-phase">Submit</button>
                    </div>

                    <div class="gap40"></div>
                </div>
                <!-- page 2 content ends here -->
            </div>

        </div>  
    </div>


































































    <!-- PHASE FOUR STARTS HERE -->

    <div class="phase-four hide">

        <div class="gap60"></div>
        <div class="checkpoint-wrapper">
            <ul class="row" role="tablist">

                <li id='step-1' role="presentation" class="col s3 step-done">
                    <a href="#step1" title="Choose Type">
                        <span class="round-tab">
                                        <i class="material-icons check-icons">check</i>
                                        <span class="step-numeric">1</span>
                        </span>
                    </a>

                    <div class="connecting-line"></div>
                </li>


                <li id='step-2' role="presentation" class="col s3 step-done">
                    <a href="#step2" title="Choose Plan">
                        <span class="round-tab">
                                        <i class="material-icons check-icons">check</i>
                                        <span class="step-numeric">2</span>
                        </span>
                    </a>
                    <div class="connecting-line"></div>
                </li>

                <li id='step-3' role="presentation" class="col s3 step-done">
                    <a href="#step3" title="Content Details">
                        <span class="round-tab">
                                        <i class="material-icons check-icons">check</i>
                                        <span class="step-numeric">3</span>
                        </span>
                    </a>
                    <div class="connecting-line"></div>
                </li>
                <li id='step-4' role="presentation" class="col s3 active">
                    <a href="#step4" title="Order Confirmation">
                        <span class="round-tab">
                                        <i class="material-icons check-icons">check</i> 
                                        <span class="step-numeric">4</span>
                        </span>
                    </a>
                </li>


            </ul>
        </div>
        <div class="gap60"></div>


        <div class="back-button-to-phase-three">
            <a href="#" class="text-brand"><i class="fa fa-arrow-left arrow" aria-hidden="true"></i> Back</a>
        </div>

        <div class="gap20"></div>


        <div class="row">
            <div class="col s12 m10 l8 offset-m1 offset-l2 paymentinfo">
                <h5>Order confirmation </h5>
                <br/>


                <table class='table' style="border:none;">

                    <tr>
                        <td>Name:
                            <?php echo $userDetails['Business']['firstname']. " ".$userDetails['Business']['lastname']; ?>
                        </td>
                        <td>

                        </td>
                    </tr>

                    <tr>
                        <td>Email:
                            <?php echo $activeUser['User']['username']; ?>
                        </td>
                        <td>

                        </td>
                    </tr>

                    <tr>

                        <td>Phone: &nbsp;
                            <?php echo $userDetails['Business']['mobile']; ?>

                        </td>
                    </tr>



                </table>
                <form id="pgForm" role="form" action="../Businesses/paymentGateway" method="post" name="payuForm">

                    <input type="hidden" name="txnid" id="mysaltmerchantTxId" value="<?php echo $txnID; ?>" />
                    <input type="hidden" name="amount" id="firstname" ng-value="orderDetails.amount" />
                    <input type="hidden" name="firstname" id="firstname" value="<?php echo $userDetails['Business']['firstname']. ' '.$userDetails['Business']['lastname']; ?>" />
                    <input type="hidden" name="email" id="email" value="<?php echo $activeUser['User']['username']; ?>" />
                    <input type='hidden' name="phone" value="<?php echo $userDetails['Business']['mobile']; ?>" />
                    <input type='hidden' name="productinfo" value="Content Order" />
                    <button id="pgExecuteButton" type="submit" class="btn btn-default" style="display:none">Submit</button>

                </form>

                <span ng-init="myTxnID = '<?php echo $txnID; ?>'"></span>
                <span ng-init="orderDetails.txnid = '<?php echo $txnID; ?>'"></span>
                
                <div class="gap40"></div>

                <div class="pay-button">
                    <button ng-click="orderPayment()" type="button" class="right btn btn-primary btn-info-full brand">Pay now</button>
                </div>

            </div>
        </div>
        <div class="gap60"></div>


    </div>




<?php       
    echo $this->Html->script('business/script.js');
?>