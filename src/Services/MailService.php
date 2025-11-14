<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->configureSMTP();
    }

    private function configureSMTP()
    {
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.example.com'; // Defina o servidor SMTP
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'your_email@example.com'; // Seu e-mail
        $this->mail->Password = 'your_password'; // Sua senha
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 587; // Porta do servidor SMTP
    }

    public function sendMail($to, $subject, $body)
    {
        try {
            $this->mail->setFrom('your_email@example.com', 'Your Name');
            $this->mail->addAddress($to);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}