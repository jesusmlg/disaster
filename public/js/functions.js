$(document).ready(function(){
	$(document).on('click','#btn-add-tag',function(e){
		e.preventDefault();		
		var tag = $("#txt-tag").val();		
		var data = { 'name' : tag,
					'_token': $('meta[name="csrf-token"]').attr('content')
				};
		$.ajax({
			url: '/tag/create',
			method: 'post',
			dataType: 'json',
			data: data,
			success: function(data)
			{
				alert(data.message);
			},
			error: function(data)
			{
				alert("Error");
			},
			complete: function(data)
			{

			}

		});
	});
});