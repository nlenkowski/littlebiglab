<?php
if ( $terms ) : ?>
    <ul>
        <?php
        $terms_count = count( $terms );
        foreach ( $terms as $index => $term )  {
            echo '<li>' . $term->name . '</li>';
        }
        ?>
    </ul>
<?php endif; ?>
