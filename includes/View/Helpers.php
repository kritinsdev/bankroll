<?php

namespace Bankroll\Includes\View;

use Bankroll\Includes\Factory\BonusFactory;

class Helpers
{
	public static function getTemplate(string $folder, string $part = '', array $data = []): void
	{
		$partial = "parts/{$folder}/" . $part;

		if (file_exists(BANKROLL_DIR . '/' . $partial . '.php')) {
			get_template_part(
				slug: $partial,
				args: $data
			);
		}
	}

    public static function prepareImageData(
        ?int $id,
             $size = 'bankroll-image'
    ): array
    {
        if(empty($id)) {
            return [];
        }

        $imageData['src'] = wp_get_attachment_image_src($id, $size);
        $imageData['srcset'] = wp_get_attachment_image_srcset($id, $size);
        $imageData['sizes'] = wp_get_attachment_image_sizes($id, $size);
        $imageData['alt'] = get_post_meta($id, '_wp_attachment_image_alt', true);

        return $imageData;
    }
    public static function prepareHeroData(int $id): ?array
    {
        if (empty($id)) {
            return [];
        }

		$type = get_post_type($id);

        switch ($type) {
            case 'casino':
                return [
                    'a' => 'b'
                ];
            default:
				$settings = get_field("{$type}_hero_settings", $id);
				$bonuses = [];

				if(!empty($settings['bonuses'])) {
					foreach ($settings['bonuses'] as $bonusId) {
						$bonuses[] = BonusFactory::create($bonusId)->toArray();
					}
				}

                return [
	                'title' => get_field("{$type}_hero_title", $id),
	                'headline' => get_field("{$type}_hero_headline", $id),
                    'text' => get_field("{$type}_hero_text", $id),
                    'core_pages' => $settings['core_pages'],
	                'bonuses' => $bonuses,
                    'image' => Helpers::prepareImageData(get_field("{$type}_hero_settings", $id)['content_image']),
                    'background_image' => wp_get_attachment_image_src(
                        get_field("{$type}_hero_settings", $id)['background_image'],
                        'bankroll-background'
                    ), // TODO fix usage
                ];
        }
    }

	public static function resolveHeroPart(int $id): string
	{
		$type = get_post_type($id);

		switch ($type) {
			case 'casino':
				return 'casino';
			default:
				return 'default';
		}
	}
}