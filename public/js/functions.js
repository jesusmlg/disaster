$(document).ready(function(){

	var typingTimer;          
	var doneTypingInterval = 600;

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

	$(document).on('input propertychange paste keyup','#txt-tag', function(){		
		clearTimeout(typingTimer);
  		typingTimer = setTimeout(tagList, doneTypingInterval);
	});

	$(document).on('keydown','#txt-tag', function(){		
		clearTimeout(typingTimer);
	});

	function tagList()
	{		
		var pos = $('#txt-tag').position();
		
		$('#tag-list').css({'top': pos.top - 20, 'left': pos.left });

		$.ajax({
			url: '/tag/list',
			dataType: 'json',
			data: 
			{
				'txt' : $('#txt-tag').val(), 
				'note_id': $("#note_id").val()
			},
			method: 'get',
			success: function(data)
			{
				$('#tag-list').css('display', 'block')
				$("#tag-list").html(data.html);
				
			},
			error: function(data)
			{
				alert("error");
			}


		});
	}

	$(document).on('click','#tag-list ul li',function(e){
		
		var txt = $(this).html();
		
		$('#txt-tag').val(txt);					
		$('#btn-add-tag' ).trigger("click");	
		$('#txt-tag').val('');
		$('#tag-list').css('display', 'none')

	});

	$(document).on('click','.delete-user',function(e){
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
				$("#note-users").html(data.html);
			},
			error: function(data){
				alert("error");
			},
			complete:function(data)
			{
				
			}
		});

	});

	$(document).on('input propertychange paste keyup','#txt-user', function(){		
		clearTimeout(typingTimer);
  		typingTimer = setTimeout(userList, doneTypingInterval);
	});

	$(document).on('keydown','#txt-user', function(){		
		clearTimeout(typingTimer);
	});

	function userList()
	{		
		var pos = $('#txt-user').position();
		
		$('#user-list').css({'top': pos.top - 20, 'left': pos.left });

		$.ajax({
			url: '/user/list',
			dataType: 'json',
			data: 
			{
				'txt' : $('#txt-user').val(), 
				'note_id': $("#note_id").val()
			},
			method: 'get',
			success: function(data)
			{
				$('#user-list').css('display', 'block')
				$("#user-list").html(data.html);
				
			},
			error: function(data)
			{
				alert("error");
			}


		});
	}

	$(document).on('click','#user-list ul li',function(e){
			
		var user = $(this).attr('id');	
		var note = $("#note_id").val();
		
		var data = { 'user_id' : user,
					 'note_id': note,
					'_token': $('meta[name="csrf-token"]').attr('content')
				};

		$.ajax({
			url: '/note/user/create',
			method: 'post',
			dataType: 'json',
			data: data,
			success: function(data)
			{
				$("#note-users").html(data.html);
			},
			error: function(data)
			{
				alert("Error");
			},
			complete: function(data)
			{
				$('#txt-user').val('');
				$('#user-list').css('display', 'none')
			}

		});

	});
	
});