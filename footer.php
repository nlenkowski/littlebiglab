<?php
/**
 * Displays the footer
 */
?>

    </section><!-- /site-content -->

    <footer class="site-footer">

        <div class="footer-background">
            <div class="footer-gradient"></div>
            <div class="footer-image" style="background-image: url('<?php echo DISTDIR; ?>/images/elfuerte-background.jpg');"></div>
        </div>

        <div class="container">

            <div class="footer-content">

                <h2 class="section-title">
                    <?php the_field('footer', 8); ?>
                </h2>

                <a class="button" href="mailto:nathan@littlebiglab.com">
                    <svg class="icon"><use xlink:href="<?php echo DISTDIR; ?>/svg/symbols.svg#icon-comments"></use></svg><span>Lets Talk</span>
                </a>
            </div>

        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>
