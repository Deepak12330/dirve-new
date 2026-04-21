$(document).ready(function(){
	$("#email").on('input',function(){
		$("#loading").removeClass("d-none");
	})

	// end loading on email


	$("#email").on('change',function(){


		

		var email = $("#email").val();

		$.ajax({

			type : "POST",
			url : "php/email_authocation.php",
			data : {email: email},

			success:function(response)
			{
				if(response.trim() == "notfound")
				{
						$("#loading i")
					.removeClass("fa-spinner fa-spin")
					.addClass("fa-check-circle text-success");
					$("#send_otp").removeClass("d-none")


				}
				else
				{
					$("#loading i").removeClass("fa-spinner fa-spin")
					.addClass("fa-times-circle text-danger");
					$("#singup_btn").addClass("disabled btn-secondary");







				}


			}
		})

		// email authentication ..//





			$("#send_otp").on('click',function(){
				var send_email = $("#email").val();

				

					$.ajax({
						type : "POST",
						url : "php/send_otp.php",
						data : {send_email: send_email},

							

						success:function(response)
						{
							if(response.trim() == "success")
							{
								$("#otp_box").removeClass("d-none");
							}
							else
							{
								$("#send_otp").removeClass("d-none");
							}

						}
					})

			})



			

	})

	// send otp btn 


	$("#otp").on('change',function(){

				var otp_val = $("#otp").val();
				var email_verify = $("#email").val();


				$.ajax({
					type : "POST",
					url : "php/verify_otp.php",
					data : {otp_val: otp_val,email_verify: email_verify},

					success:function(response)
					{
						alert(response);
					}
				})
				
			})

//otp check button 


// signup btn 

	$("#singup_btn").on('click',function(e){
		e.preventDefault();
		var username = $("#username").val();
		var user_email = $("#email").val();
		var password = $("#password").val();


		$.ajax({
			type : "POST",
			url : "php/signup.php",
			data : {username:username, user_email:user_email, password:password},
			success:function(response)
			{
				alert(response);
			}
		})
	})







$("#login_btn").on('click',function(){
	const myModal = new bootstrap.Modal(document.getElementById('myModal'));
	myModal.show();

})


$("#login_user_btn").on('click',function(){
	var login_user = $("#login_user").val();
	var login_password = $("#login_password").val();

	$.ajax({
		type : "POST",
		url : "php/login.php",
		data : {login_user: login_user, login_password: login_password},

		success:function(response)
		{
			alert(response);
		}
	})
	
	
})





	



})