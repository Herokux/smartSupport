<?php
    echo $this->Html->css('business/notifications');
        echo $this->fetch('css');
?>
    <div class="gap40"></div>
    <h5 id="myxxx" class="center heading">Notifications</h5>
    <div class="gap40"></div>

    <div id="notification_list" class="contain row">
        <table class="table">
            <tbody>
                <tr ng-repeat="mynotifications in notifications">
                    <td>{{timeAgo(mynotifications.date_created)}}</td>
                    <td>{{mynotifications.header}}</td>
                    <td class="center-align"><a ng-click="notificationDetails($index)" class="waves-effect waves-light btn view-notification">View</a></td>
                </tr>
            </tbody>
        </table>
    </div>



    <div id="notification_info" class="row">
        
        <div class="col s12">
            <div class="job-details">
                <div class="col s8 m10 l10 heading">
                       {{notifications[notificationIndex].header}} <em>({{notifications[notificationIndex].date_created}})</em>
                </div>
                <div class="row">     
                    <div class="col s4 m2 l2 right right-align">
                        <a class="text-brand" href="#" id="goback_notifications">Go Back</a>
                    </div>
                </div>
                <div class="row bodymessage">
                    <p>Hi <?php echo $userName; ?>, <br>
                    &nbsp; &nbsp; &nbsp; {{notifications[notificationIndex].message}}

                    </p>
                    <br>
                    <p class="right-align">Regards,<br>Team White Panda</p>

                </div>

            </div>
        </div>
    </div>


    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>-->

    <?php       
    echo $this->Html->script('business/script.js');
?>