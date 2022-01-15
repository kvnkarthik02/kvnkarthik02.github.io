<?php
 
if($_POST) {
    $name = "";
    $email = "";
    $message = "";
    $email_body = "<div>";
     
    if(isset($_POST['name'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Visitor Name:</b></label>&nbsp;<span>".$name."</span>
                        </div>";
    }

    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Visitor Email:</b></label>&nbsp;<span>".$email."</span>
                        </div>";
    }     
     
    if(isset($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
        $email_body .= "<div>
                           <label><b>Visitor Message:</b></label>
                           <div>".$message."</div>
                        </div>";
    }
     
    // if($concerned_department == "billing") {
    //     $recipient = "billing@domain.com";
    // }
    // else if($concerned_department == "marketing") {
    //     $recipient = "marketing@domain.com";
    // }
    // else if($concerned_department == "technical support") {
    //     $recipient = "tech.support@domain.com";
    // }
    // else {
    //     $recipient = "contact@domain.com";
    // }
    
    $recipient = "kvenkate@tcd.ie";

    $email_body .= "</div>";

    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
     
    mail($recipient, $email_title, $email_body, $headers);
    // if() {
    //     echo "<p>Thank you for contacting us, $name. You will get a reply within 24 hours.</p>";
    // } else {
    //     echo '<p>We are sorry but the email did not go through.</p>';
    // }
     
} else {
    echo '<p>Something went wrong</p>';
}
?>