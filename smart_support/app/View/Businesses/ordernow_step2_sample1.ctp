<?php
    echo $this->Html->css('business/order-now');
?>

<div class="row">
    <div class="col s12 m6 l3" ng-repeat="price in pricelist">
        <div class="boxes-pt">
            <div class="ruppes-pack">
                <span class="indian"><i class="fa fa-inr" aria-hidden="true"></i></span>{{price}}
            </div>
            <div class="pack-name {{planlist[$index]}}">{{planlist[$index]}}</div>
            <div class="gap30"></div>
            <div class="plain-text" ng-repeat="list in specificationList[$index]">{{list}}</div>
            
            <div ng-show="(planlist[$index] == 'Bronze' || planlist[$index] == 'Silver')" class="plain-text">&nbsp;</div>
            <div ng-show="(planlist[$index] == 'Bronze')" class="plain-text">&nbsp;</div>
            <div class="gap30"></div>
            <div class="plain-text text-brand bold"><a href="{{'../Businesses/contentSamples/' + ContentType + '/' + price}}" target='_blank'>View Sample</a></div>
            <div class="gap30"></div>
            <div class="center">
                <button ng-click="setContentPaygrade(price, planlist[$index], Time)" class="order-button">Order</button>
            </div>
        </div>
    </div>
</div>

<?php       
//    echo $this->Html->script('business/script.js');
?>