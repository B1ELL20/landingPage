<?php

    require "./src/Exception.php";
    require "./src/OAuth.php";
    require "./src/PHPMailer.php";
    require "./src/POP3.php";
    require "./src/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);

    $nome = $_GET['nome'];
    $email = $_GET['email'];

    try {
        //Server settings
        $mail->SMTPDebug = 2;                                        //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'dantasbiell20@gmail.com';                     //SMTP username
        $mail->Password   = 's1a5t9n7a5d3';                               //SMTP password
        $mail->SMTPSecure = 'tls';                              //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('dantasbiell20@gmail.com', 'Gabriel');
        $mail->addAddress($email, $nome);     //Add a recipient         //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'OLa, ' . $nome;
        $mail->Body    = '
        <h1>Tudo tranquilo?</h1>
        <hr>
        <br>
        <p>Se você recebeu isso, siginifica que acessou a landing page que eu criei. Foi desenvolvida com tecnologias de Front-end e Back end, como HTML, CSS, JavaScript e PHP</p>
        
        <h3><strong>Espero que tenha gostado!</strong></h3>
        ';
        $mail->AltBody = 'Se você recebeu isso, siginifica que acessou a landing page que eu criei. Foi desenvolvida com tecnologias de Front-end e Back end, como HTML, CSS, JavaScript e PHP';

        $mail->send();
        echo 'Mensagem enviada';
    } catch (Exception $e) {
        echo "Mensagem não foi enviada. Mailer Error: {$mail->ErrorInfo}";
    }
?>