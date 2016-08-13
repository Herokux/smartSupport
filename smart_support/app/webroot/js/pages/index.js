(function() {
	var currentLocation =  document.URL;
	var res = currentLocation.split("://");
	var resfinal  = res[1].split("/");
	var client_id = resfinal[resfinal.length-1];
	var coustmer_id = resfinal[resfinal.length-2];
})();