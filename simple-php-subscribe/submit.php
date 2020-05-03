<?php

## CONFIG ##
// EMAIL
if (empty($_POST["E-mail"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["E-mail"];
}

# LIST EMAIL ADDRESS
$recipient = "email@email.com"; # enter the email of recipient here

# SUBJECT (Subscribe/Remove)
$subject = "YOUR-SUBJECT.";

# RESULT PAGE
$location = "/your-page/success/"; # enter the URL of the result page here

## FORM VALUES ##

# SENDER - WE ALSO USE THE RECIPIENT AS SENDER IN THIS SAMPLE
# DON'T INCLUDE UNFILTERED USER INPUT IN THE MAIL HEADER!
#$sender = $recipient;

# MAIL BODY
$body .= "Name: ".$_REQUEST['Name']." \n";                          # NAME
$body .= "Surname: ".$_REQUEST['Surname']." \n";                    # SURNAME
$body .= "Company: ".$_REQUEST['Company']." \n";                    # AGENCY
$body .= "Role: ".$_REQUEST['Role']." \n";                        # ROLE
$body .= "E-mail: ".$_REQUEST['E-mail']." \n";                      # E-MAIL
if (!isset($_POST['checkbox'])) {
        // checkbox was not checked...do something
	$body .= "Accept marketing: NO ".$_REQUEST['checkbox']." \n";
    } else {
        // checkbox was checked. Rock on!
        $body .= "Accept marketing: ".$_REQUEST['checkbox']." \n";
    }
# add more fields here if required



## SEND MESSGAE ##

mail( $recipient, $subject, $body, "From:".$email ) or die ("Mail could not be sent.");

## SHOW RESULT PAGE ##

header( "Location: $location" );
?>