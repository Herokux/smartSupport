<?php

    echo $this->Html->css('business/ratingbar');
    echo $this->Html->css('business/jobdetails_format');
    echo $this->Html->css('business/received_files');
    echo $this->fetch('css');
    
    date_default_timezone_set("Asia/Calcutta");
    $currentDate = date("Y-m-d H:i:s");

?>


    <div class="gap20"></div>
    <h5 class="center heading">Received Files</h5>
    <div class="gap20"></div>

    <div id="received_order_list" class="contain">

        <div class="row">
            <div class="col s12 m12 l6 gap-fix" ng-repeat="receivedList in receivedOrderDetails">
                <div class="job-cards">
                    <div class="left left-side">
                        <div class="job-card-paygrade bronze">
                            <!-- mention the color here-->
                            {{receivedList.paygrade}}
                        </div>
                    </div>
                    <div class="right job-card-content">
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <h5 class="edit-article">{{receivedList.content_quality}}</h5>
                                <button ng-click="selectedReceivedItemDescription($index)" class="right fixing-button">View</button>
                            </div>
                            <div class="col s12 m12 l12 margin-extra">
                                <div class="row margin-fix">
                                    <div class="col s6 m6 l6">
                                        Topic
                                        <br> {{receivedList.topic}}
                                    </div>
                                    <div class="col s6 m6 l6">
                                        Skills
                                        <br> {{receivedList.writer_specialization}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div ng-show="receivedOrderDetails.length == 0" class="center-align">
            <h1 id='noProj' style="font-size: 8em;"><i class="fa fa-inbox" ></i></h1>
            <h4 id='noProj'>No files received</h4>
        </div>
    </div>

























    <div id="received_order_info">

        <div class="row">

            <div class="col s12 m10 l8 offset-m1 offset-l2">
                <div class="box-content">
                    <h5>
                        You content has been received!  <a class="content-show-button right" href="{{'../Businesses/viewUploadedFiles/' + receivedOrderFilename[receivedOrderDetails[receivedOrderIndex].id].order_id + '/'+ receivedOrderFilename[receivedOrderDetails[receivedOrderIndex].id].filename}}" target="_blank">View Content</a>
                    </h5>
                    <h6 ng-show="OrderStatus[receivedOrderDetails[receivedOrderIndex].id].content_status == 'Delivered'">Your revision period is exteded till {{revisionDeadline(receivedOrderFilename[receivedOrderDetails[receivedOrderIndex].id].date_uploaded, 72)}}. Your content will be marked as completed after the deadline.</h6>
                    <!-- <h6>Your revision period is exteded till {{revisionDeadline( , 72)}}. Your content will be marked as completed after the deadline.</h6> -->

                    <h6 ng-show="OrderStatus[receivedOrderDetails[receivedOrderIndex].id].content_status == 'Approved'">Your content has been approved</h6>

                    <h6 ng-show="OrderStatus[receivedOrderDetails[receivedOrderIndex].id].content_status == 'RevisionRequest'">You have applied for content revision</h6>

                    <br>
                    <div class="row">    
                        <div class="col s12 clientReview">

                            <div class="col s6 tab">
                                <input ng-checked="OrderStatus[receivedOrderDetails[receivedOrderIndex].id].content_status == 'Approved'" ng-disabled="OrderStatus[receivedOrderDetails[receivedOrderIndex].id].content_status == 'RevisionRequest' || OrderStatus[receivedOrderDetails[receivedOrderIndex].id].content_status == 'Approved'" class="with-gap" name="clientReview" type="radio" id="clientReview1" />
                                <label class="col-md-6" for="clientReview1">Approve Content </label>
                            </div>

                            <div class="col s6 tab">
                                <input ng-disabled="OrderStatus[receivedOrderDetails[receivedOrderIndex].id].content_status == 'RevisionRequest' || OrderStatus[receivedOrderDetails[receivedOrderIndex].id].content_status == 'Approved'" class="with-gap" name="clientReview" type="radio" id="clientReview2" />
                                <label class="col-md-6" for="clientReview2">Ask for review </label>
                            </div>

                            <div class="gap20"></div>

                            <div class="row">
                                


                                <div id="revisionRequest" class="col s12">
                                    <h4>List the changes expected from us.</h4>
                                    <textarea class="form-control" rows="5" ng-model="correctionPoints[$index]"></textarea>
                                    <div class="gap20"></div>
                                    <button ng-click="askingCorrection($index, receivedOrderDetails[receivedOrderIndex].id)" type="button" class="similar-button">Submit</button>
                                </div>






                                <div id="contentApprove" class="col s12">
                                    <div class="gap10"></div>
                                    <h5>Are you sure you want to approve the content?</h5>
                                    <button ng-disabled="receivedList.id == optionDisableID" ng-click="clientApproveContent(receivedOrderDetails[receivedOrderIndex].id, receivedOrderFilename[receivedOrderDetails[receivedOrderIndex].id].claimed_id)" style="width:150px" type="button" class="similar-button top-fix" id='writerReject'>Approve</button>
                                    
                                </div>
                               
                                <div ng-show="OrderRatings[receivedOrderDetails[receivedOrderIndex].id] == null" id="ratingtab" class="col s12">
                                    <div class="gap20"></div>      
                                    <input id="ratingOrderID" type="hidden" value="{{receivedOrderDetails[receivedOrderIndex].id}}"/>
                                    
                                    <input id="ratingClaimedID" type="hidden" value="{{receivedOrderFilename[receivedOrderDetails[receivedOrderIndex].id].claimed_id}}"/>

                                    <h6>How would you like to rate the writer?</h6>
                                    <div class="gap5"></div>
                                    <select id="ratingbar" class="browser-default">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col s12 clientReviewOver"></div>                    
                    </div>
                </div>
            </div>









            <div class="col s12 m10 l8 offset-m1 offset-l2">
                <div class="job-details">

                    <div class="row">
                        <div class="col s8 m10 l10 heading">{{receivedOrderDetails[receivedOrderIndex].topic}}<span class="gold-text"> ({{receivedOrderDetails[receivedOrderIndex].paygrade}})</span></div>
                        <div class="col s4 m2 l2 right align-right"><a class="text-brand" href="#" id="goback_receivedOrders">Go Back</a></div>
                    </div>
                    <div class="gap10"></div>
                    <div class="row spacing">
                        <div class="col s12 m12 l4">
                            <b>Category</b>
                            <br> {{receivedOrderDetails[receivedOrderIndex].content_quality}}
                        </div>
                        <div class="gap20 hide-on-med-and-up"></div>
                        <div class="col s12 m12 l4">
                            <b>Industry of Experience</b>
                            <br> {{receivedOrderDetails[receivedOrderIndex].writer_specialization}}
                        </div>
                        <div class="gap20 hide-on-med-and-up"></div>
                        <div class="col s12 m12 l4">
                            <b>No. of Post</b>
                            <br> 1
                        </div>
                        <div class="gap20 hide-on-med-and-up"></div>
                    </div>
                    <div class="seperator"></div>
                    <div class="gap20"></div>


                    <h6 class="head-part">Goal</h6>
                    <span class="body-part">{{fieldEmptyCheck(receivedOrderDetails[receivedOrderIndex].goal)}}</span>

                    <div class="gap20"></div>

                    <h6 class="head-part">Style of Writing</h6>
                    <span class="body-part">{{fieldEmptyCheck(receivedOrderDetails[receivedOrderIndex].style_of_writing)}}</span>

                    <div class="gap20"></div>

                    <div class="row margin-fix">
                        <div class="col s12 m6 l4">
                            <h6 class="head-part">Point of View</h6>
                            <span class="body-part">{{fieldEmptyCheck(receivedOrderDetails[receivedOrderIndex].point_view)}}</span>
                        </div>
                        <div class="col s12 m6 l4">
                            <h6 class="head-part">Content Structure</h6>
                            <span class="body-part">{{fieldEmptyCheck(receivedOrderDetails[receivedOrderIndex].content_structure)}}</span>
                        </div>
                    </div>

                    <div class="gap20"></div>

                    <h6 class="head-part">Keywords</h6>
                    <span class="body-part">{{fieldEmptyCheck(receivedOrderDetails[receivedOrderIndex].keywords)}}</span>
                    <div class="gap20"></div>

                    <h6 class="head-part">Target Audience</h6>
                    <span class="body-part">{{fieldEmptyCheck(receivedOrderDetails[receivedOrderIndex].target_audience)}}</span>

                    <div class="gap20"></div>

                    <h6 class="head-part">Key Points</h6>
                    <ul>
                        <li class="wp-ullist body-part">{{fieldEmptyCheck(receivedOrderDetails[receivedOrderIndex][selected_job_topic].keypoints)}}.</li>
                        <li class="wp-ullist body-part">Lorem ipsum dolor sit amet consectetur.</li>
                    </ul>

                    <div class="gap20"></div>

                    <h6 class="head-part">Key Points</h6>
                    <span class="body-part weight" style="color:#11a339">{{fieldEmptyCheck(receivedOrderDetails[receivedOrderIndex].keypoints)}}</span>

                    <div class="gap20"></div>

                    <h6 class="head-part">Things to Avoid<sup class="golden-text">*</sup></h6>
                    <span class="body-part">{{fieldEmptyCheck(receivedOrderDetails[receivedOrderIndex].keywords)}}</span>

                    <div class="gap20"></div>

                    <h6 class="head-part">Special Instruction<sup class="golden-text">*</sup></h6>
                    <span class="body-part">{{fieldEmptyCheck(receivedOrderDetails[receivedOrderIndex].instructions)}}</span>

                    <div class="gap20"></div>

                    <h6 class="head-part">Sample Content</h6>
                    <a href="" class="text-brand">{{fieldEmptyCheck(receivedOrderDetails[receivedOrderIndex].sample)}}</a>

                    <div class="gap40"></div>


                </div>
            </div>
        </div>

    </div>


<?php       
    echo $this->Html->script('business/ratingbar.js');
    echo $this->Html->script('business/ratingUpdateQuery.js');
    echo $this->Html->script('business/script.js');
?>