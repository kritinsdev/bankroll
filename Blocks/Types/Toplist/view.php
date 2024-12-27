<?php

if ( empty( $args['data'] ) || empty( $args['data']['toplist_items'] ) ) {
	return;
}

$data = $args['data'];
?>

<div class="toplist">
	<?php foreach ( $data['toplist_items'] as $item ) {
		get_template_part(
			slug: 'Blocks/Types/Toplist/resources/templates/template-1',
			args: [
				'data'       => $item->toArray(),
				'bonus_type' => $data['bonus_type'] ?? null,
			],
		);
	}
	?>
</div>