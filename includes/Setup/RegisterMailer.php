<?php

namespace Bankroll\Includes\Setup;

use PHPMailer\PHPMailer\PHPMailer;

class RegisterMailer
{
    private string $host;

    private int $port;

    public function __construct(string $host = 'mailpit', int $port = 1025)
    {
        $this->host = $host;
        $this->port = $port;

        $this->phpmailerInit();
    }

    private function phpmailerInit()
    {
        add_action('phpmailer_init', function ($phpmailer) {
            $phpmailer->Host = $this->host;
            $phpmailer->Port = $this->port;
            $phpmailer->SMTPAuth = false;
            $phpmailer->isSMTP();
        });
    }
}
