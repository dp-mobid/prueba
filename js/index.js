$(document).ready(function(){
	//alert('Hola mundo');
	click();
});


function click(){
	$("#btnLlamar").click(function(){

		/*
		var jsonData = {
			"username":user, 
			"password":password
		};
		*/
		var form = new FormData();
		form.append('usuario',$('#txtUser').val());
		form.append('contrasenia',$('#txtPassword').val());
		
		$.ajax({
		  	type:'POST',
		  	//url: "http://localhost:8080/te10go/auth", 
		  	url: "php/login.php", 
		   	//contentType: 'application/json;charset=UTF-8',
		   	//data: JSON.stringify(jsonData),
		   	data: form,
		   	processData: false,
		   	contentType: false,
		   	beforeSend: function () {
				$("#div1").html("Procesando, espere por favor...");
			},
		   	success: function(result,status,xhr){
		   		if(result.result == 1){
		   			sessionStorage.setItem('token', result.token);
		       		window.location.href = 'home.php';	
		   		}
		   	},
		   	error: function(xhr,status,error){
		   		console.log(xhr);
		   		console.log(status);
		   		console.log(error);
		   	},
		   	complete: function () {
				$("#div1").html("");
			},
		});
	});
}
		