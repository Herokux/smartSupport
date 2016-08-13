<?php
    echo $this->Html->css('business/jobdetails_format');
    echo $this->Html->css('business/my-recent-order');
    echo $this->fetch('css');
?>
    <div class="gap40"></div>
    <h5 id="myxxx" class="center heading">Your Orders</h5>
    <div class="gap40"></div>

    <div id="order_list" class="contain">
        <table ng-hide="myOrderDetails.length==0">
            <thead>
                <tr>
                    <th data-field="id">Transaction ID</th>
                    <th class="hide-on-small-only" data-field="name">Date</th>
                    <th class="hide-on-med-and-down" data-field="price">Category</th>
                    <th class="hide-on-med-and-down" data-field="price">Amount</th>
                    <th data-field="price">Details</th>
                    <th data-field="price">Status</th>
                </tr>
            </thead>

            <tbody ng-repeat="x in myOrders">
                <tr>
                    <td>{{x.txnid}}</td>
                    <td class="hide-on-small-only">{{x.ordered_date}}</td>
                    <td class="hide-on-med-and-down">{{myOrderDetails[$index].content_quality}}</td>
                    <td class="hide-on-med-and-down">{{myOrderDetails[$index].paygrade}}</td>
                    <td>
                        <button type="button" ng-click="selectedItemDescription($index)" class="button-green">Check</button>
                    </td>
                    <td>
                        <button type="button" ng-click="itemStatus($index, x.id)" class="button-grey status-view">View</button>
                    </td>
                </tr>


                <tr id="{{'progress' + x.id}}" class="show-progress">
                    <td colspan="6">
                        <div class="checkpoint-wrapper status-bar inside">
                            <ul class="row" role="tablist">

                                <li id='step-1' role="presentation" class="col s2 offset-s1 step-done">
                                    <a href="#step1" title="Choose Type">
                                        <span class="round-tab">
                                            <i class="material-icons check-icons">check</i>
                                            <span class="step-numeric">1</span>
                                        </span>
                                    </a>

                                    <div class="connecting-line"></div>
                                    <br>
                                    <div style="padding-top:7px" class="white-text">Job is Live</div>
                                </li>


                                <li id='step-2' role="presentation" class="col s2" ng-class="{'step-done': myOrders[itemIndex].content_status != 'NotClaimed', 'active': myOrders[itemIndex].content_status == 'NotClaimed'}">
                                    <a href="#step2" title="Choose Plan">
                                        <span class="round-tab">
                                            <i class="material-icons check-icons">check</i>
                                            <span class="step-numeric">2</span>
                                        </span>
                                    </a>
                                    <div class="connecting-line"></div>
                                    <br>
                                    <div style="padding-top:7px" class="white-text">Job Claimed</div>
                                </li>

                                <li id='step-3' role="presentation" class="col s2" ng-class="{'step-done': myOrders[itemIndex].content_status=='EditorReview' || myOrders[itemIndex].content_status=='RevisionRequest' || myOrders[itemIndex].content_status=='Delivered' || myOrders[itemIndex].content_status=='Uploaded' || myOrders[itemIndex].content_status=='WriterRejected' || myOrders[itemIndex].content_status=='Approved', 'active': myOrders[itemIndex].content_status == 'Claimed'}">
                                    <a href="#step3" title="Content Details">
                                        <span class="round-tab">
                                            <i class="material-icons check-icons">check</i>
                                            <span class="step-numeric">3</span>
                                        </span>
                                    </a>
                                    <div class="connecting-line"></div>
                                    <br>
                                    <div style="padding-top:7px" class="white-text">Content Uploaded</div>
                                </li>

                                <li id='step-4' role="presentation" class="col s2" ng-class="{'step-done': myOrders[itemIndex].content_status=='EditorReview' || myOrders[itemIndex].content_status=='RevisionRequest' || myOrders[itemIndex].content_status=='Delivered' || myOrders[itemIndex].content_status=='Approved', 'active': myOrders[itemIndex].content_status == 'Uploaded' || myOrders[itemIndex].content_status == 'WriterRejected'}">
                                    <a href="#step3" title="Content Details">
                                        <span class="round-tab">
                                            <i class="material-icons check-icons">check</i>
                                            <span class="step-numeric">3</span>
                                        </span>
                                    </a>
                                    <div class="connecting-line"></div>
                                    <br>
                                    <div style="padding-top:7px" class="white-text">Under Review</div>
                                </li>
                                <li id='step-5' role="presentation" class="col s2" ng-class="{'step-done': myOrders[itemIndex].content_status=='Delivered' || myOrders[itemIndex].content_status=='Approved', 'active': myOrders[itemIndex].content_status == 'RevisionRequest' || myOrders[itemIndex].content_status == 'EditorReview'}">
                                    <a href="#step4" title="Order Confirmation">
                                        <span class="round-tab">
                                            <i class="material-icons check-icons">check</i> 
                                            <span class="step-numeric">4</span>
                                        </span>
                                    </a>
                                    <br>
                                    <div style="padding-top:20px;" class="white-text">Job Completed</div>
                                </li>


                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>



    <div id="order_info" class="row">
        
        <a ng-show="order_view_mode" ng-click="orderEditMode()" class="btn-floating btn-large waves-effect waves-light red order-edit"><i class="material-icons">mode_edit</i></a>
        
        <a ng-show="order_edit_mode" ng-click="orderEditDone(orderIndex)" class="btn-floating btn-large waves-effect waves-light green order-edit"><i class="material-icons">done</i></a>

        
        
        <div class="col s12 m10 l8 offset-m1 offset-l2">
            <div class="job-details">

                <div class="row">
                    <div class="col s8 m10 l10 heading">
                        <input ng-show="order_edit_mode" ng-model="myOrderDetails[orderIndex].topic"  placeholder="Topic"  type="text" class="validate order-edit-input">
                        <span ng-show="order_view_mode" class="view-mode">{{myOrderDetails[orderIndex].topic}}</span>
                        <span class="order-details-tag {{myOrderDetails[orderIndex].paygrade}}"> ({{myOrderDetails[orderIndex].paygrade}})</span></div>
                    
                    
                    <div class="col s4 m2 l2 right align-right">
                        <a class="text-brand" href="#" id="goback_recentOrders">Go Back</a>
                    </div>
                </div>
                <div class="row spacing">
                    <div class="col s12 m12 l4">
                        <b>Category</b>
                        <br> {{myOrderDetails[orderIndex].content_quality}}
                    </div>
                    <div class="gap20 hide-on-med-and-up"></div>
                    <div class="col s12 m12 l4">
                        <b>Industry</b>
                        <br> {{myOrderDetails[orderIndex].writer_specialization}}
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
                
                <h6 class="head-part">Delivery Time</h6>
                <span class="body-part">Within {{fieldEmptyCheck(myOrderDetails[orderIndex].delivery_time)}}</span>
                
                <div class="gap20"></div>


                <h6 class="head-part">Goal</h6>
                <span class="body-part">{{fieldEmptyCheck(myOrderDetails[orderIndex].goal)}}</span>

                <div class="gap20"></div>

                <h6 class="head-part">Style of Writing</h6>
                <span class="body-part">{{fieldEmptyCheck(myOrderDetails[orderIndex].style_of_writing)}}</span>

                <div class="gap20"></div>

                <div class="row margin-fix">
                    <div class="col s12 m6 l4">
                        <h6 class="head-part">Point of View</h6>
                        <span class="body-part">{{fieldEmptyCheck(myOrderDetails[orderIndex].point_view)}}</span>
                    </div>
                    <div class="col s12 m6 l4">
                        <h6 class="head-part">Content Structure</h6>
                        <span class="body-part">{{fieldEmptyCheck(myOrderDetails[orderIndex].content_structure)}}</span>
                    </div>
                </div>


                <div class="gap20"></div>

                <h6 class="head-part">Keywords</h6>
                <input ng-show="order_edit_mode" ng-model="myOrderDetails[orderIndex].keywords"  placeholder="Keywords"  type="text" class="validate order-edit-input">
                <span ng-show="order_view_mode" class="body-part">{{fieldEmptyCheck(myOrderDetails[orderIndex].keywords)}}</span>



                <div class="gap20"></div>

                <h6 class="head-part">Target Audience</h6>
                <input ng-show="order_edit_mode" ng-model="myOrderDetails[orderIndex].target_audience"  placeholder="Target Audience"  type="text" class="validate order-edit-input">
                <span ng-show="order_view_mode" class="body-part">{{fieldEmptyCheck(myOrderDetails[orderIndex].target_audience)}}</span>

                <div class="gap20"></div>

                <h6 class="head-part">Keypoints</h6>
                <ul>
                    <li class="wp-ullist body-part">
                        <input ng-show="order_edit_mode" ng-model="myOrderDetails[orderIndex].keypoints"  placeholder="Topic"  type="text" class="validate order-edit-input">
                        <span ng-show="order_view_mode" class="view-mode">
                            {{fieldEmptyCheck(myOrderDetails[orderIndex].keypoints)}}
                        </span>
                    </li>
