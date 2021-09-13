$(function(){

// ------------------- Lattitude , Langitude, Price ----------------------
	$.validator.addMethod("number_escape_characters", function(value, element) 
	{
    	return this.optional(element) || value === "NA" ||
        value.match(/^[0-9,\+\.-]+$/);
	}, "Please enter a valid number, or 'NA'");


//-------------------- FORMS : hotel_users_add_room.php & hotel_users_edit_room.php -------------------
		$("#frmHotelUserRoom").validate({
			rules:{
				room_id: {
						required: true,
						minlength: 2
					},
				price: {
						required: true,
						number_escape_characters: true
					},
				description: {
						required: true,
						minlength: 5
					},
				room_type_temp: 'required'
			},
			messages:{
				room_id:{
					required: "Room reference is required",
					minlength: "Room reference must consist of at least 2 characters"
				},
				price:{
					required: "Price perday is required",
					number_escape_characters: "Price perday is invalid"
				},
				description:{
					required: "Description is required",
					minlength: "Description must consist of at least 5 characters"
				},
				room_type_temp: "Room "
			}
		})



	
})



