<?php
switch (@$_GET['do'])
 {

 case "send":

      $fname = $_POST['fname'];
      $femail = $_POST['femail'];
      $fsubject = $_POST['saddy'];

 
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
       $myemail = "sivertbjorneras@gmail.com";
       $emess = "Name: ".$fname."\n";
       $emess.= "Email 1: ".$femail."\n";
       $emess.= "Email 2: ".$f2email."\n";
       $emess.= "Street Address: ".$saddy."\nApt/Ste: ".$sapt."\n";
       $emess.= "City: ".$scity."\nState: ".$sstate."\nZip/Post Code:".$szip."\n";
       $emess.= "Country: ".$scountry."\n";
       $emess.= "Phone number 1: ".$fphone1."\n";
       $emess.= "Phone number 2: ".$fphone2."\n";
       $emess.= "Phone number 3: ".$fphone3."\n";
       $emess.= "Comments: ".$fsendmail;
       $ehead = "From: ".$femail."\r\n";
       $subj = "An Email from ".$fname." ".$mname." ".$lname."!";
       $mailsend=mail("$myemail","$subj","$emess","$ehead");
       $message = "Email was sent.";
    }
 
       unset($_GET['do']);
       header("Location: index.php");
     break;
 
 default: break;
 }
?>


<html>
<body>
<form action="email_form.php?do=send" method="POST">
<p>* Required fields</p>
<?php
   if ($message) echo '<p style="color:red;">'.$message.'</p>';
?>
   <table border="0" width="500">
     <tr><td align="right">Name: </td>
         <td><input type="text" name="fname" size="30" value="<?php echo @$fname ?>"></td></tr>
   </table>
<p>
   <table border="0" width="500">
     <tr><td align="right">Email: </td>
         <td><input type="text" name="femail" size="30" value="<?php echo @$femail ?>"></td></tr>
   </table>
<p>
   <table border="0" width="600">
     <tr><td align="right">Subject: </td>
         <td><input type="text" name="saddy" size="40" value="<?php echo @$saddy ?>"></td></tr>
   </table>
<p>
   <table border="0" width="500"><tr><td>
     Message:<br />
     <TEXTAREA name="fsendmail" ROWS="6" COLS="60"><?php if($fsendmail) echo $fsendmail; ?></TEXTAREA>
     </td></tr>
     <tr><td align="right"><input type="submit" value="Send Now">
     </td></tr>
   </table>
   </form>
</body>
</html> 