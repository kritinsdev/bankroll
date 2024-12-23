<?php
$data = $args;

if (empty($data['src'])) {
    return;
}

$image = "<img src='" . esc_attr($data['src'][0]) . "'";

if (!empty($data['class'])) {
    $classes = implode(' ', $data['class']);
    $image .= " class='" . esc_attr($classes) . "'";
}

if (!empty($data['srcset'])) {
    $image .= " srcset='" . esc_attr($data['srcset']) . "'";
}

if (!empty($data['sizes'])) {
    $image .= " sizes='" . esc_attr($data['sizes']) . "'";
}

if (!empty($data['alt'])) {
    $image .= " alt='" . esc_attr($data['alt']) . "' />";
} else {
    $image .= "/>";
}

echo $image;
