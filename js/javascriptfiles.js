$(function(){
	var $registerForm = $("#frmRegister");
	if ($registerForm.length) {
		$registerForm.validate({
			rules:{
				full_name: {
						required: true,
						minlength: 3
					},
				username: {
						required: true,
						minlength: 3
					},
				email: {
						required: true,
						email: true
					},
				password: {
						required: true,
						minlength: 3
					},
				con_password: {
						required: true,
						minlength: 3,
						equalTo: "#password"
					}
			},
			messages:{
				full_name:{
					required: "Full name is required",
					minlength: "Full name must consist of at least 3 characters"
				},
				username:{
					required: "Username is required",
					minlength: "Username must consist of at least 3 characters"
				},
				email:{
					required: "Email is required",
					email: "Please enter a valid email address"
				},
				password:{
					required: "Password is required",
					minlength: "Password must consist of at least 3 characters"
				},
				con_password:{
					required: "Confirm password is required",
					equalTo: "Not matched with password"
				}
			}
		})
	}
})



