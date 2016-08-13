$(document).ready(function () {


	$('.writer_main .writer_tab ul li').click(function () {

		$('.writer_main .writer_tab ul li').css({
			fontSize: '15px',
			fontWeight: '100',
			color: '#fff',
			background: '#002542'
		});
		$(this).css({
			fontSize: '15.8px',
			fontWeight: '900',
			color: '#002542',
			background: '#fff'
		});
		$('#welcome').css({
			display: 'none'
		});
	});

	$("#nav-tabs ul li a").click(function(){
		$("#welcome").css("display", "none");
	});








});