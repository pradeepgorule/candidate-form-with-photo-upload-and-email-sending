
 <html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Spark Connect - Rewind &amp; Forecast</title>
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="css/form.css" rel="stylesheet">


</head>
  <body>
  	<div id="wrapper">
       <!--CONTAINER:STARTS-->
       <div class="container">
       <!--ROW:STARTS-->
          <div class="row">
                <header>
               	  <img src="images/banner.png" alt="logo" class="img-responsive mauto mb10">

               <!-- <div class="mauto tcenter mtop mb10"> <h1 class="itv bold">Part of Indian Television Dot Com Group</h1></div>
                <p class="text-center present">presents</p>
                <img src="images/TAOPP-Logo02.png"  alt="logo" class="img-responsive mauto">-->
               <!-- <h2>9th February 2018, Mumbai</h2> -->
               <!-- <div id="imagemin" class="text-center"><img src="images/multi.png" class="img-responsive mauto"></div>-->
                </header>
</div>
<div class="thankyou">
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$host = "localhost"; /* Host name */
$user = "dbadmin"; /* User */
$password = "^b^@!!T117C%^$%%"; /* Password */
$dbname = "anx_db"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
//Load Composer's autoloader
require 'mail/vendor/autoload.php';





if(isset($_POST['submit']))
{

  $name = $_FILES['file']['name'];
 $file_tmp = $_FILES['file']['tmp_name'];
 $fname= $_POST['full_name'];
 $other = $_POST['other'];
 $job = $_POST['Job'];
 $mob = $_POST['mob'];
 $ex = $_POST['experience'];
 $email = $_POST['email'];
 $location = $_POST['location'];
 $target_dir = "/mnt/hd2/home/anx/wordpress/mesc_candidate_form/upload/";
 $target_file = $target_dir . basename($_FILES["file"]["name"]);

$temp = explode(".", $_FILES["file"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
 // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 // Valid file extensions
 $extensions_arr = array("jpg","jpeg","png","gif");
$newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["file"]["name"]));
 // Check extension

 if( in_array($imageFileType,$extensions_arr) ){
 move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$newfilename);
echo $target_dir.$newfilename;
  // Insert record
  if($job !="Other")
  {
  $sql = "insert into anx_form(fname,email,mobile,job,location,exp,image) values('$fname','$email','$mob','$job','$location','$ex','$target_dir$newfilename')";
    }
    else
    {
  $sql = "insert into anx_form(fname,email,mobile,job,location,exp,image) values('$fname','$email','$mob','$other','$location','$ex','$target_dir$newfilename')";
    }
  mysqli_query($con,$sql);

  // Upload file
  move_uploaded_file($_FILES['file']['name'],$target_dir.$name);

 }

 //email sending 
  if ($con->query($sql) === true) {

      echo "<h3>Thank you for registring</h3>";
        echo "<h5>You will receive a confirmation soon.</h5>";
        echo "";
        //email sending to user
        $from = 'animationxpressindia@gmail.com';
        $msg = "thank you for registration";
    $msg = wordwrap($msg,1000);

    mail($email,"My subject",$msg);

     $message_user = '<table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="background:black; border:2px solid #023454;">
  <tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
     <tr>
  <!--<td height="20" ></td>-->
  </tr>
  <tr>

    <td align="center" style="background:black;"><img src="http://www.animationxpress.com/registration2018/images/email.jpg" alt="logo" style="margin:0 auto; display:block;" /></td>
  </tr>
  <tr>
  <td height="20" ></td>
  </tr>

</table>
</td>
  </tr>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr>
  <td height="20"></td>
  </tr>
  <tr>
    <td style="font-size:24px; color:white; font-weight:bold;">Hi '.$fname.',</td>
  </tr>
  <tr>
  <td height="60"></td>
  </tr>
  <tr>
    <td style="text-align:center; margin:0 auto; font-size:48px; font-weight:bold; color:white;"> "Thank You for registering. You will receive a confirmation soon." </td>
  </tr>
  <tr>
  <td height="60"></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#fff;">
   <tr>
  <!--<td height="10"></td>-->
  </tr>
  <tr>
   <!-- <td><img src="http://brandvid.in/images/brandvid-band.jpg" align="center" style="width:100%; margin: 0 auto; display:block;" /></td>-->
  </tr>
   <tr>
 <!-- <td height="10"></td>-->
  </tr>
</table>
</td>
  </tr>
</table>';

      $mail = new PHPMailer();

        // Passing `true` enables exceptions
      try {
        //Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'animationxpressindia@gmail.com';                 // SMTP username
        $mail->Password = '964783GHUI@&*(';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('animationxpress@gmail.com', 'AnimationXpress');
        $mail->addAddress($email);     // Add a recipient

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'We have received your registration for Media and Entertainment IT Summit 2018';
        $mail->Body    = $message_user;
        $mail->AltBody = 'Thank you for submitting form.';

        $mail->send();
    } catch (Exception $e) {
        $msg = 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
        $status = 'error';
    }



    //admiin section
   $message_admin = "You have received a new registration :"."<br />".
     "Name: $fname"."<br />".

     "Email: $email"."<br />".
     "Mobile: $mob"."<br />".
     "Job title: $job"."<br />".
     "location: $location"."<br />".
     "Experience: $ex"."<br />";

    $mail_admin = new PHPMailer();                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail_admin->isSMTP();                                      // Set mailer to use SMTP
        $mail_admin->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail_admin->SMTPAuth = true;                               // Enable SMTP authentication
        $mail_admin->Username = 'animationxpressindia@gmail.com';                 // SMTP username
        $mail_admin->Password = '964783GHUI@&*(';                           // SMTP password
        $mail_admin->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail_admin->Port = 465;                                    // TCP port to connect to

        //Recipients
        $mail_admin->setFrom('animationxpressindia@gmail.com', 'AnimationXpress');
        $mail_admin->addAddress('animationxpressindia@gmail.com', 'AnimationXpress');     // Add a recipient

        //Content
        $mail_admin->isHTML(true);                                  // Set email format to HTML
        $mail_admin->Subject = 'We have received your registration for Media and Entertainment IT Summit 2018';
        $mail_admin->Body    = $message_admin;
        $mail_admin->AltBody = 'Thank you for submitting form.';

        $mail_admin->send();
    } catch (Exception $e) {
        $msg = 'Message could not be sent. Mailer Error: '. $mail_admin->ErrorInfo;
        $status = 'error';
    }
}
else
{
    echo "Error: " . $sql . "<br>" . $con->error;
}
}


?></div>

<footer id="footer">
	<div class="col-md-12">
		  
			<p class="muted credit">Copyright &copy; 2018 AnimationXpress. All rights reserved.</p>
		   
	  </div>
    </footer>
    </body>
    </html>
