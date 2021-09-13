$(function(){

// ------------------- Lattitude , Langitude, Price ----------------------
	$.validator.addMethod("number_escape_characters", function(value, element) 
	{
    	return this.optional(element) || value === "NA" ||
        value.match(/^[0-9,\+\.-]+$/);
	}, "Please enter a valid number, or 'NA'");


//-------------------- FORMS : hotel_add.php & hotel_edit.php -------------------
		$("#frmAddHotel").validate({
			rules:{
				name: {
						required: true,
						minlength: 5
					},
				address: {
						required: true,
						minlength: 5
					},
				city: {
						required: true,
						minlength: 3
					},
				tel_no: {
						required: true,
						digits: true,
						minlength: 9
					},
				lat: {
						required: true,
						number_escape_characters: true,
						minlength: 3
					},
				lan: {
						required: true,
						number_escape_characters: true,
						minlength: 3
					},
				description: {
						required: true,
						minlength: 5
					},
				u_email: {
						required: true,
						email: true
					},
				u_password: {
						required: true,
						minlength: 3
					}
			},
			messages:{
				name: {
						required: "Hotel name is required",
						minlength: "Hotel name must consist of at least 5 characters"
					},
				address: {
						required: "Hotel address is required",
						minlength: "Hotel address must consist of at least 5 characters"
					},
				city: {
						required: "Hotel located city is required",
						minlength: "City consist of at least 3 characters"
					},
				tel_no: {
						required: "Hotel contact no is required",
						digits: "Contact no is invalid, cannot include characters",
						minlength: "Contact no requires 10 digits"
					},
				lat: {
						required: "lattitude is required",
						number_escape_characters: "lattitude is invalid",
						minlength: "Consist of at least 3 characters"
					},
				lan: {
						required: "langitude is required",
						number_escape_characters: "langitude is invalid",
						minlength: "Consist of at least 3 characters"
					},
				description: {
						required: "Description is required",
						minlength: "Description consists of at least 5 characters"
					},
				u_email: {
						required: "Email is required",
						email: "invalid email address"
					},
				u_password: {
						required: "Password is required",
						minlength: "minimum lenght is 3"
					}
			}
		})

//-------------------- FORMS : location_add.php & location_edit.php -------------------
		$("#frmLocation").validate({
			rules:{
				title: {
						required: true,
						minlength: 5
					},
				city: {
						required: true,
						minlength: 3
					},
				lat: {
						required: true,
						number_escape_characters: true,
						minlength: 5
					},
				lan: {
						required: true,
						number_escape_characters: true,
						minlength: 5
					},
				keyword: {
						required: true,
						minlength: 5
					},
				description: {
						required: true,
						minlength: 5
					}
			},
			messages:{
				title: {
						required: "Location name is required",
						minlength: "Location name must consist of at least 5 characters"
					},
				city: {
						required: "Location city is required",
						minlength: "Location city consist of at least 3 characters"
					},
				lat: {
						required: "Location lattitude is required",
						number_escape_characters: "Location lattitude is invalid",
						minlength: "Lattitude consist of at least 5 characters"
					},
				lan: {
						required: "Location langitude is required",
						number_escape_characters: "Location lattitude is invalid",
						minlength: "langitude consist of at least 5 characters"
					},
				keyword: {
						required: "Keywords are required",
						minlength: "Keyword consist of at least 5 characters"
					},
				description: {
						required: "Description is required",
						minlength: "Description consists of at least 5 characters"
					}
			}
		})

//-------------------- FORMS : room_add.php & room_edit.php -------------------
		$("#frmRoom").validate({
			rules:{
				room_id: {
						required: true,
						minlength: 3
					},
				price: {
						required: true,
						number_escape_characters: true,
						minlength: 2
					},
				description: {
						required: true,
						minlength: 5
					}
			},
			messages:{
				room_id: {
						required: "Room reference is required",
						minlength: "Room reference must consist of at least 3 values"
					},
				price: {
						required: "Room price is required",
						number_escape_characters: "Room price is invalid",
						minlength: "Room price consist of at least 2 values"
					},
				description: {
						required: "Room description is required",
						minlength: "Room description consists of at least 5 characters"
					}
			}
		})

//-------------------- FORMS : user_add.php & user_edit.php -------------------
		$("#frmUser").validate({
			rules:{
				full_name: {
						required: true,
						minlength: 3
					},
				username: {
						required: true,
						minlength: 4
					},
				email: {
						required: true,
						email: true
					},
				password: {
						required: true,
						minlength: 3
					},
				tel_no: {
						required: true,
						minlength: 9,
						digits: true
					}
			},
			messages:{
				full_name: {
						required: "Full name is required",
						minlength: "Full name must consist of at least 3 characters"
					},
				username: {
						required: "Username is required",
						minlength: "Username must consist of at least 4 values"
					},
				email: {
						required: "Email is required",
						email: "Email is invalid"
					},
				password: {
						required: "Password is required",
						minlength: "Password must consist of at least 3 values"
					},
				tel_no: {
						required: "Mobile no is required",
						minlength: "Mobile no consists of at least 10 digits",
						digits: "Mobile no is invalid"
					}
			}
		})

})



