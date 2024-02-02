<?php

namespace Bankroll\Includes\Traits;

trait HasImage
{
    public function getImage(string|int $id = null, string $post_type = 'casino'): array
    {
        if (!empty($id)) {
            $imageData = get_field("cpt_{$post_type}_featured_image", $id);

            if (!empty($imageData)) {
                unset($imageData['id']);
                unset($imageData['filesize']);
                unset($imageData['link']);
                unset($imageData['author']);
                unset($imageData['status']);
                unset($imageData['uploaded_to']);
                unset($imageData['date']);
                unset($imageData['modified']);
                unset($imageData['menu_order']);
                unset($imageData['mime_type']);
                unset($imageData['type']);
                unset($imageData['subtype']);
                unset($imageData['sizes']['thumbnail']);
                unset($imageData['sizes']['thumbnail-width']);
                unset($imageData['sizes']['thumbnail-height']);
                unset($imageData['sizes']['medium']);
                unset($imageData['sizes']['medium-width']);
                unset($imageData['sizes']['medium-height']);
                unset($imageData['sizes']['medium_large']);
                unset($imageData['sizes']['medium_large-width']);
                unset($imageData['sizes']['medium_large-height']);
                unset($imageData['sizes']['large']);
                unset($imageData['sizes']['large-width']);
                unset($imageData['sizes']['large-height']);
            }
            return $imageData;
        }


        return [];
    }
}
