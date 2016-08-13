<?php

    echo $this->Html->css('writer/jobdetails_format');
    echo $this->fetch('css');
    
?>

    <!-- some gap for heading part -->

    <div class="gap40"></div>

    <!-- heading of right side starts -->

    <div class="row">
        <div class="col s12 m12 l8 offset-l3 edit-search">
            <input type="text" placeholder="search" name="search"><i class="fa fa-search" aria-hidden="true"></i>
        </div>

    </div>

    <!-- gap for below section -->

    <div class="gap10"></div>

    <div class="row">
        <div class="col s12 m12 l3">
            <div class="actions search-catagorywise">
                <div class="input-field col s12">
                    <select>
                        <option value="" disabled selected>Topics</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>

                <div class="gap20"></div>

                <div class="input-field col s12">
                    <select>
                        <option value="" disabled selected>Type</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>

                <div class="gap20"></div>

                <div class="input-field col s12">
                    <select>
                        <option value="" disabled selected>Stipend</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l8">
            <div class="job-details">

                <div class="row">
                    <div class="col s8 m10 l10 heading">{{job_detail_list[selected_job_topic].topic}}<span class="gold-text"> ({{job_detail_list[selected_job_topic].paygrade}})</span></div>
                    <div class="col s4 m2 l2 right align-right"><a class="text-brand" href="#" ng-click="jobsearch()">Go Back</a></div>
                </div>
                <!-- 	<div class="gap10 gold"></div> -->
                <div class="row spacing">
                    <div class="col s12 m12 l3">
                        <b>Category</b>
                        <br> {{job_detail_list[selected_job_topic].content_quality}}
                    </div>
                    <div class="gap20 hide-on-med-and-up"></div>
                    <div class="col s12 m12 l3">
                        <b>Industry of Experience</b>
                        <br> {{job_detail_list[selected_job_topic].writer_specialization}}
                    </div>
                    <div class="gap20 hide-on-med-and-up"></div>
                    <div class="col s12 m12 l3">
                        <b>No. of Post</b>
                        <br> 1
                    </div>
                    <div class="gap20 hide-on-med-and-up"></div>
                    <div class="col s12 m12 l3">
                        <b>Stipend</b>
                        <br> {{jobStipendArray[job_detail_list[selected_job_topic].id]}} ₹
                    </div>
                </div>
                <div class="seperator"></div>
                <div class="gap20"></div>


                <h6 class="head-part">Goal</h6>
                <span class="body-part">{{job_detail_list[selected_job_topic].goal}}</span>

                <div class="gap20"></div>

                <h6 class="head-part">Style of Writing</h6>
                <span class="body-part">{{fieldEmptyCheck(job_detail_list[selected_job_topic].style_of_writing)}}</span>

                <div class="gap20"></div>

                <div class="row margin-fix">
                    <div class="col s12 m6 l4">
                        <h6 class="head-part">Point of View</h6>
                        <span class="body-part">{{fieldEmptyCheck(job_detail_list[selected_job_topic].point_view)}}</span>
                    </div>
                    <div class="col s12 m6 l4">
                        <h6 class="head-part">Content Structure</h6>
                        <span class="body-part">{{fieldEmptyCheck(job_detail_list[selected_job_topic].content_structure)}}</span>
                    </div>
                </div>
                
                <div class="gap20"></div>

                <h6 class="head-part">Keywords</h6>
                <span class="body-part">{{fieldEmptyCheck(job_detail_list[selected_job_topic].keywords)}}</span>

                <div class="gap20"></div>

                <h6 class="head-part">Target Audience</h6>
                <span class="body-part">{{fieldEmptyCheck(job_detail_list[selected_job_topic].target_audience)}}</span>

                <div class="gap20"></div>

                <h6 class="head-part">Key Points</h6>
                <ul>
                    <li class="wp-ullist body-part">{{fieldEmptyCheck(job_detail_list[selected_job_topic].keypoints)}}.</li>
                </ul>

                <div class="gap20"></div>

                <h6 class="head-part">Style of writing</h6>
                <span class="body-part weight" style="color:#11a339">{{fieldEmptyCheck(job_detail_list[selected_job_topic].style_of_writing)}}.</span>

                <div class="gap20"></div>

                <h6 class="head-part">Things to Avoid<sup class="golden-text">*</sup></h6>
                <span class="body-part">{{fieldEmptyCheck(job_detail_list[selected_job_topic].avoid)}}</span>

                <div class="gap20"></div>

                <h6 class="head-part">Special Instruction<sup class="golden-text">*</sup></h6>
                <span class="body-part">{{fieldEmptyCheck(job_detail_list[selected_job_topic].instructions)}}</span>

                <div class="gap20"></div>

                <h6 class="head-part">Sample Content</h6>
                <a href="" class="text-brand">{{fieldEmptyCheck(job_detail_list[selected_job_topic].sample)}}</a>

                <div class="gap40"></div>

                <div class="claim-button">
                    <button ng-click="claimProject(job_detail_list[selected_job_topic].id,  job_detail_list[selected_job_topic].paygrade, job_detail_list[selected_job_topic].writer_specialization)" class="claim-project">Claim Project</button>
                </div>
                <div class="gap40"></div>

            </div>
        </div>
    </div>



<script>
    $(document).ready( function(){
        $('select').material_select();
    });
</script>