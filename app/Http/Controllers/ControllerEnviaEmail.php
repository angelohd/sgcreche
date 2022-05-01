<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class ControllerEnviaEmail extends Controller
{

    function email()
    {
        return view('email');
    }
    function enviar()
    {

        //Load Composer's autoloader
        // require 'vendor/autoload.php';
        require base_path("vendor\autoload.php");

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'angelohuns@gmail.com';                     //SMTP username
            $mail->Password   = 'angeloHUNS1995Gmail';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('geral.info@wisekumbu.com', 'angelo');
            $mail->addAddress('geral.info@wisekumbu.com', 'geral.info@wisekumbu.com');     //Add a recipient
            $mail->addAddress('geral.info@wisekumbu.com');               //Name is optional
            $mail->addReplyTo('geral.info@wisekumbu.com', 'Information');
            $mail->addCC('geral.info@wisekumbu.com');
            $mail->addBCC('geral.info@wisekumbu.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function enviar1(Request $request)
    {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'mail.wisekumbu.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'geral.info@wisekumbu.com';   //  sender username
            $mail->Password = 'zY3$srA$$}=n';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->setFrom('geral.info@wisekumbu.com', 'geral.info@wisekumbu.com');
            $mail->addAddress('geral.info@wisekumbu.com');
            $mail->addCC('geral.info@wisekumbu.com');
            $mail->addBCC('geral.info@wisekumbu.com');

            $mail->addReplyTo('geral.info@wisekumbu.com', 'geral.info@wisekumbu.com');

            if (isset($_FILES['emailAttachments'])) {
                for ($i = 0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                }
            }


            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject ='geral.info@wisekumbu.com';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

            // $mail->AltBody = plain text version of email body;

            if (!$mail->send()) {
                // return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
                dd("error");
            } else {
                dd("sucesso");
                // return back()->with("success", "Email has been sent.");
            }
        } catch (Exception $e) {
            return back()->with('error', 'Message could not be sent.');
        }
    }
}
