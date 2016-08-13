// (function() {
// 	var currentLocation =  document.URL;
// 	var res = currentLocation.split("://");
// 	var resfinal  = res[1].split("/");
// 	var client_id = resfinal[resfinal.length-1];
// 	var customer_id = resfinal[resfinal.length-2];
// })();
var xmlhttp = new XMLHttpRequest(),
    json;
    var currentLocation =  document.URL;
	var res = currentLocation.split("://");
	var resfinal  = res[1].split("/");
	var client_id = resfinal[resfinal.length-1];
	var customer_id = resfinal[resfinal.length-2];
    xmlhttp.onreadystatechange = function() {
        
        if(xmlhttp.readyState === 4 && xmlhttp.status === 200) {
          
          json = JSON.parse(xmlhttp.responseText);
          var i = 1;
          console.log(json);
          
          while(json.results) {
              
            document.getElementById('container').innerHTML = document.getElementById('container').innerHTML +
            "<div class=\"box\">" +
            "<h3>"+ i + ".) <a href="+json.results[i-1].url+" target=\"_blank\">" +json.results[i-1].title+"</a></h3>" +
            "<p class=\"para\">"+json.results[i-1].abstract+"</p>" +
            "<ul>"+
            "<li> Category : "+json.results[i-1].section+"</li>"+
            "<li> Item Type : "+json.results[i-1].material_type_facet+" + "+json.results[i-1].item_type+"</li>"+
            "</ul><br>"+
            "<p class=\"author\">"+json.results[i-1].byline+"</p><br>" +
            "</div><br>";
            i++;
          }
          
        }
    }
    var urlxml = 'http://localhost:8080/project/smart_support/smart_support/Clients/customer_message?client_id='+client_id+'&customer_id='+customer_id;
    xmlhttp.open('GET', 'http://localhost:8080/project/smart_support/smart_support/Clients/customer_message', true);
    xmlhttp.send();