<?php
	$email_manager = mysql_fetch_array(mysql_query("select email from admin where nama = '$_POST[manager]'"));
    $subject_manager = 'Your subject for email';
    $message_manager = 'Body of your message';
    mail($email_manager, $subject_manager, $message_manager);
?>