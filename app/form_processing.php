<?php
//****************************************
//edit here
$senderName = 'Nadine-bomer-2';
$senderEmail = $_SERVER['SERVER_NAME'];
$targetEmail = [];
$targetEmail = [ 'office@gofmans.co.il', 'ravit@gofmans.co.il', 'eli@gofmans.co.il', 'israel@gofmans.co.il'];
//$targetEmail = ['alemesh@acceptic.com'];
$messageSubject = 'Message from web-site - '. $_SERVER['SERVER_NAME'];
$redirectToReferer = true;
$redirectURL = $_SERVER['SERVER_NAME'];
//****************************************

// mail content

//var_dump($_POST); die;
$ufname = $_POST['name'];
$lname = $_POST['lname'];
$uphone = $_POST['tel'];
$umail = $_POST['email'];
$sources = $_POST['sources'];





    // prepare message text
    $messageText =	'First Name: '.$ufname."\n".
        'Last Name: '.$lname."\n".
        'Phone: '.$uphone."\n".
        'Email: '.$umail."\n".
        'Branch : '.$sources."\n";


// send email
$senderName = "=?UTF-8?B?" . base64_encode($senderName) . "?=";
$messageSubject = "=?UTF-8?B?" . base64_encode($messageSubject) . "?=";
$messageHeaders = "From: " . $senderName . " <" . $senderEmail . ">\r\n"
    . "MIME-Version: 1.0" . "\r\n"
    . "Content-type: text/plain; charset=UTF-8" . "\r\n";

//if (preg_match('/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/',$targetEmail,$matches))
foreach ($targetEmail as $val){
    mail($val, $messageSubject, $messageText, $messageHeaders);
}


$redirectToTnxPage = 'http://campaign.gofmans.co.il/nadine-bomer-2/thanks-page.html?Lead=true';
//$redirectToTnxPage = 'http://192.168.89.147/thanks-page.html?Lead=true';
// redirect
if($redirectToReferer) {
    header("Location: ".$redirectToTnxPage);
} else {
    header("Location: ".$redirectURL);
}

