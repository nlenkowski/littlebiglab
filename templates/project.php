<?php
/*
Template Name: Project
*/
?>

<h1 class="project-heading">Project</h1>

<section class="project-info container">

    <div class="project-info-column-name">

        <?php
        $image = get_field('logo');
        if (! empty($image)) :
            ?>
        <div class="project-logo">
            <img src="<?php echo $image['sizes']['project-logo']; ?>" srcset="<?php echo $image['sizes']['project-logo']; ?>, <?php echo $image['sizes']['project-logo-retina']; ?> 2x" alt="<?php the_title(); ?>">
        </div>
        <?php endif; ?>

        <h2 class="project-title">
            <?php the_title(); ?>
        </h2>

        <h5 class="project-short-description">
            <?php the_field('short_description'); ?>
        </h5>
    </div>

    <div class="project-info-column-summary">

        <section class="project-description">
            <p><?php the_field('description'); ?> <?php the_field('responsibilities'); ?></p>
        </section>

        <?php if (have_rows('features') || get_field('technologies')) : ?>
            <a href="#" class="project-more-button button">
                <svg class="icon"><use xlink:href="<?php echo DISTDIR; ?>/icons/symbols.svg#icon-chevron-circle-right"></use></svg><span>Project Details</span>
            </a>
        <?php endif; ?>

        <?php
        $url = get_field('url');
        if (! empty($url)) :
            ?>
            <a href="<?php echo $url; ?>" class="project-visit-button button">
                <svg class="icon"><use xlink:href="<?php echo DISTDIR; ?>/icons/symbols.svg#icon-external-link"></use></svg><span>Visit Website</span>
            </a>
        <?php endif; ?>

        <section class="project-more-info">

            <?php if (have_rows('features')) : ?>
                <section class="project-features">
                    <h4>Features</h4>
                    <ul>
                        <?php
                        while (have_rows('features')) :
                            the_row();
                            ?>

                            <?php
                            $feature = get_sub_field('feature');
                            if (! empty($feature)) :
                                ?>
                                <li><?php echo $feature; ?></li>
                            <?php endif; ?>

                        <?php endwhile; ?>
                    </ul>
                </section>
            <?php endif; ?>

            <?php if (get_field('technologies')) : ?>
                <section class="project-technologies">
                    <h4>Technologies</h4>
                    <?php
                    $terms = get_field('technologies');
                    if ($terms) :
                        ?>
                        <ul>
                            <?php
                            $terms_count = count($terms);
                            foreach ($terms as $index => $term) {
                                echo '<li>' . $term->name . '</li>';
                            }
                            ?>
                        </ul>
                    <?php endif; ?>
                </section>
            <?php endif; ?>

        </section>

    </div>
</section>

<?php
// Determine which section to display initially
$default_tab = get_field('default_tab');
if (! $default_tab) {
    $default_tab = 'desktop';
}
?>

<div class="project-details-menu-wrapper">
    <nav class="project-details-menu tabs-container tabs">

        <?php if (have_rows('desktop_screenshots')) : ?>
            <a href="#" class="tab button-dark button-vertical
            <?php
            if ($default_tab == 'desktop') :
                echo 'active';
            endif;
            ?>
            " data-tab="desktop-screenshots">
                <svg class="icon icon-image"><use xlink:href="<?php echo DISTDIR; ?>/icons/symbols.svg#icon-desktop"></use></svg>
                <span>Desktop</span>
            </a>
        <?php endif; ?>

        <?php if (have_rows('mobile_screenshots')) : ?>
            <a href="#" class="tab button-dark button-vertical
            <?php
            if ($default_tab == 'mobile') :
                echo 'active';
            endif;
            ?>
            " data-tab="mobile-screenshots">
                <svg class="icon icon-image"><use xlink:href="<?php echo DISTDIR; ?>/icons/symbols.svg#icon-mobile"></use></svg>
                <span>Mobile</span>
            </a>
        <?php endif; ?>

        <?php if (have_rows('code_samples')) : ?>
            <a href="#" class="tab button-dark button-vertical
            <?php
            if ($default_tab == 'code') :
                echo 'active';
            endif;
            ?>
            " data-tab="code-samples">
                <svg class="icon icon-code"><use xlink:href="<?php echo DISTDIR; ?>/icons/symbols.svg#icon-embed"></use></svg>
                <span>Code</span>
            </a>
        <?php endif; ?>

    </nav>
</div>

<section class="project-details content-container">

    <section class="desktop-screenshots content
    <?php
    if ($default_tab == 'desktop') :
        echo 'active';
    endif;
    ?>
    ">

        <?php
        if (have_rows('desktop_screenshots')) :
            while (have_rows('desktop_screenshots')) :
                the_row();
                ?>

                <?php
                $title   = get_sub_field('title');
                $image   = get_sub_field('image');
                $padding = get_field('desktop_screenshot_padding');
                $color   = get_field('screenshot_padding_color');


                if (! empty($image)) :
                    ?>
                    <div class="desktop-screenshot">
                        <h5><?php echo $title; ?></h5>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $title; ?>" style="
                                             <?php
                                                if ($padding) :
                                                    echo 'padding: ' . $padding . ';';
                                                endif;
                                                ?>
                         <?php
                            if ($color) :
                                echo 'background-color: ' . $color . ';';
                            endif;
                            ?>
 ">
                    </div>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>
    </section>

    <section class="mobile-screenshots content
    <?php
    if ($default_tab == 'mobile') :
        echo 'active';
    endif;
    ?>
    ">

        <?php
        if (have_rows('mobile_screenshots')) :
            while (have_rows('mobile_screenshots')) :
                the_row();
                ?>

                <?php
                $title   = get_sub_field('title');
                $image   = get_sub_field('image');
                $padding = get_field('mobile_screenshot_padding');
                $color   = get_field('screenshot_padding_color');

                if (! empty($image)) :
                    ?>
                    <div class="mobile-screenshot">
                        <h5><?php echo $title; ?></h5>
                        <!-- <img src="<?php echo $image['url']; ?>" alt="<?php echo $title; ?>"
                                                  <?php
                                                    if ($padding) :
                                                        ?>
                             style="padding: <?php echo $padding; ?>;"<?php
                                                    endif; ?>> -->
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $title; ?>" style="
                                             <?php
                                                if ($padding) :
                                                    echo 'padding: ' . $padding . ';';
                                                endif;
                                                ?>
                         <?php
                            if ($color) :
                                echo 'background-color: ' . $color . ';';
                            endif;
                            ?>
 ">
                    </div>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>
    </section>

    <section class="code-samples content
    <?php
    if ($default_tab == 'code') :
        echo 'active';
    endif;
    ?>
    ">

        <?php
        if (have_rows('code_samples')) :
            while (have_rows('code_samples')) :
                the_row();
                ?>

                <?php
                $title = get_sub_field('title');
                $url   = get_sub_field('url');
                $embed = $url . '.js';

                if (! empty($url)) :
                    ?>
                    <div class="code-sample container">
                        <h5><?php echo $title; ?></h5>
                        <script src="<?php echo $embed; ?>"></script>
                    </div>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>
    </section>

</section>
