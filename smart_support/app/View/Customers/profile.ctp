<?php

    echo $this->Html->css('writer/profile');
    echo $this->fetch('css');

?>
<div class="background-wallpaper">
    <div class="profile-image">
        <img class="profile-photo" src="../img/Writer/default-user-image.png">
    </div>
    <div class="profile-name">
        <?php echo $userName; ?>
    </div>
</div>


<div class="row profile-info">
    <div class="col s12 m12 l7" id="box-one">
        <div class="avilable-options">
            <ul class="tabs nav-tabs">
                <li class="tab button" id="one"><a class="active" href="#skills">Industries</a></li>
                <li class="tab button" id="two"><a  href="#references">References</a></li>
                <li class="tab button" id="three" ng-click='contentSampleSubmit()'><a href="#upgrade">Add Industry</a></li>
            </ul>
            <div id="skill-set" class="skill-set valign-wrapper">

                <div id="insert-skills" class="row valign" style="width:100%;" >

                </div>
            </div>
            <div id="content-reference" class="content-reference">
                <div class="content-reference-text">
                    <textarea placeholder="Submit links of any work done by you in past!" ng-model="writerDetails.reference"></textarea>
                    <div class="circles-contents">
                        <button class="content-update" ng-click="myformUpdate('reference')">Update</button>
                    </div>
                </div>
            </div>
            <div id="claim-job" class="claim-job">
                <div ng-include="skillUpgradeLoad()" class="row">

                    <!--Angular loading tab page-->

                </div>
            </div>
        </div>
    </div>
    <div class="col s12 m12 l5" id="box-two">
        <div class="general-info">
            <div class="general-info-heading">
                Profile <i id="profileEdit" class="fa fa-pencil right pencil" aria-hidden="true"></i>
            </div>
            <div class="profile-basic-information">
                <table>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{writerDetails.firstname + " " + writerDetails.lastname}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td class="editable"><input disabled type="text"  placeholder="Not set" ng-model="writerDetails.address" /></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td class="editable"><input type="text" disabled placeholder="Not set" ng-model="writerDetails.city" /></td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td class="editable"><input type="text" disabled placeholder="Not set" ng-model="writerDetails.state" /></td>
                        </tr>
                        <tr>
                            <td>Zip Code</td>
                            <td class="editable"><input type="text" disabled ng-model="writerDetails.pincode" placeholder="Not set" /></td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td class="editable"><input type="text" disabled ng-model="writerDetails.website" placeholder="Not set"/></td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <button class="content-update" id="profileUpdate" ng-click="myformUpdate('personalInfo')">Update</button>
                </div>
            </div>
        </div>
        <div class="specialization-box">
            <div class="specialization-head">Writer Specilization</div>
            <div class="specialization-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
            <div class="width-fix">
                <select class="browser-default" name="parent_selection" id="parent_selection">
                    <option value="" disabled selected>Choose your option</option>
                </select>
                <div class="gap20"></div>
                <select class="browser-default" name="child_selection" id="child_selection">
                </select>
                <div class="gap40"></div>
                <div id="insert-chip">

                </div>
                <div class="gap40"></div>
                <div class="button-spec center"></div>
                <!-- Modal Structure -->
                <div id="modal1" class="modal">
                  <div class="modal-content">
                    <p>You will not be able to make any changes in future!</p>
                  </div>
                  <div class="modal-footer">
                    <a id="specilizationSubmit" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Disagree</a>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>

<?php
    echo $this->Html->script('writer/profile.js');
    echo $this->Html->script('writer/script.js');
?>
