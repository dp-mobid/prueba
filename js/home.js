

$(document).ready(function(){
	cargarToken();
	click();
});
function cargarToken(){
	var token = sessionStorage.getItem('token');
	$("#divToken").html(token);
}

function click(){
	$("#btnVolver").click(function(){
		window.location.href = 'index.php';
	});
	$("#btnData").click(function(){
		var token = sessionStorage.getItem('token');
		$.ajax({
		  	type:'GET',
		  	url: "http://localhost:8080/te10go/menu", 
		  	//url: "php/login.php",
			headers: {
				"Authorization":token,
			},
		   	contentType: 'application/json;charset=UTF-8',
		   	//data: JSON.stringify(jsonData),
		   	//data: form,
		   	//processData: false,
		   	//contentType: false,
		   	beforeSend: function () {
				$("#divResponse").html("Procesando, espere por favor...");
			},
		   	success: function(result,status,xhr){
		   		if(result != null){
		   			$("#divResponse").html(result[0].description);
		   			console.log(result);
		       	}
		   	},
		   	error: function(xhr,status,error){
		   		console.log(xhr);
		   		console.log(status);
		   		console.log(error);
		   		$("#divResponse").html("error");
		   	}
		   	
		});
	});
	
}