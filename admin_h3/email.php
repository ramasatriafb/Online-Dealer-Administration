<?php
	$email_sv = mysql_fetch_array(mysql_query("select email from admin where nama = '$_POST[sv]'"));
    $subject_sv = 'Your subject for email';
    $message_sv = 'Body of your message';
    mail($email_sv, $subject_sv, $message_sv);
?>