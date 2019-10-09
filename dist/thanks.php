<?php
if(isset($_POST['email'])) {

    // CHANGE THE TWO LINES BELOW
    $email_to = "hello@hello.com";
    $email_subject = "Website Enquiry";

    function died($error) {
        // your error code can go here
        echo '<!DOCTYPE html> <html lang="en-GB"> <head> <meta charset="utf-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"> <title></title> </head> <body class="thanks"> <div class="wrapper">';
        echo "<p>Sorry, there were errors found with the form you submitted.</p>";
        echo $error. "<br />";
        echo '<a href="#" class="btn" onclick="window.history.go(-1); return false;">Go Back</a>';
        echo "</div> </body> </html>";
        die();
    }

    // validation expected data exists
    if (!isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died("Sorry, there's a problem with our form. Please drop us an email instead");
    }

    $email_from = $_POST['email']; // required
    $comments = $_POST['message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($comments)."\n";


// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- place your own success html below -->


<p>Thanks! We'll be in touch as soon as possible.</p>


<?php
}
die();
?>
