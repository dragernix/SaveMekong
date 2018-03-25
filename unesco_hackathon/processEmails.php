<?php

if(isset($_GET['toEmail']) and isset($_GET['authority'])){

//Assume it works
    // foreach($_GET["authority"] as $toemail){
    //     $to      = $toemail; //can receive notification

    //     $subject = 'Save Mekong';
    //     $message = 'Hi all, we are going to save mekong using';
    //     foreach ($_GET['toEmail'] as $message){
    //         $message .= $message;
    //     }
    //     $headers = 'From: chuamingyu@yahoo.com.sg' . "\r\n" .
    //         'Reply-To: chuamingyu@yahoo.com.sg' . "\r\n" .
    //         'X-Mailer: PHP/' . phpversion();

    //     mail($to, $subject, $message, $headers);
    // }

echo "<script type='text/javascript'>alert('Emails sent')</script>";

}
?>
<script>setTimeout(function(){window.location.href='suggestions.php'},1000);</script>