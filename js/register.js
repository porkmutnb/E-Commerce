	
	$(document).ready(function(){
		// $('.datepicker').datepicker();
		$("#btn-register").click(function(){
			var statusUser = $("#statusUser").val();
			var phone = $("#phone").val();
			var email = $("#email").val();
			var password = $("#password").val();
			var checkEmail = false;
        	// var filter = /^\d{10}$/;
        	if (/^\d{10}$/.test(phone)) {
        		if ($("#age").val() != "") {
        			if (password.length >= 6 ) {
        				$.ajax({
        					url: "controller/checkRegister.php",
        					method: "post",
        					data: { user: email },
        					dataType: "text",
        					success: function(request){
        						console.log(request, '0000000');
        						if (request == "true") {
        							alert("มีอีเมล์นี้อยู่ในระบบแล้ว");
        							$("#email").focus();
        						}else{
        							$("#submit").click();
        						}
        					}
        				});
        			}else{
        				alert("กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัว")
        				$("#password").focus();
        			}
        		}else{
        			alert("กรุณาระบุ วัน/เดือน/ปีเกิด")
        			$("#age").focus();
        		}
        	}else{
        		alert("กรุณากรอกเบอร์โทรให้ถูกต้อง")
        		$("#phone").focus();
        	}

		});
	});

	// function validatePhone(txtPhone) {
 //    	var phone = document.getElementById("phone").value;
 //    	var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
 //    	if (filter.test(phone)) {
 //        	return true;
 //    	}
 //    	else {
 //        	return false;
 //    	}
	// }