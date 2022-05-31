<?php

    use PHPMailer\PHPMailer\PHPMailer;

    function sendMail ($subject, $body, $recipientName, $recipientMail) {
        $mail = new PHPMailer(True);

        $mail->isSMTP();
        $mail->isHTML();
        $mail->setLanguage("br");

        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->CharSet = "utf-8";

        $mail->Host = MAIL["host"];
        $mail->Port = MAIL["port"];
        $mail->Username = MAIL["user"];
        $mail->Password = MAIL["passwd"];

        $mail->Subject = $subject;
        $mail->msgHTML($body);
        $mail->addAddress($recipientMail, $recipientName);
        $mail->setFrom(MAIL["from_mail"], MAIL["from_name"]);

        $mail->send();
    } 