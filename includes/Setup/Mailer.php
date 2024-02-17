<?php

namespace Bankroll\Includes\Setup;

use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    public function init(PHPMailer $phpmailer)
    {
        dump(1111111111111111111, true);
        $phpmailer->Host = 'mailpit';
        $phpmailer->Port = 1025;
        $phpmailer->Username = '';
        $phpmailer->Password = '';
        // $phpmailer->SMTPAuth = false;
        // $phpmailer->SMTPSecure = 'ssl';

        $phpmailer->IsSMTP();
    }
}
