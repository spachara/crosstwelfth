<?

### INCLUDE PHPMAILER à¢éÒÁÒ ###
include ("class.phpmailer.php");

### FUNCTION SEND MAIL ####

$messages = "TEST SMTP MAILS";

$to_name = "MineMint";
$to_email = "z.nosferatu5@gmail.com";
$from_name = "MineS";
$email_user_send = "cross12mail@gmail.com";
$email_pass_send = "cross2014";
$subject = "Cross Twelfth :: Register";
//$body_html = "xxxx";
$body_text = $messages;
scriptdd_sendmail($to_name, $to_email, $from_name, $email_user_send, $email_pass_send, $subject, $body_html, $body_text);


function scriptdd_sendmail($to_name, $to_email, $from_name, $email_user_send, $email_pass_send, $subject, $body_html, $body_text) {

$mail = new PHPMailer();
$mail -> From     = $email_user_send;
$mail -> FromName = $from_name;

$mail -> AddAddress($to_email,$to_name);
$mail -> Subject	= $subject;
$mail -> Body		= $body_html;
$mail -> AltBody	= $body_text;
$mail -> IsHTML (true);

$mail->IsSMTP();
$mail->Host = 'ssl://smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPAuth		= true;
//$mail->SMTPDebug	= true;
$mail->Username = $email_user_send;
$mail->Password = $email_pass_send;

$mail->Send();
$mail->ClearAddresses();

}
### FUNCTION SEND MAIL ####











#### àÇÅÒàÃÕÂ¡ãªéàÃÕÂ¡à»ç¹ Function áºº¹Õé #####
$to_name			="ª×èÍ¢Í§»ÅÒÂ·Ò§";
$to_email			="email »ÅÒÂ·Ò§";
$from_name			="ª×èÍ¢Í§¤Ø³";
$email_user_send	="Gmail ¢Í§¤Ø³";
$email_pass_send	="ÃËÑÊ¼èÒ¹¢Í§ Gmail ¢Í§¤Ø³";
$subject			="ËÑÇ¢éÍ Email";
$body_html			="à¹×éÍËÒà»ç¹ HTML";
$body_text			="à¹×éÍËÒà»ç¹ Text ¸ÃÃÁ´Ò";

scriptdd_sendmail($to_name,$to_email,$from_name,$email_user_send,$email_pass_send,$subject,$body_html,$body_text);

echo "Êè§ä»áÅéÇ";

?>