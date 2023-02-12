<?php get_header(); ?>

<main>
   <div class="container">
      <?php /** Blocks::displayAll(); */  ?>
<?php

// Check value exists.
if( have_rows('blocks') ):
    // Loop through rows.
    while ( have_rows('blocks') ) : var_dump( the_row( true));

        // Case: Paragraph layout.
        if( get_row_layout() == 'block_content' ):

        endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif; ?>
   </div>
</main>

<?php get_footer(); ?>
