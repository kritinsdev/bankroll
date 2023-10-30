<footer class="footer">
    FOOTER
</footer>
<?php

use Bankroll\Includes\Helpers;

wp_footer(); ?>

</body>

</html>

<?php

function retrieveBonuses()
{
    global $wpdb;

    $args = array(
        'post_type' => 'bonus',
        'posts_per_page' => -1, // Retrieve all matching posts
    );

    $query = new WP_Query($args);

    $idsArray = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $meta_value = get_post_meta(get_the_ID(), 'cpt_bonus_for_casino', true);

            if (is_array($meta_value)) {
                $idsArray[] = $meta_value[0];
            }
        }
        wp_reset_postdata(); // Restore the global post data
    }

    return $idsArray;
}

$casino_id = 13; // Replace with the specific casino ID you want to retrieve bonuses for
$retrieved_posts = retrieveBonuses();

var_dump($retrieved_posts);
