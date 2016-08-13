<?php
    echo $this->Html->css('business/order-now');
?>

<div class="row">
    <div class="col s12 m6 l3 offset-l3" ng-repeat="price in pricelist">
        <div class="boxes-pt">
            <div class="ruppes-pack">
                <span class="indian"><i class="fa fa-inr" aria-hidden="true"></i></span>{{pricelist[0]}}
            </div>
            <div class="pack-name">Facebook Posts</div>
            <div class="gap40"></div>
            <div class="plain-text">Ten posts (one to two lines)</div>
            <div class="plain-text">{{Time}}</div>
            <div class="gap30"></div>
            <div class="plain-text text-brand bold"><a href="../Businesses/contentSamples/Social Media/Facebook Posts" target='_blank'>View Sample</a></div>
            <div class="gap30"></div>
            <div class="center">
                <button ng-click="setContentPaygradeSocialMedia('Facebook Posts', 'Bronze', pricelist[0], Time)" class="order-button">Order</button>
            </div>
        </div>
    </div>

    <div class="col s12 m6 l3">
        <div class="boxes-pt">
            <div class="ruppes-pack">
                <span class="indian"><i class="fa fa-inr" aria-hidden="true"></i></span>{{pricelist[0]}}
            </div>
            <div class="pack-name">Tweets</div>
            <div class="gap40"></div>
            <div class="plain-text">Ten tweets (140 characters)</div>
            <div class="plain-text">{{Time}}</div>
            <div class="gap30"></div>
            <div class="plain-text text-brand bold"><a href="../Businesses/contentSamples/Social Media/Tweets" target='_blank'>View Sample</a></div>
            <div class="gap30"></div>
            <div class="center">
                <button ng-click="setContentPaygradeSocialMedia('Facebook Posts', 'Bronze', pricelist[0], Time)" class="order-button">Order</button>
            </div>
        </div>
    </div>
   
</div>

<?php       
//    echo $this->Html->script('business/script.js');
?>