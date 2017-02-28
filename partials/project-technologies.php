<?php
$terms = get_field('technologies');
if ( $terms ) : ?>

    <?php
    $terms_count = count( $terms );
    foreach ( $terms as $index => $term )  {

        if ( $index < $terms_count - 1 ) {
            echo $term->name . " / ";
        } else {
            echo $term->name;
        }
    }
    ?>

<?php endif; ?>
