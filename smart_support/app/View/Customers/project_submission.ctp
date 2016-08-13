<?php

    echo $this->Html->css('business/jobdetails_format');
    echo $this->Html->css('writer/project_submission');
    echo $this->fetch('css');
    
?>

    <!-- some gap for heading part -->

    <div class="gap40"></div>
    <h5 class="center heading">Claimed Projects</h5>

    <div class="gap20"></div>

    <div class="row">
        <div class="col s12 m10 l8 offset-m1 offset-l2">
            <div class="job-details">

                <div class="row">
                    <div class="col s8 m10 l10 heading">{{job_detail_list.topic}}<span class="gold-text"> ({{job_detail_list.paygrade}})</span></div>
                    <div class="col s4 m2 l2 right align-right"><a class="text-brand" href="#" ng-click="claimedProjects()">Go Back</a></div>
                </div>
                <!-- 	<div class="gap10 gold"></div> -->
                <div class="row spacing">
                    <div class="col s12 m12 l3">
                        <b>Category</b>
                        <br> {{job_detail_list.content_quality}}
                    </div>
                    <div class="gap20 hide-on-med-and-up"></div>
                    <div class="col s12 m12 l3">
                        <b>Industry of Experience</b>
                        <br> {{job_detail_list.writer_specialization}}
                    </div>
                    <div class="gap20 hide-on-med-and-up"></div>
                    <div class="col s12 m12 l3">
                        <b>No. of Post</b>
                        <br> 1
                    </div>
                    <div class="gap20 hide-on-med-and-up"></div>
                    <div class="col s12 m12 l3">
                        <b>Stipend</b>
                        <br> {{job_detail_list.stipend}} ₹
                    </div>
                </div>
                <div class="seperator"></div>
                <div class="gap20"></div>


                <h6 class="head-part">Goal</h6>
                <span class="body-part">{{fieldEmptyCheck(job_detail_list.goal)}}</span>

                <div class="gap20"></div>

                <h6 class="head-part">Style of Writing</h6>
                <span class="body-part">{{fieldEmptyCheck(job_detail_list.style_of_writing)}}</span>

                <div class="gap20"></div>

                <div class="row margin-fix">
                    <div class="col s12 m6 l4">
                        <h6 class="head-part">Point of View</h6>
                        <span class="body-part">{{fieldEmptyCheck(job_detail_list.point_view)}}</span>
                    </div>
                    <div class="col s12 m6 l4">
                        <h6 class="head-part">Content Structure</h6>
                        <span class="body-part">{{fieldEmptyCheck(job_detail_list.content_structure)}}</span>
                    </div>
                </div>

                <div class="gap20"></div>

                <h6 class="head-part">Target Audience</h6>
                <span class="body-part">{{fieldEmptyCheck(job_detail_list.target_audience)}}</span>

                <div class="gap20"></div>

                <h6 class="head-part">Key Points</h6>
                <ul>
                    <li class="wp-ullist body-part">{{fieldEmptyCheck(job_detail_list[selected_job_topic].keypoints)}}.</li>
                </ul>

                <div class="gap20"></div>

                <h6 class="head-part">Key Points</h6>
                <span class="body-part weight" style="color:#11a339">{{fieldEmptyCheck(job_detail_list.keypoints)}}</span>

                <div class="gap20"></div>

                <h6 class="head-part">Things to Avoid<sup class="golden-text">*</sup></h6>
                <span class="body-part">{{fieldEmptyCheck(job_detail_list.keywords)}}</span>

                <div class="gap20"></div>

                <h6 class="head-part">Special Instruction<sup class="golden-text">*</sup></h6>
                <span class="body-part">{{fieldEmptyCheck(job_detail_list.instructions)}}</span>

                <div class="gap20"></div>

                <h6 class="head-part">Sample Content</h6>
                <a href="" class="text-brand">{{fieldEmptyCheck(job_detail_list.sample)}}</a>

                <div class="gap40"></div>


            </div>
        </div>
    </div>

    <div class="gap20"></div>
    <div class="container-alert">
        <div class="row text-center">

            <div class="alert alert-warning box-alert" ng-show="job_status.current_status == 'Claimed'">
                <strong class="fa fa-warning"></strong>&nbsp; &nbsp; Please upload your file in PDF format before {{projectDeadline}} to avoid defaulting in this project.
            </div>

            <div class="alert alert-info box-alert" ng-show="job_status.current_status == 'Uploaded'">
                <strong class="fa fa-warning"></strong>&nbsp; &nbsp; You have already uploaded a file. You can re-upload to replace your previous file.
            </div>

            <div id="correction" class="box-alert" ng-show="job_status.current_status == 'Correction'">
                <div class="alert alert-warning">
                    <strong class="fa fa-warning"></strong>&nbsp; &nbsp; Your uploaded file needs some correction. Please upload the required content before {{projectDeadline}} to avoid rejection.
                </div>
                <div class="gap10"></div>
                <div class="w3-card-4 card-small">
                    <h6>Required changes</h6>
                    <h6 ng-init="writer_corrections = (writer_corrections.correction_guidelines).split('\n')"></h6>
                    <h6 ng-init="writer_corrections_size =writer_corrections.length"></h6>

                    <ul id="correction-list">
                        <li ng-repeat='points in myrange(writer_corrections, writer_corrections_size)'>{{writer_corrections[points]}}</li>
                    </ul>

                </div>

            </div>

            <div class="alert alert-danger box-alert" ng-show="job_status.current_status == 'Timeout'">
                <strong class="fa fa-warning"></strong>&nbsp; &nbsp; You have been rejected from this project as you weren't able to do the submission on time.
                <br> This kind of response from your side may lead to account termination.
            </div>

            <div class="alert alert-warning box-alert" ng-show="job_status.current_status == 'UploadTimeup'">
                <strong class="fa fa-warning"></strong>&nbsp; &nbsp; You submission period is over. Your last response will be taken into count.
            </div>

            <div class="alert alert-danger box-alert" ng-show="job_status.current_status == 'Rejected'">
                <strong class="fa fa-warning"></strong>&nbsp; &nbsp; Your Content has been rejected as it did not meet the required minimum standards.
            </div>

            <div class="alert alert-info box-alert" ng-show="job_status.current_status == 'EditorApproved'">
                <strong class="fa fa-warning"></strong>&nbsp; &nbsp; Our editor has approved your content.Please wait until the client approves it as well.
            </div>

            <div class="alert alert-info box-alert" ng-show="job_status.current_status == 'ClientApproved'">
                <strong class="fa fa-warning"></strong>&nbsp; &nbsp; Your project is approved successfully by the client. The stipend will reflect on your account in a few hours.
            </div>


            <br>
            <br>
        </div>

        <div class="row text-center box-alert">
            <div class="gap10"></div>
            <a ng-show="job_status.current_status == 'Uploaded' || job_status.current_status == 'Correction'" type="button" class="last-content-see" ng-click="viewUploadedFile(job_status.writer_id, job_status.order_id)" href="{{'../Writers/viewUploadedFiles/' + job_detail_list.id + '/'+ writer_uploads.writer_id + '/' + writer_uploads.filename}}" target="_blank">View last uploaded files</a>

            <div class="gap20"></div>

            <div id="uploadbutton" ng-show="job_status.current_status == 'Claimed' || job_status.current_status == 'Uploaded' || job_status.current_status == 'Correction'">
                <input id="selectedFile" accept=".pdf,.doc,.docx" type="file" nv-file-select="" uploader="uploader" />

                <label for="selectedFile" ng-click="uploader.queue[0].remove()"></label>

            </div>
        </div>

        <div class="gap20"></div>

        <div class="row">

            <div class="col-md-10 col-md-push-1">
                <table class="responsive-table box-alertx">
                    <tbody>
                        <tr ng-repeat="item in uploader.queue">
                            <td class="fix truncate"><strong>{{ item.file.name }}</strong></td>
                            <td ng-show="uploader.isHTML5" nowrap>{{ item.file.size/1024/1024|number:2 }} MB</td>
                            <td ng-show="uploader.isHTML5" style="width:18%;">
                                <div class="progress" style="margin-bottom: 0;">
                                    <div class="progress-bar brand" role="progressbar" ng-style="{ 'width': item.progress + '%' }"></div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span ng-show="item.isSuccess"><i class="fa fa-check"></i></span>
                                <span ng-show="item.isCancel"><i class="fa fa-ban"></i></span>
                                <span ng-show="item.isError"><i class="fa fa-remove"></i></span>
                            </td>
                            <td nowrap style="width: 1%;">
                                <button type="button" class="btn brand btn-success btn-xs" ng-click="item.upload()" ng-disabled="item.isReady || item.isUploading || item.isSuccess">
                                    <span class="fa fa-upload"></span> Upload
                                </button>
                                <button type="button" class="btn brand btn-warning btn-xs" ng-click="item.cancel()" ng-disabled="!item.isUploading">
                                    <span class="fa fa-ban"></span> Cancel
                                </button>
                                <button ng-disabled="item.isUploading || item.isSuccess" type="button" class="btn brand btn-danger btn-xs" ng-click="item.remove()">
                                    <span class="fa fa-trash"></span> Remove
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="gap60"></div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    
