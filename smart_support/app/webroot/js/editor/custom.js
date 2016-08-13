$(document).ready(function () {
	/****************************************************************************/
	/*                    Editor rating response                                */
	/****************************************************************************/
	function ratingPost(selectedRateBar){
		
		var editorRating = selectedRateBar.val();

        var orderID = selectedRateBar.attr('id');

        var claimedID = $("#"+orderID).val();
        

        var className = selectedRateBar.attr('class');
		var classList = className.split(' ');
		var ratingIdetity = classList[0];


		console.log(ratingIdetity);            
        $.post("../Editors/editorRating",
        {
          	claimed_id: claimedID,
          	rating_Question: ratingIdetity,
          	rating_value: editorRating
        },
            function(data, status){

    	});
	}

	$('.rating_1').on(
        'change', function(){
        	var selectedRateBar = $(this);
        	ratingPost(selectedRateBar);

    });
    $('.rating_2').on(
        'change', function(){
        	var selectedRateBar = $(this);
        	ratingPost(selectedRateBar);

    });
    $('.rating_3').on(
        'change', function(){
        	var selectedRateBar = $(this);
        	ratingPost(selectedRateBar);

    });
    $('.rating_4').on(
        'change', function(){
        	var selectedRateBar = $(this);
        	ratingPost(selectedRateBar);

    });
    $('.rating_5').on(
        'change', function(){
        	var selectedRateBar = $(this);
        	ratingPost(selectedRateBar);

    });

    $('.rating_6').on(
        'change', function(){
            var selectedRateBar = $(this);
            ratingPost(selectedRateBar);

    });


});