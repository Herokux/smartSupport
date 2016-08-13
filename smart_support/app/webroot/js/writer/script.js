$(document).ready(function(){
    var xmlhttp = new XMLHttpRequest(),
    json;
    var specilization_list = [];
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            json = JSON.parse(xmlhttp.responseText);
            var i = 0;
            while(i < 10) {
                title_parsed = json[i]['OrderArea'].area;
                title_parsed = title_parsed.split(' ').join('-');
                document.getElementById('parent_selection').innerHTML +=
                '<option value="'+title_parsed+'">'+json[i]['OrderArea'].area+'</option>';
                i++;
            }
            $("#parent_selection").change(function() {
                var parent = $(this).val();
                switch(parent){
                    case 'Publishing-and-Journalism':
                        listpick("Publishing_and_Journalism");
                        break;
                    case 'Healthcare-and-Sciences':
                        listpick("Healthcare_and_Sciences");
                        break;
                    case 'Sports-and-Fitness':
                        listpick("Sports_and_Fitness");
                        break;
                    case 'Software-and-Technology':
                        listpick("Software_and_Technology");
                        break;
                    case 'Art-and-Design':
                        listpick("Art_and_Design");
                        break;
                    case 'Business':
                        listpick("Business");
                        break;
                    case 'Education':
                        listpick("Education");
                        break;
                    case 'Entertainment':
                        listpick("Entertainment");
                        break;
                    case 'Food-and-Beverage':
                        listpick("Food_and_Beverage");
                        break;
                    case 'Lifestyle-and-Travel':
                        listpick("Lifestyle_and_Travel");
                        break;
                    case 'Other':
                        listpick("Other");
                        break;
                    default:
                        $("#child_selection").html('');
                        break;
                       }
                });
            function listpick(title) {

                $("#child_selection").html('<option value="" disabled selected>Choose your option</option>');
                var i=0, index=0;
                while(i < 10) {
                    title_parsed = json[i]['OrderArea'].area;
                    title_parsed = title_parsed.split(' ').join('_');
                    if(title_parsed == title) {
                        index = i;
                        
                    }
                    i++;
                }
                var specilizationfeild = json[index]['OrderArea'].specilization.split(',');
                for(i = 0; i < specilizationfeild.length; i++) {
                    var value_child = specilizationfeild[i].split(' ').join('-');
                    document.getElementById('child_selection').innerHTML +=
                    '<option value="'+value_child+'">'+specilizationfeild[i]+'</option>';
                }
            }
            flag = 0;
            $('#child_selection').change(function(){
              if(specilization_list.length > 1 ) {
                $('.button-spec').html('<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Save</a>');
                $('.modal-trigger').leanModal();flag = 1;
              }
              var inject = $(this).val();
              if(specilization_list.length < 5) {
                var lookin = specilization_list.indexOf(inject);
                if(lookin != -1) {
                  Materialize.toast("Already Present in list, select other!", 1500 );
                } else {
                  specilization_list.push(inject);
                  document.getElementById('insert-chip').innerHTML +=
                  '<div class="chip" id="'+inject+'">'+
                  inject.split('-').join(' ')+
                  '<i class="axe close material-icons">close</i></span>'+
                  '</div>';
                }
              } else {
                Materialize.toast("Maximum of 5 can be selected!", 1500 );
              }
              $('.axe').click(function(){
                var index_element = specilization_list.indexOf($(this).parent().attr('id'));
                if (index_element > -1) {
                    specilization_list.splice(index_element, 1);
                }
              });
            });
        }
    }
    $('#specilizationSubmit').click(function(){
      var x = specilization_list.length;
      if(x < 3) {
          Materialize.toast("You have to select atleast three!", 1500 );
      } else {
        for(i=0;i<specilization_list.length;i++) {
          specilization_list[i] = specilization_list[i].split('-').join(' ');
        }
        var allfeilds = specilization_list.join(',');
        console.log('coming');
        $.post("../Writers/sendspecilization",{
  	           	'specialization': allfeilds
  	      	},
  	        	function(data,status){
  	        		if (status == 'success') {
  	        			Materialize.toast('specilizations are saved!', 3000);
  	        		} else {
  	        			Materialize.toast('Something went please try again!', 3000);
  	        		}
  			});
      }
    });
    xmlhttp.open('GET', '../Writers/specilizationfeild', true);
    xmlhttp.send();
});
