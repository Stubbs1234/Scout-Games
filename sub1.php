<?php
$email1 = $_GET['email'];
$merge_vars = array('MM1'=>'Alex');
$api_key = "63d85b64c3df2c6a8bd8b3f25957caf5-us11";
$list_id = "b389ee29b0";
require('mailchimp-api-php/src/Mailchimp.php');
$Mailchimp = new Mailchimp( $api_key );
$Mailchimp_Lists = new Mailchimp_Lists( $Mailchimp );
$subscriber = $Mailchimp_Lists->subscribe($list_id,
                                        array('email'=> $email1),
                                         $merge_vars,
                                        false,
                                        true,
                                        false,
                                        false
                                       );
if ( ! empty( $subscriber['leid'] ) ) {
header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=H3H6MNE2YJHL8");
}
else
{
    echo "fail";
}
                    
?>