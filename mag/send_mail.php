<?php
function Send_Mail($to,$subject,$body)
{
 $from = 'trof.hanna@gmail.com'; 
		$headers = "From: $from\r\nReply-to:$from\r\nContent-type:text/html;charset=utf-8\r\n";
        $result = mail($to, $subject, $body, $headers); 
		
}
?>