<?php
// dump($args);
?>

<div class="toplist">
	<?php foreach ($args['toplist_items'] as $item) {
		get_template_part(
			slug: 'Blocks/Types/Toplist/resources/templates/template-1',
			args: $item->toArray(),
		);
	}
	?>
</div>