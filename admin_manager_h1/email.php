<?php
	$email_divhead = mysql_fetch_array(mysql_query("select email from admin where nama = '$_POST[divhead]'"));
    $subject_divhead = 'Your subject for email';
    $message_divhead = 'Body of your message';
    mail($email_divhead, $subject_divhead, $message_divhead);
?>