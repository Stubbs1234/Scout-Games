<?php
$api_key = "63d85b64c3df2c6a8bd8b3f25957caf5-us11";
$list_id = "b389ee29b0";
require('Mailchimp.php');
$Mailchimp = new Mailchimp( $api_key );
$Mailchimp_Lists = new Mailchimp_Lists( $Mailchimp );
$subscriber = $Mailchimp_Lists->subscribe( $list_id, array( 'email' => htmlentities($_POST['email']) ) );
if ( ! empty( $subscriber['leid'] ) ) {
   header('Location: http://localhost:8888/ScoutGameWebsite/start/next.html');
}
else
{
    echo "fail";
}
?>