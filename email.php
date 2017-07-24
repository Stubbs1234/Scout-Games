<?php
/*Enter email address for the email to be sent to*/
$myemail  = "admin@scoutgames.co.uk";

/*Enter the name of the function with a post method*/
$name = check_input($_POST['name'], "Enter your name");
$question = check_input($_POST['question'], "Please select a question");
$section = check_input($_POST['section'], "Please slect a section");
$email = check_input($_POST['email'],"Enter an email address");
$comments = check_input($_POST['comments'], "Write your comments");

/* Check if the email Address is valid email to use for a reply*/
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/*the layout of the email when receive from the website*/
$question = "$question";
$message = "Hello!

Your contact form has been submitted by:

Name: $name
E-mail: mailto:$email
Reason for the email: $question
Section:$section

Comments:
$comments

End of message
";


mail($myemail, $question, $message);

/*Take the user to a new web page if email was sent correctly*/
header('Location: http://www.example.com/');

/*Check to make sure all inputs are fill in*/
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}
/*Show an error if none of the inputs are not fill in*/
function show_error($myError)
{
?>
    <html> 
<body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>
