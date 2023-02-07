<?php
function bookAppointmentEmail($rEmail, $patientName ,$clinicName, $apptDate, $apptTime){
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "noreply@diamonddentalclinics.com";
    $to = $rEmail;
    $subject = "Booking at " . $clinicName . " " . $apptDate;
    $message = "Dear " . $patientName . ". This is a confirmation email for you rbooking at " .$clinicName. " on ".$apptDate." ". $apptTime . " . Thank you for booking.";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
        echo "The email message was sent.";
    } else {
        echo "The email message was not sent.";
    }
}
?>