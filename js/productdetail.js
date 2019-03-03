
$(document).ready(function(){
	var id = window.location.href.split('id=')[1];
	$("#btnEdit").attr("href","editproduct.php?id="+id+"");
	$(function() { 
		var obj, parameters, xmlhttp;
		obj = { "name":"backoffice_detailproduct", "id":""+id+""};
		parameters = JSON.stringify(obj);
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		  	if (this.readyState == 4 && this.status == 200) {
		    	var obj2 = JSON.parse(xmlhttp.responseText);
		    	console.log(obj2);
		    	renderProduct(obj2);
		  	}
		};
		xmlhttp.open("GET", "../controller/backoffice/BackfficeController.php?x="+parameters, true);
		xmlhttp.send();
	});
	

	function renderProduct(data) {
		var detail = "";
		for (var i=0; i<data[0]["0"].length; i++) {
			detail = ""+detail+"- "+data[0]["0"][i]+"<br>";
		}
		$("#image").attr("src",""+data[0].image+"");
		$("#name").text(data[0].name);
		$("#detail").html(detail);
		$("#type").text(data[0].nameTH);
		$("#price").text(data[0].price+" บาท");
	}

	$("#deletePruduct").click(function(){
		var object, parameters, xmlhttp;
		object = { "name":"backoffice_deleteproduct", "id":""+id+""};
		parameters = JSON.stringify(object);
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		  	if (this.readyState == 4 && this.status == 200) {
		    	var obj = JSON.parse(xmlhttp.responseText);
		    	if (obj == true) {
		    		console.log("true")
		    		location.href = "../backoffice/manageproducts.php";
		    	}else{
		    		console.log("false");
		    		alert("ไม่สามารถลบได้");
		    	}
		  	}
		};
		xmlhttp.open("GET", "../controller/backoffice/BackfficeController.php?x="+parameters, true);
		xmlhttp.send();
	});


});












