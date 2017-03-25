<?php
        $to = 'hanna.trof@gmail.com'; 
		$from = $_POST['email'];
        $subject = $_POST['subject']; 
        $message = $_POST['message'];
		$headers = "From: $from\r\nReply-to:$from\r\nContent-type:text/html;charset=utf-8\r\n";
        $result = mail($to, $subject, $message, $headers); 
		
		if ($result) { 
			echo "<p>Сообщение отправлено! В ближайшее время мы вышлем Вам ответ на адрес указанной почты.</p>"; 
		} 
		else { 
			echo "<p>Сообщение не отправлено!</p>"; 
		} 
?>