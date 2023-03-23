<?php
use Bankroll\Includes\View\Parts;
?>

<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#" data-colorTheme="default">
<head>
    <title><?php echo get_the_title();?></title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/bf73ec930a.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php include_once BANKROLL_DIR . '/svg.php'; ?>

<?php Parts::navigation(); ?>

<?php Parts::hero(); ?>