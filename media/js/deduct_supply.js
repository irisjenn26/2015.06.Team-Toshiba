deduct_supply = 
{
	process: function()
	{
		$.ajax({
			type:'POST',
			url:'http://localhost/toshiba/supply/deduct_supply',
			//data: ,
			dataType:"JSON",
			success: function(data){

			}
		});
	}
};