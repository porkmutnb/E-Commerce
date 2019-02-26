
	$(document).ready(function() {
		var email = $('#email');
		var password = $('#password');
		var submit = $("#submit");
		$("#login").click(function(){
			switch('') {
			  	case email.val():
			  		email.attr('required','required');
			  		submit.click();
			    	break;
			  	case password.val():
			  		password.attr('required','required');
			  		submit.click();
			    	break;
			  	default:
			  		login();
			}
		});

		function login() {
			var object, parameters, xmlhttp;
			object = { "name":"backoffice_adminlogin", "u":""+email.val()+"", "p":""+password.val()+""};
			parameters = JSON.stringify(object);
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			  	if (this.readyState == 4 && this.status == 200) {
			    	var obj = JSON.parse(xmlhttp.responseText);
			    	if (obj == "true") {
			    		location.href = "notification.php";
			    	}
			    	else if (obj == "password fail") {
			    		alert("รหัสผ่านไม่ถูกต้อง");
			    		password.val("");
			    		password.focus();
			    	}
			    	else{
			    		alert("ไม่มี email นี้ในระบบ");
			    		email.focus();
			    		password.val("");
			    	}
			    	console.log(obj);
			  	}
			};
			xmlhttp.open("GET", "../controller/backoffice/BackfficeController.php?x="+parameters, true);
			xmlhttp.send();
		}
	});






