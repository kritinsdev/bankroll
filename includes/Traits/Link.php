<?php

namespace Bankroll\Includes\Traits;

trait Link
{
    public function getLink(int $id): string
    {
        $link_prefix = 'visit';
        $post_type = get_post_type($id);
        $resource = $this->formatTitle(get_the_title($id));

        $site_url = site_url();


        return "{$site_url}/{$link_prefix}/{$post_type}/{$resource}/";
    }

    private function formatTitle(string $title): string
    {
        $formatted_title = '';

        $formatted_title = strtolower($title);
        $formatted_title = str_replace(' ', '-', $formatted_title);

        return $formatted_title;
    }
}
