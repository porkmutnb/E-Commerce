
	$(document).ready(function(){
		$("#btnLogout").click(function(){
			var object, parameters, xmlhttp;
			object = { "name":"backoffice_logout" };
			parameters = JSON.stringify(object);
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			  	if (this.readyState == 4 && this.status == 200) {
			    	var obj = JSON.parse(xmlhttp.responseText);
			    	if (obj == true) {
			    		console.log("Logout");
			    		location.href = "../backoffice/admin.php";
			    	}else{
			    		console.log("fail");
			    	}
			  	}
			};
			xmlhttp.open("GET", "../controller/backoffice/BackfficeController.php?x="+parameters, true);
			xmlhttp.send();
		});
	});