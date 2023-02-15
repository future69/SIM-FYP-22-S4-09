<?php
function bookAppointmentEmail($rEmail, $patientName ,$clinicName, $apptDate, $apptTime){
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "noreply@diamonddentalclinics.com";
    $to = $rEmail;
    $subject = "Booking at " . $clinicName . " " . $apptDate;
    $message = "Dear " . $patientName . ". This is a confirmation email for your booking at " .$clinicName. " on ".$apptDate." ". $apptTime . " . Thank you for booking.";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
        echo "The email message was sent.";
    } else {
        echo "The email message was not sent.";
    }
}

function clinicAdminApplicationEmail($rEmail, $clinicUsername ,$clinicName, $clinicStatus){
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "noreply@diamonddentalclinics.com";
    $to = $rEmail;
    $subject = "Clinic account application result for " . $clinicName . "";
    if ($clinicStatus == "approved"){
        $message = "Dear " . $clinicUsername . ". This is a confirmation email to inform you that your clinic application for ".$clinicName." has been ".$clinicStatus.".
         Please feel free to log in using your username and password";
    } 
    else if ($clinicStatus == "rejected"){
        $message = "Dear " . $clinicUsername . ". This is a confirmation email to inform you that your clinic application for ".$clinicName." has been ".$clinicStatus.".
        Please feel free to make another application";
    }
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
        echo "The email message was sent.";
    } else {
        echo "The email message was not sent.";
    }
}
?>