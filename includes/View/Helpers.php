<?php

namespace Bankroll\Includes\View;

class Helpers {
    public static function taxonomyTermsFilter(string $taxonomy, ?array $options = [])
    {
        get_template_part('parts/filters/taxonomy-filter', null, ['taxonomy' => $taxonomy, 'options' => $options]);
    }
}