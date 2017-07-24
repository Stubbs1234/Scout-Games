<?php
$sub = $_GET['sub'];
$trail = $_GET['trail'];
$email = $_GET['email'];
$filename = require_once("mandrill-api-php/src/Mandrill.php");
    $mandrill = new Mandrill('tIaqXdWqVHTJoon3erigGg');
try {
    $template_name = 'sub (copy 01)';
    $template_content = array(
    	array(
    	'name' => 'trail',
    	'content' => $trail
    	),
        array(
        'name' => 'sub',
        'content' => $sub
        )
    );
    $message = array(
        'subject' => 'Your Subscription',
        'from_email' => 'no-reply@scoutgames.co.uk',
        'from_name' => 'Scout Games',
        'to' => array(
            array(
                'email' => $email,
                'name' => 'Alex',
                'type' => 'to'
            )
        ),
        'headers' => array('Reply-To' => 'no-reply@scoutgames.co.uk'),
        'important' => false,
        'track_opens' => null,
        'track_clicks' => null,
        'auto_text' => null,
        'auto_html' => null,
        'inline_css' => null,
        'url_strip_qs' => null,
        'preserve_recipients' => null,
        'view_content_link' => null,
        'tracking_domain' => null,
        'signing_domain' => null,
        'return_path_domain' => null,
        'merge' => true,
        'merge_language' => 'mailchimp',
        'global_merge_vars' => array(
            array(
                'name' => 'merge1',
                'content' => 'merge1 content'
            )
        ),
        'merge_vars' => array(
            array(
                'rcpt' => $email,
                'vars' => array(
                    array(
                        'name' => 'merge2',
                        'content' => 'merge2 content'
                    )
                )
            )
        ),
    );
    $async = false;
    $ip_pool = 'Main Pool';
    $result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool);
    header('Location: http://scoutgames.co.uk/index.html');

} catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    throw $e;
}
?>