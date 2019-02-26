	
	var updateImage = false;
	$("#statusImage").val("false");

	$(document).ready(function(){
		var id = window.location.href.split('id=')[1];
		$("#id").val(id);
		$('#actionUpload').click(function(){
			$('#inputFile').click();
			console.log('actionUpload');
		});

		$(function() { 
			var object, parameters, xmlhttp;
			object = { "name":"backoffice_editproduct", "id":""+id+""};
			parameters = JSON.stringify(object);
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			  	if (this.readyState == 4 && this.status == 200) {
			    	var obj = JSON.parse(xmlhttp.responseText);
			    	console.log(obj);
			    	renderProduct(obj);
			  	}
			};
			xmlhttp.open("GET", "../controller/backoffice/BackfficeController.php?x="+parameters, true);
			xmlhttp.send();
		});

		function renderProduct(data){
			$("#name").val(data[0].name);
			$("#output").attr("src",data[0].image);
			$("#cate option[value="+data[0].productTypeID+"]").attr("selected",true);
			$("#price").val(data[0].price);
			$("#detail1").val(data[0][0][0]);
			$("#detail2").val(data[0][0][1]);
			$("#detail3").val(data[0][0][2]);
			$("#detail4").val(data[0][0][3]);
			$("#detail5").val(data[0][0][4]);
		}

		$('#btnSave').click(function(){
			console.log("btnSave");
			var name = $('#name');
			var inputFile = $('#inputFile');
			var detail = $('#detail1');
			var cate = $('#cate');
			var price = $('#price');

			switch('') {
			  	case name.val():
			  		name.attr('required','required');
			  		$('#submit').click();
			    	break;
			    case detail.val():
			  		detail.attr('required','required');
			  		$('#submit').click();
			    	break;
			    case price.val():
			  		price.attr('required','required');
			  		$('#submit').click();
			    	break;	
			    case inputFile.val():
			  		if (updateImage == true) {
			  			alert('กรุณาอัพโหลดรูปเมนู');
			  			inputFile.focus();
			  		}else{
			  			checkType();
			  		}
			    	break;
			  	default:
			  		checkType();
			}
		});

		document.getElementById("detail1").onchange = function(){
			$("#updateDetail").val(1);
		}
		document.getElementById("detail2").onchange = function(){
			$("#updateDetail").val(1);
		}
		document.getElementById("detail3").onchange = function(){
			$("#updateDetail").val(1);
		}
		document.getElementById("detail4").onchange = function(){
			$("#updateDetail").val(1);
		}
		document.getElementById("detail5").onchange = function(){
			$("#updateDetail").val(1);
		}

		function checkType(){
			var cate = $('#cate');
			if (cate.val() == null){
				alert('กรุณาเลือกประเภทเมนู');
				cate.focus();
			}else{
				$('#submit').click();
			}
		}
	});

	function loadFile(event){
		var reader = new FileReader();
    	reader.onload = function(){
    		console.log(event, "999999");
      		var output = document.getElementById('output');
      		updateImage = true;
      		$("#statusImage").val("true");
      		output.src = reader.result;
    	};
    	if (event.target.files[0]) {
    		console.log(event.target.files[0], "22222");
    		reader.readAsDataURL(event.target.files[0]);
    	}else{
    		console.log(event.target.files[0], "33333");
    	}
	}

	// function updateDetail() {
	// 	console.log("updateDetail");
	// 	// $("#updateDetail").val("true");
	// }








