<?php
  /*__________________INPUT_DATA______________________*/

  $to_email = "rnbowsky@gmail.com"; // you are sending email to .. change the email recipient
  $your_name = "John";

  /*____________________SCRIPT________________________*/
    
  require("InvitationEmail.php");
    
  $messageDetails = array();
  $messageDetails["message_subject"] = "Invitation to MAMP PRO";
  $messageDetails["to_email"] = $to_email; 
  $messageDetails["from_name"] = "MAMP PRO";
  $messageDetails["from_email"] = "donotreply";
		
  $invitationEmail = new InvitationEmail();
		
  $messageBody = $invitationEmail->generateMessageBody();
  $emailMessage = str_replace("{name}", $your_name, $messageBody);
		
  $messageDetails["message_body"] = $emailMessage;
		
  $invitationEmail->sendEmailMessage($messageDetails);
	
  $returnValue["status"] = "200";
  $returnValue["message"] = "Email sent to ".$to_email.". Check it in your Inbox or Spam Folder";

  echo json_encode($returnValue);
?>