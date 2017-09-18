$(document).ready(function(){
	$("#mnuProfile").click(function(){
		$("#menuPrincipal").toggle("slow");
	});
	
	$("#changePass").click(function(){
		var s = prompt("Enter your new password");
		var s2 = prompt("Confirm your password"); 
		
		if (s2 != s && s1 != '')
			alert("Password confirmation does not match");
		else{
			$.post('clogin', {
				"pass": s,
				"action": "changePass"
			}, function(data){
				if (!data.band){
					alert("An error occurred while changing the pass, check with the administrator");
				}else
					alert("Password updated");
			}, "json");
		}
	});
});