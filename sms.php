<?php
ini_set('display_errors', 'On');
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACb83f476338e33212bfd51b5e85c99a92';
$auth_token = '76e7ce68c0de8dd27e84b97835b64e59';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+15067025260";

$client = new Client($account_sid, $auth_token);

function send_messages($student_num, $tutor_num) {

    $GLOBALS['client']->messages->create(
        // Where to send a text message (your cell phone?)
        $student_num,
        array(
            'from' => $GLOBALS['twilio_number'],
            'body' => "Here is your tutor's number:" . $tutor_num . "\n\nPlease do not reply to this message."
        )
    );

    $GLOBALS['client']->messages->create(
        // Where to send a text message (your cell phone?)
        $tutor_num,
        array(
            'from' => $GLOBALS['twilio_number'],
            'body' => "Here is your student's number:" . $student_num . "\n\nPlease do not reply to this message."
        )
    );
}

send_messages("+16474681000", "+14169921383");
?>
