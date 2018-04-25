var file;

$(document).ready(function(event) {
	$("#img-form").on('submit', function(e){
		e.preventDefault();
		e.stopPropagation();

		$("#upload_progress").show();
		var data = new FormData(this);

		$.ajax({
			url: "includes/upload.php",
			type: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			xhr: function(){
				//Shows progress of the upload
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function(e){
					if (e.lengthComputable) {
						var percent = e.loaded / e.total;
						var progress = $("#upload_progress");

						progress.empty();
						progress.append('<h1>' + Math.round(percent * 100) + ' %</h1>');
					}
				}, false);

				return xhr;
			},
			success: function(data){
				$("#upload_progress").hide();
				//Dispalys the uploaded image and hides the progress div
				var img = document.createElement('img');
				img.setAttribute('src', 'uploads/' + data);
				img.setAttribute('id', 'image');
				$(".img-holder").append(img);
				$("#img-form").hide();
				file = data;
			},
			error: function(xhr, status, error) {
			  	alert(xhr.responseText);
			}
		});
	});


	$("#r-left").on('click', function(e){
		e.preventDefault();
		e.stopPropagation();

		perform("trans", "rotate", "90", file);
	});

	$("#r-right").on('click', function(e){
		e.preventDefault();
		e.stopPropagation();

		perform("trans", "rotate", "-90", file);
	});

	$("#mirror").on('click', function(e){
		e.preventDefault();
		e.stopPropagation();

		perform("trans", "flip", "1", file);
	})

	$("#gray").on('click', function(e){
		e.preventDefault();
		e.stopPropagation();

		perform("filter", "gray", "", file);
	});

});

//Performs any operation the user chooses
function perform(op, command, value, file) {
	$.ajax({
			url: "includes/calls.php",
			type: "POST",
			data: {'op': op, 'command': command, 'value': value, 'file': file},
			dataType: "JSON",
			success: function(data){
				d = new Date();
				$("#image").attr({
					"src" : "edits/" + data + "?" + d.getTime()
				});
			},
			error: function(xhr, status, error){
				console.log(xhr.responseText);
				console.log(status);
				console.log(error);
			}

		});
}