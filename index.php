<!DOCTYPE html>
<html>
<head>
	<title>AJAX Example</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container">
	<h1>CRUD example using PHP and AJAX.</h1>
	<hr>
	<form method="post" id="student-form">
		<div class="form-group">
			<input class="form-control" type="text" name="sname" id="sname" placeholder="Student Name" required>
		</div>
		<div class="form-group">
			<input class="form-control" type="email" name="email" id="email" placeholder="Email" required>
		</div>

		
		<button class="form-control btn btn-primary" type="submit" name="insert" id="insert">
			<i class="fa fa-user-plus"></i> ADD
		</button>
	</form>
	<hr>
	<table class="table">
		<thead class="thead thead-dark">
			
		</thead>
		<tbody class="tbody">
			
		</tbody>
	</table>
	<p class="err"></p>
	</div>
</body>
</html>

<script>
$(document).ready(function(){
 
	function load_table(view = ''){
		$.ajax({
			url:"fetch.php",
			method:"POST",
			data:{view:view},
			dataType:"json",
			success:function(data){
				if(data.count>0){
					$('.thead').html(data.thead);
					$('.tbody').html(data.tbody);	
					$('.err').html("");			
				}	else $('.err').html(data.tbody);
			}
		});
	}
 
	$('#student-form').on('submit', function(event){
		event.preventDefault();		

		var form_data = $(this).serialize();
		$.ajax({
			url:"insert.php",
			method:"POST",
			data:form_data,
			success:function(data){
		 		$('#student-form')[0].reset();
		 	load_table();
			}
		});
	});

	$(document).on("click", ".btn-delete", function(){
		var id = $(this).attr("id");
		id=id.substring(4,6);

		$.ajax({
			url:"delete.php/?id="+id,
			method:"GET",
			data:id,
			success:function(data){
			 	$('.thead').html("");
				$('.tbody').html("");	
				$('.err').html("");	
			 	load_table();
			}
		});
	});

	$(document).on("click", ".btn-update", function(){
		if($('#sname').val()!="" && $('#email').val()!=""){
			var id = $(this).attr("id");
			id=id.substring(4,6);
			var sname = $('#sname').val();
			var email = $('#email').val();
			$.ajax({
				url:"update.php/?sname="+sname+"&email="+email+"&id="+id,
				method:"GET",
				data:id,
				success:function(data){
				 	$('.thead').html("");
					$('.tbody').html("");	
					$('.err').html("");	
				 	load_table();
				}
			});
		}else{
			alert("Cannot leave blank");
		}
	});


	/*$(document).on("click", ".btn-delete", function(){

		var id = $('.btn-delete').val();
    	console.log(id);

    	
	}); 	*/ 
 
	/*setInterval(function(){ 
	 	load_table();; 
	}, 5000);*/

	load_table();
 
});
</script>