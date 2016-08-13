

$(document).ready( function(){

	//Navigation toggle button
 //    $('.top').click( function() {
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
        $('.dashboard-alerts').hide(250);
    });



    // $('#order').click();

    $('.icons').click(function(){
        $('.tab-view').hide();
        $('.tab-view').fadeIn(500);
    });
    

    // var triggerDashboardHide = function(){

    //     $('#order').addClass('active');
    // };




    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
        });
        return vars;
    }


    Object.size = function(obj) {
        var size = 0, key;
        for (key in obj) {
            if (obj.hasOwnProperty(key)) size++;
        }
        return size;
    };


    var successUrl = getUrlVars();

    console.log(Object.size(successUrl));

    if (Object.size(successUrl) == '0') {
        $('#order').click();
    }




    
    
    
});


/******************************************************************/
/*   FORCE PAGE RELOAD ON BACK TRIGGER FROM PAYMENT GATEWAY       */
/******************************************************************/
HttpContext.Response.Cache.SetExpires(DateTime.UtcNow.AddDays(-1));
HttpContext.Response.Cache.SetValidUntilExpires(false);
HttpContext.Response.Cache.SetRevalidation(HttpCacheRevalidation.AllCaches);
HttpContext.Response.Cache.SetCacheability(HttpCacheability.NoCache);
HttpContext.Response.Cache.SetNoStore();
