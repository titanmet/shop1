<?php
namespace shop\services;
use shop\forms\ContactForm;
use yii\mail\MailerInterface;

class ContactService
{
    private $supportEmail;
    private $adminEmail;
    private $mailer;
    public function __construct($adminEmail, MailerInterface $mailer)
    {
        $this->adminEmail = $adminEmail;
    }
    public function send(ContactForm $form): void
    {
        $sent = $this->mailer->compose()
            ->setFrom($this->supportEmail)
            ->setTo($this->adminEmail)
            ->setSubject($form->subject)
            ->setTextBody($form->body)
            ->send();
        if (!$sent) {
            throw new \RuntimeException('Sending error.');
        }
    }
}