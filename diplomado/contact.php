<?php
// Website Contact Form Generator 
// http://www.tele-pro.co.uk/scripts/contact_form/ 
// This script is free to use as long as you  
// retain the credit link  

// get posted data into local variables
$EmailFrom = Trim(stripslashes($_POST['EmailFrom'])); 
$EmailTo = "paz.romero.soto@gmail.com";
$Subject = "Contacto desde Paz Romero web";
$Nombre = Trim(stripslashes($_POST['Nombre'])); 
$Pais = Trim(stripslashes($_POST['Pais'])); 
$Telefono = Trim(stripslashes($_POST['Telefono'])); 
$Comentario = Trim(stripslashes($_POST['Comentario'])); 

// validation
$validationOK=true;
if (Trim($EmailFrom)=="") $validationOK=false;
if (Trim($Nombre)=="") $validationOK=false;
if (Trim($Telefono)=="") $validationOK=false;
if (Trim($Comentario)=="") $validationOK=false;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Nombre: ";
$Body .= $Nombre;
$Body .= "\n";
$Body .= "Pais: ";
$Body .= $Pais;
$Body .= "\n";
$Body .= "Telefono: ";
$Body .= $Telefono;
$Body .= "\n";
$Body .= "Comentario: ";
$Body .= $Comentario;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=ok.html\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
}
?>