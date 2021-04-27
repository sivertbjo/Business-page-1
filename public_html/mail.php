<?php
switch (@$_GET['do'])
 {

 case "send":

      $fname = $_POST['fname'];
      $femail = $_POST['femail'];
      $fsubject = $_POST['fsubject'];

 
      $fsendmail = $_POST['fsendmail'];
      $secretinfo = $_POST['info'];

    if (!preg_match("/\S+/",$fname))
    {
      unset($_GET['do']);
      $message = "Name required. Please try again.";
      break;
    }
    if (!preg_match("/^\S+@[A-Za-z0-9_.-]+\.[A-Za-z]{2,6}$/",$femail))
    {
      unset($_GET['do']);
      $message = "Email Address is incorrect. Please try again.";
      break;
    }
 
    if ($secretinfo == "")
    {
       $myemail = "yourmailhere@mail.com";
       $emess = "Name: ".$fname."\n";
       $emess.= "Email: ".$femail."\n";
       $emess.= "Subject: ".$fsubject."\n";
       $emess.= "Message: ".$fsendmail;
       $ehead = "From: ".$femail."\r\n";
       $subj = "An Email from ".$fname." ".$mname." ".$lname."!";
       $mailsend=mail("$myemail","$subj","$emess","$ehead");
       $message = "Email was sent.";
    }
 
       unset($_GET['do']);
       header("Location: thankyou.html");
     break;
 
 default: break;
 }
?>