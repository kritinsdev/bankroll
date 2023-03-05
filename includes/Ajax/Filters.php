<?php

namespace Bankroll\Includes\Ajax;

class Filters
{
    public function __construct()
    {
        add_action('wp_ajax_nopriv_filterPosts', [$this, 'filterPosts']);
        add_action('wp_ajax_filterPosts', [$this, 'filterPosts']);
    }

    public function filterPosts()
    {
        exit(json_encode('123'));
    }
}