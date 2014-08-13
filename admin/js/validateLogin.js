function validateForm() {
	var x=document.forms["form"]["username"].value;
	var y=document.forms["form"]["password"].value;
	var z=document.forms["form"]["captcha_code"].value;
	if (x=="") {
		alert("Anda belum mengisi Username :)");
		return false;
	}	
	if (y=="") {
		alert("Anda belum mengisi Password :)");
		return false;		
	}
	if (z=="") {
		alert("Anda belum mengisikan kode Captcha :)");
		return false;		
	}
}