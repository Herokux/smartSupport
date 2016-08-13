$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    $('.modal-trigger').leanModal();
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        var $target = $(e.target);
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });
    $(".next-step").click(function (e) {
        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);
        var footer=$( document ).height() + 200;
        $("#footer").css('top',footer);
    });
    $('.slider').slider({full_width: true});
    $('.slider').slider('pause');    

    $('.indicator-item').click(function(){

        $('.slider').slider('pause');
    });
    $(".slider").on("swipe",function(){
        $('.slider').slider('pause');
    });
    $('select').material_select();
    $('.box-button').click(function() {
        $('.phase-one').addClass('hide');
        $('.phase-two').removeClass('hide');
    });

    $('.back-button-to-phase-one').click(function() {
        $('.phase-one').removeClass('hide');
        $('.phase-two').addClass('hide');
    });
    $('.order-button').click(function() {
        $('.phase-two').addClass('hide');
        $('.phase-three').removeClass('hide');
    });//This query shifted to angular controller

    $('.back-button-to-phase-two').click(function() {
        $('.phase-two').removeClass('hide');
        $('.phase-three').addClass('hide');
    });

    $('.button-to-final-phase').click(function() {
        $('.phase-three').addClass('hide');
        $('.phase-four').removeClass('hide');
    });

    $('.back-button-to-phase-three').click(function() {
        $('.phase-three').removeClass('hide');
        $('.phase-four').addClass('hide');
    });

    $("#goback_recentOrders").click(function(){
        $("#order_info").hide(300);
        $("#order_list").show(300);
    });

    $("#goback_receivedOrders").click(function(){
        $("#received_order_info").hide(300);
        $("#received_order_list").show(300);
    });
    /*  Client review  ( Content Received tab)    */
    $('#clientReview1').change(function(){
        if ($(this).is(':checked')) {
            $("#contentApprove").show(200);
            $("#ratingtab").show(200);
            $('#revisionRequest').hide();
        }
    });
    $('#clientReview2').change(function(){
        if ($(this).is(':checked')) {
            $("#contentApprove").hide();
            $("#ratingtab").hide();
            $('#revisionRequest').show(200);
        }
    });
    $('.form-phase-two').hide();
    $('#form-validation-one').click(function(){
        var contentType = $('#validate1').val();
        var keywords = $('#validate3').val();
        var keypoints = $('#validate4').val();

        var writerSpecialization = $('#validate2').find(":selected").val();

        var v1 = formvalidation('#validate1', contentType);
        var v2 = formvalidation('#validate2', writerSpecialization);
        var v3 = formvalidation('#validate3', keywords);
        var v4 = formvalidation('#validate4', keypoints);

        if(v1 == true) {
            $('html, body').animate({ scrollTop: 100 }, 'slow');
            document.getElementById("validate1").focus();
        } 
        else if(v2 == true) {
            $('html, body').animate({ scrollTop: 100 }, 'slow');
            document.getElementById('validate2').style.borderColor = "red";
        }
        else if(v3 == true) {
            $('html, body').animate({ scrollTop: 100 }, 'slow');
            document.getElementById('validate2').style.borderColor = "white";
            document.getElementById("validate3").focus();
        }
        else if(v4 == true) {
            document.getElementById('validate2').style.borderColor = "white";
            $('html, body').animate({ scrollTop: 100 }, 'slow');
            document.getElementById("validate4").focus();
        }
        else {
            $('.content-description').hide();
            $('html, body').animate({ scrollTop: 100 }, 'slow');
            $('.form-phase-two').show();
        }
    });
    var formvalidation = function(idName, fieldVar) {
        if (fieldVar == '') {
            $(idName).addClass('invalid');
            return true;
        }
        else{
            return false;
        }
    }
    $('.templateSelected').click(function(){
        var offsetBody = ($(".button-to-final-phase").offset()).top;
        $('html, body').animate({ scrollTop: offsetBody }, 1800);
    });
    /****************************************************************************/
    /*                    Client rating response                                */
    /****************************************************************************/
    $('#ratingtab .br-widget a').click(function () {

        var clientRating = $("#ratingtab .br-widget .br-current-rating").text();
        var orderID = $("#ratingOrderID").val();
        var claimedID = $("#ratingClaimedID").val();
        $.post("../Businesses/clientRatingUpdate",
                {
                    order_id: orderID,
                    claimed_id: claimedID,
                    rating_value: clientRating
                },
                function(data, status){
                    Materialize.toast('Content rated!', 3000);
            });
    });
    $('.uploadLabel').click(function(){
        $('#selectedFile').click();
    });
    $("#goback_notifications").click(function(){
        $("#notification_list").show(300);
        $("#notification_info").hide(300);
    });
});


function validate() {
    var nameRequest = $('#call_name').val();
    var emailRequest = $('#call_email').val();
    var numberRequest = $('#call_number').val();
    if( nameRequest == "") {
        Materialize.toast('Name field is empty!', 2000);
        return false;
    }
    if(!emailRequest.match(/[A-Za-z0-9_]+@[A-Za-z0-9]+\.[A-Za-z0-9]+/)) {
        Materialize.toast('Email is incorrect!', 2000);
        return false;
    }
    if(!numberRequest.match(/^(\+91|)[0-9]{10}/)) {
        Materialize.toast('Number is incorrect!', 2000);
        return false;
    }
    return true;
}


$('#callRequest').click(function(){
    if (validate()) {
        Materialize.toast('Sending data back to server!', 2000);

        var nameRequest = $('#call_name').val();
        var emailRequest = $('#call_email').val();
        var numberRequest = $('#call_number').val();
        
        $.post("../Home/talktou",{
            'name': nameRequest,
            'email': emailRequest,
            'number': numberRequest,
            'subject': "Call Request",
        },
            function(data,status){
                if (status == 'success') {  
                    Materialize.toast('Form has been submitted successfully!', 3000);
                } else {
                    Materialize.toast('Something went please try again!', 3000);
                }
        });
        

    }
});



