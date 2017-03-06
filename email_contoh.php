<?php
	$email_sv = mysql_fetch_array(mysql_query("select email from admin where nama = '$_POST[sv]'"));
    $subject_sv = 'Your subject for email';
    $message_sv = 'Body of your message';
    mail($email_sv, $subject_sv, $message_sv);
	$email_manager = mysql_fetch_array(mysql_query("select email from admin where nama = '$_POST[manager]'"));
    $subject_manager = 'Your subject for email';
    $message_manager = 'Body of your message';
    mail($email_manager, $subject_manager, $message_manager);
	$email_divhead = mysql_fetch_array(mysql_query("select email from admin where nama = '$_POST[divhead]'"));
    $subject_divhead = 'Your subject for email';
    $message_divhead = 'Body of your message';
    mail($email_divhead, $subject_divhead, $message_divhead);
?>