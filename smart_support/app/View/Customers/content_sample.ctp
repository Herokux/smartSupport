<header class="center-align">
    <h5>Choose your area of expertise</h5>
</header>

<div class='row sampleAreaList'>

    <div class="col l4 m6 s12">
        <input ng-disabled="blockExtraIndustryAdd('Art and Design')" type="radio" ng-click="sampleSubmissionSelectArea('f60f0361-d248-11e5-bff5-28d2449fa274')" name="radio" id="radio1" class="with-gap" />
        <label for="radio1">Art and Design</label>
    </div>

    <div class="col l4 m6 s12">
        <input ng-disabled="blockExtraIndustryAdd('Entertainment')" type="radio" ng-click="sampleSubmissionSelectArea('13da794c-d249-11e5-bff5-28d2449fa274')" name="radio" id="radio2" class="with-gap" />
        <label for="radio2">Entertainment</label>
    </div>

    <div class="col l4 m6 s12">
        <input ng-disabled="blockExtraIndustryAdd('Lifestyle and Travel')" type="radio" ng-click="sampleSubmissionSelectArea('13da83d9-d249-11e5-bff5-28d2449fa274')" name="radio" id="radio3" class="with-gap" />
        <label for="radio3">Lifestyle and Travel</label>
    </div>

    <div class="col l4 m6 s12">
        <input ng-disabled="blockExtraIndustryAdd('Sports and Fitness')" type="radio" ng-click="sampleSubmissionSelectArea('2695a273-d249-11e5-bff5-28d2449fa274')" name="radio" id="radio4" class="with-gap" />
        <label for="radio4">Sports and Fitness</label>
    </div>

    <div class="col l4 m6 s12">
        <input ng-disabled="blockExtraIndustryAdd('Business')" type="radio" ng-click="sampleSubmissionSelectArea('2695ac36-d249-11e5-bff5-28d2449fa274')" name="radio" id="radio5" class="with-gap" />
        <label for="radio5">Business</label>
    </div>

    <div class="col l4 m6 s12">
        <input ng-disabled="blockExtraIndustryAdd('Food and Beverage')" type="radio" ng-click="sampleSubmissionSelectArea('400157dd-d249-11e5-bff5-28d2449fa274')" name="radio" id="radio6" class="with-gap" />
        <label for="radio6">Food and Beverage</label>
    </div>

    <div class="col l4 m6 s12">
        <input ng-disabled="blockExtraIndustryAdd('Publishing and Journalism')" type="radio" ng-click="sampleSubmissionSelectArea('4001622e-d249-11e5-bff5-28d2449fa274')" name="radio" id="radio7" class="with-gap" />
        <label for="radio7">Publishing and Journalism</label>
    </div>

    <div class="col l4 m6 s12">
        <input ng-disabled="blockExtraIndustryAdd('Education')" type="radio" ng-click="sampleSubmissionSelectArea('62e5a5cd-d249-11e5-bff5-28d2449fa274')" name="radio" id="radio8" class="with-gap" />
        <label for="radio8">Education</label>
    </div>

    <div class="col l4 m6 s12">
        <input ng-disabled="blockExtraIndustryAdd('Healthcare and Sciences')" type="radio" ng-click="sampleSubmissionSelectArea('62e5b152-d249-11e5-bff5-28d2449fa274')" name="radio" id="radio9" class="with-gap" />
        <label for="radio9">Healthcare and Sciences</label>
    </div>

    <div class="col l4 m6 s12">
        <input ng-disabled="blockExtraIndustryAdd('Software and Technology')" type="radio" ng-click="sampleSubmissionSelectArea('6ec24152-d249-11e5-bff5-28d2449fa274')" name="radio" id="radio10" class="with-gap" />
        <label for="radio10">Software and Technology</label>
    </div>


</div>

<div ng-show="loading2" id="loading2" class="center-align">
<!--
    <div class="spinner-layer spinner-red">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
    </div>
-->
</div>



<div id="topic" ng-show="tabShowfx" ng-include="loadAreasampleTopic()">


    <!--			Angular loading tab page-->



</div>