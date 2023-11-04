<?php
	require('class.phpmailer.php');
    // send mail to client
      
	$subject1 = "Thank you for contacting us";

	$message1 = 'Hello '.$_POST['enquirer-name'] .','; 
	$message1 .='<br/><br/>';
	$message1 .='Thank you for contacting us. We will contact you as soon as we review your message.';
	$message1 .='<br/><br/> Regard,<br/>  RESOLVE OPS.';

	$name1 =$_POST['enquirer-email'];

	$mail_name1 = " RESOLVE OPS";
	$mail_from1 = "smtp@webmasterindia.net";

	$to1 = $_POST['enquirer-email'];
	$toname1 = "";
	$mail1 = new PHPMailer(false); // the true param means it will throw exceptions on errors, which we need to catch
	$mail1->SMTPDebug = 1;
	$mail1->IsSMTP(); // telling the class to use SMTP
	$mail1->CharSet = 'UTF-8';	 
	$mail1->Host       = "mail.webmasterindia.net"; // SMTP server
	$mail1->SMTPSecure = 'ssl';
	$mail1->SMTPAuth   = true;                  // enable SMTP authentication
	$mail1->Port       = 465;                    // set the SMTP port for the GMAIL server
	$mail1->Username   = "standard@webmasterindia.net"; // SMTP account username
	$mail1->Password   = 'XKj&1NT}pgyz';        // SMTP account password  /// W..lSXsB621(f$7q5P{J}MtE
	$mail1->From = $mail_from1;
	$mail1->AddAddress($to1);
	// $mail1->AddAddress($to1, $name1);
	$mail1->SetFrom($mail_from1, $mail_name1);
	$mail1->Body = $message1;
	$mail1->AddReplyTo($to1, '');
	  
	$mail1->Subject = $subject1;

	$mail1->MsgHTML($message1);

		
    // send mail to admin
    
	$subject = "Request A Consultation Form";
	$subject = "Contact details";

	$message = 'Hello Admin,'; 
	$message .='<br/><br/>';
	//~ $message .='Following are the details for Book Your Demo Today Form.';
	$message .="<table>";
	$message .="<tr><td>First Name:</td><td>".$_POST['enquirer-name']."</td></tr>";
	$message .="<tr><td>Last Name:</td><td>".$_POST['enquirer-lastname']."</td></tr>";
	$message .="<tr><td>Email Address:</td><td>".$_POST['enquirer-email']."</td></tr>";
	$message .="<tr><td>Phone Number:</td><td>".$_POST['enquirer-phoneno']."</td></tr>";
	// $message .="<tr><td>Company Name:</td><td>".$_POST['cname']."</td></tr>";
	$message .="<tr><td>Message:</td><td>".$_POST['enquirer-message']."</td></tr>";
	$message .='</table>';
	$message .= '<br/><br/> Regards,<br/> RESOLVE OPS.'; 

	
	$name =$_POST['enquirer-email'];
	 
	$mail_name = " RESOLVE OPS";
	$mail_from = "smtp@webmasterindia.net";

	$to = "siprogramming1@gmail.com";
	$toname = "";
	$mail = new PHPMailer(false); // the true param means it will throw exceptions on errors, which we need to catch
	$mail->SMTPDebug = 1;
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->CharSet = 'UTF-8';	 
	$mail->Host       = "mail.webmasterindia.net"; // SMTP server
	$mail->SMTPSecure = 'ssl';
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
	$mail->Username   = "standard@webmasterindia.net"; // SMTP account username
	$mail->Password   = 'XKj&1NT}pgyz';     //standard@#123%$6   // SMTP account password   W..lSXsB621(f$7q5P{J}MtE
	$mail->From = $mail_from;
	// $mail->AddAddress($to, $name);
	$mail->AddAddress($to);
	$mail->SetFrom($mail_from, $mail_name);
	$mail->Body = $message;
	$mail->AddReplyTo($to, '');
	  
	$mail->Subject = $subject;

	$mail->MsgHTML($message);

	if(
		$mail1->Send() && 
		$mail->Send())
		{		 	
			///echo "Thank you for getting in touch. We will contact you as soon as possible.";
			echo 1;
		}
	else
		{
			//$mail1->error();
			//echo 'Mailer error: '.$mail1->ErrorInfo;
			echo 0;
		}
	die();
?>
