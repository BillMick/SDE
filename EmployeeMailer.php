<?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
/*     if(isset($_GET["send"]))
    { */
        //Load Composer's autoloader
        //require 'vendor/autoload.php';
        require 'PHPMailer-6.4.1/src/Exception.php';
        require 'PHPMailer-6.4.1/src/SMTP.php';
        require 'PHPMailer-6.4.1/src/PHPMailer.php';
        
        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        
        try
        {
            $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
            $request = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE registrationNumber = :r");
            $request->bindParam(':r',$number);
            $request->execute();
            $receiverAll = $request->fetch();
            $a = "<br><b>Hiring date : </b>".$receiverAll['hiringDate'];
            $b = "<br><b>Grade : </b>".$receiverAll['grade'];
            $c = "<br><b>Post : </b>".$receiverAll['post'];
            $di = "<br><b>Department : </b>".$receiverAll['department'];
            $f = "<br><b>Staff number : </b>".$receiverAll['registrationNumber'];
            $h = "<br><b>Access Degree : </b>".$receiverAll['accessDegree'];
            $i = "<br><b>Work status : </b>".$receiverAll['workStatus'];
        
            //Server settings
            $request1 = $bdd->prepare("SELECT * FROM SocialIdentity WHERE identityDocumentNumber = :i");
            $request1->bindParam(':i',$receiverAll['identityDocumentNumber']);
            $request1->execute();
            $receiverAll1 = $request1->fetch();
            $receiver = $receiverAll1['email'];
            $g = "<br><b>Default password : </b>".$receiverAll1['birthdate'];
            $body = $a.''.$b.''.$c.''.$di.''.$e.''.$f.''.$h.''.$i.''.$g;
            echo $body;
        
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com'; //revoir ceci                    //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'mikeahoudjinou@gmail.com';//revoir                     //SMTP username
            $mail->Password   = 'Goyaves7';      //revoir                         //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;        //465                            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom('mikeahoudjinou@gmail.com', 'SDE Enterprise');
            //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
            $mail->addAddress($receiver);               //Name is optional
           // $mail->addReplyTo('info@example.com', 'Information');
           // $mail->addCC('cc@example.com');
           // $mail->addBCC('bcc@example.com');
        
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Your Employee Profile in SDE Enterprise';
            $mail->Body    = $body;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
            /* header("Location: EmployeeProfile.php"); */
        }
        catch (Exception $e)
        {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    /* } */