<?php
require('phpmailer/class.phpmailer.php');
$mail = new PHPMailer();
$subject = "Test Mail using PHP mailer";
$content = "<b>This is a test mail using PHP mailer class.</b>";
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = 587;  
$mail->Username = "sonuahmad87@gmail.com";
$mail->Password = "sonuahmad";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("info@naseemo.com", "Naseemo");
$mail->AddReplyTo("no-reply@naseemo.com", "No Reply");
$mail->AddAddress("sonuahmad@outlook.com");
$mail->Subject = $subject;
$mail->WordWrap   = 80;
$mail->MsgHTML($content);
$mail->IsHTML(true);

if(!$mail->Send()) {
	echo "Problem on sending mail";
} else { 
echo "Mail sent";
}
?>