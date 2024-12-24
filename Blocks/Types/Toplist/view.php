<?php

if ( empty( $args['toplist_items'] ) ) {
	return;
}

?>
<div class="toplist">
	<?php foreach ( $args['toplist_items'] as $item ) {
		get_template_part(
			slug: 'Blocks/Types/Toplist/resources/templates/template-1',
			args: [
				'data'       => $item->toArray(),
				'bonus_type' => $args['bonus_type'] ?? null,
			],
		);
	}
	?>
</div>