<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/style.css" />
<title>Retro Portfolio - Contact Form</title>
</head>
<body>
<?php
function is_valid_email($vemail) {
	$result = TRUE;
	if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $vemail)) {
	$result = FALSE;
	}
	return $result;
}
//if "email" is filled out, send email
if (isset($_REQUEST['email']) && $_REQUEST['email'] != '' && $_REQUEST['name'] != '' && $_REQUEST['message'] != ''
	&& is_valid_email($_REQUEST['email']))
{
	//send email
	$email = $_REQUEST['email'] ;
	$name = $_REQUEST['name'] ;
	$subject = $_REQUEST['subject'] ;
	$message = $_REQUEST['message'] ;
	$recievers_email = "paz.romero.soto@gmail.com";
		
	mail($recievers_email, "$subject",
	$message, "From:" . $email);
	echo "<p class='form_success'>Mensaje enviado! Gracias!</p><p class='form_success_sub'>Responderé lo antes posible.</p>";
}
else
{
	//if "email" is not filled out, display the form
	if(!is_valid_email($_REQUEST['email']))
	{
		echo "<p class='form_error'>Por favor, inserta una dirección de correo.</p>";						   
	}
	else if($_REQUEST['name'] == '')
	{
		echo "<p class='form_error'>Por favor, escribe tu nombre.</p>";
	}
	else if($_REQUEST['message'] == '')
	{
		echo "<p class='form_error'>Por favor, deja tu mensaje.</p>";
	}
}
?>
</body>
</html>