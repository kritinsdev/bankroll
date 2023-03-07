<?php

namespace Bankroll\Includes\Ajax;

class Filters
{
    public function __construct()
    {
        add_action('wp_ajax_nopriv_filterResults', [$this, 'filterResults']);
        add_action('wp_ajax_filterResults', [$this, 'filterResults']);
    }

    public function filterResults()
    {
        // $terms = ($_POST['terms']) ? explode(',', $_POST['terms']) : [];

        exit(json_encode($_POST));
    }
}