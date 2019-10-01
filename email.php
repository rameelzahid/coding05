<?php
/*
Name: Rameel Zahid
Assignment: 05
Purpose: This is the email php file which stems off of the previous assignment.
 */
		
function redirect($url) {
    
    ob_start();
    header('Location: ' . $url);
    ob_end_flush();
    die();
}

function main() {
    if (!empty($_POST)) 
    {

		 $name = substr(strip_tags(trim($_POST['name'])),0,64);
		 $message = substr(strip_tags(trim($_POST['message'])),0,64);
		 $subject = substr(strip_tags(trim($_POST['subject'])),0,64);
		 $from = filter_var($_POST['remail1'], FILTER_VALIDATE_EMAIL);
		 
		 if ($name != '' && $subject !='' && $message !='' && $from )
		 {
			 
			$headers = "From: $from\r\n";
			$headers .= "Reply-To: $from\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
			
			$success = mail('rameel.zahid@g.austincc.edu', $subject . ' : ' . $name, $message, $headers);
			
			if ($success) 
			{
				redirect ('success.php');
			}	
			else 
			{
				redirect ('error.php');
			}
		 }
		 else 
		 { 
			redirect('error.php'); 
		 }

    } else {
			redirect('error.php'); 
    }
}

main();

