$(document).ready(function () {
    $('#mylogo img').hover(function () {
        this.src = 'http://www.whitepanda.in/images/full_logo_hover.png';
    }, function () {
        this.src = 'http://www.whitepanda.in/images/full_logo_white.png';
    });
	setTimeout(function(){
			$('.alert-box').fadeOut(800);
		},2000);   
    
//    $(function () {
//        $('a[href*=#]:not([href=#])').click(function () {
//            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
//                var target = $(this.hash);
//                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
//                if (target.length) {
//                    $('html,body').animate({
//                        scrollTop: target.offset().top
//                    }, 600);
//                    return false;
//                }
//            }
//        });
//    });
});
 	
