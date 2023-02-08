<?php

use Bankroll\Core\Init;

define('BANKROLL_DIR', get_stylesheet_directory());
define('BANKROLL_DIR_URI', get_stylesheet_directory_uri());

require_once('vendor/autoload.php');

Init::get_instance();