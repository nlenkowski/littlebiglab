<?php
/*
Template Name: Project
*/
?>

<header class="project-header container">

    <h1><?php the_title(); ?></h1>

    <div class="description">
        <?php the_field('description'); ?>
        <!-- <a href="#" class="project-extra-info-link">View responsibilities and technologies</a> -->
    </div>

    <div class="extra-info">

        <div class="responsibilities">
            <h4>Responsibilities</h4>
            <ul>
                <?php while ( have_rows('responsibilities') ) : the_row(); ?>

                    <?php
                    $responsibility = get_sub_field('responsibility');
                    if ( !empty($responsibility) ): ?>
                        <li><?php echo $responsibility; ?></li>
                    <?php endif; ?>

                <?php endwhile; ?>
            </ul>
        </div>

        <div class="technologies">
            <h4>Technologies</h4>

            <?php
            $terms = get_field('technologies');
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
        </div>

    </div>
</header>

<nav class="menu">

    <div class="tabs">

        <?php if ( have_rows('desktop_screenshots') ): ?>
            <a href="#" class="tab button active" data-tab="desktop-screenshots"><i class="fa fa-picture-o"></i> Desktop Screenshots</a>
        <?php endif; ?>

        <?php if ( have_rows('mobile_screenshots') ): ?>
            <a href="#" class="tab button" data-tab="mobile-screenshots"><i class="fa fa-picture-o"></i> Mobile Screenshots</a>
        <?php endif; ?>

        <?php if ( have_rows('code_samples') ): ?>
            <a href="#" class="tab button" data-tab="codesamples"><i class="fa fa-code"></i> Code Samples</a>
        <?php endif; ?>

        <?php
        $url = get_field('url');
        if ( !empty( $url ) ): ?>
            <a href="<?php echo $url; ?>" class="tab button"><i class="fa fa-external-link"></i> View Website</a>
        <?php endif; ?>

    </div>
</nav>

<section class="project-content">

    <div class="content desktop-screenshots screenshots active">

        <?php if ( have_rows('desktop_screenshots') ):

            while ( have_rows('desktop_screenshots') ) : the_row(); ?>

                <?php
                $title = get_sub_field('title');
                $image = get_sub_field('image');

                if ( !empty($image) ): ?>
                    <div class="desktop-screenshot">
                        <h3><?php echo $title; ?></h3>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $title; ?>">
                    </div>
                <?php endif; ?>

            <?php endwhile; ?>

        <?php endif; ?>

    </div>

    <div class="content mobile-screenshots screenshots">

        <?php if ( have_rows('mobile_screenshots') ):

            while ( have_rows('mobile_screenshots') ) : the_row(); ?>

                <?php
                $title = get_sub_field('title');
                $image = get_sub_field('image');

                if ( !empty($image) ): ?>
                    <div class="mobile-screenshot">
                        <h3><?php echo $title; ?></h3>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $title; ?>">
                    </div>
                <?php endif; ?>

            <?php endwhile; ?>

        <?php endif; ?>

    </div>

    <div class="content codesamples">

        <?php if ( have_rows('code_samples') ):

            while ( have_rows('code_samples') ) : the_row(); ?>

                <?php
                $title = get_sub_field('title');
                $url   = get_sub_field('url');
                $embed = $url . '.js';

                if ( !empty($url) ): ?>
                    <div class="codesample container">
                        <h3><?php echo $title; ?></h3>
                        <script src="<?php echo $embed; ?>"></script>
                    </div>
                <?php endif; ?>

            <?php endwhile; ?>

        <?php endif; ?>

    </div>

</section>
