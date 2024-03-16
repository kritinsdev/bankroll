<?php

namespace Bankroll\Includes\Traits;

trait HasImage
{
    public function getImageData(
        string|int $id = null,
        string     $size = 'bankroll-logo'
    ): array
    {

        $imageData = [];
        $imageData['src'] = wp_get_attachment_image_src($id, $size);
        $imageData['srcset'] = wp_get_attachment_image_srcset($id, $size);
        $imageData['sizes'] = wp_get_attachment_image_sizes($id, $size);
        $imageData['alt'] = get_post_meta($id, '_wp_attachment_image_alt', true);

        return $imageData;
    }
}
