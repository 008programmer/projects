<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';




$errors = [];
if (isset($_POST['name'], $_POST['email'], $_POST['msg']))
{
    $fields =[
        'name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'msg'=>$_POST['msg']
    ];
    
    foreach ($fields as $key=>$field)
    {
        if(empty($field))
        {
            $errors[] = 'The ' .$key.' field  is required';
        }
        
    }
    
    if(empty($errors))
    {
        
       
        $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "angel.kiran2087@gmail.com";
        $mail->Password = "heenukamal";
        $mail->SetFrom($fields['email']);
        $mail->Subject = "test";
        $mail->Body = $fields['msg'];
        $mail->AddAddress("008prabhjot@gmail.com");
        
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent";
        }
        
        
    }
}
else 
    $errors[] = "Something went wrong"; 
$_SESSION['errors'] = $errors;
$_SESSION['fields'] = $fields;

// header('Location:index.php');