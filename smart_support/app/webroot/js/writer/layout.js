

$(document).ready( function(){

	// //Navigation toggle button
 //    $('.top').hover( function() {
 //        var toggleWidth = $(".sidebar").width() == 250 ? "60px" : "250px";
 //        var toggleWidthspan = $(".span").css('margin-left') == '60px' ? "0px" : "60px";
 //        $('.sidebar').animate({ width: toggleWidth },1);
 //        $('.span').animate({ 'margin-left': toggleWidthspan }, 500);

 //    });


 //   	//Navigation bar collpase on bosy click
	// $('.main-body').click(function() {
 //    	var toggleWidth = $(".sidebar").width();
 //    	if (toggleWidth == '250') {
 //    		$('.sidebar').animate({ width: '60px' }, 1);
 //    		$('.span').animate({ 'margin-left': '60px' }, 500);
 //    	}
 // 	});

    $('.icons').click(function() {
        $('.icons').removeClass('active');
        $(this).addClass('active');
    });

    $('#profile').click();

    $('.icons').click(function(){
        $('.tab-view').hide();
        $('.tab-view').fadeIn(500);
    });
});
