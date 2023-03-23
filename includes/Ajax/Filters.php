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
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        exit(json_encode($data));
    }
}