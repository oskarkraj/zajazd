<!doctype html> 
<html> 
<head> 
<meta charset="utf-8"> 
<title>Dokument bez tytu³u</title> 
</head> 
<body> 

<?php

$EmailFrom = Trim(stripslashes($_POST['Email'])); 
$EmailTo = "zajazdnawzgorzu@interia.pl";
$Subject = "Wiadomoœæ do Zajazdu na Wzgórzu Moszczenica";
$Name = Trim(stripslashes($_POST['Name'])); 
$Tel = Trim(stripslashes($_POST['Tel'])); 
$Email = Trim(stripslashes($_POST['Email'])); 
$daterez1 = Trim(stripslashes($_POST['daterez1']));
$daterez2 = Trim(stripslashes($_POST['daterez2'])); 

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Imiê i Nazwisko: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Telefon: ";
$Body .= $Tel;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Data przyjazdu: ";
$Body .= $daterez1;
$Body .= "\n";
$Body .= "Data wyjazdu: ";
$Body .= $daterez2;
$Body .= "\n";

// send email 
//$Body = iconv(mb_detect_encoding($Body, mb_detect_order(), true), "UTF-8", $Body);  
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>\r\nContent-Type: text/html;charset=utf-8\r\nMIME-Version: 1.0"); 


// redirect to success page 

if ($success){ 
  print "<meta http-equiv=\"refresh\" content=\"0;URL=kontakt.html\">"; 
} 
else{ 
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">"; 
} 


?> 

</body> 
</html>