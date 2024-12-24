<?php

$faqs = [
	[
		'question' => 'What is your return policy?',
		'answer' => 'We offer a 30-day return policy for all unused items in their original packaging.'
	],
	[
		'question' => 'How long does shipping take?',
		'answer' => 'Standard shipping typically takes 3-5 business days within the continental US.'
	],
	[
		'question' => 'Do you ship internationally?',
		'answer' => 'Yes, we ship to most countries worldwide. International shipping times vary by location.'
	]
];

?>

<div class="max-w-3xl mx-auto px-4 py-8">
	<?php foreach ($faqs as $index => $faq): ?>
		<div
			x-data="{ open: false }"
			class="border-b border-gray-200 last:border-b-0"
		>
			<div
				@click="open = !open"
				class="flex justify-between items-center py-4 cursor-pointer hover:bg-gray-50 transition-colors duration-200"
                aria-expanded="open"
				role="button"
			>
				<h3 class="text-lg font-medium text-gray-900">
					<?php echo htmlspecialchars($faq['question']); ?>
				</h3>
				<svg
					class="w-5 h-5 text-gray-500 transform transition-transform duration-200"
					:class="{ 'rotate-180': open }"
					fill="none"
					stroke="currentColor"
					viewBox="0 0 24 24"
				>
					<path
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						d="M19 9l-7 7-7-7"
					/>
				</svg>
			</div>
			<div
				x-show="open"
				x-transition:enter="transition ease-out duration-200"
				x-transition:enter-start="opacity-0 -translate-y-1"
				x-transition:enter-end="opacity-100 translate-y-0"
				x-transition:leave="transition ease-in duration-150"
				x-transition:leave-start="opacity-100 translate-y-0"
				x-transition:leave-end="opacity-0 -translate-y-1"
				class="pb-4 text-gray-600 leading-relaxed"
				style="display: none;"
			>
				<p class="px-0">
					<?php echo nl2br(htmlspecialchars($faq['answer'])); ?>
				</p>
			</div>
		</div>
	<?php endforeach; ?>
</div>
