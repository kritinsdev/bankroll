<?php
$imageData = $args;

if (empty($imageData['src'])) {
    return;
}

$image = "<img src='" . esc_attr($imageData['src'][0]) . "'";

if (!empty($imageData['class'])) {
    $classes = implode(' ', $imageData['class']);
    $image .= " class='" . esc_attr($classes) . "'";
}

if (!empty($imageData['srcset'])) {
    $image .= " srcset='" . esc_attr($imageData['srcset']) . "'";
}

if (!empty($imageData['sizes'])) {
    $image .= " sizes='" . esc_attr($imageData['sizes']) . "'";
}

if (!empty($imageData['alt'])) {
    $image .= " alt='" . esc_attr($imageData['alt']) . "' />";
} else {
    $image .= "/>";
}

echo $image;
