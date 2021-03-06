<?php
/**
 * Displays the footer
 */
?>

    </section><!-- /site-content -->

    <footer class="site-footer">

        <div class="footer-background">
            <div class="footer-gradient"></div>
            <img class="footer-image" src="<?php echo DISTDIR; ?>/images/footer-background.jpg" alt="El Fuerte">
        </div>

        <div class="container">
            <div class="footer-content">
                <h2 class="footer-cta">
                    <?php
                    if ($post && $post->ID === 1378) { // WordPress Maintenance page
                        the_field('footer_title', 1378);
                    } else {
                        the_field('footer_title', 8);
                    }
                    ?>
                </h2>
                <a class="button button-large footer-button" href="mailto:nathan@littlebiglab.com">
                    <span>Get In Touch</span>
                </a>
            </div>
        </div>

    </footer>

    <?php wp_footer(); ?>

</body>
</html>
