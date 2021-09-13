$(function(){
	var $frmProvince = $("#frmProvince");
	if($frmProvince.length)
	{
		$frmProvince.validate({
			rules:{
				province_title:{
					required: true
				}
			},
			messages:{
				province_title:{
					required: "Province is required"
				}
			}
		})
	}

});