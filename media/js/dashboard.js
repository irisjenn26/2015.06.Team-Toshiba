$(document).ready(function(){
	showDashboard.initDashboard();
});

var showDashboard = {
	initDashboard: function(){
		showDashboard.loadDashboard();
	},

	loadDashboard: function(){
		$.ajax({
			type: 'POST',
				url:'http://localhost/toshiba/dashboard',
				dataType: 'JSON',
				success: function(data){
					$("#total_income").html(data.total);
					$("#mothly_income").html(data.month);
					$("#yearly_income").html(data.year);
				},
				complete:function(){
					setTimeout("showDashboard.loadDashboard()", 5000);
				}
		});
	}
};