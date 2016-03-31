<?php
    mail('tejasvarsekar@gmail.com','My subject','message');
    echo "sent";
?>

<?php
	$to = "tejasvarsekar@gmail.com";
	$subject = "From FMR";
	$txt = "This is a test!";
	$headers = "From: tejasvarsekar@gmail.com" . "\r\n" .
	
mail($to,$subject,$txt,$headers,$headers);
?>