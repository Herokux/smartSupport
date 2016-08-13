<?php
    echo $this->Html->css('writer/payment');
    echo $this->fetch('css');
?>

<p class="current-balance">
    Current Balance is <span class="inr"><i class="fa fa-inr" aria-hidden="true"></i></span><span class="amount">{{balanceBankDetail.balance}}</span></p>

<p class="condition">Minimum amount to process payment is 500 ₹. Payment will be processed every other weekend. <sup class="star">*</sup></p>

<div class="gap10"></div>
<h5 class="bank-details">Bank Details</h5>

<div class="detail-box">
    <div class="row coustmize">
        <div class="col s12 m12 l3">
            <b>Bank Name</b>
            <br> <input type="text" class="custominputfields" id="bankinputfields" placeholder="Not set" ng-model="balanceBankDetail.bank_name" />
        </div>
        <div class="col s12 m12 l3">
            <b>Account Number</b>
            <br> <input type="text" class="custominputfields" id="bankinputfields" placeholder="Not set" ng-model="balanceBankDetail.account_no" />
        </div>
        <div class="col s12 m12 l3">
            <b>Name</b>
            <br> <input type="text" class="custominputfields" id="bankinputfields" placeholder="Not set" ng-model="balanceBankDetail.account_holdername" />
        </div>
        <div class="col s12 m12 l3">
            <b>IFSC Code</b>
            <br> <input type="text" class="custominputfields" id="bankinputfields" placeholder="Not set" ng-model="balanceBankDetail.ifsc_code" />
        </div>
    </div>
</div>

<div class="gap30"></div>

<div class="update-button">
    <button class="update-details" ng-click="myformUpdate('balanceBankDetails')">Update</button>
</div>