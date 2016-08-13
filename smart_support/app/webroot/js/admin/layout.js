$(document).ready( function(){
    $('.icons').click(function() {
        $('.icons').removeClass('active');
        $(this).addClass('active');
    });
    $('.icons').click(function(){
        $('.tab-view').hide();
        $('.tab-view').fadeIn(500);
    });
    //HIDE DASHBOARD HOME VIEW
    $('.icons').click(function() {
        $('.home').hide();
    });
    //INITIATE MODAL
    $('.modal-trigger').leanModal();

    $('.dropdown-button').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrain_width: false,
        hover: true,
        gutter: 0,
        belowOrigin: false,
        alignment: 'left'
    });

});