<!--                    <li class="wp-ullist body-part">Lorem ipsum dolor sit amet consectetur.</li>-->
                </ul>

                <div class="gap20"></div>

                <h6 class="head-part">Keywords</h6>
                <input ng-show="order_edit_mode" ng-model="myOrderDetails[orderIndex].keywords"  placeholder="Topic"  type="text" class="validate order-edit-input">
                <span ng-show="order_view_mode" class="body-part weight" style="color:#11a339">{{fieldEmptyCheck(myOrderDetails[orderIndex].keywords)}}</span>

                <div class="gap20"></div>

                <h6 class="head-part">Things to Avoid<sup class="golden-text">*</sup></h6>
                <input ng-show="order_edit_mode" ng-model="myOrderDetails[orderIndex].avoid"  placeholder="Topic"  type="text" class="validate order-edit-input">
                <span ng-show="order_view_mode" class="body-part">{{fieldEmptyCheck(myOrderDetails[orderIndex].avoid)}}</span>

                <div class="gap20"></div>

                <h6 class="head-part">Special Instructions<sup class="golden-text">*</sup></h6>
                <input ng-show="order_edit_mode" ng-model="myOrderDetails[orderIndex].instructions"  placeholder="Topic"  type="text" class="validate order-edit-input">
                <span ng-show="order_view_mode" class="body-part">{{fieldEmptyCheck(myOrderDetails[orderIndex].instructions)}}</span>
                
                <div class="gap20"></div>

                <h6 class="head-part">Attachment</h6>
                <a ng-show="myOrderDetails[orderIndex].attachment != 'none'" target="_blank" href="{{'../Businesses/clientAttachments/' + myOrders[orderIndex].txnid + '/' + myOrderDetails[orderIndex].attachment}}" class="btn btn">View</a>
                <span ng-show="myOrderDetails[orderIndex].attachment == 'none'" class="body-part">None</span>
                
                <div class="gap20"></div>

                <h6 class="head-part">Sample Content</h6>
                <input ng-show="order_edit_mode" ng-model="myOrderDetails[orderIndex].sample"  placeholder="Topic"  type="text" class="validate order-edit-input">
                <a ng-show="order_view_mode" href="" class="text-brand">{{fieldEmptyCheck(myOrderDetails[orderIndex].sample)}}</a>
                
                
                <div class="gap20"></div>

                <h6 class="head-part">Links to sources</h6>
                <input ng-show="order_edit_mode" ng-model="myOrderDetails[orderIndex].link_to_sources"  placeholder="Topic"  type="text" class="validate order-edit-input">
                <a ng-show="order_view_mode" target="_blank" href="{{myOrderDetails[orderIndex].link_to_sources}}" class="text-brand">{{fieldEmptyCheck(myOrderDetails[orderIndex].link_to_sources)}}</a>
                
                
                
                <div class="gap40"></div>


            </div>
        </div>
    </div>


    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>-->

    <?php       
    echo $this->Html->script('business/script.js');
?>