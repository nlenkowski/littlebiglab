<?php
/*
Template Name: Project
*/
?>

<header class="project-header container">

    <h1><?php the_title(); ?></h1>
    <p><?php the_field('description'); ?></p>

    <div class="tabs">

        <?php if ( have_rows('screenshots') ): ?>
            <a href="#" class="tab button active" data-tab="screenshots"><i class="fa fa-picture-o"></i> Screenshots</a>
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

</header>

<section class="project-content">

    <div class="content screenshots active">

        <?php if ( have_rows('screenshots') ):

            while ( have_rows('screenshots') ) : the_row(); ?>

                <?php
                $title = get_sub_field('title');
                $image = get_sub_field('image');

                if ( !empty($image) ): ?>
                    <div class="screenshot">
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
