$(function (){
	var dialog, form,

	function edit(){
		$('#edit').on('click', function(){
			$(this).hide();
			$('#submit').show();
			$("#date_acquired").show();
            $("#hardware_type").show();
            $("#item").show();
            $("#manufacturer").show();
            $("#number_of_supply").show();
            $("#price").show();
            $("#description").show();
		});
	}
	dialog = $('#update_supply').dialog({
		autoOpen:false,
		height: 500,
		width: true,
		buttons: {
			"Edit": edit,
			Cancel: function(){
				dialog.dialog ( "close" );
			}
		},
		close: function(){
			form[ 0 ].reset();
		}
	});
	form = dialog.find('form').on( 'submit', function( event ){
		event.preventDefault();
		edit();
	});

	$('#update_supply').on.('click', function(){
		dialog.dialog( "open" );
		$('#submit').hide();
		$("#date_acquired").hide();
        $("#hardware_type").hide();
        $("#item").hide();
        $("#manufacturer").hide();
        $("#number_of_supply").hide();
        $("#price").hide();
        $("#description").hide();
	});
});