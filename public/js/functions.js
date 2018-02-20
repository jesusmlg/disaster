$(document).ready(function(){

	$('.summernote').summernote({
		height: 300,
	});

	$(document).on('click','#txt',function(e){
		if(e.wich == 13)
			$('form-search').submit();
	});

	$(document).on('click','.delete-tag',function(e){
		e.preventDefault();
		url = $(this).attr('data-url');
		
		$.ajax({
			url: url,
			type:'delete',				
			dataType: 'json',
			data: {
				'_method': 'delete',
				'_token': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data){
				$("#note-tags").html(data.html);
			},
			error: function(data){
				alert("error");
			},
			complete:function(data)
			{
				
			}
		});

	});

	$(document).on('click','#btn-add-tag',function(e){
		
		e.preventDefault();				
		var tag = $("#txt-tag").val();	
		var note = $("#note_id").val();
		var data = { 'tag' : tag,
					 'note_id': note,
					'_token': $('meta[name="csrf-token"]').attr('content')
				};

		$.ajax({
			url: '/tag/create',
			method: 'post',
			dataType: 'json',
			data: data,
			success: function(data)
			{
				alert('ok');
				$("#note-tags").html(data.html);
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

	$(document).on('click','.delete-file',function(e){
		e.preventDefault();

		url = $(this).attr('data-url');
		alert(url);
		$.ajax({
			url: url,
			type:'delete',				
			dataType: 'json',
			data: {
				'_method': 'delete',
				'_token': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data){
				$("#note-files").html(data.html);
			},
			error: function(data){
				alert("error");
			},
			complete:function(data)
			{
				
			}
		});

	});

});