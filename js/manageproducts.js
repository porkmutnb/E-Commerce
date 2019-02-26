
$(document).ready(function(){

	var obj, parameters, xmlhttp;
	obj = { "name":"backofficecontroller" };
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

	function renderProduct(data) {
		var render = "";
		var detail = "";
		for(var i=0; i<data.length; i++){
			var detail = "";
			for (var j=0; j<data[i]["0"].length; j++) {
				console.log(data[i]["0"][j], "77777");
				detail = ""+detail+"- "+data[i]["0"][j]+"<br>";
			}
			render += 
				"<tr class='tr'>"+
                    "<td align='center'>"+(i+1)+"</td>"+
					"<td align='center'>"+
						"<img src='"+data[i].image+"' width='100'>"+
					"</td>"+
					"<td align='left'>"+data[i].name+"</td>"+
					"<td>"+detail+"</td>"+
					"<td align='center'>"+data[i].nameTH+"</td>"+
					"<td align='center'>"+data[i].price+"</td>"+
					"<td align='center'>128 ครั้ง</td>"+
					"<td align='center'>"+
						"<a href='productdetail.php?id="+data[i].productID+"'><u>ดูรายละเอียด</u></a>"+
					"</td>"+
				"</tr>";
		}
		document.getElementById('list-product').innerHTML = render;
	}

	window.onload = function() {
	   var getInput = 5555;
	   localStorage.setItem("productID",getInput);
	}

});







