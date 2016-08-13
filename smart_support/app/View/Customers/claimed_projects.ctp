<?php

    echo $this->Html->css('writer/claimed_projects');
    echo $this->fetch('css');
    
    date_default_timezone_set("Asia/Calcutta");
    $currentDate = date("Y-m-d H:i:s");

?>


    <div class="gap20"></div>
    <h5 class="center heading">Claimed Projects</h5>
    <div class="gap20"></div>

    <div class="contain">

        <div class="row">
            <div class="col s12 m12 l6 gap-fix" ng-repeat="y in claimedProjectDetails  | filter:searchjob">
                <div class="job-cards">
                    <div class="left left-side">
                        <div class="job-card-paygrade {{y.paygrade}}">
                            {{y.paygrade}}
                        </div>
                    </div>
                    <div class="right job-card-content">
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <h5 class="edit-article">{{y.content_quality}}</h5>
                                <button ng-click="projectSubmission(y.id, claimedProjectStatus[$index].id)" class="right fixing-button">View</button>
                            </div>
                            <div class="col s12 m12 l12 margin-extra">
                                <div class="row margin-fix">
                                    <div class="col s6 m6 l6">
                                        <b>Topic</b>
                                        <br> {{y.topic}}
                                    </div>
                                    <div class="col s6 m6 l6">
                                        <b>Industry</b>
                                        <br> {{y.writer_specialization}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="center" ng-show="claimedProjectDetails.length == 0">
            <h1 id='noProj' style="font-size: 11em;"><i class="fa fa-inbox" ></i></h1>
            <h2 id='noProj'>No claimed projects</h2>
        </div>
    </div>